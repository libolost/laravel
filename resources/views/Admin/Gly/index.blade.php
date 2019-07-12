@extends("Admin.Adminpublic.index")
@section("main")
<div class="page-container">
    <form action="/admingly" method="get">
    <div class="text-c">         
        <input type="text" name="keyword" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" value="{{$k}}"/>
        <button type="submit" class="btn btn-success" id="" name="submit"><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
    </div>
    </form>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a> <a href="/admingly/create" onclick="admin_add('添加管理员','admin-add.html','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont"></i> 添加管理员</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="9">员工列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">ID</th>
                <th width="150">登录名</th>
                <th width="90">手机</th>
                <th width="150">邮箱</th>
                <th width="150">角色</th>
                <!-- <th width="130">加入时间</th> -->
                <!-- <th width="100">是否已启用</th> -->
                <th width="150">操作</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr class="text-c">
                <td><input type="checkbox" value="1" name=""></td>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->email}}</td>
                <td>{{$name1[$row->adminRole]}}</td>
                
                
                <td class="td-manage"> 
                <a title="修改" href="/admingly/{{$row->id}}/edit" onclick="admin_edit('管理员修改','admin-add.html','1','800','500')" class="btn btn-success"style="text-decoration:none"></i>修改</a>
                 
               
                <form action="/admingly/{{$row->id}}" method="post">
                {{method_field("DELETE")}}
                {{csrf_field()}}
                <button type="submit" class="btn btn-danger" onclick="return confirm('数据无价谨慎操作')"><i class="icon-trash"></i>删除</button>
              </form>
                
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
        {{ $data->links() }}


</div>
@endsection
@section("title","管理员列表")