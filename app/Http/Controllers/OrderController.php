<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Library;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\LibraryController;

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
            return redirect()->route('home')->with('error', 'Your cart is empty.');
        }

        // Calcular o preço total
        $totalPrice = array_sum(array_column($cart, 'price'));

        // Iniciar transação para criar a ordem
        DB::beginTransaction();

        try {
            // Criar a order
            $order = Order::create([
                'id_user' => $user->id_user,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            // Criar itens da order
            foreach ($cart as $id_game => $item) {
                OrderItem::create([
                    'id_order' => $order->id_order,
                    'id_game' => $id_game,
                    'price' => $item['price'],
                ]);

                Library::create([
                    'id_user' => $user->id_user,
                    'id_game' => $id_game,
                    'id_order' => $order->id_order,
                ]);
                \App\Models\Wishlist::where('id_user', $user->id_user)
                    ->where('id_game', $id_game)
                    ->delete();
            }

            // Processar pagamento com cartão de crédito
            $paymentController = new PaymentController();
            $paymentResponse = $paymentController->processPayment($request->merge([
                'id_order' => $order->id_order,
                'id_user' => $user->id_user,
            ]));

            if (!$paymentResponse['success']) {
                DB::rollBack();  // Reverter transação em caso de falha no pagamento
                return redirect()->route('checkout')->with('error', 'Payment failed.');
            }

            // Confirmar a transação após todos os passos
            DB::commit();

            // Limpar o carrinho e redirecionar para sucesso
            session()->forget('cart');

            return redirect()->route('orders.success', ['id_order' => $order->id_order])
                ->with('success', 'Your order has been placed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('checkout')->with('error', 'An error occurred while placing your order.');
        }
    }

    public function placeOrderPaypal(Request $request)
    {

        $user = Auth::user();
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Your cart is empty.');
        }

        // Calcular o preço total
        $totalPrice = array_sum(array_column($cart, 'price'));


        // Iniciar transação para criar a ordem
        DB::beginTransaction();

        try {
            // Criar a order
            $order = Order::create([
                'id_user' => $user->id_user,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            // Criar itens da order
            foreach ($cart as $id_game => $item) {
                OrderItem::create([
                    'id_order' => $order->id_order,
                    'id_game' => $id_game,
                    'price' => $item['price'],
                ]);
                //Adiciona os jogos a library
                Library::create([
                    'id_user' => $user->id_user,
                    'id_game' => $id_game,
                    'id_order' => $order->id_order,
                ]);
                \App\Models\Wishlist::where('id_user', $user->id_user)
                    ->where('id_game', $id_game)
                    ->delete();
            }

            // Processar pagamento com Paypal
            $paypalController = new PaypalController();
            $paymentResponse = $paypalController->processPayPalPayment($request->merge(['id_order' => $order->id_order]));

            if (!$paymentResponse['success']) {
                DB::rollBack();  // Reverter transação em caso de falha no pagamento
                return redirect()->route('checkout')->with('error', 'Payment failed.');
            }

            DB::commit();

            session()->forget('cart');

            return response()->json([
                'success' => true,
                'message' => 'Your order has been placed successfully.',
                'redirect_url' => route('orders.success', ['id_order' => $order->id_order])
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('checkout')->with('error', 'An error occurred while placing your order.');
        }
    }


    public function checkout()
    {
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect()->route('home')->with('error', 'Your cart is empty.');
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
