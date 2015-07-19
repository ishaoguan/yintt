<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">var bankimg = "__ROOT__/Style/M/";</script>
<script type="text/javascript">var Himg = "__ROOT__/Style/H/";</script>
<script  type="text/javascript" src="__ROOT__/Style/M/js/recharge.js?<?php echo C('APP_RES_VER');?>"></script>
<div class="us_rb7">
<div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	请输入充值金额（币种：人民币，单位：元） </p>
</div>
<div class="u12_clew">
	<p>
	温馨提示：最低充值金额50元。充值免手续费！充值资金可用于进行验证、投标、还款等。充值成功后资金会立刻划拨到您的帐户。<br/>
	
	<span style="" id="curPayType"></span></p>
</div>
 <ul>
  <li id="divPayType">
   <p>选择支付方式：</p>
   <ol>
   <?php if($payConfig['tenpay']['enable'] == '1'): ?><li><input type="radio" class="ord" data="tenpay" onclick="" id="r_tenpay" name="payType" title="财付通" /><div class="nopatch" data="tenpay" onclick="checkPayType(this);" title="财付通" id="d_tenpay"><div class="pay1"></div></div></li><?php endif; ?>
   <?php if($payConfig['allinpay']['enable'] == '1'): ?><li><input type="radio" class="ord" data="allinpay" onclick="" id="r_allinpay" name="payType" title="通联支付" /><div class="nopatch" data="allinpay" onclick="checkPayType(this);" title="通联支付" id="d_allinpay"><div class="pay2"></div></div></li><?php endif; ?>
   <?php if($payConfig['ips']['enable'] == '1'): ?><li><input type="radio" class="ord" data="ips" onclick="" id="r_ips" name="payType" title="环迅支付" /><div class="nopatch" data="ips" onclick="checkPayType(this);" title="环迅支付" id="d_ips"><div class="pay3"></div></div></li><?php endif; ?>
   <?php if($payConfig['guofubao']['enable'] == '1'): ?><li><input type="radio" class="ord" data="guofubao" onclick="" id="r_guofubao" name="payType" title="国付宝" /><div class="nopatch" data="guofubao" onclick="checkPayType(this);" title="国付宝" id="d_guofubao"><div class="pay4"><img src="__ROOT__/Style/M/images/bank/guofubao.png" width="98" height="38" /></div></div></li><?php endif; ?>
   <?php if($payConfig['chinabank']['enable'] == '1'): ?><li><input type="radio" class="ord" data="chinabank" onclick="" id="r_chinabank" name="payType" title="网银在线" /><div class="nopatch" data="chinabank" onclick="checkPayType(this);" title="网银在线" id="d_chinabank"><div class="pay5"></div></div></li><?php endif; ?>
   </ol>
  </li>
  <li id="allBanks">
   <p>选择支付银行：</p>
	<?php if($payConfig['tenpay']['enable'] == '1'): ?><ol class="int_ub7" id="divTenpayBanks" style="display:none;">
		<?php if(is_array($tenpaybanks)): $i = 0; $__LIST__ = $tenpaybanks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><input type="radio" class="ord2" onclick="checkbank(this,'<?php echo ($vo[0]); ?>');" data="<?php echo ($key); ?>" id="r_<?php echo ($key); ?>" name="mybank" yhcode="<?php echo ($vo[1]); ?>" /><div class="nopatch" data="<?php echo ($key); ?>" onclick="checkbank(this,'<?php echo ($vo[0]); ?>');" title="<?php echo ($vo[0]); ?>" id="d_<?php echo ($key); ?>" yhcode="<?php echo ($vo[1]); ?>"><img alt="<?php echo ($vo[0]); ?>" src="__ROOT__/Style/M/images/bank/<?php echo ($vo[1]); ?>1.jpg"></div></li><?php endforeach; endif; else: echo "" ;endif; ?>
	   </ol><?php endif; ?>

   <?php if($payConfig['allinpay']['enable'] == '1'): ?><ol class="int_ub7" id="divAllinpayBanks" style="display:none;">
		<?php if(is_array($allinpaybanks)): $i = 0; $__LIST__ = $allinpaybanks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><input type="radio" class="ord2" onclick="checkbank(this,'<?php echo ($vo[0]); ?>');" data="<?php echo ($key); ?>" id="r_<?php echo ($key); ?>" name="mybank" yhcode="<?php echo ($vo[1]); ?>" /><div class="nopatch" data="<?php echo ($key); ?>" onclick="checkbank(this,'<?php echo ($vo[0]); ?>');" title="<?php echo ($vo[0]); ?>" id="d_<?php echo ($key); ?>" yhcode="<?php echo ($vo[1]); ?>"><img alt="<?php echo ($vo[0]); ?>" src="__ROOT__/Style/M/images/bank/<?php echo ($vo[1]); ?>1.jpg"></div></li><?php endforeach; endif; else: echo "" ;endif; ?>
	   </ol><?php endif; ?>
   
   <?php if($payConfig['ips']['enable'] == '1'): ?><ol class="int_ub7" id="divIpsBanks" style="display:none;"></ol><?php endif; ?>
   
	<?php if($payConfig['guofubao']['enable'] == '1'): ?><ol class="int_ub7" id="divGfbBanks" style="display:none;">
		<?php if(is_array($gfbbanks)): $i = 0; $__LIST__ = $gfbbanks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><input type="radio" class="ord2" onclick="checkbank(this,'<?php echo ($vo[0]); ?>');" data="<?php echo ($key); ?>" id="r_<?php echo ($key); ?>" name="mybank" yhcode="<?php echo ($vo[1]); ?>" /><div class="nopatch" data="<?php echo ($key); ?>" onclick="checkbank(this,'<?php echo ($vo[0]); ?>');" title="<?php echo ($vo[0]); ?>" id="d_<?php echo ($key); ?>" yhcode="<?php echo ($vo[1]); ?>"><img alt="<?php echo ($vo[0]); ?>" src="__ROOT__/Style/M/images/bank/<?php echo ($vo[1]); ?>1.jpg"></div></li><?php endforeach; endif; else: echo "" ;endif; ?>
	   </ol><?php endif; ?>
  </li>
  <li>
   <p>充值金额：</p>
   <div class="payBox">
    <input type="text" class="u7pb_text" defval="最低金额为50元" id="t_money" />
    <samp>元</samp>
    <input type="button" class="u7pb_but" value="登陆到网银充值" onclick="submitform(this)" />
    <span class="errLayer" id="d_money"></span>
    <?php if($payConfig['guofubao']['enable'] == '1'): ?><input type="hidden" value="ICBC" id="pd_bank" name="pd_bank"><?php endif; ?>
   </div>
  </li>
 </ul>
 <div>
 	各银行充值限额：（如有调整，请以银行公告为准）<br><br>
 	<img src="/Style/M/images/bank.jpg">
 </div>
</div>
<?php if($payConfig['ips']['enable'] == '1'): ?><script type="text/javascript">
<!--
$(function(){
	$.ajax({
		url: "__ROOT____GROUP__/charge/getIpsBanks/",
		data: null,
		timeout: 5000,
		cache: false,
		type: "post",
		dataType: "json",
		success: function (d, s, r) {
			if(d){
				if(d.status==1){
					$('#divIpsBanks').html(d.html);
					$('#divIpsBanks input[type=radio]:first').click();
					$("#divIpsBanks div.charge6[data]").mouseover(function(){
						this.style.border='solid 1px #FF9933';
						this.style.cursor='pointer';
					});
					$("#divIpsBanks div.charge6[data]").mouseout(function(){
						if($(this).parent().children().find('input:radio').prop("checked") != 'checked')
							this.style.border='none';
					});
					$('#divIpsBanks [imgcode]').click(function(){
					    $(this).parent().children().find('input:radio').click();
						$("#divIpsBanks div.charge6[data!="+$(this).attr('data')+"]").mouseout();
					    $("#s_selectbank").attr("src", bankimg+"images/bank/" + $(this).attr('imgcode') + "1_b.jpg");
					    $("#pd_bank").val($(this).attr('data'));
						setCurBank($(this));
					});
					setLastBank('<?php echo ($pay_way); ?>', '<?php echo ($pay_bank); ?>');
				}else{
					$.jBox.tip(d.message,"tip");
				}
			}
		}
	});
});
//-->
</script><?php endif; ?>
<script type="text/javascript">
<!--
$(function(){
	setLastBank('<?php echo ($pay_way); ?>', '<?php echo ($pay_bank); ?>');
});
$("#t_money").val($("#t_money").attr("defval"));
$("#t_money").focus(function(){
	if($(this).val()==$(this).attr("defval"))$(this).val("");
});
$("#t_money").blur(function(){
	if($(this).val()=="")$(this).val($(this).attr("defval"));
});
//-->
</script>