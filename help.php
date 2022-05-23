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
    <title>Помощь</title>
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
    <link rel="stylesheet" href="assets/css/Components/_new_mind.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>

<body>
    <script src="https://kit.fontawesome.com/628c8d2499.js" crossorigin="anonymous"></script>
    <nav class="main_nav">
        <?php 
        $head = "Помощь";
        include "templates/nav_center.php";
        ?>
    </nav>
    
    <div class="merge">
        <main class="background">
            
                <div class="container">
                  <div class="screen">
                    <div class="screen-body">
                      <div class="screen-body-item left">
                        <div class="app-title">
                          <span>У вас есть к нам</span>
                          <span>Вопрос</span>
                        </div>
                        <div class="app-contact">Почта проекта: uraquestmail@gmail.com</div>
                      </div>
                      <form action="vendor/send.php" method="POST" class="screen-body-item">
                        <div class="app-form">
                          <div class="app-form-group">
                            <input type="email" name="email" class="app-form-control" placeholder="EMAIL" required>
                          </div>
                          <div class="app-form-group message">
                            <textarea name="idea_message" class="app-form-control" placeholder="Опишите вашу проблему?" required></textarea>
                          </div>
                          <div class="app-form-group buttons">
                            <button type="submit" class="app-form-button">Отправить</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>  
                
        </main>
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