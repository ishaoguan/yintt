<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
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
  <div class="page_tit">欢迎页</div>
  <!--列表模块-->
  <div class="Toolbar_inbox">
    <div class="page right">
	当前时间<span id="clock"></span>
    </div>
    <a href="javascript:;" class="btn_a"><span>欢迎登陆</span></a></div>
<script>
function changeClock()
{
	var d = new Date();
	document.getElementById("clock").innerHTML = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
}
window.setInterval(changeClock, 1000);
</script>  
<style type="text/css">
.ssx a{height:30px; line-height:30px}
</style>
  <div class="list">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th style="width:30px;">&nbsp;</th>
        <th class="line_l">待审核工作</th>
        <th class="line_l">公告</th>
        <th class="line_l">更新补丁</th>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>等待初审的标[<a href="__APP__/admin/borrow/waitverify.html"><?php echo (($row["borrow_1"])?($row["borrow_1"]):0); ?></a>]个</td>
        <td rowspan="8" class="ssx" style="border:1px solid #E3E6EB; border-bottom:0 none; border-top:0 none"><!--<script language="JavaScript" type="text/javascript" charset="gb2312" src="http://www.daiqile.com/data/js/22.js"></script>--></td>
        <td rowspan="8" class="ssx"><!--<script language="JavaScript" type="text/javascript" charset="gb2312" src="http://www.daiqile.com/data/js/8.js">--></script></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>等待复审的标[<a href="__APP__/admin/borrow/waitverify2.html"><?php echo (($row["borrow_2"])?($row["borrow_2"]):0); ?></a>]个</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>额度申请等待审核的[<a href="__APP__/admin/members/infowait.html"><?php echo (($row["limit_a"])?($row["limit_a"]):0); ?></a>]个</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>上传资料等待审核的[<a href="__APP__/admin/memberdata/index.html"><?php echo (($row["data_up"])?($row["data_up"]):0); ?></a>]个</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>等待VIP认证的[<a href="__APP__/Admin/vipapply/index?status=0"><?php echo (($row["vip_a"])?($row["vip_a"]):0); ?></a>]个</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>等待实名认证的[<a href="__APP__/Admin/memberid/index?status=3"><?php echo (($row["real_a"])?($row["real_a"]):0); ?></a>]个</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>等待现场认证的[<a href="__APP__/admin/verify_face/index.html"><?php echo (($row["face_a"])?($row["face_a"]):0); ?></a>]个</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>等待视频认证的[<a href="__APP__/admin/verify_video/index.html"><?php echo (($row["video_a"])?($row["video_a"]):0); ?></a>]个</td>
      </tr>
    </table>
  </div>
<!--<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Ff708bea5a5b94473d52231dbe92e5017' type='text/javascript'%3E%3C/script%3E"));
</script>
-->
</div>
<script type="text/javascript" src="__ROOT__/Style/A/js/adminbase.js?<?php echo C('APP_RES_VER');?>"></script>
</body>
</html>