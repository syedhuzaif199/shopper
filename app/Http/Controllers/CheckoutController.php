<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $addresses = Auth::user()->customerAddresses;
        $carts = Auth::user()->carts()->with('product')->get();
        return view('checkout.index', compact('addresses', 'carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_address_id' => 'required|exists:customer_addresses,id',
            'payment_method' => 'required|in:cash,paypal',
        ]);

        $address = Auth::user()->customerAddresses()->findOrFail($request->customer_address_id);
        $totalPrice = Auth::user()->carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity * (1 - $cart->product->discount_perc / 100) * (1 + $cart->product->gst_perc / 100);
        });


        $order = Auth::user()->orders()->create([
            'status' => 'pending',
            'total_price' => $totalPrice,
            'customer_address_id' => $address->id,
        ]);

        $order->products()->attach(
            Auth::user()->carts->map(function ($cart) {
                return [
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                    'discount_perc' => $cart->product->discount_perc,
                    'gst_perc' => $cart->product->gst_perc,
                ];
            })
        );

        $payment = $order->payment()->create([
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending',
            'payment_amount' => $totalPrice,
            'payment_currency' => 'USD',
        ]);

        Auth::user()->carts()->delete();

        if ($request->payment_method === 'cash') {
            $order->update(['status' => 'processing']);
            $payment->update(['payment_status' => 'pending']);
            return redirect()->route('order.show', $order->id);
        }

        return redirect()->route('payment.create', ['order_id' => $order->id, 'amount' => $totalPrice]);
    }
}
