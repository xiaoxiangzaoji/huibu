<?php
 //判断session
header("content-type:text/html;charset=utf-8");
   session_start();
    if(!isset($_SESSION['username'])){
     header("Location:../html/index.php");
      exit();
 	}
?>
<!DOCTYPE HTML>
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
<style type="text/css">
	:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color: #ef392b;
    text-align: right;
}

::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:#ef392b;
    text-align: right;
}

input:-ms-input-placeholder{
    color:#ef392b;
    text-align: right;
}

input::-webkit-input-placeholder{
    color: #ef392b;
    text-align: right;
}
</style>
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加商铺信息</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" ENCTYPE="multipart/form-data" method= "post" action= "../php/shop_product-add.php">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商铺名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="adminName" name="adminName">
		</div>
	</div>
	<div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商铺图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="file" id="photo" name="photo"><span style="color:red;">(只允许上传英文名称的图片，中文名称可能无法显示图片！)</span>
            </div>
        </div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>地址：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="details" name="details">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>电话：</label>
		<div class="formControls col-xs-8 col-sm-9">
			
			<input type="text" class="input-text" value="" placeholder="" id="load" name="load">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>交通路线：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<script id="containers" name="contents" type="text/plain" style="width:1020px;height:200px">
        </script>
			<!-- <input type="text" class="input-text" value="" placeholder="" id="load" name="load"> -->
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
	        window.location.href="admin-Introduction.php"; //#设定跳转的链接地址 
	    }else{
	   		t--; // 计数器递减 
		}
	} 

   function getUrlParam(name){
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r!=null) return unescape(r[2]); return null; //返回参数值
  }
var ue2 = UE.getEditor('containers');
	

});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>