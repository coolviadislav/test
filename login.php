<?php
 	session_start();

 	include('lib/safemysql.class.php');
//Подключение к базе 
 	$db = new SafeMySQL([
		'host' => '127.0.0.1',
		'user' => 'root',
		'pass' => '',
		'db' => 'profile'
	]);
/*
Поиск в базе пользователя с введенным логином и паролем 
Редирект на outh.php 
Редирект на страницу авторизации 
*/
 	$user = [];
	$user = $db->getRow("SELECT * FROM user WHERE login = ?s AND password = ?s", $_POST['login'], sha1($_POST['password']));
	if ($user) {
		$_SESSION['name'] = "<p>Привет - " . $user['name'] ."</p>";
		header("Location: outh.php");
	}else{
		$_SESSION['back'] = '<p>Такого пользователя нету</p>';
		header("Location: login.html.php");
	}