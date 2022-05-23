<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login_log'];
    $password = md5($_POST['pass_log']);

    $check_user = mysqli_query($connect, "SELECT * FROM `Players` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "email" => $user['email']
        ];

        header('Location: ../quest.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
    }
    ?>
