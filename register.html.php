<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">

        <title>Форма регистрации</title>
    </head>
    <body>
        <p>Форма регистрации</p>
        <?php   
        echo  $_SESSION['back'];
        ?>
        
        <form method="POST" action="register.php">
            <label>Имя:</label>
            <input type="text" name="name" required><br/>

            <label>Логин:</label>
            <input type="text" name="login" required><br/>

            <label>Пароль:</label>
            <input type="password" name="password" required><br/>

            <label>Повторите пароль:</label>
            <input type="password" name="repeat_password" required><br/>

            <input type="submit" value="Войти">
        </form>
        <?php   
        	$_SESSION['back'] = NULL;
        ?>
        <span ><a href="login.html.php">Перейти на страницу авторизации</a></span>
        <
    </body>
</html>