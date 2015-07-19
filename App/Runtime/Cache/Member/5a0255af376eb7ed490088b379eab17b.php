<?php if (!defined('THINK_PATH')) exit();?><table width="758" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th>项目</th>
  <th>金额</th>
  <th>说明</th>
 </tr>
 <tr>
  <td>竞标中投资</td>
  <td><span>￥<?php echo (($mx["invest"]["1"]["investor_capital"])?($mx["invest"]["1"]["investor_capital"]):"0.00"); ?>/<?php echo (($mx["invest"]["1"]["num"])?($mx["invest"]["1"]["num"]):"0"); ?>标</span><a href="javascript:void(0)" onclick="$('#mx2').click();">[列表]</a></td>
  <td>目前正在投标中，尚未确定投资的金额</td>
 </tr>
 <tr>
  <td>回收中投资</td>
  <td><span>￥<?php echo (($mx["invest"]["4"]["investor_capital"])?($mx["invest"]["4"]["investor_capital"]):"0.00"); ?>/<?php echo (($mx["invest"]["4"]["num"])?($mx["invest"]["4"]["num"]):"0"); ?>标</span><a href="javascript:void(0)" onclick="$('#mx3').click();">[列表]</a></td>
  <td>目前已经投资，正在回收中的投资总额</td>
 </tr>
 <tr>
  <td><?php echo ($glo["web_name"]); ?>代偿的投资</td>
  <td><span>￥<?php echo (($dc)?($dc):"0.00"); ?></span></td>
  <td>逾期并由<?php echo ($glo["web_name"]); ?>代偿的投资</td>
 </tr>
</table>