<?php

if (isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "") {
    include "db_config.php";
    $secret = '6LeC0B8jAAAAAKAP5kNu9UQKYlGVUP3BfvvIcecU';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {
        
        //first validate then insert in db
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        mysqli_query($conn, "INSERT INTO signup(name, email ,password) VALUES('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . md5($_POST['password']) . "')");
        echo "Your registration has been successfully done!";
    }
}