$(document).ready(function() {



	// скрипт на меню
	var showed = false;	
	$(".mobile_menu").on("click", (function(){
		
		if (!showed) {
			var hght = 0;
			$(".close_mobile_menu").css("display","block");
			$(".show_mobile_menu").css("display","none");

			$(".mobile_menu_list").css("display","block");
			$(".mobile_menu_list ul li a").css("color","#A22726");
			$(".mobile_menu_list ul li a").css("border-bottom","solid 1px #A22726");
			$(".mobile_menu_list ul li:last-child a").css("border-bottom","none");

			$(".mobile_menu_list").css("animation","drop_down .3s linear");
			$(".mobile_menu_list").css("height","auto");
			showed = true;
		}
		else{
			$(".mobile_menu_list ul li a").css("color","rgba(0,0,0,0)");
			$(".mobile_menu_list ul li a").css("border-bottom","0px");
			$(".mobile_menu_list").css("animation","drop_up .3s linear");
			$(".mobile_menu_list").css("height","0px");
			setTimeout('$(".mobile_menu_list").css("display","none")', 300);

			$(".close_mobile_menu").css("display","none");
			$(".show_mobile_menu").css("display","block");

			showed = false;
		}
		$( window ).resize(function() {
			if ($( window ).width() > 767) {
				showed = false;
				$(".mobile_menu_list").css("display","none");
				$(".close_mobile_menu").css("display","none");
				$(".show_mobile_menu").css("display","block");
			}
		});
	}));

	

	
	//	Настройка адаптивности
	
	$( window ).resize(function() {

		
	});
	$(window).resize();

});