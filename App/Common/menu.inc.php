<?php
/*array(菜单名，菜单url参数，是否显示)*/
$i=0;
$j=0;
$menu_left =  array();
$menu_left[$i]=array('全局','#',1);
$menu_left[$i]['low_title'][$i."-".$j] = array('全局设置','#',1);
$menu_left[$i][$i."-".$j][] = array('欢迎页',U('/admin/welcome/index'),1);
$menu_left[$i][$i."-".$j][] = array('网站设置',U('/admin/global/websetting'),1);
$menu_left[$i][$i."-".$j][] = array('友情链接',U('/admin/global/friend'),1);
$menu_left[$i][$i."-".$j][] = array('地区管理',U('/admin/area/'),1);
$menu_left[$i][$i."-".$j][] = array('广告管理',U('/admin/ad/'),1);
$menu_left[$i][$i."-".$j][] = array('会员级别管理',U('/admin/leve/index'),1);
$menu_left[$i][$i."-".$j][] = array('会员年龄别称',U('/admin/age/index'),1);
$menu_left[$i][$i."-".$j][] = array('登陆接口管理',U('/admin/loginonline/'),1);
$menu_left[$i][$i."-".$j][] = array('活动管理',U('/admin/active/'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('在线通知管理','#',1);
$menu_left[$i][$i."-".$j][] = array('支付接口管理',U('/admin/payonline/'),1);
$menu_left[$i][$i."-".$j][] = array('通知信息接口管理',U('/admin/msgonline/'),1);
$menu_left[$i][$i."-".$j][] = array('通知信息模板管理',U('/admin/msgonline/templet/'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('缓存管理','#',1);
$menu_left[$i][$i."-".$j][] = array('前台模板',U('/admin/global/cleantemplet?acahe=1'),1);
$menu_left[$i][$i."-".$j][] = array('后台模板',U('/admin/global/cleantemplet?acahe=2'),1);
$menu_left[$i][$i."-".$j][] = array('会员中心',U('/admin/global/cleantemplet?acahe=3'),1);
$menu_left[$i][$i."-".$j][] = array('数据缓存',U('/admin/global/cleandata'),1);
$menu_left[$i][$i."-".$j][] = array('所有缓存',U('/admin/global/cleanall'),1);

$i++;
$menu_left[$i]= array('借款管理','#',1);
$menu_left[$i]['low_title'][$i."-".$j] = array('借款列表','#',1);
$menu_left[$i][$i."-".$j][] = array('初审待审核借款',U('/admin/borrow/waitverify'),1);
$menu_left[$i][$i."-".$j][] = array('复审待审核借款',U('/admin/borrow/waitverify2'),1);
$menu_left[$i][$i."-".$j][] = array('招标中借款',U('/admin/borrow/waitmoney'),1);
$menu_left[$i][$i."-".$j][] = array('还款中借款',U('/admin/borrow/repaymenting'),1);
$menu_left[$i][$i."-".$j][] = array('已完成的借款',U('/admin/borrow/done'),1);
$menu_left[$i][$i."-".$j][] = array('已流标借款',U('/admin/borrow/unfinish'),1);
$menu_left[$i][$i."-".$j][] = array('初审未通过的借款',U('/admin/borrow/fail'),1);
$menu_left[$i][$i."-".$j][] = array('复审未通过的借款',U('/admin/borrow/fail2'),1);
$menu_left[$i][$i."-".$j][] = array('近N天到期的借款',U('/admin/borrow/expire'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('逾期借款管理','#',1);
$menu_left[$i][$i."-".$j][] = array('逾期统计',U('/admin/expired/detail'),0);
$menu_left[$i][$i."-".$j][] = array('已逾期借款',U('/admin/expired/index'),1);
$menu_left[$i][$i."-".$j][] = array('逾期会员列表',U('/admin/expired/member'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('推送信息管理','#',1);
$menu_left[$i][$i."-".$j][] = array('新标短信提醒',U('/admin/new_borrow/index'),1);
$menu_left[$i][$i."-".$j][] = array('短信群发',U('/admin/mass_send/index'),1);
$menu_left[$i][$i."-".$j][] = array('活动站内信',U('/admin/innermsg/index'),1);

$i++;
$menu_left[$i]= array('会员管理','#',1);
$menu_left[$i]['low_title'][$i."-".$j] = array('会员管理','#',1);
$menu_left[$i][$i."-".$j][] = array('会员列表',U('/admin/members/index'),1);
$menu_left[$i][$i."-".$j][] = array('会员资料列表',U('/admin/members/info'),1);
$menu_left[$i][$i."-".$j][] = array('举报信息',U('/admin/jubao/index'),1);
$menu_left[$i][$i."-".$j][] = array('专属客服',U('/admin/members/delicated'),1);
$menu_left[$i][$i."-".$j][] = array('用户推广明细',U('/admin/members/invite'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('认证及申请管理','#',1);
$menu_left[$i][$i."-".$j][] = array('手机认证会员',U('/admin/verify_phone/index'),1);
$menu_left[$i][$i."-".$j][] = array('视频认证申请',U('/admin/verify_video/index'),1);
$menu_left[$i][$i."-".$j][] = array('现场认证申请',U('/admin/verify_face/index'),1);
$menu_left[$i][$i."-".$j][] = array('VIP申请管理',U('/admin/vipapply/index'),1);
$menu_left[$i][$i."-".$j][] = array('会员实名认证申请',U('/admin/memberid/index'),1);
$menu_left[$i][$i."-".$j][] = array('额度申请待审核',U('/admin/members/infowait'),1);
$menu_left[$i][$i."-".$j][] = array('上传资料管理',U('/admin/memberdata/index'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('留言管理','#',1);
$menu_left[$i][$i."-".$j][] = array('留言列表',U('/admin/feedback/index'),1);
$menu_left[$i][$i."-".$j][] = array('评论列表',U('/admin/comment/index?is_audit=0'),1);
$menu_left[$i][$i."-".$j][] = array('用户意见查看',U('/admin/useradvice/index'),1);

$i++;
$menu_left[$i]= array('充值提现','#',1);
$menu_left[$i]['low_title'][$i."-".$j] = array('充值提现管理','#',1);
$menu_left[$i][$i."-".$j][] = array('充值记录',U('/admin/Paylog/index'),1);
$menu_left[$i][$i."-".$j][] = array('提现申请',U('/admin/Withdrawlog/index'),1);

$i++;
$menu_left[$i]= array('文章管理','#',1);
$menu_left[$i]['low_title'][$i."-".$j] = array('文章管理','#',1);
$menu_left[$i][$i."-".$j][] = array('文章列表',U('/admin/article/'),1);
$menu_left[$i][$i."-".$j][] = array('文章分类',U('/admin/acategory/'),1);
$i++;
$menu_left[$i]= array('资金统计','#',1);
$menu_left[$i]['low_title'][$i."-".$j] = array('会员帐户','#',1);
$menu_left[$i][$i."-".$j][] = array('会员帐户',U('/admin/capital_account/index'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('充值提现','#',1);
$menu_left[$i][$i."-".$j][] = array('充值记录',U('/admin/capitalOnline/charge'),1);
$menu_left[$i][$i."-".$j][] = array('提现记录',U('/admin/capitalOnline/withdraw'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('会员资金变动记录','#',1);
$menu_left[$i][$i."-".$j][] = array('资金记录',U('/admin/capital_detail/index'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('网站资金统计','#',1);
$menu_left[$i][$i."-".$j][] = array('网站资金统计',U('/admin/capital_all/index'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('客服客户统计','#',1);
$menu_left[$i][$i."-".$j][] = array('客服客户统计',U('/admin/customer/index'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('统计报表','#',1);
// $menu_left[$i][$i."-".$j][] = array('充值记录统计',U('/admin/rechargecount/index'),1);
$menu_left[$i][$i."-".$j][] = array('会员投资统计',U('/admin/financestat/index'),1);




$i++;
$menu_left[$i]= array('权限','#',1);
$menu_left[$i]['low_title'][$i."-".$j] = array('用户权限管理',"#",1);
$menu_left[$i][$i."-".$j][] = array('管理员管理',U('/admin/Adminuser/'),1);
$menu_left[$i][$i."-".$j][] = array('用户组权限管理',U('/admin/acl/'),1);
$menu_left[$i][$i."-".$j][] = array('修改密码',U('/admin/editinfo/index'),1);
$j++;
$menu_left[$i]['low_title'][$i."-".$j] = array('文件管理','#',0);
$menu_left[$i][$i."-".$j][] = array('文件管理',U('/admin/mfields/'),1);

// $i++;
// $menu_left[$i]= array('数据库','#',1);
// $menu_left[$i]['low_title'][$i."-".$j] = array('数据库管理','#',1);
// $menu_left[$i][$i."-".$j][] = array('数据库信息',U('/admin/db/'),1);
// $menu_left[$i][$i."-".$j][] = array('备份管理',U('/admin/db/baklist'),1);
// $menu_left[$i][$i."-".$j][] = array('清空数据',U('/admin/db/truncate'),1);

// $i++;
// $menu_left[$i]= array('短信管理','#',1);
// $menu_left[$i]['low_title'][$i."-".$j] = array('短信接口','#',1);
// $menu_left[$i][$i."-".$j][] = array('查询余额',U('/admin/sms/getFee'),1);
// $menu_left[$i][$i."-".$j][] = array('发送短信',U('/admin/sms/massSend'),1);
// $menu_left[$i][$i."-".$j][] = array('接收短信',U('/admin/sms/receive'),1);
// $menu_left[$i][$i."-".$j][] = array('修改密码',U('/admin/sms/cpwd'),1);
?>