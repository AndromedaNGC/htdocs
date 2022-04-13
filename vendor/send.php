<?php

$name_player = $_POST['name_player'];
$email = $_POST['email'];
$idea_message = $_POST['idea_message'];

$name_player = htmlspecialchars($name_player);
$email = htmlspecialchars($email);
$idea_message = htmlspecialchars($idea_message);

$name_player = urldecode($name_player);
$email = urldecode($email);
$idea_message = urldecode($idea_message);

$name_player = trim($name_player);
$email = trim($email);
$idea_message = trim($idea_message);

if (mail(" astronetngc3372@gmail.com", "Предложение идеи", "Имя:".$name_player.". E-mail: ".$email.". Сообщение: ".$idea_message ,"From: uraquestmail@gmail.com \r\n"))
 {
    echo "Done";
} else {
    echo "error";
}


$email = clear_data($_POST['name_player']);
$name_player = clear_data($_POST['email']);
$idea_message = clear_data($_POST['idea_message']);

$to  = "uraquestmail@gmail.com"; 
$sub='Идея';
$mes = "Тема: Новая идея для квеста: $email\nИмя: $name_player\nИдея: $idea_message";
 
$send = mail($to,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\n");
 
/* А эта функция как раз занимается отправкой письма на указанный вами email */
 //сабж
//$email='Идея от игрока'; // от кого
//$send = mail($myaddres,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");
 
//ini_set('short_open_tag', 'On');
//header('Refresh: 3; URL=../new_mind.php');

function clear_data($val){
    $val = trim($val);
    $val = stripslashes($val);
    $val = htmlspecialchars($val);
    return $val;
}
if(isset($_POST['submit'])){
    mail($to,$sub,$send);
}

?>
<!-- <!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="3; url=../new_mind.php">
<title>Спасибо! Мы свяжемся с вами!</title>
<meta name="generator">
<script type="text/javascript">
setTimeout('location.replace("../new_mind.php")', 3000);
/*Изменить текущий адрес страницы через 3 секунды (3000 миллисекунд)*/
</script> 
</head>
<body>
<h1></h1>
</body>
</html> -->