<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $productsz=Product::where('gender_id','=',1)->inRandomOrder()->take(2)->get();
      $productsm=Product::where('gender_id','=',2)->inRandomOrder()->take(2)->get();


          return view('home');->with([

          'productsz'=>$productsz,
          'productsm'=>$productsm,

        ]);
    }


}
