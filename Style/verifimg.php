<?php
session_start();
function GetVerify($length)
{
	//$strings = Array('3','4','5','6','7','a','b','c','d','e','f','h','i','j','k','m','n','p','r','s','t','u','v','w','x','y');
	$strings = Array('1','2','3','4','5','6','7','8','9','10');
	$chrNum = "";
	$count = count($strings);
	for ($i = 1; $i <= $length; $i++) {								//ѭȡַַ
		$chrNum .= $strings[rand(0,$count-1)];
	}
	return $chrNum;
}
$fontSize = 18;													//С
$length = 4;													//ַ
$strNum = GetVerify($length);											//ȡһַ
$_SESSION['verifys'] = $strNum;									//ֵsession
$width = 80;													//ͼƬ
$height = 25;													//ͼƬ߶
$im = imagecreate($width,$height);									//һָߵͼƬ
$backgroundcolor = imagecolorallocate ($im, 255, 255, 255);				//ɱɫ
$frameColor = imageColorAllocate($im, 150, 150, 150);					//ɱ߿ɫ
$font = realpath("./Plugs/ARIAL.TTF");						//ȡļʼд
for($i = 0; $i < $length; $i++) {
	$charY = ($height+9)/2 + rand(-1,1);								//ַY
	$charX = $i*15+22;											//ַX
															//ַɫ
	$text_color = imagecolorallocate($im, mt_rand(50, 200), mt_rand(50, 128), mt_rand(50, 200));
	$angle = rand(-20,20);										//ַǶ
															//дַ
	imageTTFText($im, $fontSize, $angle, $charX,  $charY, $text_color, $font, $strNum[$i]);
}
for($i=0; $i <= 5; $i++) {											//ѭ
	$linecolor = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
	$linex = mt_rand(1, $width-1);
	$liney = mt_rand(1, $height-1);
	imageline($im, $linex, $liney, $linex + mt_rand(0, 4) - 2, $liney + mt_rand(0, 4) - 2, $linecolor);
}
for($i=0; $i <= 32; $i++) {											//ѭ,Ч
	$pointcolor = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
	imagesetpixel($im, mt_rand(1, $width-1), mt_rand(1, $height-1), $pointcolor);
}
imagerectangle($im, 0, 0, $width-1 , $height-1 , $frameColor);				//߿
ob_clean();
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
/**
 * ܣַ
 */
exit;
?>