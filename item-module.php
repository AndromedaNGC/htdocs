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
    <link rel="stylesheet" href="assets/css/Components/btn_profile.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>

<body>
    <script src="https://kit.fontawesome.com/628c8d2499.js" crossorigin="anonymous"></script>
    <nav id="menu">
        <?php include "templates/nav_center.php"?>
    </nav>
    <nav class="nav-bar">
        <div class="logo">Ura quest <span>  Квест / Модули</span></div>
        <div class="profile">
            <i class="far fa-bell"></i>

            <label class="menu-button-wrapper" for="">
                <input type="checkbox" class="menu-button"><img src="assets/img/icons/images.jpeg"></input>
                <div class="item-list">
                    <a href="vendor/logout.php">Выйти</a>
                </div>
            </label>
        </div>
    </nav>
    <?php 
        $item_id;
        if(isset($_GET['id']))
            $item_id = $_GET['id'];
        //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $items = mysqli_query($connect, "SELECT tasks.id as id_tasks,tasks.title_task,tasks.status_img_task,tasks.files_task,tasks.text_task,
        tasks.answer,modules.id,modules.level,modules.name_module,modules.num_of_task,modules.completed,
        modules.not_completed,modules.procent_complete,modules.status from tasks inner join modules on tasks.id_module=modules.id where modules.id=$item_id");
        $items_1 = mysqli_query($connect, "SELECT modules.id, modules.level,modules.name_module,modules.num_of_task,modules.completed,
        modules.not_completed,modules.procent_complete,files.img_file,files.title_file,files.link,modules.status from 
        modules inner join files on modules.id_files=files.id where modules.id=$item_id");
    ?>
            
    <div class="merge_item">
        <div class="item_left">
            <h3>Статистика по модулю</h3>
            <div class="chart-row three">
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
										<path class="circle" stroke-dasharray="70, 100" d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831"></path>
										<text x="18" y="20.35" class="percentage">70%</text>
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
										<path class="circle" stroke-dasharray="90, 100" d="M18 2.0845
                    a 15.9155 15.9155 0 0 1 0 31.831
                    a 15.9155 15.9155 0 0 1 0 -31.831"></path>
										<text x="18" y="20.35" class="percentage">90%</text>
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
										<path class="circle" stroke-dasharray="10, 100" d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831"></path>
										<text x="18" y="20.35" class="percentage">10%</text>
									</svg>
                                </div>
                            </div>
                        </div>
                        <div class="chart-container-wrapper">
                            <div class="chart-container">
                                <div class="chart-info-wrapper">
                                    <h3>Сколько всего прошло:</h3>
                                    <p>Показывает какой процент игроков прошли дальше</p>
                                </div>
                                <div class="chart-svg">
                                    <svg viewBox="0 0 36 36" class="circular-chart dont">
										<path class="circle-bg" d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831"></path>
										<path class="circle" stroke-dasharray="30, 100" d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831"></path>
										<text x="18" y="20.35" class="percentage">30%</text>
									</svg>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="item_center">
            <h3>Задания</h3>
            <div class="item_center_task">
            
            <?php 
            while($item=mysqli_fetch_assoc($items))
            {
            ?>  
                <button class="btn_task" id="btn_task_id" onClick="document.getElementById('btn_task_id').value=<?=$item['id_tasks'];?>">
                    <div class="task">
                        <span><?=$item['title_task'];?></span>
                        <img src="assets/img/icons/files/<?=$item['status_img_task'];?>" alt="">
                    </div>
                </button>
            <?php
            }
            ?>
            <script>
                 $(document).ready(function(){
                    $('.btn_task').on('click', function(){
                        $.ajax({
                            // type: "POST",
                            // url: "vendor/showtask.php",
                            // data: "btn_task="+$(".btn_task").val(),
                            success: function(html){
                                // $(".solve_task").html(html);
                                alert("btn_task="+$(".btn_task").val());
                            } 
                        });
                        return false;
                    });
                });
            </script>
            </div>
            <h3>Выполнение задания</h3>
            <div class="item_center_solve">
                <div class="solve_task">
                    <h1 id="cost"></h1>
                </div>
                <div class="for_solve">
                    <button id="lose">Сдаться</button>
                    <input id="solve" placeholder="Введите ответ: "> 
                    <button id="done">Готово</button>
                </div>
            </div>
        </div>
        <div class="item_right">
            <h3>Необходимые файлы</h3>
            <div class="merge_files">
            <?php 
                while($item=mysqli_fetch_assoc($items_1))
                {
                ?>  
                    <a target="_blank" href="http://<?=$item['link']?>">
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
    <script>
        let button = document.querySelector('.button');
        let buttonText = document.querySelector('.tick');

        const tickMark = "<svg width=\"58\" height=\"45\" viewBox=\"0 0 58 45\" xmlns=\"http://www.w3.org/2000/svg\"><path fill=\"#fff\" fill-rule=\"nonzero\" d=\"M19.11 44.64L.27 25.81l5.66-5.66 13.18 13.18L52.07.38l5.65 5.65\"/></svg>";

        buttonText.innerHTML = "Submit";

        button.addEventListener('click', function() {

            if (buttonText.innerHTML !== "Submit") {
                buttonText.innerHTML = "Submit";
            } else if (buttonText.innerHTML === "Submit") {
                buttonText.innerHTML = tickMark;
            }
            this.classList.toggle('button__circle');
        });
    </script>
</body>

</html>