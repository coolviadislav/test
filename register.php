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
//проверка длинны пароля
 	if (mb_strlen($_POST['password']) < 8 ) {
		$_SESSION['back'] = '<p>Короткий пароль - слабый пароль, меньше 8 </p>';
		header("Location: register.html.php");
		die();
 	}
//оставляем в строке только буквы латинского алфавита и переводим строку в массив
	$arrayPost = str_split(preg_replace('/[^a-z-^A-Z]/', '', $_POST['password']));
//проверка на нижний и верхний регистр не меньше 2 
	foreach ($arrayPost as $value) {
		if (ctype_upper($value) == true){
			$upWord++;
		}
	}
	foreach ($arrayPost as $value) {
		if (ctype_lower($value) == true){
			$downWord++;
		}
	}
	if ($upWord < 2 ||$downWord < 2 ) {
		$_SESSION['back'] = '<p>Минимум 2 буквы латинского алфавита в верхнем и нижнем регистре</p>';
		header("Location: register.html.php");
		die();
	}
/*
	Проверка на повтор пароля 
	Проверка на занятость логина в базе 
	Записть в базу данных о новыом пользователе 
	Редирект на страницу авторизации 
*/

 	if ($_POST['password'] === $_POST['repeat_password'] ) {
		$user = [];
		$user = $db->getOne("SELECT * FROM user WHERE login = ?s ", $_POST['login']);
		if ($user) {
			$_SESSION['back'] = '<p>Такой логин уже занят</p>';
			header("Location: register.html.php");
		}else{ 
			    $db->query(
			   		"INSERT INTO user(login,password,name) VALUES (?s, ?s, ?s)", 
			   		$_POST['login'],
			   		sha1($_POST['password']),
			   		$_POST['name']
			    );	
				$_SESSION['back'] = '<p>Успешно зарегестрированны</p>';
				header("Location: register.html.php");
			}
	}else{
		$_SESSION['back'] = '<p>Введите одинаковые пароли</p>';
		header("Location: register.html.php");
	}
