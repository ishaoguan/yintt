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

<title><?php echo ($vo["borrow_name"]); ?>-我要投资-<?php echo ($glo["web_name"]); ?></title>
<meta name="keywords" content="<?php echo ($glo["web_keywords"]); ?>" />
<meta name="description" content="<?php echo ($glo["web_descript"]); ?>" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/gold/css/invest.css?<?php echo C('APP_RES_VER');?>" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/gold/css/extra.css?<?php echo C('APP_RES_VER');?>" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/fancybox/jquery.fancybox-2.1.4.css" media="screen" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/fancybox/helpers/jquery.fancybox-buttons.css" media="screen" />
<link rel="Stylesheet" type="text/css" href="__ROOT__/Style/Js/smoothDivScroll/css/smoothDivScroll.css">
<script type="text/javascript" src="__ROOT__/Style/fancybox/jquery.fancybox-2.1.4.js"></script>
<script type="text/javascript" src="__ROOT__/Style/fancybox/helpers/jquery.fancybox-buttons.js"></script>
<script>
<!--
/*第一种形式 第二种形式 更换显示样式*/
function setTab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}

function invest(id){
	$.jBox("get:__URL__/ajax_invest?id="+id, {
		title: "立即投标--<?php echo ($glo["web_name"]); ?>",
		width: "auto",
		top: '5%',
		buttons: {'关闭': true }
	});
}

function vouch(id){
	$.jBox("get:__URL__/ajax_vouch?id="+id, {
		title: "立即担保--<?php echo ($glo["web_name"]); ?>",
		width: "auto",
		buttons: {'关闭': true }
	});
}
function addFriend(type){
	var uid = <?php echo ($minfo["uid"]); ?>;
	$.ajax({
		url: "__URL__/addfriend",
		data: {"fuid":uid,"type":type},
		timeout: 5000,
		cache: false,
		type: "post",
		dataType: "json",
		success: function (d, s, r) {
			if(d){
				if(d.status==1)	 $.jBox.tip(d.message,'success');
				else $.jBox.tip(d.message,'fail');
			}
		}
	});
}
function InnerMsg(){
	var uid = <?php echo ($minfo["uid"]); ?>;
	$.jBox("get:__URL__/innermsg?uid="+uid, {
		title: "发送站内信",
		width: "auto",
		buttons: {'关闭': true }
	});
}
function change_detail(i){
	for(j=1;j<=5;j++){
		$("#li_menu_"+j).removeClass();
	}
	location.href="#detail_menu_"+i;
	$("#li_menu_"+i).addClass("now");
}
//-->
</script>
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
      
      <div id="subject">
       
       <div id="subject_h">
        <div class="business"></div>
        <div id="sh_boxm">
         <ol>
          <li><h1><?php echo ($vo["borrow_name"]); ?></h1><!--<?php echo getIcoNew($vo);?>--></li>
          <li><p>剩余时间：<span id="loan_time"></span></p></li>
         </ol>
        </div>
<input id="hid" type="hidden" value="<?php echo ($vo["lefttime"]); ?>" />
  <script type="text/javascript">
				function showht(){
					var status = '<?php echo ($invid); ?>';
					if(status=="no"){
						$.jBox.tip("您未投此标");
					}else if(status=="login"){
						$.jBox.tip("请先登陆");
					}else{
						window.open("__APP__/member/agreement/downfile?id="+status);
					}
				}
			
				var seconds;
				var pers = <?php echo (($vo["progress"])?($vo["progress"]):0); ?>/100;
				var timer=null;
				function setLeftTime() {
					seconds = parseInt($("#hid").val(), 10);
					timer = setInterval(showSeconds,1000);
				}
				
				function showSeconds() {
					var day1 = Math.floor(seconds / (60 * 60 * 24));
					var hour = Math.floor((seconds - day1 * 24 * 60 * 60) / 3600);
					var minute = Math.floor((seconds - day1 * 24 * 60 * 60 - hour * 3600) / 60);
					var second = Math.floor(seconds - day1 * 24 * 60 * 60 - hour * 3600 - minute * 60);
					if (day1 < 0) {
						clearInterval(timer);
						$("#loan_time").html("投标已经结束！");
					} else if (pers >= 1) {
						clearInterval(timer);
						$("#loan_time").html("投标已经结束！");
					} else {
						$("#loan_time").html(day1 + " 天 " + hour + " 小时 " + minute + " 分 " + second + " 秒");
					}
					seconds--;
				}
				if (pers >= 1) {
                    $("#loan_time").html("投标已经结束！");
                }else{
					setLeftTime();
				}
            </script>
        <div id="sh_boxr"><a href="javascript:void(0)"><img src="<?php echo (get_avatar($minfo["uid"])); ?>" class="imgBorder" width="80" height="80" /></a><p><a href="#nogo"><?php echo ($minfo["user_name"]); ?></a><?php echo ($minfo["location"]); ?></p><input type="button" class="se_but" /></div>
        <!-- Mous -->
         <!-- <div id="mous" style="display:none">
         
          <div id="mous_upper">
           <div id="mous_upper_l"><a href="javascript:void(0)"><img src="<?php echo (get_avatar($minfo["uid"])); ?>" width="80" height="80" alt="" /></a></div>
           <div id="mous_upper_r">
            <a href="javascript:void(0)"><?php echo ($minfo["user_name"]); ?></a>
            <p>等级：<span><?php echo (getleveico($minfo["credits"],2)); ?></span></p>
            <p>籍贯：<?php echo ($minfo["location"]); ?></p>
            <p>居住城市：<?php echo ($minfo["location_now"]); ?></p>
           </div>
          </div>
          
          
          <div id="mous_midder">
           <p>认证情况：</p>
           <?php echo (getverify_new($minfo["id"])); ?>
          </div>
          
          <div class="h6ban"><h6>跟踪客服：<?php if($minfo["customer_name"] == null): ?>暂无客服
                    <?php else: ?>
                    <?php echo ($minfo["customer_name"]); endif; ?></h6></div>
          
          <div class="mousbutBox">
           <input type="button" class="mous_but" value="发送信息" onClick="InnerMsg();" />
           <input type="button" class="mous_but" value="加为好友" onClick="addFriend(1);" />
           <input type="button" class="mous_but" value="举报此人" onClick="jubao(<?php echo ($vo["borrow_uid"]); ?>);" />
           <input type="button" class="mous_but" value="列入黑名单" onClick="addFriend(2)" />
          </div>
          
         </div> -->
        <!-- Mous // -->
       </div>
       <div id="subject_lower">
        <div id="subject_lower_l">
         <p>借款<?php if($vo["repayment_type"] == 1): ?>日<?php else: ?>年化<?php endif; ?>利率：<?php echo ($vo["borrow_interest_rate"]); ?>%/<?php if($vo["repayment_type"] == 1): ?>天<?php else: ?>年（月利率<?php echo ($repay_detail["month_apr"]); ?>%）<?php endif; ?></p>
         <p>借款期限：<?php echo ($vo["borrow_duration"]); ?> <?php if($vo["repayment_type"] == 1): ?>天<?php else: ?>个月<?php endif; ?></p>
         <p>还款方式：<?php echo ($Bconfig['REPAYMENT_TYPE'][$vo['repayment_type']]); ?></p>
         <p>借款用途：<?php echo ($Bconfig['BORROW_USE'][$vo['borrow_use']]); ?></p>
         <p>最小投标金额：<?php echo (fmoney($vo["borrow_min"])); ?>元</p>
         <p>最大投标金额：<?php if($vo["borrow_max"] == 0): ?>没有限制<?php else: echo (fmoney($vo["borrow_max"])); ?>元<?php endif; ?></p>
         <p>网贷产品提供：<?php echo ($vo["pro_provide"]); ?></p>
        </div>
        <div id="subject_lower_r">
         <ul>
          <li><h5>借款金额：<span><?php echo (fmoney($vo["borrow_money"])); ?></span><samp>元</samp></h5></li>
          <li><p>发标时间：<?php echo ($vo["schedular_time"]); ?></p></li>
         <?php if($vo["borrow_type"] == 2): ?><li><h6>担保进度：</h6><div class="rate"><div class="rate_s" style="width:<?php echo ($vo["vouch_progress"]); ?>%"></div><span><?php echo ($vo["vouch_progress"]); ?>%</span></div></li><?php endif; ?>
          <li style="padding-top: 5px"><h6>投资进度：</h6><div class="rate"><div class="rate_s" style="width:<?php echo ($vo["progress"]); ?>%"></div><span><?php echo ($vo["progress"]); ?>%</span></div></li>
          <li>
            <?php if($vo["borrow_status"] == 3): ?><a href="javascript:;"><img src="__ROOT__/Style/gold/images/ylb_o.gif" /></a>
              <?php elseif($vo["borrow_status"] == 4): ?>
              <a href="javascript:;"><img src="__ROOT__/Style/gold/images/ddfx_o.gif" /></a>
              <?php elseif($vo["borrow_status"] == 6): ?>
              <a href="javascript:;"><img src="__ROOT__/Style/gold/images/hkz_o.gif" /></a>
              <?php elseif($vo["borrow_status"] > 6): ?>
              <a href="javascript:;"><img src="__ROOT__/Style/gold/images/ywc_o.gif" /></a>
            <?php elseif($UID > 0): ?>
              	<a href="javascript:;" onClick="invest(<?php echo ($vo["id"]); ?>);" class="fn-line" ><input type="button" class="sub_but" value="投资该项目" /></a>
            <?php else: ?>
              	<a href="__ROOT__/help/loginpop" rel="invest_login"  class="fn-line" ><input type="button" class="sub_but" value="投资该项目" /></a><?php endif; ?>
            <?php if($vo["borrow_type"] == 2): if($vo["vouch_progress"] == '100'): ?><a href="javascript:;"><img src="__ROOT__/Style/gold/images/dbwc_o.gif" /></a>
                <?php elseif($vo["borrow_status"] == 3 || $vo["borrow_status"] == 4 || $vo["borrow_status"] == 6 || $vo["borrow_status"] > 6 ): ?>
              <?php elseif($UID > 0): ?>
               	<a href="javascript:;" onClick="vouch(<?php echo ($vo["id"]); ?>);"  class="fn-line" ><img src="__ROOT__/Style/gold/images/db_o.gif" /></a>
              <?php else: ?>
               	<a href="__ROOT__/help/loginpop" rel="invest_login"  class="fn-line" ><img src="__ROOT__/Style/gold/images/db_o.gif" /></a><?php endif; endif; ?>
          </li>
          <li><p>投100元，期限<?php echo ($vo["borrow_duration"]); if($vo["repayment_type"] == 1): ?>天<?php else: ?>个月<?php endif; ?>，可获利息收益￥<?php echo sprintf("%.2f",$repay_detail['repayment_money'] - 100);?>元</p></li>
         </ul>
        </div>
       </div>
       
      </div>
      
      <div id="details_h">
       <ul>
        <li class="cen" for="divBorrowDetail"><a href="javascript:void(0)">借款详情</a></li>
        <li for="divInvestDetail"><a href="javascript:void(0)">投标记录</a></li>
        <li for="divAccount"><a href="javascript:void(0)">账户详情</a></li>
        <li for="divCredit"><a href="javascript:void(0)">还款信用</a></li>
        <li for="divPersonal"><a href="javascript:void(0)">借款人资料</a></li>
        <li for="divFiles"><a href="javascript:void(0)">资料审核</a></li>
        <li for="divBorrowHis"><a href="javascript:void(0)">借款记录</a></li>
        <li for="divMedias"><a href="javascript:void(0)">影像资料</a></li>
       </ul>
      </div>
      
      <div class="details" id="divBorrowDetail">
       <p><?php echo (nl2br($vo["borrow_info"])); ?></p>
        <?php if($vo["borrow_type"] == 2): ?><DD class="borderDash bdrOnlyBtm"><STRONG>担保奖励与担保信息</STRONG>（一旦借款者逾期十天以上未还款,将由担保人垫付本息给投标者） </DD>
          <?php if(!is_array($vouch_list)): ?><DD class=aPadding><STRONG>没有任何担保信息</STRONG></DD>
            <?php else: ?>
            <DD class="shenheXM">
              <table class="tdBorder" border=0 cellSpacing=0 >
                <THEAD>
                  <tr>
                    <th>序号</th>
                    <th>担保人</th>
                    <th>担保金额</th>
                    <th>担保奖励</th>
                    <th>担保时间</th>
                    <th>状态</th>
                  </tr>
                </THEAD>
                <?php if(is_array($vouch_list)): $i = 0; $__LIST__ = $vouch_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vv["id"]); ?></td>
                    <td><?php echo ($vv["uname"]); ?></td>
                    <td><?php echo (fmoney($vv["vouch_money"])); ?></td>
                    <td><?php echo (fmoney($vv["vouch_reward_money"])); ?></td>
                    <td><?php echo (date("Y-m-d H:i",$vv["vouch_time"])); ?></td>
                    <td><?php echo ($Vstatus[$vv['status']]); ?></td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </table>
            </DD><?php endif; endif; ?>
      </div>
      
      <div class="details" id="divInvestDetail" style="display:none">
        <?php if(!is_array($paying_list)): ?><p>暂时还没有投标!</p>
        <?php else: ?>
      	<table width="665" border="0" cellspacing="0" cellpadding="0">
		 <tr>
		  <th nowrap="nowrap">投标人</th>
		  <th nowrap="nowrap">当前利率</th>
		  <th nowrap="nowrap">投标金额</th>
		  <th nowrap="nowrap">投标时间</th>
		  <th nowrap="nowrap">投标类型</th>
		  <th nowrap="nowrap">自动序号</th>
		  <th nowrap="nowrap">状态</th>
		 </tr>
         <?php if(is_array($investinfo)): $i = 0; $__LIST__ = $investinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo (hidecard($vi["user_name"],8)); ?></td>
            <td><?php echo ($vo["borrow_interest_rate"]); ?>%/
              <?php if($vo["repayment_type"] == 1): ?>天
                <?php else: ?>
                年<?php endif; ?></td>
            <td><?php echo (fmoney($vi["investor_capital"])); ?>元</td>
            <td><?php echo (date("Y-m-d H:i",$vi["add_time"])); ?></td>
            <td><?php if($vi["is_auto"] == 1): ?>自动
                <?php else: ?>
                手动<?php endif; ?></td>
            <td><?php echo ($vi["auto_no"]); ?></td>
            <td><img src="__ROOT__/Style/H/images/zhangtai.png" /></td>
		  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table><?php endif; ?>
      </div>
      
      <div class="details" id="divAccount" style="display:none">
      	<table width="665" border="0" cellspacing="0" cellpadding="0">
		 <tr>
		  <td>账户总额：<?php echo Fmoney(getFloatValue($mainfo['account_money']+$mainfo['money_collect']+$mainfo['money_freeze'],2));?></td>
		  <td>借款总额：<?php echo (fmoney($capitalinfo["tj"]["jkze"])); ?></td>
		  <td>&nbsp;</td>
		 </tr>
		 <tr>
		  <td>已还总额：<?php echo (fmoney($capitalinfo["tj"]["yhze"])); ?></td>
		  <td>待还总额：<?php echo (fmoney($capitalinfo["tj"]["dhze"])); ?></td>
		  <td>负债情况：
                <?php if($capitalinfo['tj']['fz'] < 0): ?>借出小于借入(<?php echo (fmoney($capitalinfo["tj"]["fz"])); ?>)
                  <?php else: ?>
                  借出大于借入(<?php echo (fmoney($capitalinfo["tj"]["fz"])); ?>)<?php endif; ?></td>
		 </tr>
         <?php if($vo["is_show_invest"] == 1): ?><tr>
             <td>投资总额：<?php echo (fmoney($capitalinfo["tj"]["jcze"])); ?></td>
             <td>已收总额：<?php echo (fmoney($capitalinfo["tj"]["ysze"])); ?></td>
             <td>待收总额：<?php echo (fmoney($capitalinfo["tj"]["dsze"])); ?></td>
           </tr><?php endif; ?>
         <tr>
           <td>借款信用额度：<?php echo (fmoney($mainfo["credit_limit"])); ?></td>
           <td>可用信用额度：<?php echo (fmoney($mainfo["credit_cuse"])); ?></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>借款担保总额：<?php echo (fmoney($mainfo["borrow_vouch_limit"])); ?></td>
           <td>可用借款担保额度：<?php echo (fmoney($mainfo["borrow_vouch_cuse"])); ?></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>投资担保总额：<?php echo (fmoney($mainfo["invest_vouch_limit"])); ?></td>
           <td>可用投资担保额度：<?php echo (fmoney($mainfo["invest_vouch_cuse"])); ?></td>
           <td>&nbsp;</td>
         </tr>
		</table>
      </div>
      
      <div class="details" id="divCredit" style="display:none">
      	<table width="665" border="0" cellspacing="0" cellpadding="0">
            <TR>
              <th>还款状态</th>
              <th>最近一周</th>
              <th>最近1月</th>
              <th>最近6月</th>
              <th>6个月前</th>
              <th>历史合计</th>
            </TR>
            <tr>
              <td>提前还款</td>
              <td><?php echo (($history["history1"]["tq"])?($history["history1"]["tq"]):0); ?></td>
              <td><?php echo (($history["history2"]["tq"])?($history["history2"]["tq"]):0); ?></td>
              <td><?php echo (($history["history3"]["tq"])?($history["history3"]["tq"]):0); ?></td>
              <td><?php echo ($history['history4']['tq'] - $history['history3']['tq']+0); ?></td>
              <td><?php echo (($history["history4"]["tq"])?($history["history4"]["tq"]):0); ?></td>
            </tr>
            <tr>
              <td>准时还款</td>
              <td><?php echo (($history["history1"]["zc"])?($history["history1"]["zc"]):0); ?></td>
              <td><?php echo (($history["history2"]["zc"])?($history["history2"]["zc"]):0); ?></td>
              <td><?php echo (($history["history3"]["zc"])?($history["history3"]["zc"]):0); ?></td>
              <td><?php echo ($history['history4']['zc'] - $history['history3']['zc']+0); ?></td>
              <td><?php echo (($history["history4"]["zc"])?($history["history4"]["zc"]):0); ?></td>
            </tr>
            <tr>
              <td>迟还</td>
              <td><?php echo (($history["history1"]["ch"])?($history["history1"]["ch"]):0); ?></td>
              <td><?php echo (($history["history2"]["ch"])?($history["history2"]["ch"]):0); ?></td>
              <td><?php echo (($history["history3"]["ch"])?($history["history3"]["ch"]):0); ?></td>
              <td><?php echo ($history['history4']['ch'] - $history['history3']['ch']+0); ?></td>
              <td><?php echo (($history["history4"]["ch"])?($history["history4"]["ch"]):0); ?></td>
            </tr>
            <tr>
              <td>逾期还款</td>
              <td><?php echo (($history["history1"]["yq"])?($history["history1"]["yq"]):0); ?></td>
              <td><?php echo (($history["history2"]["yq"])?($history["history2"]["yq"]):0); ?></td>
              <td><?php echo (($history["history3"]["yq"])?($history["history3"]["yq"]):0); ?></td>
              <td><?php echo ($history['history4']['yq'] - $history['history3']['yq']+0); ?></td>
              <td><?php echo (($history["history4"]["yq"])?($history["history4"]["yq"]):0); ?></td>
            </tr>
            <tr>
              <td>逾期未还</td>
              <td><?php echo (($history["history1"]["wh"])?($history["history1"]["wh"]):0); ?></td>
              <td><?php echo (($history["history2"]["wh"])?($history["history2"]["wh"]):0); ?></td>
              <td><?php echo (($history["history3"]["wh"])?($history["history3"]["wh"]):0); ?></td>
              <td><?php echo ($history['history4']['wh'] - $history['history3']['wh']+0); ?></td>
              <td><?php echo (($history["history4"]["wh"])?($history["history4"]["wh"]):0); ?></td>
            </tr>
          </TABLE>
      </div>
      
      <div class="details" id="divPersonal" style="display:none">
      	<table width="665" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>性别：</td>
              <td><?php echo ($minfo["sex"]); ?></td>
              <td>年龄：</td>
              <td><?php echo (getagename($minfo["age"])); ?></td>
              <td>婚姻状况：</td>
              <td><?php echo ($minfo["marry"]); ?></td>
              <td> 文化程度：</td>
              <td><?php echo ($minfo["education"]); ?></td>
            </tr>
            <tr>
              <td>职业：</td>
              <td><?php echo ($minfo["zy"]); ?></td>
              <td> 每月收入：</td>
              <td><?php echo (fmoney($minfo["fin_monthin"])); ?></td>
              <td>住房条件：</td>
              <td><?php echo ($minfo["fin_house"]); ?></td>
              <td><DIV>是否购车：</DIV></td>
              <td><?php echo ($minfo["fin_car"]); ?></td>
            </tr>
          </table>
      </div>
      
      <div class="details" id="divFiles" style="display:none">
      	<table width="665" border="0" cellspacing="0" cellpadding="0">
	        <THEAD>
	          <tr>
                  <th>资料类型</th>
                  <th>上传数量</th>
                  <th>更新时间</th>
                  <th>获得积分</th>
                  <th>状态</th>
	          </tr>
	        </THEAD>
            <?php if(is_array($data_list)): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vd): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($Bconfig['DATA_TYPE'][$vd['type']]); ?></td>
                <td><?php echo ($vd["num"]); ?></td>
                <td><?php echo (date("Y-m-d H:i",$vd["add_time"])); ?></td>
                <td><?php echo ($vd["credits"]); ?></td>
                <td class="zl_04"><img src="__ROOT__/Style/H/images/zhangtai.png" /></td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	      </table>
      </div>
      
      <div class="details" id="divBorrowHis" style="display:none">
        <?php if(count($paying_list['list']) == 0): ?>没有任何借款记录!
        <?php else: ?>
      	<table width="665" border="0" cellspacing="0" cellpadding="0">
	        <THEAD>
	          <tr>
                  <th>借款标题</th>
                  <th>期数</th>
                  <th>还款本息</th>
                  <th>实际到期日期</th>
                  <th>还款日期</th>
                  <th>还款状态</th>
	          </tr>
	        </THEAD>
              <?php if(is_array($paying_list["list"])): $i = 0; $__LIST__ = $paying_list["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vp): $mod = ($i % 2 );++$i;?><tr>
                  <td><a href="<?php echo (getinvesturl($vp["borrow_id"])); ?>" target="_blank"><?php echo ($vp["borrow_name"]); ?></a></td>
                  <td><?php echo ($vp["sort_order"]); ?>/<?php echo ($vp["total"]); ?></td>
                  <td><?php echo Fmoney(getFloatValue($vp['capital']+$vp['interest'],2));?></td>
                  <td><?php echo (date("Y-m-d",$vp["deadline"])); ?></td>
                  <td><?php if($vp["repayment_time"] == 0): ?>-<?php else: echo (date("Y-m-d",$vp["repayment_time"])); endif; ?></td>
                  <td><?php echo ($vp["status"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	      </table><?php endif; ?>
      </div>
      
      <div class="details" id="divMedias">
      	<?php if(count(unserialize($vo['updata'])) == 0): ?><p>没有相关影像资料</p>
      	<?php else: ?>
      	<div id="makeMeScrollable">
		<?php $i=0;foreach(unserialize($vo['updata']) as $v){ $i++; ?>
           <?php if($UID > '0'): ?><li style="width:260px;height:260px;margin-left:10px;">	<a title="<?php echo $v['info']; ?>" rel="img_group" href="__ROOT__/<?php echo $v['img']; ?>"><img width="260" height="260" src="__ROOT__/<?php echo get_thumb_pic($v['img']); ?>"></a></li>
           <?php else: ?>
           <li style="width:260px;height:260px;margin-left:10px;">	<a title="<?php echo $v['info']; ?>" rel="login_group" href="__ROOT__/help/loginpop"><img width="260" height="260" src="__ROOT__/<?php echo get_thumb_pic($v['img']); ?>" /></a></li><?php endif; ?>
           
           <?php if ($i==2){ foreach(unserialize($vo['updata']) as $vv){ ?>
          <li style="width:260px;height:260px;margin-left:10px;"> 	<a title="<?php echo $vv['info']; ?>" rel="login_group" href="__ROOT__/help/loginpop"><img width="260" height="260" src="__ROOT__/<?php echo get_thumb_pic($vv['img']); ?>" /></a></li>
            <?php } } ?>
           
        <?php } ?>
        </div><?php endif; ?>
      </div>
      
      <!--<div id="discuss">
       
       <div id="discuss_h"><h4>评论<span>(<?php echo ($commentcount); ?>)</span></h4></div>
       
       <div id="dis_repost">
        <div id="dis_repost_l"><?php if(!empty($UID)): ?><p><a href="__APP__/member/user#fragment-1"><img src="<?php echo (get_avatar($UID)); ?>" width="80" height="80" alt="" /></a></p><p><a href="__APP__/member"><?php echo session('u_user_name');?></a></p><?php endif; ?></div>
        <div id="dis_repost_r">
         <textarea class="disr_text" name="comments" id="comments"></textarea>
         <input type="button" class="disr_but" value="发 表" onClick="addComment();" />
        </div>
       </div>
       
      <?php if(is_array($commentlist)): $i = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vc): $mod = ($i % 2 );++$i;?><div class="dis_review">
        <div class="dis_review_l"><p><a href="javascript:void(0)"><img src="<?php echo (get_avatar($vc["uid"])); ?>" width="80" height="80" alt="" /></a></p><p><a href="javascript:void(0)"><?php echo (hidecard($vc["uname"],8)); ?></a></p></div>
        <div class="dis_review_div"></div>
        <div class="dis_review_r">
         <p><?php echo ($vc["comment"]); ?></p>
         <h6><?php echo (date("Y-m-d H:i:s",$vc["add_time"])); ?></h6>
        </div>
       </div><?php endforeach; endif; else: echo "" ;endif; ?>
       
      </div>-->
      
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
<script src="__ROOT__/Style/Js/smoothDivScroll/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="__ROOT__/Style/Js/smoothDivScroll/js/jquery.mousewheel.min.js" type="text/javascript"></script>
<script src="__ROOT__/Style/Js/smoothDivScroll/js/jquery.kinetic.min.js" type="text/javascript"></script>
<script src="__ROOT__/Style/Js/smoothDivScroll/js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#makeMeScrollable").smoothDivScroll({
		mousewheelScrolling: "allDirections",
		manualContinuousScrolling: true,
		autoScrollingMode:""
		/*,visibleHotSpotBackgrounds:"always"*/
		,hotSpotScrollingInterval: 45
	});
	setTimeout(function(){$("#divMedias").css("display","none")}, 200);
	$("a[rel=img_group]").fancybox({
		openEffect  : 'none',
		closeEffect : 'none',

		prevEffect : 'none',
		nextEffect : 'none',

		closeBtn  : false,

		helpers : {
			title : {
				type : 'inside'
			},
			buttons	: {}
		},
		afterLoad		: function() {
			this.title = '图片 ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
		}
	});
	$("a[rel=login_group]").fancybox({
		type:'ajax',
		arrows:false,
		title:'查看大图请先登陆',
		closeBtn  : true
	});
	$("a[rel=invest_login]").fancybox({
		type:'ajax',
		arrows:false,
		title:'请先登陆',
		closeBtn  : true
	});
	$("#sh_boxr,#mous").on("mouseover",function(){
		$("#mous").css("display", "");
	});
	$("#sh_boxr,#mous").on("mouseout",function(){
		$("#mous").css("display", "none");
	});
	$("#details_h ul li").on({
		click:function(){
			$("#details_h ul li").removeClass("cen");
			$(this).addClass("cen");
			$(this).parent().find("li").each(function(){
				$("#"+$(this).attr("for")).css("display", "none");
			});
			$("#"+$(this).attr("for")).css("display", "");
		}
	});
});

//DIV隐显
function changeDIV(num){
	for(var id = 1;id<=8;id++)
		{
			if(id==num)
			{
				$("#detail_menu_"+id).attr('style','');
				$("#li_menu_"+id).addClass('now');
			}
			else
			{
				$("#detail_menu_"+id).attr('style','display: none');
				$("#li_menu_"+id).removeClass();
			}
		}
	if(num != 8){
		$("#spec-list ul li img").css('display', 'none');
	}else{
		$("#spec-list ul li img").css('display', '');
	}
}

bindpage();
function refreshComment(){
	var geturl = "<?php echo (getinvesturl($vo["id"])); ?>?type=commentlist&id=<?php echo ($vo["id"]); ?>&p=1";
	var id = "scomment";
	var x={};
	$.ajax({
		url: geturl,
		data: x,
		timeout: 5000,
		cache: false,
		type: "get",
		dataType: "json",
		success: function (d, s, r) {
			if(d) $("#"+id).html(d.html);//更新客户端 作个判断，避免报错
		}
	});
}
function bindpage(){
	$('.ajaxpagebar a').click(function(){
		try{	
			var geturl = $(this).attr('href');
			var id = $(this).parent().attr('data');
			var x={};
			$.ajax({
				url: geturl,
				data: x,
				timeout: 5000,
				cache: false,
				type: "get",
				dataType: "json",
				success: function (d, s, r) {
					if(d) $("#"+id).html(d.html);//更新客户端 作个判断，避免报错
				}
			});
		}catch(e){};
		return false;
	})
}
function addComment(){
	var tid = <?php echo (($vo["id"])?($vo["id"]):0); ?>;
	var cm = $("#comments").val();
	if(cm=="") {
		$.jBox.tip("评论内容不能为空",'tip');
		return;
	}
	$.jBox.tip("提交中......","loading");
	$.ajax({
		url: "__URL__/addcomment",
		data: {"comment":cm,"tid":tid},
		timeout: 5000,
		cache: false,
		type: "post",
		dataType: "json",
		success: function (d, s, r) {
			if(d){
				if(d.status==1){
					refreshComment();
					$.jBox.tip('留言成功');
					$("#comments").val('');
				}else{
					$.jBox.tip(d.message,'fail');
				}
			}
		}
	});
}

function jubao(id){
	var uxid = "<?php echo ($UID); ?>"||0;
	if(!(parseInt(uxid)>0)){
		$.jBox.tip("请先登陆");
		return;
	}
	$.jBox("get:__URL__/jubao/?id="+id, {
		title: "举报会员",
		width: "auto",
		top:'15%',
		buttons: {'关闭': true }
	});
}

var investmoney = 0;
var borrowidMS = 0;
var borrow_min = 0;
var borrow_max = 0;
function PostData(id) {
  var tendValue = parseFloat($("#invest_money").val());
  var pin = $("#pin").val();
  var borrow_pass = (typeof $("#borrow_pass").val()=="undefined")?"":$("#borrow_pass").val();
  var borrow_id = $("#borrow_id").val();
  	  tendValue = isNaN(tendValue)?0:tendValue;
  if(pin==""){
	$.jBox.tip("请输入支付密码");  
	return false;
  }
  if(tendValue<borrow_min){
	$.jBox.tip("本标最低投标金额为"+borrow_min+"元，请重新输入投标金额");  
	return false;
  }else if(tendValue>borrow_max && borrow_max!=0){
	$.jBox.tip("本标最大投标总金额为"+borrow_max+"元，请重新输入投标金额");  
	return false;
  }
  $.ajax({
	  url: "__URL__/investcheck",
	  type: "post",
	  dataType: "json",
	  data: {"money":tendValue,'pin':pin,'borrow_id':borrow_id,"borrow_pass":borrow_pass},
	  success: function(d) {
			  if (d.status == 1) {
				  investmoney = tendValue;
				  $.jBox.confirm(d.message, "会员投标提示", isinvest, { buttons: { '确认投标': true, '暂不投标': false},top:'40%' });
			  }
			  else if(d.status == 2)// 无担保贷款多次提醒
			  {
				  $.jBox.confirm(d.message, "会员投标提示", ischarge, { buttons: { '去冲值': true, '暂不冲值': false},top:'40%' });
			  }
			  else if(d.status == 3)// 无担保贷款多次提醒
			  {
				  $.jBox.alert(d.message, '会员投标提示',{top:'40%'});
			  }else{
				  $.jBox.tip(d.message);  
			  }
	  }
  });
}

function ischarge(d){
	if(d===true) window.location.href="__APP__/member/charge#fragment-1";
}
function isinvest(d){
	if(d===true) document.forms.investForm.submit();
}
function PostDataVouch(id) {
  var tendValue = parseFloat($("#vouch_money").val());
  var pin = $("#pin").val();
  	  tendValue = isNaN(tendValue)?0:tendValue;
  if(pin==""){
	$.jBox.tip("请输入支付密码");  
	return false;
  }
  if(tendValue<50){
	$.jBox.tip("最低担保额度50元");  
	return false;
  }

  $.ajax({
	  url: "__URL__/vouchcheck",
	  type: "post",
	  dataType: "json",
	  data: {"vouch_money":tendValue,'pin':pin},
	  success: function(d) {
			  if (d.status == 1) {
				  investmoney = tendValue;
				  $.jBox.confirm(d.message, "会员投标提示", isvouch, { buttons: { '确认担保': true, '暂不担保': false},top:'40%' });
			  }
			  else if(d.status == 2)// 无担保贷款多次提醒
			  {
				  $.jBox.confirm(d.message, "会员投标提示", isapply, { buttons: { '去申请额度': true, '暂不申请额度': false},top:'40%' });
			  }else{
				  $.jBox.tip(d.message);  
			  }
	  }
  });
}

function isapply(d){
	if(d===true) window.location.href="__APP__/member/memberinfo";
}
function isvouch(d){
	if(d===true) document.forms.vouchForm.submit();
}
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