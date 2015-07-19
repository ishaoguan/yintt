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
<script type="text/javascript">
	var delUrl = '__URL__/doDel';
	var addUrl = '__URL__/add';
	var isSearchHidden = 1;
	var searchName = "搜索提现";
</script>
<div class="so_main">
  <div class="page_tit">提现管理</div>
<!--搜索-->
    <!-------- 搜索游戏 -------->
  <div id="search_div" style="display:none">
  	<div class="page_tit"><script type="text/javascript">document.write(searchName);</script> [ <a href="javascript:void(0);" onclick="dosearch();">隐藏</a> ]</div>
	
	<div class="form2">
	<form method="post" action="__URL__/index">
    <dl class="lineD">
      <dt>会员名：</dt>
      <dd>
        <input name="uname" style="width:190px" id="title" type="text" value="<?php echo ($search["uid"]); ?>">
        <span>不填则不限制</span>
      </dd>
    </dl>
	
    <dl class="lineD">
      <dt>提现状态：</dt>
      <dd>
		<?php $i=0;foreach($type_list as $k=>$v){ if(strlen("key1")==1&&$i==0){ ?><input type="radio" name="withdraw_status" value="<?php echo ($k); ?>" id="withdraw_status_<?php echo ($i); ?>" checked="checked" /><?php }elseif("key1"=="key1"&&$k==$search["withdraw_status"]){ ?><input type="radio" name="withdraw_status" value="<?php echo ($k); ?>" id="withdraw_status_<?php echo ($i); ?>" checked="checked" /><?php }elseif("key1"=="value1"&&$v==$search["withdraw_status"]){ ?><input type="radio" name="withdraw_status" value="<?php echo ($k); ?>" id="withdraw_status_<?php echo ($i); ?>" checked="checked" /><?php }else{ ?><input type="radio" name="withdraw_status" value="<?php echo ($k); ?>" id="withdraw_status_<?php echo ($i); ?>" /><?php } ?><label for="withdraw_status_<?php echo ($i); ?>"><?php echo ($v); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;<?php $i++;} ?>
        <span>不选择则不限制</span>
      </dd>
    </dl>
	
	<dl class="lineD"><dt>时间从：</dt><dd><input onclick="WdatePicker({maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}',dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true,lang:'zh-cn'});" name="start_time" id="start_time"  class="input Wdate" type="text" value="<?php echo ($search["start_time"]); ?>"><span id="tip_start_time" class="tip">时间段</span></dd></dl>
	<dl class="lineD"><dt>到：</dt><dd><input onclick="WdatePicker({minDate:'#F{$dp.$D(\'start_time\')}',maxDate:'2020-10-01',dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true,lang:'zh-cn'});" name="end_time" id="end_time"  class="input Wdate" type="text" value="<?php echo ($search["end_time"]); ?>"><span id="tip_end_time" class="tip">时间段</span></dd></dl>

    <div class="page_btm">
      <input type="submit" class="btn_b" value="确定" />
    </div>
	</form>
  </div>
  </div>
<!--搜索-->

  <div class="Toolbar_inbox">
  	<div class="page right"><?php echo ($pagebar); ?></div>
    <a onclick="dosearch();" class="btn_a" href="javascript:void(0);"><span class="search_action">搜索提现</span></a>
    <?php if(!empty($auditingmoney)): ?>待审核总额：<?php echo ($auditingmoney); ?>，<?php endif; ?>
    <?php if(!empty($auditedmoney)): ?>审核通过总额：<?php echo ($auditedmoney); ?>，<?php endif; ?>
    <?php if(!empty($withdrawed)): ?>已提现总额：<?php echo ($withdrawed); ?>，<?php endif; ?>
    <?php if(!empty($unaudited)): ?>审核未通过总额：<?php echo ($unaudited); ?>。<?php endif; ?>
  </div>
  
  <div class="list">
  <table id="area_list" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th style="width:30px;">
        <input type="checkbox" id="checkbox_handle" onclick="checkAll(this)" value="0">
        <label for="checkbox"></label>
    </th>
    <th class="line_l">ID</th>
    <th class="line_l">会员名</th>
    <th class="line_l">提现金额</th>
    <th class="line_l">到帐金额</th>
    <th class="line_l">提现时间</th>
    <th class="line_l">提现状态</th>
    <th class="line_l">处理人</th>
    <th class="line_l">处理时间</th>
    <th class="line_l">处理说明</th>
    <th class="line_l">操作</th>
  </tr>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr overstyle='on' id="list_<?php echo ($vo["id"]); ?>">
        <td><input type="checkbox" name="checkbox" id="checkbox2" onclick="checkon(this)" value="<?php echo ($vo["id"]); ?>"></td>
        <td><?php echo ($vo["id"]); ?></td>
        <td><a onclick="loadUser(<?php echo ($vo["uid"]); ?>,'<?php echo ($vo["uname"]); ?>')" href="javascript:void(0);"><?php echo ($vo["uname"]); ?></a></td>
        <td><?php echo ($vo["withdraw_money"]); ?></td>
        <td><?php echo ($vo['withdraw_money']-$vo['withdraw_fee']); ?></td>
        <td><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></td>
        <td><?php echo ($vo["withdraw_status"]); ?></td>
        <td><?php echo (($vo["deal_user"])?($vo["deal_user"]):"无"); ?></td>
        <td><?php if($vo["deal_time"] == 0): ?>无<?php else: echo (date("Y-m-d H:i:s",$vo["deal_time"])); endif; ?></td>
        <td><?php echo (($vo["deal_info"])?($vo["deal_info"]):"无"); ?></td>
		<td> <?php if(($vo["withdraw_status_num"] == 2) OR ($vo["withdraw_status_num"] == 3)): ?>--<?php else: ?><a href="__URL__/edit?id=<?php echo ($vo['id']); ?>">编辑</a><?php endif; ?></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>

  </div>
  
  <div class="Toolbar_inbox">
  	<div class="page right"><?php echo ($pagebar); ?></div>
    <a onclick="dosearch();" class="btn_a" href="javascript:void(0);"><span class="search_action">搜索提现</span></a>
  </div>
</div>


<script type="text/javascript" src="__ROOT__/Style/A/js/adminbase.js?<?php echo C('APP_RES_VER');?>"></script>
</body>
</html>