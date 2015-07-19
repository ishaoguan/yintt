<?php
abstract class SmsBase{
	var $msgconfig;
	var $ismsinfo;
	
	abstract public function getFee();
	abstract public function massSend($mob, $content, $time);

	public function __construct() {
		$this->msgconfig = FS("Webconfig/msgconfig");
		$this->ismsinfo = C("ISMS_INFO");
		if(method_exists($this,'_initialize'))
			$this->_initialize();
	}
}