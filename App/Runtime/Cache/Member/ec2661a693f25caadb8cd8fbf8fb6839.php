<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta name="keywords" content="<?php echo ($glo["web_keywords"]); ?>" />
<meta name="description" content="<?php echo ($glo["web_descript"]); ?>" />
<LINK href="__ROOT__/favicon.ico" type="image/x-icon" rel=icon />
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/gold/css/basic.css?<?php echo C('APP_RES_VER');?>" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/gold/css/user.css?<?php echo C('APP_RES_VER');?>" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/gold/css/extra.css?<?php echo C('APP_RES_VER');?>" />
<link type="text/css" rel="stylesheet" href="__ROOT__/Style/JBox/Skins/Red/jbox.css"/>
<script src="__ROOT__/Style/gold/js/common.js" type="text/javascript"></script>
<script src="__ROOT__/Style/Js/jquery-1.9.0.min.js" type="text/javascript"></script>
<!-- jquery-migrate -->
<script type="text/javascript">if ( typeof jQuery.migrateMute === "undefined" ) {jQuery.migrateMute = true;}</script>
<script language="javaScript" type="text/javascript" src="__ROOT__/Style/Js/jquery-migrate-master/migrate.js"></script>
<script language="javaScript" type="text/javascript" src="__ROOT__/Style/Js/jquery-migrate-master/core.js"></script>
<!-- jquery-migrate // -->
<SCRIPT language=javascript src="__ROOT__/Style/JBox/jquery.jBox.min.js?ver=1" type=text/javascript></SCRIPT>
<SCRIPT language=javascript src="__ROOT__/Style/JBox/jquery.jBoxConfig.js" type=text/javascript></SCRIPT>
<script  type="text/javascript" src="__ROOT__/Style/Js/ui.core.js"></script>
<script  type="text/javascript" src="__ROOT__/Style/Js/ui.tabs.js"></script>
<script type="text/javascript" src="__ROOT__/Style/My97DatePicker/WdatePicker.js" language="javascript"></script>
<script type="text/javascript">
var AJAX_TIMEOUT = 10000;
var AJAX_TIPS = "正在提交数据...";
var AJAX_TIPS1 = "信息正在加载中...,如长时间未加载完成，请刷新页面";
var ALERT_TIT = "温馨提示";
	function makevar(v){
		var d={};
		for(i in v){
			var id = v[i];
			d[id] = $("#"+id).val();
			if(!d[id]) d[id] = $("input[name='"+id+"']:checked").val();
		}
		return d;
	}

	function ajaxGetData(url,targetid,data){
			if(!url) return;
			data = data||{};
			//var thtml = '<div class="loding"><img src="__ROOT__/Style/Js/006.gif"align="absmiddle" />　信息正在加载中...,如长时间未加载完成，请刷新页面</div>';
			//$("#"+targetid).html(thtml).show();
			$.jBox.tip(AJAX_TIPS1, 'loading', {timeout:AJAX_TIMEOUT});
			//竞拍详细页
			$.ajax({
				url: url,
				data: data,
				timeout: 10000,
				cache: true,
				type: "get",
				dataType: "json",
				success: function (d, s, r) {
					if(d) $("#"+targetid).html(d.html);
				},
				error: '',
				complete: function(){
					$.jBox.tip("", 'loading', {timeout:1});
				}
			});
		
	}
	var currentUrl = location.href.toLowerCase();
	$(document).ready(function() {
		$('#rotate > ul').tabs();/* 第一个TAB渐隐渐现（{ fx: { opacity: 'toggle' } }），第二个TAB是变换时间（'rotate', 2000） */
		$('#us_l ul li a').click(function() { // 绑定单击事件
			var nowurl = $(this).attr('href');
			var vid = nowurl.split("#");
			try{
				if(currentUrl.indexOf(vid[0]) != -1 ){
					$('#rotate > ul').tabs('select', "#"+vid[1]); // 切换到第三个选项卡标签
					var geturl= $('#rotate > ul li a[href="#'+vid[1]+'"]').attr("ajax_href");
					ajaxGetData(geturl,vid[1]);
					return false;
				}
			}catch(ex){};
				return true;
		});
		$('#us_r .us_rh ul.ui-tabs-nav li, #us_r .us_rh #xtab li').on("click", function(){
			$(this).find("a").click();
		});
		
		$('a[ajax_href]').click(function(){
			var geturl = $(this).attr('ajax_href');
			var hasget = $(this).attr('get')||0;
			var nowurl = $(this).attr('href');
			var vid = nowurl.split("#");
			if(hasget!=1) ajaxGetData(geturl,vid[1]);
			$(this).attr('get','1');
			$('html,body').animate({scorllTop:0},1000);
			return false;
		});
		ajaxreload = function(aobj){
			var geturl = aobj.attr('ajax_href');
			var nowurl = aobj.attr('href');
			var vid = nowurl.split("#");
			ajaxGetData(geturl,vid[1]);
			$(this).attr('get','1');
			$('html,body').animate({scorllTop:0},1000);
		};
		(function(){
			$(".us_rb4 tr").on('mouseover',
			  function () {
				$(this).removeClass("bg_hover");
				$(this).addClass("bg_hover");
			  }
			);
			$(".us_rb4 tr").on('mouseout',
			  function () {
				$(this).removeClass("bg_hover");
			  }
			);
		})();
	});
	//ui
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
        $(function() {
            $("#us_l ul li .liDiv a").mousemove(function() {
                $(this).addClass("current");
            }).mouseout(function() {
                $(this).removeClass("current");
            });
        });
     $(document).ready(function(){
    	if($("div[id^=fragment-]").length > 0){
         	setTimeout("toTop()", 50);
    	}
     });
     function toTop(){
    	 $('html, body').animate({scrollTop:0}, 'slow');
     }
</script>

<title>我的账户-- <?php echo ($glo["web_name"]); ?></title>
<!--<?php echo ($uclogin); ?>-->
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/JQtip/tip-yellowsimple/tip-yellowsimple.css" />
<SCRIPT language="javascript" src="__ROOT__/Style/JQtip/jquery.poshytip.min.js" type="text/javascript"></SCRIPT>
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
</head>
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
            <li class="pull">欢迎你,<?php echo session('u_user_name');?> <a href="__APP__/member/msg#fragment-1">我的消息<span class="ui-nav-msgcount rrdcolor-lightblue-bg"><?php echo getMsgCount($UID);?></span></a></li><?php endif; ?>
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
 
 


  <div id="content_us">
      <div id="us_l">
    <!-- Left -->
     <div id="usl_upper">
      <div id="uslup_upper">
       <div id="uslup_upper_l"><img src="<?php echo (get_avatar($UID)); ?>" width="80" height="80" alt="" /></div>
       <div id="uslup_upper_r">
        <h4><?php echo session('u_user_name');?></h4>
        <?php if($minfo["time_limit"] > time()): ?><div class="vip"></div><?php endif; ?>
        <p>等级：</p><span title="经验：<?php echo (($minfo["credits"])?($minfo["credits"]):0); ?>"><?php echo (getleveico($minfo["credits"],2)); ?></span>
       </div>
      </div>
      <div id="uslup_lower">
       <p>信用额度：<?php echo (fmoney($minfo["credit_cuse"])); ?><input type="button" class="us_appBut" value="申请额度" onclick="window.location.href='__APP__/member/moneylimit#fragment-1'" /></p>
       <p>担保额度：<?php echo (fmoney($minfo["borrow_vouch_cuse"])); ?></p>
      </div>
     </div>
     
     <ul>
      <li class="cen"><div class="ulDiv1"></div><a href="__APP__/member/index.html"><h5>账户首页</h5></a></li>
     </ul>
     <ul>
      <li><div class="ulDiv2"></div><h6>投资管理</h6></li>
      <li><div class="liDiv"></div><a href="__APP__/invest/index.html">我要投资</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/tendout#fragment-1">投资总表</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/autoborrow/index.html">自动投标设置</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/tendout#fragment-3">回收中的投资</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/tendout#fragment-2">竞标中的投资</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/vouch#fragment-1">我担保的借款</a></li>
     </ul>
     <ul>
      <li><div class="ulDiv3"></div><h6>借款管理</h6></li>
      <li><div class="liDiv"></div><a href="__APP__/borrow/index.html">我要借款</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/borrowin#fragment-1">借入总表</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/borrowin#fragment-3">偿还中借款</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/borrowin#fragment-4">逾期借款</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/borrowin#fragment-5">流标借款</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/borrowin#fragment-6">复审未通过借款</a></li>
     </ul>
     <ul>
      <li><div class="ulDiv4"></div><h6>资金管理</h6></li>
      <li><div class="liDiv"></div><a href="__APP__/member/capital#fragment-1">资金统计</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/withdraw#fragment-1">帐户提现</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/charge#fragment-1">帐户充值</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/charge#fragment-2">充值记录</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/bank#fragment-1">银行帐户</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/capital#fragment-2">帐户资金记录</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/scores#fragment-1">积分经验记录</a></li>
     </ul>
     <ul>
      <li><div class="ulDiv5"></div><h6>认证中心</h6></li>
      <li><div class="liDiv"></div><a href="__APP__/member/verify?id=1#fragment-1">邮箱认证</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/verify#fragment-2">手机认证</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/verify#fragment-3">实名认证</a></li>
      <!-- <li><div class="liDiv"></div><a href="__APP__/member/verify#fragment-4">现场认证</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/verify#fragment-5">视频认证</a></li> -->
      <li><div class="liDiv"></div><a href="__APP__/member/verify#fragment-6">资料认证</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/verify#fragment-7">安全问题设置</a></li>
     </ul>
     <ul>
      <li><div class="ulDiv6"></div><h6>好友管理</h6></li>
      <!--<li><div class="liDiv"></div><a href="__APP__/member/friend#fragment-1">好友列表</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/friend#fragment-2">好友申请</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/friend#fragment-3">会员留言</a></li>-->
      <li><div class="liDiv"></div><a href="__APP__/member/promotion#fragment-1">邀请好友</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/promotion#fragment-2">奖金记录</a></li>
     </ul>
     <ul>
      <li><div class="ulDiv7"></div><h6>用户资料</h6></li>
      <li><div class="liDiv"></div><a href="__APP__/member/memberinfo">基本资料</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/user#fragment-1">头像与密码</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/msg#fragment-1">我的消息<span><?php echo getMsgCount($UID);?></span></a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/pushmessset#fragment-1">消息设置</a></li>
      <li><div class="liDiv"></div><a href="__APP__/member/safe#fragment-1">安全中心</a></li>
     </ul>
    <!-- Left // -->
   </div>
<script type="text/javascript">
<!--
thisURL = document.URL;/*获取当前地址栏URL,根据此来判断当前页，从页实现页面导航不同样式*/
$("#us_l ul li a").each(function(){
	if(this.href == thisURL){
		$(this).addClass("cururl");
		return false;
	}
});
$("#us_l ul li a").click(function(){
	$("#us_l ul li a").removeClass("cururl");
	$(this).addClass("cururl");
	setTimeout("toTop()", 50);
});
//-->
</script>
   <div id="us_r">
    <!-- Right -->
     <div id="ush_h">
      <h3>您好，<?php echo session('u_user_name');?></h3>
      <div class="mes_ico2"></div>
      <a href="__APP__/member/msg#fragment-1">您有<span><?php echo getMsgCount($UID,false);?></span>条新消息</a>
      <p>上次登录时间：<?php echo (date('Y-m-d H:i:s',$login_info["add_time"])); ?></p>
      <p>上次登录IP：<?php echo ($login_info["ip"]); ?>&nbsp;&nbsp;&nbsp;</p>
     </div>
     
     <div id="att">
      <p>认证情况：</p>
      <div class="rate_att">
	  <?php if($rate == 0): ?><img src="__ROOT__/Style/gold/pic/user_00.gif" width="103" height="11" alt="" /><?php endif; ?>
      <?php if($rate == 1): ?><img src="__ROOT__/Style/gold/pic/user_17.gif" width="103" height="11" alt="" /><?php endif; ?>
      <!-- <?php if($rate == 2): ?><img src="__ROOT__/Style/gold/pic/user_32.gif" width="103" height="11" alt="" /><?php endif; ?> -->
      <?php if($rate == 2): ?><img src="__ROOT__/Style/gold/pic/user_50.gif" width="103" height="11" alt="" /><?php endif; ?>
     <!--  <?php if($rate == 4): ?><img src="__ROOT__/Style/gold/pic/user_67.gif" width="103" height="11" alt="" /><?php endif; ?> -->
      <?php if($rate == 3): ?><img src="__ROOT__/Style/gold/pic/user_83.gif" width="103" height="11" alt="" /><?php endif; ?>
      <?php if($rate == 4): ?><img src="__ROOT__/Style/gold/pic/user_100.gif" width="103" height="11" alt="" /><?php endif; ?>
      </div>
      <ul>
      <?php if($mstatus["id_status"] == 1): ?><li><div class="rt_1"></div>实名认证</li>
      <?php else: ?>
       <li><div class="rt_1ov"></div><a href="__APP__/member/verify#fragment-3">实名认证</a></li><?php endif; ?>
      <?php if($mstatus["phone_status"] == 1): ?><li><div class="rt_2"></div>手机认证</li>
      <?php else: ?>
       <li><div class="rt_2ov"></div><a href="__APP__/member/verify#fragment-2">手机认证</a></li><?php endif; ?>
      <?php if($memberinfo["user_leve"] != 0): ?><li><div class="rt_3"></div>VIP用户</li>
      <?php else: ?>
       <li><div class="rt_3ov"></div><a href="__APP__/member/vip">VIP用户</a></li><?php endif; ?>
      <?php if($mstatus["email_status"] == 1): ?><li><div class="rt_4"></div>邮箱认证</li>
      <?php else: ?>
       <li><div class="rt_4ov"></div><a href="__APP__/member/verify?id=1#fragment-1">邮箱认证</a></li><?php endif; ?>
      <!-- <?php if($mstatus["video_status"] == 1): ?><li><div class="rt_5"></div>视频认证</li>
      <?php else: ?>
       <li><div class="rt_5ov"></div><a href="javascript:void(0)" onclick="videoverify();">视频认证</a></li><?php endif; ?>
      <?php if($mstatus["face_status"] == 1): ?><li><div class="rt_6"></div>现场认证</li>
      <?php else: ?>
       <li><div class="rt_6ov"></div><a href="javascript:void(0)" onclick="faceverify();">现场认证</a></li><?php endif; ?> -->
      </ul>
     </div>
     
     <div class="us_rh">
      <ul>
       <li class="cen">账户安全</li>
      </ul>
     </div>
     <div class="us_rb1">
      <p>真实姓名：<?php echo (($memberdetail["real_name"])?($memberdetail["real_name"]):"<span>还未验证</span>"); if($mstatus["id_status"] != '1'): ?><a href="__APP__/member/verify#fragment-3">[马上验证]</a><?php else: ?><samp>已验证通过</samp><?php endif; ?></p>
      <p>身份证号：<?php echo (hidecard($memberdetail["idcard"],1,"<span>还未验证</span>")); if($mstatus["id_status"] != '1'): ?><a href="__APP__/member/verify#fragment-3">[马上验证]</a><?php else: ?><samp>已验证通过</samp><?php endif; ?></p>
      <p>登录密码：<span class="yellow">安全度中</span><a href="../member/user#fragment-2">[修改密码]</a></p>
      <p>安全问题：<?php if($mstatus["safequestion_status"] != '1'): ?><span>还未设置</span><a href="__APP__/member/verify#fragment-7">[马上设置]</a><?php else: ?><samp>已设置</samp><a href="__APP__/member/safe#fragment-2">[马上修改]</a><?php endif; ?></p>
      <p>手机号码：<?php echo (hidecard($memberinfo["user_phone"],2,"<span>还未验证</span>")); if($mstatus["phone_status"] != '1'): ?><a href="__APP__/member/verify#fragment-2">[马上验证]</a><?php else: ?><samp>已验证通过</samp><?php endif; ?></p>
      <p>电子邮箱：<?php echo (($memberinfo["user_email"])?($memberinfo["user_email"]):"<span>还未验证</span>"); if($mstatus["email_status"] != '1' ): ?><a href="__APP__/member/verify#fragment-1">[马上验证]</a><?php else: ?><samp>已验证通过</samp><?php endif; ?></p>
     </div>
     
     <div class="us_rh">
      <ul>
       <li class="cen"><a href="javascript:void(0)">资金信息</a></li>
       <li class="usrhDiv"></li>
      </ul>
     </div>
     <div class="us_rb2">
      <div class="us_rb2_upper">
       <h4>账户总额 ：<span title="账户总额=可用余额+冻结总额+待收总额" class="xtitle"><?php echo Fmoney(getFloatvalue($minfo['account_money']+$minfo['money_collect']+$minfo['money_freeze'],2));?></span></h4>
       <input type="button" class="rb2_but1" value="投&nbsp;资" onclick="window.location.href='__APP__/invest/index.html'" />
       <input type="button" class="rb2_but2" value="充&nbsp;值" onclick="window.location.href='__APP__/member/charge#fragment-1'" />
       <input type="button" class="rb2_but2" value="提&nbsp;现" onclick="window.location.href='__APP__/member/withdraw#fragment-1'" />
      </div>
      <div class="us_rb2_lower">
       <p>可用余额<font class="xtitle" title="可以直接使用的金额">[?]</font>：<span><?php echo (fmoney($minfo["account_money"])); ?></span></p>
       <p>冻结总额<font class="xtitle" title="冻结总额是您当前暂时不能使用的金额，冻结总额包括投标冻结、提现冻结">[?]</font>：<span><?php echo (fmoney($minfo["money_freeze"])); ?></span></p>
       <p>已赚利息：<span><?php echo (fmoney($capitalinfo["tj"]["earnInterest"])); ?></span></p>
       <p>投资总额：<span><?php echo (fmoney($capitalinfo["tj"]["jcze"])); ?></span></p>
       <p>已收总额：<span><?php echo (fmoney($capitalinfo["tj"]["ysze"])); ?></span></p>
       <p>待收总额<font class="xtitle" title="是您借款给别人但还没收回的本息总额,待收总额=待收本金总额+待收利息">[?]</font>：<span><?php echo (fmoney($minfo["money_collect"])); ?></span></p>
       <p>待收利息：<span><?php echo (fmoney($capitalinfo["tj"]["willgetInterest"])); ?></span></p>
       <p>投标奖励：<span><?php echo (fmoney($toubiaojl)); ?></span></p>
       <p>推广奖励：<span><?php echo (fmoney($tuiguangjl)); ?></span></p>
       <p>最近待收金额：<span><?php echo Fmoney(getFloatvalue($lastInvest['capital']+$lastInvest['interest'],2));?></span></p>
       <p>最近待收时间：<?php echo (mydate("Y-m-d",$lastInvest["gettime"],'<span>无待收</span>')); ?><a href="__APP__/member/tendout#fragment-3">[明细]</a></p>
       <p>已还总额：<span><?php echo (fmoney($capitalinfo["tj"]["yhze"])); ?></span></p>
       <p>待还总额：<span><?php echo (fmoney($capitalinfo["tj"]["dhze"])); ?></span></p>
       <p>最近待还金额：<span><?php echo Fmoney(getFloatvalue($lastBorrow['borrow_money']+$lastBorrow['borrow_interest'],2));?></span></p>
       <p>最近待还时间：<?php echo (mydate("Y-m-d",$lastBorrow["gettime"],'<span>无待收</span>')); ?><a href="__APP__/member/borrowin#fragment-3">[明细]</a></p>
       <p>借款信用额度：<span><?php echo (fmoney($minfo["credit_limit"])); ?></span></p>
       <p>可用信用额度：<span><?php echo (fmoney($minfo["credit_cuse"])); ?></span></p>
       <p>借款担保总额：<span><?php echo (fmoney($minfo["borrow_vouch_limit"])); ?></span></p>
       <p>可用借款担保额度：<span><?php echo (fmoney($minfo["borrow_vouch_cuse"])); ?></span></p>
       <p>投资担保总额：<span><?php echo (fmoney($minfo["invest_vouch_limit"])); ?></span></p>
       <p>可用投资担保额度：<span><?php echo (fmoney($minfo["invest_vouch_cuse"])); ?></span></p>
      </div>
     </div>
     
    <!-- Right // -->
   </div>
  </div>
<script type="text/javascript">
<!--
function displayDiv(num) {
	var obj = document.getElementById("udiv" + num);
	var obja = document.getElementById("ulink" + num);
	var objtop = document.getElementById("utop" + num);
	var objbottom = document.getElementById("ubottom" + num);

	if (obj.style.display == 'none') {
		objbottom.style.display = '';
		obj.style.display = '';
		objtop.style.backgroundImage = "url(__ROOT__/Style/M/images/account/uctop.jpg)";
		obja.innerHTML = "-";
	}
	else {
		obj.style.display = 'none';
		objbottom.style.display = 'none';
		objtop.style.backgroundImage = "url(__ROOT__/Style/M/images/account/ucall.jpg)";
		obja.innerHTML = "+";
	}
}
$(document).ready(function(){
	$(".us_rh:eq(1) ul li[class!='usrhDiv']").click(function(){
		$(".us_rh:eq(1) ul li[class!='usrhDiv']").removeClass("cen");
		$(this).addClass("cen");
	});
	/*$(function(){
		$('.xtitle').poshytip({
			className: 'tip-yellowsimple',
			showOn: 'hover',
			alignTo: 'target',
			alignX: 'center',
			alignY: 'top',
			offsetX: 0,
			offsetY: 5
		});
	});*/
});
//-->
</script>
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