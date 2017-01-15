<?php
/**
 * Created by PhpStorm.
 * User: nathanliu
 * Date: 14/01/2017
 * Time: 22:30
 */

include('Crypt/RSA.php');

function decryptMessage($ciphertext) {
    $rsa = new Crypt_RSA();
    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    $rsa->loadKey(file_get_contents('private.key')); // private key
    echo $rsa->decrypt($ciphertext);
}


function encryptMessage($plaintext) {
    $rsa = new Crypt_RSA();
    $rsa->loadKey(file_get_contents('public.key'));
    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    return $rsa->encrypt($plaintext);
}

$e = encryptMessage('hello');

decryptMessage($e);
?>
