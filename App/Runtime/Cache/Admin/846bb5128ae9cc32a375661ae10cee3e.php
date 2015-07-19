<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($ts['site']['site_name']); ?>管理后台</title>
<link href="__ROOT__/Style/A/css/style.css?<?php echo C('APP_RES_VER');?>" rel="stylesheet" type="text/css">
<link href="__ROOT__/Style/A/js/tbox/box.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__ROOT__/Style/A/js/jquery.js"></script>
<script type="text/javascript" src="__ROOT__/Style/A/js/common.js"></script>
<script type="text/javascript" src="__ROOT__/Style/A/js/tbox/box.js?<?php echo C('APP_RES_VER');?>"></script>
</head>
<body>

<script type="text/javascript">
	var delUrl = '__URL__/doDel';
	var addUrl = '__URL__/add';
	var editUrl = '__URL__/edit';
	var listUrl = '__URL__/listType';
	var addTitle = '添加地区';
	var editTitle = '编辑地区';
</script>
<div class="so_main">
  <div class="page_tit">地区管理</div>

  <div class="Toolbar_inbox">
  	<div class="page right"><?php echo ($pagebar); ?></div>
    <a onclick="add();" class="btn_a" href="javascript:void(0);"><span>添加地区</span></a>
    <a onclick="del();" class="btn_a" href="javascript:void(0);"><span>删除地区</span></a>
    <a class="btn_a" href="__URL__/addmultiple"><span>批量添加地区</span></a>
  </div>
  
  <div class="list">
  <table id="area_list" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th style="width:30px;">
        <input type="checkbox" id="checkbox_handle" onclick="checkAll(this)" value="0">
        <label for="checkbox"></label>
    </th>
    <th class="line_l">ID</th>
    <th class="line_l" width="40%">地区名称</th>
    <th class="line_l">地区排序</th>
    <th class="line_l">是否开启子站</th>
    <th class="line_l">操作</th>
  </tr>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr overstyle='on' id="list_<?php echo ($vo["id"]); ?>" class="leve_1" typeid="<?php echo ($vo["id"]); ?>" parentid="<?php echo ($vo["reid"]); ?>">
        <td><input type="checkbox" name="checkbox" id="checkbox2" onclick="checkon(this)" value="<?php echo ($vo["id"]); ?>"></td>
        <td><?php echo ($vo["id"]); ?></td>
        <td><?php if(($vo["haveson"]) == "true"): ?><span class="typeson typeon" data="son">&nbsp;</span><?php else: ?><span class="typeson">&nbsp;</span><?php endif; echo ($vo["name"]); ?></td>
        <td><?php echo ($vo["sort_order"]); ?></td>
        <td><?php if($vo["is_open"] == '1'): echo ($vo["doamin"]); else: ?>否<?php endif; ?></td>
        <td>
            <a href="javascript:void(0);" onclick="edit('?id=<?php echo ($vo['id']); ?>');">编辑</a> 
            <a href="javascript:void(0);" onclick="del(<?php echo ($vo['id']); ?>);">删除</a>  
        </td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>

  </div>
  
  <div class="Toolbar_inbox">
  	<div class="page right"><?php echo ($pagebar); ?></div>
    <a class="btn_a" href="__URL__/add"><span>添加地区</span></a>
    <a onclick="del();" class="btn_a" href="javascript:void(0);"><span>删除地区</span></a>
    <a class="btn_a" href="__URL__/addmultiple"><span>批量添加地区</span></a>
  </div>
</div>

<script type="text/javascript">
$("#area_list").bind("click", function(event){
	var _this = $(event.target).parent().parent();//获取当前点击元素
	var typeid = $(_this).attr('typeid');
	if(!$($(event.target)).attr("data")) return ;//如果被点击的元素不是span即+-号就不继续执行
	
	var liid = $("#area_list tr").index(_this);//获取当前元素在listtree li下面的元素索引,供传入后传回,以确定在哪个位置插入
	var dir = $(_this).attr('typeid');

	var sontree = $("#area_list tr:[parentid="+typeid+"]");

	//对已获取和没获取的做不同的处理
	if(sontree.html()==null){
		var datas = {'typeid':typeid};
		$.post(listUrl,datas,LTResponse,'json');
		$($(event.target)).addClass("typeoff");
		$($(event.target)).removeClass("typeon");
	}else{
		if(sontree.css("display")=='none'){
			sontree.css("display","");
			$($(event.target)).addClass("typeoff");
			$($(event.target)).removeClass("typeon");
		}else{
			sontree.css("display","none");
			$($(event.target)).addClass("typeon");
			$($(event.target)).removeClass("typeoff");
		}
	}
});
//获取子栏目列表后的处理
function LTResponse(res){
		if (res.status == '0') {
            ui.error(res.data);
        }else {
			$("#area_list tr:[typeid="+res.data.typeid+"]").after(res.data.inner); 
        }
}
</script>
<script type="text/javascript" src="__ROOT__/Style/A/js/adminbase.js?<?php echo C('APP_RES_VER');?>"></script>
</body>
</html>