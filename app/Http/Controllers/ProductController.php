<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
 public function index()
 {
      //return view db to window index page
     $products = Product::all();
    return view('products.index',['products'=>$products]);  
 }
 public function create()
 {
    return view('products.create');
 }
 public function store(Request $request)
 {
  
    $data = $request->validate([
     'image' => 'required',
      'name' => 'required',
    'qty' =>'required|numeric',
    'price' =>'required|decimal:0,2',
    'description' =>'nullable'
    ]);
    $data['image']="images/".time()."-".$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$data['image']);
   
      $newProduct = Product::insert($data);
      return redirect(route('product.index'));
  }

  public function edit(Product $product)
  {
   return view('products.edit',['product'=>$product]);
  }
    public function update(Product $product, Request $request)
     {
      $data = $request->validate([
       
      'name' =>'required',
      'qty' =>'required|numeric',
      'price' =>'required|decimal:0,2',
      'description' =>'nullable'
      ]);
      if(!empty($_FILES['image']['name']))
      {

       $data['image']="images/".time()."-".$_FILES['image']['name'];
       move_uploaded_file($_FILES['image']['tmp_name'],$data['image']);

      }
   
      Product::where(['id'=>$request->id])->update($data);
      return redirect(route('product.index'))->with('success','Product update successfully');
     }
   //   create a delete function
     public function destroy(Product $product)
     {
      $product->delete();
      // when product is delete the msg come 
            return redirect(route('product.index'))->with('success','Product delete successfully');
     }
 }

