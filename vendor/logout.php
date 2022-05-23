<?php
session_start();
for($i=1; $i<3; $i++){
    unset($_SESSION['user']);
    header('Location: ../index.php');
}
