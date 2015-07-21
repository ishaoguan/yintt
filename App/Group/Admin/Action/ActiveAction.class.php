<?php
// 全局设置
class ActiveAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		$field= 'id,flag,amount,desc';
		$this->_list(M('active'),$field,'','id','asc');
        $this->display();
    }
    public function save()
    {
    	$model = D(ucfirst($this->getActionName()));
    	if (!empty($model)) {
    		$id = $_REQUEST['id'];
    		$flag = $_REQUEST['flag'];
    		$amount = $_REQUEST['amount'];
    		//Log::write($id.'!'.$flag.'~'.$amount, Log::ERR, Log::FILE, 'test111.log', $extra = '');
    			$model->find($id);
    			$model->flag = $flag;
    			$model->amount = $amount;
    			if ($result = $model->save()) { //保存成功
    				$this->success('操作成功',__URL__."/index/");
    			}else{
    				$this->error('操作失败');
    			}
    	}
    }
}
?>