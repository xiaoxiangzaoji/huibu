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
<title>客服电话</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<?php
                if(!$_GET["id"]){
                   exit();
                 }
                  $ID=$_GET["id"];
                 require("../php/config.php");
                 $sql="select * from shop_consumerhotline where id='{$ID}'";
                 $result =mysql_query($sql);
                while($arr =mysql_fetch_assoc($result)){
                     $res[]=$arr;
                   }
                foreach($res as $v)
                {

      ?>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>招聘部门：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $v['name']   ?>" placeholder="" id="adminName" name="adminName">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>电话：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $v['phone'];   ?>" placeholder="" id="phone" name="phone">
		</div>
	</div>
	<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="button" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
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
	var t=1;//设定跳转的时间 
	function refer(){  
	    if(t==0){ 
	        location="admin-tel.php"; //#设定跳转的链接地址 
	    }else{
			t--; // 计数器递减 
		}
	} 
	function getUrlParam(name){
		var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
		var r = window.location.search.substr(1).match(reg);  //匹配目标参数
		if (r!=null) return unescape(r[2]); return null; //返回参数值
	}

	$('.btn').bind('click',function(){
		var id=getUrlParam('id');
		var adminName=$('input').eq(0).val();
		var phone=$('input').eq(1).val();
		var isPhone = /^([0-9]{3,4}-)?[0-9]{7,8}$/;
		var isMob=/^((\+?86)|(\(\+86\)))?(13[012356789][0-9]{8}|15[012356789][0-9]{8}|18[02356789][0-9]{8}|147[0-9]{8}|1349[0-9]{7})$/;
		var value=phone.trim();
		if(!(isMob.test(value)||isPhone.test(value))){
			$('#phone').val('');
			$('#phone').attr('placeholder','请输入正确的电话号码');
		}
		if(adminName==''){
		$('#adminName').val('');
			$('#adminName').attr('placeholder','内容不能为空！');
		}
		if(phone==''){
			$('#phone').attr('placeholder','内容不能为空！');
		}
		if(adminName!='' && phone!='' && (isMob.test(value)||isPhone.test(value))){
			$.ajax({
				type: 'post',
				url: "/cms/admin/php/admin-tel-edit.php",
				data:{
					id:id,
					adminName:adminName,
					phone:phone
				},
				dataType:'json',
				success: function(data) {
						if(data.code==1){
							layer.msg('修改成功！',{icon:1,time:1000});
							setInterval(refer,1000); //启动1秒定时 

						}else if(data.code==2){
							layer.msg('修改失败!',{icon:2,time:1000});
						}else if(data.code==3){
							layer.msg('已经存在!',{icon:5,time:1000});
						}
					}
			})
		}
	})
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>