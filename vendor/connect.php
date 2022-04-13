<?php
    $connect = mysqli_connect("localhost","root","","UraDB");

    if (!$connect) {
        die('Error connect to DataBase');
    }
?>