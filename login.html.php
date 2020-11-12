<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">

        <title>Форма авторизации</title>
    </head>
    <body>
        <p>Форма авторизации</p>

        <form method="POST" action="login.php">
            <label>Логин:</label>
            <input type="text" name="login" required><br/>

            <label>Пароль:</label>
            <input type="password" name="password" required><br/>

            <input type="submit" value="Войти">
        </form>

        <?php
            echo $_SESSION['back'];
            $_SESSION['back'] = NULL;
        ?>

        <span ><a href="register.html.php">Перейти на страницу регистрации</a></span>
        </form>
    </body>
</html>