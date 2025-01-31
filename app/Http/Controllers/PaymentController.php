<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function processPayment(PaymentRequest $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'payment_method' => 'required|string',
            'id_order' => 'required|integer|exists:orders,id_order',
            'amount' => 'required|numeric',
        ]);

        $payment = Payment::create([
            'id_order' => $request->id_order,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'paid',
        ]);

        return ['success' => true];
    }

    public function paymentStatus($id_order)
    {
        $payment = Payment::where('id_order', $id_order)->firstOrFail();
        return response()->json(['payment_status' => $payment->status]);
    }
}
