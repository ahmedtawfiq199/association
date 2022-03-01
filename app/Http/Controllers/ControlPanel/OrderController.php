<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        # code...
        $orders = Order::latest()->get();

        return view('control-panel.orders.index',[
            'orders' => $orders,
        ]);
    }

    public function edit(Order $order)
    {
        # code...
        return view('control-panel.orders.edit',[
            'order' => $order,
        ]);
    }

    public function update(Request $request,Order $order)
    {
        # code...
        $request->validate([
            'status' => 'required',
            'note' => 'nullable|string'
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success','Order Status Or Notification Updated Done!');;
    }

    public function destroy(Order $order)
    {
        # code...
        $order->delete();
        return redirect()->route('orders.index')->with('success','Order Deleted Done!');

    }
}
