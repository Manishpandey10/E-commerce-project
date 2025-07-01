<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Http\Controllers\Controller;
use App\Models\BillingInfo;
use App\Models\Cart;
use App\Models\DeliveryInfo;
use App\Models\Order;
use App\Models\OrderItems;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class CheckOutController extends Controller
{
    public function index()
    {
        if(Auth::Check()){
            return view('frontend.checkout.shippingInfo');
        }
        else{
            return redirect()->route('front.login')->with('cartError', "You need to login first!");
        }
    
    }
    public function order(Request $request)
    {

        // dd(Auth::user()->email);
        $request->validate(
            [
                "name" => 'required',
                "email" => "required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/",
                "phone" => 'required|regex:/^\d{10}$/',
                "country" => 'required',
                "state" => 'required',
                "city" => 'required',
                "pincode" => 'required',

                'billing_name' => 'sometimes|required|string|max:255',
                'billing_email' => 'sometimes|required|email',
                'billing_address' => 'sometimes|required|string',
                'billing_country' => 'sometimes|required|string',
                'billing_state' => 'sometimes|required|string',
                'billing_city' => 'sometimes|required|string',
                'billing_pincode' => 'sometimes|required|string',
                'billing_phone' => 'sometimes|required|digits:10',
            ],

            [
                'name.required' => 'Full Name field is required.',
                'email.required' => 'Email field is required.',
                'phone.required' => 'Phone Number field is required.',
                'country.required' => 'Country field is required.',
                'state.required' => 'State field is required.',
                'city.required' => 'City field is required.',
                'pincode.required' => 'Pincode field is required.',
                

            ]
        );

        try {
            DB::transaction(function () use ($request) {
                $user = Auth::user();
                // $userId = $user->id;

                $Itemdata = Cart::with('products')->where('user_id', Auth::user()->id)->get();
                // dd($Itemdata);


                $total = 0;
                $price = 0;
                foreach ($Itemdata as $data) {
                    $itemTotal = $data->quantity * $data->price;
                    $total += $itemTotal;
                    $price = $data->price;
                }

                //creating a order now 

                $order = new Order();
                $order->invoice_id = 'Random_invoice_id';
                $order->txn_id = 'Random_txn_id';
                $order->user_id = Auth::user()->id;
                $order->name = $request->name;
                $order->price = $price;
                $order->total = $total;
                $order->shipping = 0.00;
                $order->delivery_status = "Pending";
                $order->save(); 

                $order->order_id = 'E-comm:' . $order->id; 
                $order->save();


                //saving order items
                foreach ($Itemdata as $data) {

                    $items = new OrderItems();
                    $items->order_id = $order->order_id;
                    $items->product_id = $data->products->id;
                    $items->user_id = Auth::user()->id;
                    $items->sku = "SKU-ABC";
                    $items->product_name = $data->products->name;
                    $items->quantity = $data->quantity;
                    $items->price = $price;
                    $items->image = $data->products->image;
                    $items->save();
                }


                $delivery = new DeliveryInfo();
                $delivery->order_id =$order->order_id;

                $delivery->user_id = $user->id;
                $delivery->name = $request->name;
                $delivery->email = $request->email;
                $delivery->phone = $request->phone;
                $delivery->address = $request->address;
                $delivery->country = $request->country;
                $delivery->state = $request->state;
                $delivery->city = $request->city;
                $delivery->pincode = $request->pincode;
                $delivery->save();
                // billing info 

               $billing = new BillingInfo();
                $billing->order_id = $order->order_id;
                $billing->user_id = $user->id;
                $billing->name = $request->input('billing_name', $request->input('name'));
                $billing->email = $request->input('billing_email', $request->input('email'));
                $billing->phone = $request->input('billing_phone', $request->input('phone'));
                $billing->address = $request->input('billing_address', $request->input('address'));
                $billing->country = $request->input('billing_country', $request->input('country'));
                $billing->state = $request->input('billing_state', $request->input('state'));
                $billing->city = $request->input('billing_city', $request->input('city'));
                $billing->pincode = $request->input('billing_pincode', $request->input('pincode'));
                $billing->save();
            });

            //emptying the cart

            Cart::where('user_id', Auth::user()->id)->delete();

            DB::commit();

            return redirect()->route('order.success');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to save order', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'error' => $e->getMessage(),
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'msg' => "helloww made order!!!"
        ]);

        // $items = new OrderItems();
        // $items->order_id = "some";
        // $items->user_id = $user->id;
        // $items->product_id = "product id ";
        // $items->sku = "random value";
        // $items->product_name = "random value";

        // return redirect()->route('order.success');
    }
    public function orderSuccess()
    {
        return view('frontend.checkout.orderSuccess');
    }
}
