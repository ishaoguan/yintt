<?php
class InnermsgAction extends ACommonAction {

    public function index(){

    	import("ORG.Util.Page");
		$count = M('inner_msg')->where("mass_id!='' and mass_id is not null and uid=0")->count('distinct mass_id');
    	$p = new Page($count, C('ADMIN_PAGE_SIZE'));
    	$page = $p->show();
    	$Lsql = "{$p->firstRow},{$p->listRows}";
    	$list = M('inner_msg')->field('distinct msg,title,mass_id,status,id')->order('mass_id desc')->where("mass_id!='' and mass_id is not null and uid=0")->limit($Lsql)->select();
    	$this->assign("pagebar", $page);
    	$this->assign("list", $list);

		$this->display();
    }

    public function edit(){
		$massid = $_GET['massid'];
		if(!empty($massid)){
			$innercontent = M('inner_msg')->where("mass_id={$massid}")->field('mass_id,msg,title,id')->find();
			$data["mass_id"] = $innercontent["mass_id"];
			$data["title"] = $innercontent["title"];
			$data["msg"] = $innercontent["msg"];
			$data["id"] = $innercontent["id"];
			$this->assign("vo", $data);
		}
		$this->display();
	}

    public function doEdit(){
    	$massid = $_POST['massid'];
    	$postid = $_POST['id'];
    	$olddata= M('inner_msg')->where("id='{$postid}'")->find();

     	$innermsg = $_POST['innerContent'];
     	$innertit = $_POST['innerTitle'];
		$timenow = time();

		if($olddata['title'] == $innertit && $olddata['msg'] == $innermsg){
			$this->error("您并没有做出修改");
		}
		
     	if(empty($innermsg))$this->error("站内信内容不能为空");
     	if(empty($innertit))$this->error("站内信标题不能为空");

		if(empty($massid)){
			$massid = "100".date("YmdHis").rand(10000,99999);
			$innmsg = M('inner_msg')->add(array("title"=>$innertit,"msg"=>$innermsg,"send_time"=>$timenow,"mass_id"=>$massid));
			$innid = M('inner_msg')->where("mass_id='{$massid}'")->field('id')->find();
			$postid = $innid['id'];

			$logText = "添加了站内信,标题为:<b style='color:red'>".$innertit."</b>,内容为:<b style='color:red'>".$innermsg."</b>。";

			saveCommonLog($postid, $logText, "members", session('adminname'), $this->admin_id, $this->logOpType["MSG_OPT"][0]);
			$this->success("添加成功");

		}else{
			M('inner_msg')->where(array("mass_id"=>$massid))->save(array("title"=>$innertit,"msg"=>$innermsg));
			$logText = "将标题由:<b style='color:red'>".$olddata['title']."</b>,修改为:<b style='color:red'>".$innertit."</b>。将内容由:<b style='color:red'>".$olddata['msg']."</b>,修改为<b style='color:red'>".$innermsg."</b>。";
			saveCommonLog($postid, $logText, "members", session('adminname'), $this->admin_id, $this->logOpType["MSG_OPT"][0]);
			$this->success("修改成功");
		}
     	
	}

	public function sendinnermsg(){
		$massid = text($_POST['massid']);
		$postid = text($_POST['postid']);
		if(innerMsgSend($massid)){
			$data['status']=1;
			M('inner_msg')->where(array("mass_id"=>$massid, "uid"=>0))->save($data);
			$logText ="将站内信成功发送";
			saveCommonLog($postid, $logText, "members", session('adminname'), $this->admin_id, $this->logOpType["MSG_OPT"][0]);
			ajaxmsg('',1);
		}else{
			ajaxmsg('',0);
		}
	}
}