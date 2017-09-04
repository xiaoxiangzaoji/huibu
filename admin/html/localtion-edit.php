<!DOCTYPE HTML>
<html>
<head>
<?php
//include "../php/index2.php";
?>
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
<link rel="stylesheet" type="text/css" href="lib\webuploader\0.1.5\webuploader.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>修改地理信息</title>
</head>
<body>

<article class="page-container">

	<form class="form form-horizontal" id="form-article-add" ENCTYPE="multipart/form-data" method= "post" action= "../php/dili-edit.php">
        <input type="hidden" name='id' id='idd'>
    <?php
                if(!$_GET["id"]){
				   exit();
				 }
				  $ID=$_GET["id"];
			     require("../php/config.php");
                 $sql="select * from shop_geographic where id='{$ID}'";
                 $result =mysql_query($sql);
                while($arr =mysql_fetch_assoc($result)){
			         $res[]=$arr;
			       }
                foreach($res as $v)
                {

      ?>
		<div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">当前图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <img  style="width:200px;" src="<?php echo $v['photo'] ?>">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">修改图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="file" name="photo" id="photo"><span style="color:red;">(只允许上传英文名称的图片，中文名称可能无法显示图片！)</span>
            </div>
        </div>		
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">地理信息：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea type="text" class="input-text1 input-text" value="" placeholder="" id="pic" name="pic" style="min-height:200px;"><?php echo $v['pic'] ?></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">交通路线：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea type="text" class="input-text1 input-text" value="" placeholder="" id="text" name="text" style="min-height:200px;"><?php echo $v['text'] ?></textarea>
			</div>
		</div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <input  class="btn btn-primary radius" type="submit">
                <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
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
  var id=getUrlParam('id');
  $('#idd').val(id);


});
</script>


<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>