<?php
/*
	Проверка на наличие сессии
	Приветствие авторизованного пользователя 
	Кнопка закрытия сессии 
*/
 session_start();
 if (!isset($_SESSION['name'])) {
 	header("Location: login.html.php");
 }
 echo $_SESSION['name'];
?>
<form action="logout.php" target="_blank">
<button>Закрыть сессию</button>
