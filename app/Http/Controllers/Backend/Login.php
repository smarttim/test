<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
// use Session;
use Request;

class Login extends Controller
{
    //
    // public function login(){
    //   return view('backend.login');
    // }
    public function login()
   {
       if($input = Input::all()){
          //  if(strtoupper($input['code'])!=$_code){
          //      return back()->with('msg','验证码错误！');
          //  }
           $admin = Administrator::first();
           if($admin->name != $input['name'] || Crypt::decrypt($admin->password)!= $input['password']){
               return back()->with('msg','用户名或者密码错误！');
           }

           session(['admin'=>$admin]);
           return redirect('/dashboard');

       }else {
           return view('backend.login');
       }
   }

    // public function loginstore()
    // {
    //   $account = Request::input('name');
    //   $password = Request::input('password');
    //   $admin = Administrator::where('name',$account)->first();
    //   if(!$admin){
    //     return redirect('/login')->with('info','账号或者密码错误');
    //   }
    //   if (!password_verify($password, $admin->password)) {
    //       return redirect('/login')->with('info', '密码错误');
    //   }
    //   Session::put('admin',$account);
    //   Session::put('adminId',$admin->id);
    //   Session::put('nickname',$admin->nickname);
    //   return redirect('/dashboard');
    // }
    //
    public function logout()
    {
        session(['admin'=>null]);
        return redirect('/login');
    }
}
