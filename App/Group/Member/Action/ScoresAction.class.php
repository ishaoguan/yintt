<?php
class ScoresAction extends MCommonAction {
	public function index(){
		$this->display();
	}

    public function scores(){
		$map['uid'] = $this->uid;
		$mem = M("members")->field("scores")->getById($this->uid);
		
		if($_GET['start_time']&&$_GET['end_time']){
			$_GET['start_time'] = strtotime($_GET['start_time']." 00:00:00");
			$_GET['end_time'] = strtotime($_GET['end_time']." 23:59:59");
			
			if($_GET['start_time']<$_GET['end_time']){
				$map['add_time']=array("between","{$_GET['start_time']},{$_GET['end_time']}");
				$search['start_time'] = $_GET['start_time'];
				$search['end_time'] = $_GET['end_time'];
			}
		}
		$list = getScoresLog($map,20);
		$this->assign('search',$search);
		$this->assign("list",$list['list']);
		$this->assign("pagebar",$list['page']);
		$this->assign("scores_change",$list['scores_change']);
		$this->assign('mem',$mem);
		
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }

    public function exp(){
		$map['uid'] = $this->uid;
		$mem = M("members")->field("credits")->getById($this->uid);
		
		if($_GET['start_time_exp']&&$_GET['end_time_exp']){
			$_GET['start_time_exp'] = strtotime($_GET['start_time_exp']." 00:00:00");
			$_GET['end_time_exp'] = strtotime($_GET['end_time_exp']." 23:59:59");
			
			if($_GET['start_time_exp']<$_GET['end_time_exp']){
				$map['add_time']=array("between","{$_GET['start_time_exp']},{$_GET['end_time_exp']}");
				$search['start_time_exp'] = $_GET['start_time_exp'];
				$search['end_time_exp'] = $_GET['end_time_exp'];
			}
		}
		$list = getCreditsLog($map,20);
		$this->assign('search',$search);
		$this->assign("list",$list['list']);
		$this->assign("pagebar",$list['page']);
		$this->assign("exp_change",$list['exp_change']);
		$this->assign('mem',$mem);
		
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }
}
?>