<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Http;

class PaypalController extends Controller
{
    public function index() {
        return view('paypal.index');
    }

    public function processPayPalPayment(Request $request)
    {
        $orderId = $request->input('orderID');
        $id_order = $request->input('id_order');

        try {
            $response = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
                ->get("https://api-m.sandbox.paypal.com/v2/checkout/orders/{$orderId}");

            if ($response->ok()) {
                $orderData = $response->json();

                if ($orderData['status'] === 'COMPLETED') {
                    Payment::create([
                        'id_order' => $id_order,
                        'amount' => $orderData['purchase_units'][0]['amount']['value'],
                        'payment_method' => 'paypal',
                        'status' => 'paid',
                    ]);

                    return ['success' => true];
                }
            }

            return ['success' => false, 'message' => 'PayPal payment validation failed.'];
        } catch (\Exception $e) {
            \Log::error('Error processing PayPal payment: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Error communicating with PayPal.'];
        }
    }

}
