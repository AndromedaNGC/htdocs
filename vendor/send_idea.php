<?php 
session_start();
require_once "connect.php";
$theme = $_POST['idea_theme'];
$msg = $_POST['idea_msg'];

$id_player = $_SESSION['user']['id'];

if(!empty($theme) or !empty($msg)){
    mysqli_query($connect, "INSERT INTO `ideas`(`id`, `id_user`, `idea_theme`, `idea_msg`, `to_top`) 
    VALUES (NULL, '$id_player', '$theme', '$msg', 0)");
    header('Location: ../idea.php');
}
?>