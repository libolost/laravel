@extends("Admin.Adminpublic.index")
@section("main")
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
<div class="page-container">
	<form action="/adminarticles" method="get">
		<div class="text-c">
			<input type="text" name="keyword" id="" placeholder=" " style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont"></i> 搜索</button>
		</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加用户" data-href="article-add.html" onclick="Hui_admin_tab(this)" href="/admincates/create"><i class="Hui-iconfont"></i> 公告添加</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	
	<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
			<thead>
				<tr class="text-c" role="row">
          <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80.2px;" aria-sort="descending" aria-label="ID: 升序排列" width="80">xxx</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80.2px;" aria-sort="descending" aria-label="ID: 升序排列" width="80">ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80.2px;" aria-sort="descending" aria-label="ID: 升序排列" width="80">title</th>
					<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80.2px;" aria-sort="descending" aria-label="ID: 升序排列" width="80">desrc</th>
					<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 120.2px;" aria-label="操作" width="120">操作</th>
				</tr>
			</thead>
				
			@foreach($article as $val)
			<tr class="text-c odd" role="row">
					<td><input type="checkbox" value="{{$val -> id}}"></td>
					<td class="sorting_1">{{$val -> id}}</td>
					<td>{{$val -> title}}</td>
					<td>{{$val -> descr}}</td>
				
					<td class="f-14 td-manage">
						<a style="text-decoration:none" class="ml-5" onclick="article_edit('编辑','article-add.html','10001')" href="/adminarticles/{{$val -> id}}/edit" title="修改">
						<i class="Hui-iconfont"></i>
						</a>
					
					</td>
				</tr>
			@endforeach
        <tr>
          <td><a href="javascript:void(0)" class="btn btn-success allchoose">全选</a><a href="javascript:void(0)" class="btn btn-success nochoose">全不选</a><a href="javascript:void(0)" class="btn btn-success fchoose">反选</a>
          <a href="javascript:void(0)" class="btn btn-success del">删除</a>
          </td>
        </tr>
                
		</table>
		<div class="dataTables_paginate paging_full_numbers" id="pages">
     </div>
	</div>
</div>
<script type="text/javascript">
    //全选
 $(".allchoose").click(function(){
  //找到table 遍历tr 
  $("#DataTables_Table_0").find("tr").each(function(){
    //找checkbox 选中
    $(this).find(":checkbox").attr("checked",true);
  });
 });

  //全不选
 $(".nochoose").click(function(){
  //找到table 遍历tr 
  $("#DataTables_Table_0").find("tr").each(function(){
    //找checkbox 选中
    $(this).find(":checkbox").attr("checked",false);
  });
 });

 //反选
 $(".fchoose").click(function(){
     $("#DataTables_Table_0").find("tr").each(function(){
         if($(this).find(':checkbox').attr("checked"))
         {
             $(this).find(":checkbox").attr("checked",false);
         }else
         {
             $(this).find(":checkbox").attr("checked",true);
         }
     });
 });

 //删除
$(".del").click(function(){
  arr=[];
  //遍历选中复选框的id
  $(":checkbox").each(function(){
    //判断是否选中
    if($(this).attr("checked")){
      //获取id
      id=$(this).val();
      // alert(id);
      //把每个ID存储在数组arr
      arr.push(id);
    }
  });

  //Ajax
  $.get("/del",{arr:arr},function(data){
    // alert(data);
    if(data==1){
      //遍历arr
      for(var i=0;i<arr.length;i++)
      {
        //通过选中的id获取input
        $("input[value='"+arr[i]+"']").parents("tr").remove();
      }
    }else
    {
      alert(data);
    }
  })
});
</script>
@endsection
@section("title","公告列表")