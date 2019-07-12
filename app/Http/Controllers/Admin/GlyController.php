<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//导入校验请求类
use App\Http\Requests\AdminuserInsertRequest;
class GlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       $k = '';
        if($request->keyword){
           $k = $request -> input("keyword");
        } 
                                          
        $data=DB::table("admin_users")->where('name','like','%'.$k.'%')->orderBy('id','desc')->paginate(3);
        //获取搜索参数
       // echo $k;
        // //获取列表数据
        // $request = DB::table("admin_users")->where("name","like","%".$k."%")->paginate(3);

        $name1 = array('超级管理员','一级管理员','二级管理员','三级管理员');
       
       //$total=$data->count();

        //加载列表模板
        return view("Admin.Gly.index",['data'=>$data,'name1'=>$name1,'k'=>$k]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //加载添加模板
        return view("Admin.Gly.add");
    }

    /**
     * 管理员添加
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminuserInsertRequest $request)
    {
    
        $data=$request->except('_token');
        //密码加密
        $data['password']=Hash::make($data['password']);
        
       //dd($data);
         
        // 执行添加 入库
        if(DB::table("admin_users")->insert($data)){
            return redirect("/admingly")->with("success","添加成功");
        }else{
            return back()->with("error","添加失败");
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
        //调用关联数据
        //$info=admin_users::find($id)->info;
        //加载模板
        //return view("Admin.adminuser.info",['info'=>$info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取需要修改的数据
        $data=DB::table("admin_users")->where("id","=",$id)->first();
        return view("Admin.Gly.edit",['data'=>$data]);
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

        //获取修改数据
        $data=$request->except(['_token','_method']);
        //执行修改
        if(DB::table("admin_users")->where("id","=",$id)->update($data)){
           return redirect("/admingly")->with("success","修改成功");
        }else{
           return back()->with("error","修改失败");
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
        //删除
        if(DB::table("admin_users")->where("id","=",$id)->delete()){
            return redirect("/admingly")->with("success","删除成功");
        }else{
            return redirect("/adminugly")->with("error","删除成功");
        }
    }
}
