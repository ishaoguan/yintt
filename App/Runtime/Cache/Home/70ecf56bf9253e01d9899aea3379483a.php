<?php if (!defined('THINK_PATH')) exit();?>   <div id="oper">
    
    <h1><span>您即将投资项目：</span><?php echo ($vo["borrow_name"]); ?></h1>
    <h6>该项目的<samp>投资金额：</samp><span><?php echo (fmoney($vo["borrow_money"])); ?></span><strong>元</strong></h6>
    <ol>
     <li><div id="sh_boxr"><a href="javascript:void(0)"><img src="<?php echo (get_avatar($minfo["uid"])); ?>" width="80" height="80" alt="" /></a><p><a href="#nogo"><?php echo ($vo["uname"]); ?></a><?php echo ($minfo["location"]); ?></p><input type="button" class="se_but" /></div></li>
     <li>借款利率: <?php echo ($vo["borrow_interest_rate"]); ?>%/<?php if($vo["repayment_type"] == 1): ?>天<?php else: ?>年<?php endif; ?></li>
     <li>已经完成：<?php echo ($vo["progress"]); ?>%</li>
     <li>借款用途：<?php echo ($Bconfig['BORROW_USE'][$vo['borrow_use']]); ?></li>
     <li>借款期限: <?php echo ($vo["borrow_duration"]); if($vo["repayment_type"] == 1): ?>天<?php else: ?>个月<?php endif; ?></li>
     <li>还款方式: <?php echo ($Bconfig['REPAYMENT_TYPE'][$vo['repayment_type']]); ?></li>
    </ol>
    
<FORM method="post" name="investForm" id="investForm" action="__URL__/investmoney">
<input type="hidden" name="borrow_id" id="borrow_id" value="<?php echo ($vo["id"]); ?>" />
<input type="hidden" name="cookieKey" id="cookieKey" value="<?php echo ($cookieKey); ?>" />
    <div id="oper_con_box">
     <div id="oper_con">
      <ul>
       <li><p>进度：</p><div class="rate"><div class="rate_s" style="width:<?php echo ($vo["progress"]); ?>%"></div><span><?php echo ($vo["progress"]); ?>%</span></div></li>
       <li><p>还需借款：<samp><?php echo (fmoney($vo["need"])); ?></samp>元</p></li>
       <li class="epis">最少投标金额：<?php echo (fmoney($vo["borrow_min"])); ?>元；&nbsp;&nbsp;最多投标金额：<?php echo (($vo["borrow_max"])?($vo["borrow_max"]):"无限制"); if($vo["borrow_max"] != 0): ?>元<?php endif; ?></li>
       <li><h5>您的可用余额：<samp><?php echo (($account_money)?($account_money):0.00); ?></samp>元<a href="__APP__/member/charge#fragment-1">我要充值</a></h5></li>
       <li><h4>投标金额：</h4><input type="text" class="oper_text1" id="invest_money" name="money" onkeyup="value=value.replace(/[^0-9]/g,'')" /><h4>元</h4></li>
       <li><h4>支付密码：</h4><?php if($has_pin == 'yes'): ?><input type="password" class="oper_text2" id="pin" name="pin" /><a href="__APP__/member/user#fragment-3">忘记支付密码？</a><?php else: ?>
		<A href="__APP__/member/user#fragment-3" target="_blank"><FONT color="#ff0000">请先设一个支付交易密码</FONT></A><?php endif; ?></li>
		<?php if(!empty($vo['password'])): ?><li><li><h4>定向标密码:</h4><input type="password" class="oper_text2" id="borrow_pass" name="borrow_pass" /></li><?php endif; ?>
       <li><h4>&nbsp;</h4><input type="button" class="oper_but" value="确认投资" onclick="PostData()" /><p class="p_int">点击确认表示您将投标金额并同意支付,同一用户对同一个标限投5次</p></li>
      </ul>
     </div>
     <div id="oper_con_bk"></div>
    </div>
</FORM>
    
  </div>
<script type="text/javascript">
borrow_min = <?php echo (($vo["borrow_min"])?($vo["borrow_min"]):0); ?>;
borrow_max = <?php echo (($vo["borrow_max"])?($vo["borrow_max"]):0); ?>;
</script>