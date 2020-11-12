<?php 
//закрытие сессии и редирект на страницу авторизации 
 	session_start();
	session_destroy();
    header("Location: login.html.php");
 ?>