<?php
function do_mencrypt($input, $key) {
	$input = str_replace ( "\n", "", $input );
	$input = str_replace ( "\t", "", $input );
	$input = str_replace ( "\r", "", $input );
	$size = mcrypt_get_block_size ( MCRYPT_DES, MCRYPT_MODE_CBC );
	$input = pkcs5Pad ( $input, $size );
	$iv = "EjRWeJCrze8=";
	return base64_encode ( mcrypt_cbc ( MCRYPT_DES, $key, $input, MCRYPT_ENCRYPT, base64_decode ( $iv ) ) );
}
// $input - stuff to decrypt
// $key - the secret key to use
function do_mdecrypt($input, $key) {
	$input = str_replace ( "\n", "", $input );
	$input = str_replace ( "\t", "", $input );
	$input = str_replace ( "\r", "", $input );
	$input = base64_decode ( $input );
	$iv = "EjRWeJCrze8=";
	$str = mcrypt_cbc ( MCRYPT_DES, $key, $input, MCRYPT_DECRYPT, base64_decode ( $iv ) );
	$str = pkcs5Unpad ( $str );
	return $str;
}
function pkcs5Pad($text, $blocksize) {
	$pad = $blocksize - (strlen ( $text ) % $blocksize);
	return $text . str_repeat ( chr ( $pad ), $pad );
}
function pkcs5Unpad($text) {
	$pad = ord ( $text {strlen ( $text ) - 1} );
	if ($pad > strlen ( $text ))
		return false;
	if (strspn ( $text, chr ( $pad ), strlen ( $text ) - $pad ) != $pad)
		return false;
	return substr ( $text, 0, - 1 * $pad );
}
?> 