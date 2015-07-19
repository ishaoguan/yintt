<?php if (!defined('THINK_PATH')) exit();?><table class="tdBorder" border=0 cellSpacing=0 >
            <THEAD>
              <tr>
                <td align="center" width="100">用户头像</td>
                <td align="center">评论内容</td>
                <td align="center" width="180px">评论时间</td>
              </tr>
            </THEAD>
<?php if(is_array($commentlist)): $i = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl><tr><td><dt><div class="dv_l_4_1"><img style="margin: 10px; width: 80px; height: 80px;" src="<?php echo (get_avatar($vc["uid"])); ?>" /></div><center><?php echo ($vo["uname"]); ?></center></dt></td><td><dt class="neirong"><?php echo ($vo["comment"]); ?></dt></td><td><dt class="shijian"><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></dt></td><tr></dl>

	<?php if($vo["deail_time"] > '0'): ?><div>
		<div style=" width:15px; height:15px; display:block; float:left; margin-left:12px; *margin-left:8px; margin-right:3px; "><img style="vertical-align:bottom;margin-top:2px;" src="__ROOT__/Style/H/images/minilogo.jpg"></div> 
		<div class="commentadmin"> 借款者的回复：<?php echo ($vo["deal_info"]); ?>         
		<div style="color:#999;"><?php echo (date($vo["deal_time"],"Y-m-d H:i:s")); ?></div>
	</div><?php endif; endforeach; endif; else: echo "" ;endif; ?></table>
<div class="page ajaxpagebar" data="scomment" style="margin-left:10px"><?php echo ($commentpagebar); ?></div>
<script type="text/javascript">bindpage()</script>