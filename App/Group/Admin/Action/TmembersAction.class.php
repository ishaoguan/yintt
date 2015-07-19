<?php
// 全局设置
class TmembersAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		$list = getTMemberList(array(),10);
		$this->assign("list",$list['list']);
		$this->assign("pagebar",$list['page']);
        $this->display();
    }
	
    public function doAdd()
    {	
		$udata['user_name'] = text($_POST['user_name']);
		$cs = M('members')->where($udata)->count('id');
		if($cs>0){
			$this->error("添加失败，此用户名已被占用，请重试");
			exit;
		}
		if(empty($udata['user_name'])){
			$this->error("用户名不能为空，请重试");
			exit;
		}
		
		$udata['is_transfer'] = 1;
		$udata['reg_ip'] = get_client_ip();
		$udata['user_leve'] = 1;
		$udata['time_limit'] = time()+24*3600*365;
		$udata['user_pass'] = md5(time().rand(10,99));
		$udata['reg_time'] = strtotime( $_POST['reg_time']." ".date("H:i:s",time()) );
		$newid = M('members')->add($udata);
		if($newid){
			$idata['uid'] = $newid;
			$idata['address'] = text($_POST['address']);
			$idata['info'] = text($_POST['info']);
			M('member_info')->add($idata);
			$this->success("添加成功");
		}else{
			$this->error("添加失败，请重试");
		}
		
        $this->display();
    }
	
    public function edit()
    {	
		$pre = C('DB_PREFIX');
		$id = intval($_GET['id']);
		$vo = M('members m')->field("m.id,m.user_name,m.reg_time,mf.info,mf.address")->join("{$pre}member_info mf ON m.id=mf.uid")->where("m.id={$id}")->find();
		$this->assign("vo",$vo);
        $this->display();
    }

}
?>