<?php if (!defined('THINK_PATH')) exit();?><div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	<?php if(!empty($oauth)): ?>尊敬的<?php echo ($oauth["site"]); ?>三方登陆用户，为了方便您的使用，您可以修改账号跟密码，并可以取消三方登陆开关(注意用户名跟密码只能修改一次哦，如果用户名密码不填则认为您不用修改)
	<?php else: ?>您不是三方登陆用户<?php endif; ?></p>
</div>
<div style="width: 746px; display: none;" class="alertDiv">
	<ul style="display: block;">
	</ul>
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0" class="tabpass">
<?php if($oauth['account_flag'] == 0): ?><tr>
  <th>用户名：</th>
  <td><input id="username" name="username" class="text2" type="text">
				<span class="font666">(输入您的用户名)</span></td>
 </tr>
 <tr>
  <th>请输入密码：</th>
  <td><input id="password" name="password" class="text2" type="password">
				<span class="font666">(输入您的密码)</span></td>
 </tr>
 <tr>
  <th>请再输入密码：</th>
  <td><input id="password1" name="password1" class="text2" type="password">
				<span class="font666">(再输入一次您的密码)</span></td>
 </tr><?php endif; ?>
 <tr>
  <th>三方登陆开关：</th>
  <td><input id="loginenable" name="loginenable" type="checkbox" <?php if($oauth["login_enable"] == 1): ?>checked="checked"<?php endif; ?> />
				<span class="font666">(设置是否开启三方登陆，勾上为开启)</span></td>
 </tr>
</table>
<input type="button" class="u4_but2" value="提交更新" onclick="UpdateThird()"/>
<script type="text/javascript">
<!--
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
function UpdateThird() {
	var username = $("#username").val();
	var password = $("#password").val();
	var password1 = $("#password1").val();
	clearErr();
	hideErr();

	if (username != '' || password != '' || password1 != '') {
		if(username == ''){
			addErr('用户名不能为空！');
		}
		if(password == ''){
			addErr('密码不能为空！');
		}
		if(password1 == ''){
			addErr('再次输入的密码不能为空！');
		}
		if (password != password1) {
			addErr('两次密码不一致！');
		}
	}
	if (hasErr()) {
		showErr();
		return false;
	}
	else {
		$.ajax({
			url: "__URL__/updatethird/",
			type: "post",
			dataType: "json",
			data: {"username":username,"password":password,"password1":password1, "loginenable":$("#loginenable").prop("checked")?1:0},
			success: function(d) {
				if (d.status == "1") {
					if(d.needlogout == 1){
						$.jBox.tip('恭喜，设置成功！3秒后将退出登陆，请用新用户名密码重新登陆','success');
						setTimeout(function(){window.location.href = "__APP__/member/common/actlogout";},3000);
					}else{
						$.jBox.tip('恭喜，设置成功！3秒后自动跳转到用户首页','success');
						setTimeout(function(){window.location.href = "__APP__/member/index.html";},3000);
					}
				} else {
					$.jBox.tip(d.message,'fail');
				}
			}
		})
	}
}
//-->
</script>