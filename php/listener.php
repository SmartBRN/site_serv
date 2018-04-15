<?php

	// $listened_data = $_GET[];\
	if(0!=0){
	$message = "alarm!";
	echo $message;
	$token = "504001052:AAEGxcY_Rc1zzS_i2BepB_j73RFH2Fkej5g";
	$fp=fopen("https://api.telegram.org/bot".$token."/sendMessage?chat_id=37139244&text={$message}","r");
	
}

?>