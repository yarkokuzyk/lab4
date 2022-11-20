<?php
require_once 'PHPGangsta/GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();
$secret = '6PCMBC6ULX2O5UXK';
echo "Secret is: ".$secret."\n\n";

$qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
echo "\nGoogle Charts URL for the QR-Code: ".$qrCodeUrl."\n\n";

$oneCode = $ga->getCode($secret);
echo "Checking Code '$oneCode' and Secret '$secret':\n";

$checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
if ($checkResult) {
    echo 'OK';
} else {
    echo 'FAILED';
}
?>