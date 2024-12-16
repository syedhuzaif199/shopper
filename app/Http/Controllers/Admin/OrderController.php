<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $status_colors = [
        'pending' => 'text-yellow-500',
        'processing' => 'text-yellow-500',
        'shipped' => 'text-blue-500',
        'delivered' => 'text-green-500',
        'declined' => 'text-red-500',
        'canceled' => 'text-red-500',
        'refunded' => 'text-green-500',
        'failed' => 'text-red-500',
    ];
    private $payment_status_colors = [
        'pending' => 'text-yellow-500',
        'paid' => 'text-green-500',
        'failed' => 'text-red-500',
    ];

    private $status_options = ['pending', 'processing', 'shipped', 'delivered', 'declined', 'canceled', 'refunded', 'failed'];
    private $payment_status_options = ['pending', 'paid', 'failed'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        $status_colors = $this->status_colors;
        $payment_status_colors = $this->payment_status_colors;
        return view("admin.orders.index", compact(["orders", "status_colors", "payment_status_colors"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.orders.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $status_colors = $this->status_colors;
        $payment_status_colors = $this->payment_status_colors;
        return view("admin.orders.show", compact(['order', 'status_colors', 'payment_status_colors']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $status_options = $this->status_options;
        $payment_status_options = $this->payment_status_options;
        return view("admin.orders.edit", compact(['order', 'status_options', 'payment_status_options']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributes = $request->validate([
            'status' => ['required', 'in:' . implode(',', $this->status_options)],
            'payment_status' => ['required', 'in:' . implode(',', $this->payment_status_options)],
        ]);


        $order = Order::findOrFail($id);
        $order->update($attributes);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
