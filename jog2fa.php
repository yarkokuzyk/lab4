<?php 
require_once 'PHPGangsta/GoogleAuthenticator.php';

$secret = 'ZMUUXMGAJQAYAYKE '

$qa = new PHPGangsta_GoogleAuthenticator();

if (isset($_POST['google_code']))
{
	$code = $_POST['google_code'];
	$qa = new PHPGangsta_GoogleAuthenticator();
	$result = $qa->verifycode( $secret, $code, 3);
	echo $result;
	
}
?>