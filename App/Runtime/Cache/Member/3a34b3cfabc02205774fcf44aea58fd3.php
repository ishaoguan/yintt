<?php if (!defined('THINK_PATH')) exit();?>
<div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	尊敬的<?php echo ($glo["web_name"]); ?>用户，<?php echo ($glo["web_name"]); ?>为您记录和保存了您的资金历史明细.(<!--明细中事件的"类型"如为<奖励类型>则"余额"指奖励帐户余额-->'可用余额','冻结金额','待收金额',都是指此次事件后相应的帐户余额)</p>
</div>
<div class="u12_clew">
	<p>资金历史记录了您各种交易产生的支出和收入的明细，请选择事件类型和时间，然后点击“查看”按钮浏览。</p>
</div>
<div class="u9_search">
 <ol>
  <li><p>事件类型：</p></li>
  <li><div class="sel_border"><div class="selNr"><select name="log_type" id="log_type"   class="c_select sel"><option value="">--请选择--</option><?php foreach($log_type as $key=>$v){ if($search["log_type"]==$key && $search["log_type"]!=""){ ?><option value="<?php echo ($key); ?>" selected="selected"><?php echo ($v); ?></option><?php }else{ ?><option value="<?php echo ($key); ?>"><?php echo ($v); ?></option><?php }} ?></select><span id="tip_log_type" class="tip">*</span></div></div></li>
  <li><p>起止日期：</p></li>
  <li><input type="text" style="background-position:87px 4px;" id="start_time" value="<?php if($search['start_time']){echo date('Y-m-d',$search['start_time']);} ?>" readonly="readonly" class="u9s_text" onFocus="WdatePicker({maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})"/></li>
  <li>至</li>
  <li><input type="text" style="background-position:87px 4px;" value="<?php if($search['end_time']){echo date('Y-m-d',$search['end_time']);} ?>" id="end_time" readonly="readonly" class="u9s_text" onFocus="WdatePicker({minDate:'#F{$dp.$D(\'start_time\')||\'2020-10-01\'}'})"/></li>
  <li><input type="button" class="u9s_But" value="查&nbsp;看" onclick="sdetail()" /></li>
 </ol>
 <input type="button" class="excel" value="Excel下载" onclick="window.location.href='__URL__/export?<?php echo ($query); ?>'" />
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th nowrap="nowrap">发生日期</th>
  <th nowrap="nowrap">类型</th>
  <th nowrap="nowrap">影响金额</th>
  <th nowrap="nowrap">可用余额</th>
  <th nowrap="nowrap">冻结金额</th>
  <th nowrap="nowrap">待收金额</th>
  <th nowrap="nowrap">说明</th>
 </tr>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td><?php echo (date("Y-m-d H:i",$vo["add_time"])); ?></td>
	<td><?php echo ($vo["type"]); ?></td>
	<td><?php if($vo["affect_money"] < 0): ?><font color="#FF0000"><?php else: ?><font color="#009900"><?php endif; echo ($vo["affect_money"]); ?></font></td>
	<td><?php echo ($vo["account_money"]); ?></td>
	<td><?php echo ($vo["freeze_money"]); ?></td>
	<td><?php echo ($vo["collect_money"]); ?></td>
	<td><?php echo ($vo["info"]); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div data="fragment-2" id="pager" style="float: right; text-align: right; width: 500px; padding-right: 8px;margin-right: 24px;" class="yahoo2 ajaxpagebar"><?php echo ($pagebar); ?></div>

<script type="text/javascript">
//返回数字
function NumberCheck(t){
	var num = t.value;
	var re=/^\d+\.?\d*$/;
	if(!re.test(num)){
		isNaN(parseFloat(num))?t.value=0:t.value=parseFloat(num);
	}
}

function sdetail(){
	if($("#start_time").val()!="" && $("#end_time").val() == ""){
		$.jBox.tip('请选择结束时间！');
		return;
	}
	if($("#start_time").val()=="" && $("#end_time").val() != ""){
		$.jBox.tip('请选择开始时间！');
		return;
	}
	x = makevar(['log_type','start_time','end_time']);
	$.jBox.tip(AJAX_TIPS, 'loading', {timeout:AJAX_TIMEOUT});
	$.ajax({
		url: "__URL__/detail",
		data: x,
		timeout: 5000,
		cache: false,
		type: "get",
		dataType: "json",
		success: function (d, s, r) {
			$.jBox.tip("", 'loading', {timeout:1});
			if(d) $("#fragment-2").html(d.html);//更新客户端竞拍信息 作个判断，避免报错
		}
	});
}

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