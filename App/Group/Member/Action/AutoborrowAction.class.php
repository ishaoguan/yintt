<?php
// 本类由系统自动生成，仅供测试用途
class AutoborrowAction extends MCommonAction {

    public function index(){
    	$this->assign("borrowType", C("BORROW_TYPE"));
		$this->assign("list",M('auto_borrow')->where("uid={$this->uid}")->limit(3)->select());
		$this->display();
    }
	
	public function add(){
		$Bconfig = require C("APP_ROOT")."Conf/borrow_config.php";
		
		$borrow_duration = explode("|",$this->glo['borrow_duration']);
		$month = range($borrow_duration[0],$borrow_duration[1]);
		$month_time=array();
		foreach($month as $v){
			$month_time[$v] = $v."个月";
		}

		$this->assign("borrow_month_time",$month_time);
		$this->assign("repayment_type",$Bconfig['REPAYMENT_TYPE']);	
		$this->assign("borrow_type",$Bconfig['BORROW_TYPE']);	
		$this->assign("xmembertype",C('XMEMBER_TYPE'));	
		$this->display();
	}
	
	public function doadd(){
		$model=D('Auto_borrow');
		$savedata = textPost($_POST);
		$savedata['uid'] = $this->uid;
        if (false === $model->create($savedata)) {
            $this->error($model->getError());
        }elseif ($result = $model->add()) {
			$this->success("添加成功",__URL__."/index.html");
        } else {
			$this->assign("waitSecond",10000);
			$this->error("添加失败");
        }
	}
	
	public function edit(){
		$id=intval($_GET['id']);
		$map['uid'] = $this->uid;
		$map['id'] = $id;
		$vo = M('auto_borrow')->where($map)->find();
		if(!is_array($vo)) $this->error("数据有误");
		$this->assign("vo",$vo);

		$Bconfig = require C("APP_ROOT")."Conf/borrow_config.php";
		
		$borrow_duration = explode("|",$this->glo['borrow_duration']);
		$month = range($borrow_duration[0],$borrow_duration[1]);
		$month_time=array();
		foreach($month as $v){
			$month_time[$v] = $v."个月";
		}

		$this->assign("borrow_month_time",$month_time);
		$this->assign("repayment_type",$Bconfig['REPAYMENT_TYPE']);	
		$this->assign("borrow_type",$Bconfig['BORROW_TYPE']);	
		$this->assign("xmembertype",C('XMEMBER_TYPE'));	
		$this->display();
	}
	
	public function doedit(){
		$model=D('Auto_borrow');
		$_X=array('my_friend','not_black','borrow_credit_status','apr_status','award_status');
		foreach($_X as $ve){
			if(!isset($_POST[$ve])) $_POST[$ve]=0;
		}
		
		$savedata = textPost($_POST);
		$savedata['uid'] = $this->uid;
        if (false === $model->create($savedata)) {
            $this->error($model->getError());
        }elseif ($result = $model->save()) {
			$this->success("修改成功",__URL__."/index.html");
        } else {
			$this->assign("waitSecond",10000);
			$this->error("修改失败");
        }
	}
	
	public function del(){
		$id=intval($_GET['id']);
		$map['uid'] = $this->uid;
		$map['id'] = $id;
		$vo = M('auto_borrow')->where($map)->delete();
		if(!$vo) $this->error("删除失败，请重试");
		else  $this->success("删除成功",__URL__."/index.html");
	}

}