@extends("Admin.Adminpublic.index")
@section("main")
<div class="page-container">
	<form action="/adminuser" method="get">
		<div class="text-c">
			<input type="text" name="keyword" id="" placeholder=" 输入用户名" style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont"></i> 搜索</button>
		</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加用户" data-href="article-add.html" onclick="Hui_admin_tab(this)" href="/adminuser/create"><i class="Hui-iconfont"></i> 添加用户</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	
	<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
			<thead>
				<tr class="text-c" role="row">
					<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 25.2px;" aria-label="" width="25"><input type="checkbox" name="" value=""></th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80.2px;" aria-sort="descending" aria-label="ID: 升序排列" width="80">ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80.2px;" aria-sort="descending" aria-label="ID: 升序排列" width="80">用户名</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80.2px;" aria-sort="descending" aria-label="ID: 升序排列" width="80">手机号</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80.2px;" aria-sort="descending" aria-label="ID: 升序排列" width="80">邮箱</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80.2px;" aria-sort="descending" aria-label="ID: 升序排列" width="80">状态</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 120.2px;" aria-label="更新时间: 升序排列" width="120">注册时间</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 120.2px;" aria-label="更新时间: 升序排列" width="120">修改时间</th>
					<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 120.2px;" aria-label="操作" width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				
			@foreach($data as $val)
			<tr class="text-c odd" role="row">
					<td><input type="checkbox" value="" name=""></td>
					<td class="sorting_1">{{$val -> id}}</td>
					<td>{{$val -> username}}</td>
					<td>{{$val -> phone}}</td>
					<td>{{$val -> email}}</td>
					<td>{{$val -> status}}</td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onclick="article_edit('查看','article-zhang.html','10002')" title="查看">{{$val -> created_at}}</u></td>
					<td>{{$val -> updated_at}}</td>
					<td class="f-14 td-manage">
						<a style="text-decoration:none" class="ml-5" onclick="article_edit('资讯编辑','article-add.html','10001')" href="/adminuser/{{$val -> id}}/edit" title="修改">
						<i class="Hui-iconfont"></i>
						</a>
					<form action="/adminuser/{{$val -> id}}" method="post">
						{{method_field("DELETE")}}
         			 	{{csrf_field()}}
						<button type="submit" title="删除"><i class="Hui-iconfont"></i></button>
					</form>
						<!-- <a style="text-decoration:none" class="ml-5" onclick="article_del(this,'10001')" href="/adminuser/destroy" title="删除">
						<i class="Hui-iconfont"></i>
						</a> -->
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		
		<div class="dataTables_paginate paging_full_numbers" id="pages"style="float:right">
      {{$data->appends($request)->render()}}
     </div>
	</div>
</div>
@endsection
@section("title","用户列表")