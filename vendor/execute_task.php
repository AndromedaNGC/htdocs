<?php 
session_start();
require_once "./connect.php";

    $query_select_answer = "SELECT id,answer FROM tasks WHERE answer='".$_REQUEST['answer_solve']."' AND id='".$_REQUEST['btn_task']."'";
    $result_answer = mysqli_query($connect,$query_select_answer);
    if(mysqli_num_rows($result_answer)<1){
        $query_executetask = "UPDATE `tasks` SET `status_img_task`='lose.png' WHERE `id`='".$_REQUEST['btn_task']."'";
        mysqli_query($connect,$query_executetask) or die(mysqli_error($connect));
        $query_change_done = "select status_img_task from tasks";
        mysqli_query($connect,$query_change_done) or die(mysqli_error($connect));
    }else{
        $query_executetask = "UPDATE `tasks` SET `status_img_task`='done.png' WHERE `id`='".$_REQUEST['btn_task']."'";
        mysqli_query($connect,$query_executetask) or die(mysqli_error($connect));
        $query_change_done = "select status_img_task from tasks";
        mysqli_query($connect,$query_change_done) or die(mysqli_error($connect));
    }


?>