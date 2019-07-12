<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //退出（销毁session）
        $request->session()->pull("adminname");
        //跳转到登录界面
        return redirect("/adminlogin/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("Admin.Admin.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //检测当前登录的管理员和密码是否在数据表里（管理员）
        $name=$request->input("name");
        $password=$request->input("password");
        // //检测管理员名字
        $info=DB::table("admin_users")->where("name","=",$name)->first();
        
         if($info){
           //echo "管理员ok";
           // 检测密码
               if (Hash::check($password,$info->password)) {
                   //echo "ok";
                   //把登录的管理员存储在session
                   session(['adminname'=>$name]);
                   return redirect("/Admin")->with("success","登录成功");
               }else{
                  return back()->with("error","密码有误");
             }  
               
        }else{
            return back()->with("success","管理员有误");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
