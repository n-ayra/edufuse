<?php
$plain_password = "123456"; // Replace with the actual password
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
echo $hashed_password;
?>
