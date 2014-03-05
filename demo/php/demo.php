<?php
session_start();

include('lib/Crypt/RSA.php');

$rsa = new Crypt_RSA();
extract($rsa->createKey());
$_SESSION['private_key'] = $privatekey;
$_SESSION['public_key'] = $publickey;
?>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <script type="application/javascript" src="../../js/jquery-1.11.0.min.js"></script>
        <script type="application/javascript" src="../../js/jquery.cryptopost.js"></script>
        <script>
            var public_key = '<?php echo preg_replace('/\s+/', ' ', trim($_SESSION['public_key']));?>';
        </script>
    </head>
    <body>
        <div style="text-align: center">
            <form action="server.php" method="POST">
                <input type="name" name="field_one"/>
                <br>
                <input type="name" name="field_two"/>
                <br>
                <input type="submit" name="submit" value="Submit"/>
            </form>
        </div>
    </body>
</html>