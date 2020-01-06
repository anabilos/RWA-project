<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
  public function show($id){
    $product=Product::where('id', $id)->firstOrFail();
    return view('product')->with('product',$product);

  }
}
