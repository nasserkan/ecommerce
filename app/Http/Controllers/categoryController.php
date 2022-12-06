<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
    public function index() {
        $allcategories = Category::all();
         return view('category.allCategory',compact('allcategories'));
    }

    public function test() {
        $allcategories = Category::all();
         return view('category.test');
    }

    public function test2() {
        $allcategories = Category::all();
         return view('category.test2');
    }

    public function test3() {
        $allcategories = Category::all();
         return view('category.test3');
    }

    public function test4() {
        $allcategories = Category::all();
         return view('category.test4');
    }

    public function testexcel() {
        $allcategories = Category::all();
         return view('category.testexcel');
    }

    public function add() {
        return view('category.addCategory');
      //return '123456';
   }

   public function insertt(Request $request) {
    //return view('category.addCategory');
    //return redirect('home')-> with ('status',"category added successfully");
    return '123456';
 }

   public function insert5(Request $request) {
    $category = new Category();

    $file = $request->file('image');
    $ext = $file->getClientOriginalExtension();
    $filename = time().'.'.$ext;

    $file->move('assets/uploads/category/'.$filename);
    $category-> image = $filename;

   $category-> name = $request-> input('name');
   $category-> slug = $request-> input('slug');
   $category-> description = $request-> input('description');
   $category-> status = $request-> input('status') == true ? '1' : '0';
   $category-> popular = $request-> input('popular') == true ? '1' : '0';
   $category-> meta_title = $request-> input('meta_title');
   $category-> meta_descrip = $request-> input('meta_descrip');
   $category-> meta_keywords = $request-> input('meta_keywords');
   $category-> save();
   return redirect('allCategory')-> with ('status',"category added successfully");
}

   public function insert(Request $request) {
   $category = new Category();

   if($request-> hasFile('image'))
   {
    $file = $request->file('image');
    $ext = $file->getClientOriginalExtension();
    $filename = time().'.'.$ext;
    $file->move('assets/uploads/category/', $filename);
    $category-> image = $filename;
   }
   $category-> name = $request-> input('name');
   $category-> slug = $request-> input('slug');
   $category-> description = $request-> input('description');
   $category-> status = $request-> input('status') == true ? '1' : '0';
   $category-> popular = $request-> input('popular') == true ? '1' : '0';
   $category-> meta_title = $request-> input('meta_title');
   $category-> meta_descrip = $request-> input('meta_descrip');
   $category-> meta_keywords = $request-> input('meta_keywords');
   $category-> save();
   return redirect('allCategory')-> with ('status',"category added successfully");
}

public function edit($id) {
    //return view('category.addCategory');
    //return redirect('home')-> with ('status',"category added successfully");
    return '123456';
 }

 public function update(Request $request) {
    $id = $request -> id;
    $category = Category::find($id);
   if($request-> hasFile('image'))
   {
    $file = $request->file('image');
    $ext = $file->getClientOriginalExtension();
    $filename = time().'.'.$ext;
    $file->move('assets/uploads/category/', $filename);
    $category-> image = $filename;
   }
   $category-> name = $request-> input('name');
   $category-> slug = $request-> input('slug');
   $category-> description = $request-> input('description');
   $category-> status = $request-> input('status') == true ? '1' : '0';
   $category-> popular = $request-> input('popular') == true ? '1' : '0';
   $category-> meta_title = $request-> input('meta_title');
   $category-> meta_descrip = $request-> input('meta_descrip');
   $category-> meta_keywords = $request-> input('meta_keywords');
   $category-> update();
   return redirect('allCategory')-> with ('status',"category updated successfully");
 }

 public function delete($id) {
    $category = Category::find($id);
    $category-> delete();
    return redirect('allCategory')-> with ('status',"category deleted successfully");
 }

   public function model() {
    return view('category.modelCategory');
}
    //
}
