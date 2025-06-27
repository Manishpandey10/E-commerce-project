<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\BillingInfo;
use App\Models\DeliveryInfo;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\RequestCancel;
use App\Models\RequestReturn;
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

        $orderDetails = OrderItems::where('order_id', $order->order_id)->get();
        // dd($orderDetails);

        $shipping = DeliveryInfo::where('order_id', $order->order_id)->get();
        // dd($shipping);
        $billing = BillingInfo::where('order_id', $order->order_id)->get();
        // dd($billing);
        return view('users.orders.orderDetails', compact('orderDetails', 'order', 'shipping', 'billing'));
    }
    public function returnOrder($id)
    {      
        // dd($id);
        
        $order = Order::where('order_id', $id)->get();
        // dd($order);
        


        return view('users.orders.returnPage', compact('order'));

    }
    public function returnRequest($id, Request $request)
    {
        $request->validate(
            [   
                'description' => 'required',
                'reason'=>'required|in:wrong_product,getting_late,changed_address'
            ]
        );

        $orderUpdate = Order::where('order_id',$id)->first();
        // dd($orderUpdate);   
        $returnData = new RequestReturn();
        $returnData->order_id = $id;
        $returnData->reason = $request->reason;
        $returnData->description = $request->description;
        $returnData->save();



        $orderUpdate->delivery_status = "Returned";
        $orderUpdate->save();
        return redirect()->route('user.order')->with('OrderReturned',"Your order return request has been submitted.");
        // return response()->json([
        //     "msg"=>"status updated."
        // ]);
        
    }
    public function cancelOrder($id)
    {
        // dd($id);
        $order = OrderItems::where('order_id', $id)->first();
        // dd($order);
        return view('users.orders.cancelOrderPage', compact('order'));
    }
    public function cancelRequest($id, Request $request)
    {
        $request->validate(
            [
                'description' => 'required',
                'reason'=>'required|in:not_liked,order_mistake,delivery_late,changed_address'

            ]
        );
        // dd($id);
         $orderUpdate = Order::where('order_id',$id)->first();
        // dd($orderUpdate);    
        $cancelData = new RequestCancel();
        $cancelData->order_id = $id;
        $cancelData->reason = $request->reason;
        $cancelData->description = $request->description;
        $cancelData->save();

        $orderUpdate->delivery_status = "Cancelled";
        $orderUpdate->save();
        return redirect()->route('user.order')->with('OrderCancelled',"Your order cancellation request has been submitted.");
    }
}
