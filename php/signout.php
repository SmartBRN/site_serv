<?php
session_start();
setcookie('user_cookie', $login, time()-86400, "/");
session_destroy();
header("location: /serv/index.php");
?>