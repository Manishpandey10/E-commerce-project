<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ManageCategoryController extends Controller
{
    public function index()
    {
        $categorydata= Category::all();
        // dd($categorydata);
        return view('admin.category.manageCategory', compact('categorydata'));
    }
    public function show()
    {
        return view('admin.category.addNewCategory');
    }
    public function create(Request $request)
    {
        $request->validate(
            [
                'categoryname' => 'required',
                'thumbnail' => 'required|image|mimes:png,jpg,jpeg',
                'productStatus' => 'required||in:0,1'
            ],
            [
                'categoryname.required' => " Product Category Name field is required.",
                'thumbnail.required' => 'Upload Thumbnail field is required.',
                'productStatus.required' => 'Product status option field is required.',
                'productStatus.in' => 'Product status option field is required.',

            ]
        );
        $newCategory = new Category();
        $newCategory->name = $request->categoryname;
        if ($request->hasFile('thumbnail')) {
            $newCategory->image = $request->file('thumbnail')->store('CategoryThumbnail', 'public');

        }
        $newCategory->status = $request->productStatus;
        // dd($newCategory);
        $newCategory->save();
        return redirect()->route('manage.category')->with('categoryAdded','New product category has been added.');
    }
    
    
    public function edit($id){
        $categorydata = Category::find($id);
        // dd($categorydata);
        return view('admin.category.editCategory', compact('categorydata'));
    }
    public function update(Request $request , $id){
        $request->validate([
            'categoryname'=>'required',
            'thumbnail'=>'nullable|image|mimes:png,jpg,jpeg',
            'productStatus'=>'required|in:0,1'
        ],[
            'categoryname.required'=>'Product Category Name field is required.',
            'productStatus.required'=>'Status  field is required.',
            'productStatus.in'=>'Status  field is required.',
        ]);
        $newCategory = Category::find($id);
        $newCategory->name = $request->categoryname;
        $newCategory->status = $request->productStatus;
        if ($request->hasFile('thumbnail')) {
            $newCategory->image = $request->file('thumbnail')->store('CategoryThumbnail', 'public');

        }
        // dd($newCategory);
        $newCategory->save();
        return redirect()->route('manage.category')->with('CategoryUpdate', "category details has been updated!");
    }
    
public function delete($id) {
        $data = Category::find($id);
        // dd($data);
        $data->delete();
        return redirect()->route('manage.category')->with('CategoryDelted', ' product category has been deleted');
    }}
