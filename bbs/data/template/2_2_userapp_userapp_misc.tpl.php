<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('common/header_ajax'); if($_GET['action'] == 'menu') { if(isset($list['1']) && $list['1']) { ?>
<ul class="mrec"><?php if(is_array($list['1'])) foreach($list['1'] as $app) { ?><li>
<a href="<?php echo $app['url'];?>" target="_top">
<img src="<?php echo $app['pic'];?>"><br/>
<?php echo $app['name'];?>
</a>
<span class="icon_hotapp">荐</span>
</li>
<?php } ?>
</ul>
<?php } ?>
<ul class="uused"><?php if(is_array($usedList)) foreach($usedList as $app) { ?><li>
<a href="<?php echo $app['url'];?>" target="_top">
<img src="<?php echo $app['pic'];?>"><br/>
<?php echo $app['name'];?>
</a>
</li>
<?php } ?>
</ul>
<ul class="adv">
<li class="icon_myapp"><a href="userapp.php?#/userapp/list" title="我的应用">我的应用</a></li>
<li class="icon_myapp icon_appcenter"><a href="userapp.php" title="应用中心">应用中心</a></li>
<li class="cl"></li>
<?php if(isset($list['3']) && $list['3']) { if(is_array($list['3'])) foreach($list['3'] as $app) { ?><li class="ad_img hm">
<a href="<?php echo $app['url'];?>" target="_top">
<img src="<?php echo $app['pic'];?>"><br/>
<?php echo $app['name'];?>
</a>
</li>
<?php } } ?>
</ul>
<?php } include template('common/footer_ajax'); ?>