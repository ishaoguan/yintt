<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
.kfbox{padding:10px; margin-left:-20px}
.kfbox dl{float:left; margin-left:10px;}
.kfbox dt{text-align:center}
.kfbox dd{position:relative}
.kfbox dd span{position:absolute; bottom:0px; right:0px}
.kfbox dd .he{cursor:pointer}
</style>
<div class="tip">共有<font color="#000000"><?php echo ($count); ?></font>名客服人员供您选择(点击会员头像选中)</div>
<div class="kfbox">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
            <dd><img class="he" data="<?php echo ($vo["id"]); ?>" src="<?php echo (get_avatar($vo["id"]+10000000)); ?>" height="100" /></dd>
            <dt><?php echo ($vo["real_name"]); ?></dt>
        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
    <input type="hidden" id="kfid" value="" />
</div>
<script type="text/javascript">
var imgsrcKF = '<span><img src="__ROOT__/Style/H/images/pic21.gif" /></span>';
$('.kfbox > dl > dd > img').click(function(){
		$('.kfbox > dl > dd > span').remove();
		$(imgsrcKF).appendTo($(this).parent());
		$("#kfid").val($(this).attr('data'));
	});
</script>