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
        if (Auth::check()) {
            $user = Auth::User()->id;
            $cartdata = Cart::with('products')->where('user_id', $user)->get();
            // dd($cartdata);
            if($cartdata->count() == 0){
              session()->flash('EmptyCart', 'Nothing in your cart. Add some Products to view inside cart');
            }
            $totalPrice = 0;
            foreach($cartdata as $data){
                $itemTotal = $data->quantity * $data->price;
                $totalPrice +=$itemTotal;
            
            }
           
            return view('frontend.cart', compact('cartdata', 'user','totalPrice'));
        } else {
            return redirect()->route('front.login')->with('cartError', "You need to login first to see your cart!!");
        }
    }

    public function createCart(Request $request, $product_id)
    {

        if (Auth::Check()) {
            $product = Products::find($product_id);
            $user = Auth::user()->id;
            $newCart = new Cart();
            $newCart->user_id = $user;
            $newCart->product_id = $product->id;
            $newCart->quantity = $request->quantity;
            $newCart->price = $product->price;

            // dd($newCart );
            $newCart->save();

            // return response()->json([
            //     "status"=>'success',
            //     "data"=>$newCart
            // ]);
            return redirect()->route('shop.cart');
        } else {
            return redirect()->route('front.login')->with('cartError', "You need to login first to see your cart!!");
        }
    }
    public function addToCart($product_id)
    {

        if (Auth::Check()) {
            $product = Products::find($product_id);
            $user = Auth::user()->id;

            // dd($user);
            // dd($request->quantity);
            // dd($product);

            $newCart = new Cart();
            $newCart->user_id = $user;
            $newCart->product_id = $product->id;
            // $newCart->quantity = $request->quantity;
            $newCart->price = $product->price;

            // dd($newCart);
            $newCart->save();

            // return response()->json([
            //     "status"=>'success',
            //     "data"=>$newCart
            // ]);
            return redirect()->route('shop.cart');
        } else {
            return redirect()->route('front.login')->with('cartError', "You need to login first to see your cart!!");
        }
    }
    public function increase(Request $request,$id) {
        
        $request->validate([
            'quantity'=>'required|integer|min:1'
        ]);

        $newCart = Cart::with('products')->where('product_id', $id)->first();
        $newCart->quantity = $request->quantity;
        $newCart->save();
        
        // dd($newCart);
        return redirect()->back()->with('quantityUpdated','Item quantity updated! ');
        
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
