<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal;

class PaymentController extends Controller
{

    public function create($order_id, $amount)
    {

        // validate the request

        // add the cart items to the order

        $paypal = new PayPal;
        $paypal->setApiCredentials(config('paypal'));
        $paypal->getAccessToken();
        $response = $paypal->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => env('PAYPAL_CURRENCY', 'USD'),
                        'value' => round($amount, 2),
                    ],

                ]


            ],
            'application_context' => [
                'cancel_url' => route('cart.index'),
                'return_url' => route('payment.capture', ['order_id' => $order_id]),
            ],
        ]);


        if (isset($response['id'])) {
            // Redirect user to PayPal payment page
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->back()->with('error', 'Something went wrong.');
    }

    public function capture(Request $request)
    {
        $paypal = new PayPal;
        $paypal->setApiCredentials(config('paypal'));
        $paypal->getAccessToken();
        $response = $paypal->capturePaymentOrder($request->token);
        $order = Order::find($request->order_id);
        $payment = $order->payment;

        if ($response['status'] === 'COMPLETED') {
            $payment->update([
                'payment_status' => 'paid',
            ]);
            $order->update(['status' => 'processing']);
            return redirect()->route('orders.index')->with('success', 'Payment successful!');
        }
        $payment->update(['payment_status' => 'failed']);
        return redirect()->route('error-page')->with('error', 'Payment failed.');
    }
}
