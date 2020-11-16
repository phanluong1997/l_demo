<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Ridirect;
use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends Controller
{
    // get list
    public function getIndex(){
        $users = User::where('type','user')->paginate(5);
        return view('admin.user.index',['users' => $users]);
    }
    //get add
    public function getAdd(){
        $users = User::all();
        return view('admin.user.add');
    }
    public function postAdd(Request $request){

        $this->validate($request,
            [
              'name' => 'required|min:3|max:100',
            //   'email'=> 'required|email|unique:users,email',
              'password'=> 'required|min:3|max:50'
            ],
            [
              'name.required'=>'Bạn chưa nhập tên thể loại',
              'name.min'     =>'Tên thể loại phải có độ dài từ 3 tới 100 kí tự',
              'name.required'=>'Tên thể loại có dộ dài từ 3 tới 100 kí tự'
            ]
        );
        $type ='user';
        // for($i =1 ; $i<1000;$i++){
        //     $users =  new User;
        //     $users->name =$request->name.'-'.$i;
        //     $users->email = $request->email.'--'.$i;
        //     $users->password =$request->password.'--'.$i;
        //     $users->type = $type;
        //     $users->save();
        // }
        $users =  new User;
        $users->name =$request->name;
        $users->email =$request->email;
        $users->password =$request->password;
        $users->type = $type;
        $users->save();
        return redirect('admin/user/index')->with('thongbao','Thêm thành công');
    }
    public function search(Request $request){
        $search = $request->get('search');

        if($search!=""){
            $users = User::where(function ($query) use ($search){
                $query
                    ->orwhere('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            })
            ->paginate(5);
            $users->appends(['search' => $search]);
        }
        else{
            $users = User::paginate(5);
        }
        // $users = User::query()->where('name','like','%' .$search. '%')->orwhere('email','like','%' .$search. '%')->paginate(5);

        return view('admin.user.index',['users'=>$users,'search'=>$search]);
    }
}
