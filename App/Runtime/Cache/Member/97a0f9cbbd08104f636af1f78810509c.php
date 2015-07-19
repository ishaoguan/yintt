<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="__ROOT__/Style/Js/area.js" language="javascript"></script>

<script type="text/javascript">
	var newTitle = '<?php echo ($glo["web_name"]); ?>提醒您：';
	$(function() {
		$("#btn_set").click(function() {
			clearErr();
			// alert($("#sendSMS").html());
			// alert($("#code").html());
			// alert(msgNum);
			// alert($("#code").val().length);
			if ($("#bank_name").val()=="") {
				addErr("请选择开户行");
			}
			if ($("#txt_account").val().length < 1) {
				addErr("请输入您的银行帐号");
			}
			if ($("#txt_account").val().length < 9) {
				addErr("请输入正确的银行卡号");
			}
			if ($("#txt_bankName").val().length < 1) {
				addErr("请输入开户支行名称");
			}
			if ($("#province").val()=="") {
				addErr("请选择开户行所在省份");
			}
			if ($("#city").val()=="") {
				addErr("请选择开户行所在市");
			}
			if ($("#txt_confirmaccount").val() != $("#txt_account").val()) {
				addErr("更新失败。两次输入银行账号不一致，请重新输入！");
				$("#txt_confirmaccount").val("");
				$("#txt_confirmaccount").focus();
			}
			if ($("#code").val()==""){
				addErr("你还没有输入验证码");
			
			}
			if (hasErr()) {
				showErr();
				return false;
			}

			else {
					$.jBox.tip(AJAX_TIPS, 'loading', {timeout:AJAX_TIMEOUT});
					$.ajax({
						url: "__URL__/bindbank",
						type: "post",
						dataType: "json",
						data: {
							account: $("#txt_account").val(), oldaccount: $("#txt_oldaccount").val(),
							province: $("#province").find("option:selected").text(),cityName: $("#city").find("option:selected").text(),
							bankaddress: $("#txt_bankName").val(), bankname: $("#bank_name").val(), smscode:$("#code").val()
							
						},
						success: function(d) {
							$.jBox.tip("", 'loading', {timeout:1});
							if (d.status == 1) {
								$.jBox.alert("恭喜，您的银行卡更新成功！", ALERT_TIT, {closed:function(){ajaxreload($('a[href=#fragment-1]'));}});
							}
							else if (d.status == 0) {
								$.jBox.tip(d.message, 'fail');
							}
						}
					});
			}
		});
		var ops = '添加';
		if (ops == '添加') {
			$("#trOldAccount").css("display", "none")
		}
		$("#bankname").html($("#" + 'sel_bankList2' + " :selected").html());
		$("#txt_account").bind("keyup", function() {
			$this = $(this);
			$this.val($this.val().toString().replace(/[^\d]+/, ""));
		});
	});
	function checkSub() {
		$("input[type='text']").each(function() {
			if ($(this).val().length < 1)
				return false;
		});
		return true;
	}

	//根据隐藏的银行卡账户判断是更新还是新增
	function showErr() {
		$(".alertDiv").css("display", "");
	}
	function clearErr() {
		$(".alertDiv ul").html("");
		hideErr();
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
<div class="us_rb11">
<div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	尊敬的<?php echo ($voinfo["real_name"]); ?>先生/女士，提现操作涉及您的资金安全，敬请仔细操作。</p>
</div>
<div style="width: 716px; display: none; margin-left:20px" class="alertDiv">
	<ul style="display: block;">
	</ul>
</div>
 <ul>
  <li><p>您当前的银行账号：</p><?php echo (hidecard($vobank["bank_num"],3,'还没有登记您的银行账号')); ?></li>
  <li><p>您当前的银行名称：</p><div class="sel_border"><div class="selNr"><select name="bank_name" id="bank_name"   class="c_select sel"><option value="">--请选择--</option><?php foreach($bank_list as $key=>$v){ if($vobank["bank_name"]==$key && $vobank["bank_name"]!=""){ ?><option value="<?php echo ($key); ?>" selected="selected"><?php echo ($v); ?></option><?php }else{ ?><option value="<?php echo ($key); ?>"><?php echo ($v); ?></option><?php }} ?></select><span id="tip_bank_name" class="tip">*</span></div></div></li>
  <li><p><span>*</span>您银行账户户主姓名：</p><?php echo ($voinfo["real_name"]); ?></li>
  <li><p><span>*</span>输入您的当前的银行帐号：</p><input type="text" class="u11_tex1" id="txt_oldaccount" /><h6>(为了您的资金安全，请输入您当前的银行账号)</h6></li>
  <li><p><span>*</span>输入您新的银行帐号：</p><input type="text" class="u11_tex1" id="txt_account" /><h6>(信用卡帐号无法提现，请不要误填)</h6></li>
  <li><p><span>*</span>确认您新的银行帐号：</p><input type="text" class="u11_tex1" id="txt_confirmaccount" /><h6>(请再次确认您添加的银行账号)</h6></li>
  <li><p><span>*</span>开户银行城市：</p>
  	<div class="sel_border"><div class="selNr"><select name="selectp" id="province" class="sel"><option value="0">请选择省份 </option></select></div></div>
  	<div class="sel_border"><div class="selNr"><select name="selectc" id="city" class="sel"><option value="0">请选择城市</option></select></div></div>
  	<div class="sel_border"><div class="selNr"><select name="selectc" id="district" style="display:none" class="sel"><option value="0">请选择地区</option></select></div></div>
  </li>
  <li><p><span>*</span>输入开户行支行名称：</p><input type="text" class="u11_tex1" name="txt_bankName" id="txt_bankName" value="<?php echo ($vobank["bank_address"]); ?>"/><h6>(如不能确定，请拨打开户行的客服热线咨询)</h6></li>
  <li><p><span>*</span>输入手机验证码：</p><input type="text" class="u11_tex1" id="code" name="code" maxlength="6"/><h6><a href="javascript:;" onclick="sendMobileValidSMSCode()" id="btnSendMsg">获取短信验证码</a></h6><div class="spTip" id="sendSMSTip"></div></li>
  <li><p>&nbsp;</p><input type="button" class="u11_but" value="提交更新" id="btn_set"/></li>
 </ul>
</div>
<script type="text/javascript">
var areaurl="__URL__/getarea/";
var s = new GetAreaSelect('#province','#city','#district',<?php if(empty($vobank['bank_province'])): ?>2<?php else: echo ($vobank["bank_province"]); endif; ?>,<?php if(empty($vobank['bank_city'])): ?>52<?php else: echo ($vobank["bank_city"]); endif; ?>);
</script>
<script type="text/javascript">
	if(timer)clearInterval(timer);
	var timer = null;
	var leftsecond = 60; //倒计时
	var msg = "";
	var msgNum=""
	function sendMobileValidSMSCode() {
		$("#btnSendMsg").html("");
		var admin_name = "<?php echo ($voname["user_name"]); ?>";
		$.jBox.tip(AJAX_TIPS, 'loading', {timeout:AJAX_TIMEOUT});
		$.ajax({
			url: "__URL__/getSmsCode/",
			type: "post",
			dataType: "json",
			data: {"admin_name":admin_name},
			success: function(d) {
				$.jBox.tip("", 'loading', {timeout:1});
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
					msgNum = d.message;
					clearInterval(timer);
					timer = setInterval(setLeftTime, 1000, "1");

					$("#btnSendMsg").html("");
					$("#admin_name").attr("readonly", false);
				}
				else {
					msg = d.message;
					msgNum =d.message;
					$.jBox.alert(msg, ALERT_TIT);
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