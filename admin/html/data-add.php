<!DOCTYPE HTML>
<html>
<head>
<?php
include "../php/index2.php";
?>
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
<title>添加文献信息</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="title" name="title">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">作者：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="author" name="author">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">文献：</label>
		<div class="formControls col-xs-8 col-sm-9">
		<script id="container" name="content" type="text/plain" style="width:1020px;height:200px">
        </script>
			<!-- <textarea type="text" class="input-text" value="" placeholder="" id="details" name="details" style="min-height:400px;"></textarea> -->
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>

<script type="text/javascript" src="lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	var t=1;//设定跳转的时间 
	function refer(){  
	    if(t==0){ 
	     window.location.href="phone-data.php"; //#设定跳转的链接地址 
	    }else{
	   		t--; // 计数器递减 
		}
	} 
	
	$('input').eq(2).bind('click',function(){
		var title=$('#title').val();
		var author=$('#author').val();
		var details = ue.getContent();
		if(title==''){
			$('#title').attr('placeholder','内容不能为空！');
		}
		if(author==''){
			$('#author').attr('placeholder','内容不能为空！');
		}
		if(details==''){
			ue.setContent("不能为空");
		}
		if(title!='' && author!='' && details!=''){
			$.ajax({
				type:"post",
				url:"/cms/admin/php/phonedata-add.php ",
				async:true,
				dataType:"json",
				data:{
					title:title,
					author:author,
					info:details
				},
				success:function(data){
					if(data.code==1){
						layer.msg('添加成功!',{icon:1,time:1000});
						setInterval(refer,1000);
					}else if(data.code==2){
						layer.msg('添加失败!',{icon:2,time:1000});
					}
				}
			});
		}
	})

});
</script>
<script>
	var ue = UE.getEditor('container');
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>