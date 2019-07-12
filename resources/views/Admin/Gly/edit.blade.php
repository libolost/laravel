@extends("Admin.Adminpublic.index")
@section("main")
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add" action="/admingly/{{$data->id}}" method="post">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="{{$data->name}}" placeholder="" id="name" name="name">
        </div>
    </div>
  <!--   <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
        </div>
    </div> -->
     
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="{{$data->phone}}" placeholder="" id="phone" name="phone">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" placeholder="@" name="email" id="email" value="{{$data->email}}">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">角色：</label>
        <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
            <select class="select" name="adminRole" size="1" value="{{$data->adminRole}}">
                <option value="0">超级管理员</option>
                <option value="1">一级管理员</option>
                <option value="2">二级管理员</option>
                <option value="3">三级管理员</option>
            </select>
            </span> </div>
    </div>
    
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
        {{csrf_field()}}
        {{ method_field('PUT') }}
            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
    </form>
</article>
@endsection
@section("title","管理员修改")