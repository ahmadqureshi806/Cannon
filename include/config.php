<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "cannon";
 
date_default_timezone_set('America/Los_Angeles');

$goodideas = new mysqli($servername, $username, $password, $db_name);
if ($goodideas->connect_error) {
    die("Connection failed: " . $goodideas->connect_error);
}
function clean($string) {
   $string = str_replace(' ', '_', $string);
   return preg_replace('/-+/', '-', $string);
}
function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'Cannon';
    $secret_iv = 'CannonB19';
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

$pass_code_main="CannonB19";
$admin_pass_code="00209405";

?>