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
<title>添加招聘部门</title>
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

</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>招聘部门：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="adminName" name="adminName">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>电话：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="phone" name="phone">
		</div>
	</div>


	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="email" name="email">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司地址：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="address" name="address">
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
						window.location.href="admin-Recruitment.php";
	       //#设定跳转的链接地址 
	    }else{
	   		t--; // 计数器递减 
		}
	} 

 $('input').eq(4).bind('click',function(){
		var adminName=$('#adminName').val();
		var phone=$('#phone').val();
		var email=$('#email').val();
		var address=$('#address').val();
		var isPhone = /^([0-9]{3,4}-)?[0-9]{7,8}$/;
		var isMob=/^((\+?86)|(\(\+86\)))?(13[012356789][0-9]{8}|15[012356789][0-9]{8}|18[02356789][0-9]{8}|147[0-9]{8}|1349[0-9]{7})$/;
		var isemail=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
		var value=phone.trim();
		var mailvalue=email.trim();


		if(!(isMob.test(value)||isPhone.test(value))){
			$('#phone').val('');
			$('#phone').attr('placeholder','请输入正确的电话号码');
		}
		if(!(isemail.test(mailvalue))){
			$('#email').val('');
			$('#email').attr('placeholder','请输入正确的邮箱地址');
		}
		if(adminName==''){
			$('#adminName').attr('placeholder','内容不能为空');
		}
		if(phone==''){
			$('#phone').attr('placeholder','内容不能为空');
		}
		if(email==''){
			$('#email').prop('placeholder','内容不能为空');
		}
		if(address==''){
			$('#address').prop('placeholder','内容不能为空');
		}
//
		if(adminName!='' && phone!='' && email!='' && address!='' && (isMob.test(value)||isPhone.test(value)) && (isemail.test(mailvalue))){

			$.ajax({
				type:"post",
				url:"/cms/admin/php/admin-Recruitment.php",
				async:true,
				data:{
					adminName:adminName,
					phone:phone,
					email:email,
					address:address
				},
				dataType:"json",
				success: function(data) {
					if(data.code==1){
						//alert(1111)
					       layer.msg('添加成功!2秒后跳转！',{icon:1,time:1000});
							 setInterval(refer,1000);
				    }else if(data.code==2){
						   layer.msg('添加失败!',{icon:2,time:1000});
						  //alert(2222)
					}else if(data.code==3){
 						   layer.msg('已经存在!',{icon:5,time:1000});
 					}
				}
			})
		}
	})
})
</script>

<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>