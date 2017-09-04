<!DOCTYPE HTML>
<html>
<head>
<?php
//include "/cms/admin/php/index2.php";
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

<title>修改资讯</title>
</head>
<body>

<article class="page-container">

    <form class="form form-horizontal" id="form-article-add">
    <?php
                  require("../php/config.php");
                 $sql="select * from shop_onlineservice";
                 $result=mysql_query($sql,$conn);
                 $res=array();
                   while($arr =mysql_fetch_assoc($result)){
                     $res[]=$arr;
                   }
                //  var_dump($res);

                  foreach($res as  $v){
                        // echo $v['Id'];


               ?>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">灰埠商城发展历程：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <script id="container" name="content" type="text/plain" style="width:1020px;height:200px">
                <?php echo $v['history']?>
        </script>
                <!-- <textarea type="text" class="input-text input-text1" value="" placeholder="" id="history" name="history" style="min-height:200px;"><?php echo $v['history']?></textarea> -->
            </div>
        </div>



        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">创始人：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text input-text1" value="<?php echo $v['createman']?>" placeholder="" id="createman" name="createman">
            </div>
        </div>


       <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">现今负责人：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="formControls col-xs-8 col-sm-9">
                <input type="text" style="margin-left:-15px;" class="input-text input-text1" value="<?php echo $v['nowman']?>" placeholder="" id="nowman" name="nowman">
            </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">联系电话：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="formControls col-xs-8 col-sm-9">
                <input type="text" style="margin-left:-15px;" class="input-text input-text1" value="<?php echo $v['phone']?>" placeholder="" id="phone" name="phone">
            </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">所属公司：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="formControls col-xs-8 col-sm-9">
                <input type="text" style="margin-left:-15px;" class="input-text input-text1" value="<?php echo $v['belong']?>" placeholder="" id="belong" name="belong">
            </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">商城具体位置：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="formControls col-xs-8 col-sm-9">
                <input type="text" style="margin-left:-15px;" class="input-text input-text1" value="<?php echo $v['address']?>" placeholder="" id="address" name="address">
            </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">路线：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="formControls col-xs-8 col-sm-9">
                <input type="text" style="margin-left:-15px;" class="input-text input-text1" value="<?php echo $v['line']?>" placeholder="" id="line" name="line">
            </div>
            </div>
        </div>
<div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">主营业务：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="formControls col-xs-8 col-sm-9">
                <input type="text" style="margin-left:-15px;" class="input-text input-text1" value="<?php echo $v['work']?>" placeholder="" id="work" name="work">
            </div>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">营业执照信息：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <script id="containers" name="contents" type="text/plain" style="width:1020px;height:200px">
                <?php echo $v['companyinfo']?>
        </script>
                <!-- <textarea type="text" class="input-text input-text1" value="" placeholder="" id="companyinfo" name="companyinfo" style="min-height:400px;"><?php echo $v['companyinfo']?></textarea> -->
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button  class="btn btn-primary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
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

<script type="text/javascript" src="lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

 --><script type="text/javascript">
$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    var t=1;//设定跳转的时间 
    function refer(){  
        if(t==0){ 
         window.location.href="Company-Profile.php"; //#设定跳转的链接地址 
        }else{
            t--; // 计数器递减 
        }
    } 



    function getUrlParam(name){
                var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
                var r = window.location.search.substr(1).match(reg);  //匹配目标参数
                if (r!=null) return unescape(r[2]); return null; //返回参数值
        }
var ue = UE.getEditor('container');
var ue2 = UE.getEditor('containers');
    $(".btn").click(function(){
        var id=getUrlParam('id');
        var history = ue.getContent();
        var companyinfo = ue2.getContent();
        
        //var history=$("#history").val();
        var createman=$("#createman").val();
        var nowman=$("#nowman").val();
        var belong=$("#belong").val();
        var phone=$("#phone").val();
        var address=$("#address").val();
        var line=$("#line").val();
        var work=$("#work").val();
        //var companyinfo=$("#companyinfo").val();
            $.ajax({
                type:"POST",
                url:"/cms/admin/php/shop_company-edit.php",

                data:{
                    id : id,
                    history : history,  //标题
                    createman : createman,  //作者
                    nowman :nowman, //文章
                    belong : belong,
                    phone : phone,
                    address : address,
                    companyinfo : companyinfo,
                    line : line,
                    work : work
                      },
                dataType:"json",
                success:function(data){
                   if(data.code==1){
                        layer.msg('添加成功!',{icon:1,time:1000});
                        setInterval(refer,1000);
                    }else if(data.code==2){
                        layer.msg('添加失败!',{icon:2,time:1000});
                    }
                }
            })
    })

})

</script>
<script type="text/javascript">
        var ue = UE.getEditor('container');
        var ue2 = UE.getEditor('containers');
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>