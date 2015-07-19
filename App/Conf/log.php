<?php
return array(
		'BORROW_LOG_KEY'=>array(
				'TABLE_NAME'=>'borrow_info',
				'borrow_name'=>array('name'=>'借款标题'),
				'repayment_type'=>array('name'=>'还款方式','param'=>'REPAYMENT_TYPE'),
				'borrow_money'=>array('name'=>'借款金额'),
				'borrow_interest_rate'=>array('name'=>'利率'),
				'borrow_duration'=>array('name'=>'借款期限'),
				'reward_type'=>array('name'=>'投标奖励类型', 'param'=>'IS_REWARD'),
				'reward_num'=>array('name'=>'投标奖励值'),
				'borrow_info'=>array('name'=>'借款说明'),
				'pro_provide'=>array('name'=>'产品提供'),
				'can_auto'=>array('name'=>'是否允许自动投标','param'=>'IS_HTML'),
				'is_tuijian'=>array('name'=>'是否设为推荐','param'=>'IS_HTML'),
				'borrow_type'=>array('name'=>'借款标分类','param'=>'BORROW_TYPE'),
				'borrow_fee'=>array('name'=>'借款管理费'),
				'collect_day'=>array('name'=>'募集时间(天)','param'=>'BORROW_TIME'),
				'borrow_max'=>array('name'=>'最多投标总额'),
				'borrow_status'=>array('name'=>'审核状态','param'=>'BORROW_STATUS'),
				'deal_info'=>array('name'=>'初审处理意见'),
				'deal_info_2'=>array('name'=>'复审处理意见'),
		),
);
?>