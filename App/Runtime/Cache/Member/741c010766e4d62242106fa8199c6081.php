<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" type="text/css" href="__ROOT__/Style/M/css/idcard.css?<?php echo C('APP_RES_VER');?>" />
<?php if($id_status == '1'): ?><div class="us_rb4">
	<div class="u12_clew">
		<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
		您已通过身份认证</p>
	</div>
</div>
<?php elseif($id_status == '3'): ?>
<div class="us_rb4">
	<div class="u12_clew">
		<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
		你提交的身份认证正在审核中</p>
	</div>
</div>
<?php else: ?>
<div class="us_rb12">
  
   <div class="u12_clew"><p>您必须填写您的真实姓名和身份证号码，虚假的身份信息，是不能通过验证的。</p></div>
   <ul>
    
    <li><p><span>*</span>身份证正面：</p><input id="imgfile" class="u12_tex1" name="imgfile" type="file" style="" onchange="ajaxFileUploads();" />
    <span id="idimg"></span>
    <a href="__ROOT__/Style/M/images/pic06.jpg" class="link_bluel" target="_blank">查看样例</a></li>
    <li id="dv_idImg6" <?php if(empty($cardinfo['card_img'])): ?>style="display:none"<?php endif; ?>><p>&nbsp;</p>
    <?php if(empty($cardinfo['card_img'])): ?><img src="__ROOT__/Style/M/images/ba_default.jpg" width="120" height="100">
    <?php else: ?><img src="__ROOT__/<?php echo ($cardinfo["card_img"]); ?>" width="120" height="100">&nbsp;<a href="javascript:void(0);" action="cancel" style="display:none;">撤销</a> <a href="__ROOT__/<?php echo ($cardinfo["card_img"]); ?>" title="身份证正面" for="idcard1">点击查看大图</a><?php endif; ?>
    </li>
    <li><p><span>*</span>身份证背面：</p><input id="imgfile1" class="u12_tex1" name="imgfile1" type="file" style="" onchange="ajaxFileUploads1();">
    <span id="idimg1"></span>
    <a href="__ROOT__/Style/M/images/pic0601.jpg" class="link_bluel" target="_blank">查看样例</a></li>
    <li id="dv_idImg61" <?php if(empty($cardinfo['cardback_img'])): ?>style="display:none"<?php endif; ?>><p>&nbsp;</p>
    <?php if(empty($cardinfo['cardback_img'])): ?><img src="__ROOT__/Style/M/images/ba_default.jpg" width="120" height="100">
    <?php else: ?><img src="__ROOT__/<?php echo ($cardinfo["cardback_img"]); ?>" width="120" height="100">&nbsp;<a href="javascript:void(0);" action="cancel" style="display:none;">撤销</a> <a href="__ROOT__/<?php echo ($cardinfo["cardback_img"]); ?>" title="身份证正面" for="idcard2">点击查看大图</a><?php endif; ?>
    </li>
    <li><p><span>*</span>真实姓名：</p><input type="text" id="realname" class="u12_tex1" /><span style="color:red; font-size:12px;" id="realnameErr"></span></li>
       <li><p><span>*</span>身份证号：</p><input type="text" onkeyup="value=this.value.replace(/[^0-9|x|X]+/g,"")" maxlength="18" class="u12_tex1" id="idcard"><span style="color:red; font-size:12px;" id="idcardErr"></span></li>
    <li>1、若您需要上传的身份证正反面图片没有合成在一起，请在身份证正反面浏览框处分别上传，若您的身份证正反面已经合成在一张图片上只需在身份证正面的浏览框处上传即可</li>
  
    <li><p>&nbsp;</p><input type="button" class="u12_but2" value="提交完成" onclick="setIdCard();" /></li>
   </ul>
  </div><?php endif; ?>
<link rel="stylesheet" type="text/css" href="__ROOT__/Style/fancybox/jquery.fancybox-2.1.4.css" media="screen" />
<script type="text/javascript" src="__ROOT__/Style/fancybox/jquery.fancybox-2.1.4.js"></script>
<script type="text/javascript">
//$(document).ready(function() {
	$("a[for=idcard1],a[for=idcard2]").fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		prevEffect : 'none',
		nextEffect : 'none',
		closeBtn  : true,
		afterLoad		: function() {
			this.title = '图片 ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
		}
	});
	$("a[action=cancel]").on("click",function(){
		$(this).parent().parent().css("display","none");
	});
//});
</script>