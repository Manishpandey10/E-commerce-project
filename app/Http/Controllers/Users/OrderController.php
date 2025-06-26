<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\BillingInfo;
use App\Models\DeliveryInfo;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orderData = Order::where('user_id', $user->id)->get();
        // dd($orderData);
        return view('users.orders.orderListing', compact('orderData'));
    }
    public function details($id)
    {
        $order = Order::find($id);
        // dd($order);

        $orderDetails = OrderItems::where('order_id', $order->id)->get();
        // dd($orderDetails);

        $shipping = DeliveryInfo::where('order_id', $order->id)->get();
        // dd($shipping);
        $billing = BillingInfo::where('order_id', $order->id)->get();
        return view('users.orders.orderDetails', compact('orderDetails', 'order', 'shipping', 'billing'));
    }
    public function returnOrder($id)
    {
        $orderItems = OrderItems::find($id);
        // dd($orderItems);
        $orderId = "E-comm:" . $orderItems->order_id;
        $order = Order::where('order_id', $orderId)->first();
        // dd($order);
        return view('users.orders.returnPage', compact('order'));
    }
    public function returnRequest($id, Request $request)
    {
        $request->validate(
            [
                'Description' => 'required'
            ],
            [
                'Description.required' => 'Description field is required.'
            ]
        );
    }
    public function cancelOrder($id)
    {
        $orderItems = OrderItems::find($id);
        // dd($orderItems);
        $orderId = "E-comm:" . $orderItems->order_id;
        $order = Order::where('order_id', $orderId)->first();
        return view('users.orders.cancelOrderPage', compact('order'));
    }
    public function cancelRequest($id, Request $request)
    {
        $request->validate(
            [
                'Description' => 'required'
            ],
            [
                'Description.required' => 'Description field is required.'
            ]
        );
    }
}
