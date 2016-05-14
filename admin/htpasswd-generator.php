<?php 

$username = 'cyril';
$password = 'site2016';
$encryptedPassword = crypt($password, base64_encode($password));
echo $username.':'.$encryptedPassword;




 ?>