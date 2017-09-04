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
<title>修改预约</title>
</head>
<body>

<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<?php
	             if(!$_GET["id"]){
				   exit();
				 }
				  $id=$_GET["id"];
			     require("../php/config.php");
	             $sql="select * from shop_appointment where id='{$id}'";
	             $result =mysql_query($sql);
	                while($arr =mysql_fetch_assoc($result)){
			         $res[]=$arr;
			       }
	                foreach($res as $v)
	                {

	      ?>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $v['username'] ?>" placeholder="" id="adminName" name="adminName">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $v['phone'] ?>" placeholder="" id="phone" name="phone">
		</div>
	</div>


	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>预约时间：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="date" class="input-text" value="<?php echo $v['time'] ?>" placeholder="" id="adminName" name="timea">
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
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

   function getUrlParam(name){
		var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
		var r = window.location.search.substr(1).match(reg);  //匹配目标参数
		if (r!=null) return unescape(r[2]); return null; //返回参数值
	}
	var t=1;
   function refer(){  
    if(t==0){ 
	layer.msg('2秒后跳转');
       window.location.href="yuyueadmin-list.php"; //#设定跳转的链接地址 
    }else{


    t--; // 计数器递减 
    //本文转自： 
}
//
} 
	$("#form-admin-add").validate({
		rules:{
			adminName:{
				required:true,
				minlength:1,
				maxlength:16
			},
			password:{
				required:true,
			},
			password2:{
				required:true,
				equalTo: "#password"
			},
			sex:{
				required:true,
			},
			phone:{
				required:true,
				isPhone:true,
			},
			email:{
				required:true,
				email:true,
			},
			adminRole:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			 var id=getUrlParam('id');
			$(form).ajaxSubmit({
				type: 'post',
				url: "/cms/admin/php/admin-add-edit.php",
				data:{
					 id       : id,
                   /* adminName: adminName,
                    phone    :phone,
                    adminName:adminName*/
				},
				dataType: "json",
				success: function(data){
					console.log(data)
					//var data=$.parseXML('data');
					if(data.code==1){
						//alert(1);
					layer.msg('修改成功!2秒后跳转',{icon:1,time:1000});
					//window.location.href="yuyueadmin-list.php";

					setInterval(refer,1000); //启动1秒定时

				}else if(data.code==2){
					layer.msg('修改失败!',{icon:2,time:1000});
					//alert(2);
				}else if(data.code==3){

         			 layer.msg('已经存在!',{icon:5,time:1000});
       			}
    //             error: function(XmlHttpRequest, textStatus, errorThrown){
				// 	layer.msg('error!',{icon:2,time:1000});
				// }
			}});
				var index = parent.layer.getFrameIndex(window.name);
				parent.$('.btn-refresh').click();
				parent.layer.close(index);
		}
			});
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);

	});
// });
</script>

</body>
 ?>
</html>