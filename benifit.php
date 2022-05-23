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
    <title>Полезное</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Components/menu.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family='Sirin'+Stencil&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Components/back_animation.css">
    <link rel="stylesheet" href="assets/css/Components/_item-module.css">
    <link rel="stylesheet" href="assets/css/Components/task-modal.css">
    <link rel="stylesheet" href="assets/css/Components/preloader.css">
    <link rel="stylesheet" href="assets/css/Components/_profile.css">
    <link rel="stylesheet" href="assets/css/Components/_news.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>

<body>
    <script src="https://kit.fontawesome.com/628c8d2499.js" crossorigin="anonymous"></script>
    <nav class="main_nav">
        <?php 
        $head = "Полезное";
        include "templates/nav_center.php";
        ?>
    </nav>
    
    <div class="link_category">
      <div class="radio">
        <input label="Все" type="radio" id="male" name="gender" value="male" checked>
        <?php
          $item_benefit_teg = mysqli_query($connect, "SELECT `title_teg_b` FROM `benefit_teg`");
          while($item = mysqli_fetch_assoc($item_benefit_teg))
          {
        ?>
          <input label="<?=$item['title_teg_b']?>" type="radio" id="male" name="gender" value="<?=$item['title_teg_b']?>">
        <?php
          }
        ?>
        <input label="Мои" type="radio" id="other" name="gender" value="other">
      </div>
    </div>
    <div class="courses">
      <div class="courses-container">
      <?php
        $item_benefit = mysqli_query($connect, "SELECT `id`, `img_b_link`, `title_b`, `link_b`, `full_link_b`, `description_b`, `id_teg_b`, `mask_img_b` FROM `benefit`");
        while($item = mysqli_fetch_assoc($item_benefit))
        {
      ?>
      <div class="movie_card" id="tomb">
        <div class="info_section">
          <div class="movie_header">
            <img class="locandina" src="/assets/img/benifit/uploads/<?=$item['img_b_link']?>"/>
            <h1><?=$item['title_b']?></h1>
            <h4><?=$item['link_b']?></h4>
            
          </div>
          <div class="movie_desc">
            <p class="text">
              <?=$item['description_b']?>
            </p>
            <span class="minutes">Курсы</span>
            <a target="_blank" href="<?=$item['full_link_b']?>">Перейти к источнику</a>
          </div>
          
        </div>
        <div class="blur_back" style="background: url(/assets/img/benifit/uploads/<?=$item['mask_img_b']?>);"></div>
      </div>
      <?php 
        }
      ?>
      
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