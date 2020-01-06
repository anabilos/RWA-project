<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered(){
        $users=User::all();
        return view ('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request, $id){
        $users=User::findOrFail($id);

        return view('admin.role-edit')->with('users',$users);


    }
    public function registerupdate(Request $request, $id){
        $users=User::find($id);
        $users->role=$request->input('role');
        $users->update();
        return redirect('/role-register')->with('success','Vaša baza je uspješno osvježena');

    }

    public function registerdelete(Request $request, $id){
        $users=User::findOrFail($id);
        $users->delete();
        return redirect('/role-register')->with('success','Vaša baza je uspješno izbrisana');
}
}
