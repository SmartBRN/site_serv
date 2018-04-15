<?php

$connection = mysqli_connect('localhost','user','password','smartbrn') ;

if(!$connection)
{
	echo 'Не удалось подключиться к базе данных!';
	echo mysqli_connect_error();
	die();
}

?>