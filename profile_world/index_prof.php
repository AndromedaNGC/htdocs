<?php 
    require "../vendor/connect.php";
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ura profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="../assets/css/Components/preloader.css">
  <link rel="stylesheet" href="../assets/css/Components/back_animation.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="perspective effect-rotate-left">
  <div class="container"><div class="outer-nav--return"></div>
    <div id="viewport" class="l-viewport">
      <div class="l-wrapper">
        <header class="header">
          <a class="header--logo" href="#0">
            <p>Ura Profile</p>
          </a>
          <a href="../quest.php" class="back_to_quest">Вернуться к квесту </a>
          <div class="header--nav-toggle">
            <span></span>
          </div>
        </header>
        <nav class="l-side-nav">
          <ul class="side-nav">
            <li class="is-active"><span>Главная</span></li>
            <li><span>Достижения</span></li>
            <li><span>О себе</span></li>
            <li><span>Данные</span></li>
            <li><span>Удаление</span></li>  
          </ul>
        </nav>
        <ul class="l-main-content main-content">
          <li class="l-section section section--is-active">
            <div class="intro">
              <div class="intro--banner">
                <?php 
                  $user = $_SESSION['user']['id'];
                  $about_user = mysqli_query($connect,"SELECT Players.avatar,Players.login,Players.email,Players.birthday,status_players.status_player,Players.about_player 
                  FROM Players INNER JOIN status_players ON Players.id_status_player=status_players.id WHERE Players.id=$user");
                  while($item=mysqli_fetch_assoc($about_user)){ 
                  $about_me = $item['about_player'];
                ?>
                <div class="banner_container">  
                  <div class="intro_banner_container">
                    <div class="btn-info-img">
                      <img src="/profile_world/assets/img/avatars/avatar1.jpg" alt="">
                    </div>
                    <div class="inner">
                      <h1><?=$item['login']?></h1>
                      <h2><?=$item['status_player']?></h2>
                    </div>
                  </div>
                  <div class="info_profile_home">
                    <h3><?=$item['email']?></h3>
                    <h3>Дата рождения: 03.11.2001</h3>
                  </div>
                </div>
                <?php
                  }
                ?>
                
                <div class="statistics">
                <?php 
                  $statistic_user = mysqli_query($connect,"SELECT (SELECT COUNT(tasks.id) from tasks) as count_tasks,
                  (SELECT COUNT(img_status_task) FROM user_tasks WHERE id_player=$user AND img_status_task='#E64C3C') as lose,
                  SUM(user_tasks.status_task) as status_task FROM user_tasks WHERE user_tasks.id_player=$user");
                  while($item=mysqli_fetch_assoc($statistic_user)){ 
                    $procent_all = (100 * $item['status_task'])/$item['count_tasks'];
                    $error_all = (100 * $item['lose'])/$item['count_tasks'];
                    $success = 100 - $error_all;
                ?>
                    <div class="chart-container-wrapper">
                    <div class="chart-container">
                        
                        <div class="chart-svg">
                            <svg viewBox="0 0 36 36" class="circular-chart green">
                                <path class="circle-bg" d="M18 2.0845
                                  a 15.9155 15.9155 0 0 1 0 31.831
                                  a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                  <path class="circle" stroke-dasharray="<?=$procent_all?>, 100" d="M18 2.0845
                                  a 15.9155 15.9155 0 0 1 0 31.831
                                  a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                <text x="14" y="20.35" class="percentage counter-number"><?=$procent_all?></text>
                                <text x="24" y="20.35" class="percentage counter"><?="%"?></text>
                            </svg>
                        </div>
                        <div class="chart-info-wrapper">
                            <h3>Квест пройден на</h3>
                        </div>
                    </div>
                    <div class="chart-container">
                        
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
                        <div class="chart-info-wrapper">
                            <h3>Успех прохождения</h3>
                        </div>
                    </div>
                    <div class="chart-container">
                        
                        <div class="chart-svg">
                            <svg viewBox="0 0 36 36" class="circular-chart blue">
                                <path class="circle-bg" d="M18 2.0845
                                  a 15.9155 15.9155 0 0 1 0 31.831
                                  a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                                  <path class="circle" stroke-dasharray="<?=$error_all?>, 100" d="M18 2.0845
                                  a 15.9155 15.9155 0 0 1 0 31.831
                                  a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                <text x="14" y="20.35" class="percentage counter-number-error"><?=$error_all?></text>
                                <text x="24" y="20.35" class="percentage counter"><?="%"?></text>
                            </svg>
                        </div>
                        <div class="chart-info-wrapper">
                            <h3>Ошибки допущены</h3>
                        </div>
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
                  counter(counterNumber, 10, <?=$procent_all?>);
                  const counterNumber_success = document.getElementsByClassName('counter-number-success')[0];
                  counter(counterNumber_success, 10, <?=$success?>);
                  const counterNumber_error = document.getElementsByClassName('counter-number-error')[0];
                  counter(counterNumber_error, 10, <?=$error_all?>);
              </script>
              <?php
                  }
                ?>
              </div>
              <div class="intro--options">
                <a href="#0">
                  <h3>Квест пройден на</h3>
                  <p>Алгоритм считает ваши выйгрыши и победы</p>
                </a>
                <a href="#0">
                  <h3>Успех прохождения</h3>
                  <p>Чем больше вы пройдете, тем больше шансов остаться с нами</p>
                </a>
                <a href="#0">
                  <h3>Ошибки допущены</h3>
                  <p>Если вы достигите 50%, то к сожалению нам придётся расстаться</p>
                </a>
              </div>
            </div>
          </li>
          <li class="l-section section">
            <div class="work">
              <h2>Ваши достижения</h2>
              <div class="work--lockup">
                <ul class="slider">
                  <li class="slider--item slider--item-left">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="assets/img/awards/award1.jpg" alt="Victory">
                      </div>
                      <p class="slider--item-title">Первая победа</p>
                      <p class="slider--item-description">Легенда гласит, что мир без побед не бывает</p>
                    </a>
                  </li>
                  <li class="slider--item slider--item-center">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="assets/img/awards/award2.jpg" alt="Metiew and Smith">
                      </div>
                      <p class="slider--item-title">Алгоритм начала</p>
                      <p class="slider--item-description">Если не существет алгоритма, то не сущетвует и логики</p>
                    </a>
                  </li>
                  <li class="slider--item slider--item-right">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="assets/img/awards/award3.jpg" alt="Alex Nowak">
                      </div>
                      <p class="slider--item-title">Многозадачность</p>
                      <p class="slider--item-description">Без многозадачности, не сможешь достойно пройти квест</p>
                    </a>
                  </li>
                </ul>
                <div class="slider--prev">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                  <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                    <path d="M561,1169C525,1155,10,640,3,612c-3-13,1-36,8-52c8-15,134-145,281-289C527,41,562,10,590,10c22,0,41,9,61,29
                    c55,55,49,64-163,278L296,510h575c564,0,576,0,597,20c46,43,37,109-18,137c-19,10-159,13-590,13l-565,1l182,180
                    c101,99,187,188,193,199c16,30,12,57-12,84C631,1174,595,1183,561,1169z"/>
                  </g>
                  </svg>
                </div>
                <div class="slider--next">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                  <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                    <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                  </g>
                  </svg>
                </div>
              </div>
            </div>
          </li>
          <li class="l-section section">
            <div class="about">
              <div class="about--banner">
                <img src="/profile_world/assets/img/about-visual.png" alt="">
                <h2>О себе</h2>
                <p><?=$about_me?></p>
              </div>
            </div>
          </li>
          <li class="l-section section">
            <div class="contact">
              <div class="contact--lockup">
                <div class="modal">
                  <h2>Изменение данных</h2>
                  <form action="../vendor/update.php" method="POST">
                    <input type="text" name="login" class="question" id="nme" autocomplete="off" />
                    <label for="nme"><span>Логин</span></label>
                    <input type="text" name="email" class="question" id="emal" autocomplete="off" />
                    <label for="nme"><span>Email</span></label>
                    <div class="calendar">
                    <div class="presentation" >
                      <fieldset>
                        <label class="label_date" for="date">Выбирете дату рождения</label>
                        <input class="input_date" name="date_select" type="date" id="date" placeholder="Выбор даты"/>
                      </fieldset>
                    </div>

                      <script type="text/javascript">
                        document.addEventListener('DOMContentLoaded', function(e) {
                          // Presentation variables
                          var pickerOptions = { 
                            disablePast: false, 
                            disableFuture: false, 
                            disableWeekend: true, 
                            useClock: false, 
                            weekStart: 1, 
                            minStep: 15, 
                            hrsStep: 1
                            // ,holidays: [{date: '12-25', name: 'Weihnachten'}, {date: '01-01', name: 'Neujahr'}]
                          };
                          var pickerTranslation = {
                            minutes: 'Минуты',
                            hours: 'Часы',
                            settime: 'Установить время',
                            months: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                            days: ['Понедельник','Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],
                            format: 'yyyy-MM-dd hh:mm', longformat: 'd. MMMM yyyy', displayformat: 'D, d. MMMM yyyy',
                            calendar: 'Календарь',
                            previous: 'Предыдущее',
                            next: 'Следущее',
                            close: 'Закрыть',
                            settings: 'Настройки',
                            selected: 'Выбрано',
                            select: 'Выбрать',
                            today: 'Сегодня',
                            set: 'Установить',
                            now: 'Сейчас'
                          };
                          var now = new Date(); 
                          var pickerDates = [
                            {date: now.getFullYear() +'-'+ ('0'+(now.getMonth()+1)).slice(-2) +'-14', name: 'Kalendereintrag', type: 'work'}, 
                            {date: now.getFullYear() +'-'+ ('0'+(now.getMonth()+1)).slice(-2) +'-14', name: 'Kalendereintrag II', type: 'private'},
                            {date: now.getFullYear() +'-'+ ('0'+(now.getMonth()+2)).slice(-2) +'-21', name: 'Kalendereintrag III', type: 'private'}
                          ];
                          // Options / translation de-CH:  
                          Datepicker(pickerOptions, pickerTranslation, pickerDates); // 
                          // Default initialization 
                          // Datepicker();
                          // Open calendar
                          // document.querySelector('form input').click();
                        }, false);
                      </script>
                      
                    </div>

                    <textarea name="about" rows="2" class="question" id="msg"  autocomplete="off"></textarea>
                    <label for="msg"><span>О себе</span></label>
                    <input type="password" name="passwd_old" class="question" id="nme"  autocomplete="off" />
                    <label for="nme"><span>Старый пароль</span></label>
                    <input type="password" name="passwd" class="question" id="emal"  autocomplete="off" />
                    <label for="nme"><span>Новый пароль</span></label>
                    <input type="submit" value="Изменить" />
                  </form>
              </div>
            </div>
          </li>
          <li class="l-section section">
            <div class="hire">
              <h2>Неужели вы покидаете нас?</h2>
              <!-- checkout formspree.io for easy form setup -->
              <img src="/profile_world/assets/img/goodbuy.png" alt="">
              <button>Удалить</button>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <ul class="outer-nav">
    <li class="is-active">Главная</li>
    <li>Достижения</li>
    <li>О себе</li>
    <li>Данные</li>
    <li>Удаление</li>
    <li><a href="../vendor/logout.php">Выйти</a></li> 
  </ul>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-2.2.4.min.js"><\/script>')</script>
<script src="assets/js/functions-min.js"></script>

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
</script>
<div class="holder">
  <div class="preloader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>
<script src="../assets/js/preloader.js"></script>
<script src="/profile_world/assets/js/calendar.js"></script>
</body>
</html>
