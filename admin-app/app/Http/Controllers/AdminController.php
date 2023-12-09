<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use Hash;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
        ]);

        $admin= new Admin();
        $admin->email = $request->email;
        $admin->password =Hash::make($request->password);
        $result = $admin->save();

        if($result){
            return back()->with('success','You have registered succesuflly');
        }else{
            return back()->with('fail', 'something wrong');
        }
    }
    public function loginAdmin(Request $request){

        $request->validate([

            'email' => 'required|email|unique:admins,email',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'

    ]);

    $admin = Admin::where('email','=',$request->email)->first();
    if($admin){
        if(Hash::check($request->password,$admin->password)){
            $request->Session()->put('loginId', $admin->id);
            return view('admin.index');
        }else{
            return back()->with('fail', 'The password not matches.');
        }
    }else{
        return back()->with('fail', 'This email is not registered.');
    }
    }

    public function logout(){

        if(Session::has('loginId')){
            Session::pull('loginId');
            return view('auth.login');
        };
    }
}
