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
<script type="text/javascript" src="__ROOT__/Style/Js/ajaxfileupload.js"></script>
<script type="text/javascript">
	var mbTest = /^(13|14|15|18|17)[0-9]{9}$/;
	var timer = null;
	var leftsecond = 60; //倒计时
	var msg = "";
	function sendMobileValidSMSCode() {
		$("#btnSendMsg").html("");
		var mobile = $("#txt_phone").val();
		if (mobile == "") {
			$("#btnSendMsg").html("获取验证码");
			$('#sendSMSTip').html("请输入手机号码");
			return;
		}
		if (mbTest.test(mobile)) {
			$('#sendSMSTip').html("短信发送中...");
			$.ajax({
				url: "__URL__/sendphone/",
				type: "post",
				dataType: "json",
				data: {"cellphone":mobile},
				success: function(d) {
					leftsecond = 60;
					if (d.status == 1) {
						msg = "发送成功，如未收到";
						clearInterval(timer);
						timer = setInterval(setLeftTime, 1000, "1");
						$("#btnSendMsg").html("");
						$("#txt_phone").attr("readonly", true);
					}
					else if (d.status == 2) {
						alert(d.message);
						$('#sendSMSTip').html("该手机号码已被其他用户使用");
						$("#btnSendMsg").html("获取验证码");
						$("#txt_phone").removeAttr("readonly");
					}
					else if (d.status == -1) {
						msg = "模拟短信发送成功，" + d.message;
						clearInterval(timer);
						timer = setInterval(setLeftTime, 1000, "1");
						$("#btnSendMsg").html("");
						$("#txt_phone").attr("readonly", true);
					}
					else {
						msg = "校验码发送失败,请重试";
						$("#sendSMSTip").html(msg);
						$("#btnSendMsg").html("获取验证码");
						$("#txt_phone").attr("readonly", true);
					}
				}
			});
		}
		else {
			$("#btnSendMsg").removeAttr("disabled");
			$("#btnSendMsg").html("获取验证码");
			$("#sendSMSTip").html("手机号码有误");
		}
	}
	function setLeftTime() {
		var second = Math.floor(leftsecond);
		if($("#spanSec").length == 0)
			$(".spTip").eq(0).html(msg + ",<span id='spanSec'>" + second + "</span>秒后可重发");
		else
			$("#spanSec").html(second);
		leftsecond--;
		if (leftsecond < 1) {
			$(".spTip").eq(0).html("现在可重新发送！");
			clearInterval(timer);
			try {
				$("#btnSendMsg").html("获取验证码");
				$("#txt_phone").removeAttr("readonly");
			} catch (E) { }
			return;
		}
	}
	var apppath = "__APP__";
	function setMobile() {
		var code = $('#txt_smsCode').val();
		$.ajax({
			url: "__URL__/validatephone",
			type: "post",
			dataType: "json",
			data: {"code":code},
			success: function(d) {
				if (d.status==1) {
					$.jBox.tip("验证成功");
					setTimeout(function(){ajaxreload($("a#mx2"))}, 3000);
				}
				else {
					if (d.status == 2) {
						leftsecond = 60;
						msg = "验证失败或者校验码失效，";
						clearInterval(timer);
						timer = setInterval(setLeftTime, 1000, "1");
						$("#btnSendMsg").attr("disabled", true);
						$("#txt_phone").attr("readonly", true);
					}
					if (d.status == 0) {
						$(".spTip").html(d.message);
					}
				}
			}
		});
	}
	
	function setSafeQuestion() {
		var question1 = $('#question1').val();
		var question2 = $('#question2').val();
		var answer1 = $('#answer1').val();
		var answer2 = $('#answer2').val();
		var isValidForm = true;
		if ($.trim(answer1) == '') {
			isValidForm = false;
			$('#answer1err').html('请输入安全问题答案。');
		}
		if ($.trim(answer2) == '') {
			isValidForm = false;
			$('#answer2err').html('请输入安全问题答案。');
		}
		if (question1 == question2) {
			isValidForm = false;
			$('#qErr').html('请设置两个不相同的安全问题。');
		}
		if (isValidForm) {
			$('#answer1err').html('');
			$('#answer2err').html('');
			$('#qErr').html('');
		}
		else {
			return;
		}
		$.ajax({
			url: "__URL__/questionsave/",
			type: "post",
			dataType: "json",
			data: {"q1":question1,"q2":question2,"a1":answer1,"a2":answer2},
			success: function(result) {
				if (result.status == 0) {
					$('#answer2err').html('安全问题设置失败，请稍后再试。');
				}
				else {
					$.jBox.tip("设置成功");
					setTimeout(function(){ajaxreload($("a#mx6"))},3000);
				}
			}
		});
	}
	//验证身份证号方法
	var testIdcard = function(idcard) {
		var Errors = new Array("验证通过!", "身份证号码位数不对!", "身份证号码出生日期超出范围!", "身份证号码校验错误!", "身份证地区非法!");
		var area = { 11: "北京", 12: "天津", 13: "河北", 14: "山西", 15: "内蒙古", 21: "辽宁", 22: "吉林", 23: "黑龙江", 31: "上海", 32: "江苏", 33: "浙江", 34: "安徽", 35: "福建", 36: "江西", 37: "山东", 41: "河南", 42: "湖北", 43: "湖南", 44: "广东", 45: "广西", 46: "海南", 50: "重庆", 51: "四川", 52: "贵州", 53: "云南", 54: "西藏", 61: "陕西", 62: "甘肃", 63: "青海", 64: "宁夏", 65: "xinjiang", 71: "台湾", 81: "香港", 82: "澳门", 91: "国外" }
		var idcard, Y, JYM;
		var S, M;
		var idcard_array = new Array();
		idcard_array = idcard.split("");
		if ((idcard.length == 15 || idcard.length == 18) && area[parseInt(idcard.substr(0, 2))] == null) return Errors[4];
		switch (idcard.length) {
			case 15:
				if ((parseInt(idcard.substr(6, 2)) + 1900) % 4 == 0 || ((parseInt(idcard.substr(6, 2)) + 1900) % 100 == 0 && (parseInt(idcard.substr(6, 2)) + 1900) % 4 == 0)) {
					ereg = /^[1-9][0-9]{5}[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))[0-9]{3}$/; //测试出生日期的合法性 
				}
				else {
					ereg = /^[1-9][0-9]{5}[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))[0-9]{3}$/; //测试出生日期的合法性 
				}
				if (ereg.test(idcard))
					return Errors[0];
				else
					return Errors[2];
				break;
			case 18:
				if (parseInt(idcard.substr(6, 4)) % 4 == 0 || (parseInt(idcard.substr(6, 4)) % 100 == 0 && parseInt(idcard.substr(6, 4)) % 4 == 0)) {
					ereg = /^[1-9][0-9]{5}19[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))[0-9]{3}[0-9Xx]$/; //闰年出生日期的合法性正则表达式 
				}
				else {
					ereg = /^[1-9][0-9]{5}19[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))[0-9]{3}[0-9Xx]$/; //平年出生日期的合法性正则表达式 
				}
				if (ereg.test(idcard)) {
					S = (parseInt(idcard_array[0]) + parseInt(idcard_array[10])) * 7 + (parseInt(idcard_array[1]) + parseInt(idcard_array[11])) * 9 + (parseInt(idcard_array[2]) + parseInt(idcard_array[12])) * 10 + (parseInt(idcard_array[3]) + parseInt(idcard_array[13])) * 5 + (parseInt(idcard_array[4]) + parseInt(idcard_array[14])) * 8 + (parseInt(idcard_array[5]) + parseInt(idcard_array[15])) * 4 + (parseInt(idcard_array[6]) + parseInt(idcard_array[16])) * 2 + parseInt(idcard_array[7]) * 1 + parseInt(idcard_array[8]) * 6 + parseInt(idcard_array[9]) * 3;
					Y = S % 11;
					M = "F";
					JYM = "10X98765432";
					M = JYM.substr(Y, 1);
					if (M == idcard_array[17])
						return Errors[0];
					else
						return Errors[3];
				}
				else
					return Errors[2];
				break;
			case 10:
				if(!/^[a-zA-Z]+$/.test(idcard.substr(0, 1))){
					return "\u0031\u0030\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u7B2C\u4E00\u4F4D\u5FC5\u987B\u4E3A\u82F1\u6587\u5B57\u6BCD\uFF01";
				}
				if(!/^\d+$/.test(idcard.substr(1, 6))){
					return "\u0031\u0030\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u0032\u002D\u0037\u4F4D\u5FC5\u987B\u4E3A\u6B63\u6574\u6570\uFF01";
				}
				if(idcard.substr(7, 1) != "("){
					return "\u0031\u0030\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u7B2C\u0038\u4F4D\u5FC5\u987B\u4E3A\u5DE6\u62EC\u5F27\uFF01";
				}
				if(!/^[0-9aA]+$/.test(idcard.substr(8, 1))){
					return "\u0031\u0030\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u7B2C\u0039\u4F4D\u5FC5\u987B\u4E3A\u6570\u5B57\u6216\u5B57\u6BCD\u0041\u0028\u0061\u0029\uFF01";
				}
				if(idcard.substr(9, 1) != ")"){
					return "\u0031\u0030\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u7B2C\u0031\u0030\u4F4D\u5FC5\u987B\u4E3A\u53F3\u62EC\u5F27\uFF01";
				}
				
				//Judge whether can be 11 division
				var upperIdCard = idcard.toUpperCase();
				upperIdCard = upperIdCard.replace('(','');
				upperIdCard = upperIdCard.replace(')','');
				var idcardSum = 9*58;//the first is space.
				for(var i = 0;i!=8;++i){
					idcardSum += (8-i)*getIdCardCode(upperIdCard.charAt(i));
				}
				if(idcardSum%11!=0){
					return "\u0031\u0030\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u4E0D\u7B26\u5408\u89C4\u5219\uFF01";
				}
				return Errors[0];
				break;
			case 11:
				if(!/^[a-zA-Z ]+$/.test(idcard.substr(0, 1))){
					return "\u0031\u0031\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u7B2C\u4E00\u4F4D\u5FC5\u987B\u4E3A\u7A7A\u683C\u6216\u82F1\u6587\u5B57\u6BCD\uFF01";
				}
				if(!/^[a-zA-Z]+$/.test(idcard.substr(1, 1))){
					return "\u0031\u0031\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u7B2C\u4E8C\u4F4D\u5FC5\u987B\u4E3A\u82F1\u6587\u5B57\u6BCD\uFF01";
				}
				if(!/^\d+$/.test(idcard.substr(2, 6))){
					return "\u0031\u0031\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u0033\u002D\u0038\u4F4D\u5FC5\u987B\u4E3A\u6B63\u6574\u6570\uFF01";
				}
				if(idcard.substr(8, 1) != "("){
					return "\u0031\u0031\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u7B2C\u0039\u4F4D\u5FC5\u987B\u4E3A\u5DE6\u62EC\u5F27\uFF01";
				}
				if(!/^[0-9aA]+$/.test(idcard.substr(9, 1))){
					return "\u0031\u0031\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u7B2C\u0031\u0030\u4F4D\u5FC5\u987B\u4E3A\u6570\u5B57\u6216\u5B57\u6BCD\u0041\u0028\u0061\u0029\uFF01";
				}
				if(idcard.substr(10, 1) != ")"){
					return "\u0031\u0031\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u7B2C\u0031\u0031\u4F4D\u5FC5\u987B\u4E3A\u53F3\u62EC\u5F27\uFF01";
				}
		
				//Judge whether can be 11 division
				var upperIdCard = idcard.toUpperCase();
				upperIdCard = upperIdCard.replace('(','');
				upperIdCard = upperIdCard.replace(')','');
				var idcardSum = 0;//the first is space.
				for(var i = 0;i!=9;++i){
					idcardSum += (9-i)*getIdCardCode(upperIdCard.charAt(i));
				}
				if(idcardSum%11!=0){
					return "\u0031\u0031\u4F4D\u9999\u6E2F\u8EAB\u4EFD\u8BC1\u4E0D\u7B26\u5408\u89C4\u5219\uFF01";
				}
				return Errors[0];
				break;
			default:
				return Errors[1];
				break;
		}
	}
	
	function getIdCardCode(vChar){
		if(/^\d+$/.test(vChar)){
			return vChar;
		}else if(/^ +$/.test(vChar)){
			return 58;
		}else{
			return vChar.charCodeAt()-55;
		}
	}
	
	function setIdCard() {
		var realname = $('#realname').val();
		var idcard = $('#idcard').val();
		var isValidForm = true;
		if ($.trim(realname) == '') {
			isValidForm = false;
			$('#realnameErr').html('请输入您的真实姓名。');
		}else{
			$('#realnameErr').html('');
		}
		
		if ($.trim(idcard) == '') {
			isValidForm = false;
			$('#idcardErr').html('请输入您的身份证号码。');
		}
		else {
			var idcartValidResult = testIdcard($.trim(idcard));
			if (idcartValidResult.indexOf('通过') == -1) {
				isValidForm = false;
				$('#idcardErr').html(idcartValidResult);
			}
		}
		if (isValidForm) {
			$('#realnameErr').html('');
			$('#idcardErr').html('');
		}
		else {
			return;
		}
		var idimg = $("#imgfile").val(); 
		$.ajax({
			url: "__URL__/saveid/",
			type: "post",
			dataType: "json",
			data: {"realname":realname,"idcard":idcard,"idimg":idimg},
			success: function(result) {
				if (result.status == "0") {
					$('#idcardErr').html(result.message);
					
				}
				else {
					$.jBox.tip("提交验证成功");
					setTimeout(function(){ajaxreload($("a#mx3"))}, 3000);
				}
			}
		});
	}
	function ajaxFileUploads()
	{
		$("#loading_makeclub").ajaxStart(function(){	$(this).show();	}).ajaxComplete(function(){	$(this).hide();	});
		$.ajaxFileUpload({
			url:'__URL__/ajaxupimg/',
			secureuri:false,
			fileElementId:'imgfile',
			dataType: 'json',
			success: function (data, status)
			{
				if(data.status==1){
					//$("#entityfilefzrzjtip").css('display','block');
					$("#dv_idImg6").html("<img src=\"/"+data.img+"\" width=\"120\" height=\"100\">&nbsp; <a href=\"__ROOT__/"+data.img+"\" title=\"身份证正面\" for=\"idcard1\">点击查看大图</a>");
					$("#dv_idImg6").css("display","block");
					$.jBox.tip("身份证正面上传成功！", "success");
					//location.reload();

				}
				else  {
					$.jBox.tip('身份证正面上传失败，'+data.message+'，请重试', "error");
				}
			}
		})
	
		$("#loading_makeclub").ajaxStart(function(){	$(this).show();	}).ajaxComplete(function(){	$(this).hide();	});
		$.ajaxFileUpload({
			url:'/member/verify/ajaxupimg/',
			secureuri:false,
			fileElementId:'imgfile',
			dataType: 'json',
			success: function (data, status)
			{
				if(data.status==1){
					$("#dividcard").html("<img src=\"/"+data.img+"\" width=\"240\">&nbsp; ");
					$("#dividcard").css("display","block");
					$.jBox.tip("身份证正面上传成功！", "success");
					//location.reload();
				}
				else{
					//$.jBox.tip('身份证正面上传失败，'+data.message+'，请重试', "error");
				}
			}
		})
	}
	
	function ajaxFileUploads1()
	{
		$("#loading_makeclub1").ajaxStart(function(){	$(this).show();	}).ajaxComplete(function(){	$(this).hide();	});
		$.ajaxFileUpload({
			url:'__URL__/ajaxupimg1/',
			secureuri:false,
			fileElementId:'imgfile1',
			dataType: 'json',
			success: function (data, status)
			{
				if(data.status==1){
					//$("#entityfilefzrzjtip1").css('display','block');
					$("#dv_idImg61").html("<img src=\"/"+data.img+"\" width=\"120\" height=\"100\">&nbsp; <a href=\"__ROOT__/"+data.img+"\" title=\"身份证背面\" for=\"idcard2\">点击查看大图</a>");
					$("#dv_idImg61").css("display","block");
					$.jBox.tip("身份证背面上传成功！", "success");
				}
				//else  $.jBox.tip('身份证背面上传失败，'+data.message+'，请重试', "error");
			}
		})
	}


	function checkEmailValided(){
        $.ajax({
            url: "__URL__/emailvalided/",
            data: {},
            timeout: 5000,
            cache: false,
            type: "get",
            dataType: "json",
            success: function (d, s, r) {
              	if(d){
					alert(d.status);
					if(d.status==1){
							$.jBox.tip("验证成功");
					}else{
						$("#emailtip").show();
					}
				}
            }
        });
	}

	function sendValidEmail1(){
		$.jBox.tip("邮件发送中......",'loading');
        $.ajax({
            url: "__URL__/emailvsend1/",
            timeout: 8000,
            cache: false,
            type: "post",
            dataType: "json",
			data: {},
            success: function (d, s, r) {
              	if(d){
					if(d.status==1){
						$.jBox.tip('新邮件已经发送成功，请注意查收！');
						
					}else{
						$.jBox.tip('发送失败,请重试！');
						
					}
				}
            },
			complete:function(XMLHttpRequest, textStatus){
					setTimeout('myrefresh()',3000); //指定3秒刷新
			}
        });
	}

	function sendValidEmail(){
		var email = $("#email").val();
		if(email==""){
			$.jBox.tip('邮箱地址不能为空！','tip');
			return;
		}else{
			var emailreg = new RegExp("^[\\w-]+(\\.[\\w-]+)*@[\\w-]+(\\.[\\w-]+)+$", "i");
			if(!emailreg.test(email)){
				$.jBox.tip('请输入正确的邮箱地址','tip');
				return;
			}else{
				AsyncEmail(email);
			}
		}
		send_email(email);
		/*$.jBox.tip("邮件发送中......",'loading');
        $.ajax({
            url: "__URL__/emailvsend/",
            timeout: 5000,
            cache: false,
            type: "post",
            dataType: "json",
			data: {"email":email},
            success: function (d, s, r) {
              	if(d){
					if(d.status==1){
						$.jBox.tip('新邮件已经发送成功，请注意查收！');
						window.location.reload();
					}else{
						$.jBox.tip('发送失败,请重试！');
						window.location.reload();
					}
				}
            }
        });*/
	}
	function AsyncEmail(email) {
		$.jBox.tip("正在检测电子邮件地址……",'loading');
		$.ajax({
			type: "post",
			async: false,
			dataType: "json",
			url: "__URL__/ckemail/",
			data: {"Email":email},
			//timeout: 3000,
			success: function (d, s, r) {
				if(d){
					if(d.status==1){
					}else{
						$.jBox.tip('邮箱已经在本站注册！','tip');
						return false;
					}
				}
			}
		});
	}
	
	function myrefresh()
	{
	   window.location.reload();
	   window.location.href="/member/verify?id=1#fragment-1";
	}


	function send_email(email){
		$.jBox.tip("邮件发送中......",'loading');
        $.ajax({
            url: "__URL__/emailvsend/",
			data: {"email":email},
            timeout: 8000,
			cache: false,
			type: "post",
			dataType: "json",
            success: function (d, s, r) {
					if(d.status==1){
						$.jBox.tip(d.message,"success");
					}else if(d.status==2){
						$.jBox.tip(d.message,"fail");
					}else{
						$.jBox.tip(d.message,"fail");
					}
            },
			complete:function(XMLHttpRequest, textStatus){
					setTimeout('myrefresh()',3000); //指定3秒刷新
			}
        });
	}
	
	function email(){
		$.jBox.tip("验证成功");
	}
	/*
	$.jBox("get:__URL__/welcome/", {
		title: "<?php echo ($glo["web_name"]); ?>验证中心",
		width: "auto",
		buttons: {'关闭': true }
	});*/
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
     
   	      <!-- <div class="clew_us">
      <div class="clew_lic"></div>
      <div class="ceu_r">
       <p>您目前竞标中的投资总额是：<span class="fontred">￥<?php echo (($total)?($total):"0.00"); ?></span>，共<span class="fontred"><?php echo (($num)?($num):"0"); ?></span>笔投标。</p>
      </div>
     </div> -->
     
     <div class="us_rh" id="rotate">
      <ul>
       <li><a href="#fragment-1" ajax_href="__URL__/email/">邮箱认证</a></li>
       <li class="usrhDiv"></li>
       <li><a id="mx2" href="#fragment-2" ajax_href="__URL__/cellphone/">手机认证</a></li>
       <li class="usrhDiv"></li>
       <li><a id="mx3" href="#fragment-3" ajax_href="__URL__/idcard/">实名认证</a></li>
       <li class="usrhDiv"></li>
       <!-- <li><a id="mx4" href="#fragment-4" ajax_href="__URL__/face/">现场认证</a></li>
       <li class="usrhDiv"></li>
       <li><a id="mx5" href="#fragment-5" ajax_href="__URL__/video/">视频认证</a></li>
       <li class="usrhDiv"></li> -->
       <li><a id="mx6" href="#fragment-6" ajax_href="__APP__/Member/memberinfo/editdata/">资料认证</a></li>
       <li class="usrhDiv"></li>
       <li><a id="mx7" href="#fragment-7" ajax_href="__URL__/safequestion/">安全问题设置</a></li>
       <li class="usrhDiv"></li>
      </ul>
     </div>
   	<div id="fragment-1" style="display:none"></div>
   	<div id="fragment-2" style="display:none"></div>
   	<div id="fragment-3" style="display:none"></div>
   	<div id="fragment-4" style="display:none"></div>
   	<div id="fragment-5" style="display:none"></div>
   	<div id="fragment-6" style="display:none"></div>
   	<div id="fragment-7" style="display:none"></div>
     
    <!-- Right // -->
   </div>
  </div>
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