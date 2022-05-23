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
    <title>Ideas</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Components/menu.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sirin+Stencil&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Components/back_animation.css">
    <link rel="stylesheet" href="assets/css/Components/idea.css">
    <link rel="stylesheet" href="assets/css/Components/preloader.css">
    <link rel="stylesheet" href="assets/css/Components/_profile.css">
</head>
<body>
    <script src="https://kit.fontawesome.com/628c8d2499.js" crossorigin="anonymous"></script>
    <nav class="main_nav">
        <?php 
            $head = "Идеи";
            include "templates/nav_center.php";
        ?>
    </nav>  
    
    <svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
        <symbol id="icon-star" viewBox="0 0 1024 1024">
            <title>star</title>
            <path class="path1" d="M1020.192 401.824c-8.864-25.568-31.616-44.288-59.008-48.352l-266.432-39.616-115.808-240.448c-12.192-25.248-38.272-41.408-66.944-41.408s-54.752 16.16-66.944 41.408l-115.808 240.448-266.464 39.616c-27.36 4.064-50.112 22.784-58.944 48.352-8.8 25.632-2.144 53.856 17.184 73.12l195.264 194.944-45.28 270.432c-4.608 27.232 7.2 54.56 30.336 70.496 12.704 8.736 27.648 13.184 42.592 13.184 12.288 0 24.608-3.008 35.776-8.992l232.288-125.056 232.32 125.056c11.168 5.984 23.488 8.992 35.744 8.992 14.944 0 29.888-4.448 42.624-13.184 23.136-15.936 34.88-43.264 30.304-70.496l-45.312-270.432 195.328-194.944c19.296-19.296 25.92-47.52 17.184-73.12zM754.816 619.616c-16.384 16.32-23.808 39.328-20.064 61.888l45.312 270.432-232.32-124.992c-11.136-6.016-23.424-8.992-35.776-8.992-12.288 0-24.608 3.008-35.744 8.992l-232.32 124.992 45.312-270.432c3.776-22.56-3.648-45.568-20.032-61.888l-195.264-194.944 266.432-39.68c24.352-3.616 45.312-18.848 55.776-40.576l115.872-240.384 115.84 240.416c10.496 21.728 31.424 36.928 55.744 40.576l266.496 39.68-195.264 194.912z"></path>
        </symbol>
        </defs>
    </svg>


<div class="merge_ideas">
    <div class="merge_center">
        <a href="#demo-modal">Добавить идею</a>
    </div>
<div class="outerdiv">
    <div class="innerdiv">
      <!-- div1 -->
      <?php
        $items = mysqli_query($connect, "SELECT Players.avatar, Players.login,status_players.status_player, 
        ideas.id,ideas.idea_theme, ideas.idea_msg, ideas.to_top 
        from ideas INNER JOIN Players ON ideas.id_user=Players.id INNER JOIN status_players ON Players.id_status_player=status_players.id
        ORDER BY ideas.to_top DESC");
        while($item=mysqli_fetch_assoc($items))
        {
        ?>  
        <div class="div1 eachdiv">
          <div class="userdetails">
            <div class="imgbox">
              <img src="<?=$item['avatar']?>" alt="">
            </div>
            <div class="detbox">
              <p class="name"><?=$item['login']?></p>
              <p class="designation"><?=$item['status_player']?></p>
            </div>
          </div>
          <div class="review">
            <h4><?=$item['idea_theme']?></h4>
          <p>“ <?=$item['idea_msg']?> ”</p>
          </div>
        </div>
      <?php
        }
      ?>
    </div>
  </div>


</div>


<div id="demo-modal" class="modal">
    <div class="modal__content">
      <form action="/vendor/send_idea.php" method="POST">
        <h3>Тема</h3>
        <input type="text" name="idea_theme" placeholder="Тема идеи">
        <h3>Описание вашей темы</h3>
        <textarea name="idea_msg" placeholder="Описание идеи" cols="30" rows="10"></textarea>
        <button type="submit"><img src="/assets/img/idea/send.png" alt=""></button>
      </form>
        <a href="#" class="modal__close">&times;</a>
    </div>
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