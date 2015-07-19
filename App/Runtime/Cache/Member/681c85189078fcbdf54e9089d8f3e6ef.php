<?php if (!defined('THINK_PATH')) exit();?><div class="us_rb4">
	<div class="u12_clew">
		<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
		尊敬的<?php echo ($glo["web_name"]); ?>会员，以下是您在<?php echo ($glo["web_name"]); ?>的充值记录，敬请审阅！ </p>
	</div>
	<div class="u12_clew">
		<p><?php if(!isset($_GET['start_time'])){ ?>截止<span class="fontred"><?php echo date("Y-m-d H:i:s",time()); ?></span><?php }else{ ?>从<span class="fontred"><?php echo date("Y-m-d",$_GET['start_time']); ?></span>到<span class="fontred"><?php echo date("Y-m-d",$_GET['end_time']); ?></span>期间<?php } ?>
	您的充值成功金额是：<span class="fontred"> ￥<?php echo (($success_money)?($success_money):"0.00"); ?></span>，充值失败金额是：<span class="fontred"> ￥<?php echo (($fail_money)?($fail_money):"0.00"); ?></span>。 </p>
	</div>
	<div class="us_rb4_search">
	 <h6>时间从：</h6>
	 <input type="text" id="start_time" value="<?php if($search['start_time']){echo date('Y-m-d',$search['start_time']);} ?>" readonly="readonly" class="date_text" onFocus="WdatePicker({maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})"/>
	 <p>至</p><input type="text" value="<?php if($search['end_time']){echo date('Y-m-d',$search['end_time']);} ?>" id="end_time" readonly="readonly" class="date_text" onFocus="WdatePicker({minDate:'#F{$dp.$D(\'start_time\')||\'2020-10-01\'}'})"/>
	 <h6>金额从：</h6>
	 <input type="text" class="input_text" onblur="NumberCheck(this)" id="moneyBegin"><p>至</p><input type="text" onblur="NumberCheck(this)" class="input_text" id="moneyEnd">
	 <input type="button" class="us_seaBut" value="查&nbsp;看" onclick="getBind()" />
	</div>
	<table width="758" border="0" cellspacing="0" cellpadding="0">
	 <tr>
	  <th nowrap="nowrap">编号</th>
	  <th nowrap="nowrap">充值时间</th>
	  <th nowrap="nowrap">充值金额</th>
	  <th nowrap="nowrap">充值状态</th>
	  <th nowrap="nowrap">支付平台</th>
	 </tr>
	 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<td><?php echo ($vo["id"]); ?></td>
		<td><?php echo (date("Y-m-d H:i",$vo["add_time"])); ?></td>
		<td><?php echo ($vo["money"]); ?></td>
		<td><?php echo ($vo["status"]); ?></td>
		<td><?php echo ($vo["way_name"]); ?></td>
	  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<div data="fragment-2" id="pager" style="float: right; text-align: right; width: 500px; padding-right: 8px;margin-right: 24px;" class="yahoo2 ajaxpagebar"><?php echo ($pagebar); ?></div>
</div>
<script type="text/javascript">
//返回数字
function NumberCheck(t){
	var num = t.value;
	var re=/^\d+\.?\d*$/;
	if(!re.test(num)){
		isNaN(parseFloat(num))?t.value=0:t.value=parseFloat(num);
	}
}

function getBind(){
	
	x = makevar(['moneyBegin','moneyEnd','start_time','end_time']);
	$.ajax({
		url: "__URL__/chargelog",
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