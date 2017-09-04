<html>
<head>

<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>资讯列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 新闻管理 <span class="c-gray en">&gt;</span> 新闻管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">

	<span class="l"><a  style="text-decoration:none href="javascript:;" onclick="this,del_()"  class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span style="margin-left: 4px;"><a class="btn btn-primary radius" data-title="添加资讯" data-href="articles-add.php" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a></span><span class="r">共有数据：<strong><?php   require("../php/config.php"); $res=mysql_query("select count(*) as total from `news` "); if($row=mysql_fetch_array($res)){ $num=$row['total'];}  echo $num;?></strong> 条</span> </div>


	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" id="ckb_selectAll" onclick="this,selectAll()" title="选中/取消选中"></th>
					<th width="80">ID</th>
					<th>标题</th>
					<th width="300">图片</th>
					<th width="100">作者</th>
                    <th width="100">分类</th>
					<th width="50">浏览次数</th>
					<th width="80">查看新闻</th>
					<th width="80">时间</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
			  <?php
			      require("../php/config.php");
                 $sql="select time,n.id,title,content,author,times,categroyname,photo from `news` as n
                        left join `news_categroy` as ns
                        on n.cate = ns.id";
                 $result=mysql_query($sql,$conn);
                 $res=array();
			       while($arr =mysql_fetch_assoc($result)){
			         $res[]=$arr;
			       }
			    //  var_dump($res);

			      foreach($res as  $v){
                        // echo $v['Id'];


			   ?>
				<tr class="text-c">
					<td><input type="checkbox" class="ckb" id="+con.id+" value="<?php  echo $v['id'] ?>"></td>
					<td><?php  echo $v['id'] ?></td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看"><?php echo $v['title'] ?></u></td>
					<td><img src="<?php  echo $v['photo'] ?>" width="100px" alt="暂未上传图片"></td>
					<td><?php  echo $v['author'] ?></td>
                    <td><?php  echo $v['categroyname'] ?></td>
					<td><?php  echo $v['times'] ?></td>
					<td><a href="javascript:;" onClick="myselfinfo(<?php  echo $v['id'] ?>)">查看</a></td>
					<td><?php echo $v['time'] ?></td>
					<td class="f-14 td-manage"> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','articles-edit.php','10001')" href="articles-edit.php?id=<?php  echo $v['id']; ?>"   title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'<?php  echo $v['id'] ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
                 <?php
				  }
				  ?>
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,9]}// 不参与排序的列
	]
});

function myselfinfo(id){
	var ids=id;
	$.ajax({
		type:"POST",
        url:"/cms/admin/php/newscontent.php",

        data:{
            newsid:ids//文章
            },
        dataType:"json",
        success:function(data){

        	layer.open({
		type: 1,
		area: ['500px','400px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		title: '查看信息',
		content: '<div>'+data+'</div>'
	});
        }
	})

}

/*资讯-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

function article_del(obj,id){
	/*var Id = id;
	alert(Id); return false;*/
	layer.confirm('确认要删除吗？',function(index){

		$.ajax({
			type: 'GET',
			url: '/cms/admin/php/delete.php',
			dataType: 'json',
			data   : {Id: id},
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				//console.log(data.msg);
               $(obj).parents("tr");
//				layer.msg('删除失败!',{icon:2,time:1000});
			},
		});
	});
}
 //批量删除
 function selectAll(obj,id){
 	 if($('#ckb_selectAll').is(':checked')){
 	 	  $(".ckb").attr("checked",true);//全选
 	 }else{
 	 	  $(".ckb").attr("checked",false); //取消
 	 }
 }
 function del_(obj,id) {
  var ids = '';
  //alert(ids);
  $(".ckb").each(function() {
    if ($(this).is(':checked')) {
      ids += ',' + $(this).val(); //逐个获取id
    }
  });
  ids = ids.substring(1); // 对id进行处理，去除第一个逗号
  if (ids.length == 0) {
    alert('请选择要删除的选项');
  } else {
    if (layer.confirm('确认要删除吗？',function(index){
      url = "ids=" + ids;
      $.ajax({
        type: "GET",
        url: "/cms/admin/php/deletes.php",
        data: url,
        dataType:"json",
       success: function(data){
				/*$(obj).parents("tr").remove(); */ //隐藏失败
				if(data.code==1){
					$('.text-c th input').prop('checked', false);
	                  var checked=document.body.querySelectorAll("input[type='checkbox']");
					var checklength=checked.length;
					for (var i=0;i<checklength;i++) {
						if(checked[i].checked == true){
							checked[i].parentNode.parentNode.remove();
						}
					}
					layer.msg('已删除!',{icon:1,time:1000});
					window.location.reload();    //只能刷新了
				}else if(data.code==2){
					layer.msg('删除失败!',{icon:2,time:1000});
				}

			}
		});
    }));
}
}
/*资讯-审核*/
function article_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过','取消'],
		shade: false,
		closeBtn: 0
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});
}
/*资讯-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*资讯-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*资讯-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

</script>
</body>

</html>
