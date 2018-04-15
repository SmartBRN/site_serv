<?php
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<!DOCTYPE html>
<html>
<head>
	<?php
	include_once 'head.php';
	?>
</head>
<body>
	<?php
	include_once'header.php'; /*Здесь верстка шапки сайта*/
	?>

	<?php


	if(!isset($_COOKIE['user_cookie'])){ // если сессия не окончена - логинимся
	?>

	<div class="sign_in_form" class="text-center">
		<form action="php/signin_handle.php" method="POST"> 
			
			<input type="text" name="login" placeholder="Логин" class="textinput"> <br>
			
			<input type="password" name="password" placeholder="Пароль" class="textinput"> <br>
			
			<input type="submit" name="submit" value="Вход" class="textinput">	
		
		</form>
		<?php 
			if(isset($_SESSION['error']))
			{
				echo "<p class='text-center' >Неверный логин и/или пароль</p>";
				session_destroy();
			}
		?>
	</div>
	<?php

	}
	else {	//Иначе вывод результатов
		?>
			<div class="wheather_left hidden-xs">
				<?php
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
			<div class="out_data">
					<?php

					$user_login = $_COOKIE['user_cookie'];
					$user_id;
					$id_object;
					echo "<p class='user_sign'> Логин - " . $_COOKIE['user_cookie'] ."<br><a href='php/signout.php' >Выход</a></p>" ;
					// echo "<a href='php/signout.php'>Войти под другим пользователем</a><br><br>";
					include_once ('php/users_db.php');

					if ($stmt = $connection->prepare("SELECT id FROM users WHERE login=?")) {

					    /* связываем параметр */
					    $stmt->bind_param("s", $user_login);

					    /* исполняем запрос */
					    $stmt->execute();

					    /* прикрепляем результаты*/
					    $stmt->bind_result($id);

					    /* выбираем значение */
					    $stmt->fetch();

					    //printf("<br><br>%s имеет ID - %s<br><br>", $user_login, $id);
					    $user_id = $id;
					    $stmt->close();
					}
					$number_of_objects =  mysqli_query($connection, "SELECT COUNT(*) FROM object_to_user_link WHERE id_user = $user_id");
					$noo = mysqli_fetch_array($number_of_objects, MYSQLI_NUM);
					// $mas_of_objects = [$noo];
					$mas_of_objects = array($noo);

					$data =  mysqli_query($connection, "SELECT * FROM object_to_user_link WHERE id_user = $user_id");
					printf ( 'Список объектов: ' );
					while ($row = mysqli_fetch_assoc($data)) {
						$id_object = $row['id_object'];
						$object_name = mysqli_query($connection, "SELECT name FROM object WHERE id = $id_object");
						$mas = mysqli_fetch_assoc($object_name);
						printf ("%s; ", $mas['name']);
						// $mas_of_objects[] = $mas['name'];
					}

					$data =  mysqli_query($connection, "SELECT * FROM object_to_room_link WHERE object = $id_object");
					
					echo "<br>Датчики имеются в следующих комнатах: ";
					while ($row = mysqli_fetch_assoc($data)) {
						$id_room = $row['room'];
						$room_name = mysqli_query($connection, "SELECT name FROM room WHERE id = $id_room");
						$mas = mysqli_fetch_assoc($room_name);
						printf ("%s; ", $mas['name']);
					}

					echo "<br>Wemos: ";
					$data =  mysqli_query($connection, "SELECT * FROM object_to_room_link WHERE object = $user_id");
					while ($row = mysqli_fetch_assoc($data)) {
						printf ("%s; ", $row['room']);
					}
					echo "\n\n";	
				}

				?>

				<br><br>
				<table class="control_data" >
					<tr>
						<td class="left_col">Tср., °С</td>
						<td>
						<?php
							try{
								// $url1 = file_get_contents("http://192.168.0.100/json/dht");
								// $content1 = json_decode($url1,true);
								$wheather_content1 = get_json_content("http://192.168.0.100/json/dht");
								$t1 = $wheather_content1['temperature'];
								// $url2 = file_get_contents("http://192.168.0.101/json/dht");
								// $content2 = json_decode($url2,true);

								// $url3 = file_get_contents("http://192.168.0.102/json/dht");
								// $content3 = json_decode($url3,true);
								$wheather_content3 = get_json_content("http://192.168.0.102/json/dht");
								$t2 = $wheather_content3['temperature'];

								if ($t1 != 0 && $t2 != 0) {
									$average = ($t1 + $t2)/2;
									echo $average," °С";
								}
								else echo "Один из датчиков показывает 0";

							} catch(Exception $e){
								echo 'Ошибка: ', $e->getMessage(),"\n";
							}

						?>	
						</td>
						<td>
							<a href="temp_stat.php">Статистика и управление</a>
						</td>
					</tr>
					<tr>
						<td class="left_col">Свет</td>
						<td>
						<?php
							// тут json парс
						?>	
						</td>
						<td>
							<a href="light_stat.php">Статистика и управление</a>
						</td>
					</tr>
					<tr>
						<td class="left_col">Пол</td>
						<td>
						<?php
							// тут json парс
						?>	
						</td>
						<td>
							<a href="floor_stat.php">Статистика и управление</a>
						</td>
					</tr>
				</table>
			</div>
	




	


	


	<?php
	include_once'footer.php';
	include_once'scripts.php';

	?>
	<script type="text/javascript">
		$(document).ready(function() {
			li_2.classList.remove("active_li");
			li_1.classList.toggle("active_li");
		});		
	</script>

</body>
</html>





	
	
	


