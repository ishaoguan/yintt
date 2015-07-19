<?php
// 全局设置
class TborrowAction extends ACommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		$field= 'id,borrow_name,borrow_uid,borrow_duration,borrow_money,borrow_interest_rate,repayment_type,transfer_out,transfer_total,add_time';
		$this->_list(D('Tborrow'),$field,$map,'id','DESC');
        $this->display();
    }
	
    public function _addFilter()
    {
		$btype = array("3"=>"流转担保贷");
		$this->assign('borrow_type',$btype);
    }

	//添加数据
    public function doAdd() {
        $model = M("transfer_borrow_info");
        $model2 = M("transfer_detail");
		
        if (false === $model->create()) {
            $this->error($model->getError());
        }
        if (false === $model2->create()) {
            $this->error($model->getError());
        }
		$model->startTrans();
        //保存当前数据对象
		$model->repayment_type = 2;
		$model->borrow_status = 2;
		$model->add_time = time();
		$model->add_ip = get_client_ip();
		foreach($_POST['updata_name'] as $key=>$v){
			$updata[$key]['name'] = $v;
			$updata[$key]['time'] = $_POST['updata_time'][$key];
		}
		$model->updata = serialize($updata);
		$result = $model->add();
		
		foreach($_POST['swfimglist'] as $key=>$v){
			if($key>3) break;
			$row[$key]['img'] = substr($v,1);
			$row[$key]['info'] = $_POST['picinfo'][$key];
		}
		$model2->borrow_img=serialize($row);
		$model2->borrow_id = $result;
		$result2 = $model2->add();
		
        if ($result && $result2) { //保存成功
			$model->commit() ;
/*		  //新标提醒
			newTip($result);
		  //自动投标
		    autoInvest($result);
          //成功提示
*/          $this->assign('jumpUrl', __URL__);
            $this->success(L('新增成功'));
        } else {
			$model->rollback() ;
            //失败提示
            $this->error(L('新增失败'));
        }
    }
	
    public function edit() {
        $model = M('transfer_borrow_info');
        $model2 = M('transfer_detail');
        $id = intval($_REQUEST['id']);
        $vo = $model->find($id);
        $vo2 = $model2->find($id);
		foreach($vo2 as $key=>$v){
			if($key=="borrow_img") $vo[$key] = unserialize($v);
			else $vo[$key] = $v;
		}
        $this->assign('vo', $vo);
        $this->display();
    }


	//添加数据
    public function doEdit() {
        $model = M("transfer_borrow_info");
        $model2 = M("transfer_detail");
		
        if (false === $model->create()) {
            $this->error($model->getError());
        }
        if (false === $model2->create()) {
            $this->error($model->getError());
        }
		$model->startTrans();
        //保存当前数据对象
		$model->repayment_type = 2;
		$model->borrow_status = 2;
		foreach($_POST['updata_name'] as $key=>$v){
			$updata[$key]['name'] = $v;
			$updata[$key]['time'] = $_POST['updata_time'][$key];
		}
		$model->updata = serialize($updata);
		$result = $model->save();
		
		foreach($_POST['swfimglist'] as $key=>$v){
			$row[$key]['img'] = substr($v,1);
			$row[$key]['info'] = $_POST['picinfo'][$key];
		}
		$model2->borrow_img=serialize($row);
		$model2->borrow_id = intval($_POST['id']);

		$result2 = $model2->save();
		//$this->assign("waitSecond",1000);
        if ($result || $result2) { //保存成功
			$model->commit() ;
          //成功提示
            $this->assign('jumpUrl', __URL__);
            $this->success(L('修改成功'));
        } else {
			$model->rollback() ;
            //失败提示
            $this->error(L('修改失败'));
        }
    }
	
	
	protected function _AfterDoEdit(){
		switch(strtolower(session('listaction'))){
			case "waitverify":
				$v = M('transfer_borrow_info')->field('borrow_uid,borrow_status,deal_time')->find(intval($_POST['id']));
				if(empty($v['deal_time'])){
					$newid = M('members')->where("id={$v['borrow_uid']}")->setInc('credit_use',floatval($_POST['borrow_money']));
					if($newid) M('transfer_borrow_info')->where("id={$v['borrow_uid']}")->setField('deal_time',time());
				}
				//$this->assign("waitSecond",1000);
				//Notice();
			break;
		}
	}
	
	public function _listFilter($list){
	 	$listType = C('REPAYMENT_TYPE');
		$row=array();
		foreach($list as $key=>$v){
			$v['repayment_type'] = $listType[$v['repayment_type']];
			$row[$key]=$v;
		}
		return $row;
	}
	
	public function getusername(){
		$uname = M("members")->field("is_transfer,user_name")->find(intval($_POST['uid']));
		if($uname['user_name'] && $uname['is_transfer']==1) exit(json_encode(array("uname"=>"<span style='color:green'>".$uname['user_name']."</span>")));
		elseif($uname['user_name'] && $uname['is_transfer']==0) exit(json_encode(array("uname"=>"<span style='color:black'>此会员不是流转会员</span>")));
		elseif(!is_array($uname)) exit(json_encode(array("uname"=>"<span style='color:orange'>不存在此会员</span>")));
	}
	//swf上传图片
	public function swfUpload(){
		if($_POST['picpath']){
			$imgpath = substr($_POST['picpath'],1);
			if(in_array($imgpath,$_SESSION['imgfiles'])){
					 unlink(C("WEB_ROOT").$imgpath);
					 $thumb = get_thumb_pic($imgpath);
				$res = unlink(C("WEB_ROOT").$thumb);
				if($res) $this->success("删除成功","",array("data"=>$_POST['oid']));
				else $this->error("删除失败","",array("data"=>$_POST['oid']));
			}else{
				$this->error("图片不存在","",array("data"=>$_POST['oid']));
			}
		}else{
			$this->savePathNew = C('ADMIN_UPLOAD_DIR').'Product/' ;
			$this->thumbMaxWidth = C('PRODUCT_UPLOAD_W');
			$this->thumbMaxHeight = C('PRODUCT_UPLOAD_H');
			$this->saveRule = date("YmdHis",time()).rand(0,1000);
			$info = $this->CUpload();
			$data['product_thumb'] = $info[0]['savepath'].$info[0]['savename'];
			if(!isset($_SESSION['count_file'])) $_SESSION['count_file']=1;
			else $_SESSION['count_file']++;
			$_SESSION['imgfiles'][$_SESSION['count_file']] = $data['product_thumb'];
			echo "{$_SESSION['count_file']}:".__ROOT__."/".$data['product_thumb'];//返回给前台显示缩略图
		}
	}
	
	
}
?>