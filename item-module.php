<?php 
    require "vendor/connect.php";
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Components/menu.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family='Sirin'+Stencil&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Components/back_animation.css">
    <link rel="stylesheet" href="assets/css/Components/_item-module.css">
    <link rel="stylesheet" href="assets/css/Components/task-modal.css">
    <link rel="stylesheet" href="assets/css/Components/radio_button.css">
    <link rel="stylesheet" href="assets/css/Components/preloader.css">
    <link rel="stylesheet" href="assets/css/Components/_profile.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>

<body>
    <script src="https://kit.fontawesome.com/628c8d2499.js" crossorigin="anonymous"></script>
    <nav class="main_nav">
        <?php include "templates/nav_center.php"?>
    </nav>
    
    <?php 
        $item_id;
        if(isset($_GET['id']))
            $item_id = $_GET['id'];
        //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $user_status = $_SESSION['user']['id'];
        $items_procent = mysqli_query($connect, "SELECT user_tasks.id_task,user_tasks.id_player,user_tasks.img_status_task, tasks.id_module,
        (SELECT COUNT(img_status_task) FROM user_tasks WHERE id_player=$user_status AND img_status_task='#E64C3C') as lose,
        (SELECT COUNT(tasks.id) from tasks WHERE tasks.id_module=$item_id) as count_tasks,SUM(user_tasks.status_task) as status_task, 
        modules.name_module, modules.level,modules.img_module,tags.name_tag,tags.tag_link
        from user_tasks INNER JOIN tasks ON user_tasks.id_task=tasks.id INNER JOIN modules ON tasks.id_module=modules.id 
        INNER JOIN tags ON modules.id_tags=tags.id
        WHERE user_tasks.id_player=$user_status AND tasks.id_module=$item_id");
         
        $items_1 = mysqli_query($connect, "SELECT modules.id,files.img_file,files.title_file,files.link,modules.status from 
        files inner join modules on files.id_module=modules.id where modules.id=$item_id");
        $counter_module;
        $counter_success;
        $counter_error;
    ?>
            
<div class="merge_item">
    <div class="item_left">
    <h3>Информация по модулю</h3>
    <div class="chart-row three">
    <?php
    while($item=mysqli_fetch_assoc($items_procent))
    {    
        global $counter_module,$counter_success,$counter_error;
        // $not_complete = 100 - $procent;
        //$left = $item['count_tasks'] - $item['status_task'];
        
        $procent = (100 * $item['status_task'])/$item['count_tasks'];
        $error_task = (100 * $item['lose'])/$item['count_tasks'];
        $success = 100 - $error_task;
        // $counter_module = $item['completed'];
        // $counter_success = $item['procent_complete'];
        // $counter_error = $item['not_completed'];
    ?>
    <!-- <form class="dont" style="display: none;" method="post" action="quest.php">
        <input name="hide_procent" type="text">
    </form> -->
    <div class="chart-container-wrapper">
        <div class="main-info-wrapper">
            <div class="name-main-info">
                <div class="name-module">
                    <h3><?=$item['name_module']?></h3>
                </div>
                <div class="level-back">
                    <a href="#" class="level">L<?=$item['level']?></a>
                    <a href="#" onclick="javascript:history.back(); return false;" class="back-module"><img src="/assets/img/icons/tasks/task_back.png" alt="Назад"></a>
                </div>
            </div>
            <div class="description-main-info">
                <div class="main-for-award">
                    <img src="/assets/img/icons/modules/<?=$item['img_module']?>">
                </div>
                <div class="main-for-description">
                    <div class="main-description"><a href="#">Сюжетная линия</a></div>
                    <a target="_blank" href="<?=$item['tag_link']?>" class="main-tag">#<?=$item['name_tag']?><img src="/assets/img/icons/tasks/task_link.png" alt="link"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-container-wrapper">
        <div class="chart-container">
            <div class="chart-info-wrapper">
                <h3>Модуль выполнен на:</h3>
                <p>Считается общим счётом выполнения модуля</p>
            </div>
            <div class="chart-svg">
                <svg viewBox="0 0 36 36" class="circular-chart blue">
                    <path class="circle-bg" d="M18 2.0845
    a 15.9155 15.9155 0 0 1 0 31.831
    a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                    <path class="circle" stroke-dasharray="<?=$procent?>, 100" d="M18 2.0845
    a 15.9155 15.9155 0 0 1 0 31.831
    a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                    <text x="14" y="20.35" class="percentage counter-number"><?=$procent?></text>
                    <text x="24" y="20.35" class="percentage counter"><?="%"?></text>
                </svg>
            </div>
        </div>
    </div>

    <div class="chart-container-wrapper">
        <div class="chart-container">
            <div class="chart-info-wrapper">
                <h3>Успеваемость по модулю:</h3>
                <p>Если успеваемость достигает 50%, вы проиграли</p>
            </div>
            <div class="chart-svg">
                <svg viewBox="0 0 36 36" class="circular-chart orange">
                    <path class="circle-bg" d="M18 2.0845
    a 15.9155 15.9155 0 0 1 0 31.831
    a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                    <path class="circle" stroke-dasharray="<?=$success?>, 100" d="M18 2.0845
    a 15.9155 15.9155 0 0 1 0 31.831
    a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                    <text x="14" y="20.35" class="percentage counter-number-success"><?=$success?></text>
                    <text x="24" y="20.35" class="percentage counter"><?="%"?></text>
                </svg>
            </div>
        </div>
    </div>

    <div class="chart-container-wrapper">
        <div class="chart-container">
            <div class="chart-info-wrapper">
                <h3>Допущение ошибок:</h3>
                <p>При проценте ошибок 60%, вы проиграли</p>
            </div>
            <div class="chart-svg">
                <svg viewBox="0 0 36 36" class="circular-chart pink">
                    <path class="circle-bg" d="M18 2.0845
    a 15.9155 15.9155 0 0 1 0 31.831
    a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                    <path class="circle" stroke-dasharray="<?=$error_task?>, 100" d="M18 2.0845
    a 15.9155 15.9155 0 0 1 0 31.831
    a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                    <text x="14" y="20.35" class="percentage counter-number-error"><?=$error_task?></text>
                    <text x="24" y="20.35" class="percentage counter"><?="%"?></text>
                </svg>
            </div>
        </div>
    </div>
    <script>
        
        const counter = function(elem, delay, num) {
        for(let currentIndex=0; currentIndex<=num; currentIndex+=1) {
            (function(index) {
            setTimeout(function() {
                elem.textContent = index;
                if(index == num) 
                    num++;
            }, delay*index);
            })(currentIndex);
        }
        }
        const counterNumber = document.getElementsByClassName('counter-number')[0];
        counter(counterNumber, 10, <?=$counter_module;?>);
        const counterNumber_success = document.getElementsByClassName('counter-number-success')[0];
        counter(counterNumber_success, 10, <?=$counter_success;?>);
        const counterNumber_error = document.getElementsByClassName('counter-number-error')[0];
        counter(counterNumber_error, 10, <?=$counter_error;?>);
    </script>
                        
        <?php
        }
        ?>
        </div>
        </div>
        <div class="item_center">
            <h3>Задания</h3>
            <div class="item_center_task">
            
            <?php
            $items = mysqli_query($connect, "SELECT tasks.id as id_tasks,tasks.name_task,
            tasks.title_task,tasks.status_img_task,tasks.files_task,tasks.question_task,
            tasks.answer,modules.id,modules.level,modules.name_module, modules.status from tasks inner join modules on 
            tasks.id_module=modules.id where modules.id=$item_id");
            while($item=mysqli_fetch_assoc($items))
            {
            ?>  
                <button class="btn_task" id="btn_task_id" onClick="document.getElementById('btn_task_id').value=<?=$item['id_tasks'];?>">
                    <div class="task">
                        <span><?=$item['title_task'];?></span>
                    </div>
                </button>
            <?php
            }
            ?>
            <script>
                 $(document).ready(function(){
                    $('.btn_task').on('click', function(){
                        $.ajax({
                            type: "POST",
                            url: "vendor/showtask.php",
                            data: "btn_task="+$(".btn_task").val(),
                            success: function(html){
                                $(".solve_task").html(html);
                            } 
                        });
                        return false;
                    });
                });
            </script>
            
            </div>
            <h3>Выполнение задания</h3>
            <div class="up_lose_done_task">
            <?php
            $id_player = $_SESSION['user']['id'];
            $item_done_lose = mysqli_query($connect,"SELECT user_tasks.id_player, user_tasks.id_task, user_tasks.img_status_task, tasks.title_task
                                             FROM user_tasks INNER JOIN tasks ON user_tasks.id_task=tasks.id
                                             WHERE user_tasks.id_player=$id_player AND tasks.id_module=$item_id ORDER BY tasks.title_task");
                while($done_lose = mysqli_fetch_assoc($item_done_lose)){
                ?>
                    <div class="output_lose_done_tasks" style="color: <?=$done_lose['img_status_task']?>"><?=$done_lose['title_task']?></div>
                <?php
                }
                
                //header("Location: ../item-module.php");
            ?>
            </div>
            <div class="item_center_solve">
                <div class="solve_task">
                    <h1 id="cost"></h1>
                </div>
                <div class="for_solve">
                    <button id="lose" onClick="document.getElementById('btn_task_id').value">Сдаться</button>
                    <input id="solve" class="answer_solve" name="solve_answer" placeholder="Введите ответ: ">
                    <button id="done" type="submit" onClick="document.getElementById('btn_task_id').value">Готово</button>
                </div>   
                <script>
                 $(document).ready(function(){
                    $("#solve").val("");
                    $('#lose').on('click', function(){
                        one = $(".btn_task").val();
                        two = "неверный результат";
                        three = <?=$item_id?>;
                        for(var i=1; i<3; i++){
                            $.ajax({
                                type: "POST",
                                url: "vendor/execute_task.php",
                                data: ({
                                    btn_task:one,
                                    answer_solve:two,
                                    module_id: three
                                }),
                                success: function(data){
                                    //$('.up_lose_done_task').html(data); 
                                    location.reload();
                                } 
                            });
                        }
                        return false;
                    });
                    $('#done').on('click', function(){
                        one = $(".btn_task").val();
                        two = $(".answer_solve").val();
                        three = <?=$item_id?>;
                        for(var i=1; i<3; i++){
                            $.ajax({
                                type: "POST",
                                url: "vendor/execute_task.php",
                                data: ({
                                    btn_task:one,
                                    answer_solve:two,
                                    module_id: three
                                }),
                                success: function(data){
                                    //$('.up_lose_done_task').html(data);
                                    location.reload();
                                } 
                            });
                        }
                        return false;
                    });
                });
                </script>
            </div>
        </div>
        <div class="item_right">
            <h3>Необходимые файлы</h3>
            <div class="merge_files">
            <?php 
                while($item=mysqli_fetch_assoc($items_1))
                {
                ?>  
                    <a target="_blank" href="./assets/Files/Modules/Module1/<?=$item['link']?>">
                        <img src="assets/img/icons/files/<?=$item['img_file']?>" alt="">
                        <p><?=$item['title_file']?></p>
                    </a>
                <?php
                }
                ?>
             </div>
        </div>
    </div>

    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <script src="/assets/js/main.js">
    </script>
    <div class="holder">
        <div class="preloader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
    <script src="assets/js/preloader.js"></script>
</body>

</html>