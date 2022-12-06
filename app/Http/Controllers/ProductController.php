<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index() {
        $allproducts = Product::all();
        $allcategory = Category::all();
         return view('product.allproducts',compact('allproducts','allcategory'));
    }

    public function add() {
        return view('product.addProduct');
      //return '123456';
   }

   public function insert(Request $request) {
    $product = new Product();
    if($request-> hasFile('image'))
    {
     $file = $request->file('image');
     $ext = $file->getClientOriginalExtension();
     $filename = time().'.'.$ext;
     $file->move('assets/uploads/product/',$filename);
     $product-> image = $filename;
    }
    $product-> cate_id = $request-> input('cate_id');
    $product-> name = $request-> input('name');
    $product-> small_description = $request-> input('small_description');
    $product-> description = $request-> input('description');
    $product-> original_price = $request-> input('original_price');
    $product-> selling_price = $request-> input('selling_price');
    $product-> qty = $request-> input('qty');
    $product-> tax = $request-> input('tax');
    $product-> status = $request-> input('status') == true ? '1' : '0';
    $product-> trending = $request-> input('trending') == true ? '1' : '0';
    $product-> meta_title = $request-> input('meta_title');
    $product-> meta_description = $request-> input('meta_description');
    $product-> meta_keywords = $request-> input('meta_keywords');
    $product-> save();
    return redirect('allProducts')-> with ('status',"product added successfully");
 }

 public function edit($id) {
     //return view('category.addCategory');
     //return redirect('home')-> with ('status',"category added successfully");
     return '123456';
  }

  public function update(Request $request) {
    $id = $request -> id;
    if($request-> hasFile('image'))
    {
     $file = $request->file('image');
     $ext = $file->getClientOriginalExtension();
     $filename = time().'.'.$ext;
     $file->move('assets/uploads/product/',$filename);
     $product-> image = $filename;
    }
    $product-> name = $request-> input('name');
    $product-> small_description = $request-> input('small_description');
    $product-> description = $request-> input('description');
    $product-> original_price = $request-> input('original_price');
    $product-> selling_price = $request-> input('selling_price');
    $product-> qty = $request-> input('qty');
    $product-> tax = $request-> input('tax');
    $product-> status = $request-> input('status') == true ? '1' : '0';
    $product-> trending = $request-> input('trending') == true ? '1' : '0';
    $product-> meta_title = $request-> input('meta_title');
    $product-> meta_description = $request-> input('meta_description');
    $product-> meta_keywords = $request-> input('meta_keywords');
    $product-> save();
    return redirect('allProducts')-> with ('status',"product updated successfully");
   }

public function delete($id) {
    $product = Product::find($id);
    $product-> delete();
    return redirect('allProducts')-> with ('status',"product deleted successfully");
}

public function show($id) {
    $product = Product::find($id);
    return view('product.show',compact('product'));
}



}
