<?php
// 本类由系统自动生成，仅供测试用途
class PromotionAction extends MCommonAction {

    public function index(){
		$this->display();
    }

    public function promotion(){
		//自动生成推广码
		$expand_num = getExpandCode($this->uid);
		$this->assign("expand_num",$expand_num);
		
		$_P_fee=get_global_setting();
		$this->assign("reward",$_P_fee);	
		$active = active_flag(2);
		$this->assign("active",$active);
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }

    public function promotionlog(){
		$map['uid'] = $this->uid;
		$map['type'] = array("in","1,13");
		$list = getMoneyLog($map,15);
		
		$totalR = M('member_moneylog')->where("uid={$this->uid} AND type in(1,13)")->sum('affect_money');
		$this->assign("totalR",$totalR);		
		$this->assign("CR",M('members')->getFieldById($this->uid,'reward_money'));		
		$this->assign("list",$list['list']);		
		$this->assign("pagebar",$list['page']);		

		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }

	public function promotionfriend(){
		$pre = C('DB_PREFIX');
		$uid=session('u_id');
		$field = " m.id,m.user_name,m.reg_time,(SELECT SUM(ml.affect_money) FROM lzh_member_moneylog ml WHERE m.id = ml.target_uid AND ml.type=13 and ml.uid={$uid}) jiangli ";
		$list = M("members")->alias("m")->field($field)->where(" m.recommend_id ={$uid}")->select();
		$this->assign("list",$list);
		$data['html'] = $this->fetch();
		exit(json_encode($data));
    }
}