<header>
	<div class="logo_place">
	
	</div>
	<div class="wheather_place visible-xs">
		<?php
			error_reporting(E_ERROR);
			function get_json_content($url)
			{
				if((file_get_contents($url))==NULL)
					throw new Exception("Неверный IP или датчик не подключен", 1);
				else{  
					$json_url = file_get_contents($url);
					$content = json_decode($json_url,true);
					return $content;
				}
				sleep(30);
			}
			// $url = file_get_contents("http://192.168.0.100/json/dht");

			// $content = json_decode($url,true);
			// echo "T: ";
			// print_r($content['temperature']);
			// echo " ˚C";
			// echo "<br>";
			// echo "H: ";
			// print_r($content['humidity']);
			// echo " %";
			try{
				$wheather_content = get_json_content("http://192.168.0.101/json/dht");
				// $url = file_get_contents("http://192.168.0.100/json/dht");
				// $content = json_decode($url,true);
				echo "T: ";
				print_r($wheather_content['temperature']);
				echo " ˚C";
				echo "<br>";
				echo "H: ";
				print_r($wheather_content['humidity']);
				echo " %";
				

			} catch(Exception $e){
				echo 'Ошибка: ', $e->getMessage(),"\n";
			}
		?>

	</div>
	


	<!-- Мобильное меню -->
	<div class="visible-xs mobile_menu text-center ">
		<span class="show_mobile_menu animated fadeIn ravno">&equiv;</span>
		<span class="close_mobile_menu animated fadeIn krest" style="display: none;">&times;</span>
	</div>
	<div class="visible-md mobile_menu_list ">
		<ul class="text-left">
			<li><a id="li_1" href="index.php" class="animated fadeInDown">Управление домом</a></li>
			<li><a id="li_2" href="temp_stat.php" class="animated fadeInDown">Журнал</a></li>
		</ul>
	</div>
	<!-- _________________ -->
	<div class="menu_row visible-xs">
		<a href="index.php">Управление домом</a>
		<a href="temp_stat.php">Журнал</a>
	</div>



</header>