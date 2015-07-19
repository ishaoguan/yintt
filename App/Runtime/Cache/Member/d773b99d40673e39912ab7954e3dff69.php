<?php if (!defined('THINK_PATH')) exit();?><div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	尊敬的<?php echo ($glo["web_name"]); ?>用户，<?php echo ($glo["web_name"]); ?>为您记录和保存了您的提现记录，敬请审阅</p>
</div>
<div class="us_rb4_search">
 <h6>时间从：</h6>
 <input type="text" class="date_text" id="start_time" value="<?php if($search['start_time']){echo date('Y-m-d',$search['start_time']);} ?>" readonly="readonly" onFocus="WdatePicker({maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})"/><p>至</p>
 <input type="text" class="date_text" id="end_time" value="<?php if($search['end_time']){echo date('Y-m-d',$search['end_time']);} ?>" readonly="readonly" onFocus="WdatePicker({minDate:'#F{$dp.$D(\'start_time\')||\'2020-10-01\'}'})" />
 <input type="button" class="us_seaBut" value="查&nbsp;看" onclick="getBind()" />
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th nowrap="nowrap">编号</th>
  <th nowrap="nowrap">申请时间</th>
  <th nowrap="nowrap">提现金额</th>
  <th nowrap="nowrap">审核状态</th>
  <th nowrap="nowrap">操作</th>
 </tr>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="back_<?php echo ($vo["id"]); ?>">
	<td><?php echo ($vo["id"]); ?></td>
	<td style="color: rgb(51, 51, 51);"><?php echo (date("Y-m-d H:i",$vo["add_time"])); ?></td>
	<td><?php echo ($vo["withdraw_money"]); ?></td>
	<td><?php echo ($vo["status"]); ?></td>
	<td><?php if($vo["withdraw_status"] == '0'): ?><a href="javascript:;" onclick="cx(<?php echo ($vo["id"]); ?>);">撤消提现</a><?php else: ?>--<?php endif; ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div data="fragment-2" id="pager" style="float: right; text-align: right; width: 500px; padding-right: 8px;margin-right: 24px;" class="yahoo2 ajaxpagebar"><?php echo ($pagebar); ?></div>
<script type="text/javascript">
function cx(id){
	$.jBox.confirm("您确定要撤销该笔提现吗？", ALERT_TIT, function(v, h, f){
		if(v == 'ok'){
			$.ajax({
				url: "__URL__/backwithdraw?id="+id,
				data: {},
				timeout: 5000,
				cache: false,
				type: "get",
				dataType: "json",
				success: function (d, s, r) {
					if(d){
						  if(d.status==1){
								$.jBox.tip('恭喜，撤消成功','success');
								$("#back_"+id).remove();
								ajaxreload($("a[href='#fragment-1']"));
								$("#fragment-1").hide();
							}
						  else  $.jBox.tip('对不起，操作失败','fail');
					}
				}
			});
		}
	});
}
//返回数字
function NumberCheck(t){
	var num = t.value;
	var re=/^\d+\.?\d*$/;
	if(!re.test(num)){
		isNaN(parseFloat(num))?t.value=0:t.value=parseFloat(num);
	}
}

function getBind(){
	
	x = makevar(['start_time','end_time']);
	$.ajax({
		url: "__URL__/withdrawlog",
		data: x,
		timeout: 5000,
		cache: false,
		type: "get",
		dataType: "json",
		success: function (d, s, r) {
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