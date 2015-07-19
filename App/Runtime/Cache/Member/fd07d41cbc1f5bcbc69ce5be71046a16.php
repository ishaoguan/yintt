<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="__ROOT__/Style/Js/ajaxfileupload.js"></script>

<div class="us_rb12">
 <ul>
  <li><p><span>*</span>上传文件：</p><input name="uploadFile" id="uploadFile" class="u12_tex1" type="file" />(文件大小2M以内)</li>
  <li><p><span>*</span>文件名称：</p><input class="u12_tex1" type="text" id="filetxt" value="文件名称" /></li>
  <li><p>资料分类：</p><div class="sel_border"><div class="selNr"><select name="data_type" id="data_type"   class="c_select sel"><option value="">--请选择--</option><?php foreach($Bconfig['DATA_TYPE'] as $key=>$v){ if($_X[""]==$key && $_X[""]!=""){ ?><option value="<?php echo ($key); ?>" selected="selected"><?php echo ($v); ?></option><?php }else{ ?><option value="<?php echo ($key); ?>"><?php echo ($v); ?></option><?php }} ?></select></div></div></li>
  <li><p>&nbsp;</p><input type="button" class="u12_but2" value="上传" id="btnUpload" onclick="upfile();" /></li>
 </ul>
<table width="758" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th nowrap="nowrap">文件名</th>
  <th nowrap="nowrap">文件类型</th>
  <th nowrap="nowrap">大小</th>
  <th nowrap="nowrap">资料分类</th>
  <th nowrap="nowrap">审核状态</th>
  <th nowrap="nowrap">操作(说明)</th>
 </tr>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vx): $mod = ($i % 2 );++$i;?><tr>
	<td align="left" title="<?php echo ($vx["data_name"]); ?>"><?php echo (cnsubstr($vx["data_name"],8)); ?></td>
	<td align="center"><?php echo ($vx["ext"]); ?></td>
	<td align="center"><?php echo (setmb($vx["size"])); ?></td>
	<td align="left"><?php echo ($Bconfig['DATA_TYPE'][$vx['type']]); ?></td>
	<td><?php echo ($Bconfig['DATA_STATUS'][$vx['status']]); ?></td>
	<td>
       <?php if($vx["status"] == 0): ?><input id="btndel" value="删除" class="u12_but1" style="float:none" type="button" onclick="delfile(<?php echo ($vx["id"]); ?>);">
       <?php else: ?>
<input title="<?php echo ($vx["deal_info"]); ?>" id="btndel" value=" " style="width: 55px; height: 20px; border: none;background-image: url(__ROOT__/Style/M/images/account/filedelete.jpg);cursor: pointer; border: none;" type="button" onclick="delfile(<?php echo ($vx["id"]); ?>);"><?php endif; ?> | <a href="__ROOT__/<?php echo ($vx["data_url"]); ?>" target="_blank">查看</a>
	</td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</div>
<script type="text/javascript">
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
              	if(d) $("#"+id).html(d.content);//更新客户端竞拍信息 作个判断，避免报错
            }
        });
	}catch(e){};
	return false;
})

function delfile(id){
	if(!confirm("删除后不可恢复，确定要删除吗?")) return;
        $.ajax({
            url: "__URL__/delfile",
            data: {"id":id},
            timeout: 5000,
            cache: false,
            type: "post",
            dataType: "json",
            success: function (d, s, r) {
              	if(d){
					if(d.status==1){
						$.jBox.tip("删除成功",'success');
						$("#xf_"+id).remove();
					}else{
						$.jBox.tip(d.message,'fail');
					}
				}
            }
        });
}

function upfile()
{
	$("#loading_makeclub").ajaxStart(function(){	$(this).css("visibility","visible");	}).ajaxComplete(function(){	$(this).css("visibility","hidden");	});
	var name = $("#filetxt").val();
	var fname = $("#uploadFile").val();
	var data_type = $("#data_type").val();
	if(fname==""){
		$.jBox.tip("请先选择要上传的文件",'tip');
		return;
	}
	if(data_type==""){
		$.jBox.tip("请选择资料分类",'tip');
		return;
	}
	if(name=="文件名称" || name==""){
		$.jBox.tip("请输入此上传文件的文件名",'tip');
		return;
	}
	$.jBox.tip("上传中......","loading");
	$.ajaxFileUpload({
			url:'__URL__/editdata/?name='+name+'&data_type='+data_type,
			secureuri:false,
			fileElementId:'uploadFile',
			dataType: 'json',
			success: function (data, status)
			{
				if(data.status==1){
					$("#uploadFile").val('');
					$("#filetxt").val('');
					$.jBox.tip(data.message,'success');
					updatedata();
				}
				else  $.jBox.tip(data.message,'fail');
			}
		})
}

function updatedata(){
        $.ajax({
            url: "__URL__/editdata/",
            data: {},
            timeout: 5000,
            cache: false,
            type: "get",
            dataType: "json",
            success: function (d, s, r) {
              	if(d) $("#fragment-7").html(d.html);//更新客户端竞拍信息 作个判断，避免报错
            }
        });
}
$("#filetxt").focus(function(){
	if($(this).val() == "文件名称"){
		$(this).val("");
	}
});
$("#filetxt").blur(function(){
	if($(this).val() == ""){
		$(this).val("文件名称");
	}
});
</script>