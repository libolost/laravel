<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据
        $cates = DB::table("cates") ->select(DB::raw("*,concat(path,',',id)as paths")) -> orderBy("paths") -> get();
        foreach($cates as $key => $value)
        {
            $path = $value -> path;
            $arr = explode(",",$path);
            $len = count($arr) - 1;
            $cates[$key] -> name = str_repeat("-|",$len).$value -> name;
            
        }
        //加载分类列表
        return view("Admin.Cates.index",['cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //分类添加
        $cates = DB::table("cates") -> get();
        return view("Admin.Cates.add",["cates"=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //去除参数
        $data = $request -> except("_token");
        //获取pid
        $pid = $request -> input("pid");
        //区分两种添加
        if($pid == 0)
        {
            $data['path'] = '0'; 
        }else
        {   
            //获取父类的path信息
            $info = DB::table("cates") -> where('id','=',$pid) -> first();
            //拼接父类id
            $data['path'] = $info -> path.','.$info -> id;       
        }
        //插入数据库
        if(DB::table("cates") -> insert($data))
        {
            echo 'OK';
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
