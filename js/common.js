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

	// $("#room1_on_but").submit(function() {
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "../php/room1_light_on.php",
	// 		data: $(this).serialize()
	// 	}).done(function() {
	// 		$(this).find("input").val("");
	// 		// alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
	// 		$("#room1_on_but").trigger("reset");
	// 	});
	// 	return false;
	// });

	// $("#room1_off_but").submit(function() {
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "../php/room1_light_off.php",
	// 		data: $(this).serialize()
	// 	}).done(function() {
	// 		$(this).find("input").val("");
	// 		// alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
	// 		$("#room1_off_but").trigger("reset");
	// 	});
	// 	return false;
	// });

	// $("#room2_on_but").submit(function() {
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "../php/room2_light_on.php",
	// 		data: $(this).serialize()
	// 	}).done(function() {
	// 		$(this).find("input").val("");
	// 		// alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
	// 		$("#room2_on_but").trigger("reset");
	// 	});
	// 	return false;
	// });

	// $("#room2_off_but").submit(function() {
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "../php/room2_light_off.php",
	// 		data: $(this).serialize()
	// 	}).done(function() {
	// 		$(this).find("input").val("");
	// 		// alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
	// 		$("#room2_off_but").trigger("reset");
	// 	});
	// 	return false;
	// });

	
	//	Настройка адаптивности
	
	$( window ).resize(function() {

		
	});
	$(window).resize();

});