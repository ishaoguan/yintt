<?php if (!defined('THINK_PATH')) exit();?><div class="us_rb4">
<div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	尊敬的<?php echo ($glo["web_name"]); ?>会员，以下是您在<?php echo ($glo["web_name"]); ?>的奖金记录，敬请审阅！ </p>
</div>
<div class="u12_clew">
	<p>截止<span class="fontred"><?php echo date("Y-m-d H:i:s",time()); ?>
	</span>您成功邀请的会员有： </p>
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th nowrap="nowrap">会员名单</th>
  <th nowrap="nowrap">注册时间</th>
  <th nowrap="nowrap">奖金贡献</th>
 </tr>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td><?php echo ($vo["user_name"]); ?></td>
	<td><?php echo (date("Y-m-d H:i",$vo["reg_time"])); ?></td>
	<td><?php echo (($vo["jiangli"])?($vo["jiangli"]):0); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</div>