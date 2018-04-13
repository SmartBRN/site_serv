<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<!DOCTYPE html>
<html>
<head>
	<?
	include_once 'head.php';
	?>
</head>
<body>
	<?
	include_once'header.php'; /*Здесь верстка шапки сайта*/
	session_start();
	// $host = 
	// $user_name = 
	// $user_pass = 
	// $db_name = 

	$link = mysqli_connect('$host', '$user_name', '$user_pass', '$db_name');
	if (!$link) {
	    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
	    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	mysqli_query($link,"SET NAMES 'utf8' ");
	// $data =  mysqli_query($link, "SELECT * FROM blog");

	// mysqli_close($link);

	// $row = mysqli_fetch_array($data, MYSQLI_NUM);
	// printf ("%s (%s)\n", $row[1], $row[2]);  
	?>
	



	<!-- Здесь основная верстка  -->
	
	


	


	<?
	include_once'footer.php';
	include_once'scripts.php';
	?>

</body>
</html>





	
	
	


