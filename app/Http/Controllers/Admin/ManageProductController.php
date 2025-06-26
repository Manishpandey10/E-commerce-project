<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ManageProductController extends Controller
{
    public function index()
    {
        $productdata = Products::with('category')->get();
        // dd($productdata);
        return view('admin.product.manageProducts', compact('productdata'));
    }
    public function show()
    {
        $category  = Category::all();
        // dd($category);
        return view('admin.product.addNewProduct',compact('category'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'productname' => 'required',
            'productCategory' => 'required',
            'productDescription'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
            'productStatus' => 'required|in:0,1',

        ], [
            'productname.required' => 'Enter Product Name field is required.',
            'productCategory.required' => 'Category field is required.',
            'thumbnail.required' => 'Upload Thumbnail field is required.',
            'productStatus.required' => 'Status  field is required.',
            'price.required' => 'Enter Price field is required.',
            'discount.required' => 'Enter discount field is required.',
            'productStatus.in' => 'Status filed is required.',

        ]);
        $newProduct = new Products();

        $newProduct->name= $request->productname;
        $newProduct->category_id = $request->productCategory;
        $newProduct->description = $request->productDescription;

        if(!$request->productCategory === 'null'){
            $newProduct->category_id= $request->productCategory;
        }
        if ($request->hasFile('thumbnail')) {

        $newProduct->image = $request->file('thumbnail')->store('ProductThumbnail', 'public');
        }
        $newProduct->price = $request->price;
        $newProduct->discount = $request->discount;
        $newProduct->status = $request->productStatus;

        // dd($newProduct);
        $newProduct->save();

        return redirect()->route('manage.product')->with('productAdded',"New Product has been added");


    }
    public function edit($id)
    {
        $productdata = Products::find($id);
        
        $category = Category::get();
        
        return view('admin.product.editProduct', compact('productdata','category'));
    }

    public function update(Request $request,$id) {
        $request->validate([
            "productname" => "required",
            "productCategory" => "required",
            "productDescription" => "required",
            "productthumbnail" => "nullable|image|mimes:png,jpg,jpeg",
            "productStatus" => "required|in:0,1",
            "price" => "required",
            "discount" => "required",
        

        ], [
            'productname.required' => 'Enter Product Name field is required.',
            'productCategory.required'=>'Category field is required.',
            'productDescription.required' => 'Enter Product Description field is required.',
            'productthumbanil.required' => 'Upload Thumbnail field is required.',
            'productStatus.in' => 'Status field is required.',
            'price.required' => 'Price field is required.',
            'discount.required' => 'Discount field is required.',
        ]);

        $updateData = Products::find($id);
        $updateData->name = $request->productname;
        $updateData->category_id = $request->productCategory;
        $updateData->description = $request->productDescription;
        if ($request->hasFile('productthumbnail')) {
            $updateData->productthumbnail = $request->file('productthumbnail')->store('productpicture', 'public');
        }
        $updateData->price = $request->price;
        $updateData->discount = $request->discount;


        // dd($updateData);
        $updateData->save();
         return redirect()->route('manage.product')->with('productUpdated', "Product details has been updated");

    }
    public function delete($id) {
        $data = Products::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('manage.product')->with('productDelted', ' product has been deleted');
    }
}
