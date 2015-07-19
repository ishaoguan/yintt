<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
.x_member_form{width:750px; overflow:hidden}
.x_member_form .form2{height:350px; overflow:auto;}
.x_member_form .form2 .lineD{overflow:hidden}
.x_member_form .form2 .lineD dt{width:150px; color:#9CB8CC; font-weight:bold}
.x_member_form .form2 .lineD dd{width:200px; float:left; margin-left:0px}
.x_member_form .form2 .lineD dd.xwidth{width:500px;}
.x_member_form .form2 .lineD dt.title{color:#F00}
</style>

<div class="so_main x_member_form">
<div class="page_tit"><?php echo ($user); ?>详细信息</div>
<div class="page_tab"><span data="tab_1" class="active">会员资料</span><span data="tab_3">帐户资金</span><span data="tab_2">借款投资</span></div>
<div class="form2">

	<div id="tab_1">
	
		<dl class="lineD"><dt>用户名：</dt><dd><?php echo ($vo["user_name"]); ?>  <?php echo (getleveico($vo["credits"],2)); ?></dd><dt>认证情况：</dt><dd><?php echo (getverify($vo["id"])); ?></dd></dl>
		<dl class="lineD"><dt>是否冻结：</dt><dd><?php echo ($vo["is_ban"]); ?></dd><dt>客户类型：</dt><dd><?php echo ($vo["user_type"]); ?></dd></dl>
		<dl class="lineD"><dt>所属客服：</dt><dd><?php echo (($vo["customer_name"])?($vo["customer_name"]):"未指定"); ?></dd><dt>真实姓名：</dt><dd><?php echo ($vo["real_name"]); ?></dd></dl>
		<dl class="lineD"><dt>性别：</dt><dd><?php echo ($vo["sex"]); ?></dd><dt>职业：</dt><dd><?php echo ($vo["zy"]); ?></dd></dl>
		<dl class="lineD"><dt>邮箱：</dt><dd><?php echo (($vo["user_email"])?($vo["user_email"]):"未填"); ?></dd><dt>&nbsp;</dt><dd>&nbsp;</dd></dl>
		<dl class="lineD"><dt>手机号码：</dt><dd><?php echo (($vo["user_phone"])?($vo["user_phone"]):"未认证"); ?></dd><dt>年龄：</dt><dd><?php echo ($vo["age"]); ?></dd></dl>
		<dl class="lineD"><dt>婚姻状况：</dt><dd><?php echo ($vo["marry"]); ?></dd><dt>学历：</dt><dd><?php echo ($vo["education"]); ?></dd></dl>
		<dl class="lineD"><dt>身份证号：</dt><dd><?php echo ($vo["idcard"]); ?></dd><dt>月收入：</dt><dd><?php echo ($vo["income"]); ?></dd></dl>
		<dl class="lineD"><dt>银行帐号：</dt><dd><?php echo ($vo["bank_num"]); ?></dd><dt>银行名称：</dt><dd><?php echo ($vo["bank_name"]); ?></dd></dl>
		<dl class="lineD"><dt>银行开户行：</dt><dd class="xwidth"><?php echo ($vo["bank_province"]); echo ($vo["bank_city"]); echo ($vo["bank_address"]); ?></dd></dl>
		<dl class="lineD"><dt>籍贯：</dt><dd class="xwidth"><?php echo ($vo["province"]); echo ($vo["city"]); echo ($vo["area"]); ?></dd></dl>
		<dl class="lineD"><dt>居住地：</dt><dd class="xwidth"><?php echo ($vo["province_now"]); echo ($vo["city_now"]); echo ($vo["area_now"]); ?></dd></dl>
		<dl class="lineD"><dt>个人描述：</dt><dd class="xwidth"><?php echo ($vo["info"]); ?></dd></dl>
		<dl class="lineD"><dt>现居住地址：</dt><dd class="xwidth"><?php echo ($vo["c_address"]); ?></dd></dl>
		<dl class="lineD"><dt>住宅电话：</dt><dd class="xwidth"><?php echo ($vo["c_tel"]); ?></dd></dl>
		<dl class="lineD"><dt>身份证：</dt><dd class="xwidth">
			<?php if(!empty($vo['card_img'])): ?><a href="__ROOT__/<?php echo ($vo["card_img"]); ?>" target="_blank"><img src="__ROOT__/<?php echo ($vo["card_img"]); ?>" height="100px" style="border:solid 1px #ccc;" /></a>&nbsp;<?php endif; ?>
			<?php if(!empty($vo['cardback_img'])): ?><a href="__ROOT__/<?php echo ($vo["cardback_img"]); ?>" target="_blank"><img src="__ROOT__/<?php echo ($vo["cardback_img"]); ?>" height="100px" style="border:solid 1px #ccc;" /></a><?php endif; ?>
			</dd>
		</dl>

	</div><!--tab1-->
	
	<div id="tab_2" style="display:none">
		<dl class="lineD"><dt class="title">借款金额统计</dt><dd class="xwidth">&nbsp;</dd></dl>
		<dl class="lineD"><dt>借款总额：</dt><dd><?php echo (fmoney($capitalinfo["tj"]["jkze"])); ?></dd><dt>负债情况：</dt><dd><?php if($capitalinfo['tj']['fz'] < 0): ?>借出小于借入(<?php echo (fmoney($capitalinfo["tj"]["fz"])); ?>)<?php else: ?>借出大于借入(<?php echo (fmoney($capitalinfo["tj"]["fz"])); ?>)<?php endif; ?></dd></dl>
		<dl class="lineD"><dt>已还总额：</dt><dd><?php echo (fmoney($capitalinfo["tj"]["yhze"])); ?></dd><dt>待还总额：</dt><dd><?php echo (fmoney($capitalinfo["tj"]["dhze"])); ?></dd></dl>
		<dl class="lineD"><dt class="title">借还款次数统计</dt><dd class="xwidth">&nbsp;</dd></dl>
		<dl class="lineD"><dt>借款成功次数：</dt><dd><?php echo (($capitalinfo["tj"]["jkcgcs"])?($capitalinfo["tj"]["jkcgcs"]):0); ?>次</dd><dt>正常还款次数：</dt><dd><?php echo (($capitalinfo["repayment"]["1"]["num"])?($capitalinfo["repayment"]["1"]["num"]):0); ?>次</dd></dl>
		<dl class="lineD"><dt>提前还款次数：</dt><dd><?php echo (($capitalinfo["repayment"]["2"]["num"])?($capitalinfo["repayment"]["2"]["num"]):0); ?>次</dd><dt>逾期还款次数：</dt><dd><?php echo (($capitalinfo["repayment"]["5"]["num"])?($capitalinfo["repayment"]["5"]["num"]):0); ?>次</dd></dl>
		<dl class="lineD"><dt>迟还次数：</dt><dd><?php echo (($capitalinfo["repayment"]["3"]["num"])?($capitalinfo["repayment"]["3"]["num"]):0); ?>次</dd><dt>网站代还次数：</dt><dd><?php echo (($capitalinfo["repayment"]["4"]["num"])?($capitalinfo["repayment"]["4"]["num"]):0); ?>次</dd></dl>
		<dl class="lineD"><dt class="title">投资统计</dt><dd class="xwidth">&nbsp;</dd></dl>
		<dl class="lineD"><dt>投资总额：</dt><dd><?php echo (fmoney($capitalinfo["tj"]["jcze"])); ?></dd><dt>投标奖励：</dt><dd><?php echo (fmoney($capitalinfo["tj"]["tbjl"])); ?></dd></dl>
		<dl class="lineD"><dt>已收总额：</dt><dd><?php echo (fmoney($capitalinfo["tj"]["ysze"])); ?></dd><dt>待收总额：</dt><dd><?php echo (fmoney($capitalinfo["tj"]["dsze"])); ?></dd></dl>
	</div><!--tab3-->
	
	<div id="tab_3" style="display:none">
		<dl class="lineD"><dt class="title">资金情况</dt><dd class="xwidth">&nbsp;</dd></dl>
		<dl class="lineD"><dt>帐户总额：</dt><dd><?php echo (fmoney($vo["money_all"])); ?></dd><dt>待收金额：</dt><dd><?php echo (fmoney($vo["money_collect"])); ?></dd></dl>
		<dl class="lineD"><dt>可用余额：</dt><dd><?php echo (fmoney($vo["account_money"])); ?></dd><dt>冻结金额：</dt><dd><?php echo (fmoney($vo["money_freeze"])); ?></dd></dl>

		<dl class="lineD"><dt class="title">充值提现</dt><dd class="xwidth">&nbsp;</dd></dl>
		<dl class="lineD"><dt>充值成功次数：</dt><dd><?php echo (($wc["C"]["num"])?($wc["C"]["num"]):0); ?>次</dd><dt>充值成功金额：</dt><dd><?php echo (fmoney($wc["C"]["money"])); ?></dd></dl>
		<dl class="lineD"><dt>提现成功次数：</dt><dd><?php echo (($wc["W"]["num"])?($wc["W"]["num"]):0); ?>次</dd><dt>提现成功金额：</dt><dd><?php echo (fmoney($wc["W"]["money"])); ?></dd></dl>

		<dl class="lineD"><dt class="title">额度情况</dt><dd class="xwidth">&nbsp;</dd></dl>
		<dl class="lineD"><dt>借款信用额度：</dt><dd><?php echo (fmoney($vo["credit_limit"])); ?></dd><dt>可用信用额度：</dt><dd><?php echo (fmoney($vo["credit_cuse"])); ?></dd></dl>
		<dl class="lineD"><dt>借款担保总额：</dt><dd><?php echo (fmoney($vo["borrow_vouch_limit"])); ?></dd><dt>可用借款担保额度：</dt><dd><?php echo (fmoney($vo["borrow_vouch_cuse"])); ?></dd></dl>
		<dl class="lineD"><dt>投资担保总额：</dt><dd><?php echo (fmoney($vo["invest_vouch_limit"])); ?></dd><dt>可用投资担保额度：</dt><dd><?php echo (fmoney($vo["invest_vouch_cuse"])); ?></dd></dl>
	</div><!--tab3-->

	<div class="page_btm">
	  <input type="submit" class="btn_b" value="关闭" onclick="closeui();" />
	</div>
</div>

</div>
<script type="text/javascript">
function closeui(){
	ui.box.close();
}
</script>
<script type="text/javascript" src="__ROOT__/Style/A/js/adminbase.js"></script>