<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaypalController;

class PaymentController extends Controller
{
    public function processPayment(PaymentRequest $request)
    {
        //dd($request->all());
        Payment::create([
            'id_order' => $request->id_order,
            'id_user' => $request->id_user,
            'amount' => $request->amount,
            'payment_method' => 'credit_card',
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
