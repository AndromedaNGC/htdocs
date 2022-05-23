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
    <link rel="shortcut icon" href="/assets/img/icons/menu/play.svg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Components/menu.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sirin+Stencil&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Components/back_animation.css">
    <link rel="stylesheet" href="assets/css/Components/preloader.css">
    <link rel="stylesheet" href="assets/css/Components/_profile.css">
</head>
<body>
    <script src="https://kit.fontawesome.com/628c8d2499.js" crossorigin="anonymous"></script>
    <nav class="main_nav">
        <?php 
        $head = "Модули";
        include "templates/nav_center.php";
        ?>
    </nav>
    <div class="merge">
        <main class="modules">
        <?php 
            $user_status = $_SESSION['user']['id'];
            //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $items = mysqli_query($connect, "SELECT modules.id,modules.level,modules.name_module, 
            modules.img_module,tags.name_tag,tags.tag_link,COUNT(tasks.id) as count_tasks
            FROM tasks INNER JOIN modules ON tasks.id_module=modules.id 
            INNER JOIN tags ON modules.id_tags=tags.id GROUP BY modules.id");
            ?>
            
            <?php 
            
            while($item=mysqli_fetch_assoc($items))
            {   
            ?>  
                <div class="card">
                <div class="for_link" onClick="window.location='item-module.php?id=<?=$item['id'];?>'">
                    <div class="card_up">
                        <span class="level_count level_">L<?=$item['level'];?></span>
                        <span class="level_count count_"><?=$item['count_tasks'];?></span>
                    </div>
                    <div class="card_middle">
                        <img src="/assets/img/icons/modules/<?=$item['img_module']?>" alt="">
                        <h3><?=$item['name_module']?></h3>
                        <p class="tag"><?=$item['name_tag']?></p>
                    </div>
                </div>
                <div class="card_down">
                    <a target="_blank" href="<?=$item['tag_link']?>"><img src="/assets/img/icons/arrow_left.png" alt=""> <span>Link</span></a>
                    <a><span>Plot</span> <img src="/assets/img/icons/arrow_right.png" alt=""></a>
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
    <div class="holder">
        <div class="preloader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
    <script src="assets/js/preloader.js"></script>
</body>
</html>