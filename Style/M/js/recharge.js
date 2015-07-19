$(function(){
	$("#divPayType input[type=radio]").click(function(){
		$('#divIpsBanks').css('display', 'none');
		$('#divGfbBanks').css('display', 'none');
		$('#divAllinpayBanks').css('display', 'none');
		$('#divTenpayBanks').css('display', 'none');
		if($(this).attr('data') == 'ips'){
			$('#divIpsBanks').css('display', 'block');
		}else if($(this).attr('data') == 'guofubao'){
			$('#divGfbBanks').css('display', 'block');
		}else if($(this).attr('data') == 'allinpay'){
			$('#divAllinpayBanks').css('display', 'block');
		}else if($(this).attr('data') == 'tenpay'){
			$('#divTenpayBanks').css('display', 'block');
		}
		setCurPayType($(this));
		$("#divPayType input:radio[data]").each(function(){
			$(this).parent().find("div.nopatch[data]").removeClass("patch");
		});
		$(this).parent().find("div.nopatch[data]").addClass("patch");
	});
	$("#divPayType div.nopatch[data],#allBanks ol li div.nopatch[data]").on('mouseover', function(){
		$(this).addClass("patch");
	});
	$("#divPayType div.nopatch[data],#allBanks ol li div.nopatch[data]").on('mouseout', function(){
		if(!$(this).parent().find("input[type=radio]").prop("checked"))
			$(this).removeClass("patch");
	});
	$("#divPayType input[type=radio]:first").click();
});

function setLastBank(way, bank){
	if(way == 'gfb'){
		$("#divPayType input:radio[data=guofubao]").click();
		$('#divGfbBanks input:radio[data='+bank+']').click();
		$('#divGfbBanks div.nopatch[data='+bank+']').mouseover();
	}else if(way == 'ips'){
		$("#divPayType input:radio[data=ips]").click();
		$('#divIpsBanks input:radio[data='+bank+']').click();
		$('#divIpsBanks div.nopatch[data='+bank+']').mouseover();
	}else if(way == 'allinpay'){
		$("#divPayType input:radio[data=allinpay]").click();
		$('#divAllinpayBanks input:radio[data='+bank+']').click();
		$('#divAllinpayBanks div.nopatch[data='+bank+']').mouseover();
	}else if(way == 'tenpay'){
		$("#divPayType input:radio[data=tenpay]").click();
		$('#divTenpayBanks input:radio[data='+bank+']').click();
		$('#divTenpayBanks div.nopatch[data='+bank+']').mouseover();
	}
	$("#divPayType input:radio[data],#allBanks ol li div.nopatch[data]").each(function(){
		if($(this).prop("checked"))
			$(this).parent().find("div.nopatch[data]").addClass("patch");
		else
			$(this).parent().find("div.nopatch[data]").removeClass("patch");
	});
}

function checkbank(ctrl,title) {
	var payType = $("#divPayType input[type=radio]:checked").attr('data');
	var divBankArea = "";
	if(payType == 'ips'){
		divBankArea = "#divIpsBanks";
	}else if(payType == 'guofubao'){
		divBankArea = "#divGfbBanks";
	}else if(payType == 'allinpay'){
		divBankArea = "#divAllinpayBanks";
	}else if(payType == 'tenpay'){
		divBankArea = "#divTenpayBanks";
	}
	
    var yh = $(ctrl).attr('yhcode');
    var idleft = $(ctrl).attr('id').split("_")[1];
    var ryh = "r_" + idleft;
    $(divBankArea + " #" + ryh).prop("checked", "checked");
    $("#s_selectbank").attr("src", bankimg+"images/bank/" + yh + "1_b.jpg");
    $("#pd_bank").val($(ctrl).attr('data'));
	var payType = $('#divPayType input:radio:checked').attr('data');
	if(payType == "guofubao"){
		$("#divGfbBanks div.nopatch[data!="+$(ctrl).attr('data')+"]").mouseout();
	}else if(payType == "ips"){
		$("#divIpsBanks div.nopatch[data!="+$(ctrl).attr('data')+"]").mouseout();
	}else if(payType == "allinpay"){
		$("#divAllinpayBanks div.nopatch[data!="+$(ctrl).attr('data')+"]").mouseout();
	}else if(payType == "tenpay"){
		$("#divTenpayBanks div.nopatch[data!="+$(ctrl).attr('data')+"]").mouseout();
	}
	setCurBank($(ctrl),title);
}

function checkPayType(ctrl) {
    var yh = $(ctrl).attr('id').split('_')[1];
    var ryh = "r_" + yh;
    $("#" + ryh).click();
}

function submitform(ctrl) {
    var pd_bank = $("#pd_bank").val();
    var pa_MP = $("#pa_MP").val();
    submitform_gopay(ctrl, pd_bank);
}


function submitform_gopay(ctrl, bankCode) {
    if (BlurMoney()) {
    	var payType = $('#divPayType input:radio:checked').attr('data');
    	//check pay type
    	if(payType == "guofubao"){
    		if($('#divGfbBanks input:radio:checked').size()==0){
    	        $('#d_money').html(GetP("reg_wrong", arrWrong4["d_bank"]));
    			return false;
    		}
    	}else if(payType == "ips"){
    		if($('#divIpsBanks input:radio:checked').size()==0){
    	        $('#d_money').html(GetP("reg_wrong", arrWrong4["d_bank"]));
    			return false;
    		}
    	}else if(payType == "allinpay"){
    		if($('#divAllinpayBanks input:radio:checked').size()==0){
    	        $('#d_money').html(GetP("reg_wrong", arrWrong4["d_bank"]));
    			return false;
    		}
    	}else if(payType == "tenpay"){
    		if($("#tenpayChk").prop("checked") == false && $('#divTenpayBanks input:radio:checked').size()==0){
    	        $('#d_money').html(GetP("reg_wrong", arrWrong4["d_bank"]));
    			return false;
    		}
    	}
    	
        var tranAmt = $("#t_money").val();
        var url = "bankCode=" + bankCode;
        url += "&t_money=" + tranAmt;
		if(1==2&&bankCode=='CCB') window.open("/Pay/ccb?" + url);
		else if(payType=='ips') window.open("/Pay/ips?" + url);
		else if(payType=='chinabank') window.open("/Pay/chinabank?" + url);
		else if(payType=='guofubao') window.open("/Pay/guofubaopay?" + url);
		else if(payType=='allinpay') window.open("/Pay/allinpay?" + url);
		else if(payType=='tenpay'){
			if($("#tenpayChk").prop("checked")){
				url += "&useAccount=1";
			}
			window.open("/Pay/tenpay?" + url);
		}
        //Open_Dialog();
    }
}


function submitform_credit(ctrl) {

    var pd_bank = $("#pd_bank").val();
    var pa_MP = $("#pa_MP").val();

    //gsyh,nyyh,zgyh,jsyh,zsyh,jtyh,ycyh,msyh,gfyh,pfyh,zxyh,xyyh,hxyh
    if (("ips,chinabank,gsyh,zgyh,jsyh,zsyh,jtyh,ycyh,msyh,gfyh,sfzyh,pfyh,gdyh,zxyh,xyyh,payh,bjyh,shyh,zhesyh,nbyh,njyh,hxyh,bhyh,shns").indexOf(pd_bank) >= 0) {
        submitform_gopay(ctrl, pd_bank, pa_MP, 1);
        return;
    }

    submitform_yeepay(ctrl, pd_bank, pa_MP, 1);
}

function submitform_yeepay(ctrl, pd_bank, pa_MP, credit) {
    if (BlurMoney()) {
        var p2_Order = $("#p2_Order").val();
        var p3_Amt = $("#t_money").val();
        var p5_Pid = $("#p5_Pid").val();
        var p6_Pcat = $("#p6_Pcat").val();
        var p7_Pdesc = $("#p7_Pdesc").val();
        var p8_Url = $("#callback").val() + "pay/Callback.html";
        var p9_SAF = $("#p9_SAF").val();

        var url = "?p2_Order=" + p2_Order;
        url += "&p3_Amt=" + p3_Amt;
        url += "&p5_Pid=" + p5_Pid;
        url += "&p6_Pcat=" + p6_Pcat;
        url += "&p7_Pdesc=" + p7_Pdesc;
        url += "&p8_Url=" + p8_Url;
        url += "&p9_SAF=" + p9_SAF;
        url += "&pa_MP=" + pa_MP;
        url += "&pd_bank=" + pd_bank;
        if (credit == 1) url += "&credit=" + credit;
        window.open("/pay/go.html" + url);
        Open_Dialog();

    }
}


function submitform_shengpay(ctrl, bankCode, userId) {


    if (BlurMoney()) {

        var tranAmt = $("#t_money").val();

        var url = "bankCode=" + bankCode;
        url += "&amount=" + tranAmt;
        url += "&userId=" + userId;

        window.open("/pay/shengpay/pay.aspx?" + url);
        Open_Dialog();

    }
}



var arrBox = new Array();
arrBox["d_money"] = "<img style='margin:2px;' src='"+Himg+"images/zhuce1.gif'/>&nbsp;请输入正确的金额，最小充值金额50元。";
var arrWrong = new Array();
arrWrong["d_money"] = "<img style='margin:2px;' src='"+Himg+"images/zhuce2.gif'/>&nbsp请输入正确的金额，小数点后最多2位数。";
var arrWrong1 = new Array();
arrWrong1["d_money"] = "<img style='margin:2px;' src='"+Himg+"images/zhuce2.gif'/>&nbsp;输入的金额不能为空！";
var arrWrong2 = new Array();
arrWrong2["d_money"] = "<img style='margin:2px;' src='"+Himg+"images/zhuce2.gif'/>&nbsp;最低充值金额为50元！";
var arrWrong3 = new Array();
arrWrong3["d_money"] = "<img style='margin:2px;' src='"+Himg+"images/zhuce2.gif'/>&nbsp;充值金额必须大于0元！";
var arrWrong4 = new Array();
arrWrong4["d_bank"] = "<img style='margin:2px;' src='"+Himg+"images/zhuce2.gif'/>&nbsp;请选择银行！";

var arrOk = new Array();
arrOk["d_money"] = "<img style='margin:2px;' src='"+bankimg+"images/zhuce3.gif'/>";

function Init() {
    $('#t_money').click(function() { ClickBox("d_money"); });
    $('#t_money').blur(function() { BlurMoney(); });
}

function BlurMoney() {
    var txt = "#t_money";
    var td = "#d_money";
    var pat = /^[0-9]*(\.[0-9]{1,2})?$/;

    var str = $(txt).val();
    if (str == "") {
        $(td).html(GetP("reg_wrong", arrWrong1["d_money"]));
        return false;
    }
    var m = parseFloat(str);
    if (m <= 0) {
        $(td).html(GetP("reg_wrong", arrWrong3["d_money"]));
        return false;
    }

    //限制50最小金额
    //var m = parseInt(str);
	var m = parseFloat(str);
    //alert(m);
    if (m < 0.1) {
        $(td).html(GetP("reg_wrong", arrWrong2["d_money"]));
        return false;
    }
    if (pat.test(str)) {
        $(td).html(GetP("reg_ok", arrOk["d_money"]));
        return true;
    }
    else {
        $(td).html(GetP("reg_wrong", arrWrong["d_money"]));
        return false;
    }
}

function ClickBox(id) {
    var ele = '#' + id;
    $(ele).html(GetP("reg_info", arrBox[id]));
}
function GetP(clsName, c) {
    return "<span class='" + clsName + "'>" + c + "</span>";
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function Open_Dialog() {
    setTimeout('$("#tiplink").click()', 500); return;
    Init_Back();
    Show_Back();
    Init_Dialog();
    Show_Dialog();

}

function Init_Back() {
    var objDiv = "<div id='myBack' style='position: absolute;z-index: 2000;left: 0;top: 0;bottom: 0;background: black;display: none;opacity: 0.2;filter: progid:DXImageTransform.Microsoft.Alpha(opacity=20);-ms-filter: \"progid:DXImageTransform.Microsoft.Alpha(opacity=20)\" '></div>";
    var objIframe = "<iframe id='myIframe' style='position: absolute;z-index: 1999;left: 0;top: 0;bottom: 0;background: #000000;display: none;opacity: 0.2;filter: progid:DXImageTransform.Microsoft.Alpha(opacity=20);-ms-filter: \"progid:DXImageTransform.Microsoft.Alpha(opacity=20)\"'></iframe>";

    $("body").append(objDiv);
    $("body").append(objIframe);
    $('html').css('overflow', 'hidden');
}

function Show_Back() {
    var st = $(window).scrollTop();
    $("#myIframe").css('width', $(window).width());
    $("#myIframe").css('height', $(window).height() + st);
    $('#myIframe').show();
    $("#myBack").css('width', $(window).width());
    $("#myBack").css('height', $(window).height() + st);
    $('#myBack').show();
}

function Init_Dialog() {
    var Div_Confirm = "";
    Div_Confirm += "<div id='myDialog' style='height:180px;width:400px;border:1px solid #000000;background-color: #f6f6f6;position: absolute;display: none;z-index: 2001; '>";
    Div_Confirm += "<div style='height:30px;line-height:30px;background-color: #c60808;width:400px;color:#ffffff;font-weight: bold;'>安心贷提示：请不要关闭此页面</div>";
    Div_Confirm += "<div style='height:30px;line-height:30px;width:400px;font-weight: bold;text-align:left;'>&nbsp;&nbsp;<img style='height:20px;width:20px;' src='"+Himg+"images/zs1.gif' />&nbsp;&nbsp;您正在登录网上银行充值……</div>";
    Div_Confirm += "<div style='height:30px;line-height:30px;width:400px;font-weight: bold;text-align:left;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请在网上银行充值后选择：</div>";
    Div_Confirm += "<div style='height:60px;line-height:60px;width:400px;text-align:center;'>";
    Div_Confirm += "<input value=' ' onmouseover='this.style.cursor=\"hand\"' type='button' onclick='finish()' style='background-image:url("+Himg+"images/gofinish.jpg); width:96px; height:28px; border:none;float:left;margin-left:50px;margin-top:15px; '  />";
    Div_Confirm += "</div>";
    Div_Confirm += "<div style='height:30px;line-height:30px;width:400px;text-align:left;font-weight: bold;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;充值遇到问题？你可以：&nbsp;&nbsp;<a style='text-decoration:underline; font-weight:normal ; ' href='/account/recharge.html'>重新选择充值银行>></a>&nbsp;&nbsp;<a style='text-decoration:underline; font-weight:normal ; '  href='/service/i_question.html'>查看帮助</a></div>";
    Div_Confirm += "</div>";

    $("body").append(Div_Confirm);
}


function Show_Dialog() {
    setTimeout('$("#tiplink").click()', 500); return;
    var ww = $(window).width(), wh = $(window).height(), st = $(window).scrollTop(), bh = $("body").height();
    var left = ww / 2 - $("#myDialog").width() / 2;
    var top = st + wh / 2 - $("#myDialog").height() / 2;
    $("#myDialog").css('left', left).css('top', top);
    $("#myDialog").show();
}

function finish() {
    window.location.href = "/account/recharge.aspx?t=search";
}

function setCurPayType(curObj){
	var payTypeName = curObj.attr('title');
	var curPayTypeStr = "您当前选择的支付方式为";
	if(payTypeName != '' && payTypeName != undefined)curPayTypeStr += "<span style='color:#91273d;font-weight:bold;font-size:16px'> "+payTypeName;
	if($("#tenpayChk").prop("checked")){
		curPayTypeStr += "账户支付.";
	}
	curPayTypeStr += "</span>";
	$("#curPayType").html(curPayTypeStr);
}
function setCurBank(curObj,title){
	setCurPayType($("#divPayType input[type=radio]:checked"));
	var bankName = "";
	if(curObj.attr("type") == "radio")
		bankName = curObj.parent().parent().find("div.nopatch img").attr("alt");
	else
		bankName = curObj.parent().find("div.nopatch img").attr("alt");
	var curPayTypeStr = $("#curPayType").html();
	if(bankName != '' && bankName != undefined)curPayTypeStr += " ，支付银行为<span style='color:#91273d;font-weight:bold;font-size:16px'> "+title+"</span>";
	$("#curPayType").html(curPayTypeStr);
}