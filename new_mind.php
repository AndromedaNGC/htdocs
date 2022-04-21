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
    <link rel="stylesheet" href="assets/css/Components/back_authorization.css">
    <link rel="stylesheet" href="assets/css/Components/_new_mind.css">
    <link rel="stylesheet" href="assets/css/Components/preloader.css">
    <link rel="stylesheet" href="assets/css/Components/_profile.css">
</head>
<body>
    <script src="https://kit.fontawesome.com/628c8d2499.js" crossorigin="anonymous"></script>
    <nav class="main_nav">
        <?php include "templates/nav_center.php"?>
    </nav>  
    
    <div class="merge">
        <main class="background">
            
                <div class="container">
                  <div class="screen">
                    <div class="screen-body">
                      <div class="screen-body-item left">
                        <div class="app-title">
                          <span>Пришли нам свою</span>
                          <span>Идею</span>
                        </div>
                        <div class="app-contact">Почта проекта: uraquestmail@gmail.com</div>
                      </div>
                      <form action="vendor/send.php" method="POST" class="screen-body-item">
                        <div class="app-form">
                          <div class="app-form-group">
                            <input name="name_player" class="app-form-control" placeholder="ИМЯ" required>
                          </div>
                          <div class="app-form-group">
                            <input type="email" name="email" class="app-form-control" placeholder="EMAIL" required>
                          </div>
                          <div class="app-form-group message">
                            <input type="text" name="idea_message" class="app-form-control" placeholder="Описание идеи" required>
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