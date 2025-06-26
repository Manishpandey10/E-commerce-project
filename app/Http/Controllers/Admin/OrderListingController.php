<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderListingController extends Controller
{
    public function index(){
        $orderData = Order::all();
        // dd($orderData);
        return view('admin.orders.orderDetails', compact('orderData'));
    }
    public function updateDeliveryStatus(Request $request, $id){
        $request->validate([
            'delivery_status'=>'required|in:Pending,Not Delivered,Delivered'
        ]);

        $order = Order::find($id);
        // dd($order);

        $order->delivery_status = $request->delivery_status;
        $order->save();

        return redirect()->back()->with('deliveryStatus','Your delivery status has been changed.');

    }
}
