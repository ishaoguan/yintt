<?php if (!defined('THINK_PATH')) exit(); if($phone_status == '1'): ?><div class="us_rb4">
	<div class="u12_clew">
		<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
		您已通过手机验证</p>
	</div>
</div>
<?php else: ?>
<div style="overflow: auto; width: 594px; height: 435px;" id="mybox4_content">
	<div style="width:100%; margin:20px 0px 0px 0px;  height:36px;line-height:36px;background-position:0px -182px; "></div>
	<div style="width:100%; height:270px;">
	<div style="width:20%; height:270px; line-height:30px;float:left;font-size:14px;text-align:center ; ">
		<img src="__ROOT__/Style/M/images/s_mobil.gif" style="vertical-align:middle"></div>
	<div style="width:80%; height:270px; line-height:30px;float:left;font-size:14px;">
		<span style="margin:20px;display:block; text-align:left;">您在<?php echo ($glo["web_name"]); ?>的充值提现等重要操作，都需要通过手机动态验证码！<br>请填写您真实的手机号码，完成手机验证。<br>
		<a href="__APP__/member/safe#fragment-5">您也可以单击这里绑定其他已通过手机验证的账号来共享手机验证</a><br>
		<span style="vertical-align:top;">手机号：<input type="text" onkeyup="value=this.value.replace(/D+/g,&quot;&quot;)" style="width:173px;height:21px;line-height:21px;font-size:14px;font-weight:bold;margin:5px;" onkeydown="$(&quot;#sendSMSTip&quot;).html(&quot;&quot;)" maxlength="11" id="txt_phone"> <a href="javascript:;" onclick="sendMobileValidSMSCode()" id="btnSendMsg">获取验证码</a></span><br><span style="vertical-align:top;">验证码：<input type="text" onkeyup="value=this.value.replace(/D+/g,&quot;&quot;)" style="width:173px;height:21px;line-height:21px;font-size:14px;font-weight:bold;margin:5px;" id="txt_smsCode"> <span style="font-size:12px;" class="spTip" id="sendSMSTip"></span></span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="setMobile();" href="#1"><img src="__ROOT__/Style/M/images/yzbtn06.gif" style="vertical-align:middle;margin:10px;border:0px;"></a><br><span style="font-size:12px;color:#999999;"><img src="__ROOT__/Style/M/images/zhuce1.gif" style="vertical-align:middle">&nbsp;&nbsp;请注意以下事项：</span><br><span style="font-size:12px;color:#999999;">1、根据省份、城市、地区不同，一般会在5秒-5分钟内收到验证码。</span><br><span style="font-size:12px;color:#999999;">2、如果您在验证过程中，出现任何问题，请联系网站客服。</span></span></div></div></div><?php endif; ?>