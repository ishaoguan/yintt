<?php if (!defined('THINK_PATH')) exit();?><div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	尊敬的<?php echo ($glo["web_name"]); ?>用户，以下是您在<?php echo ($glo["web_name"]); ?>的借入总表，敬请仔细审阅 </p>
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th>项目</th>
  <th>金额</th>
  <th>说明</th>
 </tr>
 <tr>
  <td>发标中借入</td>
  <td><span>￥<?php echo (($mx["borrow"]["0"]["money"])?($mx["borrow"]["0"]["money"]):"0.00"); ?>/<?php echo (($mx["borrow"]["0"]["num"])?($mx["borrow"]["0"]["num"]):0); ?>标</span><a href="javascript:void(0)" onclick="$('#mx2').click();">[列表]</a></td>
  <td>目前正在发标中，尚未确定借入的金额</td>
 </tr>
 <tr>
  <td>偿还中借入</td>
  <td><span>￥<?php echo (($mx["borrow"]["6"]["money"])?($mx["borrow"]["6"]["money"]):"0.00"); ?>/<?php echo (($mx["borrow"]["6"]["num"])?($mx["borrow"]["6"]["num"]):0); ?>标</span><a href="javascript:void(0)" onclick="$('#mx3').click();">[列表]</a></td>
  <td>目前已经借入，正在偿还的借款</td>
 </tr>
 <tr>
  <td>还清的借入</td>
  <td><span>￥<?php echo (($mx["borrow"]["7"]["money"])?($mx["borrow"]["7"]["money"]):"0.00"); ?>/<?php echo (($mx["borrow"]["7"]["num"])?($mx["borrow"]["7"]["num"]):0); ?>标</span><a href="javascript:void(0)" onclick="$('#mx8').click();">[列表]</a></td>
  <td>已经成功借入并按时完成还款的借款</td>
 </tr>
 <tr>
  <td>逾期的借入</td>
  <td><span>￥<?php echo (($mx["tj"]["expiredMoney"])?($mx["tj"]["expiredMoney"]):"0.00"); ?>/<?php echo (($mx["tj"]["expiredNum"])?($mx["tj"]["expiredNum"]):0); ?>期</span><a href="javascript:void(0)" onclick="$('#mx4').click();">[列表]</a></td>
  <td>已经借入并逾期未还的</td>
 </tr>
 <tr>
  <td>累计借入金额</td>
  <td><span>￥<?php echo (($mx["tj"]["jkze"])?($mx["tj"]["jkze"]):"0.00"); ?></span></td>
  <td>注册至今，您累计借入的总额</td>
 </tr>
</table>