<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('admin/admindemo/dashboard');
        }
        else{
            return Redirect::to('admin/login')->send();
        }
    }
    public function index(){
        return view('admin.login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.admindemo.dashboard');
    }
    public function dashboard(Request $request){
        $this->AuthLogin();
        $email = $request->email;
        $password = $request->password;

        $admin=User::where('type','admin')->where('email',$email)->where('password',$password)->first();
        // dd($admin);
        if($admin){
            Session::put('name',$admin->name);
            Session::put('id',$admin->id);
            return Redirect::to('/admin/admindemo/dashboard');
        }
        else{
            Session::put('message','Tai khoan hoac mk bi sai');
            return Redirect::to('/admin/index');
        }
        return view('admin.admindemo.dashboard');
    }
    public function logout(){

        return view('admin.admindemo.dashboard');
    }

}
