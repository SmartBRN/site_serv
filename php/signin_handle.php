<?php
session_start();
include_once ('users_db.php');
$login = $_POST['login'];
$password = $_POST['password'];
$sql = mysqli_query($connection,"SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");	
	
if(isset($_POST['submit'])){
		
	if ( mysqli_num_rows($sql) == 1){
		// mysqli_query($connection,"UPDATE * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");	
		setcookie('user_cookie', $login, time()+86400, "/");
		header("location: /serv/index.php");
	}
	 
	else {
		$_SESSION['error'] = 1;
		$_SESSION['login'] = $login;
		header("location: /serv/index.php");
	}
}

mysqli_query($connection,"SET NAMES 'utf8' ");
?>