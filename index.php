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
	include_once'header.php';
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
	

	<div class="news">
		
	
		<?
		while ($row = mysqli_fetch_array($data, MYSQLI_NUM)) {// вывод в цикле из БД
			?>
			<p class="news_header"><? echo $row[1];//вывод з?> </p>
		
			<div class="video_content">
				<iframe class="video_ref" src="<?echo $row[2]?>" allow="autoplay; encrypted-media" frameborder="0" allowfullscreen></iframe>
				<br>
			</div>

			<?
		} ?>
	</div>
	
	


	


	<?
	include_once'footer.php';
	include_once'scripts.php';
	?>

</body>
</html>





	
	
	


