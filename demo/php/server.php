<?php
// Session start to reach priv8 and public key.
session_start();

include('lib/Crypt/RSA.php');
$rsa = new Crypt_RSA();

// Setting private key to encryption object to decrypt post body.
$rsa->loadKey($_SESSION['private_key']);
// JS and PHP encryption class have to use same encryption method!
$rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
// Decryption of post body
$ciphertext = $rsa->decrypt(base64_decode($_POST['encrypted_data']));

echo "<pre>";
echo "<b>Post body</b><br>";
print_r(@$_REQUEST);
echo "</pre>";
echo "<b>Plain-text of post body.</b><br>";
echo $ciphertext;
?>