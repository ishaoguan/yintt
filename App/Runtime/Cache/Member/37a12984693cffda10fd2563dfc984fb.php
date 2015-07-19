<?php if (!defined('THINK_PATH')) exit();?>
<div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	尊敬的<?php echo ($glo["web_name"]); ?>用户，以下是您在<?php echo ($glo["web_name"]); ?>的逾期投资列表 </p>
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0">
 <tr>
   <th>借款标号</th>
   <th>借款标题</th>
   <th>借入人</th>
   <th>年化利率</th>
   <th>逾期天数</th>
   <th>待收本金</th>
   <th>待收利息</th>
   <th>当前/总(期)</th>
 </tr>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td><?php echo ($vo["borrow_id"]); ?></td>
	<td><a href="<?php echo (getinvesturl($vo["borrow_id"])); ?>" target="_blank"><?php echo ($vo["borrow_name"]); ?></a></td>
	<td><?php echo ($vo["borrow_user"]); ?></td>
	<td><?php echo ($vo["borrow_interest_rate"]); ?>%<?php if($vo["repayment_type"] == 1): ?>/天<?php endif; ?></td>
	<td><?php echo ($vo["breakday"]); ?></td>
	<td><?php echo ($vo["capital"]); ?></td>
	<td><?php echo ($vo["interest"]); ?></td>
	<td><?php echo ($vo["sort_order"]); ?>/<?php echo ($vo["total"]); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div data="fragment-4" id="pager" style="float: right; text-align: right; width: 500px; padding-right: 8px;margin-right: 24px;" class="yahoo2 ajaxpagebar"><?php echo ($pagebar); ?></div>

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