<?php
    session_start();
    require_once "connect.php";
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['passwd'];
    $password_confirm = md5($_POST['passwd_old']);
    $about = $_POST['about'];
    $input_date = $_POST['date_select'];
    $user = $_SESSION['user']['id'];
    $user_login = $_SESSION['user']['login'];

    if(empty($password) and empty($password_old)){

    }else{
        if(strlen($password) > 8 && preg_match('|^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$|', $password))
    {
        $check_user = mysqli_query($connect, "SELECT * FROM `Players` WHERE `id` = '$user'");
        if (mysqli_num_rows($check_user) > 0) {
            $user = mysqli_fetch_assoc($check_user);
            $password = md5($password);
            mysqli_query($connect, "UPDATE `Players` SET `password`='$password' WHERE `id`='$user'")or die(mysqli_error($connect));
            $_SESSION['msg'] = 'Пароль успешно изменен';
            header('Location: ../profile_world/index_prof.php');
           
        } else {
            $_SESSION['msg'] = 'Старый пароль не совпадает';
            header('Location: ../profile_world/index_prof.php');
        }

    } else {
        $_SESSION['msg'] = 'Неверно введены данные'; 
        header('Location: ../profile_world/index_prof.php');
    }
    }
    if(empty($about)){

    }else{
        mysqli_query($connect, "UPDATE `Players` SET `about_player`='$about' WHERE `id`='$user'")or die(mysqli_error($connect));
        $_SESSION['msg'] = 'Информация о себе изменена';
        header('Location: ../profile_world/index_prof.php');
    }
    
    if(empty($input_date)){

    }else{
        mysqli_query($connect, "UPDATE `Players` SET `birthday`='$input_date' WHERE `id`='$user'")or die(mysqli_error($connect));
        $_SESSION['msg'] = 'Информация о себе изменена';
        header('Location: ../profile_world/index_prof.php');
    }

    if(empty($login)){

    }else{
        $check_login = mysqli_query($connect, "SELECT 'login' FROM `Players` WHERE `login` = '$login'");
        if (mysqli_num_rows($check_login) < 1) {
            mysqli_query($connect, "UPDATE `Players` SET `login`='$login' WHERE `id`='$user'")or die(mysqli_error($connect));
            $_SESSION['msg'] = 'Информация о себе изменена';
            header('Location: ../profile_world/index_prof.php');
        } else {
            $_SESSION['msg'] = 'Неверно введены данные';
            header('Location: ../profile_world/index_prof.php');
        }
        
    }

    if(empty($email)){

    }else{
        $check_email = mysqli_query($connect, "SELECT 'email' FROM `Players` WHERE `login` = '$login'");
        if (mysqli_num_rows($check_email) < 1) {
            mysqli_query($connect, "UPDATE `Players` SET `email`='$email' WHERE `id`='$user'")or die(mysqli_error($connect));
            $_SESSION['msg'] = 'Информация о себе изменена';
            header('Location: ../profile_world/index_prof.php');
        } else {
            $_SESSION['msg'] = 'Неверно введены данные';
            header('Location: ../profile_world/index_prof.php');
        }
        
    }
    $file_img = $_FILES['avatar']['name'];
    if(empty($file_img)){

    }else{
        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['msg'] = 'Фото пользователя не выбрана';
            header('Location: ../profile_world/index_prof.php');
        }
        mysqli_query($connect, "UPDATE `Players` SET `avatar`='$path' WHERE `id`='$user'")or die(mysqli_error($connect));
        $_SESSION['msg'] = 'Информация о себе изменена';
        header('Location: ../profile_world/index_prof.php');
    }

    if(empty($login) and empty($email) and empty($password) and empty($about) and empty($input_date) and empty($file_img)){
        $_SESSION['msg'] = 'Все поля были пустыми';
        header('Location: ../profile_world/index_prof.php');
    }
?>    
    