<?php
session_unset();
session_destroy();

header("Location: ../pages/login.php?message=You have successfully logged out.");
exit();
?>