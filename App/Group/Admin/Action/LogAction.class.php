<?php
class LogAction extends ACommonAction
{
	public function logList(){
		$id = intval($_REQUEST['id']);
		$opType = explode(",", $_REQUEST['opType']);

		$map['record_id'] = $id;
		$map['operation_type'] = array("in", $opType);
		
		import("ORG.Util.Page");
    	//分页处理
    	$count = M('operation_log')->where($map)->count('1');
    	$p = new Page($count, 20);
    	$page = $p->show();
    	$Lsql = "{$p->firstRow},{$p->listRows}";
    	//分页处理
    	
		$field = "o.*,au.real_name create_username";
		switch ($opType){
			case $this->logOpType["MODIFY_RECOMMOND"][0]:
				break;
			default:
				break;
		}
    	$list = M('operation_log')->alias("o")->field($field)->join("left join {$this->pre}ausers au ON au.id=o.create_userid and o.user_type='{$this->logUserType['ADMIN']}'")->
    		where($map)->limit($Lsql)->order('o.id DESC')->select();
		
    	$this->assign("list", $list);
    	$this->assign("pagebar", $page);
		$this->display();
	}
}