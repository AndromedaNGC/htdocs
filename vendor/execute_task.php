<?php 
session_start();
require_once "./connect.php";
    $id_player = $_SESSION['user']['id'];
    $id_task = $_REQUEST['btn_task'];
    $id_module = $_REQUEST['module_id'];
    $query_select_answer = "SELECT id,answer FROM tasks WHERE answer='".$_REQUEST['answer_solve']."' AND id='".$_REQUEST['btn_task']."'";
    $select_id_task = mysqli_query($connect, "SELECT user_tasks.id_player,user_tasks.id_task, tasks.id FROM user_tasks INNER JOIN tasks ON user_tasks.id_task=tasks.id 
    WHERE user_tasks.id_task=$id_task AND user_tasks.id_player=$id_player");
    $result_answer = mysqli_query($connect,$query_select_answer);
    if(mysqli_num_rows($result_answer)<1){
        if(mysqli_num_rows($select_id_task)<1){
            $query_insert_player_task_false = "INSERT INTO `user_tasks`(`id`,`id_player`,`id_module`, `id_task`, `img_status_task`, `status_task`) VALUES (NULL,'$id_player','$id_module','$id_task','lose.png','0')";
            mysqli_query($connect,$query_insert_player_task_false) or die(mysqli_error($connect));
        }else{
            $query_executetask = "UPDATE `user_tasks` SET `img_status_task`='#E64C3C', `status_task`=0 WHERE `id_task`=$id_task AND `id_player`=$id_player";
            mysqli_query($connect,$query_executetask) or die(mysqli_error($connect));
        }
    }else{
        if(mysqli_num_rows($select_id_task)<1){
            $query_insert_player_task_true = "INSERT INTO `user_tasks`(`id`,`id_player`,`id_module`, `id_task`, `img_status_task`, `status_task`) VALUES (NULL,'$id_player','$id_module','$id_task','done.png','1')";
            mysqli_query($connect,$query_insert_player_task_true) or die(mysqli_error($connect));
        }else{
            $query_executetask = "UPDATE `user_tasks` SET `img_status_task`='#2ECC71', `status_task`=1 WHERE `id_task`=$id_task AND `id_player`=$id_player";
            mysqli_query($connect,$query_executetask) or die(mysqli_error($connect));
        }       
    }

    $item_done_lose = mysqli_query($connect,"SELECT user_tasks.id_player, user_tasks.id_task, user_tasks.img_status_task, tasks.title_task
                                             FROM user_tasks INNER JOIN tasks ON user_tasks.id_task=tasks.id
                                             WHERE user_tasks.id_player=$id_player AND tasks.id_module=$id_module ORDER BY tasks.title_task");
    while($done_lose = mysqli_fetch_assoc($item_done_lose)){
    ?>
        <div class="output_lose_done_tasks" style="color: <?=$done_lose['img_status_task']?>"><?=$done_lose['title_task']?></div>
    <?php
    }
   
    //header("Location: ../item-module.php");
?>