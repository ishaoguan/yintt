<?php

/*
		SoftName : JingPai2010 Version 2012
		Author   : lzhhand
		Copyright: Powered by www.jingpai2010.com
*/

DB_D("DROP TABLE IF EXISTS `pre_common_searchindex`;");
DB_C("CREATE TABLE `pre_common_searchindex` (
  `searchid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `srchmod` tinyint(3) unsigned NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `searchstring` text NOT NULL,
  `useip` varchar(15) NOT NULL DEFAULT '',
  `uid` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `expiration` int(10) unsigned NOT NULL DEFAULT '0',
  `threadsortid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `num` smallint(6) unsigned NOT NULL DEFAULT '0',
  `ids` text NOT NULL,
  PRIMARY KEY (`searchid`),
  KEY `srchmod` (`srchmod`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8");
DB_I("replace  into `pre_common_searchindex` values('1','2','交友','forum|title|5Lqk5Y+L|0||\\\\''2\\\\'',\\\\''36\\\\'',\\\\''37\\\\'',\\\\''38\\\\'',\\\\''39\\\\'',\\\\''42\\\\'',\\\\''43\\\\'',\\\\''44\\\\'',\\\\''45\\\\'',\\\\''46\\\\'',\\\\''47\\\\'',\\\\''48\\\\'',\\\\''50\\\\'',\\\\''51\\\\''|0|0|all|||0','123.125.71.60','0','1357684124','1357687724','0','0','0');");
DB_I("replace  into `pre_common_searchindex` values('2','2','discuz','forum|title|ZGlzY3V6|0||\\\\''2\\\\'',\\\\''36\\\\'',\\\\''37\\\\'',\\\\''38\\\\'',\\\\''39\\\\'',\\\\''42\\\\'',\\\\''43\\\\'',\\\\''44\\\\'',\\\\''45\\\\'',\\\\''46\\\\'',\\\\''47\\\\'',\\\\''48\\\\'',\\\\''50\\\\'',\\\\''51\\\\''|0|0|all|||0','123.125.71.18','0','1357685850','1357689450','0','0','0');");
DB_I("replace  into `pre_common_searchindex` values('3','2','活动','forum|title|5rS75Yqo|0||\\\\''2\\\\'',\\\\''36\\\\'',\\\\''37\\\\'',\\\\''38\\\\'',\\\\''39\\\\'',\\\\''42\\\\'',\\\\''43\\\\'',\\\\''44\\\\'',\\\\''45\\\\'',\\\\''46\\\\'',\\\\''47\\\\'',\\\\''48\\\\'',\\\\''50\\\\'',\\\\''51\\\\''|0|0|all|||0','123.125.71.60','0','1357704836','1357708436','0','0','0');");
DB_I("replace  into `pre_common_searchindex` values('4','2','discuz','forum|title|ZGlzY3V6|0||\\\\''2\\\\'',\\\\''36\\\\'',\\\\''37\\\\'',\\\\''38\\\\'',\\\\''39\\\\'',\\\\''42\\\\'',\\\\''43\\\\'',\\\\''44\\\\'',\\\\''45\\\\'',\\\\''46\\\\'',\\\\''47\\\\'',\\\\''48\\\\'',\\\\''50\\\\'',\\\\''51\\\\''|0|0|all|||0','123.125.71.91','0','1357707854','1357711454','0','0','0');");
DB_I("replace  into `pre_common_searchindex` values('5','2','交友','forum|title|5Lqk5Y+L|0||\\\\''2\\\\'',\\\\''36\\\\'',\\\\''37\\\\'',\\\\''38\\\\'',\\\\''39\\\\'',\\\\''42\\\\'',\\\\''43\\\\'',\\\\''44\\\\'',\\\\''45\\\\'',\\\\''46\\\\'',\\\\''47\\\\'',\\\\''48\\\\'',\\\\''50\\\\'',\\\\''51\\\\''|0|0|all|||0','123.125.71.32','0','1357711387','1357714987','0','0','0');");
DB_I("replace  into `pre_common_searchindex` values('6','2','活动','forum|title|5rS75Yqo|0||\\\\''2\\\\'',\\\\''36\\\\'',\\\\''37\\\\'',\\\\''38\\\\'',\\\\''39\\\\'',\\\\''42\\\\'',\\\\''43\\\\'',\\\\''44\\\\'',\\\\''45\\\\'',\\\\''46\\\\'',\\\\''47\\\\'',\\\\''48\\\\'',\\\\''50\\\\'',\\\\''51\\\\''|0|0|all|||0','123.125.71.16','0','1357713558','1357717158','0','0','0');");

?>