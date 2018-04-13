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
<body class="gray_bg">
	<?
	include_once'header.php';
		
	$link = mysqli_connect('mysql.hostinger.ru', 'u903309293_admin', 'Apm42xGEkVeQ27!', 'u903309293_news');
	if (!$link) {
	    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
	    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
	// echo "Соединение с MySQL установлено!" . PHP_EOL;
	// echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

	mysqli_query($link,"SET NAMES 'utf8' ");
	$data =  mysqli_query($link, "SELECT * FROM blog");

	mysqli_close($link);

	// $row = mysqli_fetch_array($data, MYSQLI_NUM);
	// printf ("%s (%s)\n", $row[1], $row[2]);  
	?>
	<div class="headers_of_news">
		
	</div>

	<div class="news">
		
	
		<?
		while ($row = mysqli_fetch_array($data, MYSQLI_NUM)) {//$row = mysql_fetch_array($data)
			?><p class="news_header"><? echo $row[1];//вывод заголовка ?> </p>
		
			<div class="video_content">
				<iframe class="video_ref" src="<?echo $row[2]?>" allow="autoplay; encrypted-media" frameborder="0" allowfullscreen></iframe>
				<br>
			</div>
			<div class="news_text">
				<p><? echo $row[3]; ?></p>
				<br>
				<p>Группа ВК - <a href="https://vk.com/mihutka_ru" target="_blank">vk.com/mihutka_ru</a></p>
				<p>Канал на YouTube - <a href="https://www.youtube.com/channel/UCt1dtgJVaQgBN1q6nlPyaVA" target="_blank">https://www.youtube.com/channel/<br>UCt1dtgJVaQgBN1q6nlPyaVA</a></p>
			</div>
			<hr>
			<?
		} ?>
	</div>
	<div style="clear: both;"></div>
	


	<?
	include_once'footer.php';
	include_once'scripts.php';
	?>

</body>
</html>





	
	
	


