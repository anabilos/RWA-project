<?php
use App\Http\Requests\CheckoutRequest;
namespace App\Http\Controllers\Admin;
use App\User;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered(){
        $users=User::all();
        return view ('admin.register')->with('users',$users);
    }
    public function orders(){
      $orders=Order::all();
    
      return view ('admin.orders')->with('orders',$orders);
    }

    public function registeredit(Request $request, $id){
        $users=User::findOrFail($id);

        return view('admin.role-edit')->with('users',$users);


    }
    public function ordersedit(Request $request, $id){
        $orders=Order::findOrFail($id);

        return view('admin.orders-edit')->with('orders',$orders);


    }
    public function registerupdate(Request $request, $id){
        $users=User::find($id);
        $users->role=$request->input('role');
        $users->update();
        return redirect('/role-register')->with('success_message','Vaša baza je uspješno ažurirana!');

    }
    public function ordersupdate(Request $request, $id){
        $orders=Order::find($id);
        $orders->shipped=$request->input('shipped');
        $orders->update();
        return redirect('/orders')->with('success_message','Vaša baza je uspješno ažurirana!');

    }


    public function registerdelete(Request $request, $id){
        $users=User::findOrFail($id);
        $users->delete();
        return redirect('/orders')->with('success_message','Vaša baza je uspješno izbrisana!');
}
public function ordersdelete(Request $request, $id){
    $orders=Order::findOrFail($id);
    $orders->delete();
    return redirect('/orders')->with('success_message','Vaša baza je uspješno izbrisana!');
}
}
