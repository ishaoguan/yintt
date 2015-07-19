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
<style type="text/css">
.tip{color:#000000}
</style>

<div class="so_main">
  <!--列表模块-->
  <form name="sdf" id="sdf" action="__URL__/index" method="get">
  <div class="Toolbar_inbox">
  	<span>客服<select name="kf" id="kf"   class="c_select"><option value="">--请选择--</option><?php foreach($kflist as $key=>$v){ if($search["kf"]==$key && $search["kf"]!=""){ ?><option value="<?php echo ($key); ?>" selected="selected"><?php echo ($v); ?></option><?php }else{ ?><option value="<?php echo ($key); ?>"><?php echo ($v); ?></option><?php }} ?></select> 从<input onclick="WdatePicker({maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true,lang:'zh-cn'});" name="start_time" id="start_time"  class="input Wdate" type="text" value="<?php echo (mydate('Y-m-d H:i:s',$search["start_time"])); ?>"><span id="tip_start_time" class="tip">只选开始时间则查询从开始时间往后所有</span>到<input onclick="WdatePicker({minDate:'#F{$dp.$D(\'start_time\')}',maxDate:'2020-10-01',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true});" name="end_time" id="end_time"  class="input Wdate" type="text" value="<?php echo (mydate('Y-m-d H:i:s',$search["end_time"])); ?>"><span id="tip_end_time" class="tip">只选结束时间则查询从结束时间往前所有</span></span>
    <a href="javascript:;" onclick="doStatistics()" class="btn_a"><span>统计</span></a></div>
</form>
  <div class="list">
  <table id="area_list" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th style="width:30px;">&nbsp;
		
    </th>
    <th class="line_l">ID</th>
    <th class="line_l">用户名</th>
    <th class="line_l">成功投资</th>
    <th class="line_l">成功借款</th>
    <th class="line_l">客服</th>
  </tr>
  <?php $cn=$investor_money=$borrow_money=0; ?>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr overstyle='on' id="list_<?php echo ($vo["id"]); ?>">
        <td>&nbsp;</td>
        <td><?php echo ($vo["id"]); $cn++; ?></td>
        <td><?php echo ($vo["user_name"]); ?></td>
        <td>￥<?php echo (($vo["investor_capital"])?($vo["investor_capital"]):0); $investor_money+=$vo['investor_capital']; ?></td>
        <td>￥<?php echo (($vo["borrow_money"])?($vo["borrow_money"]):0); $borrow_money+=$vo['borrow_money']; ?></td>
        <td><?php echo ($kfname); ?></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr overstyle='on' id="list_<?php echo ($vo["id"]); ?>">
      <td>&nbsp;</td>
      <td colspan="5">统计：当前时间段内，有<?php echo $cn; ?>名会员有资金记录,投资金额<?php echo $investor_money+0; ?>,借款金额投资金额<?php echo $borrow_money+0; ?>，共<?php echo $borrow_money+$investor_money+0; ?>，可获得千分之<?php echo $glo['customer_rate'] ?>提成，共<?php echo ($borrow_money+$investor_money+0)*$glo['customer_rate']/1000 ?>元</td>
    </tr>
  </table>

  </div>
</div>
<script type="text/javascript">
function showurl(url,Title){
	ui.box.load(url, {title:Title});
}
function doStatistics(){
	if($("#kf").val()==""){
		alert("请选择客服！");
		return;
	}
	document.forms.sdf.submit();
}
</script>

<script type="text/javascript" src="__ROOT__/Style/A/js/adminbase.js?<?php echo C('APP_RES_VER');?>"></script>
</body>
</html>