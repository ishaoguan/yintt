<?php if (!defined('THINK_PATH')) exit();?><table width="758" border="0" cellspacing="0" cellpadding="0" id="listTable">
 <tr>
  <th nowrap="nowrap">&nbsp;</th>
  <th nowrap="nowrap"><img src="__ROOT__/Style/M/images/xf1.jpg"></th>
  <th nowrap="nowrap">发件人</th>
  <th nowrap="nowrap">主题</th>
  <th nowrap="nowrap">时间</th>
 </tr>
 <tr>
 	<td colspan="5">未读<span id="spSysMsgCountUn"><?php echo ($unread); ?></span>封，已读<span id="spSysMsgCountRead"><?php echo ($read); ?></span>封，共<span id="spSysMsgCountTotal"><?php echo ($count); ?></span>封</td>
 </tr>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td><input class="selectone" type="checkbox" name="checkbox_msg" id="msg_<?php echo ($vo["id"]); ?>" onclick="checkon(this)" value="<?php echo ($vo["id"]); ?>"></td>
	<td><img src="__ROOT__/Style/M/images/<?php if($vo["status"] == 1): ?>read.jpg<?php else: ?>unread.jpg<?php endif; ?>"></td>
	<td><?php echo ($glo["web_name"]); ?></td>
	<td class="read subject" data="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></td>
	<td><?php echo (date("Y-m-d",$vo["send_time"])); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
 <tr>
  <th colspan="5">
  	<input class="selectall" id="selectall" type="checkbox" onclick="ckall();">
  	<label for="selectall" style="margin: 0px 8px 0px 0px;">全选</label>
	<input value="删除" id="deletebtn1" onclick="delmsg();" class="u12_but1" type="button">
	<input value="已读" id="allreadbtn1" onclick="readmsg();" class="u12_but1" type="button">
  </th>
 </tr>
</table>
<div data="fragment-1" class="yahoo2 ajaxpagebar" style="width: 550px; float: right; margin: 0px; padding: 0px;text-align: right; margin-right: 29px;"><?php echo ($pagebar); ?></div>
<script type="text/javascript">
var readimg = "__ROOT__/Style/M/images/read.jpg";
$(".read").click(function(){
	id = $(this).attr('data');
	$.jBox("get:__URL__/viewmsg/?id="+id, {
		title: "查看信息",
		width: "auto",
		buttons: {'阅读完毕': true }
	});
});

function ckall(){
	if($("#selectall").prop("checked")){
		$('input[name="checkbox_msg"]').prop("checked",true);
	}else{
		$('input[name="checkbox_msg"]').prop("checked",false);
	}
	}
function getChecked(id) {
	var gids = new Array();
	$.each($("#listTable").find('input.selectone:checked'), function(i, n){
		if($(n).val()!=0) gids.push( $(n).val() );
	});
	return gids;
}

function delmsg(id,type){
	aid = getChecked(id);
	aid = aid.toString();
	if(aid==""){
		$.jBox.tip("请先选择要删除的站内信");	
		return;
	}
	var datas = {'idarr':aid,'type':type};
	$.post("__URL__/delmsg", datas, delResponse,'json');
}

function delResponse(res){
	if(res.status == '0') {
		$.jBox.tip("删除失败");
	}else {
		aid = res.data.split(',');
		$.each(aid, function(i,n){
			$('#msg_'+n).remove();
		});
		$.jBox.tip("删除成功");
		setTimeout(function(){window.location.reload();},1000);
	}
}	
function readmsg(id,type){
	aid = getChecked(id);
	aid = aid.toString();
	if(aid==""){
		$.jBox.tip("请先选择要标记已读的站内信");
		return;
	}
	var datas = {'idarr':aid,'type':type};
	$.post("__URL__/readall",datas,readResponse,'json');
}

function readResponse(res){
	if(res.status == '0'){
		$.jBox.tip("设置已读失败");
	}else{
		$.jBox.tip("设置已读成功");
		setTimeout(function(){window.location.reload();},1000);
	}
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