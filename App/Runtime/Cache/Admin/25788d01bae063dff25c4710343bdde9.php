<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($ts['site']['site_name']); ?>管理后台</title>
<link href="__ROOT__/Style/A/css/style.css?<?php echo C('APP_RES_VER');?>" rel="stylesheet" type="text/css">
<link href="__ROOT__/Style/A/js/tbox/box.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__ROOT__/Style/A/js/jquery.js"></script>
<script type="text/javascript" src="__ROOT__/Style/A/js/common.js"></script>
<script type="text/javascript" src="__ROOT__/Style/A/js/tbox/box.js?<?php echo C('APP_RES_VER');?>"></script>
</head>
<body>
<script type="text/javascript" src="__ROOT__/Style/My97DatePicker/WdatePicker.js" language="javascript"></script>

<div class="so_main">

<div class="page_tit">VIP审核</div>
<div class="page_tab"><span data="tab_1" class="active">基本信息</span></div>
<div class="form2">
	<form method="post" action="__URL__/doEdit" onsubmit="return subcheck();" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
	<div id="tab_1">
	
	<dl class="lineD"><dt>是否通过审核：</dt><dd><?php $i=0;$___KEY=array ( 1 => '是', 2 => '否', ); foreach($___KEY as $k=>$v){ if(strlen("1")==1 && $i==0){ ?><input type="radio" name="status" value="<?php echo ($k); ?>" id="status_<?php echo ($i); ?>" checked="checked" /><?php }elseif(("1"=="key1"&&$_X["_Y"]==$k)||(""=="value"&&$_X["_Y"]==$v)){ ?><input type="radio" name="status" value="<?php echo ($k); ?>" id="status_<?php echo ($i); ?>" checked="checked" /><?php }else{ ?><input type="radio" name="status" value="<?php echo ($k); ?>" id="status_<?php echo ($i); ?>" /><?php } ?><label for="status_<?php echo ($i); ?>"><?php echo ($v); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;<?php $i++; } ?><span id="tip_status" class="tip">*</span></dd></dl>
	<dl class="lineD"><dt>申请人：</dt><dd><?php echo ($vo["uname"]); ?></dd></dl>
	<dl class="lineD"><dt>指定客服：</dt><dd><?php echo ($vo["kfuname"]); ?></dd></dl>
	<dl class="lineD"><dt>申请时间：</dt><dd><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></dd></dl>
	<dl class="lineD"><dt>申请说明：</dt><dd><?php echo ($vo["des"]); ?></dd></dl>
	<dl class="lineD"><dt>审核通过奖励积分：</dt><dd><?php echo ($glo["vip_score"]); ?></dd></dl>
	<dl class="lineD"><dt>审核通过奖励经验：</dt><dd><?php echo ($glo["vip_exp"]); ?></dd></dl>
	<dl class="lineD"><dt>审核说明：</dt><dd><textarea name="deal_info" id="deal_info"  class="areabox" ></textarea></dd></dl>
	</div><!--tab1-->
	
	<div class="page_btm">
	  <input type="submit" class="btn_b" value="确定" />
	</div>
	</form>
</div>

</div>
</div>
<script type="text/javascript">

function subcheck(){
	if($("input[name='status']:checked").val()!=1 && $("input[name='status']:checked").val()!=2)
	 	{
	 		ui.error("请选择审核结果");return false;
	 	}
	
	if($("input[name='status']:checked").val()==2 && $("#deal_info").val()==0){
	 		ui.error("请输入未审核通过原因");return false;
	}
	
}

</script>
<script type="text/javascript" src="__ROOT__/Style/A/js/adminbase.js?<?php echo C('APP_RES_VER');?>"></script>
</body>
</html>