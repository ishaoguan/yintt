<?php
// 全局设置
class CommentAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		$field= true;
		$is_audit = $_GET["is_audit"];
		if(!isset($is_audit))$is_audit=0;
		$map['type'] = 1;
		if($is_audit != -1){
			$map['is_audit'] = $is_audit;
		}else{
			$is_audit = "";
		}
		$this->_list(D('Comment'),$field,$map,'id','DESC');
		$this->assign('is_audit',$is_audit);
		$this->assign('audit_list',C('AUDIT_STATE'));
        $this->display();
    }

    public function index2()
    {
		$field= true;
		$map['type'] = 2;
		$this->_list(D('Comment'),$field,$map,'id','DESC');
        $this->display('index');
    }

	public function _doEditFilter($m){
		$m->deal_time = time();
		return $m;
	}

	public function doAudit(){
		$model = D(ucfirst($this->getActionName()));
		if (!empty($model)) {
			$id = $_REQUEST['id'];
			$type = $_REQUEST['type'];
			if (isset($id)) {
				$model->find($id);
				$model->is_audit = $type;
				if ($result = $model->save()) { //保存成功
					$this->success('操作成功','',array("data"=>$id.'|'.$type));
				}else{
					$this->error('操作失败');
				}
			} else {
				$this->error('非法操作');
			}
		}
	}
}
?>