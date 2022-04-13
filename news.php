<?php 
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
    <link rel="stylesheet" href="assets/css/Components/back_authorization.css">
    <link rel="stylesheet" href="assets/css/Components/_news.css">
    <link rel="stylesheet" href="assets/css/Components/btn_profile.css">
</head>
<body>
    <script src="https://kit.fontawesome.com/628c8d2499.js" crossorigin="anonymous"></script>
    <nav id="menu">
       <?php include "templates/nav_center.php"?>
    </nav>
    <nav class="nav-bar">
        <div class="logo">Ura quest <span>  Новости</span></div>
        <div class="profile">
            <i class="far fa-bell"></i>
            <a href="#"><img src="assets/img/icons/images.jpeg"></a>
        </div>
        
    </nav>
    <div class="merge">
        <main class="news_cards">
            <div class="band">
                <div class="item-1">
                  <a href="https://design.tutsplus.com/articles/international-artist-feature-malaysia--cms-26852" class="card_news">
                    <div class="thumb" style="background-image: url(https://cdnb.artstation.com/p/assets/images/images/024/538/827/original/pixel-jeff-clipa-s.gif?1582740711);"></div>
                    <article>
                      <h1>Наименование новости</h1>
                      <span>Автор</span>
                    </article>
                  </a>
                </div>
                <div class="item-2">
                  <a href="https://webdesign.tutsplus.com/articles/how-to-conduct-remote-usability-testing--cms-27045" class="card_news">
                    <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/users-2.png);"></div>
                    <article>
                      <h1>Второе наименование новости</h1>
                      <span>Второй автор</span>
                    </article>
                  </a>
                </div>
                <div class="item-3">
                  <a href="https://design.tutsplus.com/articles/envato-tuts-community-challenge-created-by-you-july-edition--cms-26724" class="card_news">
                    <div class="thumb" style="background-image: url(https://c4.wallpaperflare.com/wallpaper/995/26/535/multitasking-wallpaper-preview.jpg);"></div>
                    <article>
                      <h1>Третье наименование новости</h1>
                      <p>Текст новости </p>
                      <span>Третий автор</span>
                    </article>
                  </a>
                </div>
                <div class="item-4">
                  <a href="https://webdesign.tutsplus.com/tutorials/how-to-code-a-scrolling-alien-lander-website--cms-26826" class="card_news">
                    <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/landing.png);"></div>
                    <article>
                      <h1>Четвертое наиименование новости</h1>
                      <p>Текст новости</p>
                      <span>Четвертый автор</span>
                    </article>
                  </a>
                </div>
                <div class="item-5">
                  <a href="https://design.tutsplus.com/tutorials/stranger-things-inspired-text-effect--cms-27139" class="card_news">
                    <div class="thumb" style="background-image: url(https://i.pinimg.com/originals/c8/05/12/c805125798627dcf23b4f33e76a4c4f8.jpg);"></div>
                    <article>
                      <h1>Пятое наименование новости</h1>
                      <span>Пятый автор</span>
                    </article>
                  </a>
                </div>
                <div class="item-6">
                  <a href="https://photography.tutsplus.com/articles/5-inspirational-business-portraits-and-how-to-make-your-own--cms-27338" class="card_news">
                    <div class="thumb" style="background-image: url(https://cutewallpaper.org/25/anime-girl-studying-wallpaper/168823716.jpg);"></div>
                    <article>
                      <h1>Шестое наименование новости</h1>
              
                      <span>Шестой автор</span>
                    </article>
                  </a>
                </div>
                <div class="item-7">
                  <a href="https://webdesign.tutsplus.com/articles/notes-from-behind-the-firewall-the-state-of-web-design-in-china--cms-22281" class="card_news">
                    <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/china.png);"></div>
                    <article>
                      <h1>Седьмое наименование новости</h1>
                      <span>Шестой автор</span>
                    </article>
                  </a>
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
</body>
</html>