<?php
// Session start to reach priv8 and public key.
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}

include('lib/Crypt/RSA.php');
$rsa = new Crypt_RSA();

// Setting private key to encryption object to decrypt post body.
$rsa->loadKey($_SESSION['private_key']);
// JS and PHP encryption class have to use same encryption method!
$rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
// Decryption of post body
$ciphertext = $rsa->decrypt(base64_decode($_POST['encrypted_data']));


debug_to_console( @$_REQUEST );
echo $ciphertext;
?>
