<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
function showErr() {
	$(".alertDiv").css("display", "");
}
function clearErr() {
	$(".alertDiv ul").html("");
}
function addErr(err) {
	$(".alertDiv ul").append("<li>" + err + "</li>");
}
function hideErr() {
	$(".alertDiv").css("display", "none");
}
function hasErr() {
	return $(".alertDiv ul li").length > 0;
}
</script>
<div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	您可以通过经常性修改密码更好的保护您的账号安全，以避免您受到意外损失</p>
</div>
<div class="u12_clew">
	<p>1、经常性修改密码能有效的保护您的帐号安全<br>
	2、涉及到您的资金安全，请勿设置简单的密码，不要设置和其它网站相同的密码</p>
</div>
<div style="width: 746px; display: none;" class="alertDiv">
	<ul style="display: block;">
	</ul>
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0" class="tabpass">
 <tr>
  <th>用户名：</th>
  <td><?php echo session('u_user_name');?></td>
 </tr>
 <tr>
  <th>请输入原密码：</th>
  <td><input id="oldpassword" name="oldpassword" class="text2" type="password">
				<span class="font666">(密码忘了，我要回答<a class="thickbox" title="验证密保问题" style="color: #bf0f0f;
					font-weight: bold; margin: 0px 2px;" href="__APP__/member/safe#fragment-2">安全问题</a>重新设置密码)</span></td>
 </tr>
 <tr>
  <th>请输入新密码：</th>
  <td><input id="newpassword" name="newpassword" class="text2" type="password">
				<span class="font666">(输入您的新密码)</span></td>
 </tr>
 <tr>
  <th>请再输入新密码：</th>
  <td><input id="newpassword1" name="newpassword1" class="text2" type="password">
				<span class="font666">(再输入一次您的新密码)</span></td>
 </tr>
</table>
<input type="button" class="u4_but2" value="提交更新" onclick="UpdatePwd()"/>
<script type="text/javascript">
	var newTitle = '<?php echo ($glo["web_name"]); ?>提醒您：';
	function UpdatePwd() {

		var oldpwd = $("#oldpassword").val();
		var newspwd1 = $("#newpassword").val();
		var newspwd2 = $("#newpassword1").val();
		clearErr();
		hideErr();

		if (oldpwd == '') {
			addErr('原密码必须填写！');
		}
		if (newspwd1 == '') {
			addErr('新密码必须填写！');
		}
		if ($("#newpassword").val().length<6){
			addErr('新密码不得少于6位');
		}
		if (newspwd2 == '') {
			addErr('确认新密码必须填写！');
		}
		if (newspwd2 != newspwd1) {
			addErr('两次密码不一致！');
		}
		if (hasErr()) {
			showErr();
			return false;
		}
		else {
			$.jBox.tip(AJAX_TIPS, 'loading', {timeout:AJAX_TIMEOUT});
			$.ajax({
				url: "__URL__/changepass/",
				type: "post",
				dataType: "json",
				data: {"oldpwd":oldpwd,"newpwd1":newspwd1,"newpwd2":newspwd2},
				success: function(d) {
					$.jBox.tip("", 'loading', {timeout:1});
					if (d.status == "2") {
						addErr('原密码错误，请重新输入！');
						showErr();
						return;
					} else if (d.status == "1") {
						$.jBox.alert('恭喜，密码修改成功！', ALERT_TIT, {closed:function(){ajaxreload($('a[href=#fragment-2]'));}});
					} else {
						$.jBox.tip('对不起，原密码与新密码相同或者操作失败，请联系客服！','fail');
					}
				}
			})
		}
	}
</script>