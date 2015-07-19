<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
var imgpath="__ROOT__/Style/M/";
var curpath="__ROOT__/member/common";

function jfun_dogetpass(){
    var ux = $("#emailname").val();
    if(ux==""){
        $.jBox.tip('请输入用户名或者邮箱','tip');
        return;
    }
    $.jBox.tip("邮件发送中......","loading");
    $.ajax({
        url: "__APP__/member/common/dogetpass/",
        data: {"u":ux},
        timeout: 5000,
        cache: false,
        type: "post",
        dataType: "json",
        success: function (d, s, r) {
            if(d){
                if(d.status==1){
                    $.jBox.tip("发送成功，请去邮箱查收",'success');
                    $.jBox.close(true);
                }else{
                    $.jBox.tip("发送失败，请重试",'fail');
                }
            }
        }
    });

}

function getPassWord() {
  $.jBox("get:__ROOT__/member/common/getpassword/", {
    title: "找回密码",
    width: "auto",
    buttons: {'发送邮件':'jfun_dogetpass()','关闭': true }
  });   
}

function LoginSubmit() {
    if(!BlurEmail())return;
    if(!BlurPwd())return;
    //if(!BlurCode())return;
	$.jBox.tip("登陆中......",'loading');
	$.ajax({
		url: "__APP__/member/common/actlogin",
		data: {"sUserName": $("#txtUser").val(),"sPassword": $("#txtPwd").val(),"sVerCode": $("#txtCode").val(),"Keep":$("#loginstate").val()},
		timeout: 5000,
		cache: false,
		type: "post",
		dataType: "json",
		success: function (d, s, r) {
			if(d){
				if(d.status==0){
					$.jBox.tip(d.message,"tip");	
				}else{
					if(d.url_referer)
						window.location.href=d.url_referer;
					else
						window.location.href="/member/";
				}
			}
		}
	});
}

function strLength(as_str){
	return as_str.replace(/[^\x00-\xff]/g, 'xx').length;
}
function isLegal(str){
if(/[!,#,$,%,^,&,*,?,_,~,\s+]/gi.test(str)) return false;
return true;
}

function BlurEmail() {
    var txt = "#txtUser";
    var td = "#dvUser";
    //var pat1 = new RegExp("^[\\d\\.a-z_A-Z]{4,20}$", "i");
	var pat1 = new RegExp("^[\\d\\.a-z_A-Z]{4,20}|[\u4e00-\u9fa5]$", "i");
    var str = $(txt).val();
    var pat2 = new RegExp("^[\\w-]+(\\.[\\w-]+)*@[\\w-]+(\\.[\\w-]+)+$", "i");
	strlen = strLength(str);
    if (!isLegal(str) || strlen<4 || strlen>20) {
        $.jBox.tip("格式填写错误!","error");
        return false;
    }
    return true;
}

function BlurPwd() {
    var txt = "#txtPwd";
    var td = "#dvPwd";
    var pat = new RegExp("^.{6,}$", "i");
    var str = $(txt).val();
    if (pat.test(str)) {
        //格式正确
        return true;
    }
    else {
        $.jBox.tip("密码填写错误!","error");
    }
}

function BlurCode() {

    var txt = "#txtCode";
    var td = "#dvCode";
    var pat = new RegExp("^[\\da-z]{4}$", "i");
    var str = $(txt).val();
    if (pat.test(str)) {
        return true;
    }
    else {
        $.jBox.tip("验证码填写错误！","error");
    }
}

document.onkeydown = function (e) {
    var key = e.which;
    if (key == 13) {
        e.preventDefault();
        $("#btnReg").click();
    }
}
$(document).ready(function(){
	$("#txtUser").val($("#txtUser").attr("defval"));
	$("#txtCode").val($("#txtCode").attr("defval"));
	$("#txtUser,#txtCode").focus(function(){
		if($(this).val()==$(this).attr("defval"))$(this).val("");
	});
	$("#txtUser,#txtCode").blur(function(){
		if($(this).val()=="")$(this).val($(this).attr("defval"));
	});
});
</script>

   <div id="loginBox">
     <h4>登陆<?php echo ($glo["web_name"]); ?></h4>
     <ul>
      <li><input type="text" class="lb_text" id="txtUser" defval="账户名/邮箱/手机" /></li>
      <li><input type="password" class="lb_text" value="" id="txtPwd" /></li>
      <li><input type="text" class="lb_textMa" id="txtCode" defval="输入右边的验证码"/><img onclick="this.src=this.src+'?t='+Math.random()" id="imVcode" src="__APP__/Member/common/verify" width="98" height="28" alt="<?php echo ($glo["web_name"]); ?>" title="单击刷新验证码" /></li>
      <li class="imt"><input type="button" class="lb_but" value="登 录" onclick="LoginSubmit(this)" id="btnReg" /><a href="__APP__/member/common/register">注册账号</a><a href="javascript:void(0)" onclick="getPassWord()">忘记密码</a></li>
    <li class="imt"><!--<input type="button" class="sinaBut" value="微信登录" onclick="javascript:window.location.href='__APP__/member/oauth/sina'" />--><input type="button" class="qqBut" value="QQ 登录" onclick="javascript:window.location.href='__APP__/member/oauth/qq/'" /></li>
     </ul>
   </div>