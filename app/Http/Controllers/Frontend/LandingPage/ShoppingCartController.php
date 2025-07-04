<?php

namespace App\Http\Controllers\Frontend\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Surfsidemedia\Shoppingcart\Facades\Cart;

class ShoppingCartController extends Controller
{
    public function index()
    {
        // if (Auth::check()) {
            // $user = Auth::User()->id;
            $user = "Guest";
            $cartdata = Cart::with('products')->where('user_id', $user)->get();
            // dd($cartdata);
            if ($cartdata->count() == 0) {
                session()->flash('emptyCart', 'Nothing in your cart. Add some Products to view inside cart');
            }
            $totalPrice = 0;
            foreach ($cartdata as $data) {
                $itemTotal = $data->quantity * $data->price;
                $totalPrice += $itemTotal;
            }

            // } else {
                //     return redirect()->route('front.login')->with('cartError', "You need to login first to see your cart!!");
                // }
            return view('frontend.cart', compact('cartdata', 'user', 'totalPrice'));
    }

    public function createCart(Request $request, $product_id)
    {

        // if (Auth::Check()) {
            $product = Products::find($product_id);
            // $user_id = Auth::user()->id;
            $user_id = "Guest";

            $quantity = $request->quantity;
            $cartItem = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

            if ($cartItem) {
                // If item exists, update the quantity
                $cartItem->quantity += $quantity;
                $cartItem->save();
                return redirect()->route('shop.cart')->with('success', 'Product quantity updated in cart!');
            } else {
                // $user = Auth::user()->id;
                $user = "Guest";
                $newCart = new Cart();
                $newCart->user_id = $user;
                $newCart->product_id = $product->id;
                $newCart->quantity = $request->quantity;
                $newCart->price = $product->price;

                // dd($newCart );
                $newCart->save();


            }
            // } else {
                //     return redirect()->route('front.login')->with('cartError', "You need to login first to see your cart!!");
                // }
            return redirect()->route('shop.cart');
    }
    public function addToCart(Request $request, $product_id)
    {

        // if (Auth::Check()) {
            $product = Products::find($product_id);
            // $user = Auth::user()->id;
            $user = "Guest";

            // dd($user);
            // dd($request->quantity);
            // dd($product);
            $cartItem = Cart::where('user_id', $user)->where('product_id', $product_id)->first();

            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->save();
                return redirect()->route('shop.cart')->with('quantityUpdated', 'Item quantity updated! ');
            } else {


                $newCart = new Cart();
                $newCart->user_id = $user;
                $newCart->product_id = $product->id;
                // $newCart->quantity = $request->quantity;
                $newCart->price = $product->price;

                // dd($newCart);
                $newCart->save();
            }

            // } else {
                //     return redirect()->route('front.login')->with('cartError', "You need to login first to see your cart!!");
                // }
            return redirect()->route('shop.cart');
    }
    public function increase(Request $request, $id)
    {

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $newCart = Cart::with('products')->where('product_id', $id)->first();


        dd($newCart);

        $newCart->quantity = $request->quantity;
        $newCart->save();

        return redirect()->back()->with('quantityUpdated', 'Item quantity updated! ');
    }
    public function decrease(Request $request, $id)
    {

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $newCart = Cart::with('products')->where('product_id', $id)->first();


        // dd($newCart);

        $newCart->quantity = $request->quantity;
        $newCart->save();

        return redirect()->back()->with('quantityUpdated', 'Item quantity updated! ');
    }

    public function updateUsingAjax(Request $request,$id){
         $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::with('products')->where('product_id',$id)->first();
        // dd($cartItem);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        //now accessing the cart total price 
        $user_id = "Guest";
        $cartData = Cart::with('products')->where('user_id',$user_id)->get();
        $TotalPrice = 0;
        foreach($cartData as $data){
            $total = $data->quantity * $data->price;
            $TotalPrice += $total;
        }

        return response()->json([
            'status'=>"success",
            "data"=>$cartItem,
            "total"=>$TotalPrice
        ]);
    }
    public function update(Request $request, $id)
    {
        if (Auth::Check()) {
            $cart_id = $id;
            $user = Auth::user()->id;
            $newCart = Cart::where('id', $cart_id)->where('user_id', $user)->get();

            // dd($newCart);
            // dd($newCart->quantity);

            $newCart->quantity = $request->quantity;
            // dd($newCart);

            $newCart->save();

            return redirect()->route('shop.cart')->with("cartUpdated", "Cart items has been updated!!");
        } else {
            return redirect()->route('front.login')->with('cartError', "You need to login first to see your cart!!");
        }
    }

    public function delete($id)
    {
        $data = Cart::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('shop.cart')->with('emptyCart', 'Product Has been removed from the cart');
    }
}
