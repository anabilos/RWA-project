<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class IsAdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        if(Auth::user()->isAdmin()){
            return $next($request);
        }
        else{

            return redirect('home');
        }
    }
}
