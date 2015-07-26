<?php
//对提交的参数进行过滤
function EnHtml($v){
	return $v;
}
function mydate($format,$time,$default=''){
	if(intval($time)>10000) return date($format,$time);	
	else return $default;
}
function textPost($data){
	if(is_array($data)){
		foreach($data as $key => $v){
			$x[$key]=text($v);
		}
	}else{
		return text($data);
	}
	return $x;
}
/*$url：要生成的地址,$vars:参数数组,$domain：是否带域名*/
function MU($url,$type,$vars=array(),$domain=false){
	//获得基础地址START
	$path = explode("/",trim($url,"/"));
	$model = strtolower($path[1]);
	$action = isset($path[2])?strtolower($path[2]):"";
	//获得基础地址START
	//获取前缀根目录及分组
	$http = UD($path,$domain);
	//获取前缀根目录及分组
	switch($type){
		case "article":
		default:
			if(!isset($vars['id'])){//特殊栏目,用nid来区分,不用ID
				unset($path[0]);//去掉分组名
				$url = implode("/",$path)."/";
				$newurl=$url;
			}else{//普通栏目,带ID
				if(1==1||strtolower(GROUP_NAME) == strtolower(C('DEFAULT_GROUP'))) {//如果是默认分组则去掉分组名
					unset($path[0]);//去掉分组名
					$url = implode("/",$path)."/";
				}
				$newurl=$url.$vars['id'].$vars['suffix'];
			}
		break;
		case "typelist":
				if(1==1||strtolower(GROUP_NAME) == strtolower(C('DEFAULT_GROUP'))) {//如果是默认分组则去掉分组名
					unset($path[0]);//去掉分组名
					$url = implode("/",$path);
				}
				$newurl=$url.$vars['suffix'];
		break;
	}
	
	return $http.$newurl;
	
}
// URL组装 支持不同模式
// 格式：UD('url参数array('分组','model','action')','显示域名')在传入的url数组中，只用到分组
function UD($url=array(),$domain = false) {
    // 解析URL
	$isDomainGroup = true;//当值为true时,不对任何链接加分组前缀,当为false时,自动判断分组及域名等,加前缀
	$isDomainD = false;
	$asdd = C('APP_SUB_DOMAIN_DEPLOY');
	//###########修复START#############，增加对当前分组分配了二级域名的判断,变量给下面用
	if($asdd){
		foreach (C('APP_SUB_DOMAIN_RULES') as $keyr => $ruler) {
			if(strtolower($url[0]."/") == strtolower($ruler[0])){
				$isDomainGroup = true;//分组分配了二级域名
				$isDomainD = true;
				break;
			}
		}
	}

	//#########及默认分组不需要加分组名 都转换成小写来比较，避免在linux上出问题
	if(strtolower(GROUP_NAME) == strtolower(C('DEFAULT_GROUP'))) $isDomainGroup = true;
	//###########修复END#############，增加对当前分组分配了二级域名的判断
    // 解析子域名
    if($domain===true){
        $domain = $_SERVER['HTTP_HOST'];
        if($asdd) { // 开启子域名部署
			//###########修复START#############，增加对没带前缀域名的判断
			$xdomain = explode(".",$_SERVER['HTTP_HOST']);
			if(!isset($xdomain[2])) $ydomain="www.".$_SERVER['HTTP_HOST'];
			else  $ydomain=$_SERVER['HTTP_HOST'];
			//###########修复END#############，增加对没带前缀域名的判断
            $domain = $domain=='localhost'?'localhost':'www'.strstr($ydomain,'.');
            // '子域名'=>array('项目[/分组]');
            foreach (C('APP_SUB_DOMAIN_RULES') as $key => $rule) {
                if(false === strpos($key,'*') && $isDomainD) {
                    $domain = $key.strstr($domain,'.'); // 生成对应子域名
                    $url   =  substr_replace($url,'',0,strlen($rule[0]));
                    break;
                }
            }
        }
    }
	
	if(!$isDomainGroup) $gpurl = __APP__."/".$url[0]."/";
	else $gpurl = __APP__."/";

    if($domain) {
        $url   =  'http://'.$domain.$gpurl;
    }else{
        $url   =  $gpurl;
	}

	return $url;
}

function Mheader($type){
	header("Content-Type:text/html;charset={$type}"); 
}

// 自动转换字符集 支持数组转换
function auto_charset($fContents, $from='gbk', $to='utf-8') {
    $from = strtoupper($from) == 'UTF8' ? 'utf-8' : $from;
    $to = strtoupper($to) == 'UTF8' ? 'utf-8' : $to;
    if ( ($to=='utf-8'&&is_utf8($fContents)) || strtoupper($from) === strtoupper($to) || empty($fContents) || (is_scalar($fContents) && !is_string($fContents))) {
        //如果编码相同或者非字符串标量则不转换
        return $fContents;
    }
    if (is_string($fContents)) {
        if (function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($fContents, $to, $from);
        } elseif (function_exists('iconv')) {
            return iconv($from, $to, $fContents);
        } else {
            return $fContents;
        }
    } elseif (is_array($fContents)) {
        foreach ($fContents as $key => $val) {
            $_key = auto_charset($key, $from, $to);
            $fContents[$_key] = auto_charset($val, $from, $to);
            if ($key != $_key)
                unset($fContents[$key]);
        }
        return $fContents;
    }
    else {
        return $fContents;
    }
}
//判断是否utf8
function is_utf8($string) {
	return preg_match('%^(?:
		 [\x09\x0A\x0D\x20-\x7E]            # ASCII
	   | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
	   |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
	   | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
	   |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
	   |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
	   | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
	   |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
   )*$%xs', $string);
}

//获取日期
/*			case "yesterday";
				$date = date("Y-m-d",$now_time);//d,w,m分别表示天，周，月,后面的第三个参数选填，正数1表示后一天(d)的00:00:00到23:59:59负数表示前一天(d),-2表示前面第二天的00:00:00到23:59:59
				$day = get_date($date,'d',-1);//第三个参数表示时间段包含的天数
			break;
*/
function get_date($date,$t='d',$n=0){
	if($t=='d'){
		$firstday = date('Y-m-d 00:00:00',strtotime("$n day"));
		$lastday = date("Y-m-d 23:59:59",strtotime("$n day"));
	}elseif($t=='w'){
		if($n!=0){$date = date('Y-m-d',strtotime("$n week"));}
		$lastday = date("Y-m-d 00:00:00",strtotime("$date Sunday"));
		$firstday = date("Y-m-d 23:59:59",strtotime("$lastday -6 days"));
	}elseif($t=='m'){
		if($n!=0){
			if(date("m",time())==1) $date = date('Y-m-d',strtotime("$n months -1 day"));//2特殊的2月份
			else $date = date('Y-m-d',strtotime("$n months"));
		}
		
		$firstday = date("Y-m-01 00:00:00",strtotime($date));
		$lastday = date("Y-m-d 23:59:59",strtotime("$firstday +1 month -1 day"));
	}
	return array($firstday,$lastday);

}

/**
 +----------------------------------------------------------
 * 产生随机字串，可用来自动生成密码 默认长度6位 字母和数字混合
 +----------------------------------------------------------
 * @param string $len 长度
 * @param string $type 字串类型
 * 0 字母 1 数字 其它 混合
 * @param string $addChars 额外字符
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function rand_string($ukey="",$len=6,$type='1',$utype='1',$addChars='') {
    $str ='';
    switch($type) {
        case 0:
            $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.$addChars;
            break;
        case 1:
            $chars= str_repeat('0123456789',3);
            break;
        case 2:
            $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.$addChars;
            break;
        case 3:
            $chars='abcdefghijklmnopqrstuvwxyz'.$addChars;
            break;
        default :
            // 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
            $chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'.$addChars;
            break;
    }
    if($len>10 ) {//位数过长重复字符串一定次数
        $chars= $type==1? str_repeat($chars,$len) : str_repeat($chars,5);
    }
    $chars   =   str_shuffle($chars);
    $str     =   substr($chars,0,$len);
	if(!empty($ukey)){
		$vd['code'] = $str;
		$vd['send_time'] = time();
		$vd['ukey'] = $ukey;
		$vd['type'] = $utype;
		M('verify')->add($vd);
	}
    return $str;
}
//验证是否通过
function is_verify($uid,$code,$utype,$timespan){
	if(!empty($uid)) $vd['ukey'] = $uid;
	$vd['type'] = $utype;
	$vd['send_time'] = array("lt",time()+$timespan);
	$vo = M("verify")->field('ukey,code')->where($vd)->order("send_time desc")->find();
	if(is_array($vo) && $vo['code'] == $code) return $vo['ukey'];
	else return false;
}
//网站基本设置
function get_global_setting(){
	$list=array();
	if(!S('global_setting')){
		$list_t = M('global')->field('code,text')->select();
		foreach($list_t as $key => $v){
			$list[$v['code']] = de_xie($v['text']);
		}
		S('global_setting',$list);
		S('global_setting',$list,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$list = S('global_setting');
	}
	
	return $list;
}
//acl权限管理
/*
print_r(acl_get_key(array('global','data','eqaction_edit'),$acl_inc));
*/


//获取用户权限数组
function get_user_acl($uid=""){
	$model=strtolower(MODULE_NAME);

	if(empty($uid)) return false;
	$gid = M('ausers')->field('u_group_id')->find($uid);
	
	$al = get_group_data($gid['u_group_id']);
	
	$acl = $al['controller'];
	$acl_key = acl_get_key();
	
	if( array_keys($acl[$model],$acl_key) ) return true;
	else return false;
}

//获取权限列表
function get_group_data($gid=0){
	$gid=intval($gid);
	$list=array();
	
	if($gid==0){
		if( !S("ACL_all") ){
			$_acl_data = M('acl')->select();
			$acl_data=array();
			
			foreach($_acl_data as $key => $v){
				$acl_data[$v['group_id']] = $v;
				$acl_data[$v['group_id']]['controller'] = unserialize($v['controller']);
			}
			
			S("ACL_all",$acl_data,C('ADMIN_CACHE_TIME')); 
			$list = $acl_data;
		}else{
			$list = S("ACL_all");
		}
	}else{
		if( !S("ACL_".$gid) ){
			$_acl_data = M('acl')->find($gid);
			$_acl_data['controller'] = unserialize($_acl_data['controller']);
			$acl_data = $_acl_data;
			S("ACL_".$gid,$acl_data,C('ADMIN_CACHE_TIME')); 
			$list = $acl_data;
		}else{
			$list = S("ACL_".$gid);
		}
	}
	return $list;
}
//删除文件夹并重建文件夹
function rmdirr($dirname) {

	if (!file_exists($dirname)) {
		return false;
	}

	if (is_file($dirname) || is_link($dirname)) {
		return unlink($dirname);
	}

	$dir = dir($dirname);

	while (false !== $entry = $dir->read()) {

		if ($entry == '.' || $entry == '..') {
			continue;
		}

		rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
	}

	$dir->close();

	return rmdir($dirname);
}
//删除文件夹及文件夹下所有内容
function Rmall($dirname) {
	if (!file_exists($dirname)) {
		return false;
	}
	if (is_file($dirname) || is_link($dirname)) {
		return unlink($dirname);
	}

	$dir = dir($dirname);//如果对像是目录

	while (false !== $file = $dir->read()) {

		if ($file == '.' || $file == '..') {
			continue;
		}
		if(!is_dir($dirname."/".$file)){
			unlink($dirname."/".$file);
		}else{
			Rmall($dirname."/".$file);
		}
		
		rmdir($dirname."/".$file);
	}

	$dir->close();
	
	rmdir($dirname);

	return true;
}

//取得文件内容
function ReadFiletext($filepath){
	$htmlfp=@fopen($filepath,"r");
	while($data=@fread($htmlfp,1000))
	{
		$string.=$data;
	}
	@fclose($htmlfp);
	return $string;
}

//生成文件
function MakeFile($con,$filename){//$filename是全物理路径加文件名
	MakeDir(dirname($filename));
	$fp=fopen($filename,"w");
	fwrite($fp,$con);
	fclose($fp);
}

//生成全路径文件夹
function MakeDir($dir){
	return is_dir($dir) or (MakeDir(dirname($dir)) and mkdir($dir,0777));
}

//友情链接
function get_home_friend($type,$datas = array()){
	$condition['is_show']=array('eq',1);
	
	$condition['link_type']=array('eq',$type);
	$type = "friend_home".$type;


	if(!S($type)){
		$_list = M('friend')->field('link_txt,link_href,link_img,link_type')->where($condition)->order("link_order DESC")->select();
		$list=array();
		foreach($_list as $key => $v){
			$list[$key] = $v;
		}
		S($type,$list,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$list = S($type);
	}
	
	return $list;
}

//提取广告
function get_ad($id){
	$stype = "home_ad".$id;
	if(!S($stype)){
		$list=array();
		$condition['start_time']=array("lt",time());
		$condition['end_time']=array("gt",time());
		$condition['id']=array('eq',$id);
		$_list = M('ad')->field('ad_type,content')->where($condition)->find();
		if($_list['ad_type']==1) $_list['content']=unserialize($_list['content']);
		$list = $_list;
		S($stype,$list,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$list = S($stype);
	}
	
	if($list['ad_type']==0 || !$list['content']){
		if(!$list['content']) $list['content'] = 0;
		echo $list['content'];
	}
	else return $list['content'];
}
/*
栏目相关函数
Start
*/

//获取某栏目下的所有子栏目以nid-nid顺次链接
function get_type_leve($id="0"){
	if(!S("type_son_type")){
		$allid=array();
		$data = getCategoryByParentId($id);
		if(count($data)>0){
			foreach($data as $v){
				//二级
				$allid[$v['type_nid']]=$v['id'];
				$data_1=array();//清空,避免下面判断错误
				$data_1 = getCategoryByParentId($v['id']);
				if(count($data_1)>0){
					foreach($data_1 as $v1){
						//三级
						$allid[$v['type_nid']."-".$v1['type_nid']]=$v1['id'];
						$data_2=array();//清空,避免下面判断错误
						$data_2 = getCategoryByParentId($v1['id']);
						if(count($data_2)>0){
							foreach($data_2 as $v2){
								//四级
								$allid[$v['type_nid']."-".$v1['type_nid']."-".$v2['type_nid']]=$v2['id'];
								$data_3=array();//清空,避免下面判断错误
								$data_3 = getCategoryByParentId($v2['id']);
	
								if(count($data_3)>0){
									foreach($data_3 as $v3){
										$allid[$v['type_nid']."-".$v1['type_nid']."-".$v2['type_nid']."-".$v3['type_nid']]=$v3['id'];
									}
								}
								//四级
							}
						}
						//三级
					}
				}
				//二级
			}
	
		}
		S("type_son_type",$allid,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$allid = S("type_son_type");
	}
	
	return $allid;
}


//获取某栏目下的所有子栏目以nid-nid顺次链接
function get_area_type_leve($id="0",$area_id=0){

	$model = D('Aacategory');
	if(!S("type_son_type_area".$area_id)){
		$allid=array();
		$data = $model->field('id,type_nid')->where("parent_id = {$id} AND area_id={$area_id}")->select();
		if(count($data)>0){
			foreach($data as $v){
				//二级
				$allid[$area_id.$v['type_nid']]=$v['id'];
				$data_1=array();//清空,避免下面判断错误
				$data_1 = $model->field('id,type_nid')->where("parent_id = {$v['id']}")->select();
				if(count($data_1)>0){
					foreach($data_1 as $v1){
						//三级
						$allid[$area_id.$v['type_nid']."-".$v1['type_nid']]=$v1['id'];
						$data_2=array();//清空,避免下面判断错误
						$data_2 = $model->field('id,type_nid')->where("parent_id = {$v1['id']}")->select();
						if(count($data_2)>0){
							foreach($data_2 as $v2){
								//四级
								$allid[$area_id.$v['type_nid']."-".$v1['type_nid']."-".$v2['type_nid']]=$v2['id'];
								$data_3=array();//清空,避免下面判断错误
								$data_3 = $model->field('id,type_nid')->where("parent_id = {$v2['id']}")->select();
	
								if(count($data_3)>0){
									foreach($data_3 as $v3){
										$allid[$area_id.$v['type_nid']."-".$v1['type_nid']."-".$v2['type_nid']."-".$v3['type_nid']]=$v3['id'];
									}
								}
								//四级
							}
						}
						//三级
					}
				}
				//二级
			}
	
		}
		S("type_son_type_area".$area_id,$allid,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$allid = S("type_son_type_area".$area_id);
	}
	return $allid;
}

//获取某栏目的所有父栏目的type_nid,按由远到近的顺序出现在数组中1/2
function get_type_leve_nid($id="0"){
	if(empty($id)) return;
	global $allid;
	static $r=array();//先声明要返回静态变量,不然在下面被赋值时是引用赋值
	get_type_leve_nid_run($id);
	
	$r = $allid;
	$GLOBALS['allid'] = NULL;
	
	return array_reverse($r);
}
//获取某栏目的所有父栏目的type_nid,按由远到近的顺序出现在数组中2/2
function get_type_leve_nid_run($id="0"){
	global $allid;
	$data_parent = $data = "";
	$data = getCategoryById($id);
	$data_parent = getCategoryById($data['parent_id']);
	if(isset($data_parent['type_nid'])>0){
		if(!isset($allid[0])) $allid[]=$data['type_nid'];
		$allid[]=$data_parent['type_nid'];
		get_type_leve_nid_run($data_parent['id']);
	}else{
		if(!isset($allid[0])) $allid[]=$data['type_nid'];
	}
}


//获取某栏目的所有父栏目的type_nid,按由远到近的顺序出现在数组中1/2
function get_type_leve_area_nid($id="0",$area_id=0){
	if(empty($id)||empty($area_id)) return;
	global $allid_area;
	static $r=array();//先声明要返回静态变量,不然在下面被赋值时是引用赋值

	get_type_leve_area_nid_run($id);
	
	$r = $allid_area;
	$GLOBALS['allid_area'] = NULL;
	
	return array_reverse($r);
}
//获取某栏目的所有父栏目的type_nid,按由远到近的顺序出现在数组中2/2
function get_type_leve_area_nid_run($id="0"){
	global $allid_area;
	$data_parent = $data = "";
	$data = getCategoryById($id);
	$data_parent = getCategoryById($data['parent_id']);
	if(isset($data_parent['type_nid'])>0){
		if(!isset($allid_area[0])) $allid_area[]=$data['type_nid'];
		$allid_area[]=$data_parent['type_nid'];
		get_type_leve_area_nid_run($data_parent['id']);
	}else{
		if(!isset($allid_area[0])) $allid_area[]=$data['type_nid'];
	}
}

//获取某栏目下的所有子栏目,查询次数较少，查询效率更高,入口函数1/2
function get_son_type($id){
	$tempname = "type_sfs_son_all".$id;
	if(!S($tempname)){
		$row = get_son_type_run($id);
		S($tempname,$row,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$row = S($tempname);
	}
	return $row;
}

//获取某栏目下的所有子栏目,查询次数较少，查询效率更高2/2
function get_son_type_run($id){
	static $rerow;
	global $allid;
	$data = M('type')->field('id')->where("parent_id in ({$id})")->select();
	if(count($data)>0){
		foreach($data as $key=>$v){
			$allid[]=$v['id'];
			$nowid[]=$v['id'];
		}
		$id = implode(",",$nowid);
		get_son_type_run($id);
	}
//递归函数不要加else来返回内容，不然得不到返回值
//	else{
//		return $allid;
//	}
	$rerow = $allid;
	$allid=array();
	return $rerow;
}

//获取某栏目下所有的子栏目,以数组的形式返回,入口函数1/2
function get_type_son($id=0){
	$tempname = "type_son_all".$id;
	if(!S($tempname)){
		$row = get_type_son_all($id);
		S($tempname,$row,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$row = S($tempname);
	}
	return $row;
}
//获取某栏目下所有的子栏目2/2
function get_type_son_all($id="0"){
	static $rerow;
	global $get_type_son_all_row;
	
	if(empty($id)) exit;
	
	$data = M('type')->where("parent_id = {$id}")->field('id')->select();
	foreach($data as $key=>$v){
		$get_type_son_all_row[]=$v['id'];
		$data_son = M('type')->where("parent_id = {$v['id']}")->field('id')->select();
		if(count($data_son)>0){
			get_type_son_all($v['id']);
		}
	}
	
	$rerow = $get_type_son_all_row;
	$get_type_son_all_row = array();
	return $rerow;
}
//获取所有栏目每个栏目的父栏目的nid,以栏目ID为键名
function get_type_parent_nid(){
	$row=array();
	$p_nid_new=array();
	if(!S("type_parent_nid_temp")){
		$data = M('type')->field('id')->select();
		if(count($data)>0){
			foreach($data as $key => $v){
				$p_nid = get_type_leve_nid($v['id']);
				$i=$n=count($p_nid);
				//倒序处理
				if($i>1){
					for($j=0;$j<$n;$j++,$i--){
						$p_nid_new[($i-1)]=$p_nid[$j];
					}
				}else{
					$p_nid_new = $p_nid;
				}
				//倒序处理
				$row[$v['id']] = $p_nid_new;
			}
		}
		S("type_parent_nid_temp",$row,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$row = S("type_parent_nid_temp");
	}
	
	return $row;
}

//获取以栏目ID为键的所有栏目数组,二维,如果field只有两个，并且其中一个是id，那么就会自动成为一维数组
function get_type_list($model,$field=true){
	$acaheName=md5("type_list_temp".$model.$field);
	if(!S($acaheName)){
		$list = D(ucfirst($model))->getField($field);
		S($acaheName,$list,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$list = S($acaheName);
	}
	return $list;
}

//通过网址获取栏目相关信息
function get_type_infos(){
	$row=array();
	$type_list = get_type_list('acategory','id,type_nid,type_set');
	if(!isset($_GET['typeid'])){
		$type_nid = get_type_leve();//获得所有栏目自己的nid的组合 
		$rurl = explode("?",$_SERVER['REQUEST_URI']);
		$xurl_tmp = explode("/",preg_replace(array("/index.html/",'/.html\/\d+/', "/.html/"),array('','',''),$rurl[0]));//获得组合的type_nid
		$zu = implode("-",array_filter($xurl_tmp));//组合
		//print_r($type_nid);
		$typeid = $type_nid[$zu];
		$typeset = $type_list[$typeid]['type_set'];
	}else{
		$typeid = intval($_GET['typeid']);
		$typeset = $type_list[$typeid]['type_set'];
	}

	if($typeset==1){//列表
		$templet = "list_index";
	}else{//单页
		$templet = "index_index";
	}
	
	$row['typeset'] = $typeset;
	$row['templet'] = $templet;
	$row['typeid'] = $typeid;
	
	return $row;
}

//通过网址获取栏目相关信息
function get_area_type_infos($area_id=0){
	$row=array();
	$type_list = get_type_list('aacategory','id,type_nid,type_set,area_id');
	if(!isset($_GET['typeid'])){

		$type_nid = get_area_type_leve(0,$area_id);//获得所有栏目自己的nid的组合 
		$rurl = explode("?",$_SERVER['REQUEST_URI']); 
		$xurl_tmp = explode("/",str_replace(array("index.html",".html"),array('',''),$rurl[0]));//获得组合的type_nid
		$zu = implode("-",array_filter($xurl_tmp));//组合
		//print_r($type_nid);
		$typeid = $type_nid[$area_id.$zu];
		$typeset = $type_list[$typeid]['type_set'];
	}else{
		$typeid = intval($_GET['typeid']);
		$typeset = $type_list[$typeid]['type_set'];
	}

	if($typeset==1){//列表
		$templet = "list_index";
	}else{//单页
		$templet = "index_index";
	}
	
	$row['typeset'] = $typeset;
	$row['templet'] = $templet;
	$row['typeid'] = $typeid;
	
	return $row;
}

//获取栏目列表,按栏目分级,有缩进,入口函数1/2
function get_type_leve_list($id=0,$modelname=false){
	static $rerow;
	global $get_type_leve_list_run_row;


	if(!$modelname) $model = D("type");
	else $model=D(ucfirst($modelname));
	$stype = $modelname."home_type_leve_list".$id;
	if(!S($stype)){
		get_type_leve_list_run($id,$model);
		$rerow = $get_type_leve_list_run_row;//把全局变量赋值给静态变量，避免引用清空
		$GLOBALS['get_type_leve_list_run_row']=NULL;//清空全局变量避免影响其他数据,不能用unset,unset只能清空单个变量或者数组中的某一元素,并且unset只能清空局部变量，清空全局变量要用unset($GLOBALS
		$data = $rerow;
		S($stype,$data,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$data = S($stype);
	}
	return $data;
}

//获取栏目列表,按栏目分级,有缩进2/2
function get_type_leve_list_run($id=0,$model){
	global $get_type_leve_list_run_row;
	//全局变量的定义都要放在最前面
	$spa = "----";
	if(count($get_type_leve_list_run_row)<1) $get_type_leve_list_run_row=array();

	$typelist = $model->where("parent_id={$id}")->field('type_name,id,parent_id')->order('sort_order DESC')->select();//上级栏目

	foreach($typelist as $k=>$v){
		$leve = intval(get_typeLeve($v['id'],$model));
		$v['type_name'] = str_repeat($spa,$leve).$v['type_name'];
		$get_type_leve_list_run_row[]=$v;
		
		$typelist_s1 = $model->where("parent_id={$v['id']}")->field('type_name,id')->select();//上级栏目
		if(count($typelist_s1)>0){
			get_type_leve_list_run($v['id'],$model);
		}
	}
}//id


//获取栏目列表地区性的,按栏目分级,有缩进,入口函数1/2
function get_type_leve_list_area($id=0,$modelname=false,$area_id=0){
	static $rerow;
	global $get_type_leve_list_area_run_row;


	if(!$modelname) $model = D("type");
	else $model=D(ucfirst($modelname));
	$stype = $modelname."home_type_leve_list_area".$id.$area_id;
	if(!S($stype)){
		get_type_leve_list_area_run($id,$model,$area_id);
		$rerow = $get_type_leve_list_area_run_row;//把全局变量赋值给静态变量，避免引用清空
		$GLOBALS['get_type_leve_list_area_run_row']=NULL;//清空全局变量避免影响其他数据,不能用unset,unset只能清空单个变量或者数组中的某一元素,并且unset只能清空局部变量，清空全局变量要用unset($GLOBALS
		$data = $rerow;
		S($stype,$data,3600*C('TTXF_TMP_HOUR')); 
	}else{
		$data = S($stype);
	}
	return $data;
}

//获取栏目列表,按栏目分级,有缩进2/2
function get_type_leve_list_area_run($id=0,$model,$area_id){
	global $get_type_leve_list_area_run_row;
	//全局变量的定义都要放在最前面
	$spa = "----";
	if(count($get_type_leve_list_area_run_row)<1) $get_type_leve_list_area_run_row=array();

	$typelist = $model->where("parent_id={$id} AND area_id={$area_id}")->field('type_name,id,parent_id')->order('sort_order DESC')->select();//上级栏目

	foreach($typelist as $k=>$v){
		$leve = intval(get_typeLeve($v['id'],$model));
		$v['type_name'] = str_repeat($spa,$leve).$v['type_name'];
		$get_type_leve_list_area_run_row[]=$v;
		
		$typelist_s1 = $model->where("parent_id={$v['id']}")->field('type_name,id')->select();//上级栏目
		if(count($typelist_s1)>0){
			get_type_leve_list_area_run($v['id'],$model,$area_id);
		}
	}
}//id


//获取栏目的级别1/2
function get_typeLeve($typeid,$model){
	$typeleve = 0;
	global $typeleve;
	static $rt=0;//先声明要返回静态变量,不然在下面被赋值时是引用赋值
	get_typeLeve_run($typeid,$model);
	$rt = $typeleve;
	unset($GLOBALS['typeleve']);
	return $rt;
}
//获取栏目的级别2/2
function get_typeLeve_run($typeid,$model){
	global $typeleve;
	$condition['id'] = $typeid;
	$v = $model->field('parent_id')->where($condition)->find();
	if($v['parent_id']>0){
		$typeleve++;
		get_typeLeve_run($v['parent_id'],$model);
	}
}

/*
栏目相关函数
End
*/
//在前台显示时去掉反斜线,传入数组，最多二维
function de_xie($arr){
	$data=array();
	if(is_array($arr)){
		foreach($arr as $key=>$v){
			if(is_array($v)){
				foreach($v as $skey=>$sv){
					if(is_array($sv)){
							
					}else{
						$v[$skey] = stripslashes($sv);
					}
				}
				$data[$key] = $v;
			}else{
				$data[$key] = stripslashes($v);
			}
		}
	}else{
		$data = stripslashes($arr);
	}
	return $data;
}


//输出纯文本
function text($text,$parseBr=false,$nr=false){
    $text = htmlspecialchars_decode($text);
    $text	=	safe($text,'text');
    if(!$parseBr&&$nr){
        $text	=	str_ireplace(array("\r","\n","\t","&nbsp;"),'',$text);
        $text	=	htmlspecialchars($text,ENT_QUOTES);
    }elseif(!$nr){
        $text	=	htmlspecialchars($text,ENT_QUOTES);
	}else{
        $text	=	htmlspecialchars($text,ENT_QUOTES);
        $text	=	nl2br($text);
    }
    $text	=	trim($text);
    return $text;
}
function safe($text,$type='html',$tagsMethod=true,$attrMethod=true,$xssAuto = 1,$tags=array(),$attr=array(),$tagsBlack=array(),$attrBlack=array()){

    //无标签格式
    $text_tags	=	'';

    //只存在字体样式
    $font_tags	=	'<i><b><u><s><em><strong><font><big><small><sup><sub><bdo><h1><h2><h3><h4><h5><h6>';

    //标题摘要基本格式
    $base_tags	=	$font_tags.'<p><br><hr><a><img><map><area><pre><code><q><blockquote><acronym><cite><ins><del><center><strike>';

    //兼容Form格式
    $form_tags	=	$base_tags.'<form><input><textarea><button><select><optgroup><option><label><fieldset><legend>';

    //内容等允许HTML的格式
    $html_tags	=	$base_tags.'<ul><ol><li><dl><dd><dt><table><caption><td><th><tr><thead><tbody><tfoot><col><colgroup><div><span><object><embed>';

    //专题等全HTML格式
    $all_tags	=	$form_tags.$html_tags.'<!DOCTYPE><html><head><title><body><base><basefont><script><noscript><applet><object><param><style><frame><frameset><noframes><iframe>';

    //过滤标签
    $text	=	strip_tags($text, ${$type.'_tags'} );

        //过滤攻击代码
        if($type!='all'){
            //过滤危险的属性，如：过滤on事件lang js
            while(preg_match('/(<[^><]+) (onclick|onload|unload|onmouseover|onmouseup|onmouseout|onmousedown|onkeydown|onkeypress|onkeyup|onblur|onchange|onfocus|action|background|codebase|dynsrc|lowsrc)([^><]*)/i',$text,$mat)){
                $text	=	str_ireplace($mat[0],$mat[1].$mat[3],$text);
            }
            while(preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i',$text,$mat)){
                $text	=	str_ireplace($mat[0],$mat[1].$mat[3],$text);
            }
        }
        return $text;
}


//输出安全的html
function h($text, $tags = null){
	$text	=	trim($text);
	$text	=	preg_replace('/<!--?.*-->/','',$text);
	//完全过滤注释
	$text	=	preg_replace('/<!--?.*-->/','',$text);
	//完全过滤动态代码
	$text	=	preg_replace('/<\?|\?'.'>/','',$text);
	//完全过滤js
	$text	=	preg_replace('/<script?.*\/script>/','',$text);

	$text	=	str_replace('[','&#091;',$text);
	$text	=	str_replace(']','&#093;',$text);
	$text	=	str_replace('|','&#124;',$text);
	//过滤换行符
	$text	=	preg_replace('/\r?\n/','',$text);
	//br
	$text	=	preg_replace('/<br(\s\/)?'.'>/i','[br]',$text);
	$text	=	preg_replace('/(\[br\]\s*){10,}/i','[br]',$text);
	//过滤危险的属性，如：过滤on事件lang js
	while(preg_match('/(<[^><]+) (lang|on|action|background|codebase|dynsrc|lowsrc)[^><]+/i',$text,$mat)){
		$text=str_replace($mat[0],$mat[1],$text);
	}
	while(preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i',$text,$mat)){
		$text=str_replace($mat[0],$mat[1].$mat[3],$text);
	}
	if(empty($tags)) {
		$tags = 'table|tbody|td|th|tr|i|b|u|strong|img|p|br|div|span|em|ul|ol|li|dl|dd|dt|a|alt|h[1-9]?';
		$tags.= '|object|param|embed';	// 音乐和视频
	}
	//允许的HTML标签
	$text	=	preg_replace('/<(\/?(?:'.$tags.'))( [^><\[\]]*)?>/i','[\1\2]',$text);
	//过滤多余html
	$text	=	preg_replace('/<\/?(html|head|meta|link|base|basefont|body|bgsound|title|style|script|form|iframe|frame|frameset|applet|id|ilayer|layer|name|style|xml)[^><]*>/i','',$text);
	//过滤合法的html标签
	while(preg_match('/<([a-z]+)[^><\[\]]*>[^><]*<\/\1>/i',$text,$mat)){
		$text=str_replace($mat[0],str_replace('>',']',str_replace('<','[',$mat[0])),$text);
	}
	//转换引号
	while(preg_match('/(\[[^\[\]]*=\s*)(\"|\')([^\2\[\]]+)\2([^\[\]]*\])/i',$text,$mat)){
		$text = str_replace($mat[0], $mat[1] . '|' . $mat[3] . '|' . $mat[4],$text);
	}
	//过滤错误的单个引号
	// 修改:2011.05.26 kissy编辑器中表情等会包含空引号, 简单的过滤会导致错误
//	while(preg_match('/\[[^\[\]]*(\"|\')[^\[\]]*\]/i',$text,$mat)){
//		$text=str_replace($mat[0],str_replace($mat[1],'',$mat[0]),$text);
//	}
	//转换其它所有不合法的 < >
	$text	=	str_replace('<','&lt;',$text);
	$text	=	str_replace('>','&gt;',$text);
    $text   =   str_replace('"','&quot;',$text);
    //$text   =   str_replace('\'','&#039;',$text);
	 //反转换
	$text	=	str_replace('[','<',$text);
	$text	=	str_replace(']','>',$text);
	$text	=	str_replace('|','"',$text);
	//过滤多余空格
	$text	=	str_replace('  ',' ',$text);
	return $text;
}
//根据原图片地址得到缩略图地址
function get_thumb_pic($str){
	$path = explode("/",$str);
	$sc = count($path);
	$path[($sc-1)] = "thumb_".$path[($sc-1)];
	return implode("/",$path);
}
//得到分类kvtable里的分类,以id为键
function get_kvtable($nid=""){
	$stype = "kvtable".$nid;
	$list = array();
	if(!S($stype)){
		if(!empty($nid))$tmplist = M('kvtable')->where("nid='{$nid}'")->field(true)->select();
		else $tmplist = M('rule')->field(true)->select();
		foreach($tmplist as $v){
			$list[$v['id']]=$v;
		}
		S($stype,$list,3600*C('TTXF_TMP_HOUR')); 
		$row = $list;
	}else{
		$list = S($stype); 
		$row = $list;
	}
	
	return $row;
}
/*
* 中文截取，支持gb2312,gbk,utf-8,big5 
*
* @param string $str 要截取的字串
* @param int $start 截取起始位置
* @param int $length 截取长度
* @param string $charset utf-8|gb2312|gbk|big5 编码
* @param $suffix 是否加尾缀
*/
function cnsubstr($str, $length, $start=0, $charset="utf-8", $suffix=true)
{
	   $str = strip_tags($str);
	   if(function_exists("mb_substr"))
	   {
			   if(mb_strlen($str, $charset) <= $length) return $str;
			   $slice = mb_substr($str, $start, $length, $charset);
	   }
	   else
	   {
			   $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
			   $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
			   $re['gbk']          = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
			   $re['big5']          = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
			   preg_match_all($re[$charset], $str, $match);
			   if(count($match[0]) <= $length) return $str;
			   $slice = join("",array_slice($match[0], $start, $length));
	   }
	   if($suffix) return $slice."…";
	   return $slice;
}
function cnstrlen($str, $charset="utf-8"){
   $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
   $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
   $re['gbk']          = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
   $re['big5']          = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
   preg_match_all($re[$charset], $str, $match);
   return count($match[0]);
}

/*
	格式化显示时间
*/
function getLastTimeFormt($time,$type=0){
	if($type==0) $f="m-d H:i"; 
	else if($type==1) $f="Y-m-d H:i";
	$agoTime = time() - $time;
    if ( $agoTime <= 60&&$agoTime >=0 ) {
        return $agoTime.'秒前';
    }elseif( $agoTime <= 3600 && $agoTime > 60 ){
        return intval($agoTime/60) .'分钟前';
    }elseif ( date('d',$time) == date('d',time()) && $agoTime > 3600){
		return '今天 '.date('H:i',$time);
    }elseif( date('d',$time+86400) == date('d',time()) && $agoTime < 172800){
		return '昨天 '.date('H:i',$time);
    }else{
        return date($f,$time);
    }
}
/**
*显示满标时间
*/
function formatTimsDiff($agoTime){
    if ( $agoTime <= 60&&$agoTime >=0 ) {
        return $agoTime.'秒';
    }elseif( $agoTime <= 3600 && $agoTime > 60 ){
        return intval($agoTime/60) .':'.($agoTime%60).'秒';
    }elseif ( $agoTime > 3600 && $agoTime <= 86400){
		return intval($agoTime/3600) .':'.intval(($agoTime%3600)/60) .':'.(($agoTime%3600)%60).'秒';
    }elseif( $agoTime > 86400 ){
		return intval($agoTime/86400) .':'.intval(($agoTime%86400)/3600) .':'.intval((($agoTime%86400)%3600)/60) .':'.((($agoTime%86400)%3600)%60).'秒';
    }else{
        return date($f,$time);
    }
}

/**
 * 获取指定uid的头像文件规范路径
 * 来源：Ucenter base类的get_avatar方法
 *
 * @param int $uid
 * @param string $size 头像尺寸，可选为'big', 'middle', 'small'
 * @param string $type 类型，可选为real或者virtual
 * @return unknown
 */
function get_avatar($uid, $size = 'middle', $type = '') {
	$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'big';
	$uid = abs(intval($uid));
	$uid = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	$typeadd = $type == 'real' ? '_real' : '';
	$path = __ROOT__.'/Style/header/customavatars/'.$dir1.'/'.$dir2.'/'.$dir3.'/'.substr($uid, -2).$typeadd."_avatar_$size.jpg";
	if(!file_exists(C("WEB_ROOT").$path)) $path = __ROOT__.'/Style/header/images/'."noavatar_$size.gif";
	return  $path;
}
/**
 * 获取地区列表，id为键，地区名为值的二维数组
 */
function get_Area_list($id="") {
	$cacheName = "temp_area_list_s";
	if(!S($cacheName)){
		$list = M('area')->getField('id,name');
		S($cacheName,$list,3600*1000); 
	}else{
		$list = S($cacheName);
	}
	if(!empty($id)) return $list[$id];
	else return $list;
}

/**
 * IP转换成地区
 */
function ip2area($ip="") {
	if(strlen($ip)<6) return;
	import("ORG.Net.IpLocation");
	$Ip = new IpLocation("CoralWry.dat"); 
	$area = $Ip->getlocation($ip);
	$area = auto_charset($area);
	if($area['country']) $res = $area['country'];
	if($area['area']) $res = $res."(".$area['area'].")";
	if(empty($res)) $res = "未知";
	return $res;
}
//把秒换成小时或者天数
function second2string($second,$type=0){
	$day = floor($second/(3600*24));
	$second = $second%(3600*24);//除去整天之后剩余的时间
	$hour = floor($second/3600);
	$second = $second%3600;//除去整小时之后剩余的时间 
	$minute = floor($second/60);
	$second = $second%60;//除去整分钟之后剩余的时间 
	
	switch($type){
		case 0:
			if($day>=1) $res = $day."天";
			elseif($hour>=1) $res = $hour."小时";
			else  $res = $minute."分钟";
		break;
		case 1:
			if($day>=5) $res = date("Y-m-d H:i",time()+$second);
			elseif($day>=1&&$day<5) $res = $day."天前";
			elseif($hour>=1) $res = $hour."小时前";
			else  $res = $minute."分钟前";
		break;
	}
	//返回字符串
	return $res;
}

//生成订单号
function getOrderSN($type,$id,$uid){
	switch($type){
		case "buy":
			$str = substr(time(),5).$id.$uid;
			$str = "A".str_pad($str,14,"0",STR_PAD_LEFT);
		break;
		case "bc":
			$str = substr(time(),5).$id.$uid;
			$str = "B".str_pad($str,14,"0",STR_PAD_LEFT);
		break;
	}
	
	return $str;
}

//快速缓存调用和储存
function FS($filename,$data="",$path=""){
	$path = C("WEB_ROOT").$path;
	if($data==""){
		$f = explode("/",$filename);
		$num = count($f);
		if($num>2){
			$fx = $f;
			array_pop($f);
			$pathe = implode("/",$f);
			$re = F($fx[$num-1],'',$pathe."/");
		}else{
			isset($f[1])?$re = F($f[1],'',C("WEB_ROOT").$f[0]."/"):$re = F($f[0]);
		}
		return $re;
	}else{
		if(!empty($path)) $re = F($filename,$data,$path);
		else $re = F($filename,$data);
	}
}
//格式化URL，只判断域名，前台后台共用，前台生成供判断的URL，后台生成供储存以便对比的URL
function formtUrl($url){
	if(!stristr($url,"http://")) $url = str_replace("http://","",$url);
	
	$fourl = explode("/",$url);
	$domain = get_domain("http://".$fourl[0]);
	$perfix = str_replace($domain,'',$fourl[0]);
	return $perfix.$domain;
}
function get_domain($url)
{
	$pattern = "/[/w-]+/.(com|net|org|gov|biz|com.tw|com.hk|com.ru|net.tw|net.hk|net.ru|info|cn|com.cn|net.cn|org.cn|gov.cn|mobi|name|sh|ac|la|travel|tm|us|cc|tv|jobs|asia|hn|lc|hk|bz|com.hk|ws|tel|io|tw|ac.cn|bj.cn|sh.cn|tj.cn|cq.cn|he.cn|sx.cn|nm.cn|ln.cn|jl.cn|hl.cn|js.cn|zj.cn|ah.cn|fj.cn|jx.cn|sd.cn|ha.cn|hb.cn|hn.cn|gd.cn|gx.cn|hi.cn|sc.cn|gz.cn|yn.cn|xz.cn|sn.cn|gs.cn|qh.cn|nx.cn|xj.cn|tw.cn|hk.cn|mo.cn|org.hk|is|edu|mil|au|jp|int|kr|de|vc|ag|in|me|edu.cn|co.kr|gd|vg|co.uk|be|sg|it|ro|com.mo)(/.(cn|hk))*/";
	preg_match($pattern, $url, $matches);
	if(count($matches) > 0)
	{
		return $matches[0];
	}else{
		$rs = parse_url($url);
		$main_url = $rs["host"];
		if(!strcmp(long2ip(sprintf("%u",ip2long($main_url))),$main_url))
		{
			return $main_url;
		}else{
			$arr = explode(".",$main_url);
			$count=count($arr);
			$endArr = array("com","net","org");//com.cn net.cn 等情况
			if (in_array($arr[$count-2],$endArr))
			{
				$domain = $arr[$count-3].".".$arr[$count-2].".".$arr[$count-1];
			}else{
				$domain = $arr[$count-2].".".$arr[$count-1];
			}
			return $domain;
		}
	}
} 


function getFloatValue($f,$len)
{
  $tmpInt=intval($f);
  $str=sprintf("%.{$len}f", $f-$tmpInt);
  $subStr=strstr($str,'.');
  if(intval($str) === 1){
  	$tmpInt += 1;
  }
  if(false === $subStr){
  	($len>0)?$repetstr = ".".str_repeat("0",$len):$repetstr = "";
 	return $tmpInt.$repetstr;
  }
 
  if(strlen($subStr)<$len+1){
	  $repeatCount=$len+1-strlen($subStr);
	  $str=$str."".str_repeat("0",$repeatCount);
  }
  return  $tmpInt."".substr($str,1,1+$len);
}


//获取远程图片
function get_remote_img($content){
	$rt = C("WEB_ROOT");
	$img_dir = C("REMOTE_IMGDIR")?C("REMOTE_IMGDIR"):"/UF/Remote";//img_dir远程图片的保存目录，带前"/"不带后"/"
	$base_dir = substr($rt,0,strlen($rt)-1);//$base_dir网站根目录物理路径，不带后"/"
	
	$content = stripslashes($content); 
	$img_array = array(); 
	preg_match_all("/(src|SRC)=[\"|'| ]{0,}(http:\/\/(.*)\.(gif|jpg|jpeg|bmp|png|ico))/isU",$content,$img_array); //获取内容中的远程图片
	$img_array = array_unique($img_array[2]); //把重复的图片去掉
	set_time_limit(0); 
	$imgUrl = $img_dir."/".strftime("%Y%m%d",time()); //img_dir远程图片的保存目录，带前"/"不带后"/"
	$imgPath = $base_dir.$imgUrl; //$base_dir网站根目录物理路径，不带后"/"
	$milliSecond = strftime("%H%M%S",time()); 
	if(!is_dir($imgPath)) MakeDir($imgPath,0777);//如果路径不存在则创建
	foreach($img_array as $key =>$value) 
	{ 
		$value = trim($value); 
		$get_file = @file_get_contents($value); 
		$rndFileName = $imgPath."/".$milliSecond.$key.".".substr($value,-3,3); 
		$fileurl = $imgUrl."/".$milliSecond.$key.".".substr($value,-3,3); 

		if($get_file) 
		{ 
			$fp = @fopen($rndFileName,"w"); 
			@fwrite($fp,$get_file); 
			@fclose($fp); 
		} 
		$content = ereg_replace($value,$fileurl,$content); 
	} 
	//$content = addslashes($content); 
	return $content;
}

function ajaxmsg($msg="",$type=1,$is_end=true){
	$json['status'] = $type;
	if(is_array($msg)){
		foreach($msg as $key=>$v){
			$json[$key] = $v;
		}
	}elseif(!empty($msg)){
		$json['message'] = $msg;
	}
	if($is_end){
		exit(json_encode($json));
	}else{
		echo json_encode($json);
	}
}

function hidecard($cardnum,$type=1,$default=""){
	if(empty($cardnum)) return $default;
	$len = 1;
	if($type==1) $cardnum = substr($cardnum,0,3).str_repeat("*",12).substr($cardnum,strlen($cardnum)-4);//身份证
	elseif($type==2) $cardnum = substr($cardnum,0,3).str_repeat("*",5).substr($cardnum,strlen($cardnum)-4);//手机号
	elseif($type==3) $cardnum = str_repeat("*",strlen($cardnum)-4).substr($cardnum,strlen($cardnum)-4);//银行卡
	elseif($type==4){
		$cardnum = cnsubstr($cardnum,$len,0,'utf-8',false).str_repeat("*",strlen($cardnum)-3);//用户名
	}elseif($type==8){
		$pos = strpos($cardnum, "@qq_");
		$pos1 = strpos($cardnum, "@sina_");
		if($pos === 0){
			$cardnum = "@qq_".cnsubstr($cardnum,$len,4,'utf-8',false).str_repeat("*",3);
		}else if($pos1 === 0){
			$cardnum = "@sina_".cnsubstr($cardnum,$len,6,'utf-8',false).str_repeat("*",3);
		}else{
			$cardnum = cnsubstr($cardnum,$len,0,'utf-8',false).str_repeat("*",3);//用户名
		}
	}
	return $cardnum;
}

function setmb($size)
{
	$mbsize=$size/1024/1024;
	if($mbsize>0)
	{
		list($t1,$t2)=explode(".",$mbsize);
		$mbsize=$t1.".".substr($t2,0,2);
	}
	
	if($mbsize<1){
		$kbsize=$size/1024;
		list($t1,$t2)=explode(".",$kbsize);
		$kbsize=$t1.".".substr($t2,0,2);
		return $kbsize."KB";
	}else{
		return $mbsize."MB";
	}
	
}

function getMoneyFormt($money){
	if($money>=100000){
		$res = ($money/10000)."万";
	}else{
		$res = getFloatValue($money,0);
	}
	return $res;
}
function getArea(){
	$area = FS("Webconfig/area");
	if(!is_array($area)){
		$list = M("area")->getField("id,name");
		FS("area",$list,"Webconfig/");
	}else{
		return $area;	
	}
}

function getLeveIco($num,$type=1){
	$leveconfig = FS("Webconfig/leveconfig");
	foreach($leveconfig as $key=>$v){
		if($num>=$v['start'] && $num<=$v['end']){
			if($type==1) return "/UF/leveico/".$v['icoName'];
			else  return '<a href="'.__APP__.'/member/scores#fragment-1"><img src="'.__ROOT__.'/UF/leveico/'.$v['icoName'].'" title="'.$v['name'].'"/></a>';
		}
	}
}

function getAgeName($num){
	$ageconfig = FS("Webconfig/ageconfig");
	foreach($ageconfig as $key=>$v){
		if($num>=$v['start'] && $num<=$v['end']){
			return $v['name'];
		}
	}
}

function getLocalhost(){
	$vo['id'] = 1;
	$vo['name'] = "主站";
	$vo['domain'] = "www";
	return $vo;
}

function Fmoney($money, $needPoint=true){
	if(!is_numeric($money)) return "0.00";
	$sb = "";
	if($money<0){
		$sb="-";
		$money = $money*(-1);
	}
	
	$dot = explode(".",$money);
    $tmp_money = strrev_utf8($dot[0]);
    $format_money = ""; 
    for($i = 3;$i<strlen($dot[0]);$i+=3){
        $format_money .= substr($tmp_money,0,3).",";
         $tmp_money = substr($tmp_money,3);
     }
    $format_money .=$tmp_money;
    if(empty($sb)) $format_money = "".strrev_utf8($format_money); 
    else $format_money = "-".strrev_utf8($format_money); 
    if($dot[1] && $needPoint) return $format_money.".".$dot[1];
	else return $format_money;
}

function strrev_utf8($str) {
    return join("", array_reverse(
        preg_split("//u", $str)
    ));
}

function getInvestUrl($id){
	return __APP__."/invest/{$id}".C('URL_HTML_SUFFIX');
}

function getArtUrl($art_id, $type_id,$art_set=0,$art_url=""){
	$suffix=C("URL_HTML_SUFFIX");
	$typefix = get_type_leve_nid($type_id);
	$typeu = implode("/",$typefix);
	$arturl="";
	if($v['art_set']==1) $arturl = (stripos($v['art_url'],"http://")===false)?"http://".$art_url:$art_url;
	//elseif(count($typefix)==1) $data[$key]['arturl'] = 
	else $arturl = MU("Home/{$typeu}","article",array("id"=>$art_id,"suffix"=>$suffix));
	return $arturl;
}

//获取管理员ID对应的名称,以id为键
function get_admin_name($id=false){
	$stype = "adminlist";
	$list = array();
	if(!S($stype)){
		$rule = M('ausers')->field('id,user_name')->select();
		foreach($rule as $v){
			$list[$v['id']]=$v['user_name'];
		}
		
		S($stype,$list,3600*C('TTXF_TMP_HOUR')); 
		if(!$id) $row = $list;
		else $row = $list[$id];
	}else{
		$list = S($stype); 
		if($id===false) $row = $list;
		else $row = $list[$id];
	}
	return $row;
}
	
function getIco($map){
	$str="";
	if($map['reward_type']>0) $str.='<img class="ptype" src="'.__ROOT__.'/Style/H/images/j.gif?1" align="absmiddle">';
	if($map['is_tuijian']==1) $str.='<img class="ptype" src="'.__ROOT__.'/Style/H/images/tuijian.jpg" align="absmiddle">';
	if($map['borrow_type']==2) $str.='<img class="ptype" src="'.__ROOT__.'/Style/H/images/d.gif?1" align="absmiddle">';
	elseif($map['borrow_type']==3) $str.='<img class="ptype" src="'.__ROOT__.'/Style/H/images/m.gif" align="absmiddle">';
	elseif($map['borrow_type']==4) $str.='<img class="ptype" src="'.__ROOT__.'/Style/H/images/jing.gif" align="absmiddle">';
	elseif($map['borrow_type']==1) $str.='<img class="ptype" src="'.__ROOT__.'/Style/H/images/xin.gif" align="absmiddle">';
	elseif($map['borrow_type']==5) $str.='<img class="ptype" src="'.__ROOT__.'/Style/H/images/ya.gif" align="absmiddle">';
	elseif($map['borrow_type']==6) $str.='<img class="ptype" src="'.__ROOT__.'/Style/H/images/zhuxue_small.jpg?1" align="absmiddle">';
	if($map['repayment_type']==1) $str.='<img class="ptype" src="'.__ROOT__.'/Style/H/images/t.jpg" align="absmiddle">';
	if(!empty($map['password'])) $str.='<img class="ptype" src="'.__ROOT__.'/Style/H/images/passw.jpg" align="absmiddle">';
	return $str;
}

function getIcoNew($map){

	$str="";
	if($map['borrow_type']==1) $str='<span class="type_x xin_biao"><span';
	if($map['borrow_type']==2) $str='<div class="clew1 b-icon"></div>';
	elseif($map['borrow_type']==3) $str='<div class="clew_m b-icon"></div>';
	elseif($map['borrow_type']==4) $str='<span class="type_x jing_biao"></span>';
	elseif($map['borrow_type']==1) $str='<div class="clew_xin b-icon"></div>';
	elseif($map['borrow_type']==5) $str='<span class="type_x di_diao"></span>';
	elseif($map['borrow_type']==6) $str='<div class="clew_z b-icon"></div>';
	return $str;
}
function getIcoNew_old($map){

    //<span title="{$vb.span_title}" class="type_x">
    $str="";
    if($map['reward_type']>0) $str.='<div class="clew_j b-icon"></div>';
    if($map['is_tuijian']==1) $str.='<div class="clew_tuijiang b-icon"></div>';
    if($map['borrow_type']==2) $str.='<div class="clew1 b-icon"></div>';
    elseif($map['borrow_type']==3) $str.='<div class="clew_m b-icon"></div>';
    elseif($map['borrow_type']==4) $str.='<div class="clew_jing b-icon"></div>';
    elseif($map['borrow_type']==1) $str.='<div class="clew_xin b-icon"></div>';
    elseif($map['borrow_type']==5) $str.='<div class="clew2 b-icon"></div>';
    elseif($map['borrow_type']==6) $str.='<div class="clew_z b-icon"></div>';
    if($map['repayment_type']==1) $str.='<div class="clew_t b-icon"></div>';
    if(!empty($map['password'])) $str.='<div class="clew_p b-icon"></div>';
    return $str;
}

function addMsg($from,$to,$title,$msg,$type=1){
	if(empty($from) || empty($to)) return;
	$data['from_uid'] = $from;
	$data['from_uname'] = M('members')->getFieldById($from,"user_name");
	$data['to_uid'] = $to;
	$data['to_uname'] = M('members')->getFieldById($to,"user_name");
	$data['title'] = $title;
	$data['msg'] = $msg;
	$data['add_time'] = time();
	$data['is_read'] = 0;
	$data['type'] = $type;
	$newid = M('member_msg')->add($data);
	return $newid;
}

function getSubSite(){
	$map['is_open'] = 1;
	$list = M("area")->field(true)->where($map)->select();
	$cdomain = explode(".",$_SERVER['HTTP_HOST']);
	$cpx = array_pop($cdomain);
	$doamin = array_pop($cdomain);
	$host = ".".$doamin.".".$cpx;
	foreach($list as $key=>$v){
		$list[$key]['host'] = "http://".$v['domain'].$host;
	}
	return $list;
}
function getCreditsLog($map,$size){
	if(empty($map['uid'])) return;
	
	if($size){
		//分页处理
		import("ORG.Util.Page");
		$count = M('member_creditslog')->where($map)->count('id');
		$p = new Page($count, $size);
		$page = $p->show();
		$Lsql = "{$p->firstRow},{$p->listRows}";
		//分页处理
	}

	$list = M('member_creditslog')->where($map)->order('id DESC')->limit($Lsql)->select();
	$type_arr = C("CREDITS_TYPE");
	foreach($list as $key=>$v){
		$list[$key]['type_name'] = $type_arr[$v['type']]["name"];
	}
	
	$row=array();
	$row['list'] = $list;
	$row['page'] = $page;
	$row['exp_change'] = M('member_creditslog')->where($map)->sum("affect_credits");
	return $row;
}

function getScoresLog($map,$size){
	if(empty($map['uid'])) return;
	
	if($size){
		//分页处理
		import("ORG.Util.Page");
		$count = M('member_scoreslog')->where($map)->count('id');
		$p = new Page($count, $size);
		$page = $p->show();
		$Lsql = "{$p->firstRow},{$p->listRows}";
		//分页处理
	}

	$list = M('member_scoreslog')->where($map)->order('id DESC')->limit($Lsql)->select();
	$type_arr = C("SCORES_TYPE");
	foreach($list as $key=>$v){
		$list[$key]['type_name'] = $type_arr[$v['type']]["name"];
	}
	
	$row=array();
	$row['list'] = $list;
	$row['page'] = $page;
	$row['scores_change'] = M('member_scoreslog')->where($map)->sum("affect_scores");
	return $row;
}

//所有圈子列表,以id为键
function Notice($type,$uid,$data=array()){
		$datag = get_global_setting();
		$datag=de_xie($datag);
		$msgconfig = FS("Webconfig/msgconfig");
		
		$emailTxt = FS("Webconfig/emailtxt");
		$smsTxt = FS("Webconfig/smstxt");
		$msgTxt = FS("Webconfig/msgtxt");
		$emailTxt=de_xie($emailTxt);
		$smsTxt=de_xie($smsTxt);
		$msgTxt=de_xie($msgTxt);
		//邮件
		import("ORG.Net.Email");
		$port =$msgconfig['stmp']['port']; 
		$smtpserver=$msgconfig['stmp']['server']; 
		$smtpuser = $msgconfig['stmp']['user']; 
		$smtppwd = $msgconfig['stmp']['pass']; 
		$mailtype = "HTML"; 
		$sender = $msgconfig['stmp']['user']; 
		$personal = $msgconfig['stmp']['personal']; 
		$smtp = new smtp($smtpserver,$port,true,$smtpuser,$smtppwd,$sender); 
		//邮件
		$minfo = M('members')->field('user_email,user_name,user_phone')->find($uid);
		$uname = $minfo['user_name'];
		$weburl = "http://".$_SERVER['HTTP_HOST'];
	switch($type){
		
		case 1://注册成功发送邮件
			$vcode = rand_string($uid,32,0,1);
			$link='<a href="'.$weburl.'/member/common/emailverify?vcode='.$vcode.'" style="color:#91273d">点击链接验证邮件</a>';
			/*站内信*/
			$body = str_replace(array("#UserName#"),array($uname),$msgTxt['regsuccess']); 
			addInnerMsg($uid,"恭喜您注册成功",$body);
			/*站内信*/
			/*邮件*/
			$subject = "您刚刚在".$datag['web_name']."注册成功"; 
			$body = str_replace(array("#UserName#","#LINK#"),array($uname,$link),$emailTxt['regsuccess']); 
			$to = $minfo['user_email']; 
			$send=$smtp->sendmail($to,$sender,$personal,$subject,$body,$mailtype); 
			/*邮件*/
			return $send;
		break;
		
		case 2://安全中心通过验证码改密码安全问题
			$vcode = rand_string($uid,10,3,3);
			$pcode = rand_string($uid,6,1,3);
			/*邮件*/
			$subject = "您刚刚在".$datag['web_name']."注册成功"; 
			$body = str_replace(array("#CODE#"),array($vcode),$emailTxt['safecode']); 
			$to = $minfo['user_email']; 
			$send=$smtp->sendmail($to,$sender,$personal,$subject,$body,$mailtype); 
			/*邮件*/
			
			//手机
			$content = str_replace(array("#CODE#"),array($pcode),$smsTxt['safecode']); 
			$sendp = sendsms($minfo['user_phone'],$content);
			return $send;
		break;
		
		case 3://安全中心通过验证码改手机
			$vcode = rand_string($uid,6,1,4);
			$content = str_replace(array("#CODE#"),array($vcode),$smsTxt['safecode']);
			if(C('SMS_TYPE') == "SIMU"){
				$send = $content;
			}else{
				$send = sendsms($minfo['user_phone'],$content);
			}
			return $send;
		break;
		case 4://安全中心新手机验证码
			$vcode = rand_string($uid,6,1,5);
			$content = str_replace(array("#CODE#"),array($vcode),$smsTxt['safecode']); 
			if(C('SMS_TYPE') == "SIMU"){
				$send = $content;
			}else{
				$send = sendsms($data['phone'],$content);
			}
			return $send;
		break;
		
		case 5://安全中心新手机验证码安全码
			$vcode = rand_string($uid,10,1,6);
			/*邮件*/
			$subject = "您刚刚在".$datag['web_name']."申请更换手机的安全码"; 
			$body = str_replace(array("#CODE#"),array($vcode),$emailTxt['changephone']); 
			$to = $minfo['user_email']; 
			$send=$smtp->sendmail($to,$sender,$personal,$subject,$body,$mailtype); 
			/*邮件*/
			return $send;
		break;
		
		case 6://借款发布成功审核通过
			/*邮件*/
			$subject = "恭喜，你在".$datag['web_name']."发布的借款审核通过"; 
			$body = str_replace(array("#UserName#"),array($uname),$emailTxt['verifysuccess']); 
			$to = $minfo['user_email']; 
			$send=$smtp->sendmail($to,$sender,$personal,$subject,$body,$mailtype); 
			/*邮件*/
			/*站内信*/
			$body = str_replace(array("#UserName#"),array($uname),$msgTxt['verifysuccess']); 
			addInnerMsg($uid,"恭喜借款审核通过",$body);
			/*站内信*/
			return $send;
		break;
		case 7://密码找回
			$vcode = rand_string($uid,32,0,7);
			$link='<a href="'.$weburl.'/member/common/getpasswordverify?vcode='.$vcode.'">点击链接验证邮件</a>';
			/*邮件*/
			$subject = "您刚刚在".$datag['web_name']."申请了密码找回"; 
			$body = str_replace(array("#UserName#","#LINK#"),array($uname,$link),$emailTxt['getpass']); 
			$to = $minfo['user_email']; 
			$send=$smtp->sendmail($to,$sender,$personal,$subject,$body,$mailtype); 
			/*邮件*/
			return $send;
		break;
		case 8://验证中心邮件验证
			$vcode = rand_string($uid,32,0,1);
			$link='<a href="'.$weburl.'/member/common/emailverify?vcode='.$vcode.'">点击链接验证邮件</a>';
			/*邮件*/
			$subject = "您刚刚在".$datag['web_name']."申请邮件验证"; 
			$body = str_replace(array("#UserName#","#LINK#"),array($uname,$link),$emailTxt['regsuccess']); 
			$to = $minfo['user_email']; 
			$send=$smtp->sendmail($to,$sender,$personal,$subject,$body,$mailtype); 
			/*邮件*/
			return $send;
		break;
		case 9://支付密码找回
			$vcode = rand_string($uid,32,0,9);
			$link='<a href="'.$weburl.'/member/user/getpinpasswordverify?vcode='.$vcode.'" style="color:#942538">点击链接验证邮件</a>';
			/*邮件*/
			$subject = "您刚刚在".$datag['web_name']."申请了支付密码找回"; 
			$body = str_replace(array("#UserName#","#LINK#"),array($uname,$link),$emailTxt['getpinpass']); 
			$to = $minfo['user_email']; 
			$send=$smtp->sendmail($to,$sender,$personal,$subject,$body,$mailtype); 
			/*邮件*/
			return $send;
		break;
		case 10://安全中心邮箱验证码
			$vcode = rand_string($uid,10,1,6);
			/*邮件*/
			$subject = "您刚刚在".$datag['web_name']."申请更换新邮箱"; 
			$body = str_replace(array("#CODE#"),array($vcode),$emailTxt['safecode']); 
			$to = $minfo['user_email']; 
			$send=$smtp->sendmail($to,$sender,$personal,$subject,$body,$mailtype); 
			/*邮件*/
			return $send;
		break;
		
	}
}

function SMStip($type,$mob,$from=array(),$to=array(), $borrow_id=null, $user_id=null){
	if(empty($mob)) return;
	$datag = get_global_setting();
	$datag=de_xie($datag);
	$smsTxt = FS("Webconfig/smstxt");
	$smsTxt=de_xie($smsTxt);
	if($smsTxt[$type]['enable']==1){
		$body = str_replace($from,$to,$smsTxt[$type]['content']); 
		if(C('SMS_TYPE') == "REAL"){
			$sendRtn=sendsmsforrtn($mob,$body); 
		}
		//记录短信日志
		massSmsLog($body, explode(",", $mob), $user_id, $borrow_id, 0, $type, $sendRtn->Result, null);
	}else{
		return;	
	}
}

function SMStip3($type,$mob,$smscontent, $borrow_id=null, $user_id=null){
	if(empty($mob)) return;
	if(C('SMS_TYPE') == "REAL"){
		$sendRtn=sendsmsforrtn($mob, $smscontent); 
	}
	//记录短信日志
	if(!is_array($user_id))
		$user_id = explode(",", $user_id);
	massSmsLog($smscontent, explode(",", $mob), $user_id, $borrow_id, 0, $type, $sendRtn->Result, null);
}


//所有圈子列表,以id为键
function MTip($type, $uid = 0, $info = "") {
	$datag = get_global_setting ();
	$datag = de_xie ( $datag );
	
	//邮件
	import("ORG.Net.Email");
	$msgconfig = FS("Webconfig/msgconfig");
	$port =$msgconfig['stmp']['port']; 
	$smtpserver=$msgconfig['stmp']['server']; 
	$smtpuser = $msgconfig['stmp']['user']; 
	$smtppwd = $msgconfig['stmp']['pass']; 
	$mailtype = "HTML"; 
	$sender = $msgconfig['stmp']['user'];
	$personal = $msgconfig['stmp']['personal']; 
	$smtp = new smtp($smtpserver,$port,true,$smtpuser,$smtppwd,$sender);
	
	$id1 = "{$type}_1";
	$id2 = "{$type}_2";
	$per = C ( 'DB_PREFIX' );
	
	//获取消息设置
	$systips = M("sys_tip")->find($uid);
	
	$memail = M("members")->alias("m")->field("m.user_name,m.user_email,m.user_phone,m.id,ms.email_status,ms.phone_status")->join("left join {$per}members_status ms on m.id=ms.uid")->where(array("m.id"=>$uid))->find();
	if(empty($memail))return false;
	$to = "";
	$borrow_id = null;
	switch ($type) {
		case "chk1" : // 修改密码
			$innerbody = "您刚刚修改了登陆密码,如不是自己操作,请尽快联系客服";
			if(checkNeedTip($systips, 'pass_1')){
				addInnerMsg ( $memail ['id'], "您刚刚修改了登陆密码", $innerbody );
			}
			if(checkNeedTip($systips, 'pass_2') && $memail["email_status"] == 1){
				/* 邮件 */
				$subject = "您刚刚在" . $datag ['web_name'] . "修改了登陆密码";
				$body = "您刚刚在" . $datag ['web_name'] . "修改了登陆密码,如不是自己操作,请尽快联系客服";
				$to = $memail ['user_email'];
			}
			break;
		case "chk2" : // 修改银行帐号
			$innerbody = "您刚刚修改了提现的银行帐户,如不是自己操作,请尽快联系客服";
			if(checkNeedTip($systips, 'baccount_1')){
				addInnerMsg ( $memail ['id'], "您刚刚修改了提现的银行帐户", $innerbody );
			}
			if(checkNeedTip($systips, 'baccount_2') && $memail["email_status"] == 1){
				$subject = "您刚刚在" . $datag ['web_name'] . "修改了提现的银行帐户";
				$body = "您刚刚在" . $datag ['web_name'] . "修改了提现的银行帐户,如不是自己操作,请尽快联系客服";
				$to = $memail ['user_email'];
			}
			if(checkNeedTip($systips, 'baccount_3') && $memail["phone_status"] == 1){
				SMStip3("modifybank",$memail['user_phone'], $innerbody, null, $uid);
			}
			break;
		case "chk6" : // 资金提现
			$innerbody = "您刚刚申请了提现操作,如不是自己操作,请尽快联系客服";
			if(checkNeedTip($systips, 'withdraw_1')){
				addInnerMsg ( $memail ['id'], "您刚刚申请了提现操作", $innerbody );
			}
			if(checkNeedTip($systips, 'withdraw_2') && $memail["email_status"] == 1){
				$subject = "您刚刚在" . $datag ['web_name'] . "申请了提现操作";
				$body = "您刚刚在" . $datag ['web_name'] . "申请了提现操作,如不是自己操作,请尽快联系客服";
				$to = $memail ['user_email'];
			}
			break;
		case "chk7" : // 借款标初审未通过
			$borrow_id = $info;
			$innerbody = "您发布的第{$info}号借款标刚刚初审未通过";
			if(checkNeedTip($systips, 'borrowunapproved_1')){
				addInnerMsg ( $memail ['id'], "刚刚您的借款标初审未通过", $innerbody );
			}
			if(checkNeedTip($systips, 'borrowunapproved_2') && $memail["email_status"] == 1){
				$subject = "您在" . $datag ['web_name'] . "发布的借款标刚刚初审未通过";
				$body = "您在" . $datag ['web_name'] . "发布的第{$info}号借款标刚刚初审未通过";
				$to = $memail ['user_email'];
			}
			break;
		case "chk8" : // 借款标初审通过
			$borrow_id = $info;
			$innerbody = "您发布的第{$info}号借款标刚刚初审通过";
			if(checkNeedTip($systips, 'borrowapproved_1')){
				addInnerMsg ( $memail ['id'], "刚刚您的借款标初审通过", $innerbody );
			}
			if(checkNeedTip($systips, 'borrowapproved_2') && $memail["email_status"] == 1){
				$subject = "您在" . $datag ['web_name'] . "发布的借款标刚刚初审通过";
				$body = "您在" . $datag ['web_name'] . "发布的第{$info}号借款标刚刚初审通过";
				$to = $memail ['user_email'];
			}
			break;
		case "chk9" : // 借款标复审通过
			$borrow_id = $info;
			$innerbody = "您发布的第{$info}号借款标刚刚复审通过";
			if(checkNeedTip($systips, 'borrowsecond_1')){
				addInnerMsg ( $memail ['id'], "刚刚您的借款标复审通过", $innerbody );
			}
			if(checkNeedTip($systips, 'borrowsecond_2') && $memail["email_status"] == 1){
				$subject = "您在" . $datag ['web_name'] . "发布的借款标刚刚复审通过";
				$body = "您在" . $datag ['web_name'] . "发布的第{$info}号借款标刚刚复审通过";
				$to = $memail ['user_email'];
			}
			break;
		case "chk12" : // 借款标复审未通过
			$borrow_id = $info;
			$innerbody = "您发布的第{$info}号借款标复审未通过";
			if(checkNeedTip($systips, 'borrowunsecond_1')){
				addInnerMsg ( $memail ['id'], "刚刚您的借款标复审未通过", $innerbody );
			}
			if(checkNeedTip($systips, 'borrowunsecond_2') && $memail["email_status"] == 1){
				$subject = "您在" . $datag ['web_name'] . "的发布的借款标刚刚复审未通过";
				$body = "您在" . $datag ['web_name'] . "的发布的第{$info}号借款标复审未通过";
				$to = $memail ['user_email'];
			}
			break;
		case "chk10" : // 借款标满标
			$borrow_id = $info;
			$innerbody = "刚刚您的借款标已满标";
			if(checkNeedTip($systips, 'finishborrow_1')){
				addInnerMsg ( $memail ['id'], "刚刚您的第{$info}号借款标已满标", $innerbody );
			}
			if(checkNeedTip($systips, 'finishborrow_2') && $memail["email_status"] == 1){
				$subject = "您在" . $datag ['web_name'] . "的借款标已满标";
				$body = "刚刚您在" . $datag ['web_name'] . "的第{$info}号借款标已满标，请登陆查看";
				$to = $memail ['user_email'];
			}
			break;
		case "chk11" : // 借款标流标
			$borrow_id = $info;
			$innerbody = "您的第{$info}号借款标已流标";
			if(checkNeedTip($systips, 'unfinishborrow_1')){
				addInnerMsg ( $memail ['id'], "刚刚您的借款标已流标", $innerbody );
			}
			if(checkNeedTip($systips, 'unfinishborrow_2') && $memail["email_status"] == 1){
				$subject = "您在" . $datag ['web_name'] . "的借款标已流标";
				$body = "您在" . $datag ['web_name'] . "发布的第{$info}号借款标已流标，请登陆查看";
				$to = $memail ['user_email'];
			}
			break;
		case "chk25" : // 借入人还款成功
			$borrow_id = $info;
			$innerbody = "您对借入的第{$info}号借款进行了还款";
			if(checkNeedTip($systips, 'repaysuccess_1')){
				addInnerMsg ( $memail ['id'], "您对借入标还款进行了还款操作", $innerbody );
			}
			if(checkNeedTip($systips, 'repaysuccess_2') && $memail["email_status"] == 1){
				$subject = "您在" . $datag ['web_name'] . "的借入的还款进行了还款操作";
				$body = "您对在" . $datag ['web_name'] . "借入的第{$info}号借款进行了还款，请登陆查看";
				$to = $memail ['user_email'];
			}
			break;
		case "chk27" : // 自动投标借出完成
			$borrow_id = $info;
			$innerbody = "您设置的自动投标对第{$info}号借款进行了投标";
			if(checkNeedTip($systips, 'autoborrow_1')){
				addInnerMsg ( $memail ['id'], "您设置的自动投标按设置投了新标", $innerbody );
			}
			break;
		case "chk14" : // 借出成功
			$borrow_id = $info;
			$innerbody = "您投标的借款成功了";
			if(checkNeedTip($systips, 'investsuccess_1')){
				addInnerMsg ( $memail ['id'], "您投标的第{$info}号借款借款成功", $innerbody );
			}
			break;
		case "chk15" : // 借出流标
			$borrow_id = $info;
			$innerbody = "您投标的借款流标了";
			if(checkNeedTip($systips, 'investunfinish_1')){
				addInnerMsg ( $memail ['id'], "您投标的第{$info}号借款流标了，相关资金已经返回帐户", $innerbody );
			}
			break;
		case "chk16" : // 收到还款
			$borrow_id = $info;
			$innerbody = "您借出的借款收到了新的还款";
			if(checkNeedTip($systips, 'getpay_1')){
				addInnerMsg ( $memail ['id'], "您借出的第{$info}号借款收到了新的还款", $innerbody );
			}
			break;
		case "chk18" : // 网站代为偿还
			$borrow_id = $info;
			$innerbody = "您借出的第{$info}号借款逾期网站代还了本金";
			if(checkNeedTip($systips, 'altpay_1')){
				addInnerMsg ( $memail ['id'], "您借出的第{$info}号借款逾期网站代还了本金", $innerbody );
			}
			break;
		case "payonline"://在线充值
			$innerbody = "在线充值已到帐";
			if(checkNeedTip($systips, 'recharge_1')){
				addInnerMsg ( $memail ['id'], "您好，您在线充值{$info}元已到帐", $innerbody );
			}
			if(checkNeedTip($systips, 'recharge_2') && $memail["email_status"] == 1){
				$subject = "您在" . $datag ['web_name'] . "在线充值{$info}元已到帐";
				$body = "您在" . $datag ['web_name'] . "在线充值{$info}元已到帐，请登陆查看";
				$to = $memail ['user_email'];
			}
			if(checkNeedTip($systips, 'recharge_3') && $memail["phone_status"] == 1){
				SMStip("payonline",$memail['user_phone'],array("#USERANEM#","#MONEY#"),array($memail["user_name"], $info), null, array($uid));
			}
			break;
		case "autoinvest":
			if(checkNeedTip($systips, 'autoborrowfail_1')){
				$defresult = "失败";
				if(!empty($info['result']))$defresult = $info['result'];
				$innerbody = "您好，编号{$info['auto_id']}自动投标对第{$info['borrow_id']}号标投标{$defresult}，{$defresult}原因：{$info['fail_reason']}";
				addInnerMsg ( $memail ['id'], "编号{$info['auto_id']}自动投标对第{$info['borrow_id']}号标投标{$defresult}", $innerbody);
			}
			break;
	}
	if(!empty($to)){
		//$send=$smtp->sendmail($to,$sender,$personal,$subject,$body,$mailtype);
		$sent_time = null;
		//if($send === TRUE)$sent_time = date('Y-m-d H:i:s',time());
		massEmailLog($subject, $body, $type, $sender, array(array("email"=>$to,"type"=>"to","uid"=>$uid)), null, $sent_time, $borrow_id);
	}
	return $send;
}

function investMoney($uid,$borrow_id,$money,$_is_auto=0,$auto_no=null){
	$pre = C('DB_PREFIX');
	$done = false;
	$datag = get_global_setting();
	//$fee_invest_manage = explode("|",$datag['fee_invest_manage']);
	//lock(true)防并发
	$investMoney = D('borrow_investor');
	$investMoney->startTrans();
	
	$binfo = M("borrow_info")->lock(true)->field("borrow_uid,borrow_money,borrow_interest_rate,borrow_type,borrow_duration,repayment_type,has_borrow,reward_money,borrow_min")->find($borrow_id);//新加入了奖金reward_money到资金总额里
	$vminfo = getMinfo($uid,'m.user_leve,m.time_limit,mm.account_money');
	
	if(($vminfo['account_money']+$binfo['reward_money'])<$money) 
	{
		$investMoney->commit() ;
		return "您当前的可用金额为：".$vminfo['account_money']."，您的投标金额为{$money}， 对不起，可用余额不足，不能投标";
		}
	
	

	//不同会员级别的费率
	//($vminfo['user_leve']==1 && $vminfo['time_limit']>time())?$fee_rate=($fee_invest_manage[1]/100):$fee_rate=($fee_invest_manage[0]/100);
	$fee_rate=$datag['fee_invest_manage']/100;
	//投入的钱
	//$havemoney = $binfo['has_borrow'];
	//if(($binfo['borrow_money'] - $havemoney -$money)<0 ) 
	
	//{   $investMoney->commit() ;
	//	return "对不起，此标还差".($binfo['borrow_money'] - $havemoney)."元满标，您最多投标".($binfo['borrow_money'] - $havemoney)."元";
    //}
		
    $havemoney = M("borrow_investor")->where(array("borrow_id"=>$borrow_id))->sum("investor_capital");
	$leftMoney = $binfo['borrow_money'] - $havemoney;
	if(($leftMoney - $money)<0 ){
		$investMoney->commit() ;
		return "对不起，此标还差".$leftMoney."元满标，您最多投标".$leftMoney."元";
	}
	if(($leftMoney - $money) > 0 && ($leftMoney - $money) < $binfo['borrow_min']){
		$investMoney->commit() ;
		return "对不起，您的投标金额将导致标剩余金额不足最低投标限制{$binfo['borrow_min']}元，请修改金额";
	}
	
	//自动投标总限额校验
	if( $_is_auto == 1){
		$autoTotalMax = floor($binfo['borrow_money']*0.5);
		$autoLeftMoney = $autoTotalMax - $havemoney;
		if($autoLeftMoney == 0){
			$investMoney->commit() ;
			return "对不起，自动投标总限额{$binfo['auto_totalnum']}%，目前已投资{$autoTotalMax}元，您无法再自动投此标";
		}
		if(($autoLeftMoney - $money)<0 ){
			$investMoney->commit() ;
			return "automaxajust|".$autoLeftMoney;
		}
		if(($autoLeftMoney - $money)>0 && ($autoLeftMoney - $money) < $binfo['borrow_min']){
			$investMoney->commit() ;
			return "autominajust|".($autoLeftMoney - $binfo['borrow_min']);
		}
	}
	
	$investMoney = D('borrow_investor');
	$investMoney->startTrans();
		//还款概要公共信息START
		$investinfo['status'] = 1;//等待复审
		$investinfo['borrow_id'] = $borrow_id;
		$investinfo['investor_uid'] = $uid;
		$investinfo['borrow_uid'] = $binfo['borrow_uid'];
		$investinfo['investor_capital'] = $money;
		$investinfo['is_auto'] = $_is_auto;
		$investinfo['add_time'] = time();
		if($_is_auto == 1){
			$investinfo['auto_no'] = $auto_no;
		}
		//还款详细公共信息START
		$savedetail=array();
		switch($binfo['repayment_type']){
			case 1://按天到期还款
				//还款概要START
				$investinfo['investor_interest'] = getFloatValue($binfo['borrow_interest_rate']*$investinfo['investor_capital']*$binfo['borrow_duration']/100,4);
				//$investinfo['invest_fee'] = getFloatValue($fee_rate * $investinfo['investor_interest']/100,2);
				$investinfo['invest_fee'] = getFloatValue($fee_rate * $investinfo['investor_interest'],4);//修改投资人的天标管理费2013-03-19 fan
				$invest_info_id = M('borrow_investor')->add($investinfo);
				//还款概要END
				$i=1;
				$investdetail['borrow_id'] = $borrow_id;
				$investdetail['invest_id'] = $invest_info_id;
				$investdetail['investor_uid'] = $uid;
				$investdetail['borrow_uid'] = $binfo['borrow_uid'];
				$investdetail['capital'] = $investinfo['investor_capital'];
				$investdetail['interest'] = $investinfo['investor_interest'];
				$investdetail['interest_fee'] = $investinfo['invest_fee'];
				$investdetail['status'] = 0;
				$investdetail['sort_order'] = $i;
				$investdetail['total'] = $binfo['borrow_duration'];
				$savedetail[] = $investdetail;
			break;
			case 2://每月还款
				//还款概要START
				$monthData['type'] = "all";
				$monthData['money'] = $investinfo['investor_capital'];
				$monthData['year_apr'] = $binfo['borrow_interest_rate'];
				$monthData['duration'] = $binfo['borrow_duration'];
				$repay_detail = EqualMonth($monthData);
				
				$investinfo['investor_interest'] = ($repay_detail['repayment_money'] - $investinfo['investor_capital']);
				$investinfo['invest_fee'] = getFloatValue($fee_rate * $investinfo['investor_interest'],4);
				$invest_info_id = M('borrow_investor')->add($investinfo);
				//还款概要END
				
				$monthDataDetail['money'] = $investinfo['investor_capital'];
				$monthDataDetail['year_apr'] = $binfo['borrow_interest_rate'];
				$monthDataDetail['duration'] = $binfo['borrow_duration'];
				$repay_list = EqualMonth($monthDataDetail);
				$i=1;
				foreach($repay_list as $key=>$v){
					$investdetail['borrow_id'] = $borrow_id;
					$investdetail['invest_id'] = $invest_info_id;
					$investdetail['investor_uid'] = $uid;
					$investdetail['borrow_uid'] = $binfo['borrow_uid'];
					$investdetail['capital'] = $v['capital'];
					$investdetail['interest'] = $v['interest'];
					$investdetail['interest_fee'] = getFloatValue($fee_rate*$v['interest'],4);
					$investdetail['status'] = 0;
					$investdetail['sort_order'] = $i;
					$investdetail['total'] = $binfo['borrow_duration'];
					$i++;
					$savedetail[] = $investdetail;
				}
			break;
			case 3://按季分期还款
				//还款概要START

				$monthData['month_times'] = $binfo['borrow_duration'];
				$monthData['account'] = $investinfo['investor_capital'];
				$monthData['year_apr'] = $binfo['borrow_interest_rate'];
				$monthData['type'] = "all";
				$repay_detail = EqualSeason($monthData);
				
				$investinfo['investor_interest'] = ($repay_detail['repayment_money'] - $investinfo['investor_capital']);
				$investinfo['invest_fee'] = getFloatValue($fee_rate * $investinfo['investor_interest'],4);
				$invest_info_id = M('borrow_investor')->add($investinfo);
				//还款概要END
				
				$monthDataDetail['month_times'] = $binfo['borrow_duration'];
				$monthDataDetail['account'] = $investinfo['investor_capital'];
				$monthDataDetail['year_apr'] = $binfo['borrow_interest_rate'];
				$repay_list = EqualSeason($monthDataDetail);
				$i=1;
				foreach($repay_list as $key=>$v){
					$investdetail['borrow_id'] = $borrow_id;
					$investdetail['invest_id'] = $invest_info_id;
					$investdetail['investor_uid'] = $uid;
					$investdetail['borrow_uid'] = $binfo['borrow_uid'];
					$investdetail['capital'] = $v['capital'];
					$investdetail['interest'] = $v['interest'];
					$investdetail['interest_fee'] = getFloatValue($fee_rate*$v['interest'],4);
					$investdetail['status'] = 0;
					$investdetail['sort_order'] = $i;
					$investdetail['total'] = $binfo['borrow_duration'];
					$i++;
					$savedetail[] = $investdetail;
				}
			break;
			case 4://按季分期还款
				$monthData['month_times'] = $binfo['borrow_duration'];
				$monthData['account'] = $investinfo['investor_capital'];
				$monthData['year_apr'] = $binfo['borrow_interest_rate'];
				$monthData['type'] = "all";
				$repay_detail = EqualEndMonth($monthData);
				
				$investinfo['investor_interest'] = ($repay_detail['repayment_account'] - $investinfo['investor_capital']);
				$investinfo['invest_fee'] = getFloatValue($fee_rate * $investinfo['investor_interest'],4);
				$invest_info_id = M('borrow_investor')->add($investinfo);
				//还款概要END
				
				$monthDataDetail['month_times'] = $binfo['borrow_duration'];
				$monthDataDetail['account'] = $investinfo['investor_capital'];
				$monthDataDetail['year_apr'] = $binfo['borrow_interest_rate'];
				$repay_list = EqualEndMonth($monthDataDetail);
				$i=1;
				foreach($repay_list as $key=>$v){
					$investdetail['borrow_id'] = $borrow_id;
					$investdetail['invest_id'] = $invest_info_id;
					$investdetail['investor_uid'] = $uid;
					$investdetail['borrow_uid'] = $binfo['borrow_uid'];
					$investdetail['capital'] = $v['capital'];
					$investdetail['interest'] = $v['interest'];
					$investdetail['interest_fee'] = getFloatValue($fee_rate*$v['interest'],4);
					$investdetail['status'] = 0;
					$investdetail['sort_order'] = $i;
					$investdetail['total'] = $binfo['borrow_duration'];
					$i++;
					$savedetail[] = $investdetail;
				}
			break;
		}
		$invest_defail_id = M('investor_detail')->addAll($savedetail);//保存还款详情
		
		//更新投标进度
		$last_have_money = M("borrow_info")->getFieldById($borrow_id,"has_borrow");
		$upborrowsql = "update `{$pre}borrow_info` set ";
		//if($binfo['borrow_type']==3) $upborrowsql .="`transfer_out` = `transfer_out` + $num,";//流转标还要更新流转数量
		$upborrowsql .= "`has_borrow`=".($last_have_money+$money).",`borrow_times`=`borrow_times`+1";
		$upborrowsql .= " WHERE `id`={$borrow_id}";
		$upborrow_res = M()->execute($upborrowsql);
		//更新投标进度
	if($invest_defail_id && $invest_info_id && $upborrow_res){//还款概要和详情投标进度都保存成功
		$investMoney->commit() ;
		$res = memberMoneyLog($uid,6,-$money,"对{$borrow_id}号标进行投标",$binfo['borrow_uid']);
		
		if( ($havemoney+$money) == $binfo['borrow_money'] ){
			borrowFull($borrow_id,$binfo['borrow_type']);//满标，标记为还款中，更新相关数据
			MTip("chk10", $binfo['borrow_uid'], $borrow_id);
		}
		
		
		if(!$res){//没有正常记录和扣除帐户余额的话手动回滚
			M('investor_detail')->where("invest_id={$invest_info_id}")->delete();
			M('borrow_investor')->where("id={$invest_info_id}")->delete();
			//更新投标进度
			$upborrowsql = "update `{$pre}borrow_info` set ";
			$upborrowsql .= "`has_borrow`=".$havemoney.",`borrow_times`=`borrow_times`-1";
			$upborrowsql .= " WHERE `id`={$borrow_id}";
			$upborrow_res = M()->execute($upborrowsql);
			//更新投标进度
			$done = false;
		}else{
			$done = true;
		}
	}else{
		$investMoney->rollback() ;
	}
	
	return $done;
}
//满标处理
function borrowFull($borrow_id,$btype = 0){
	if($btype==3){//秒还标
		borrowApproved($borrow_id);
		borrowRepayment($borrow_id,1);
	}else{
		$saveborrow['borrow_status']=4;
		$saveborrow['full_time']=time();
		$upborrow_res = M("borrow_info")->where("id={$borrow_id}")->save($saveborrow);
	}
}
function borrowRefuse($borrow_id,$type){
	$pre = C('DB_PREFIX');
	$done = false;
	$borrowInvestor = D('borrow_investor');
	$binfo = M("borrow_info")->field("borrow_name,borrow_type,borrow_money,borrow_uid,borrow_duration,repayment_type")->find($borrow_id);
	//$investorList = $borrowInvestor->field('id,investor_uid,investor_capital')->where("borrow_id={$borrow_id}")->select();
	$investorList = M("borrow_investor")->field('id,investor_uid,investor_capital')->where("borrow_id={$borrow_id}")->select();
	M('investor_detail')->where("borrow_id={$borrow_id}")->delete();
	if($binfo['borrow_type']==1) $limit_credit = memberLimitLog($binfo['borrow_uid'],12,($binfo['borrow_money']),$info="{$binfo['id']}号标流标");//返回额度
	$borrowInvestor->startTrans();
	
	$bstatus = ($type==2)?3:5;
	$upborrow_info = M('borrow_info')->where("id={$borrow_id}")->setField("borrow_status",$bstatus);
	//处理借款概要
	$buname = M('members')->getFieldById($binfo['borrow_uid'],'user_name');
	//处理借款概要
	if(is_array($investorList)){
		$upsummary_res = M('borrow_investor')->where("borrow_id={$borrow_id}")->setField("status",$type);
		foreach($investorList as $v){
			MTip('chk15',$v['investor_uid'],$borrow_id);//sss
			$accountMoney_investor = M("member_money")->field(true)->find($v['investor_uid']);
			$datamoney_x['uid'] = $v['investor_uid'];
			$datamoney_x['type'] = ($type==3)?16:8;
			$datamoney_x['affect_money'] = $v['investor_capital'];
			$datamoney_x['account_money'] = ($accountMoney_investor['account_money'] + $datamoney_x['affect_money']);
			$datamoney_x['collect_money'] = $accountMoney_investor['money_collect'];
			$datamoney_x['freeze_money'] = $accountMoney_investor['money_freeze'] - $datamoney_x['affect_money'];
			//会员帐户
			$mmoney_x['money_freeze']=$datamoney_x['freeze_money'];
			$mmoney_x['money_collect']=$datamoney_x['collect_money'];
			$mmoney_x['account_money']=$datamoney_x['account_money'];
			//会员帐户
			$_xstr = ($type==3)?"复审未通过":"募集期内标未满,流标";
			$datamoney_x['info'] = "第{$borrow_id}号标".$_xstr."，返回冻结资金";
			$datamoney_x['add_time'] = time();
			$datamoney_x['add_ip'] = get_client_ip();
			$datamoney_x['target_uid'] = $binfo['borrow_uid'];
			$datamoney_x['target_uname'] = $buname;
			$moneynewid_x = M('member_moneylog')->add($datamoney_x);
			if($moneynewid_x) $bxid = M('member_money')->where("uid={$datamoney_x['uid']}")->save($mmoney_x);
		}

		//邮件提醒
		$subject = "您投标的借款[".$binfo['borrow_name']."]流标了";
		$link='<br /><a href="http://'.$_SERVER['HTTP_HOST'].'/invest/'.$borrow_id.'.html" style="color:#91273d">点击查看['.$binfo['borrow_name'].']</a>';
		investEmail($subject, $subject.$link, 'chk15', "investunfinish_2", $borrow_id);
	}else{
		$moneynewid_x = true;
		$bxid=true;
		$upsummary_res=true;
	}
	
	if($moneynewid_x && $upsummary_res && $bxid && $upborrow_info){
		$done=true;
		$borrowInvestor->commit();
	}else{
		$borrowInvestor->rollback() ;
	}
	
	return $done;
}

function borrowApproved($borrow_id){
	$pre = C('DB_PREFIX');
	$done = false;
	$borrowInvestor = D('borrow_investor');
	$binfo = M("borrow_info")->field("borrow_name,borrow_type,reward_type,reward_num,borrow_fee,borrow_money,borrow_uid,borrow_duration,repayment_type")->find($borrow_id);
	$investorList = $borrowInvestor->field('id,investor_uid,investor_capital,investor_interest')->where("borrow_id={$borrow_id}")->select();
	
	$endTime = strtotime(date("Y-m-d",time())." 23:59:59");
	if($binfo['repayment_type']==1) $deadline_last = strtotime("+{$binfo['borrow_duration']} day",$endTime);
	else $deadline_last = strtotime("+{$binfo['borrow_duration']} month",$endTime);
	
	$borrowInvestor->startTrans();
	//更新投资概要
	$_investor_num = count($investorList);
	foreach($investorList as $key=>$v){
		if($binfo['reward_type']>0){
			if($binfo['reward_type']==1) $_reward_money = getFloatValue($v['investor_capital']*$binfo['reward_num']/100,4);
			elseif($binfo['reward_type']==2) $_reward_money = getFloatValue($binfo['reward_num']/$_investor_num,4);
		}
		$investorList[$key]['reward_money'] =floatval($_reward_money);

		MTip('chk14',$v['investor_uid'],$borrow_id);//sss
		$saveinfo=array();
		$saveinfo['id'] = $v['id'];
		$saveinfo['reward_money'] = floatval($_reward_money);
		$saveinfo['deadline'] = $deadline_last;
		$saveinfo['status'] = 4;//还款中
		$upsummary_res = $borrowInvestor->save($saveinfo);
	}
	//邮件提醒
	$subject = "您投标的借款[".$binfo['borrow_name']."]成功了";
	$link='<br /><a href="http://'.$_SERVER['HTTP_HOST'].'/invest/'.$borrow_id.'.html" style="color:#91273d">点击查看['.$binfo['borrow_name'].']</a>';
	investEmail($subject, $subject.$link, 'chk14', "investsuccess_2", $borrow_id);
	
	//更新投资概要
	//更新借款信息
	$upborrow_res = M()->execute("update `{$pre}borrow_info` set `deadline`={$deadline_last} WHERE `id`={$borrow_id}");
	//更新借款信息
	//更新投资详细
	switch($binfo['repayment_type']){
		case 2://每月还款
		case 3://每季还本
		case 4://期未还本
			for($i=1;$i<=$binfo['borrow_duration'];$i++){
				$deadline=0;
				$deadline=strtotime("+{$i} month",$endTime);
				$updetail_res = M()->execute("update `{$pre}investor_detail` set `deadline`=$deadline,`status`=7 WHERE `borrow_id`={$borrow_id} AND `sort_order`=$i");
			}
		break;
		case 1://按天一次性还款
				$deadline=0;
				$deadline=$deadline_last;
				$updetail_res = M()->execute("update `{$pre}investor_detail` set `deadline`=$deadline,`status`=7 WHERE `borrow_id`={$borrow_id}");
		break;
	}		
	//更新投资详细

	if($updetail_res!==false && $upsummary_res!==false && $upborrow_res!==false){
		$done=true;
		$borrowInvestor->commit();
		//借款者帐户
			$_P_fee=get_global_setting();
			
			$_borraccount = memberMoneyLog($binfo['borrow_uid'],17,$binfo['borrow_money'],"第{$borrow_id}号标复审通过，借款金额入帐");//借款入帐
		if(!$_borraccount) return false;//借款者帐户处理出错
			$_borrfee = memberMoneyLog($binfo['borrow_uid'],18,-$binfo['borrow_fee'],"第{$borrow_id}号标借款成功，扣除借款管理费");//借款
		if(!$_borrfee) return false;//借款者帐户处理出错
			$_freezefee = memberMoneyLog($binfo['borrow_uid'],19,-$binfo['borrow_money']*$_P_fee['money_deposit']/100,"第{$borrow_id}号标借款成功，冻结{$_P_fee['money_deposit']}%的保证金");//冻结保证金
			
		if(!$_freezefee) return false;//借款者帐户处理出错
		//借款者帐户
		//投资者帐户
		$_investor_num = count($investorList);
		$_remoney_do = true;
		foreach($investorList as $v){
			//投标奖励
			if($v['reward_money']>0){
				$_remoney_do = false;
				$_reward_m = memberMoneyLog($v['investor_uid'],20,$v['reward_money'],"第{$borrow_id}号标复审通过，获取投标奖励",$binfo['borrow_uid']);
				$_reward_m_give = memberMoneyLog($binfo['borrow_uid'],21,-$v['reward_money'],"第{$borrow_id}号标复审通过，支付投标奖励",$v['investor_uid']);
				if($_reward_m && $_reward_m_give) $_remoney_do = true;
			}
			//投标奖励
			
			$remcollect = memberMoneyLog($v['investor_uid'],15,$v['investor_capital'],"第{$borrow_id}号标复审通过，冻结本金成为待收金额",$binfo['borrow_uid']);
			$reinterestcollect = memberMoneyLog($v['investor_uid'],28,$v['investor_interest'],"第{$borrow_id}号标复审通过，应收利息成为待收金额",$binfo['borrow_uid']);
			
			//////////////////////邀请奖励开始////////////////////////////////////////
			/*
			$vo = M('members')->field('user_name,recommend_id')->find($v['investor_uid']);
			$_rate = $_P_fee['award_invest']/1000;//推广奖励
			if($vo['recommend_id']!=0){
				if(($binfo['borrow_type']=='1' || $binfo['borrow_type']=='2' || $binfo['borrow_type']=='5' || $binfo['borrow_type']=='6') ){
					if($binfo['repayment_type']!='1')$jiangli = round($_rate * $v['investor_capital'],2);
					else $jiangli = round($_rate * $v['investor_capital'] * $binfo['borrow_duration'] / 30, 2);
					memberMoneyLog($vo['recommend_id'],13,$jiangli,$vo['user_name']."对{$borrow_id}号标投资成功，你获得推广奖励".$jiangli."元。",$v['investor_uid']);
				}
			}
			*/
			
			/////////////////////邀请奖励结束/////////////////////////////////////////
			
			//投标经验跟积分
			memberCreditsLog($v['investor_uid'],10,$v['investor_capital'],"投资经验奖励", "borrow_investor"."_".$v["id"]);
			memberScoresLog($v['investor_uid'],10,$v['investor_capital']/10,"投资积分奖励", "borrow_investor"."_".$v["id"]);
		}
		if(!$_remoney_do||!$remcollect||!$reinterestcollect) return false;//投资者帐户处理出错
		//投资者帐户
	}else{
		$borrowInvestor->rollback() ;
	}
	
	return $done;
}

function lastRepayment($binfo){
	$x=true;//因为下面有!x的判断，所以为了避免影响其他标，这里默认为true
	if($binfo['borrow_type']==2){
		$x=false;
		//返回借款人的借款担保额度
		$x = memberLimitLog($binfo['borrow_uid'],8,($binfo['borrow_money']),$info="{$binfo['id']}号标还款完成");
		if(!$x) return false;
		//返回投资人的投资担保额度
		$vocuhlist = M('borrow_vouch')->field("uid,vouch_money")->where("borrow_id={$binfo['id']}")->select();
		foreach($vocuhlist as $vv){
			$x = memberLimitLog($vv['uid'],10,($vv['vouch_money']),$info="您担保的{$binfo['id']}号标还款完成");
		}
	}elseif($binfo['borrow_type']==1){
		$x=false;
		$x = memberLimitLog($binfo['borrow_uid'],7,($binfo['borrow_money']),$info="{$binfo['id']}号标还款完成");
	}
	//如果是担保
	
	if(!$x) return false;
	


	//解冻保证金
	$_P_fee=get_global_setting();
	$accountMoney_borrower = M('member_money')->field('account_money,money_collect,money_freeze')->find($binfo['borrow_uid']);
	$datamoney_x['uid'] = $binfo['borrow_uid'];
	$datamoney_x['type'] = 24;
	$datamoney_x['affect_money'] = ($binfo['borrow_money']*$_P_fee['money_deposit']/100);
	$datamoney_x['account_money'] = ($accountMoney_borrower['account_money'] + $datamoney_x['affect_money']);
	$datamoney_x['collect_money'] = $accountMoney_borrower['money_collect'];
	$datamoney_x['freeze_money'] = ($accountMoney_borrower['money_freeze']-$datamoney_x['affect_money']);
	//会员帐户
	$mmoney_x['money_freeze']=$datamoney_x['freeze_money'];
	$mmoney_x['money_collect']=$datamoney_x['collect_money'];
	$mmoney_x['account_money']=$datamoney_x['account_money'];
	//会员帐户
	$datamoney_x['info'] = "对{$binfo['id']}还款完成解冻保证金";
	$datamoney_x['add_time'] = time();
	$datamoney_x['add_ip'] = get_client_ip();
	$datamoney_x['target_uid'] = 0;
	$datamoney_x['target_uname'] = '@网站管理员@';
	$moneynewid_x = M('member_moneylog')->add($datamoney_x);
	if($moneynewid_x) $bxid = M('member_money')->where("uid={$datamoney_x['uid']}")->save($mmoney_x);
	//解冻保证金
	
	if($bxid!==false && $x) return true;
	else return false;
}


//还款处理
function borrowRepayment($borrow_id,$sort_order,$type=1){//type 1:会员自己还,2网站代还

	$pre = C('DB_PREFIX');
	$done = false;
	$borrowDetail = D('investor_detail');
	$binfo = M("borrow_info")->field("id,borrow_name,borrow_uid,borrow_type,borrow_money,borrow_duration,repayment_type,has_pay,total,deadline")->find($borrow_id);
	$b_member=M('members')->field("user_name")->find($binfo['borrow_uid']);
	if( $binfo['has_pay']>=$sort_order) return "本期已还过，不用再还";
	if( $binfo['has_pay'] == $binfo['total'])  return "此标已经还完，不用再还";



	if( ($binfo['has_pay']+1)<$sort_order) return "对不起，此借款第".($binfo['has_pay']+1)."期还未还，请先还第".($binfo['has_pay']+1)."期";


    if( $binfo['deadline']<time() && $type==2)  return "此标还没逾期，不用代还";
	//流转标与普通标,判断还款期数不一样
	$voxe = $borrowDetail->field('sort_order,sum(capital) as capital, sum(interest) as interest,sum(interest_fee) as interest_fee,deadline,substitute_time')->where("borrow_id={$borrow_id}")->group('sort_order')->select();
	foreach($voxe as $ee=>$ss){
		if($ss['sort_order']==$sort_order) $vo = $ss;
	}
	
	if($vo['deadline']<time()){//此标已逾期
		$is_expired = true;
		if($vo['substitute_time']>0) $is_substitute=true;//已代还
		else $is_substitute=false;
		//逾期的相关计算
		$expired_days = getExpiredDays($vo['deadline']);
		$expired_money = getExpiredMoney($expired_days,$vo['capital'],$vo['interest']);;
		$call_fee = getExpiredCallFee($expired_days,$vo['capital'],$vo['interest']);;
		//逾期的相关计算
	}else{
		$is_expired = false;
		$expired_days = 0;
		$expired_money = 0;
		$call_fee = 0;
	}
	//流转标与普通标,判断还款期数不一样
	MTip('chk25',$binfo['borrow_uid'],$borrow_id);//sss
	$accountMoney_borrower = M('member_money')->field('money_freeze,money_collect,account_money')->find($binfo['borrow_uid']);
	if($type==1 && $binfo['borrow_type']<>3 && round($accountMoney_borrower['account_money'], 2)<round(($vo['capital']+$vo['interest']+$expired_money+$call_fee),2)) return "帐户可用余额不足，本期还款共需".($vo['capital']+$vo['interest']+$expired_money+$call_fee)."元，请先充值";
	if($is_substitute && $is_expired){//已代还后的会员还款，则只需要对会员的帐户进行操作后然后更新还款时间即可返回
		$borrowDetail->startTrans();
			$datamoney_x['uid'] = $binfo['borrow_uid'];
			$datamoney_x['type'] = 11;
			$datamoney_x['affect_money'] = -($vo['capital']+$vo['interest']);
			$datamoney_x['account_money'] = ($accountMoney_borrower['account_money'] + $datamoney_x['affect_money']);
			$datamoney_x['collect_money'] = $accountMoney_borrower['money_collect'];
			$datamoney_x['freeze_money'] = $accountMoney_borrower['money_freeze'];
			//会员帐户
			$mmoney_x['money_freeze']=$datamoney_x['freeze_money'];
			$mmoney_x['money_collect']=$datamoney_x['collect_money'];
			$mmoney_x['account_money']=$datamoney_x['account_money'];
			//会员帐户
			$datamoney_x['info'] = "对{$borrow_id}号标第{$sort_order}期还款";
			$datamoney_x['add_time'] = time();
			$datamoney_x['add_ip'] = get_client_ip();
			$datamoney_x['target_uid'] = 0;
			$datamoney_x['target_uname'] = '@网站管理员@';
			$moneynewid_x = M('member_moneylog')->add($datamoney_x);
			if($moneynewid_x) $bxid = M('member_money')->where("uid={$datamoney_x['uid']}")->save($mmoney_x);
			
			//单独记录还款本金
			$datamoney_x['type'] = 32;
			$datamoney_x['affect_money'] = -($vo['capital']);
			$datamoney_x['info'] = "对{$borrow_id}号标第{$sort_order}期还款本金金额";
			M('member_moneylog')->add($datamoney_x);
			
		//逾期了
			//逾期罚息
			$accountMoney_borrower = M('member_money')->field('money_freeze,money_collect,account_money')->find($binfo['borrow_uid']);
			$datamoney_x = array();
			$mmoney_x=array();
			
			$datamoney_x['uid'] = $binfo['borrow_uid'];
			$datamoney_x['type'] = 30;
			$datamoney_x['affect_money'] = -($expired_money);
			$datamoney_x['account_money'] = ($accountMoney_borrower['account_money'] + $datamoney_x['affect_money']);
			$datamoney_x['collect_money'] = $accountMoney_borrower['money_collect'];
			$datamoney_x['freeze_money'] = $accountMoney_borrower['money_freeze'];
			//会员帐户
			$mmoney_x['money_freeze']=$datamoney_x['freeze_money'];
			$mmoney_x['money_collect']=$datamoney_x['collect_money'];
			$mmoney_x['account_money']=$datamoney_x['account_money'];
			//会员帐户
			$datamoney_x['info'] = "{$borrow_id}号标第{$sort_order}期的逾期罚息";
			$datamoney_x['add_time'] = time();
			$datamoney_x['add_ip'] = get_client_ip();
			$datamoney_x['target_uid'] = 0;
			$datamoney_x['target_uname'] = '@网站管理员@';
			$moneynewid_x = M('member_moneylog')->add($datamoney_x);
			if($moneynewid_x) $bxid = M('member_money')->where("uid={$datamoney_x['uid']}")->save($mmoney_x);
			//催收费
			$accountMoney_borrower = M('member_money')->field('money_freeze,money_collect,account_money')->find($binfo['borrow_uid']);
			$datamoney_x = array();
			$mmoney_x=array();
			
			$datamoney_x['uid'] = $binfo['borrow_uid'];
			$datamoney_x['type'] = 31;
			$datamoney_x['affect_money'] = -($call_fee);
			$datamoney_x['account_money'] = ($accountMoney_borrower['account_money'] + $datamoney_x['affect_money']);
			$datamoney_x['collect_money'] = $accountMoney_borrower['money_collect'];
			$datamoney_x['freeze_money'] = $accountMoney_borrower['money_freeze'];
			//会员帐户
			$mmoney_x['money_freeze']=$datamoney_x['freeze_money'];
			$mmoney_x['money_collect']=$datamoney_x['collect_money'];
			$mmoney_x['account_money']=$datamoney_x['account_money'];

			//会员帐户
			$datamoney_x['info'] = "{$borrow_id}号标第{$sort_order}期的逾期催收费";
			$datamoney_x['add_time'] = time();
			$datamoney_x['add_ip'] = get_client_ip();
			$datamoney_x['target_uid'] = 0;
			$datamoney_x['target_uname'] = '@网站管理员@';
			$moneynewid_x = M('member_moneylog')->add($datamoney_x);
			if($moneynewid_x) $bxid = M('member_money')->where("uid={$datamoney_x['uid']}")->save($mmoney_x);
		//逾期了
			
			$day = ceil( ($vo['deadline']-time())/(3600*24) );
		if($day>0 && $day<=3){//正常还款
			$d_status=1;
		}elseif($day>-3 && $day<=0){//
			$d_status=3;
		}elseif($day<=-3){//逾期还款
			$d_status=5;
		}elseif($day>3){//提前还款
			$d_status=2;
		}
			$updetail_res = M()->execute("update `{$pre}investor_detail` set `repayment_time`=".time().",`receive_interest`=({$vo['interest']}-{$vo['interest_fee']}),`call_fee`={$call_fee},`expired_money`={$expired_money},`expired_days`={$expired_days},`status`={$d_status} WHERE `borrow_id`={$borrow_id} AND `sort_order`={$sort_order}");
			//更新借款信息
			$upborrowsql = "update `{$pre}borrow_info` set ";
			$upborrowsql .= "`repayment_money`=`repayment_money`+{$vo['capital']}";
			$upborrowsql .= ",`repayment_interest`=`repayment_interest`+ {$vo['interest']}";
			if(($sort_order == $binfo['total']) || $binfo['repayment_type'] == 1) $upborrowsql .= ",`borrow_status`=7";//还款完成
			$upborrowsql .= ",`has_pay`={$sort_order}";//代还则不记录还到第几期，避免会员还款时，提示已还过
			if($is_expired)  $upborrowsql .= ",`expired_money`=`expired_money`+{$expired_money}";//代还则不记录还到第几期，避免会员还款时，提示已还过
			$upborrowsql .= " WHERE `id`={$borrow_id}";
			$upborrow_res = M()->execute($upborrowsql);
			//更新借款信息

		//if($updetail_res&&$bxid&&$upborrow_res){
		if($updetail_res&&$upborrow_res){
			$borrowDetail->commit() ;
			return true;
		}else{
			$borrowDetail->rollback() ;
			return false;
		}
	}



	
	//流转标与普通标,判断还款期数不一样
	  $detailList = $borrowDetail->field('invest_id,investor_uid,capital,interest,interest_fee,borrow_id,total')->where("borrow_id={$borrow_id} AND sort_order={$sort_order}")->select();
	//流转标与普通标,判断还款期数不一样
	//积分与还款状态处理
	if($type==1){//客户自己还款才需要记录这些操作
		$day_span = ceil( ($vo['deadline']-time())/(3600*24) );
		$credits_money = intval($vo['capital']/100);
		$credits_info = "对第{$borrow_id}号标的";
		$objectFlag = "borrow_".$borrow_id."_".$sort_order;
		if($day_span>0 && $day_span<=3){//正常还款
			$credits_result = memberCreditsLog($binfo['borrow_uid'],3,$credits_money,$credits_info."正常还款奖励经验",$objectFlag);
			$scores_result = memberScoresLog($binfo['borrow_uid'],3,$credits_money,$credits_info."正常还款奖励积分",$objectFlag);
			$idetail_status=1;
		}elseif($day_span>-3 && $day_span<=0){//迟还
			$credits_result = memberCreditsLog($binfo['borrow_uid'],4,$credits_money*(-3),$credits_info."迟还惩罚经验",$objectFlag);
			$scores_result = memberScoresLog($binfo['borrow_uid'],4,$credits_money*(-3),$credits_info."迟还惩罚积分",$objectFlag);
			$idetail_status=3;
		}elseif($day_span<=-3){//逾期还款
			$credits_result = memberCreditsLog($binfo['borrow_uid'],5,$credits_money*(-10),$credits_info."逾期还款惩罚经验",$objectFlag);
			$scores_result = memberScoresLog($binfo['borrow_uid'],5,$credits_money*(-10),$credits_info."逾期还款惩罚积分",$objectFlag);
			$idetail_status=5;
		}elseif($day_span>3){//提前还款
			$credits_result = memberCreditsLog($binfo['borrow_uid'],6,$credits_money*2,$credits_info."提前还款奖励经验",$objectFlag);
			$scores_result = memberScoresLog($binfo['borrow_uid'],6,$credits_money*2,$credits_info."提前还款奖励积分",$objectFlag);
			$idetail_status=2;
		}
		if(!$credits_result || !$scores_result) return "因积分经验记录失败，未完成还款操作";
	}
	//积分与还款状态处理
	$borrowDetail->startTrans();
	//对借款者帐户进行减少
	$bxid = true;
	if($type==1){
		$bxid = false;
			$datamoney_x['uid'] = $binfo['borrow_uid'];
			$datamoney_x['type'] = 11;
			$datamoney_x['affect_money'] = -($vo['capital']+$vo['interest']);
			$datamoney_x['account_money'] = ($accountMoney_borrower['account_money'] + $datamoney_x['affect_money']);
			$datamoney_x['collect_money'] = $accountMoney_borrower['money_collect'];
			$datamoney_x['freeze_money'] = $accountMoney_borrower['money_freeze'];
			//会员帐户
			$mmoney_x['money_freeze']=$datamoney_x['freeze_money'];
			$mmoney_x['money_collect']=$datamoney_x['collect_money'];
			$mmoney_x['account_money']=$datamoney_x['account_money'];
			//会员帐户
			$datamoney_x['info'] = "对{$borrow_id}号标第{$sort_order}期还款";
			$datamoney_x['add_time'] = time();
			$datamoney_x['add_ip'] = get_client_ip();
			$datamoney_x['target_uid'] = 0;
			$datamoney_x['target_uname'] = '@网站管理员@';
			$moneynewid_x = M('member_moneylog')->add($datamoney_x);
			if($moneynewid_x) $bxid = M('member_money')->where("uid={$datamoney_x['uid']}")->save($mmoney_x);
			
			//单独记录还款本金
			$datamoney_x['type'] = 32;
			$datamoney_x['affect_money'] = -($vo['capital']);
			$datamoney_x['info'] = "对{$borrow_id}号标第{$sort_order}期还款本金金额";
			M('member_moneylog')->add($datamoney_x);
			
		//逾期了
		if($is_expired){
			//逾期罚息
			if($expired_money>0){
				$accountMoney_borrower = M('member_money')->field('money_freeze,money_collect,account_money')->find($binfo['borrow_uid']);
				$datamoney_x = array();
				$mmoney_x=array();
				
				$datamoney_x['uid'] = $binfo['borrow_uid'];
				$datamoney_x['type'] = 30;
				$datamoney_x['affect_money'] = -($expired_money);
				$datamoney_x['account_money'] = ($accountMoney_borrower['account_money'] + $datamoney_x['affect_money']);
				$datamoney_x['collect_money'] = $accountMoney_borrower['money_collect'];
				$datamoney_x['freeze_money'] = $accountMoney_borrower['money_freeze'];
				//会员帐户
				$mmoney_x['money_freeze']=$datamoney_x['freeze_money'];
				$mmoney_x['money_collect']=$datamoney_x['collect_money'];
				$mmoney_x['account_money']=$datamoney_x['account_money'];
				//会员帐户
				$datamoney_x['info'] = "{$borrow_id}号标第{$sort_order}期的逾期罚息";
				$datamoney_x['add_time'] = time();
				$datamoney_x['add_ip'] = get_client_ip();
				$datamoney_x['target_uid'] = 0;
				$datamoney_x['target_uname'] = '@网站管理员@';
				$moneynewid_x = M('member_moneylog')->add($datamoney_x);
				if($moneynewid_x) $bxid = M('member_money')->where("uid={$datamoney_x['uid']}")->save($mmoney_x);
			}
			//催收费
			if($call_fee>0){
				$accountMoney_borrower = M('member_money')->field('money_freeze,money_collect,account_money')->find($binfo['borrow_uid']);
				$datamoney_x = array();
				$mmoney_x=array();
				
				$datamoney_x['uid'] = $binfo['borrow_uid'];
				$datamoney_x['type'] = 31;
				$datamoney_x['affect_money'] = -($call_fee);
				$datamoney_x['account_money'] = ($accountMoney_borrower['account_money'] + $datamoney_x['affect_money']);
				$datamoney_x['collect_money'] = $accountMoney_borrower['money_collect'];
				$datamoney_x['freeze_money'] = $accountMoney_borrower['money_freeze'];
				//会员帐户
				$mmoney_x['money_freeze']=$datamoney_x['freeze_money'];
				$mmoney_x['money_collect']=$datamoney_x['collect_money'];
				$mmoney_x['account_money']=$datamoney_x['account_money'];
				//会员帐户
				$datamoney_x['info'] = "{$borrow_id}号标第{$sort_order}期的逾期催收费";
				$datamoney_x['add_time'] = time();
				$datamoney_x['add_ip'] = get_client_ip();
				$datamoney_x['target_uid'] = 0;
				$datamoney_x['target_uname'] = '@网站管理员@';
				$moneynewid_x = M('member_moneylog')->add($datamoney_x);
				if($moneynewid_x) $bxid = M('member_money')->where("uid={$datamoney_x['uid']}")->save($mmoney_x);
			}
		}
		//逾期了


	}
	//对借款者帐户进行减少
	//更新借款信息
	$upborrowsql = "update `{$pre}borrow_info` set ";
	$upborrowsql .= "`repayment_money`=`repayment_money`+{$vo['capital']}";
	$upborrowsql .= ",`repayment_interest`=`repayment_interest`+ {$vo['interest']}";
	if(($sort_order == $binfo['total']) || $binfo['repayment_type'] == 1) $upborrowsql .= ",`borrow_status`=7";//还款完成
	//如果是网站代还的，则记录代还金额
	if($type==2){
		$total_subs = ($vo['capital']+$vo['interest']);
		$upborrowsql .= ",`substitute_money`=`substitute_money`+ {$total_subs}";
	}
	//如果是网站代还的，则记录代还金额
	if($type==1) $upborrowsql .= ",`has_pay`={$sort_order}";//代还则不记录还到第几期，避免会员还款时，提示已还过
	if($is_expired)  $upborrowsql .= ",`expired_money`=`expired_money`+{$expired_money}";//代还则不记录还到第几期，避免会员还款时，提示已还过
	$upborrowsql .= " WHERE `id`={$borrow_id}";
	$upborrow_res = M()->execute($upborrowsql);
	//更新借款信息
	
	//更新还款详情表
	if($type==2){//网站代还
		$updetail_res = M()->execute("update `{$pre}investor_detail` set `receive_capital`=`capital`,`substitute_time`=".time()." ,`substitute_money`=`substitute_money`+{$total_subs},`status`=4 WHERE `borrow_id`={$borrow_id} AND `sort_order`={$sort_order}");
	}else{
		$updetail_res = M()->execute("update `{$pre}investor_detail` set `receive_capital`=`capital` ,`receive_interest`=(`interest`-`interest_fee`),`repayment_time`=".time().", `status`={$idetail_status} WHERE `borrow_id`={$borrow_id} AND `sort_order`={$sort_order}");
	}
	//更新还款详情表
	
	//更新还款概要表
	$smsUid = "";
	foreach($detailList as $v){
		$getInterest = $v['interest'] - $v['interest_fee'];
		$upsql = "update `{$pre}borrow_investor` set ";
		$upsql .= "`receive_capital`=`receive_capital`+{$v['capital']},";
		$upsql .= "`receive_interest`=`receive_interest`+ {$getInterest},";
		if($type==2){
			$total_s_invest = $v['capital'] + $getInterest;
			$upsql .= "`substitute_money` = `substitute_money` + {$total_s_invest},";
		}
		if(($sort_order == $binfo['total']) || $binfo['repayment_type'] == 1) $upsql .= "`status`=5,";//还款完成
		$upsql .= "`paid_fee`=`paid_fee`+{$v['interest_fee']}";
		$upsql .= " WHERE `id`={$v['invest_id']}";
		$upinfo_res = M()->execute($upsql);
		
		//对投资帐户进行增加
		if($upinfo_res){
			$accountMoney = M('member_money')->field('money_freeze,money_collect,account_money')->find($v['investor_uid']);
			$datamoney['uid'] = $v['investor_uid'];
			$datamoney['type'] = ($type==2)?"10":"9";
			$datamoney['affect_money'] = ($v['capital']+$v['interest']);//先收利息加本金，再扣管理费
			$datamoney['account_money'] = ($accountMoney['account_money'] + $datamoney['affect_money']);
			$datamoney['collect_money'] = $accountMoney['money_collect'] - $datamoney['affect_money'];
			$datamoney['freeze_money'] = $accountMoney['money_freeze'];
			//会员帐户
			$mmoney['money_freeze']=$datamoney['freeze_money'];
			$mmoney['money_collect']=$datamoney['collect_money'];
			$mmoney['account_money']=$datamoney['account_money'];
			//会员帐户
			$datamoney['info'] = ($type==2)?"网站对{$v['borrow_id']}号标第{$sort_order}期代还":"会员对{$v['borrow_id']}号标第{$sort_order}期还款";
			$datamoney['add_time'] = time();
			$datamoney['add_ip'] = get_client_ip();
			if($type==2){
				$datamoney['target_uid'] = 0;
				$datamoney['target_uname'] = '@网站管理员@';
			}else{
				$datamoney['target_uid'] = $binfo['borrow_uid'];
				$datamoney['target_uname'] = $b_member['user_name'];
			}
			$moneynewid = M('member_moneylog')->add($datamoney);
			if($moneynewid) $xid = M('member_money')->where("uid={$datamoney['uid']}")->save($mmoney);
			$systips = M("sys_tip")->find($v['investor_uid']);
			if($type==2){
				MTip('chk18',$v['investor_uid'],$borrow_id);//sss
				if(checkNeedTip($systips, 'altpay_3')){
					$smsUid .= (empty($smsUid))?$v['investor_uid']:",{$v['investor_uid']}";
				}
			}else{
				MTip('chk16',$v['investor_uid'],$borrow_id);//sss
				if(checkNeedTip($systips, 'getpay_3')){
					$smsUid .= (empty($smsUid))?$v['investor_uid']:",{$v['investor_uid']}";
				}
			}
			
			//利息管理费
			$xid_z = true;
			if($v['interest_fee']>0 && $type==1){
				$xid_z = false;
				$accountMoney = M('member_money')->field('money_freeze,money_collect,account_money')->find($v['investor_uid']);
				$datamoney_z['uid'] = $v['investor_uid'];
				$datamoney_z['type'] = 23;
				$datamoney_z['affect_money'] = -($v['interest_fee']);//扣管理费
				$datamoney_z['account_money'] = ($mmoney['account_money'] + $datamoney_z['affect_money']);
				$datamoney_z['collect_money'] = $mmoney['money_collect'];
				$datamoney_z['freeze_money'] = $mmoney['money_freeze'];
				//会员帐户
				$mmoney_z['money_freeze']=$datamoney_z['freeze_money'];
				$mmoney_z['money_collect']=$datamoney_z['collect_money'];
				$mmoney_z['account_money']=$datamoney_z['account_money'];
				//会员帐户
				$datamoney_z['info'] = "收到第{$v['borrow_id']}号标第{$sort_order}期还款的利息管理费";
				$datamoney_z['add_time'] = time();
				$datamoney_z['add_ip'] = get_client_ip();
				$datamoney_z['target_uid'] = 0;
				$datamoney_z['target_uname'] = '@网站管理员@';
				$moneynewid_z = M('member_moneylog')->add($datamoney_z);
				if($moneynewid_z) $xid_z = M('member_money')->where("uid={$datamoney_z['uid']}")->save($mmoney_z);
			}
		   //利息管理费
		}
		//对投资帐户进行增加
	}
	//邮件提醒
	$subject = "您借出的借款[".$binfo['borrow_name']."]收到了新的还款";
	$link='<br /><a href="http://'.$_SERVER['HTTP_HOST'].'/invest/'.$borrow_id.'.html" style="color:#91273d">点击查看['.$binfo['borrow_name'].']</a>';
	if($type==2){
		investDetailEmail($subject, $subject.$link, 'chk18', "altpay_2", $borrow_id);
	}else{
		investDetailEmail($subject, $subject.$link, 'chk16', "getpay_2", $borrow_id);
	}
	
	//更新还款概要表
	//echo "$updetail_res && $upinfo_res && $xid &&$upborrow_res && $bxid && $xid_z";
	if($updetail_res !==false && $upinfo_res!==false && $xid!==false &&$upborrow_res!==false && $bxid!==false && $xid_z!==false){
		$borrowDetail->commit() ;
		$_last = true;
		if((($binfo['total'] == ($binfo['has_pay']+1)) || $binfo['repayment_type'] == 1) && $type==1){
			$_last=false;
			$_last = lastRepayment($binfo);//最后一笔还款
		}
		if($_last===false) return "因满标操作未完成，还款操作失败";
		$done=true;

		$vphone = M("members")->alias("m")->join("{$pre}members_status ms on ms.uid=m.id")->field("m.user_phone")->where("m.id in({$smsUid}) and ms.phone_status=1")->select();
		$sphone = "";
		foreach($vphone as $v){
			$sphone.=(empty($sphone))?$v['user_phone']:",{$v['user_phone']}";
		}
		SMStip("payback",$sphone,array("#ID#","#ORDER#"),array($borrow_id,$sort_order), $borrow_id, explode(',',$smsUid));
	}else{
		$borrowDetail->rollback() ;
	}
	
	return $done;
}

function getBorrowInterestRate($rate,$duration){
	return ($rate/(12*100)*$duration);
}

/**
 * success:num=1&success=18652044823&faile=&err=发送成功！&errid=0
 * error:num=0&err=无效的手机号码&errid=6008
 */
function sendsms($mob, $content, $time = ''){
	require_once C('APP_ROOT')."Lib/Util/sms/SmsUrlInvoke.class.php";
	$smsutil = new SmsUrlInvoke();
	$data = $smsutil->massSend($mob,$content, $time);
	if($data!==false && $data->Result==0) return true;
	else return false;
}
function sendsmsforrtn($mob, $content, $time = ''){
	require_once C('APP_ROOT')."Lib/Util/sms/SmsUrlInvoke.class.php";
	$smsutil = new SmsUrlInvoke();
	$data = $smsutil->massSend($mob,$content, $time);
	return $data;
}
function masssendsms($mob, $content, $time = '', $long=false, $isSub=false){
	require_once C('APP_ROOT')."Lib/Util/sms/SmsUrlInvoke.class.php";
	$smsutil = new SmsUrlInvoke();
	if($long){
		$data = $smsutil->massSend($mob,$content, $time, $isSub);
	}
	else
		$data = $smsutil->massSend($mob,$content, $time, $isSub);
	return $data;
}

function dealSmsResult($ret) {
	$result = Array ();
	$datas = explode ( "&", $ret );
	foreach ( $datas as $data ) {
		$params = explode ( "=", $data );
		if (count ( $params ) == 2) {
			$result [$params [0]] = $params [1];
		}
	}
	return $result;
}

function getMoneyLog($map,$size){
	if(empty($map['uid'])) return;
	
	if($size){
		//分页处理
		import("ORG.Util.Page");
		$count = M('member_moneylog')->where($map)->count('id');
		$p = new Page($count, $size);
		$page = $p->show();
		$Lsql = "{$p->firstRow},{$p->listRows}";
		//分页处理
	}

	$list = M('member_moneylog')->where($map)->order('id DESC')->limit($Lsql)->select();
	$type_arr = C("MONEY_LOG");
	foreach($list as $key=>$v){
		$list[$key]['type'] = $type_arr[$v['type']];
	}
	
	$row=array();
	$row['list'] = $list;
	$row['page'] = $page;
	return $row;
}

function memberMoneyLog($uid,$type,$amoney,$info="",$target_uid="",$target_uname=""){
	$xva = floatval($amoney);
	if(empty($xva)) return true;
	$done = false;
	$MM = M("member_money")->field("money_freeze,money_collect,account_money")->find($uid);
	if(!is_array($MM)) M("member_money")->add(array('uid'=>$uid));
	$Moneylog = D('member_moneylog');
	if(in_array($type,array("71","72","73"))) $type_save=7;
	else $type_save = $type;
	
	if(empty($target_uname) && $target_uid>0){
		$tname = M('members')->getFieldById($target_uid,'user_name');
	}else{
		$tname = $target_uname;
	}
	if(empty($target_uid) && empty($target_uname)){
		$target_uid=0;
		$target_uname = '@网站管理员@';	
	}
	
	$Moneylog->startTrans();
		$data['uid'] = $uid;
		$data['type'] = $type_save;
		$data['info'] = $info;
		$data['target_uid'] = $target_uid;
		$data['target_uname'] = $tname;
		$data['add_time'] = time();
		$data['add_ip'] = get_client_ip();
		switch($type){
			case 4://提现冻结
			case 5://撤消提现
			case 6://投标冻结
			case 8://流标解冻
			case 12://提现失败
			case 19://借款保证金
			case 24://还款完成解冻
				$data['affect_money'] = $amoney;
				$data['account_money'] = ifempty($MM['account_money'])+($amoney);
				$data['collect_money'] = ifempty($MM['money_collect']);
				$data['freeze_money'] = ifempty($MM['money_freeze'])-($amoney);
			break;
			case 3://会员充值
			case 17://借款金额入帐
			case 18://借款管理费
			case 20://投标奖励
			case 21://支付投标奖励
				$data['affect_money'] = $amoney;
				$data['account_money'] = ifempty($MM['account_money'])+($amoney);
				$data['collect_money'] = ifempty($MM['money_collect']);
				$data['freeze_money'] = ifempty($MM['money_freeze']);
			break;
			case 9://会员还款
			case 10://网站代还
				$data['affect_money'] = $amoney;
				$data['account_money'] = ifempty($MM['account_money'])+($amoney);
				$data['collect_money'] = ifempty($MM['money_collect'])-($amoney);
				$data['freeze_money'] = ifempty($MM['money_freeze']);
			break;
			case 15://投标成功冻结资金转为待收资金
				$data['affect_money'] = $amoney;
				$data['account_money'] = ifempty($MM['account_money']);
				$data['collect_money'] = ifempty($MM['money_collect'])+($amoney);
				$data['freeze_money'] = ifempty($MM['money_freeze'])-($amoney);
			break;
			case 28://投标成功利息待收
			case 73://单独操作待收金额
				$data['affect_money'] = $amoney;
				$data['account_money'] = ifempty($MM['account_money']);
				$data['collect_money'] = ifempty($MM['money_collect'])+($amoney);
				$data['freeze_money'] = ifempty($MM['money_freeze']);
			break;
			case 29://提现成功
			case 72://单独操作冻结金额
				$data['affect_money'] = $amoney;
				$data['account_money'] = ifempty($MM['account_money']);
				$data['collect_money'] = ifempty($MM['money_collect']);
				$data['freeze_money'] = ifempty($MM['money_freeze'])+($amoney);
			break;
			case 71://单独操作可用余额
			default:
				$data['affect_money'] = $amoney;
				$data['account_money'] = ifempty($MM['account_money'])+$amoney;
				$data['collect_money'] = ifempty($MM['money_collect']);
				$data['freeze_money'] = ifempty($MM['money_freeze']);
			break;
			
		}
		$newid = M('member_moneylog')->add($data);
		//帐户更新
		$mmoney['money_freeze']=$data['freeze_money'];
		$mmoney['money_collect']=$data['collect_money'];
		$mmoney['account_money']=$data['account_money'];
		if($newid) $xid = M('member_money')->where("uid={$uid}")->save($mmoney);
		if($xid){
			$Moneylog->commit();
			$done = true;
		}else{
			$Moneylog->rollback();
		}
	return $done;
}

function ifempty($tar, $def=0){
	if(empty($tar)){
		return $def;
	}else{
		return $tar;
	}
}

function memberLimitLog($uid,$type,$alimit,$info=""){
	$xva = floatval($alimit);
	if(empty($xva)) return true;
	$done = false;
	$MM = M("member_money")->field("money_freeze,money_collect,account_money",true)->find($uid);
	if(!is_array($MM)) M("member_money")->add(array('uid'=>$uid));
	$Moneylog = D('member_moneylog');
	if(in_array($type,array("71","72","73"))) $type_save=7;
	else $type_save = $type;
	
	$Moneylog->startTrans();

		$data['uid'] = $uid;
		$data['type'] = $type_save;
		$data['info'] = $info;
		$data['add_time'] = time();
		$data['add_ip'] = get_client_ip();

		$data['credit_limit'] = 0;
		$data['borrow_vouch_limit'] = 0;
		$data['invest_vouch_limit'] = 0;
		
		switch($type){
			case 1://信用标初审通过暂扣
			case 4://信用标复审未通过返回
			case 7://标的完成，返回
			case 12://流标，返回
				$_data['credit_limit'] = $alimit;
			break;
			case 2://担保标初审通过暂扣
			case 5://担保标复审未通过返回
			case 8://标的完成，返回
				$_data['borrow_vouch_limit'] = $alimit;
			break;
			case 3://参与担保暂扣
			case 6://所担保的标初审未通过，返回
			case 9://所担保的标复审未通过，返回
			case 10://标的完成，返回
				$_data['invest_vouch_limit'] = $alimit;
			break;
			case 11://VIP审核通过
				$_data['credit_limit'] = $alimit;
				$mmoney['credit_limit']=$MM['credit_limit'] + $_data['credit_limit'];
			break;
		}
		$data = array_merge($data,$_data);
		$newid = M('member_limitlog')->add($data);
		//帐户更新
		//$mmoney['credit_limit']=$MM['credit_limit'] + $data['credit_limit'];
		$mmoney['credit_cuse']=$MM['credit_cuse'] + $data['credit_limit'];
		//$mmoney['borrow_vouch_limit']=$MM['borrow_vouch_limit'] + $data['borrow_vouch_limit'];
		$mmoney['borrow_vouch_cuse']=$MM['borrow_vouch_cuse'] + $data['borrow_vouch_limit'];
		//$mmoney['invest_vouch_limit']=$MM['invest_vouch_limit'] + $data['invest_vouch_limit'];
		$mmoney['invest_vouch_cuse']=$MM['invest_vouch_cuse'] + $data['invest_vouch_limit'];
		if($newid) $xid = M('member_money')->where("uid={$uid}")->save($mmoney);
		if($xid){
			$Moneylog->commit() ;
			$done = true;
		}else{
			$Moneylog->rollback() ;
		}
	return $done;
}



function memberCreditsLog($uid,$type,$acredits,$info="无", $objectFlag=""){
	if($acredits==0) return true;
	$done = false;
	$mCredits = M("members")->getFieldById($uid,'credits');
	$Creditslog = M('member_creditslog');

	//do check
	$creditsType = C("CREDITS_TYPE");
	$logOpType = C("LOG_OPERATION_TYPE");
	if(!empty($creditsType[$type]["max-times"])){
		$curCount = M('member_creditslog')->where(array("uid"=>$uid, "type"=>$type))->count(1);
		if($curCount >= $creditsType[$type]["max-times"]){
			if($scoresType[$type]["max-times"] == 1){
				$logText = "记录非法[".$creditsType[$type]["name"]."]经验,uid:".$uid.",scores:".$scores.",info:".$info.",objectFlag:".$objectFlag;
				saveCommonLog("", $logText, "member_creditslog", "系统", "", $logOpType["SCORES"][0]);
			}
	
			$done = true;
			return $done;
		}
	}else if(!empty($creditsType[$type]["max-times-per-period"])){
		$curCount = M('member_creditslog')->where(array("uid"=>$uid, "type"=>$type, "object_flag"=>$objectFlag))->count(1);
		if($curCount >= $creditsType[$type]["max-times-per-period"]){
			$logText = "记录非法[".$creditsType[$type]["name"]."]经验,uid:".$uid.",scores:".$scores.",info:".$info.",objectFlag:".$objectFlag;
			saveCommonLog("", $logText, "member_creditslog", "系统", "", $logOpType["SCORES"][0]);
				
			$done = true;
			return $done;
		}
	}else if(!empty($creditsType[$type]["max-times-per-invest"])){
		$curCount = M('member_creditslog')->where(array("uid"=>$uid, "type"=>$type, "object_flag"=>$objectFlag))->count(1);
		if($curCount >= $creditsType[$type]["max-times-per-invest"]){
			$logText = "记录非法[".$creditsType[$type]["name"]."]经验,uid:".$uid.",scores:".$scores.",info:".$info.",objectFlag:".$objectFlag;
			saveCommonLog("", $logText, "member_creditslog", "系统", "", $logOpType["SCORES"][0]);
				
			$done = true;
			return $done;
		}
	}else if(!empty($creditsType[$type]["max-times-per-consume"])){
	
	}
	
	$Creditslog->startTrans();
	$data['uid'] = $uid;
	$data['type'] = $type;
	$data['object_flag'] = $objectFlag;
	$data['affect_credits'] = $acredits;
	$data['account_credits'] = $mCredits + $acredits;
	$data['info'] = $info;
	$data['add_time'] = time();
	$data['add_ip'] = get_client_ip();
	$newid = $Creditslog->add($data);
	
	$xid = M('members')->where("id={$uid}")->setField('credits',$data['account_credits']);
	
	if($xid){
		$Creditslog->commit() ;
		$done = true;
	}else{
		$Creditslog->rollback() ;
	}
	
	return $done;
}

function memberScoresLog($uid,$type,$scores,$info="无", $objectFlag=""){
	if($scores==0) return true;
	$done = false;
	$mScores = M("members")->getFieldById($uid,'scores');
	$Scoreslog = M('member_scoreslog');
	
	//do check
	$scoresType = C("SCORES_TYPE");
	$logOpType = C("LOG_OPERATION_TYPE");
	if(!empty($scoresType[$type]["max-times"])){
		$curCount = M('member_scoreslog')->where(array("uid"=>$uid, "type"=>$type))->count(1);
		if($curCount >= $scoresType[$type]["max-times"]){
			if($scoresType[$type]["max-times"] == 1){
				$logText = "记录非法[".$scoresType[$type]["name"]."]积分,uid:".$uid.",scores:".$scores.",info:".$info.",objectFlag:".$objectFlag;
				saveCommonLog("", $logText, "member_scoreslog", "系统", "", $logOpType["SCORES"][0]);
			}

			$done = true;
			return $done;
		}
	}else if(!empty($scoresType[$type]["max-times-per-period"])){
		$curCount = M('member_scoreslog')->where(array("uid"=>$uid, "type"=>$type, "object_flag"=>$objectFlag))->count(1);
		if($curCount >= $scoresType[$type]["max-times-per-period"]){
			$logText = "记录非法[".$scoresType[$type]["name"]."]积分,uid:".$uid.",scores:".$scores.",info:".$info.",objectFlag:".$objectFlag;
			saveCommonLog("", $logText, "member_scoreslog", "系统", "", $logOpType["SCORES"][0]);
			
			$done = true;
			return $done;
		}
	}else if(!empty($scoresType[$type]["max-times-per-invest"])){
		$curCount = M('member_scoreslog')->where(array("uid"=>$uid, "type"=>$type, "object_flag"=>$objectFlag))->count(1);
		if($curCount >= $scoresType[$type]["max-times-per-invest"]){
			$logText = "记录非法[".$scoresType[$type]["name"]."]积分,uid:".$uid.",scores:".$scores.",info:".$info.",objectFlag:".$objectFlag;
			saveCommonLog("", $logText, "member_scoreslog", "系统", "", $logOpType["SCORES"][0]);
			
			$done = true;
			return $done;
		}
	}else if(!empty($scoresType[$type]["max-times-per-consume"])){
		
	}
	
	$Scoreslog->startTrans();
	$data['uid'] = $uid;
	$data['type'] = $type;
	$data['object_flag'] = $objectFlag;
	$data['affect_scores'] = $scores;
	$data['account_scores'] = $mScores + $scores;
	$data['info'] = $info;
	$data['add_time'] = time();
	$data['add_ip'] = get_client_ip();
	$newid = $Scoreslog->add($data);
	
	$xid = M('members')->where("id={$uid}")->setField('scores',$data['account_scores']);
	
	if($xid){
		$Scoreslog->commit();
		$done = true;
	}else{
		$Scoreslog->rollback();
	}
	
	return $done;
}


function getMemberMoneySummary($uid){
	$pre = C('DB_PREFIX');
	$umoney = M('member_money')->field(true)->find($uid);

	$withdraw = M('member_withdraw')->field('withdraw_status,sum(withdraw_money) as withdraw_money,sum(withdraw_fee) as withdraw_fee')->where("uid={$uid}")->group("withdraw_status")->select();
	$withdraw_row = array();
	foreach($withdraw as $wkey=>$wv){
		$withdraw_row[$wv['withdraw_status']] = $wv;
	}
	$withdraw0 = $withdraw_row[0];
	$withdraw1 = $withdraw_row[1];
	$withdraw2 = $withdraw_row[2];
	
	$payonline = M('member_payonline')->where("uid={$uid} AND status=1")->sum('money');
	
	$commission1 = M('borrow_investor')->where("investor_uid={$uid}")->sum('paid_fee');
	$commission2 = M('borrow_info')->where("borrow_uid={$uid} AND borrow_status in(3,4)")->sum('borrow_fee');
	
	$uplevefee = M('member_moneylog')->where("uid={$uid} AND type=2")->sum('affect_money');
	
	$czfee = M('member_payonline')->where("uid={$uid} AND status=1")->sum('fee');
	
	$toubiaojl =M('borrow_investor')->where("investor_uid={$uid}")->sum('reward_money');//投标奖励
	$tuiguangjl =M('member_moneylog')->where("uid={$uid} and type=13")->sum('affect_money');//推广奖励
	$xianxiajl =M('member_moneylog')->where("uid={$uid} and type=33")->sum('affect_money');//线下充值奖励

	
	$capitalinfo = getMemberBorrowScan($uid);
	$money['zye'] = $umoney['account_money'] + $umoney['money_collect'] + $umoney['money_freeze'];//帐户总额
	$money['kyxjje'] = $umoney['account_money'];//可用金额
	$money['djje'] = $umoney['money_freeze'];//冻结金额
	$money['jjje'] = 0;//奖金金额
	$money['dsbx'] = $umoney['money_collect'];//待收本息
	
	$money['dfbx'] = round($capitalinfo['tj']['dhze'] - $capitalinfo['tj']['payInterest']);//待付本息
	$money['dxrtb'] = $capitalinfo['tj']['dqrtb'];//待确认投标
	$money['dshtx'] = $withdraw0['withdraw_money'];//待审核提现
	$money['clztx'] = $withdraw1['withdraw_money'];//处理中提现  
	$money['total_1'] = round($money['kyxjje']+$money['jjje']+$money['dsbx']-$money['dfbx']+$money['dxrtb']+$money['dshtx']+$money['clztx'],2);
	
	$money['jzlx'] = $capitalinfo['tj']['earnInterest'];//净赚利息
	$money['jflx'] = $capitalinfo['tj']['payInterest'];//净付利息
	$money['ljjj'] = $umoney['reward_money'];//累计收到奖金
	$money['ljhyf'] = $uplevefee;//累计支付会员费
	$money['ljtxsxf'] = $withdraw2['withdraw_fee'];//累计提现手续费
	$money['ljczsxf'] = $czfee;//累计充值手续费
	$money['ljtbjl'] = $toubiaojl;//累计投标奖励
	$money['ljtgjl'] = $tuiguangjl;//累计推广奖励
	$money['xxjl'] = $xianxiajl;//线下充值奖励
	$money['total_2'] = $money['jzlx']-$money['jflx']+$money['ljjj']-$money['ljhyf']-$money['ljtxsxf']-$money['ljczsxf']+$money['ljtbjl']+$money['ljtgjl']+$money['xxjl'];
	
	$money['ljtzje'] = $capitalinfo['tj']['borrowOut'];//累计投资金额  
	$money['ljjrje'] = $capitalinfo['tj']['borrowIn'];//累计借入金额 
	$money['ljczje'] = $payonline;//累计充值金额
	$money['ljtxje'] = $withdraw2['withdraw_money'];//累计提现金额
	$money['ljzfyj'] = $commission1 + $commission2;//累计支付佣金
//
	$money['dslxze'] = $capitalinfo['tj']['willgetInterest'];//待收利息总额  
	$money['dflxze'] = $capitalinfo['tj']['willpayInterest'];//待付利息总额
	
	return $money;
}

function getBorrowInvest($borrowid=0,$uid){
	if(empty($borrowid)) return;
	$vx = M("borrow_info")->field('id')->where("id={$borrowid} AND borrow_uid={$uid}")->find();
	if(!is_array($vx)) return;

	$binfo = M("borrow_info")->field('borrow_name,borrow_uid,borrow_type,borrow_duration,repayment_type,has_pay,total,deadline')->find($borrowid);
	$list = array();
	switch($binfo['repayment_type']){
		case 1://一次性还款
				$field = "borrow_id,sort_order,sum(capital) as capital,sum(interest) as interest,status,sum(receive_interest+receive_capital+if(receive_capital>0,interest_fee,0)) as paid,deadline";
				$vo = M("investor_detail")->field($field)->where("borrow_id={$borrowid} AND `sort_order`=1")->group('sort_order')->find();
				//$status_arr =array('还未还','已还完','已提前还款','愈期还款','网站代还本金');
				$status_arr =array('还未还','已还完','已提前还款','迟到还款','网站代还本金','愈期还款');
				$vo['status'] = $status_arr[$vo['status']];
				$vo['needpay'] = getFloatValue(sprintf("%.2f",($vo['interest']+$vo['capital']-$vo['paid'])),2);
				$list[] = $vo;
		break;
		default://每月还款
			for($i=1;$i<=$binfo['borrow_duration'];$i++){
				$field = "borrow_id,sort_order,sum(capital) as capital,sum(interest) as interest,status,sum(receive_interest+receive_capital+if(receive_capital>0,interest_fee,0)) as paid,deadline";
				$vo = M("investor_detail")->field($field)->where("borrow_id={$borrowid} AND `sort_order`=$i")->group('sort_order')->find();
				$status_arr =array('还未还','已还完','已提前还款','迟到还款','网站代还本金','愈期还款');
				$vo['status'] = $status_arr[$vo['status']];
				$vo['needpay'] = getFloatValue(sprintf("%.2f",($vo['interest']+$vo['capital']-$vo['paid'])),2);
				$list[] = $vo;
			}
		break;
	}
	$row=array();
	$row['list'] = $list;
	$row['name'] = $binfo['borrow_name'];
	return $row;

}

function getDurationCount($uid=0){
	if(empty($uid)) return;
	$pre = C('DB_PREFIX');
	
	$field = "d.status,d.repayment_time";
	$sql = "select {$field} from {$pre}investor_detail d left join {$pre}borrow_info b ON b.id=d.borrow_id where d.borrow_id in(select tb.id from {$pre}borrow_info tb where tb.borrow_uid={$uid}) group by d.borrow_id, d.sort_order";
	$list = M()->query($sql);

	$week_1 = array(strtotime("-7 day",strtotime(date("Y-m-d",time())." 00:00:00")),strtotime(date("Y-m-d",time())." 23:59:59"));
	$time_1 = array(strtotime("-1 month",strtotime(date("Y-m-d",time())." 00:00:00")),strtotime(date("Y-m-d",time())." 23:59:59"));
	$time_6 = array(strtotime("-6 month",strtotime(date("Y-m-d",time())." 00:00:00")),strtotime(date("Y-m-d",time())." 23:59:59"));
	$row_time_1=array();
	$row_time_2=array();
	$row_time_3=array();
	$row_time_4=array();
	foreach($list as $v){
		switch($v['status']){
			case 1:
				if($v['repayment_time']>$time_6[0] && $v['repayment_time']<$time_6[1]){
					$row_time_3['zc'] = $row_time_3['zc'] + 1;//6个月内
					if($v['repayment_time']>$week_1[0] && $v['repayment_time']<$week_1[1]) $row_time_1['zc'] = $row_time_1['zc'] + 1;//一周内
					if($v['repayment_time']>$time_1[0] && $v['repayment_time']<$time_1[1]) $row_time_2['zc'] = $row_time_2['zc'] + 1;//一个月内
				}
				$row_time_4['zc'] = $row_time_4['zc'] + 1;//所有
			break;
			case 2:
				if($v['repayment_time']>$time_6[0] && $v['repayment_time']<$time_6[1]){
					$row_time_3['tq'] = $row_time_3['tq'] + 1;//6个月内
					if($v['repayment_time']>$week_1[0] && $v['repayment_time']<$week_1[1]) $row_time_1['tq'] = $row_time_1['tq'] + 1;//一周内
					if($v['repayment_time']>$time_1[0] && $v['repayment_time']<$time_1[1]) $row_time_2['tq'] = $row_time_2['tq'] + 1;//一个月内
				}
				$row_time_4['tq'] = $row_time_4['tq'] + 1;//所有
			break;
			case 3:
				if($v['repayment_time']>$time_6[0] && $v['repayment_time']<$time_6[1]){
					$row_time_3['ch'] = $row_time_3['ch'] + 1;//6个月内
					if($v['repayment_time']>$week_1[0] && $v['repayment_time']<$week_1[1]) $row_time_1['ch'] = $row_time_1['ch'] + 1;//一周内
					if($v['repayment_time']>$time_1[0] && $v['repayment_time']<$time_1[1]) $row_time_2['ch'] = $row_time_2['ch'] + 1;//一个月内
				}
				$row_time_4['ch'] = $row_time_4['ch'] + 1;//所有
			break;
			case 5:
				if($v['repayment_time']>$time_6[0] && $v['repayment_time']<$time_6[1]){
					$row_time_3['yq'] = $row_time_3['yq'] + 1;//6个月内
					if($v['repayment_time']>$week_1[0] && $v['repayment_time']<$week_1[1]) $row_time_1['yq'] = $row_time_1['yq'] + 1;//一周内
					if($v['repayment_time']>$time_1[0] && $v['repayment_time']<$time_1[1]) $row_time_2['yq'] = $row_time_2['yq'] + 1;//一个月内
				}
				
				$row_time_4['yq'] = $row_time_4['yq'] + 1;//所有
			break;
			case 6:
				if($v['repayment_time']>$time_6[0] && $v['repayment_time']<$time_6[1]){
					$row_time_3['wh'] = $row_time_3['wh'] + 1;//6个月内
					if($v['repayment_time']>$week_1[0] && $v['repayment_time']<$week_1[1]) $row_time_1['wh'] = $row_time_1['wh'] + 1;//一周内
					if($v['repayment_time']>$time_1[0] && $v['repayment_time']<$time_1[1]) $row_time_2['wh'] = $row_time_2['wh'] + 1;//一个月内
				}
				$row_time_4['wh'] = $row_time_4['wh'] + 1;//所有
			break;
			
		}
	}
	$row['history1'] = $row_time_1;
	$row['history2'] = $row_time_2;
	$row['history3'] = $row_time_3;
	$row['history4'] = $row_time_4;
	return $row;
}


function getMemberBorrow($uid=0,$size=10){
	if(empty($uid)) return;
	$pre = C('DB_PREFIX');
	
	$field = "d.repayment_time,b.borrow_name,d.total,d.borrow_id,d.sort_order,sum(d.capital) as capital,sum(d.interest) as interest,d.status,sum(d.receive_interest+d.receive_capital+if(d.receive_capital>0,d.interest_fee,0)) as paid,d.deadline";
	$sql = "select {$field} from {$pre}investor_detail d left join {$pre}borrow_info b ON b.id=d.borrow_id where d.borrow_id in(select tb.id from {$pre}borrow_info tb where tb.borrow_status>=6 AND tb.borrow_uid={$uid}) group by d.sort_order, d.borrow_id order by  d.borrow_id,d.sort_order limit 100";
	//$sql = "select {$field} from {$pre}investor_detail d left join {$pre}borrow_info b ON b.id=d.borrow_id where d.borrow_uid={$uid} AND d.status=0 group by d.sort_order limit 0,10";
	$list = M()->query($sql);
	$status_arr =array('还未还','已还完','已提前还款','已迟到还款','网站代还本金','已愈期还款', '', '待还款');
	foreach($list as $key=>$v){
		$list[$key]['status'] = $status_arr[$v['status']];
	}
	$row=array();
	$row['list'] = $list;
	return $row;
}

function getLeftTime($timeend,$type=1){
	if($type==1){
		$timeend = strtotime(date("Y-m-d",$timeend)." 23:59:59");
		$timenow = strtotime(date("Y-m-d",time())." 23:59:59");
		$left = ceil( ($timeend-$timenow)/3600/24 );
	}else{
		$left_arr = timediff(time(),$timeend);
		$left = $left_arr['day']."天 ".$left_arr['hour']."小时 ".$left_arr['min']."分钟 ".$left_arr['sec']."秒";
	}
	return $left;
}

function timediff($begin_time,$end_time )
{
    if ( $begin_time < $end_time ) {
        $starttime = $begin_time;
        $endtime = $end_time;
    } else {
        $starttime = $end_time;
        $endtime = $begin_time;
    }
    $timediff = $endtime - $starttime;
    $days = intval( $timediff / 86400 );
    $remain = $timediff % 86400;
    $hours = intval( $remain / 3600 );
    $remain = $remain % 3600;
    $mins = intval( $remain / 60 );
    $secs = $remain % 60;
    $res = array( "day" => $days, "hour" => $hours, "min" => $mins, "sec" => $secs );
    return $res;
}

function addInnerMsg($uid,$title,$msg){
	if(empty($uid)) return;
	$data['uid'] = $uid;
	$data['title'] = $title;
	$data['msg'] = $msg;
	$data['send_time'] = time();
	M('inner_msg')->add($data);
}

function active_flag($activeId){
	//查询注册奖励活动信息
	$map['id'] = $activeId;
	$active = M("active")->field('id,flag,amount')->where($map)->find();
	return $active;
}

function active_award($newid,$awardType,$amount,$msg_title,$msg_body){
	//账户金额增加奖励
	$member_money = M('member_money')->where("uid = {$newid}")->find();
	if($member_money) {
		$member_money['account_money'] += $amount;
		M("member_money")->where("uid={$newid}")->save($member_money);
	}else{
		$member_money['uid'] = $newid;
		$member_money['account_money'] = $amount;
		M('member_money')->add($member_money);
	}
	//添加注册奖励记录
	$award_log['amount'] = $amount;
	$award_log['uid'] = $newid;
	$award_log['awardType'] = $awardType;
	M('active_award_log')->add($award_log);
		
	//添加系统消息记录
	addInnerMsg($newid,$msg_title,$msg_body);
}


//获取下级或者同级栏目列表
function getTypeList($parm){
	//if(empty($parm['type_id'])) return;
	$Osql="sort_order DESC";
	//查询条件 
	$Lsql="{$parm['limit']}";
	$pc = getCategoryCountByParentId($parm['type_id']);
	if($pc>0){
		$map['is_hiden'] = 0;
		$map['parent_id'] = $parm['type_id'];
		$data = getCategoryByCondition($map,$Osql, $Lsql);
	}elseif(!isset($parm['notself'])){
		$map['is_hiden'] = 0;
		$mycat = getCategoryById($parm['type_id']);
		$map['parent_id'] = $mycat['parent_id'];
		$data = getCategoryByCondition($map,$Osql, $Lsql);
	}

	//链接处理
	$typefix = get_type_leve_nid($parm['type_id']);
	$typeu = $typefix[0];
	$suffix=C("URL_HTML_SUFFIX");
	foreach($data as $key=>$v){
		if($v['type_set']==2){
			if(empty($v['type_url'])) $data[$key]['turl']="javascript:alert('请在后台添加此栏目链接');";
			else $data[$key]['turl'] = $v['type_url'];
		}
		elseif($parm['type_id']==0||($v['parent_id']==0&&count($typefix)==1)) $data[$key]['turl'] = MU("Home/{$v['type_nid']}/index","typelist",array("suffix"=>$suffix));
		else $data[$key]['turl'] = MU("Home/{$typeu}/{$v['type_nid']}","typelist",array("suffix"=>$suffix));
	}
	$row=array();
	$row = $data;
	
	return $row;
}

//新标提醒
function newTip($borrow_id){
	
	$binfo = M("borrow_info")->field('borrow_type,borrow_interest_rate,borrow_duration')->find();
	
	if($binfo['borrow_type']==3) $map['borrow_type'] = 3;
	else $map['borrow_type'] = 0;
	$tiplist = M("borrow_tip")->field(true)->where($map)->select();
	
	foreach($tiplist as $key=>$v){
		$minfo = M('members')->field('account_money,user_phone')->find($v['uid']);
		if(
		$binfo['borrow_interest_rate'] >= $v['interest_rate'] &&
		$binfo['borrow_duration'] >= $v['doration_from'] &&
		$binfo['borrow_duration'] <= $v['doration_to'] &&
		$minfo['account_money'] >= $v['account_money']
		){
			(empty($tipPhone))?$tipPhone .="{$v['user_phone']}":$tipPhone .=",{$v['user_phone']}";
		}
	}
	$smsTxt = FS("Webconfig/smstxt");
	$smsTxt=de_xie($smsTxt);
	
	sendsms($tipPhone,$smsTxt['newtip']);
	
}


//自动投标
function autoInvest($borrow_id){
	$binfo = M("borrow_info")->field('borrow_name,borrow_uid,borrow_money,borrow_type,repayment_type,borrow_interest_rate,borrow_duration,has_vouch,has_borrow,borrow_max,borrow_min,can_auto')->find($borrow_id);
	
	if($binfo['borrow_type']==3) return true;
	if($binfo['can_auto']==0) return true;
	if($binfo['borrow_type']==2 && $binfo['has_vouch']<$binfo['borrow_money']) return true;
	$map['status'] = 1;
	$autolist = M("auto_borrow")->field(true)->where($map)->order("id asc")->select();
	$needMoney=$binfo['borrow_money'] - $binfo['has_borrow'];
	$borrow_user_info=M('members')->field('user_type,scores')->find($binfo['borrow_uid']);
	
	$xmemtype = C('XMEMBER_TYPE');
	$allrepaytype = C('REPAYMENT_TYPE');
	$allbortype = C('BORROW_TYPE');
	
	$have_auto_do=array();
	$smsUid = "";
	$emailUid = "";
	$errinfo = array();
	$errinfo['borrow_id'] = $borrow_id;
	foreach($autolist as $key=>$v){
		$errinfo['fail_reason'] = "";
		$errinfo['result'] = null;
		
		$errinfo['auto_id'] = $v['id'];
		if(in_array($v['uid'],$have_auto_do)){
			$errinfo['fail_reason'] = "您已有其他自动投标设置已完成自动投标";
			MTip("autoinvest", $v['uid'], $errinfo);
			continue;
		}
		if( $v['uid']==$binfo['borrow_uid']){
			$errinfo['fail_reason'] = "您不能投自己的标";
			MTip("autoinvest", $v['uid'], $errinfo);
			continue;
		}
		
		if($v['my_friend']==1 || $v['not_black']==1){
			$vo = M('member_friend')->where("uid={$v['uid']} AND friend_id={$binfo['borrow_uid']}")->find();
			if($v['my_friend']==1 && $vo['apply_status']!=1){
				$errinfo['fail_reason'] = "您限制借款方必须是您的好友，但借款方不在您的好友列表或您未通过对方的好友请求";
				MTip("autoinvest", $v['uid'], $errinfo);
				continue;
			}
			if($v['not_black']==1 && $vo['apply_status']==3){
				$errinfo['fail_reason'] = "您限制借款方必须不在您的黑名单中，但借款方已被您列入黑名单";
				MTip("autoinvest", $v['uid'], $errinfo);
				continue;
			}
		}
		if(intval($v['target_user'])>0 && intval($v['target_user'])!=$borrow_user_info['user_type']){
			$errinfo['fail_reason'] = "您限制借款方必须为网站的[{$xmemtype[$v['target_user']]}]，但借款方为[{$xmemtype[$borrow_user_info['user_type']]}]";
			MTip("autoinvest", $v['uid'], $errinfo);
			continue;
		}
		if($v['borrow_credit_status']==1){
			if(!($borrow_user_info['scores']<=$v['borrow_credit_last'] && $borrow_user_info['scores']>=$v['borrow_credit_first'])){
				$errinfo['fail_reason'] = "您限制借款方信用积分必须在{$v['borrow_credit_first']}-{$v['borrow_credit_last']}之间，但借款方信用积分实为{$borrow_user_info['scores']}";
				MTip("autoinvest", $v['uid'], $errinfo);
				continue;	
			}
		}
		if(intval($v['repayment_type'])>0){
			if($v['repayment_type']!=$binfo['repayment_type']){
				$errinfo['fail_reason'] = "您限制借款方还款方式为[{$allrepaytype[$v['repayment_type']]}]，但借款方还款方式为[{$allrepaytype[$binfo['repayment_type']]}]";
				MTip("autoinvest", $v['uid'], $errinfo);
				continue;
			}
		}
		if($v['timelimit_status']==1){
			if(!($binfo['borrow_duration']<=$v['timelimit_month_last'] && $binfo['borrow_duration']>=$v['timelimit_month_first'])){
				$durstr = "月";
				if($binfo['repayment_type'] == 1)$durstr = "天";
				$errinfo['fail_reason'] = "您限制借款期限必须{$v['timelimit_month_first']}个月-{$v['timelimit_month_last']}个月之间，但该借款期限为{$binfo['borrow_duration']}{$durstr}";
				MTip("autoinvest", $v['uid'], $errinfo);
				continue;	
			}
		}
		if($v['apr_status']==1){
			if(!($binfo['borrow_interest_rate']<=$v['apr_last'] && $binfo['borrow_interest_rate']>=$v['apr_first'])){
				$errinfo['fail_reason'] = "您限制借款年化利率必须在{$v['apr_first']}%-{$v['apr_last']}%之间，但该借款年化利率为{$binfo['borrow_interest_rate']}%";
				MTip("autoinvest", $v['uid'], $errinfo);
				continue;	
			}
		}
		if(intval($v['borrow_type'])>0){
			if($v['borrow_type']!=$binfo['borrow_type']){
				$errinfo['fail_reason'] = "您限制借款标类型必须为[{$allbortype[$v['borrow_type']]}]，但该借款标类型为[{$allbortype[$binfo['borrow_type']]}]";
				MTip("autoinvest", $v['uid'], $errinfo);
				continue;
			}
		}
		
		if($v['tender_type']==1){
			$investMoney=$v['tender_account'];
		}elseif($v['tender_type']==2){
			$investMoney=($v['tender_rate']*$binfo['borrow_money']/100);
		}elseif($v['tender_type']==3){
			$vminfo = getMinfo($v['uid'],'m.user_leve,m.time_limit,mm.account_money');
			$investMoney=floor($vminfo['account_money']);
		}
		if($investMoney < $binfo['borrow_min']){
			if($investMoney > 0){
				$errinfo['fail_reason'] = "您的自动投资金额为{$investMoney}元，该标最低投资金额限制最低为{$binfo['borrow_min']}元";
				MTip("autoinvest", $v['uid'], $errinfo);
			}
			continue;//不符合最低投资金额
		}
		if($investMoney > $binfo['borrow_max'] && $binfo['borrow_max']>0){
			$errinfo['fail_reason'] = "您的自动投资金额为{$investMoney}元，该标投资金额限制最高为{$binfo['borrow_max']}元，已自动为您调整成{$binfo['borrow_max']}元";
			$investMoney = $binfo['borrow_max'];
		}
		
		//不能超过标金额比例20%
		$sysmax = floor($binfo['borrow_money']*20/100);
		if($investMoney > $sysmax && $sysmax>0){
			if(!empty($errinfo['fail_reason']))$errinfo['fail_reason'] = $errinfo['fail_reason']."；";
			$errinfo['fail_reason'] = $errinfo['fail_reason']."系统限制自动投标金额不能超过标金额20%，即{$sysmax}元，您的投标金额为{$investMoney}元，超过系统最大限制，已自动调整成{$sysmax}元";
			$investMoney = $sysmax;
		}

        // 投标后的状态
		$x = investMoney($v['uid'],$borrow_id,$investMoney,1, $v['id']);
		
		
		if($x===true){
			$have_auto_do[]=$v['uid'];
			MTip('chk27',$v['uid'],$borrow_id);//sss
			$systips = M("sys_tip")->find($v['uid']);
			if(checkNeedTip($systips, 'autoborrow_3')){
				$smsUid .= (empty($smsUid))?$v['uid']:",{$v['uid']}";
			}
			if(checkNeedTip($systips, 'autoborrow_2')){
				$emailUid .= (empty($emailUid))?$v['uid']:",{$v['uid']}";
			}
		}else{
			if(strpos($x, "对不起，此标还差") !== false && strpos($x, "对不起，此标还差0元满标")===false){
				$extbinfo = M("borrow_info")->field("borrow_money,has_borrow")->find($borrow_id);
				$havemoney = $extbinfo['has_borrow'];
				$investMoney = $extbinfo['borrow_money'] - $havemoney;

				if(!empty($errinfo['fail_reason']))$errinfo['fail_reason'] = $errinfo['fail_reason']."；";
				
				$x = "";
				if($investMoney > 0){
					$errinfo['fail_reason'] = $errinfo['fail_reason']."此标剩余金额{$investMoney}，已自动为您调整";
					$x = investMoney($v['uid'],$borrow_id,$investMoney,1, $v['id']);
				}else{
					$errinfo['fail_reason'] = $errinfo['fail_reason']."此标剩余金额{$investMoney}，无法再投标";
				}
				if($x===true){
					$errinfo['result'] = "成功";
					MTip("autoinvest", $v['uid'], $errinfo);
					
					$have_auto_do[]=$v['uid'];
					$systips = M("sys_tip")->find($v['uid']);
					if(checkNeedTip($systips, 'autoborrow_3')){
						$smsUid .= (empty($smsUid))?$v['uid']:",{$v['uid']}";
					}
					if(checkNeedTip($systips, 'autoborrow_2')){
						$emailUid .= (empty($emailUid))?$v['uid']:",{$v['uid']}";
					}
				}else{
					if(!empty($errinfo['fail_reason']) && !empty($x)){
						$errinfo['fail_reason'] = $errinfo['fail_reason']."；";
						$errinfo['fail_reason'] = $errinfo['fail_reason'].$x;
					}
					MTip("autoinvest", $v['uid'], $errinfo);
				}
			}else{
				if(!empty($errinfo['fail_reason']))$errinfo['fail_reason'] = $errinfo['fail_reason']."；";
				$errinfo['fail_reason'] = $errinfo['fail_reason'].$x;
				MTip("autoinvest", $v['uid'], $errinfo);
			}
		}
	}
	$pre = C("DB_PREFIX");
	//短信提醒
	if(!empty($smsUid)){
		$vphone = M("members")->alias("m")->join("{$pre}members_status ms on ms.uid=m.id")->field("m.user_phone")->where("m.id in({$smsUid}) and ms.phone_status=1")->select();
		$sphone = "";
		foreach($vphone as $v){
			$sphone.=(empty($sphone))?$v['user_phone']:",{$v['user_phone']}";
		}
		$innerbody = "您设置的自动投标对第{$borrow_id}号借_款进行了投标";
		SMStip3("autoinvest",$sphone, $innerbody, $borrow_id, $smsUid);
		
	}
	//邮件提醒
	if(!empty($emailUid)){
		$link='<br /><a href="http://'.$_SERVER['HTTP_HOST'].'/invest/'.$borrow_id.'.html" style="color:#91273d">点击查看借款标['.$binfo['borrow_name'].']</a>';
		$msgconfig = FS("Webconfig/msgconfig");
		$sender = $msgconfig['stmp']['user'];
		$receivers = M("members")->alias("m")->join("{$pre}members_status ms on ms.uid=m.id")->field("m.user_email email,m.id uid,'to' type")->where("m.id in({$emailUid}) and ms.email_status=1")->select();
		massEmailLog($innerbody, $innerbody.$link, "autoinvest", $sender, $receivers, null, null, $borrow_id);
	}
}


function getBorrowInterest($type,$money,$duration,$rate){
	//if(!in_array($type,C('REPAYMENT_TYPE'))) return $money;
	//echo $month_rate."|".$rate."|".$duration."|".$type;
	switch($type){
		case 1://按天到期还款
			$month_rate =  $rate/100;
			$interest = getFloatValue($money*$month_rate*$duration ,4);
		break;
		case 2://按月分期还款
			$parm['duration'] = $duration;
			$parm['money'] = $money;
			$parm['year_apr'] = $rate;
			$parm['type'] = "all";
			$intre = EqualMonth($parm);
			$interest = ($intre['repayment_money'] - $money);
		break;
		case 3://按季分期还款
			$parm['month_times'] = $duration;
			$parm['account'] = $money;
			$parm['year_apr'] = $rate;
			$parm['type'] = "all";
			$intre = EqualSeason($parm);
			$interest = $intre['interest'];
		break;
		case 4://每月还息到期还本
			$parm['month_times'] = $duration;
			$parm['account'] = $money;
			$parm['year_apr'] = $rate;
			$parm['type'] = "all";
			$intre = EqualEndMonth($parm);
			$interest = $intre['interest'];
		break;
	
	}
	return $interest;
}

//等额本息法
//贷款本金×月利率×（1+月利率）还款月数/[（1+月利率）还款月数-1] 
//a*[i*(1+i)^n]/[(1+I)^n-1] 
//（a×i－b）×（1＋i）
/*
money,year_apr,duration,borrow_time(用来算还款时间的),type(==all时，返回还款概要)
我们计算出
月利率=年利率/12/100

根据公式得出
当月所还金额=贷款总金额*月利率*（1+月利率）^贷款期次/(（1+月利率）^贷款期次-1)

当月所还利息=(贷款总金额 * 月利率 - (贷款总金额*月利率* （1+月利率）^贷款期次 / (（1+月利率）^贷款期次-1)))* (1+月利率)^n+ (贷款总金额*月利率 * （1+月利率）^贷款期次 / (（1+月利率）^贷款期次-1))

当月所还本金=当月所还金额-当月所还利息

当月所剩本金=贷款总金额-第个月所还本金总额之和
*/
function EqualMonth ($data = array()){
	if (isset($data['money']) && $data['money']>0){
		$account = $data['money'];
	}else{
		return "";
	}
	
	if (isset($data['year_apr']) && $data['year_apr']>0){
		$year_apr = $data['year_apr'];
	}else{
		return "";
	}
	
	if (isset($data['duration']) && $data['duration']>0){
		$duration = $data['duration'];
	}
	if (isset($data['borrow_time']) && $data['borrow_time']>0){
		$borrow_time = $data['borrow_time'];
	}else{
		$borrow_time = time();
	}
	$month_apr = $year_apr/(12*100);
// 	$_li = pow((1+$month_apr),$duration);
// 	$repayment = round($account * ($month_apr * $_li)/($_li-1),4);
// 	$repayment = round($account/$duration + $account * $month_apr,2);
	$monthcapital = $account/$duration;
	$allinterest = ($account*$duration - ($monthcapital)*($duration*($duration-1)/2))*$month_apr;
	$_result = array();
	if (isset($data['type']) && $data['type']=="all"){
		$_result['repayment_money'] = round($account + $allinterest, 4);
		//$_result['monthly_repayment'] = $repayment;
		$_result['month_apr'] = round($month_apr*100,4);
	}else{
		//$re_month = date("n",$borrow_time);
		$pre_total_capital = 0;
		for($i=0;$i<$duration;$i++){
// 			if ($i==0){
// 				$interest = round($account*$month_apr,4);
// 			}else{
// 				$_lu = pow((1+$month_apr),$i);
// 				$interest = round(($account*$month_apr - $repayment)*$_lu + $repayment,4);
// 			}
			$mycapital = $monthcapital;
			if($i == $duration - 1){
				$mycapital = getFloatValue($account - $pre_total_capital,2);
			}
			$interest = ($account - $mycapital*($i)) * $month_apr;
			$_result[$i]['repayment_money'] = getFloatValue($mycapital + $interest,2);
			$_result[$i]['repayment_time'] = get_times(array("time"=>$borrow_time,"num"=>$i+1));
			$_result[$i]['interest'] = getFloatValue($interest,2);
			$_result[$i]['capital'] = getFloatValue($mycapital,2);
			$pre_total_capital += $_result[$i]['capital'];
		}
	}
	return $_result;
}
//按季等额本息法
function EqualSeason ($data = array()){
  //借款的月数
  if (isset($data['month_times']) && $data['month_times']>0){
	  $month_times = $data['month_times'];
  }
  //按季还款必须是季的倍数
  if ($month_times%3!=0){
	  return false;
  }
  //借款的总金额
  if (isset($data['account']) && $data['account']>0){
	  $account = $data['account'];
  }else{
	  return "";
  }
  //借款的年利率
  if (isset($data['year_apr']) && $data['year_apr']>0){
	  $year_apr = $data['year_apr'];
  }else{
	  return "";
  }
  
  //借款的时间 --- 什么时候开始借款，计算还款的
  if (isset($data['borrow_time']) && $data['borrow_time']>0){
	  $borrow_time = $data['borrow_time'];
  }else{
	  $borrow_time = time();
  }
  
  //月利率
  $month_apr = $year_apr/(12*100);
  
  //得到总季数
  $_season = $month_times/3;
  
  //每季应还的本金
  $_season_money = round($account/$_season,4);
  
  //$re_month = date("n",$borrow_time);
  $_yes_account = 0 ;
  $repayment_account = 0;//总还款额
  $_all_interest = 0;//总利息
  for($i=0;$i<$month_times;$i++){
	  $repay = $account - $_yes_account;//应还的金额
	  
	  $interest = round($repay*$month_apr,4);//利息等于应还金额乘月利率
	  $repayment_account = $repayment_account+$interest;//总还款额+利息
	  $capital = 0;
	  if ($i%3==2){
		  $capital = $_season_money;//本金只在第三个月还，本金等于借款金额除季度
		  $_yes_account = $_yes_account+$capital;
		  $repay = $account - $_yes_account;
		  $repayment_account = $repayment_account+$capital;//总还款额+本金
	  }
	  
	  $_result[$i]['repayment_money'] = getFloatValue($interest+$capital,4);
	  $_result[$i]['repayment_time'] = get_times(array("time"=>$borrow_time,"num"=>$i+1));
	  $_result[$i]['interest'] = getFloatValue($interest,4);
	  $_result[$i]['capital'] = getFloatValue($capital,4);
	  $_all_interest += $interest;
  }
  if (isset($data['type']) && $data['type']=="all"){
	  $_resul['repayment_money'] = $repayment_account;
	  $_resul['monthly_repayment'] = round($repayment_account/$_season,4);
	  $_resul['month_apr'] = round($month_apr*100,4);
	  $_resul['interest'] = $_all_interest;
	  return $_resul;
  }else{
	  return $_result;
  }
}

//到期还本，按月付息
function EqualEndMonth ($data = array()){
  
  //借款的月数
  if (isset($data['month_times']) && $data['month_times']>0){
	  $month_times = $data['month_times'];
  }

  //借款的总金额
  if (isset($data['account']) && $data['account']>0){
	  $account = $data['account'];
  }else{
	  return "";
  }
  
  //借款的年利率
  if (isset($data['year_apr']) && $data['year_apr']>0){
	  $year_apr = $data['year_apr'];
  }else{
	  return "";
  }
  
  
  //借款的时间
  if (isset($data['borrow_time']) && $data['borrow_time']>0){
	  $borrow_time = $data['borrow_time'];
  }else{
	  $borrow_time = time();
  }
  
  //月利率
  $month_apr = $year_apr/(12*100);
  
  
  
  //$re_month = date("n",$borrow_time);
  $_yes_account = 0 ;
  $repayment_account = 0;//总还款额
  $_all_interest=0;
  
  $interest = round($account*$month_apr,4);//利息等于应还金额乘月利率
  for($i=0;$i<$month_times;$i++){
	  $capital = 0;
	  if ($i+1 == $month_times){
		  $capital = $account;//本金只在最后一个月还，本金等于借款金额除季度
	  }
	  
	  $_result[$i]['repayment_account'] = $interest+$capital;
	  $_result[$i]['repayment_time'] = get_times(array("time"=>$borrow_time,"num"=>$i+1));
	  $_result[$i]['interest'] = $interest;
	  $_result[$i]['capital'] = $capital;
	  $_all_interest += $interest;
  }
  if (isset($data['type']) && $data['type']=="all"){
	  $_resul['repayment_account'] = $account + $interest*$month_times;
	  $_resul['monthly_repayment'] = $interest;
	  $_resul['month_apr'] = round($month_apr*100,4);
	  $_resul['interest'] = $_all_interest;
	  return $_resul;
  }else{
	  return $_result;
  }
}

function getMinfo($uid,$field='m.pin_pass,mm.account_money'){
	$pre = C('DB_PREFIX');
	$vm = M("members m")->field($field)->join("{$pre}member_money mm ON mm.uid=m.id")->where("m.id={$uid}")->find();
	return $vm;
}


//获取借款列表
function getMemberInfoDone($uid){
	$pre = C('DB_PREFIX');

	$field = "m.id,m.id as uid,m.user_name,mbank.uid as mbank_id,mi.uid as mi_id,mhi.uid as mhi_id,mci.uid as mci_id,mdpi.uid as mdpi_id,mei.uid as mei_id,mfi.uid as mfi_id,s.phone_status,s.id_status,s.email_status,s.safequestion_status";
	$row = M('members m')->field($field)
	->join("{$pre}member_banks mbank ON m.id=mbank.uid")
	->join("{$pre}member_contact_info mci ON m.id=mci.uid")
	->join("{$pre}member_department_info mdpi ON m.id=mdpi.uid")
	->join("{$pre}member_house_info mhi ON m.id=mhi.uid")
	->join("{$pre}member_ensure_info mei ON m.id=mei.uid")
	->join("{$pre}member_info mi ON m.id=mi.uid")
	->join("{$pre}member_financial_info mfi ON m.id=mfi.uid")
	->join("{$pre}members_status s ON m.id=s.uid")
	->where("m.id={$uid}")->find();
	$is_data = M('member_data_info')->where("uid={$row['uid']}")->count("id");
	$i==0;
	if($row['mbank_id']>0){
		$i++;
		$row['mbank'] = "<span style='color:green'>已填写</span>";
	}else{
		$row['mbank'] = "<span style='color:black'>未填写</span>";
	}
	
	if($row['mci_id']>0){
		$i++;
		$row['mci'] = "<span style='color:green'>已填写</span>";
	}else{
		$row['mci'] = "<span style='color:black'>未填写</span>";
	}
	
	if($is_data>0){
		$row['mdi_id'] = $is_data;
		$row['mdi'] = "<span style='color:green'>已填写</span>";
	}else{
		$row['mdi'] = "<span style='color:black'>未填写</span>";
	}
	
	if($row['mhi_id']>0){
		$i++;
		$row['mhi'] = "<span style='color:green'>已填写</span>";
	}else{
		$row['mhi'] = "<span style='color:black'>未填写</span>";
	}
	
	if($row['mdpi_id']>0){
		$i++;
		$row['mdpi'] = "<span style='color:green'>已填写</span>";
	}else{
		$row['mdpi'] = "<span style='color:black'>未填写</span>";
	}
	
	if($row['mei_id']>0){
		$i++;
		$row['mei'] = "<span style='color:green'>已填写</span>";
	}else{
		$row['mei'] = "<span style='color:black'>未填写</span>";
	}
	
	if($row['mfi_id']>0){
		$i++;
		$row['mfi'] = "<span style='color:green'>已填写</span>";
	}else{
		$row['mfi'] = "<span style='color:black'>未填写</span>";
	}
	
	if($row['mi_id']>0){
		$i++;
		$row['mi'] = "<span style='color:green'>已填写</span>";
	}else{
		$row['mi'] = "<span style='color:black'>未填写</span>";
	}
	
	$row['i'] = $i;//7为完成
	return $row;
}

function getVerify($uid){
	$pre = C('DB_PREFIX');
	$vo = M("members m")->field("m.id,m.user_leve,m.time_limit,s.id_status,s.phone_status,s.email_status,s.video_status,s.face_status")->join("{$pre}members_status s ON s.uid=m.id")->where("m.id={$uid}")->find();
	$str = "";
	if($vo['id_status']==1) $str.='&nbsp;<a href="'.__APP__.'/member/verify#fragment-3"><img alt="实名认证通过" src="'.__ROOT__.'/Style/H/images/icon/id.gif"/></a>';
	else  $str.='&nbsp;<a href="'.__APP__.'/member/verify#fragment-3"><img alt="实名认证未通过" src="'.__ROOT__.'/Style/H/images/icon/id_0.gif"/></a>';
	if($vo['phone_status']==1) $str.='&nbsp;<a href="'.__APP__.'/member/verify#fragment-2"><img alt="手机认证通过" src="'.__ROOT__.'/Style/H/images/icon/phone.gif"/>';
	else  $str.='&nbsp;<a href="'.__APP__.'/member/verify#fragment-2"><img alt="手机认证未通过" src="'.__ROOT__.'/Style/H/images/icon/phone_0.gif"/></a>';
	if($vo['email_status']==1) $str.='&nbsp;<a href="'.__APP__.'/member/verify?id=1#fragment-1"><img alt="邮件认证通过" src="'.__ROOT__.'/Style/H/images/icon/email.gif"/></a></br>';
	else  $str.='&nbsp;<a href="'.__APP__.'/member/verify?id=1#fragment-1"><img alt="邮件认证未通过" src="'.__ROOT__.'/Style/H/images/icon/email_0.gif"/></a></br>';
	if($vo['user_leve']!=0 && $vo['time_limit']>time()) $str.='&nbsp;<a href="'.__APP__.'/member/vip"><img alt="VIP会员" src="'.__ROOT__.'/Style/H/images/icon/vip.gif"/></a>';
	else  $str.='&nbsp;<a href="'.__APP__.'/member/vip"><img alt="不是VIP会员" src="'.__ROOT__.'/Style/H/images/icon/vip_0.gif"/></a>';
	if($vo['video_status']==1) $str.='&nbsp;<a href="javascript:;" onclick="alert(\'已通过视频认证\');"><img alt="视频认证通过" src="'.__ROOT__.'/Style/H/images/icon/video.gif"/></a>';
	else  $str.='&nbsp;<a href="javascript:;" onclick="videoverify();"><img alt="未进行视频认证" src="'.__ROOT__.'/Style/H/images/icon/video_0.gif"/></a>';
	if($vo['face_status']==1) $str.='&nbsp;<a href="javascript:;" onclick="alert(\'已通过现场认证\');"><img alt="现场认证通过" src="'.__ROOT__.'/Style/H/images/icon/place.gif"/></a>';
	else  $str.='&nbsp;<a href="javascript:;" onclick="faceverify();"><img alt="未进行现场认证" src="'.__ROOT__.'/Style/H/images/icon/place_0.gif"/></a>';
	return $str;
}
function getVerify_new($uid){
	$pre = C('DB_PREFIX');
	$vo = M("members m")->field("m.id,m.user_leve,m.time_limit,s.id_status,s.phone_status,s.email_status,s.video_status,s.face_status")->join("{$pre}members_status s ON s.uid=m.id")->where("m.id={$uid}")->find();
	$str = "";
	if($vo['id_status']==1) $str.='<div class="rt_1" title="实名认证通过"></div>';
	else  $str.='<div class="rt_1ov" title="实名认证未通过"></div>';
	if($vo['phone_status']==1) $str.='<div class="rt_2" title="手机认证通过"></div>';
	else  $str.='<div class="rt_2ov" title="手机认证未通过"></div>';
	if($vo['email_status']==1) $str.='<div class="rt_4" title="邮件认证通过"></div>';
	else  $str.='<div class="rt_4ov" title="邮件认证未通过"></div>';
	if($vo['user_leve']!=0 && $vo['time_limit']>time()) $str.='<div class="rt_3" title="VIP会员"></div>';
	else  $str.='<div class="rt_3ov" title="不是VIP会员"></div>';
	if($vo['video_status']==1) $str.='<div class="rt_5" title="已通过视频认证"></div>';
	else  $str.='<div class="rt_5ov" title="未进行视频认证"></div>';
	if($vo['face_status']==1) $str.='<div class="rt_6" title="已通过现场认证"></div>';
	else  $str.='<div class="rt_6ov" title="未进行现场认证"></div>';
	return $str;
}
function getVerify_ucenter($uid){
	$pre = C('DB_PREFIX');
	$vo = M("members m")->field("m.id,m.user_leve,m.time_limit,s.id_status,s.phone_status,s.email_status,s.video_status,s.face_status")->join("{$pre}members_status s ON s.uid=m.id")->where("m.id={$uid}")->find();
	$str = "";
	if($vo['id_status']==1) $str.='<a href="'.__APP__.'/member/verify#fragment-3"><img alt="实名认证通过" title="您已经通过实名认证" src="'.__ROOT__.'/Style/H/images/icon/id.gif"/></a>&nbsp;';
	else  $str.='<a href="'.__APP__.'/member/verify#fragment-3"><img alt="实名认证未通过" title="您还没有通过实名认证" src="'.__ROOT__.'/Style/H/images/icon/id_0.gif"/></a>&nbsp;';
	if($vo['phone_status']==1) $str.='<a href="'.__APP__.'/member/verify#fragment-2"><img alt="手机认证通过" title="您已经通过手机认证" src="'.__ROOT__.'/Style/H/images/icon/phone.gif"/>&nbsp;';
	else  $str.='<a href="'.__APP__.'/member/verify#fragment-2"><img alt="手机认证未通过" title="您还未通过手机认证" src="'.__ROOT__.'/Style/H/images/icon/phone_0.gif"/></a>&nbsp;';
	if($vo['email_status']==1) $str.='<a href="'.__APP__.'/member/verify?id=1#fragment-1"><img alt="邮件认证通过" title="您已经通过邮箱认证" src="'.__ROOT__.'/Style/H/images/icon/email.gif"/></a>&nbsp;';
	else  $str.='<a href="'.__APP__.'/member/verify?id=1#fragment-1"><img alt="邮件认证未通过" title="您还未通过邮箱认证" src="'.__ROOT__.'/Style/H/images/icon/email_0.gif"/></a>&nbsp;';
	if($vo['user_leve']!=0 && $vo['time_limit']>time()) $str.='<a href="'.__APP__.'/member/vip"><img alt="VIP会员" title="您是VIP会员" src="'.__ROOT__.'/Style/H/images/icon/vip.gif"/></a>&nbsp;';
	else  $str.='<a href="'.__APP__.'/member/vip"><img alt="不是VIP会员"  title="您还不是VIP会员" src="'.__ROOT__.'/Style/H/images/icon/vip_0.gif"/></a>&nbsp;';
	if($vo['video_status']==1) $str.='<a href="javascript:;" onclick="alert(\'已通过视频认证\');"><img alt="视频认证通过" title="您已经通过视频认证" src="'.__ROOT__.'/Style/H/images/icon/video.gif"/></a>&nbsp;';
	else  $str.='<a href="javascript:;" onclick="videoverify();"><img alt="未进行视频认证" title="您还未通过视频认证" src="'.__ROOT__.'/Style/H/images/icon/video_0.gif"/></a>&nbsp;';
	if($vo['face_status']==1) $str.='<a href="javascript:;" onclick="alert(\'已通过现场认证\');"><img alt="现场认证通过" title="您已经通过现场认证" src="'.__ROOT__.'/Style/H/images/icon/place.gif"/></a>&nbsp;';
	else  $str.='<a href="javascript:;" onclick="faceverify();"><img alt="未进行现场认证" title="您还未通过现场认证" src="'.__ROOT__.'/Style/H/images/icon/place_0.gif"/></a>&nbsp;';
	return $str;
} 


//获得时间天数
function get_times($data=array()){
	if (isset($data['time']) && $data['time']!=""){
		$time = $data['time'];//时间
	}elseif (isset($data['date']) && $data['date']!=""){
		$time = strtotime($data['date']);//日期
	}else{
		$time = time();//现在时间
	}
	if (isset($data['type']) && $data['type']!=""){ 
		$type = $data['type'];//时间转换类型，有day week month year
	}else{
		$type = "month";
	}
	if (isset($data['num']) && $data['num']!=""){ 
		$num = $data['num'];
	}else{
		$num = 1;
	}
	
	if ($type=="month"){
		$month = date("m",$time);
		$year = date("Y",$time);
		$_result = strtotime("$num month",$time);
		$_month = (int)date("m",$_result);
		if ($month+$num>12){
			$_num = $month+$num-12;
			$year = $year+1;
		}else{
			$_num = $month+$num;
		}
		
		if ($_num!=$_month){
		
			$_result = strtotime("-1 day",strtotime("{$year}-{$_month}-01"));
		}
	}else{
		$_result = strtotime("$num $type",$time);
	}
	if (isset($data['format']) && $data['format']!=""){ 
		return date($data['format'],$_result);
	}else{
		return $_result;
	}

}


function getMemberBorrowScan($uid){
	//借款次数相关
	$field="borrow_status,count(id) as num,sum(borrow_money) as money,sum(borrow_interest) as money_interest,sum(repayment_money) as repayment_money";
	$borrowNum=M('borrow_info')->field($field)->where("borrow_uid = {$uid}")->group('borrow_status')->select();
	foreach($borrowNum as $v){
		$borrowCount[$v['borrow_status']] = $v;
	}
	//借款次数相关
	//还款情况相关
	$field="status,sort_order,borrow_id,sum(capital) as capital,sum(interest) as interest";
	$repaymentNum=M('investor_detail')->field($field)->where("borrow_uid = {$uid}")->group('sort_order,borrow_id')->select();
	foreach($repaymentNum as $v){
		$repaymentStatus[$v['status']]['capital']+=$v['capital'];//当前状态下的数金额
		$repaymentStatus[$v['status']]['interest']+=$v['interest'];//当前状态下的数金额
		$repaymentStatus[$v['status']]['num']++;//当前状态下的总笔数
	}
	//还款情况相关
	//借出情况相关
	$field="status,count(id) as num,sum(investor_capital) as investor_capital,sum(reward_money) as reward_money,sum(investor_interest) as investor_interest,sum(receive_capital) as receive_capital,sum(receive_interest) as receive_interest";
	$investNum=M('borrow_investor')->field($field)->where("investor_uid = {$uid}")->group('status')->select();
	$_reward_money = 0;
	foreach($investNum as $v){
		$investStatus[$v['status']]=$v;
		$_reward_money+=floatval($v['reward_money']);
	}

	$field="status,sum(capital) as capital,sum(interest) as interest";
	$repaymentNum=M('investor_detail')->field($field)->where("investor_uid = {$uid}")->group('status')->select();
	foreach($repaymentNum as $v){
		//$repaymentStatus[$v['status']]['capital']+=$v['capital'];//当前状态下的数金额
		$interestStatus[$v['status']]['interest']+=$v['interest'];//当前状态下的数金额
		//$repaymentStatus[$v['status']]['num']++;//当前状态下的总笔数
	}
	//借出情况相关
	//逾期的借入
	$field="borrow_id,sort_order,sum(`capital`) as capital,count(id) as num";
	$expiredNum=M('investor_detail')->field($field)->where("`repayment_time`=0 and borrow_uid={$uid} AND status=7 and `deadline`<".time()." ")->group('borrow_id,sort_order')->select();
	$_expired_money = 0;
	foreach($expiredNum as $v){
		$expiredStatus[$v['borrow_id']][$v['sort_order']]=$v;
		$_expired_money+=floatval($v['capital']);
	}
	$rowtj['expiredMoney'] = getFloatValue($_expired_money,2);//逾期金额
	$rowtj['expiredNum'] = count($expiredNum);//逾期期数
	//逾期的借入
	//逾期的投资
	$field="borrow_id,sort_order,sum(`capital`) as capital,count(id) as num";
	$expiredInvestNum=M('investor_detail')->field($field)->where("`repayment_time`=0 and `deadline`<".time()." and investor_uid={$uid} AND status <> 0")->group('borrow_id,sort_order')->select();
	$_expired_invest_money = 0;
	foreach($expiredInvestNum as $v){
		$expiredInvestStatus[$v['borrow_id']][$v['sort_order']]=$v;
		$_expired_invest_money+=floatval($v['capital']);
	}
	$rowtj['expiredInvestMoney'] = getFloatValue($_expired_invest_money,2);//逾期金额
	$rowtj['expiredInvestNum'] = count($expiredInvestNum);//逾期期数
	//逾期的投资
	
	$rowtj['jkze'] = getFloatValue(floatval($borrowCount[6]['money']+$borrowCount[7]['money']+$borrowCount[8]['money']+$borrowCount[9]['money'] + $borrowCount[6]['money_interest']+$borrowCount[7]['money_interest']+$borrowCount[8]['money_interest']+$borrowCount[9]['money_interest']),2);//借款总额
    $rowtj['jkzess'] = getFloatValue(floatval($borrowCount[6]['money']+$borrowCount[7]['money']+$borrowCount[8]['money']+$borrowCount[9]['money'] ),2);//借款总额,不算利息
	$rowtj['yhze'] = getFloatValue(floatval($borrowCount[6]['repayment_money']+$borrowCount[7]['repayment_money']+$borrowCount[8]['repayment_money']+$borrowCount[9]['repayment_money']),2);//应还总额
	$rowtj['dhze'] = getFloatValue($rowtj['jkzess']-$rowtj['yhze'],2);//待还总额
	$rowtj['jcze'] = getFloatValue(floatval($investStatus[4]['investor_capital']+$investStatus[5]['investor_capital']+$investStatus[6]['investor_capital']),2);//借出总额
	$rowtj['ysze'] = getFloatValue(floatval($investStatus[4]['receive_capital']+$investStatus[5]['receive_capital']+$investStatus[6]['receive_capital']),2);//应收总额
	
	$rowtj['fz'] = getFloatValue($rowtj['jcze']-$rowtj['jkze'],2);
	
	$rowtj['dqrtb'] = getFloatValue($investStatus[1]['investor_capital'],2);//待确认投标
// 	$rowtj['earnInterest'] = getFloatValue(floatval($investStatus[5]['receive_interest']+$investStatus[6]['receive_interest']),2);//赚得利息
	$rowtj['earnInterest'] = getFloatValue(floatval($interestStatus[1]['interest']),2);//赚得利息
	
	$rowtj['dsze'] = getFloatValue($rowtj['jcze']-$rowtj['ysze'],2);
	
	$rowtj['payInterest'] = getFloatValue(floatval($repaymentStatus[1]['interest']+$repaymentStatus[2]['interest']+$repaymentStatus[3]['interest']+$repaymentStatus[3]['interest']),2);//支付总利息
// 	$rowtj['willgetInterest'] = getFloatValue(floatval($investStatus[4]['investor_interest']-$investStatus[4]['receive_interest']),2);//待收利息
	$rowtj['willgetInterest'] = getFloatValue(floatval($interestStatus[7]['interest']),2);//待收利息
	$rowtj['willpayInterest'] = getFloatValue(floatval($repaymentStatus[7]['interest']),2);//待确认投标
	$rowtj['borrowOut'] = getFloatValue(floatval($investStatus[4]['investor_capital']+$investStatus[5]['investor_capital']+$investStatus[6]['investor_capital']),2);//借出总额
	$rowtj['borrowIn'] = getFloatValue(floatval($borrowCount[6]['money']+$borrowCount[7]['money']+$borrowCount[8]['money']+$borrowCount[9]['money']),2);//借入总额
	
	$rowtj['jkcgcs'] = $borrowCount[6]['num']+$borrowCount[7]['num']+$borrowCount[8]['num']+$borrowCount[9]['num'];//借款成功次数
	$rowtj['tbjl'] = $_reward_money;//投标奖励
	
	$row=array();
	$row['borrow'] = $borrowCount;
	$row['repayment'] = $repaymentStatus;
	$row['invest'] = $investStatus;
	$row['tj'] = $rowtj;
	return $row;
}

function getUserWC($uid){
	$row=array();
	$field="count(id) as num,sum(withdraw_money) as money";
	$row["W"] = M('member_withdraw')->field($field)->where("uid={$uid} AND withdraw_status=2")->find();
	$field="count(id) as num,sum(money) as money";
	$row["C"] = M('member_payonline')->field($field)->where("uid={$uid} AND status=1")->find();
	return $row;
}
function getExpiredDays($deadline){
	if($deadline<1000) return "数据有误";
	return ceil( (time()-$deadline)/3600/24 );
}
function getExpiredMoney($expired,$capital,$interest){
	$glodata = get_global_setting();
	$expired_fee = explode("|",$glodata['fee_expired']);

	if($expired<=$expired_fee[0]) return 0;
	return getFloatValue(($capital+$interest)*$expired*$expired_fee[1]/1000,2);
}
function getExpiredCallFee($expired,$capital,$interest){
	$glodata = get_global_setting();
	$call_fee = explode("|",$glodata['fee_call']);
	
	if($expired<=$call_fee[0]) return 0;
	return getFloatValue(($capital+$interest)*$expired*$call_fee[1]/1000,2);
}


function getNet($minfo,$capitalinfo){
	return getFloatValue($minfo['account_money'] + $minfo['money_freeze'] + $minfo['money_collect'] - intval($capitalinfo['borrow'][6]['money'] - $capitalinfo['borrow'][6]['repayment_money']),2);	
}

function setBackUrl($per="",$suf=""){
	$url = $_SERVER['HTTP_REFERER'];
	$urlArr = parse_url($url);
	$query = $per."?1=1&".$urlArr['query'].$suf;
	session('listaction',$query);
}

function checkNeedCheck($phone){
	$exceptInfo = C('EXCEPT_INFO');
	$exceptPhones = $exceptInfo["PHONE"];
	if(count($exceptPhones) > 0){
		if(in_array($phone,$exceptPhones)){
			return false;
		}else{
			return true;
		}
	}else{
		return true;
	}
}

function getDefaultSeoInfo($content, $type){
	$ret = $content;
	switch ($type){
		case 1://keyword
			if(empty($ret)){
				$datag = get_global_setting();
				$ret = $datag["web_keywords"];
			}
			break;
		case 2://description
			if(empty($ret)){
				$datag = get_global_setting();
				$ret = $datag["web_descript"];
			}
			break;
			
	}
	return $ret;
}

function getFinancialData(){
	return array(
				'rjsno1'=>array(
						'id'=>'rjsno1',
						'pro_tit'=>'XXX一号',
						'raise_money'=>'6000万',
						'annual_profit'=>'14%',
						'time_limit'=>'12个月',
						'profit_distribute'=>'按季度分配',
						'trade_type'=>'私募（有限合伙）',
						'pro_price'=>'10万',
						'min_price'=>'100000',
						'issuer'=>'深圳市XXX投资管理有限公司',
						'guarantee_institution'=>'深圳市XXX投资管理有限公司',
						'pro_name'=>'深圳XXX一号投资企业（有限合伙）',
				),
				'rjsno2'=>array(
						'id'=>'rjsno2',
						'pro_tit'=>'XXX二号',
						'raise_money'=>'4000万',
						'annual_profit'=>'14%',
						'time_limit'=>'12个月',
						'profit_distribute'=>'按季度分配',
						'trade_type'=>'私募（有限合伙）',
						'pro_price'=>'10万',
						'min_price'=>'100000',
						'issuer'=>'深圳市XXX投资管理有限公司',
						'guarantee_institution'=>'深圳市XXX投资管理有限公司',
						'pro_name'=>'深圳XXX二号投资企业（有限合伙）',
				),
		);
}
function array_sort($arr,$keys,$type='asc'){
	$keysvalue = $new_array = array();
	foreach ($arr as $k=>$v){
		$keysvalue[$k] = $v[$keys];
	}
	if($type == 'asc'){
		asort($keysvalue);
	}else{
		arsort($keysvalue);
	}
	reset($keysvalue);
	foreach ($keysvalue as $k=>$v){
		$new_array[$k] = $arr[$k];
	}
	return $new_array;
}
function to_wan($money){
	$wan = sprintf("%.2f", $money/10000);
	return rtrim(rtrim($wan, '0'), '.')."万";
}
function formatUploadMsg($msg){
	if(strpos($msg, "文件超过了")!==false){
		return "文件大小超过限制";
	}
	return $msg;
}
function getCategoryById($id){
	$ro=array();
	if(intval($id)<=0)return $ro;
	$allCacheKeys = C("ALL_CACHE_KEYS");
	$cachekey = $allCacheKeys["art_cat_id"].$id;
	if(!S($cachekey)){
		$ro = D('Acategory')->find($id);
		S($cachekey, $ro, 3600*C("TTXF_TMP_HOUR"));
	}else{
		$ro =  S($cachekey);
	}
	return $ro;
}
function getCategoryByParentId($parent_id){
	$ro=array();
	$allCacheKeys = C("ALL_CACHE_KEYS");
	$cachekey = $allCacheKeys["art_cat_pid"].$parent_id;
	if(!S($cachekey)){
		$ro = D('Acategory')->where("parent_id = {$parent_id}")->select();
		S($cachekey, $ro, 3600*C("TTXF_TMP_HOUR"));
	}else{
		$ro =  S($cachekey);
	}
	return $ro;
}
function getCategoryCountByParentId($parent_id){
	$ro=array();
	$allCacheKeys = C("ALL_CACHE_KEYS");
	$cachekey = $allCacheKeys["art_cat_pid_count"].$parent_id;
	if(!S($cachekey)){
		$ro = D('Acategory')->where("parent_id = {$parent_id}")->count("id");
		S($cachekey, $ro, 3600*C("TTXF_TMP_HOUR"));
	}else{
		$ro =  S($cachekey);
	}
	return $ro;
}
function getCategoryByCondition($map, $Osql, $Lsql){
	$ro=array();
	$allCacheKeys = C("ALL_CACHE_KEYS");
	$mapstr = "";
	foreach($map as $k=>$v){
		$mapstr.=$k.$v;
	}
	$cachekey = $allCacheKeys["art_cat_cond"].$mapstr.$Osql.$Lsql;
	$cachekey = str_replace(' ', '', $cachekey);
	if(!S($cachekey)){
		$ro = D('Acategory')->where($map)->order($Osql)->limit($Lsql)->select();
		S($cachekey, $ro, 3600*C("TTXF_TMP_HOUR"));
	}else{
		$ro =  S($cachekey);
	}
	return $ro;
}
function getMsgCount($uid, $needBracket=true){
	$count = M("inner_msg")->where(array("uid"=>$uid, "status"=>0))->count("1");
	if($needBracket) echo "(".$count.")";
	else echo $count;
}
function parseSql($sql,$parse) {
	foreach ( $parse as $k => $v ) {
		$parse[$k] = addslashes( $v );
	}
	$sql  = vsprintf($sql,$parse);
	return $sql;
}
function checkNeedTip($systips, $key){
	if(empty($systips))return true;
	$tipset = $systips['tipset'];
	if(empty($tipset))return false;
	$tipsetarr = explode(",", $tipset);
	foreach($tipsetarr as $tip){
		if($tip == $key){
			return true;
		}
	}
	return false;
}
//获得当前的脚本网址
function GetCurUrl()
{
	if(!empty($_SERVER["REQUEST_URI"]))
	{
		$scriptName = $_SERVER["REQUEST_URI"];
		$nowurl = $scriptName;
	}
	else
	{
		$scriptName = $_SERVER["PHP_SELF"];
		if(empty($_SERVER["QUERY_STRING"]))
		{
			$nowurl = $scriptName;
		}
		else
		{
			$nowurl = $scriptName."?".$_SERVER["QUERY_STRING"];
		}
	}
	return $nowurl;
}
function goUrl($url,$time,$msg,$sucs=1,$content='')
{
$sucs_css=$sucs==1?'Prompt_ok':'Prompt_x';
$html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" />
</head>
<body>
<style type="text/css">
* { word-wrap:break-word }
body { font:12px Microsoft YaHei,Arial,Helvetica,sans-serif,Simsun; text-align:center; color:#333; }
body, div, dl, dt, dd, ul, ol, li, pre, form, fieldset, blockquote, h1, h2, h3, h4, h5, h6,p{ padding:0; margin:0 }
h1, h2, h3, h4, h5, h6 { font-weight: normal; }
table, td, tr, th { font-size:12px }
li { list-style-type:none }
table { margin:0 auto }
img { border:none }
ol, ul { list-style:none }
caption, th { text-align:left }
.Prompt_top, .Prompt_btm, .Prompt_ok, .Prompt_x { background:url(/Style/tip/images/message.gif) no-repeat; display:inline-block }
.Prompt { width:640px; margin:100px auto 180px; text-align:left; }
.Prompt_top { background-position:0 0; height:15px; width:100%; }
.Prompt_con { width:100%; border-left:1px solid #E7E7E7; border-right:1px solid #E7E7E7; background:#fff; overflow:hidden;}
.Prompt_btm { background-position:0 -27px; height:6px; width:100%; overflow:hidden; }
.Prompt_con dl { overflow:hidden;border-left:1px solid #E7E7E7; border-right:1px solid #E7E7E7; background:#fff;}
.Prompt_con dt { width:100%; font-size:18px; padding:15px; border-bottom:2px solid #E7E7E7;font-weight: bold;_height:20px;}
.Prompt_con dd { float:left; display:block; padding:15px; }
.Prompt_con dd h2 { font-size:14px; line-height:30px;word-break:break-all;}
.Prompt_ok { background-position:-72px -39px; width:68px; height:68px; }
.Prompt_x { background-position:0 -39px; width:68px; height:68px; }
.Prompt_con a.a { color:#fff; padding:0 15px; line-height:30px; background-color:#307ba0; display:inline-block; font-size:14px; margin:20px 0px; }
.con_b {font-size:16px;margin:10px 0;font-weight:bold;}
</style>
<script>
function Jump(){
    window.location.href = \''.$url.'\';
}
var waitTime = parseInt("'.$time.'");
if(waitTime >= 0){
document.onload = setTimeout("Jump()" , waitTime* 1000);
}
if(waitTime > 0){
var wi = setInterval(function(){
document.getElementById("spanWait").innerText = --waitTime;
if(waitTime == 0)clearInterval(wi);
}, 1000);
}
</script>
<base target="_self" />

<div class="Prompt">
  <div class="Prompt_top"></div>
  <div class="Prompt_con">
    <dl>
      <dt>提示信息</dt>
      <dd><span class="'.$sucs_css.'"></span></dd>
      <dd>
        <h2>'.$msg.'</h2>
                <p class="con_b">'.$content.'</p>
<p>系统将在 <span style="color:blue;font-weight:bold" id="spanWait">3</span> 秒后自动跳转,如果不想等待,直接点击 <A HREF="/">这里</A> 马上跳转</p>      </dd>
    </dl>
    <div class="c"></div>
    </div>
    <div class="Prompt_btm"></div>
  </div></body>
</html>
';
Mheader('utf-8');
echo $html;
}
?>