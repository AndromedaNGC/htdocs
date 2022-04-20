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
    <link href="https://fonts.googleapis.com/css2?family=Sirin+Stencil&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Components/back_animation.css">
    <link rel="stylesheet" href="assets/css/Components/btn_profile.css">
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
                    <h4><?= $_SESSION['user']['login'] ?></h4>
                    <a href="vendor/logout.php">Выйти</a>
                </div>
            </label>
        </div>
    </nav>
    <div class="merge">
        <main class="modules">
        <?php 
            //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $items = mysqli_query($connect, "SELECT modules.id,modules.level,modules.name_module,
            modules.procent_complete,modules.completed,modules.not_completed,tags.name_tag, COUNT(tasks.id_module) as count_tasks from tasks INNER JOIN modules ON tasks.id_module=modules.id
             inner join tags on modules.id_tags=tags.id WHERE tasks.id_module=modules.id GROUP BY modules.id");
            ?>
            
            <?php 
            while($item=mysqli_fetch_assoc($items))
            {
            ?>  
            <?php 
                // $count_tasks = mysqli_query($connect, "SELECT COUNT(id_module) FROM tasks WHERE id_module");
            ?>
                <div class="card">
                    <h3 class="title-module"><span>L<?=$item['level'];?></span><?=$item['name_module'];?></h3>
                    <div class="card-info" onClick="window.location='item-module.php?id=<?=$item['id'];?>'">
                        <h4>Всего заданий: <span><?=$item['count_tasks']?></span></h4>
                        <div class="merge-circle"><p><div class="card-circle-green"></div>Выполнено: <span class="num-task"><?=$item['completed'];?></span></p></div>  
                        <div class="merge-circle"><p><div class="card-circle-yellow"></div>Осталось: <span class="num-task"><?=$item['not_completed'];?></span></p></div>
                        <p class="tag"><?=$item['name_tag']?></p>
                        <div class="merge-right-left"><p>Завершено на:</p><span><?=$item['procent_complete']?>%</span></div>
                    </div>
                    <div class="bar">
                        <div class="emptybar"></div>
                        <div class="filledbar" style="width: <?=$item['procent_complete']?>%"></div>
                    </div>
                </div>
        <?php
        }
        ?>
        </main>
    </div>
    
    <div class="area" >
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
</body>
</html>