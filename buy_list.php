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





	
	
	


