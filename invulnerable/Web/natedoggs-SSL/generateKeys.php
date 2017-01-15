<?php
include('Crypt/RSA.php');

$rsa = new Crypt_RSA();

extract($rsa->createKey());

echo $privatekey . '<br/>' . $publickey;
?>