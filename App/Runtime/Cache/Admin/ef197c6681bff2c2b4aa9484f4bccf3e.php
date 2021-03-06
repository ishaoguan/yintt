<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__ROOT__/Style/A/css/adminlogin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__ROOT__/Style/Js/jquery.min.js"></script>
<title>管理员登陆</title>
</head>

<body>
<form method="post" action="__ROOT__<?php echo SAFE_ADMIN;?>" name="form" id="form">
	<div class="bodybox">
		<div class="loginbox">
			<div class="logn1"><input type="text" class="unpa" id="admin_name" name="admin_name" /></div>
			<div class="logn2"><input type="password" class="unpa" id="admin_pass" name="admin_pass" /></div>
			<div class="logn3">
				<input type="text" class="code" id="code" name="code" maxlength="6" />
				<!--<img src="__URL__/verify" onclick="javascript:this.src='__URL__/verify?'+new Date().getTime()" style="cursor:pointer"/>-->
				<a href="javascript:;" onclick="sendMobileValidSMSCode()" id="btnSendMsg">获取短信验证码</a>
			</div>
			<div class="logn4"><a href="javascript:subform();" onclick="javascript:subform();" onFocus="this.blur();" title="登陆">登陆</a></div>
			<div class="spTip" id="sendSMSTip"></div>
		</div>
	</div>
</form>
<script type="text/javascript">
	function subform(){
		var frm = document.forms['form'];
			frm.submit();
	}
	document.onkeydown = keydown;
	function  keydown(s)
	{
		var e =13;
		var s=s||event;
		currKey=s.keyCode||s.which||s.charCode;
		if(currKey==13) subform();
	}
	

	var timer = null;
	var leftsecond = 60; //倒计时
	var msg = "";
	function sendMobileValidSMSCode() {
		$("#btnSendMsg").html("");
		var admin_name = $("#admin_name").val();
		if (admin_name == "") {
			$("#btnSendMsg").html("获取短信验证码");
			$('#sendSMSTip').html("请输入用户名");
			return;
		}
		$('#sendSMSTip').html("短信发送中...");
		$.ajax({
			url: "__URL__/getSmsCode/",
			type: "post",
			dataType: "json",
			data: {"admin_name":admin_name},
			success: function(d) {
				leftsecond = 60;
				if (d.status == 1) {
					msg = "发送成功，如未收到";
					clearInterval(timer);
					timer = setInterval(setLeftTime, 1000, "1");
					$("#btnSendMsg").html("");
					$("#admin_name").attr("readonly", true);
				}
				else if (d.status == -1) {
					msg = "您的验证码为：" + d.message;
					clearInterval(timer);
					timer = setInterval(setLeftTime, 1000, "1");
					$("#btnSendMsg").html("");
					$("#admin_name").attr("readonly", false);
				}
				else {
					msg = d.message;
					$("#sendSMSTip").html(msg);
					$("#btnSendMsg").html("获取短信验证码");
					$("#admin_name").attr("readonly", false);
				}
			}
		});
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
				$("#btnSendMsg").html("获取短信验证码");
				$("#admin_name").removeAttr("readonly");
			} catch (E) { }
			return;
		}
	}
</script>
</body>
</html>