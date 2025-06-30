<?php

namespace App\Http\Controllers\Frontend\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index()
    {
        $productdata = Products::all();
        $user = Auth::user();

        // dd($productdata);
        return view('frontend.landing_page.index', compact('productdata', 'user'));
    }
    public function shop(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $productData = Products::where('name', 'LIKE', "%$search%")->get();
        } else {
            $productData = Products::all();
        }
        $category = Category::all();
        $user = Auth::user();


        // if(Auth::check()){
        //     $user = Auth::user();
        //     return view('frontend.shop_page',compact('productData','category','user'));
        // }
        // else{
        //     return view('frontend.shop_page',compact('productData','category'));

        // }

        // dd($user);
        return view('frontend.shop_page', compact('productData', 'category', 'user'));
    }

    public function filter($id)
    {
        // $productData = Productdata::all();

        $category = Category::all();
        $productData = Products::where('category_id', $id)->get();

        return view('frontend.shop_page', compact('category', 'productData'));
    }
    public function lowPriceSort()
    {
        $category = Category::all();
        $productData = Products::whereBetween('price', [0, 100])->get();
        // dd($productData);
        return view('frontend.shop_page', compact('category', 'productData'));
    }
    public function highPriceSort()
    {
        $category = Category::all();

        $productData = Products::whereBetween('price', [100, 500])->get();
        // dd($productData);
        return view('frontend.shop_page', compact('category', 'productData'));
    }
    public function productDetails($id)
    {
        $details = Products::where('id', $id)->get();
        $user = Auth::User();

        // dd($user);
        // dd($details);
        return view('frontend.productDetails', compact('details', 'user'));
    }
}
