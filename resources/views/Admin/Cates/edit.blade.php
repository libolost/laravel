@extends("Admin.Adminpublic.index")
@section("main")
<article class="page-container">
    <form action="/admincates/{{$cates -> id}}" method="post" class="form form-horizontal" id="form-member-add">
	{{method_field("PUT")}}
    {{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="name" name="name" value="{{$cates -> name}}">
			</div>
		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>
@endsection
@section("title","修改类名")