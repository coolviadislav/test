<?php
/*
	Приветствие авторизованного пользователя 
	Кнопка закрытия сессии 
*/
 session_start();
 echo $_SESSION['name'];
?>
<form action="logout.php" target="_blank">
<button>Закрыть сессию</button>