<?php
// 全局设置
class UseradviceAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index(){
        $useradvice = M('advice')->count();
        $countsize = (int)$useradvice;
        import("ORG.Util.Page");
        $p = new Page($countsize, C('ADMIN_PAGE_SIZE'));
        $page = $p->show();
        $list = M('advice')->order('id DESC')->limit($p->firstRow.','.$p->listRows)->select();
        $this->assign('list',$list);
        $this->assign('pagebar',$page);

		$this->display();
    }
    public function edit(){
         if($_GET['id']){
            $userid = $_GET['id'];
            $mainadvice = M('advice')->where("id ='{$userid}'")->find();
            $data['deal_flag']=1;
            $data['deal_time']=date('Y-m-d H:i:s');
            $data['deal_user']=$this->admin_id;
            M('advice')->where("id='{$userid}'")->save($data);
            $this->assign('list',$mainadvice);
            $this->display();
        }else{
            $this->error('页面错误');
        }
    }

}
?>