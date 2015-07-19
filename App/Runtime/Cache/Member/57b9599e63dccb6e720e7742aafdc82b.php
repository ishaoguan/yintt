<?php if (!defined('THINK_PATH')) exit();?><div class="u12_clew">
	<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
	尊敬的<?php echo ($glo["web_name"]); ?>会员，您当前积分为<strong style="font-size:14px;">&nbsp;<?php echo ($mem["scores"]); ?>&nbsp;</strong>，以下是您在<?php echo ($glo["web_name"]); ?>的积分记录！ </p>
</div>
<div class="u12_clew">
	<p><?php if(!isset($_GET['start_time'])){ ?>截止<span class="fontred"><?php echo date("Y-m-d H:i:s",time()); ?></span><?php }else{ ?>从<span class="fontred"><?php echo date("Y-m-d",$_GET['start_time']); ?></span>到<span class="fontred"><?php echo date("Y-m-d",$_GET['end_time']); ?></span>期间<?php } ?>
	您的积分变化值为：<span class="fontred"> <?php echo (($scores_change)?($scores_change):"0"); ?></span>。</p>
</div>
<div class="us_rb4_search">
 <h6>时间从：</h6>
 <input type="text" id="start_time" value="<?php if($search['start_time']){echo date('Y-m-d',$search['start_time']);} ?>" readonly="readonly" class="date_text" onFocus="WdatePicker({maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})"/>
 <p>至</p><input type="text" value="<?php if($search['end_time']){echo date('Y-m-d',$search['end_time']);} ?>" id="end_time" readonly="readonly" class="date_text" onFocus="WdatePicker({minDate:'#F{$dp.$D(\'start_time\')||\'2020-10-01\'}'})"/>
 <input type="button" class="us_seaBut" value="查&nbsp;看" onclick="getBind()" />
</div>
<table width="758" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th nowrap="nowrap">变化积分</th>
  <th nowrap="nowrap">变化后积分</th>
  <th nowrap="nowrap">变化时间</th>
  <th nowrap="nowrap">积分类型</th>
  <th nowrap="nowrap">说明</th>
 </tr>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td><?php echo ($vo["affect_scores"]); ?></td>
	<td><?php echo ($vo["account_scores"]); ?></td>
	<td><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></td>
	<td><?php echo ($vo["type_name"]); ?></td>
	<td><?php echo ($vo["info"]); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div data="fragment-1" id="pager" style="float: right; text-align: right; width: 500px; padding-right: 8px;margin-right: 24px;" class="yahoo2 ajaxpagebar"><?php echo ($pagebar); ?></div>
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
	if($("#start_time").val()!="" && $("#end_time").val() == ""){
		$.jBox.tip('请选择结束时间！');
		return;
	}
	if($("#start_time").val()=="" && $("#end_time").val() != ""){
		$.jBox.tip('请选择开始时间！');
		return;
	}
	x = makevar(['start_time','end_time']);
	$.jBox.tip(AJAX_TIPS, 'loading', {timeout:AJAX_TIMEOUT});
	$.ajax({
		url: "__URL__/scores",
		data: x,
		timeout: 5000,
		cache: false,
		type: "get",
		dataType: "json",
		success: function (d, s, r) {
			$.jBox.tip("", 'loading', {timeout:1});
			if(d) $("#fragment-1").html(d.html);//更新客户端竞拍信息 作个判断，避免报错
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