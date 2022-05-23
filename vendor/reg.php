<?php
    session_start();
    require_once "connect.php";
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $password_confirm = $_POST['pass2'];

    if(strlen($password) > 8 && preg_match('|^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$|', $password))
    {
        if ($password === $password_confirm) {

            $check_login = mysqli_query($connect, "SELECT 'login' FROM `Players` WHERE `login` = '$login'");
            $check_email = mysqli_query($connect, "SELECT 'email' FROM `Players` WHERE `email` = '$email'");
            if (mysqli_num_rows($check_login) < 1) {
                if (mysqli_num_rows($check_email) < 1) {

                    $password = md5($password);

                    mysqli_query($connect, "INSERT INTO `Players` (`id`, `avatar`, `login`, `email`, `password`, `birthday`, `id_status_player`, `about_player`) VALUES (NULL, 'uploads/default.jpg', '$login', '$email', '$password', '1999-01-01',1,'about me')");
                    $_SESSION['message'] = 'Регистрация прошла успешно. Авторизуйтесь!';
                    header('Location: ../index.php');
                } else {
                    $_SESSION['message'] = 'Email уже существует. Возможно вы уже зарегестрированы!';
                    header('Location: ../index.php');
                }
            } else {
                $_SESSION['message'] = 'Логин с таким именем уже существует. Придумайте другой логин!';
                header('Location: ../index.php');
            }
        }  else {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: ../index.php');
        }
    } else {
        $_SESSION['message'] = 'Пароль должен содержать не менее восьми знаков, включать буквы, цифры и специальные символы'; 
        header('Location: ../index.php');
    }

?>    
    
    
    
    
    
    
    
    
    
    
    
    