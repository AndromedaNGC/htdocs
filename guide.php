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
    <title>Гайд</title>
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
    <link rel="stylesheet" href="assets/css/Components/guide.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>

<body>
    <script src="https://kit.fontawesome.com/628c8d2499.js" crossorigin="anonymous"></script>
    <nav class="main_nav">
        <?php 
        $head = "Гайд";
        include "templates/nav_center.php";
        ?>
    </nav>
    
    <div class="tabs">
        <input type="radio" id="tab1" name="tab-control" checked>
        <input type="radio" id="tab2" name="tab-control">
        <input type="radio" id="tab3" name="tab-control">  
        <input type="radio" id="tab4" name="tab-control">
        <ul>
            <li title="Прохождения квеста"><label for="tab1" role="button"><svg viewBox="0 0 24 24">
        </svg><br><span>Прохождения квеста</span></label></li>
            <li title="Правила"><label for="tab2" role="button"><svg viewBox="0 0 24 24">
        </svg><br><span>Ваши идеи</span></label></li>
            <li title="Полезное"><label for="tab3" role="button"><svg viewBox="0 0 24 24">
        </svg><br><span>Полезное</span></label></li>    
        <li title="Ваши идеи"><label for="tab4" role="button"><svg viewBox="0 0 24 24">
        </svg><br><span>Правила квеста</span></label></li>
        </ul>
        
        <div class="slider"><div class="indicator"></div></div>
        <div class="content">
            <section>
                <div id=timeline>
                    <h1>Прохождения квеста</h1>
                    <div class="demo-card-wrapper">
                        <div class="demo-card demo-card--step">
                            <div class="head">
                                <div class="number-box">
                                    <span>01</span>
                                </div>
                                <h2>Technology</h2>
                            </div>
                            <div class="body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                <img src="/assets/img/guide/example.jpg" alt="Graphic">
                            </div>
                        </div>

                        <div class="demo-card demo-card--step">
                            <div class="head">
                                <div class="number-box">
                                    <span>02</span>
                                </div>
                                <h2>Confidence</h2>
                            </div>
                            <div class="body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                <img src="/assets/img/guide/example.jpg" alt="Graphic">
                            </div>
                        </div>

                        <div class="demo-card demo-card--step">
                            <div class="head">
                                <div class="number-box">
                                    <span>03</span>
                                </div>
                                <h2>Adaptation</h2>
                            </div>
                            <div class="body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                <img src="/assets/img/guide/example.jpg" alt="Graphic">
                            </div>
                        </div>

                        <div class="demo-card demo-card--step">
                            <div class="head">
                                <div class="number-box">
                                    <span>04</span>
                                </div>
                                <h2>Consistency</h2>
                            </div>
                            <div class="body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                <img src="/assets/img/guide/example.jpg" alt="Graphic">
                            </div>
                        </div>

                        <div class="demo-card demo-card--step">
                            <div class="head">
                                <div class="number-box">
                                    <span>05</span>
                                </div>
                                <h2>Conversion</h2>
                            </div>
                            <div class="body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                <img src="/assets/img/guide/example.jpg" alt="Graphic">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                <section>
                    <div id=timeline>
                        <h1>Ваши идеи</h1>
                        <div class="demo-card-wrapper">
                            <div class="demo-card demo-card--step head_1">
                                <div class="head">
                                    <div class="number-box">
                                        <span>01</span>
                                    </div>
                                    <h2>Technology</h2>
                                </div>
                                <div class="body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                    <img src="/assets/img/guide/example.jpg" alt="Graphic">
                                </div>
                            </div>

                            <div class="demo-card demo-card--step">
                                <div class="head">
                                    <div class="number-box">
                                        <span>02</span>
                                    </div>
                                    <h2>Confidence</h2>
                                </div>
                                <div class="body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                    <img src="/assets/img/guide/example.jpg" alt="Graphic">
                                </div>
                            </div>

                            <div class="demo-card demo-card--step">
                                <div class="head">
                                    <div class="number-box">
                                        <span>03</span>
                                    </div>
                                    <h2>Adaptation</h2>
                                </div>
                            </div>

                            <div class="demo-card demo-card--step">
                                <div class="head">
                                    <div class="number-box">
                                        <span>04</span>
                                    </div>
                                    <h2>Consistency</h2>
                                </div>
                            </div>

                            <div class="demo-card demo-card--step">
                                <div class="head">
                                    <div class="number-box">
                                        <span>05</span>
                                    </div>
                                    <h2>Conversion</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div id=timeline>
                        <h1>Полезное</h1>
                        <div class="demo-card-wrapper">
                            <div class="demo-card demo-card--step">
                                <div class="head">
                                    <div class="number-box">
                                        <span>01</span>
                                    </div>
                                    <h2>Technology</h2>
                                </div>
                                <div class="body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                    <img src="/assets/img/guide/example.jpg" alt="Graphic">
                                </div>
                            </div>

                            <div class="demo-card demo-card--step">
                                <div class="head">
                                    <div class="number-box">
                                        <span>02</span>
                                    </div>
                                    <h2>Confidence</h2>
                                </div>
                                <div class="body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                    <img src="/assets/img/guide/example.jpg" alt="Graphic">
                                </div>
                            </div>

                            <div class="demo-card demo-card--step">
                                <div class="head">
                                    <div class="number-box">
                                        <span>03</span>
                                    </div>
                                    <h2>Adaptation</h2>
                                </div>
                                <div class="body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                    <img src="/assets/img/guide/example.jpg" alt="Graphic">
                                </div>
                            </div>

                            <div class="demo-card demo-card--step">
                                <div class="head">
                                    <div class="number-box">
                                        <span>04</span>
                                    </div>
                                    <h2>Consistency</h2>
                                </div>
                                <div class="body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                    <img src="/assets/img/guide/example.jpg" alt="Graphic">
                                </div>
                            </div>

                            <div class="demo-card demo-card--step">
                                <div class="head">
                                    <div class="number-box">
                                        <span>05</span>
                                    </div>
                                    <h2>Conversion</h2>
                                </div>
                                <div class="body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                                    <img src="/assets/img/guide/example.jpg" alt="Graphic">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <section>
                <div id=timeline>
                    <h1>Правила квеста</h1>
                    <main class="rules">
                        <p>Doggo ipsum long bois lotsa pats blep. What a nice floof ruff super chub very good spot, the neighborhood pupper lotsa pats. Borkdrive shibe shoober what a nice floof, borking doggo.</p>
                        <p>Shoober shooberino adorable doggo many pats, heckin good boys many pats pupper wrinkler, corgo maximum borkdrive. A frighten puggo wow very biscit.</p>
                        <p>Big ol h*ck adorable doggo vvv smol borking doggo with a long snoot for pats big ol, he made many woofs doing me a frighten puggo wow very biscit, ruff fat boi ruff long doggo. </p>
                        <p>Long bois mlem I am bekom fat wrinkler puggo maximum borkdrive big ol pupper I am bekom fat, fluffer vvv adorable doggo lotsa pats snoot. I am bekom fat ur givin me a spook length boy wow very biscit very good spot.</p>
                        <p>Doggo ipsum long bois lotsa pats blep. What a nice floof ruff super chub very good spot, the neighborhood pupper lotsa pats. Borkdrive shibe shoober what a nice floof, borking doggo.</p>
                    </main>
                </div>
            </section>
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