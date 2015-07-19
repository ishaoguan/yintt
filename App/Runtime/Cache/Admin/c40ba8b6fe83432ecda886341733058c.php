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

<div class="so_main">
  <div class="page_tit">会员资料</div>
<!--搜索/筛选会员-->
    <div id="search_div" style="display:none">
  	<div class="page_tit"><script type="text/javascript">document.write(searchName);</script> [ <a href="javascript:void(0);" onclick="dosearch();">隐藏</a> ]</div>
	
	<div class="form2">
	<form method="get" action="__URL__/info">
   <dl class="lineD">
      <dt>会员名：</dt>
      <dd>
        <input name="user_name" style="width:190px" id="title" type="text" value="<?php echo ($search["user_name"]); ?>">
        <span>不填则不限制</span>
      </dd>
    </dl>

    <div class="page_btm">
      <input type="submit" class="btn_b" value="确定" />
    </div>
	</form>
  </div>
  </div>
<!--搜索/筛选会员-->

  <div class="Toolbar_inbox">
  	<div class="page right"><?php echo ($page); ?></div>
  	  <form name="invite" id="invite" action="__URL__/invite" method="get">
	  <div class="Toolbar_inbox">
	  	<span>用户名：<input onclick="WdatePicker();" name="user_name" id="user_name"  class="input" type="text" value="<?php echo ($where["user_name"]); ?>"></span>
	  	<span>邀请人：<input onclick="WdatePicker();" name="recommend_uname" id="recommend_uname"  class="input" type="text" value="<?php echo ($where["recommend_uname"]); ?>"></span>
	    <a href="javascript:;" onclick="tosub()" class="btn_a"><span>查询</span></a>
	  </div>
	  </form>
  </div>
  <script>
  function tosub(){
	  document.forms.invite.submit();
  }
  </script>
  <div class="list">
  <table id="area_list" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th style="width:30px;">
        <input type="checkbox" id="checkbox_handle" onclick="checkAll(this)" value="0">
        <label for="checkbox"></label>
    </th>
    <th class="line_l">用户ID</th>
    <th class="line_l">用户名</th>
    <!-- <th class="line_l">用户投资</th> -->
    <th class="line_l">邀请人用户ID</th>
    <th class="line_l">邀请人用户名</th>
     <th class="line_l">应发奖励(千分之<?php echo ($award_invest); ?>)</th>
     <!--<th class="line_l">已发奖励</th>-->
    <th class="line_l">注册时间</th>
  </tr>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr overstyle='on' id="list_<?php echo ($vo["id"]); ?>">
        <td><input type="checkbox" name="checkbox" id="checkbox2" onclick="checkon(this)" value="<?php echo ($vo["id"]); ?>"></td>
        <td><?php echo ($vo["id"]); ?></td>
        <td><a onclick="loadUser(<?php echo ($vo["id"]); ?>,'<?php echo ($vo["user_name"]); ?>')" href="javascript:void(0);"><?php echo ($vo["user_name"]); ?></a></td>
        <td><?php echo ($vo["recommend_id"]); ?></td>
        <td><?php echo ($vo["recommend_uname"]); ?></td>
        <td><?php echo ($vo["tmoney"]); ?>元</td>
         <!--<td><?php echo ($vo["issued_capital"]); ?>元</td>-->
        <td><?php echo (date("Y-m-d H:i:s",$vo["reg_time"])); ?></td>
        
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>

  </div>
  
  <div class="Toolbar_inbox">
  	<div class="page right"><?php echo ($page); ?></div>
  </div>
</div>
<script type="text/javascript">
function showurl(url,Title){
	ui.box.load(url, {title:Title});
}
</script>

<script type="text/javascript" src="__ROOT__/Style/A/js/adminbase.js?<?php echo C('APP_RES_VER');?>"></script>
</body>
</html>