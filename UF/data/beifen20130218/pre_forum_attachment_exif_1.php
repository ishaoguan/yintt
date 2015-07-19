<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_forum_attachment_exif`;");
DB_C("CREATE TABLE `pre_forum_attachment_exif` (
  `aid` mediumint(8) unsigned NOT NULL,
  `exif` text NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

?>