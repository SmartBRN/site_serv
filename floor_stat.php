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
	
	if(!isset($_COOKIE['user_cookie'])){ // если не авторизирован - логинимся
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
			
			
	}
	

	?>



	<?php
	include_once'footer.php';
	include_once'scripts.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			li_1.classList.remove("active_li");
			li_2.classList.toggle("active_li");
		}		
	</script>

</body>
</html>





	
	
	


