<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
// use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Configure;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
// use Request;
use Session;
class Dashboard extends Controller
{


  //后台首页，先查询服务器是否到期，到期则直接退出。
    public function dashboard()
    {
        $data['nickname'] = session('admin');//session('managerId')
        // dd($data);
        $data['conf'] = Configure::first();
        $stopDate = $data['conf']->stopDate;
        if (time()>strtotime($stopDate)) {
            //中间件根据session里的manager判断是否登陆。假如服务器过期了，但账号密码正确的话会记录manager，可以绕过bgDashboard地址直接访问其他后台模块
            Session::forget('manager');
            return redirect('/login')->with('info', '你的网站服务器已到期，请联系开发商续费');
        }
        return view('backend/index', $data);
    }



    public function adminpwdchange()
    {
      $data['nickname'] = session('admin');//session('managerId')
      if($input = Input::all()){
        $rules=[
          'password' => 'required|between:3,20|confirmed',

        ];
        $message = [
          'password.required' => '新密码不能为空',
          'password.between' => '新密码6-20位之间',
          'password.confirmed' => '您输入的两次密码不一致',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
          $admin = Administrator::first();
          $_password = Crypt::decrypt($admin->password);
          if($input['oldPwd'] == $_password){
            $admin->password = Crypt::encrypt($input['password']);
            $admin->update();
            return redirect('dashboard');
          }else {
            return back()->withErrors('原密码错误！');
          }
        }else {
          return back()->withErrors($validator);
        }
      }else{
        return view('backend/passwordchange',$data);
      }
    }
}
