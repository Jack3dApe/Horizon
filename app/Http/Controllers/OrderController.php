<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('id_user', Auth::id())->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function show($id_order)
    {
        $order = Order::with('orderItems.game', 'payment')->findOrFail($id_order);
        return view('orders.show', compact('order'));
    }

    public function placeOrder(PaymentRequest $request)
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Calcular o preço total
        $totalPrice = array_sum(array_column($cart, 'price'));

        // Iniciar transação para criar a ordem
        DB::beginTransaction();

        // Criar a ordem
        $order = Order::create([
            'id_user' => $user->id_user,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        // Criar itens da ordem
        foreach ($cart as $id_game => $item) {
            OrderItem::create([
                'id_order' => $order->id_order,
                'id_game' => $id_game,
                'price' => $item['price'],
            ]);
        }

        // Chamar o PaymentController e processar o pagamento
        $paymentController = new PaymentController();
        $paymentResponse = $paymentController->processPayment($request->merge(['id_order' => $order->id_order]));

        //dd($paymentResponse);

        // Verificar resposta do pagamento
        if (!$paymentResponse['success']) {
            DB::rollBack();  // Reverter transação em caso de falha no pagamento
            return redirect()->route('/checkout')->with('error', 'Payment failed. ' . $paymentResponse['message']);
        }

        // Confirmar a transação após todos os passos
        DB::commit();

        // Limpar o carrinho e redirecionar para sucesso
        session()->forget('cart');
        return redirect()->route('orders.success', ['id_order' => $order->id_order])
            ->with('success', 'Your order has been placed successfully.');
    }


    public function checkout()
    {
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('layouts.clients.checkout', compact('cartItems'));
    }

    public function success($id_order)
    {
        $order = Order::where('id_order', $id_order)
            ->where('id_user', Auth::id())
            ->with(['orderItems.game.publisher'])
            ->firstOrFail();


        return view('layouts.clients.sucess', compact('order'));
    }
}
