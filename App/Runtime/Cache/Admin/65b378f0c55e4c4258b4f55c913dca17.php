<?php if (!defined('THINK_PATH')) exit();?>
<div class="so_main">

<div class="page_tit">调整余额</div>
<div class="form2">
	<form method="post" action="__URL__/doMoneyEdit" onsubmit="return subcheck();" name="submitform">
	<input type="hidden" name="id" value="<?php echo ($id); ?>" />
	<input type="hidden" name="token" value="<?php echo ($token); ?>" />
    
	<div id="tab_1">
	
	<dl class="lineD"><dt>可用余额：</dt><dd><input name="account_money" id="account_money"  class="input" type="text" value="" ><span id="tip_account_money" class="tip">如果是减少余额，请填负数，如'-1000'</span></dd></dl>
	<dl class="lineD"><dt>冻结金额：</dt><dd><input name="money_freeze" id="money_freeze"  class="input" type="text" value="" ><span id="tip_money_freeze" class="tip">如果是减少余额，请填负数，如'-1000'</span></dd></dl>
	<dl class="lineD"><dt>待收金额：</dt><dd><input name="money_collect" id="money_collect"  class="input" type="text" value="" ><span id="tip_money_collect" class="tip">如果是减少余额，请填负数，如'-1000'</span></dd></dl>
	<dl class="lineD"><dt>变动原因：</dt><dd><input name="info" id="info"  class="input" type="text" value="" ><span id="tip_info" class="tip">*</span></dd></dl>
	
	</div><!--tab1-->
	
	<div class="page_btm">
	  <input name="按钮" type="button" class="btn_b" onClick="javascript:check();" value="确定"  />
	</div>
	</form>
</div>

</div>

<script language="JavaScript">
  var submitcount = 0;
  function check()
   {
		if(submitcount == 0)
		 {
			 submitcount++;
			  document.submitform.submit();
		 }
		 else
		  {
				 alert("正在操作，请不要重复提交");
				 return false;
		  }					   
 }
 </script>