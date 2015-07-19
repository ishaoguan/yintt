<?php
// 本类由系统自动生成，仅供测试用途
class HelpAction extends HCommonAction {
    public function index(){
		$is_subsite=false;
		$typeinfo = get_type_infos();
		if(intval($typeinfo['typeid'])<1){
			$typeinfo = get_area_type_infos($this->siteInfo['id']);
			$is_subsite=true;
		}

		$typeid = $typeinfo['typeid'];
		$typeset = $typeinfo['typeset'];
		//left
		$listparm['type_id']=$typeid;
		$listparm['limit']=10;
		if($is_subsite===false) $leftlist = getTypeList($listparm);
		else{
			$listparm['area_id'] = $this->siteInfo['id'];
			$leftlist = getAreaTypeList($listparm);
		}
		$this->assign("leftlist",$leftlist);
		$this->assign("cid",$typeid);
		
		if($typeset==1){
			$parm['pagesize']=10;
			$parm['type_id']=$typeid;
			if($is_subsite===false){
				$list = getArticleList($parm);
				$vo = D('Acategory')->find($typeid);
				if($vo['parent_id']<>0) $this->assign('cname',D('Acategory')->getFieldById($vo['parent_id'],'type_name'));
				else $this->assign('cname',$vo['type_name']);
			}
			else{
				$vo = D('Aacategory')->find($typeid);
				if($vo['parent_id']<>0) $this->assign('cname',D('Aacategory')->getFieldById($vo['parent_id'],'type_name'));
				else $this->assign('cname',$vo['type_name']);
				$parm['area_id']= $this->siteInfo['id'];
				$list = getAreaArticleList($parm);
			}
			$this->assign("vo",$vo);
			$this->assign("list",$list['list']);
			$this->assign("pagebar",$list['page']);
		}else{
			if($is_subsite===false){
				$vo = D('Acategory')->find($typeid);
				if($vo['parent_id']<>0) $this->assign('cname',D('Acategory')->getFieldById($vo['parent_id'],'type_name'));
				else $this->assign('cname',$vo['type_name']);
			}else{
				$vo = D('Aacategory')->find($typeid);
				if($vo['parent_id']<>0) $this->assign('cname',D('Aacategory')->getFieldById($vo['parent_id'],'type_name'));
				else $this->assign('cname',$vo['type_name']);
			}
			$this->assign("vo",$vo);
		}
		
		$this->display($typeinfo['templet']);
    }
	
	public function view(){
		$id = intval($_GET['id']);
		if($_GET['type']=="subsite") $vo = M('article_area')->find($id);
		else $vo = M('article')->find($id);
		$this->assign("vo",$vo);

		//left
		$typeid = $vo['type_id'];
		$listparm['type_id']=$typeid;
		$listparm['limit']=20;
		if($_GET['type']=="subsite"){
			$listparm['area_id'] = $this->siteInfo['id'];
			$leftlist = getAreaTypeList($listparm);
		}else	$leftlist = getTypeList($listparm);
		
		$this->assign("leftlist",$leftlist);
		$this->assign("cid",$typeid);
		
		$cat = D('Acategory')->find($typeid);
		$this->assign("cat",$cat);
		
		if($_GET['type']=="subsite"){
			$vop = D('Aacategory')->field('type_name,parent_id')->find($typeid);
			if($vop['parent_id']<>0) $this->assign('cname',D('Aacategory')->getFieldById($vop['parent_id'],'type_name'));
			else $this->assign('cname',$vop['type_name']);
		}else{
			$vop = D('Acategory')->field('type_name,parent_id')->find($typeid);
			if($vop['parent_id']<>0) $this->assign('cname',D('Acategory')->getFieldById($vop['parent_id'],'type_name'));
			else $this->assign('cname',$vop['type_name']);
		}

		$this->display();
	}
	
	public function kf(){
		$kflist = M("ausers")->where("is_kf=1 and is_ban=0")->select();
		$this->assign("kflist",$kflist);

		//left
		$listparm['type_id']=322;
		$listparm['limit']=10;
		if($_GET['type']=="subsite"){
			$listparm['area_id'] = $this->siteInfo['id'];
			$leftlist = getAreaTypeList($listparm);
		}else	$leftlist = getTypeList($listparm);
		
		$this->assign("leftlist",$leftlist);
		$typeid = 6;
		$this->assign("cid",$typeid);
		
		if($_GET['type']=="subsite"){
			$vop = D('Aacategory')->field('type_name,parent_id')->find($typeid);
			if($vop['parent_id']<>0) $this->assign('cname',D('Aacategory')->getFieldById($vop['parent_id'],'type_name'));
			else $this->assign('cname',$vop['type_name']);
		}else{
			$vop = D('Acategory')->field('type_name,parent_id')->find($typeid);
			if($vop['parent_id']<>0) $this->assign('cname',D('Acategory')->getFieldById($vop['parent_id'],'type_name'));
			else $this->assign('cname',$vop['type_name']);
		}

		$this->display();
	}
	
	public function tuiguang(){
		$_P_fee=get_global_setting();
		$this->assign("reward",$_P_fee);	
		$field = " m.id,m.user_name,sum(ml.affect_money) jiangli ";
		$list = M("members m")->field($field)->join(" lzh_member_moneylog ml ON m.id = ml.target_uid ")->where("ml.type=13")->group("m.id")->limit(10)->order('jiangli desc')->select();
		$this->assign("list",$list);
		
		//自动生成推广码
		if(session("u_id")){
			$expand_num = getExpandCode(session("u_id"));
			$this->assign("expand_num",$expand_num);
		}
		$this->display();
	}
	
	public function advice(){
		$_POST["nick_name"] = $_POST["mesNickName"];
		$_POST["phone"] = $_POST["mesPhone"];
		$_POST["qq"] = $_POST["mesQQ"];
		$_POST["email"] = $_POST["mesEmail"];
		$_POST["content"] = $_POST["mesContent"];
		$_POST["client_ip"] = get_client_ip();
		$_POST["create_time"] = date('Y-m-d H:i:s',time());
		$_POST["http_referer"] = $_SERVER['HTTP_REFERER'];
        $model = D('Advice');
        //$aa = $model->field('TIMESTAMPDIFF(SECOND, create_time, NOW()) left_time')->where("client_ip='".$_POST["client_ip"]."' and TIMESTAMPDIFF(SECOND, create_time, NOW())<=10")->order('create_time desc')->select(false);
        //echo $aa;exit;
        $left_time = $model->field('TIMESTAMPDIFF(SECOND, create_time, NOW()) left_time')->where("client_ip='".$_POST["client_ip"]."' and TIMESTAMPDIFF(SECOND, create_time, NOW())<=10")->order('create_time desc')->find();
        if(!empty($left_time['left_time']) && $left_time['left_time'] > 0 && $left_time['left_time']<=10){
        	$itime = 10 - $left_time['left_time'];
        	$this->error("您提交频率过快，请过{$itime}秒后再试！");
        }
        if (false === $model->create()) {
            $this->error($model->getError());
        }
        //保存当前数据对象
        if ($result = $model->add()) { //保存成功
            //成功提示
            $this->success('提交成功，非常感谢您的宝贵建议！');
        } else {
            //失败提示
            $this->error('提交失败');
        }
	}
	
	public function loginpop(){
		session("url_referer", $_SERVER["HTTP_REFERER"]);
		$this->display();
	}
}