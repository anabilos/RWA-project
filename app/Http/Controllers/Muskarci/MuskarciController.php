<?php
namespace App\Http\Controllers\Muskarci;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class MuskarciController extends Controller
{

  public function index()
  {

    $pagination=5;
    $categories=Category::all();

    if(request()->category){
      $products=Product::where('gender_id','=',2)->whereHas('category',function ($query){
        $query->where('name','=',request()->category);
      });


      $categoryName=$categories->where('name','=',request()->category)->first()->name;
  }else{
      $products=Product::where('gender_id','=',2);
      $categoryName='Sportski outlet za muškarce';
    }
    if(request()->sort=='low_high'){
      $products=$products->orderBy('price')->paginate($pagination);
    }
    elseif(request()->sort=='high_low'){
      $products=$products->orderBy('price','desc')->paginate($pagination);
    }
    elseif(request()->sort=='alphabet'){

      $products=$products->orderBy('name')->paginate($pagination);
    }
    else{
      $products=$products->paginate($pagination);
    }

    return view('muskarci.index')->with([

      'products'=>$products,
      'categories'=>$categories,
      'categoryName'=>$categoryName,
    ]);
  }




}
    

