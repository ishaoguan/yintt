<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta property="qc:admins" content="245102604663056411476766547" />
<meta property="wb:webmaster" content="0d73235795370474" />
<link type="text/css" rel="stylesheet" href="__ROOT__/Style/JBox/Skins/Red/jbox.css"/>
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/gold/css/basic.css?<?php echo C('APP_RES_VER');?>" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/gold/css/extra.css?<?php echo C('APP_RES_VER');?>" />
<link href="__ROOT__/favicon.ico" type="image/x-icon" rel=icon />
<script src="__ROOT__/Style/gold/js/common.js" type="text/javascript"></script>
<script src="__ROOT__/Style/Js/jquery-1.9.0.min.js" type="text/javascript"></script>
<!-- jquery-migrate -->
<script type="text/javascript">if ( typeof jQuery.migrateMute === "undefined" ) {jQuery.migrateMute = true;}</script>
<script language="javaScript" type="text/javascript" src="__ROOT__/Style/Js/jquery-migrate-master/migrate.js"></script>
<script language="javaScript" type="text/javascript" src="__ROOT__/Style/Js/jquery-migrate-master/core.js"></script>
<!-- jquery-migrate // -->
<script language=javascript src="__ROOT__/Style/JBox/jquery.jBox.min.js?ver=1" type=text/javascript></script>
<script language=javascript src="__ROOT__/Style/JBox/jquery.jBoxConfig.js" type=text/javascript></script>
<script type="text/javascript">var SITE_ROOT = '__ROOT__';var SITE_GROUP = '__GROUP__';</script>
    <!--[if IE 6]>
    <script type="text/javascript" src="__ROOT__/Style/IE6PNG/DD_belatedPNG.js"></script>
    <script>

        DD_belatedPNG.fix('.ws_selbull');
    </script>
    <![endif]-->
<script type="text/javascript">
	function makevar(v){
		var d={};
		for(i in v){
			var id = v[i];
			d[id] = $("#"+id).val();
			if(!d[id]) d[id] = $("input[name='"+id+"']:checked").val();
			if(!d[id]) d[id] = $("input[name='"+id+"']").val();
			if(typeof d[id] == "undefined") d[id] = "";
		}
		return d;
	}
    function addBookmark(title, url) {
        if (window.sidebar) {
            window.sidebar.addPanel(title, url, "");
        }
        else if (document.all) {
            window.external.AddFavorite(url, title);
        }
        else if (window.opera && window.print) {
            return true;
        }
    }
    function SetHome(obj, vrl) {
        try {
            obj.style.behavior = 'url(#default#homepage)'; obj.setHomePage(vrl);
            NavClickStat(1);
        }
        catch (e) {
            if (window.netscape) {
                try {
                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                }
                catch (e) {
                    alert("抱歉！您的浏览器不支持直接设为首页。请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为“true”，点击“加入收藏”后忽略安全提示，即可设置成功。");
                }
                var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
                prefs.setCharPref('browser.startup.homepage', vrl);
            }
        }
    }
</script>

</script>

<title><?php echo ($glo["index_title"]); ?></title>
<meta name="keywords" content="<?php echo ($glo["web_keywords"]); ?>" />
<meta name="description" content="<?php echo ($glo["web_descript"]); ?>" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/gold/css/invest.css?<?php echo C('APP_RES_VER');?>" />
<script type="text/javascript" src="__ROOT__/Style/H/js/area.js" language="javascript"></script>
﻿
<meta http-equiv="X-UA-Compatible" content="IE=8"/>
 
<link href="__ROOT__/Style/gold/images/favicon.ico" rel="icon" type="image/png"> 
 
<script type="text/javascript">
<!--
$(document).ready(function(){
/*                 var topMain=75
   var navaa=$(".internal");
   $(window).scroll(function(){
       if ($(window).scrollTop()>topMain){
           navaa.addClass("navaa_scroll");
       }
       else
       {
           navaa.removeClass("navaa_scroll");
       }
   }); */
	setCurUrl("#topLower ul li[for='first'] a.af");
});
//-->
</script>

<script type="text/javascript">
<!--
function videoverify(){
	$.jBox.confirm("申请视频认证后会直接从帐户扣除认证费用<?php echo (($glo["fee_video"])?($glo["fee_video"]):0); ?>元，然后客服会联系您进行认证。<br/><font style='color:red'>确定要申请认证吗?</font>", "视频认证", dovideo, { buttons: { '确认申请': true, '暂不申请': false} });
}
function dovideo(v, h, f) {
	if (v == true){
        $.ajax({
            url: "__APP__/common/video",
            data: {},
            timeout: 5000,
            cache: false,
            type: "get",
            dataType: "json",
            success: function (d, s, r) {
              	if(d){
					if(d.status==1) $.jBox.tip(d.message, 'success');
					else $.jBox.tip(d.message, 'fail');
				}
            }
        });
	}
	return true;
};
// 自定义按钮
function faceverify(){
	$.jBox.confirm("<font style='color:red'>确定要申请现场认证吗?</font>", "现场认证", doface, { buttons: { '确认申请': true, '暂不申请': false} });
}
function doface(v, h, f) {
	if (v == true){
        $.ajax({
            url: "__APP__/common/face",
            data: {},
            timeout: 5000,
            cache: false,
            type: "get",
            dataType: "json",
            success: function (d, s, r) {
              	if(d){
					if(d.status==1) $.jBox.tip(d.message, 'success');
					else $.jBox.tip(d.message, 'fail');
				}
            }
        });
	}
	return true;
};
// 自定义按钮
function getdoamin(){
	var darr = document.domain.split(".");
	if(darr.length>2){
		var domain = darr[darr.length-2]+"."+darr[darr.length-1];	
	}else{
		var domain = document.domain;	
	}
	return domain;//domain;
}
function qiehuan(num,n){
		for(var id = 0;id<n;id++)
		{
			if(id==num)
			{
				document.getElementById("qh_con"+id).style.display="block";
				document.getElementById("mynav"+id).className="nav_on";
			}
			else
			{
				document.getElementById("qh_con"+id).style.display="none";
				document.getElementById("mynav"+id).className="";
			}
		}
	}

function show(){
	document.getElementById("xinlang").style.display="block";
	//alert(document.getElementById("div").style.display)
}
function hidden(){
	document.getElementById('xinlang').style.display='none';
	//alert(document.getElementById("div").style.display)
}

function HideDiv(pName,evt){evt = evt || window.event;var obj = evt.toElement;while( obj!=null && obj.id!=pName ){obj = obj.parentElement;} if( obj==null ){ document.getElementById("xinlang").style.display="none";} }
//-->
</script>

<meta http-equiv="X-UA-Compatible" content="IE=8"/>
<body>

<style>
.kefu{margin: 0 auto;
width: 1024px;
height: auto;
overflow: hidden;}
#qq{
width:70px;
background:url('__ROOT__/Style/M/images/16.png') no-repeat;
}
.col-contact{float:right;width:230px;text-align:center}
.col-contact p.phone{margin:7px 0 5px 0;font-size:18px;line-height:1;color:#0074b1}

</style>


 <!-- Top -->
<div id="topBanner">
	<div class="kefu">
  	<div style="margin-top:0px;float:left;">
    	<div class="col-contact">
        	<p class="phone">热线电话：0755-29056888</p>
		</div>
	</div>
	<div style="float:right;">
    <ul>
		<li><a href="__APP__/help/faq.html">帮助中心</a></li>
		<li class="divide"></li>
		<li><a href="__APP__/service/index.html" target="_blank">在线客服</a></li>
		<li class="divide"></li>
		<li><a href="__APP__/indexs/xssl.html">新手指引</a></li>
		<li class="divide"></li>
		<?php if(empty($UID)): ?><li><input type="button" class="qqBut" value="QQ 登录" onClick="javascript:window.location.href='/member/oauth/qq/'"></li>
      		<!--<li class="divide"></li>
     		<li><input type="button" class="sinaBut" value="微博登录" onclick="javascript:window.location.href='/member/oauth/sina'"></li>-->
    		<li class="divide"></li>
			<li><a href="__APP__/member/common/login/">登录</a></li>
			<li class="divide"></li>
			<li><a href="__APP__/member/common/register">立即注册</a></li>
		<?php else: ?>
     		<li class="pull"><a href="__APP__/member/common/actlogout">[退出]</a></li>
			<li class="divide"></li>
			<li class="pull">欢迎你,<a href="__APP__/member/index.html"><?php echo session('u_user_name');?></a>&nbsp;&nbsp;&nbsp;<a href="__APP__/member/msg#fragment-1">我的消息<span class="ui-nav-msgcount rrdcolor-lightblue-bg"><?php echo getMsgCount($UID);?></span></a></li><?php endif; ?>
	</ul>
	</div>
	</div>
</div>
    
 
 <!----菜单---->
  <div id="topLower" >

 
   <div class="internal">
   
    <div id="logo"><a href="__APP__/"><img src="__ROOT__/Style/gold/images/logo.png" width="235" height="90" alt="#" /></a></div>
 
	<div style="padding-top:35px">
    <ul>
	<?php $typelist = getTypeList(array('type_id'=>0,'limit'=>10)); foreach($typelist as $vtype=> $va){ ?>
     	<li for="first"><a class="af" href="<?php echo ($va["turl"]); ?>" <?php if($va["is_blank"])echo 'target="_blank"'; ?>><?php echo ($va["type_name"]); ?></a>
        
      <!-- <span class="icon-dd"></span>-->
        
        
		<?php $sontypelist = getTypeList(array('type_id'=>$va['id'],'limit'=>10,'notself'=>true)); if(count($sontypelist)>0) echo "" ;if(count($sontypelist)>0) echo "<ol style='display:none'>"; foreach($sontypelist as $sonvtype){ ?>
		<li><a href="<?php echo ($sonvtype["turl"]); ?>" <?php if($sonvtype["is_blank"])echo 'target="_blank"'; ?>><?php echo ($sonvtype["type_name"]); ?></a></li>
		<?php } if(count($sontypelist)>0) echo '</ol>'; ?>
     	</li>
		
	<?php } ?>
	
	
	
	
	
	
	
	</ul>
	</div>

	
	
   </div>
  </div>
 <!-- Top // -->
  
  
  
  
  
  
  
 <!-- Top // -->
 
 <script type="text/javascript">
function left(mainStr, lngLen) {
	if (lngLen > 0) {
		return mainStr.substring(0, lngLen)
	} else {
		return null
	}
}
function right(mainStr, lngLen) {
	// alert(mainStr.length) 
	if (mainStr.length - lngLen >= 0 && mainStr.length >= 0
			&& mainStr.length - lngLen <= mainStr.length) {
		return mainStr.substring(mainStr.length - lngLen,
				mainStr.length)
	} else {
		return null
	}
}
function mid(mainStr, starnum, endnum) {
	if (mainStr.length >= 0) {
		return mainStr.substr(starnum, endnum)
	} else {
		return null
	}
	//mainStr.length 
}
$("#topLower ul li[for='first'], #topLower ul li[for='first'] ol").on("mouseover",function(){
	$(this).find("ol").css("display","");
});
$("#topLower ul li[for='first'], #topLower ul li[for='first'] ol").on("mouseout",function(){
	$(this).find("ol").css("display","none");
});
$(document).ready(function(){
	$("#top_us ul li[for='first'], #top_us ul li[for='first'] ol").on("mouseover",function(){
		$(this).find("ol").css("display","");
	});
	$("#top_us ul li[for='first'], #top_us ul li[for='first'] ol").on("mouseout",function(){
		$(this).find("ol").css("display","none");
	});
 	$("#top_us ul li ol li a").each(function(){
		$(this).each(function(){
			if($(this).text().length >= 6){
				$(this).parent().parent().css("width", "100px");
				return false;
			}
		});
	});
});
</script>
 
 


<style>
 body{font: 12px/1.14 5FAE8F6F96C59ED1,Arial,5b8b4f53;}

* {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}
h3, .h3 {
font-size: 24px;
}

h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
font-family: inherit;
font-weight: 500;
line-height: 1.1;
color: inherit;
}
.clearfix:after, .container:after, .container-fluid:after, .row:after, .form-horizontal .form-group:after, .btn-toolbar:after, .btn-group-vertical>.btn-group:after, .nav:after, .navbar:after, .navbar-header:after, .navbar-collapse:after, .pager:after, .panel-body:after, .modal-footer:after {
clear: both;
}
.tiles.white {
border: 1px solid #e7eaec;
width: 700px;
margin-top: 10px;
background-color: #ffffff;
color: #8b91a0;
-webkit-box-shadow: #CCC 0 0 5px;
}
h1, .h1, h2, .h2, h3, .h3 {
margin-top: 10px;
margin-bottom: 10px;
}

.p-t-5 {
  padding-top: 5px;
}
.p-r-5 {
  padding-right: 5px;
}
.p-l-5 {
  padding-left: 5px;
}
.p-b-5 {
  padding-bottom: 5px;
}
.p-t-10 {
  padding-top: 10px;
}
.p-r-10 {
  padding-right: 10px;
}
.p-l-10 {
  padding-left: 10px;
}
.p-b-10 {
  padding-bottom: 10px;
}
.p-t-15 {
  padding-top: 15px;
}
.p-r-15 {
  padding-right: 15px;
}
.p-l-15 {
  padding-left: 15px;
}
.p-b-15 {
  padding-bottom: 15px;
}
.p-t-20 {
  padding-top: 20px;
}
.p-r-20 {
  padding-right: 20px;
}
.p-l-20 {
  padding-left: 20px;
}
.p-b-20 {
  padding-bottom: 20px;
}
.p-t-25 {
  padding-top: 25px;
}
.p-r-25 {
  padding-right: 25px;
}
.p-l-25 {
  padding-left: 25px;
}
.p-b-25 {
  padding-bottom: 25px;
}
.p-t-30 {
  padding-top: 30px;
}
.p-r-30 {
  padding-right: 30px;
}
.p-l-30 {
  padding-left: 30px;
}
.p-b-30 {
  padding-bottom: 30px;
}
.p-t-35 {
  padding-top: 35px;
}
.p-r-35 {
  padding-right: 35px;
}
.p-l-35 {
  padding-left: 35px;
}
.p-b-35 {
  padding-bottom: 35px;
}
.p-t-40 {
  padding-top: 40px;
}
.p-r-40 {
  padding-right: 40px;
}
.p-l-40 {
  padding-left: 40px;
}
.p-b-40 {
  padding-bottom: 40px;
}
.p-t-45 {
  padding-top: 45px;
}
.p-r-45 {
  padding-right: 45px;
}
.p-l-45 {
  padding-left: 45px;
}
.p-b-45 {
  padding-bottom: 45px;
}
.p-t-50 {
  padding-top: 50px;
}
.p-r-50 {
  padding-right: 50px;
}
.p-l-50 {
  padding-left: 50px;
}
.p-b-50 {
  padding-bottom: 50px;
}
.p-t-55 {
  padding-top: 55px;
}
.p-r-55 {
  padding-right: 55px;
}
.p-l-55 {
  padding-left: 55px;
}
.p-b-55 {
  padding-bottom: 55px;
}
.p-t-60 {
  padding-top: 60px;
}
.p-r-60 {
  padding-right: 60px;
}
.p-l-60 {
  padding-left: 60px;
}
.p-b-60 {
  padding-bottom: 60px;
}
.p-t-65 {
  padding-top: 65px;
}
.p-r-65 {
  padding-right: 65px;
}
.p-l-65 {
  padding-left: 65px;
}
.p-b-65 {
  padding-bottom: 65px;
}
.p-t-70 {
  padding-top: 70px;
}
.p-r-70 {
  padding-right: 70px;
}
.p-l-70 {
  padding-left: 70px;
}
.p-b-70 {
  padding-bottom: 70px;
}
.p-t-75 {
  padding-top: 75px;
}
.p-r-75 {
  padding-right: 75px;
}
.p-l-75 {
  padding-left: 75px;
}
.p-b-75 {
  padding-bottom: 75px;
}
.p-t-80 {
  padding-top: 80px;
}
.p-r-80 {
  padding-right: 80px;
}
.p-l-80 {
  padding-left: 80px;
}
.p-b-80 {
  padding-bottom: 80px;
}
.p-t-85 {
  padding-top: 85px;
}
.p-r-85 {
  padding-right: 85px;
}
.p-l-85 {
  padding-left: 85px;
}
.p-b-85 {
  padding-bottom: 85px;
}
.p-t-90 {
  padding-top: 90px;
}
.p-r-90 {
  padding-right: 90px;
}
.p-l-90 {
  padding-left: 90px;
}
.p-b-90 {
  padding-bottom: 90px;
}
.p-t-95 {
  padding-top: 95px;
}
.p-r-95 {
  padding-right: 95px;
}
.p-l-95 {
  padding-left: 95px;
}
.p-b-95 {
  padding-bottom: 95px;
}
.p-t-100 {
  padding-top: 100px;
}
.p-r-100 {
  padding-right: 100px;
}
.p-l-100 {
  padding-left: 100px;
}
.p-b-100 {
  padding-bottom: 100px;
}
.m-t-5 {
  margin-top: 5px;
}
.m-r-5 {
  margin-right: 5px;
}
.m-l-5 {
  margin-left: 5px;
}
.m-b-5 {
  margin-bottom: 5px;
}
.m-t-10 {
  margin-top: 10px;
}
.m-r-10 {
  margin-right: 10px;
}
.m-l-10 {
  margin-left: 10px;
}
.m-b-10 {
  margin-bottom: 10px;
}
.m-t-15 {
  margin-top: 15px;
}
.m-r-15 {
  margin-right: 15px;
}
.m-l-15 {
  margin-left: 15px;
}
.m-b-15 {
  margin-bottom: 15px;
}
.m-t-20 {
  margin-top: 20px;
}
.m-r-20 {
  margin-right: 20px;
}
.m-l-20 {
  margin-left: 20px;
}
.m-b-20 {
  margin-bottom: 20px;
}
.m-t-25 {
  margin-top: 25px;
}
.m-r-25 {
  margin-right: 25px;
}
.m-l-25 {
  margin-left: 25px;
}
.m-b-25 {
  margin-bottom: 25px;
}
.m-t-30 {
  margin-top: 30px;
}
.m-r-30 {
  margin-right: 30px;
}
.m-l-30 {
  margin-left: 30px;
}
.m-b-30 {
  margin-bottom: 30px;
}
.m-t-35 {
  margin-top: 35px;
}
.m-r-35 {
  margin-right: 35px;
}
.m-l-35 {
  margin-left: 35px;
}
.m-b-35 {
  margin-bottom: 35px;
}
.m-t-40 {
  margin-top: 40px;
}
.m-r-40 {
  margin-right: 40px;
}
.m-l-40 {
  margin-left: 40px;
}
.m-b-40 {
  margin-bottom: 40px;
}
.m-t-45 {
  margin-top: 45px;
}
.m-r-45 {
  margin-right: 45px;
}
.m-l-45 {
  margin-left: 45px;
}
.m-b-45 {
  margin-bottom: 45px;
}
.m-t-50 {
  margin-top: 50px;
}
.m-r-50 {
  margin-right: 50px;
}
.m-l-50 {
  margin-left: 50px;
}
.m-b-50 {
  margin-bottom: 50px;
}
.m-t-55 {
  margin-top: 55px;
}
.m-r-55 {
  margin-right: 55px;
}
.m-l-55 {
  margin-left: 55px;
}
.m-b-55 {
  margin-bottom: 55px;
}
.m-t-60 {
  margin-top: 60px;
}
.m-r-60 {
  margin-right: 60px;
}
.m-l-60 {
  margin-left: 60px;
}
.m-b-60 {
  margin-bottom: 60px;
}
.m-t-65 {
  margin-top: 65px;
}
.m-r-65 {
  margin-right: 65px;
}
.m-l-65 {
  margin-left: 65px;
}
.m-b-65 {
  margin-bottom: 65px;
}

.b-grey {
  border-color: #e5e9ec;
}
.b-b{
 border-bottom: 1px solid #EEE;
}
 .b-b-d {border-bottom: 1px dotted #ccc;}
.row{margin-left:-15px;margin-right:-15px}

.clearfix:before, .clearfix:after, .container:before, .container:after, .container-fluid:before, .container-fluid:after, .row:before, .row:after, .form-horizontal .form-group:before, .form-horizontal .form-group:after, .btn-toolbar:before, .btn-toolbar:after, .btn-group-vertical>.btn-group:before, .btn-group-vertical>.btn-group:after, .nav:before, .nav:after, .navbar:before, .navbar:after, .navbar-header:before, .navbar-header:after, .navbar-collapse:before, .navbar-collapse:after, .pager:before, .pager:after, .panel-body:before, .panel-body:after, .modal-footer:before, .modal-footer:after {
content: " ";
display: table;
}
.col-md-4{width:33.33333333%}
.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
float: left;
}
.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12{float:left}

.text-black {
color: #1b1e24 !important;
}
.col-md-1 {
width: 15%;
}
.col-md-2 {
width: 20%;
}
.col-md-3 {
width:30%;
}

.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
position: relative;
min-height: 1px;
padding-left: 15px;
padding-right: 15px;
}
.tiles p {
margin: 0 0 5px;
}
.text-success {
color: #0D6DA3 !important;
}
.text-success {
color: #3c763d;
}


.text-black {
color: #1b1e24 !important;
}
.text-black {
color: #1b1e24 !important;
}
.plan-10 { width:10px; background-color:#C93;}

.tpt{ width:720px; height:35px; line-height:35px; padding-left:20px; font-size:16px;}
h4, .h4 {
font-size: 16px;
}
 .biao{
margin:6px;
width: 26px;
height: 24px;
line-height: 22px;
color: #fff;
font-size: 14px;
position: absolute;
text-indent: 6px;
padding-bottom: 2px;
	 }

.di_biao{background-color: #4BB381;}

em{font-style: normal;}
.h4m{ margin-top: 10px;
margin-bottom: 10px;}


</style>
   <div id="pos">
    <ul>
     <li><a href="__APP__/"><?php echo ($glo["web_name"]); ?></a></li>
     <li class="posDiv"></li>
     <li><p>我要投资</p></li>
    </ul>
   </div>
   
   <div id="content">
    <div id="left">
     <!-- Left -->
      
      <div id="stick_h">
       <h4>每日推荐项目</h4>
      </div>
      
      <?php if(count($listBorrow_tj['list']) > 0): ?><div id="stick">
       <div class="sk_h">
        <a href="<?php echo (getinvesturl($listBorrow_tj["list"]["0"]["id"])); ?>"><?php echo ($listBorrow_tj["list"]["0"]["borrow_name"]); ?></a>
        <div class="rate"><div class="rate_s" style="width:<?php echo ($listBorrow_tj["list"]["0"]["progress"]); ?>%"><span><?php echo ($listBorrow_tj["list"]["0"]["progress"]); ?>%</span></div></div>
        <p>进度：</p>
       </div>
      <div class="sk_con">
       <div class="sk_l">
        <p>债务人：<?php echo ($listBorrow_tj["list"]["0"]["user_name"]); ?></p>
        <p>债务人主要经营：<?php echo (cnsubstr(text($listBorrow_tj["list"]["0"]["borrow_info"],false,false),38)); ?></p>
        <p><?php if($listBorrow_tj['list'][0]['repayment_type'] == 1): ?>日<?php else: ?>年<?php endif; ?>化利率：<?php echo ($listBorrow_tj["list"]["0"]["borrow_interest_rate"]); ?>%</p>
        <p>借款期限：<?php echo ($listBorrow_tj["list"]["0"]["borrow_duration"]); ?> <?php if($listBorrow_tj['list'][0]['repayment_type'] == 1): ?>天<?php else: ?>个月<?php endif; ?></p>
        <p>发标时间：<?php echo ($listBorrow_tj["list"]["0"]["schedular_time"]); ?></p>
       </div>
       <div class="sk_r">
        <p>项目金额：<samp><span></span><?php echo (fmoney($listBorrow_tj["list"]["0"]["borrow_money"],false,false)); ?><span>元</span></samp></p>
        <p><input type="button" class="sk_but" value="立即投资" onclick="javascript:window.location.href='<?php echo (getinvesturl($listBorrow_tj["list"]["0"]["id"])); ?>'" /></p>
       </div>
      </div>
      </div><?php endif; ?>
      
    <FORM id="searchform" name="searchform" action="__URL__/index" method="post">
      <div id="search">
      
       <div id="search_h">
        <h4>条件：</h4>
       </div>
       <ul>
        <li>
         <p>还款方式：</p>
     <?php if(is_array($Bconfig['REPAYMENT_TYPE'])): foreach($Bconfig['REPAYMENT_TYPE'] as $k=>$v): ?><a href="javascript:void(0)" attval="repayment_type[]|<?php echo ($k); ?>"><?php echo ($v); ?></a><?php endforeach; endif; ?>
        </li>
        <li>
         <p>借款目的：</p>
     <?php if(is_array($Bconfig['BORROW_USE'])): foreach($Bconfig['BORROW_USE'] as $k=>$v): ?><a href="javascript:void(0)" attval="borrow_use[]|<?php echo ($k); ?>"><?php echo ($v); ?></a><?php endforeach; endif; ?>
        </li>
        <li>
         <p>金额范围：</p>
     <?php if(is_array($Bconfig['MONEY_SEARCH'])): foreach($Bconfig['MONEY_SEARCH'] as $k=>$v): ?><a href="javascript:void(0)" attval="money|<?php echo ($k); ?>"><?php echo ($v); ?></a><?php endforeach; endif; ?>
        </li>
        <li>
         <p>奖励：</p>
     <?php if(is_array($Bconfig['IS_REWARD'])): foreach($Bconfig['IS_REWARD'] as $k=>$v): ?><a href="javascript:void(0)" attval="is_reward[]|<?php echo ($k); ?>"><?php echo ($v); ?></a><?php endforeach; endif; ?>
        </li>
        <li>
         <p>关键字：</p>
         <input type="text" class="sea_text" name="borrow_name" id="borrow_name"  value="<?php echo ($searchMap["borrow_name"]); ?>"/>
         <input type="submit" class="sea_but" value="" />
        </li>
       </ul>
      
      </div>
      </FORM>
      
      <div id="list_h">
       <h4>投资项目列表</h4>
       <ul>
        <li><a id="a1" href="__APP__/invest/index/borrow_status/9">全部</a></li>
        <li><a id="a2" href="__APP__/invest/index/borrow_status/4">复审中的</a></li>
        <li><a id="a3" href="__APP__/invest/index/borrow_status/6">还款中的</a></li>
        <li><a id="a4" href="__APP__/invest/index/borrow_status/7">已完成的</a></li>
       </ul>
       <p>当前<span><?php echo ($doingnum); ?></span>个项目，供您选择</p>
      </div>
      
      <div id="list">
   
      <?php if(is_array($list["list"])): $i = 0; $__LIST__ = $list["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vb): $mod = ($i % 2 );++$i;?><div class="tiles white add-margin">
            
            
             <div class="text-black tpt"><a href="<?php echo (getinvesturl($vb["id"])); ?>" title="<?php echo ($vb["borrow_name"]); ?>"><?php echo (cnsubstr($vb["borrow_name"],15)); ?></a><span title="抵押标" class="biao di_biao">抵</span></div>
          <div class="p-l-20 p-r-20 p-b-20">
          
          
              <div class="row b-grey b-b xs-p-b-20">
                
                <div class="col-md-4">
                  <h5 class="text-black m-t-20 semi-bold">借款金额</h5>
                  <h3 class="text-success semi-bold"><span data-animation-duration="600" data-value="15458" class="animate-number"><?php echo (fmoney($vb["borrow_money"])); ?></span></h3>
                </div>

                
                <div class="col-md-1">
                  <div class="m-t-20">
                    <h5 class="text-black semi-bold h4m"><?php if($vb["repayment_type"] == 1): ?>日利率<?php else: ?>年利率<?php endif; ?></h5>
                    <h4 class="text-success semi-bold"><span data-animation-duration="600" data-value="4569" class="animate-number"><?php echo ($vb["borrow_interest_rate"]); ?></span>%</h4>
                  </div>
                </div>
                
                
                
                
                <div class="col-md-1">
                  <div class="m-t-20">
                    <h5 class="text-black semi-bold h4m">奖 励</h5>
                    <h4 class="text-success semi-bold"><span data-animation-duration="600" data-value="4569" class="animate-number"><?php echo ($vb["reward_num"]); ?></span>%</h4>
                  </div>
                </div>
                
                
                <div class="col-md-1 xs-m-b-20">
                  <div class="m-t-20">
                   <strong class="ui-progressbar-small ui-progressbar-small-<?php echo (round($vb["progress"])); ?>"><em><?php echo (round($vb["progress"])); ?></em>%</strong>
                  </div>
                </div>
                
                
                <div class="col-md-2 xs-m-b-20">
                  <div class="m-t-30">
                    
                   
                    
                    
                    
                     <?php if($vb["borrow_status"] == 3): ?><samp class="yellow">已流标</samp>
         <?php elseif($vb["borrow_status"] == 4): ?>
         <samp class="yellow">等待复审</samp>
         <?php elseif($vb["borrow_status"] == 6): ?>
         <samp class="yellow">还款中...</samp>
         <?php elseif($vb["borrow_status"] > 6): ?>
         <samp class="green">已经还完</samp>
         <?php else: ?>
         <input type="button" class="list_but" value="投 资" onclick="javascript:window.location.href='<?php echo (getinvesturl($vb["id"])); ?>'" /><?php endif; ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                  </div>
                </div>
                
              </div>
              <div class="row b-grey">
                <div class="col-md-2">
                  <div class="m-t-10">
                    <p class="text-black">借款期限</p>
                    <p class="text-success"><?php echo ($vb["borrow_duration"]); if($vb["repayment_type"] == 1): ?>天<?php else: ?>个月<?php endif; ?></p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="m-t-10">
                    <p class="text-black">发标时间</p>
                    <p class="text-success"><?php echo ($vb["schedular_time"]); ?></p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="m-t-10">
                    <p class="text-black">计息方式</p>
                    <p class="text-success">满标计息</p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="m-t-10">
                    <p class="text-black">还款方式</p>
                    <p class="text-success"><?php echo ($Bconfig['REPAYMENT_TYPE'][$vb['repayment_type']]); ?></p>
                  </div>
                </div>
                
              </div>
            </div></div><?php endforeach; endif; else: echo "" ;endif; ?>
      
      </div>
      
      <div class="pages badoo"><?php echo ($list["page"]); ?></div>
      
     <!-- Left // -->
    </div>
	     <?php  $parm = array(); $parm['type_id'] = 392; $parm['limit'] = 6; $questionList = getArticleList($parm); $recentList = getRecentList(10); $nearlyStartTime = strtotime("-3 days"); $nearlyStartDate = date('Y-m-d', $nearlyStartTime); $nearlyEndTime = strtotime("$nearlyStartDate 1 month -1 day"); $map = array(); $map['d.status'] = array("neq", 0); $map['d.deadline'] = array("between", $nearlyStartTime.','.$nearlyEndTime); $nearlylist = getTenderList($map, null, 10, 'd.deadline asc'); $recentPayList = $nearlylist['list']; ?>
     
    <div id="right">
     <!-- Right -->
      <div id="rb1">
       <div id="rb1_upper">
        <div id="rb1_upper_l"></div>
        <div id="rb1_upper_r"><h3>诚&nbsp;&nbsp;&nbsp;一站式金融服务平台</h3><p>低风险，收益率适中投资理财服务</p></div>
       </div>
       <div class="rb1_bo1">
        <h4>诚信担保</h4>
        <p>- 所有的投资项目均有第三方担保</p>
        <p>- 100%本金和收益保障</p>
       </div>
       <div class="rb1_bo2">
        <h4>轻松愉快的投资过程</h4>
        <p>- 无需太多操劳，一切有我为您服务</p>
        <p>- 投资流程简单明了</p>
       </div>
       <div class="rb1_bo3">
        <h4>可观的收益</h4>
        <p>- 12%~21%年化收益率，保障收益</p>
       </div>
      </div>
      
      <div class="rb1_h"><h4>投资/借款 攻略</h4><a href="../help/faq.html">+ 帮助中心</a></div>
      <div class="rb3">
       <div class="rb3_upper">
        <div class="rb3_upper_l"><img src="__ROOT__/Style/gold/images/home_99.gif" width="32" height="58" alt="" /></div>
        <div class="rb3_upper_r">
         <a href="../help/faq.html"><h4>您可以找到您想要的答案！</h4></a>
         <p>或许您也可以尝试拨打我们的免费热线，或是在线咨询我们的客服。</p>
        </div>
       </div>
       <ul>
     <?php if(is_array($questionList["list"])): $i = 0; $__LIST__ = $questionList["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vl["arturl"]); ?>"><?php echo ($vl["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
       </ul>
      </div>
      
     
      
     <!-- Right // -->
    </div>
<script type="text/javascript">
<!--
$(document).ready(function(){
	$(".rb2_h ol li").on({
		mouseenter:function(){
			$(".rb2_h ol li").removeClass("cen");
			$(this).addClass("cen");
			$(this).parent().find("a").each(function(){
				$("#"+$(this).attr("for")).css("display", "none");
			});
			$("#"+$(this).find("a").attr("for")).css("display", "");
		}
	});
});
//-->
</script>
   </div>
<script type="text/javascript">
//var areaurl="__URL__/getarea/";
//var s = new GetAreaSelect('#province','#city','#area'<?php if(empty($searchMap['province'])): else: ?>,<?php echo ($searchMap["province"]); endif; if(empty($searchMap['city'])): else: ?>,<?php echo ($searchMap["city"]); endif; if(empty($searchMap['area'])): else: ?>,<?php echo ($searchMap["area"]); endif; ?>);
</script>
<script type="text/javascript">
$(document).ready(function(){
	var url = window.location.href;
	var args = url.split("borrow_status/");
	if(url.indexOf("borrow_status/") >= 0 && args.length > 1){
		var tab = args[1];
		var myarr = tab.split("/");
		if(myarr.length > 1)tab = myarr[0];
		$(function(){ 
			if(tab==9){
				$('#a1').parent().addClass("cen");
			}else if(tab==4){
				$('#a2').parent().addClass("cen");
			}else if(tab==6){
				$('#a3').parent().addClass("cen");
			}else if(tab==7){
				$('#a4').parent().addClass("cen");
			}else{
				$('#a1').parent().addClass("cen");
			}
		});
	}else{
		$('#a1').parent().addClass("cen");
	}
	
	$("#search ul li a").click(function(){
		//special
		if($(this).attr("attval").indexOf("money")>=0){
			$("#search_h a[attval*='money']").remove();
			$("#searchform input[type=hidden][name*='money']").remove();
		}
		if($("#search_h a[attval='"+$(this).attr("attval")+"']").size() == 0){
			$("#search_h").append($(this).clone());
			var arrs = $(this).attr("attval").split('|');
			$("#searchform").append("<input type='hidden' name='"+arrs[0]+"' value='"+arrs[1]+"' />");
			$("#search_h a").on("click", function(){
				var arrs = $(this).attr("attval").split('|');
				$(this).remove();
				$("#searchform input[type=hidden][name='"+arrs[0]+"'][value='"+arrs[1]+"']").remove();
			});
		}
	});
	<?php if(!empty($maprow)){ foreach($maprow as $k=>$v){ if(!empty($v)){ if(is_array($v)){ foreach($v as $vv){ ?>
				$("#search ul li a[attval='<?php echo ($k); ?>[]|<?php echo ($vv); ?>']").click();
				<?php }}else{ ?>
				$("#search ul li a[attval='<?php echo ($k); ?>|<?php echo ($v); ?>']").click();
				<?php }} } } ?>
});
</script>
<!--中部结束-->
﻿<meta http-equiv="X-UA-Compatible" content="IE=8"/>
<!-- <link rel="stylesheet" href="__ROOT__/Style/gold/css/css" type="text/css" media="all"> -->
	<link rel="stylesheet" href="__ROOT__/Style/gold/css/_footer.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="__ROOT__/Style/gold/css/append.css?<?php echo C('APP_RES_VER');?>" />
    <link href="__ROOT__/Style/gold/css/online.css" rel="stylesheet" type="text/css" />
	<!-- Layout wrapper -->

    <script src="__ROOT__/Style/gold/js/toastr.js"></script>
<div class="foot">
    <div class="footer">        
        <div class="foot_Box">
            <div class="Telus lf">
                <ul>
                    <li><strong>联络我们</strong>（09:00 - 18:00）</li>
                    <li class="tel">0755-29056888</li>
                </ul>
                <div class="clear"></div>
            </div>
            
            <div class="FollowUs FootLinks rt">
       			<ul>
         		 	<li class="Followpic">
         		 		<span class="lf" style="font-size: 20px">关注我们</span><em class="lf"></em>
         		 		<a style="margin-left: 10px" href="http://weibo.com/szyintongtai/home?topnav=1&wvr=6" target="_blank" class="sina" title="关注新浪微博"></a>
               			<a href="http://t.qq.com/yintongtaizichan" target="_blank" class="tengxun" title="关注腾讯微博"></a>
               			<a href="#" class="popbox-link weixin" onmousemove="showImg(this)" onmouseout="closeImg(this)" title="扫一扫关注银通泰官方微信"></a>
               			<div id="erweima" class="" style="display: none;position:relative; bottom: 300px;right: -80px;" >
		   						<div class="">
		   							<img src="__ROOT__/Style/gold/images/append/erweima2.png" alt="二维码">
		   						</div>
	   					</div>
	   					<script type="text/javascript">
	   					var obj = $("#erweima"); 
	   					var bottom = obj.prev().position().bottom;
	   					var right = obj.prev().position().right;
	   					obj.css("bottom",bottom);
	   					obj.css("right",right);
	   					function showImg(obj){
	   						$("#erweima").css("display","block");
	   						//var x = event.clientX;
	   						//var y = event.clientY;
	   					}
	   					function closeImg(obj){
	   						$("#erweima").css("display","none");
	   					}
	   					</script>
	   					</script>
         		 	</li>
              	</ul>
           	</div>
            <div class="clear"></div>
            <div class="FriendLinks">
                <div class="FriendLinks_cont">
   					<strong class="" style=" margin-right:15px; color:#777;font-size: 18px;"> 友情链接</strong>
   					<?php if(is_array($yqList)): $i = 0; $__LIST__ = $yqList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yq): $mod = ($i % 2 );++$i;?><a href="<?php echo ($yq["link_href"]); ?>" target="_blank"><?php echo ($yq["link_txt"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    			</div>
            </div>
        </div>            
    </div>
</div>
		<div id="copyright-wrapper">
			<div id="copyright-container" class="size-wrap">
				<div id="copyright">
					<?php echo ($glo["bottom_copyright"]); ?>
				</div>
				<div id="footer-menu" class="menu-footer-menu-container">
					<ul class="menu">
						<li>
							<a href="__APP__/" >
								首页
							</a>
						</li>
                        
						<li>
							<a href="/invest/index/borrow_status/9">
								我要投标
							</a>
						</li>
						<li>
							<a href="/borrow/index.html">
								我要借款
							</a>
						</li>
						<li>
							<a href="/aqbz/index.html">
								安全保障
							</a>
						</li>
						<li>
							<a href="/dfafa/index.html">
								关于我们
							</a>
						</li>
						<li style="float: none; padding-left: 75px;">  
							 <a href="http://www.szcredit.com.cn/web/Index.aspx"  title="" target="_blank" style="float:left;">
								<img src="__ROOT__/Style/gold/images/icon/3/theBusinessLicense.PNG" height="40">
							</a>
                               
							<a href="https://cert.ebs.gov.cn/aeee9070-ad7d-4abd-89cd-3bb757858726" title="网络工商" target="_blank" style="float:left;">
								<img src="__ROOT__/Style/gold/images/icon/3/govIcon.gif" height="40" />
							</a>
							
							<a href="http://www.sznet110.gov.cn/netalarm/index.jsp?fromsznet110=true" title="平平安安" target="_blank" style="float:left;">
								<img src="__ROOT__/Style/gold/images/icon/3/wangjing.PNG" height="40" />
							</a>
                               
							<a href="http://www.sznet110.gov.cn/netalarm/index.jsp?fromsznet110=true" title="深圳动态岗亭" target="_blank" style="float:left;">
								<img src="__ROOT__/Style/gold/images/icon/3/01.png" height="40" />
							</a>
						</li>
                       
                       
                       
					</ul>
				</div>
				<div class="clear">
				</div>
			</div>
		</div>
	</div
><script language="javaScript" type="text/javascript" src="__ROOT__/Style/H/js/backtotop.js"></script>

<!-- Advice BEGIN -->
<div id="rjsAdvice" title="单击可以填写您的宝贵建议"></div>
<div class="messhade" style="display:none;">
	<div id="mes">
	  <div id="mes_ts"><img src="__ROOT__/Style/H/images/close_red.png" width="24" height="24" alt="<?php echo ($glo["ttxf_keyworddensity"]); ?>" /></div>
	  <div id="mes_co">
	   <ul>
	    <li><p>昵称：</p><input type="text" class="tet" id="txtMesNickName"/></li>
	    <li><p>手机：</p><input type="text" class="tet" id="txtMesPhone"/></li>
	    <li><p>QQ：</p><input type="text" class="tet" id="txtMesQQ"/></li>
	    <li><p>邮箱：</p><input type="text" class="tet" id="txtMesEmail"/></li>
	    <li><p><span>*</span>内容：</p><textarea class="tea" id="txtMesContent"></textarea></li>
	    <li><p>&nbsp;</p><input id="btnMesSubmit" type="button" class="mes_but" /><input id="btnAdviceCancel" type="button" class="mes_but2" value="取消" /></li>
	   </ul>
	   <div class="mes_r">
	    <p>掌握中国最新理财、借贷产品</p>
	    <img src="__ROOT__/Style/H/images/mes_07.gif" width="113" height="112" alt="<?php echo ($glo["ttxf_keyworddensity"]); ?>" />
	   </div>
	  </div>
	  <div id="mes_fs"></div>
	</div>
</div>
<script type="text/javascript">
<!--
var BODY_MARGIN;
$('#rjsAdvice').click(function(){
	BODY_MARGIN = $(document).height() > $(window).height() || $('body').css('overflow-y') === 'scroll' ? $('body').css('margin-right') : false;
	var container = document.all && !document.querySelector ? $('html') : $('body');
	if (BODY_MARGIN !== false) {
		$('body').css('margin-right', BODY_MARGIN);
	}
	if(container)container.addClass('fancybox-lock');
	$('div.messhade').css('display', 'block');
});
$('#btnAdviceCancel,#mes_ts img').click(function(){
	var container = document.all && !document.querySelector ? $('html') : $('body');
	if (BODY_MARGIN !== false) {
		$('body').css('margin-right', BODY_MARGIN);
		BODY_MARGIN = false;
	}
	if(container)container.removeClass('fancybox-lock');
	$('div.messhade').css('display', 'none');
});
$('#btnMesSubmit').click(function(){
	if($('#txtMesContent').val() == ''){
		alert('请至少输入点内容吧:)');
		$('#txtMesContent').focus();
		return false;
	}
	$.ajax({
		url: '__ROOT__/home/help/advice',
		data: {mesNickName:$('#txtMesNickName').val(),mesPhone:$('#txtMesPhone').val(),mesQQ:$('#txtMesQQ').val(),mesEmail:$('#txtMesEmail').val(),mesContent:$('#txtMesContent').val()},
		timeout: 5000,
		cache: false,
		type: "post",
		dataType: "json",
		success: function (d, s, r) {
			alert(d.info);
			if(d.status == 1){
				$('#btnAdviceCancel').click();
			}
		}
	});
});
//-->
</script>
<!-- Advice END -->

<!--QQ客服  -->
<script>
function changeOnline(num) {
	if (isNaN(num) && num == "")
		return;
	for (var i = 1; i <=6 ; i++)
	{
		if (i == num)
		{
			document.getElementById("onlineSort" + i).className = "online_bar expand";
			document.getElementById("onlineType" + i).style.display = "block";
		}
		else
		{
			document.getElementById("onlineSort" + i).className = "online_bar expand";
			document.getElementById("onlineType" + i).style.display = "block";
		}
	}
}

$(document).ready(function(){
  $("#floatShow").bind("click",function(){
    $('#onlineService').animate({width: 'show', opacity: 'show'}, 'normal',function(){ $('#onlineService').show(); });$('#floatShow').attr('style','display:none');$('#floatHide').attr('style','display:block');
	return false;
  });
  $("#floatHide").bind("click",function(){
	$('#onlineService').animate({width: 'hide', opacity: 'hide'}, 'normal',function(){ $('#onlineService').hide(); });$('#floatShow').attr('style','display:block');$('#floatHide').attr('style','display:none');
  });
  $(document).bind("click",function(event){
	if ($(event.target).isChildOf("#online_qq_layer") == false)
	{
	 $('#onlineService').animate({width: 'hide', opacity: 'hide'}, 'normal',function(){ $('#onlineService').hide(); });$('#floatShow').attr('style','display:block');$('#floatHide').attr('style','display:none');
	}
  });
jQuery.fn.isChildAndSelfOf = function(b){
    return (this.closest(b).length > 0);
};
jQuery.fn.isChildOf = function(b){
    return (this.parents(b).length > 0);
};
  //$(window).scroll(function(){ 
	//$('#online_qq_layer').stop().animate({top:$(document).scrollTop() + $("#online_qq_layer").height()}, 100) 
  //}); 
});
</script>


<LINK rel=stylesheet type=text/css href="__ROOT__/Style/qq/css/common.css">
<SCRIPT type=text/javascript src="__ROOT__/Style/qq/js/kefu.js"></SCRIPT>
<DIV id=floatTools class=float0831>
    <DIV class=floatL><A  id=aFloatTools_Show class=btnOpen
                         title=查看在线客服
                         onclick="javascript:$('#divFloatToolsView').animate({width: 'show', opacity: 'show'}, 'normal',function(){ $('#divFloatToolsView').show();kf_setCookie('RightFloatShown', 0, '', '/', 'www.5icool.org'); });$('#aFloatTools_Show').attr('style','display:none');$('#aFloatTools_Hide').attr('style','display:block');"
                         href="javascript:void(0);">展开</A> <A  style="DISPLAY: none"id=aFloatTools_Hide class=btnCtn
                                                              title=关闭在线客服
                                                              onclick="javascript:$('#divFloatToolsView').animate({width: 'hide', opacity: 'hide'}, 'normal',function(){ $('#divFloatToolsView').hide();kf_setCookie('RightFloatShown', 1, '', '/', 'www.5icool.org'); });$('#aFloatTools_Show').attr('style','display:block');$('#aFloatTools_Hide').attr('style','display:none');"
                                                              href="javascript:void(0);">收缩</A> </DIV>
    <DIV id=divFloatToolsView class=floatR style="DISPLAY: none">
        <DIV class=tp></DIV>
        <DIV class=cn>
            <UL>
                <LI class=top>
                    <H3 class=titZx>QQ咨询</H3>
                </LI>
                <LI><SPAN class=icoZx>在线咨询</SPAN> </LI>
                <LI style="vertical-align:middle;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2589780055&site=qq&menu=yes"><img border="0" align="absmiddle" src="http://wpa.qq.com/pa?p=2:2589780055:52" alt="点击这里给我发消息" title="点击这里给我发消息"/>客服01</a></LI>
                <LI style="vertical-align:middle;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2589780066&site=qq&menu=yes"><img border="0" align="absmiddle"  src="http://wpa.qq.com/pa?p=2:2589780066:52" alt="点击这里给我发消息" title="点击这里给我发消息"/>客服02</a></LI>
                <LI style="vertical-align:middle;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2589780077&site=qq&menu=yes"><img border="0" align="absmiddle" src="http://wpa.qq.com/pa?p=2:2589780077:52" alt="点击这里给我发消息" title="点击这里给我发消息"/>客服03</a></LI>
                <!-- <LI style="vertical-align:middle;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2589780011&site=qq&menu=yes"><img border="0" align="absmiddle" src="http://wpa.qq.com/pa?p=2:2589780011:52" alt="点击这里给我发消息" title="点击这里给我发消息"/>客服04</a></LI> -->
                <!-- <LI style="vertical-align:middle;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2589780022&site=qq&menu=yes"><img border="0" align="absmiddle" src="http://wpa.qq.com/pa?p=2:2589780022:52" alt="点击这里给我发消息" title="点击这里给我发消息"/>客服05</a></LI>
                <LI style="vertical-align:middle;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2589780033&site=qq&menu=yes"><img border="0" align="absmiddle" src="http://wpa.qq.com/pa?p=2:2589780033:52" alt="点击这里给我发消息" title="点击这里给我发消息"/>客服06</a></LI> -->

            </UL>
            <!-- <UL class=webZx>
              <LI class=webZx-in><A href="http://www.5icool.org/" target="_blank" style="FLOAT: left"><IMG src="images/right_float_web.png" border="0px"></A> </LI>
            </UL> -->
            <UL>
                <LI>
                    <H3 class=titDh>电话咨询</H3>
                </LI>
                 <LI style="LINE-HEIGHT: 16px;">
                   <p >周一至周五<br>
                   09:00-18:00</p>
                </LI>
                <LI><SPAN >0755-29056888</SPAN> </LI>

            </UL>

        </DIV>
    </DIV>
</DIV>