<?php
 //判断session
header("content-type:text/html;charset=utf-8");
   session_start();
    if(!isset($_SESSION['username'])){
     header("Location:../html/index.php");
      exit();
 	}
?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
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
<!--/meta 作为公共模版分离出去-->

<title>添加售卖情况</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-role-add" ENCTYPE="multipart/form-data" method= "post" action= "../php/shop_situation-edit.php">
	<input type="hidden" name="id" id="idd">
	<?php
                if(!$_GET["id"]){
                   exit();
                 }
                  $ID=$_GET["id"];
                 require("../php/config.php");
                 $sql="select * from shop_situation where id='{$ID}'";
                 $result =mysql_query($sql);
                while($arr =mysql_fetch_assoc($result)){
                     $res[]=$arr;
                   }
                foreach($res as $v)
                {

      ?>
      <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">当前图片：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<img src="<?php echo $v['photo'];?>" alt="暂未有" width="200px" heght="100px">
			</div>
		</div>
		<div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="file" name="photo" id= "photo"><span style="color:red;">(只允许上传英文名称的图片，中文名称可能无法显示图片！)</span>
            </div>
        </div>
      <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">商铺名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $v['shopid'] ?>" placeholder="" id="shop" name="shop">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">已售数量：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $v['matchs'] ?>" placeholder="" id="roleName" name="roleName">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">总数量：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $v['text'] ?>" placeholder="" id="contact" name="contact" required="required">
			</div>
		</div>
		<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	<?php
	 }
	 ?>
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
<script type="text/javascript">
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});
	var t=1;//设定跳转的时间 
	function refer(){  
	    if(t==0){ 
	     window.location.href="admin-sale.php"; //#设定跳转的链接地址 
	    }else{
	   		t--; // 计数器递减 
		}
	} 
	function getUrlParam(name){
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r!=null) return unescape(r[2]); return null; //返回参数值
  }
 var id=getUrlParam('id');
    $('#idd').val(id);


});
</script>

<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>