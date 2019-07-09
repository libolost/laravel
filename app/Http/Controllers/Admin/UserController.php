<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入Hash加密类
use Hash;
//导入模型类
use App\Models\User;
use DB;
//导入检验请求类
use App\Http\Requests\UserInsertRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索参数
        $k = $request -> input("keyword");
        //获取列表数据
        $data = User::where ("username","like","%".$k."%") -> paginate(5);
        //加载用户列表模板
        return view("Admin.User.index",['data'=>$data,'request'=>$request -> all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模板
        return view("Admin.User.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //去除字段
       $data = $request -> except(['repassword','_token']);
       //加密密码
       $data['password'] = Hash::make($data['password']);
       $data['status'] = 1;
    //    $data['token'] = str_random(50);
       //执行数据库插入
       if(User::create($data))
       {
           return redirect("/adminuser") -> with("success","添加成功");
       }else
       {
           return redirect("/adminuser") -> with("success","添加失败");
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
        $data = User::find($id);
        return view("Admin.User.edit",['data'=>$data]);
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
        //获取修改的数据
        $data = $request -> except(['_token','_method']);
        if(DB::table("user") -> where("id","=",$id) -> update($data))
        {
            return redirect("/adminuser") -> with("success","修改成功");
        }else
        {
            return back() -> with("error","修改失败");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除用户
        if(User::where("id","=",$id) -> delete())
        {
            return redirect("/adminuser") -> with("success","删除成功");
        }else
        {
            return redirect("/adminuser") -> with("error","删除失败");    
        }
    }
}
