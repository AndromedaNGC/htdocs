<?php 
	session_start();
	if(isset($_SESSION['user'])){
		header('Location: quest.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/assets/img/icons/menu/play.svg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/Components/reg_auth.css">
    <title>Ura</title>
</head>
<body>
<div class="main">
    <div class="login-page">
    <div class="form">
        <span>Ura</span>
        <form class="register-form" action="./vendor/reg.php" method="POST">
            <h3>Регистрация</h3>
            <input type="text" name="login" placeholder="Логин" required/>
            <input type="text" name="email" placeholder="E-mail" required/>
            <input type="password" name="pass" placeholder="Пароль" required/>
            <input type="password" name="pass2" placeholder="Повторите пароль" required/>
            <button name="submit">Завершить</button>
            <p class="message">Уже зарегистрированы? <a href="#">Войти</a></p>
        </form>
        <form class="login-form" action="./vendor/auth.php" method="POST">
            <h3>Вход</h3>
            <input type="text" name="login_log" placeholder="Логин" required/>
            <input type="password" name="pass_log" placeholder="Пароль" required/>
            <button name="submit">Войти</button>
            <p class="message">Не зарегистрированы? <a href="#">Создать аккаунт</a></p>
        </form>
        <?php
		if (isset($_SESSION['message'])) {
			echo '<p style="color: darkorange;" class="error_message"> ' . $_SESSION['message'] . ' </p>';
		}
		unset($_SESSION['message']);
	?>
    </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
        $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, 0);
        });
    </script>
</div>
</body>
</html>