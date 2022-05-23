<?php
require_once "connect.php";
session_start();
$user = $_SESSION['user']['id'];
mysqli_query($connect, "DELETE FROM Players WHERE id=$user");
unset($_SESSION['user']);
header('Location: ../index.php');

