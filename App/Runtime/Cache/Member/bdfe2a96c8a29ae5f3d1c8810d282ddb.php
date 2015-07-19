<?php if (!defined('THINK_PATH')) exit();?>
<div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	尊敬的<?php echo ($glo["web_name"]); ?>用户，以下是您在<?php echo ($glo["web_name"]); ?>的竞标中投资</p>
</div>
<div class="u12_clew">
	<p>您目前竞标中的投资总额是：<span class="fontred">￥<?php echo (($total)?($total):"0.00"); ?></span>，共<span class="fontred"><?php echo (($num)?($num):"0"); ?></span>笔投标。</p>
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th>借款标号</th>
  <th>标题</th>
  <th>借入人</th>
  <th>投标日期</th>
  <th>借款金额</th>
  <th>年化利率</th>
  <th>借款期限</th>
  <th>我的投资金额</th>
  <th>预期本息</th>
 </tr>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td><?php echo ($vo["borrow_id"]); ?></td>
	<td><a target="_blank" href="<?php echo (getinvesturl($vo["borrow_id"])); ?>" title="<?php echo ($vo["borrow_name"]); ?>"><?php echo (cnsubstr($vo["borrow_name"],10)); ?></a></td>
	<td><?php echo ($vo["borrow_user"]); echo (getleveico($vo["credits"],2)); ?></td>
	<td><?php echo (date("Y-m-d",$vo["add_time"])); ?></td>
	<td><?php echo ($vo["borrow_money"]); ?></td>
	<td><?php echo ($vo["borrow_interest_rate"]); ?>%<?php if($vo["repayment_type"] == 1): ?>/天<?php endif; ?></td>
	<td><?php echo ($vo["borrow_duration"]); if($vo["repayment_type"] == 1): ?>天<?php else: ?>个月<?php endif; ?></td>
	<td><?php echo ($vo["investor_capital"]); ?></td>
	<td><?php echo ($vo['investor_capital'] + $vo['investor_interest']); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div data="fragment-2" id="pager" style="float: right; text-align: right; width: 500px; padding-right: 8px;margin-right: 24px;" class="yahoo2 ajaxpagebar"><?php echo ($pagebar); ?></div>
<script type="text/javascript">
$('.ajaxpagebar a').click(function(){
	try{	
		var geturl = $(this).attr('href');
		var id = $(this).parent().attr('data');
		var x={};
        $.ajax({
            url: geturl,
            data: x,
            timeout: 5000,
            cache: false,
            type: "get",
            dataType: "json",
            success: function (d, s, r) {
              	if(d) $("#"+id).html(d.html);//更新客户端竞拍信息 作个判断，避免报错
            }
        });
	}catch(e){};
	return false;
})
</script>