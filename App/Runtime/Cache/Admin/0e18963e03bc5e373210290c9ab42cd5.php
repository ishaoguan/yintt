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
	var isSearchHidden = 1;
	var searchName = "搜索充值";
</script>
<div class="so_main">
  <div class="page_tit">充值统计</div>
<!--搜索-->
  <!-- 这里是用户充值的搜索条件 -->
  <div id="search_div" style="display:none">
  	<div class="page_tit"><script type="text/javascript">document.write(searchName);</script> [ <a href="javascript:void(0);" onclick="dosearch();">隐藏</a> ]</div>
	
	<div class="form2">
	<form method="get" action="__URL__/index">
    <dl class="lineD">
      <dt>会员名：</dt>
      <dd>
        <input name="uname" style="width:190px" id="title" type="text" value="<?php echo ($search["uname"]); ?>">
        <span>不填则不限制</span>
      </dd>
    </dl>
    <dl class="lineD"><dt>注册时间从：</dt><dd><input onclick="WdatePicker({maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}',dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true,lang:'zh-cn'});" name="_reg_start_time" id="_reg_start_time"  class="input Wdate" type="text" value="<?php echo ($search["_reg_start_time"]); ?>"><span id="tip__reg_start_time" class="tip">时间段</span></dd></dl>
    <dl class="lineD"><dt>注册时间到：</dt><dd><input onclick="WdatePicker({minDate:'#F{$dp.$D(\'start_time\')}',maxDate:'2020-10-01',dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true,lang:'zh-cn'});" name="_reg_end_time" id="_reg_end_time"  class="input Wdate" type="text" value="<?php echo ($search["_reg_end_time"]); ?>"><span id="tip__reg_end_time" class="tip">时间段</span></dd></dl>
  	
  	
  	<dl class="lineD"><dt>充值时间从：</dt><dd><input onclick="WdatePicker({maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}',dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true,lang:'zh-cn'});" name="start_time" id="start_time"  class="input Wdate" type="text" value="<?php echo ($search["start_time"]); ?>"><span id="tip_start_time" class="tip">时间段</span></dd></dl>
  	<dl class="lineD"><dt>充值时间到：</dt><dd><input onclick="WdatePicker({minDate:'#F{$dp.$D(\'start_time\')}',maxDate:'2020-10-01',dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true,lang:'zh-cn'});" name="end_time" id="end_time"  class="input Wdate" type="text" value="<?php echo ($search["end_time"]); ?>"><span id="tip_end_time" class="tip">时间段</span></dd></dl>

    <div class="page_btm">
      <input type="submit" class="btn_b" value="确定" />
    </div>
	</form>
  </div>
  </div>
<!--搜索-->

  <div class="Toolbar_inbox">
  	<div class="page right"> <?php echo ($pagebar); ?></div>
    <a onclick="dosearch();" class="btn_a" href="javascript:void(0);"><span class="search_action">搜索充值</span></a>点击展开搜索条件
  </div>
  <div class="Toolbar_inbox">
     注册时间从：<input value="<?php echo ($search["_reg_start_time"]); ?>" tip='时间段' disabled='disabled' />
     至<input value="<?php echo ($search["_reg_end_time"]); ?>" tip='时间段' disabled='disabled' />
     于时间段：<input value="<?php echo ($search["start_time"]); ?>" tip='时间段' disabled='disabled' />
     至<input value="<?php echo ($search["end_time"]); ?>" tip='时间段' disabled='disabled' />的充值记录
     <br>
     注册会员有<span style="color:red"><?php echo ($countsize); ?></span>个，其中有充值记录的会员有<span style="color:red"><?php echo ($investno); ?></span>个，有投资记录的会员有<span style="color:red"><?php echo ($payno); ?></span>个，成功充值总额为<span style="color:red"><?php echo ($investmon); ?></span>元，成功投资总额为<span style="color:red"><?php echo ($paymon); ?></span>元
  </div>
  
  <div class="list">
  <table id="area_list" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th style="width:30px;">
        <input type="checkbox" id="checkbox_handle" onclick="checkAll(this)" value="0">
        <label for="checkbox"></label>
    </th>
<!--     <th class="line_l">ID</th>
    <th class="line_l">会员名</th>
    <th class="line_l">注册时间</th>
    <th class="line_l">成功充值金额</th>
    <th class="line_l">未成功充值金额</th> -->
    <th class="line_l">ID</th>
    <th class="line_l">会员名</th>
    <th class="line_l">注册时间</th>
    <th class="line_l">成功充值金额</th>
    <th class="line_l">成功投资金额</th>
  </tr>
<!--   <?php if(is_array($succinvest)): $i = 0; $__LIST__ = $succinvest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr overstyle='on' id="list_<?php echo ($vo["id"]); ?>">
        <td><input type="checkbox" name="checkbox" id="checkbox2" onclick="checkon(this)" value="<?php echo ($vo["id"]); ?>"></td>
        <td><?php echo ($vo["id"]); ?></td>
        <td><a onclick="loadUser(<?php echo ($vo["uid"]); ?>,'<?php echo ($vo["uname"]); ?>')" href="javascript:void(0);"><?php echo ($vo["uname"]); ?></a><?php echo ($vo["name"]); ?></td>
        <td><?php echo (date('Y-m-d',$vo["reg_time"])); ?></td>
        <td><?php echo ($vo["money"]); ?></td>
        <td><?php echo ($vo["failmoney"]); ?></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?> -->
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr overstyle='on' id="list_<?php echo ($vo["id"]); ?>">
        <td><input type="checkbox" name="checkbox" id="checkbox2" onclick="checkon(this)" value="<?php echo ($vo["id"]); ?>"></td>
        <td><?php echo ($vo["id"]); ?></td>
        <td><a onclick="loadUser(<?php echo ($vo["uid"]); ?>,'<?php echo ($vo["uname"]); ?>')" href="javascript:void(0);"><?php echo ($vo["uname"]); ?></a><?php echo ($vo["user_name"]); ?></td>
        <td><?php echo (date('Y-m-d',$vo["reg_time"])); ?></td>
        <td><?php echo ($vo["totalpay"]); ?></td>
        <td><?php echo ($vo["totalinvestor"]); ?></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
  </div>
  
  <div class="Toolbar_inbox">
  	<div class="page right"><?php echo ($pagebar); ?></div>
    <a onclick="dosearch();" class="btn_a" href="javascript:void(0);"><span class="search_action">搜索充值</span></a>
  </div>
</div>


<script type="text/javascript" src="__ROOT__/Style/A/js/adminbase.js?<?php echo C('APP_RES_VER');?>"></script>
</body>
</html>