<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//导入模型类
use App\Models\User;
class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public static function getCates()
     {
        $cates = DB::table("cates") ->select(DB::raw("*,concat(path,',',id)as paths")) -> orderBy("paths") -> get();
        foreach($cates as $key => $value)
        {
            $path = $value -> path;
            $arr = explode(",",$path);
            $len = count($arr) - 1;
            $cates[$key] -> name = str_repeat("*|",$len).$value -> name;
            
        }
        return $cates;
     }

    public function index(Request $request)
    {
        //获取搜索关键词
        $k = $request -> input('keyword');
        //获取数据
        $cates = DB::table("cates") ->select(DB::raw("*,concat(path,',',id)as paths")) -> where("name","like","%".$k."%") -> orderBy("paths") -> paginate(5);
        foreach($cates as $key => $value)
        {
            $path = $value -> path;
            $arr = explode(",",$path);
            $len = count($arr) - 1;
            $cates[$key] -> name = str_repeat("-|",$len).$value -> name;
            
        }
        //加载分类列表
        return view("Admin.Cates.index",['cates'=>$cates,'request'=>$request -> all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //分类添加
        $cates = self::getCates();
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
            return redirect("/admincates") -> with("success","添加成功");
        }else
        {
            return back() -> with("error","添加失败");
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
        //获取数据
        $cates = DB::table("cates") ->where("id","=",$id) -> first();
        //加载修改模板分配数据
        return view("Admin.Cates.edit",['cates'=>$cates]);
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
        //去除两个字段
        $data = $request -> except(['_token','_method']);
        //执行插入数据库
        if(DB::table("cates") -> where("id","=",$id) -> update($data))
        {
            return redirect("/admincates") -> with("success","修改成功");
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
        //删除操作
        $s = DB::table("cates") -> where("pid","=",$id) -> count();
        if($s > 0)
        {
            return redirect("/admincates") -> with("error","请先删除子类!");
        }else
        {
            if(DB::table("cates") -> where("id","=",$id) -> delete())
            {
                return redirect("/admincates") -> with("success","删除成功");
            }else
            {
                return redirect("/admincates") -> with("success","删除成功");
            }
        }
    }
}
