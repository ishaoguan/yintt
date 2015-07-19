<?php if (!defined('THINK_PATH')) exit();?><div class="us_rb4">
<div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	尊敬的<?php echo ($glo["web_name"]); ?>会员，以下是您在<?php echo ($glo["web_name"]); ?>的奖金记录，敬请审阅！ </p>
</div>
<div class="u12_clew">
	<p>截止<span class="fontred"><?php echo date("Y-m-d H:i:s",time()); ?>
	</span>您目前的奖金余额是：<span class="fontred"> ￥<?php echo (($CR)?($CR):0.00); ?></span>，您历史上累计获得奖金总额是：<span class="fontred"> ￥<?php echo (($totalR)?($totalR):0.00); ?></span>。 </p>
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th nowrap="nowrap">编号</th>
  <th nowrap="nowrap">发生日期</th>
  <th nowrap="nowrap">影响金额</th>
  <th nowrap="nowrap">可用余额</th>
  <th nowrap="nowrap">余额变动事由</th>
 </tr>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td><?php echo ($vo["id"]); ?></td>
	<td><?php echo (date("Y-m-d H:i",$vo["add_time"])); ?></td>
	<td><?php echo ($vo["affect_money"]); ?></td>
	<td><?php echo ($vo["account_money"]); ?></td>
	<td><?php echo ($vo["info"]); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div data="fragment-2" id="pager" style="float: right; text-align: right; width: 500px; padding-right: 8px;margin-right: 24px;" class="yahoo2 ajaxpagebar"><?php echo ($pagebar); ?></div>
</div>
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