<nav class="nav-bar">
    <div class="logo">Ura quest <span> <a href="quest.php">Квест</a> / <?=$head?></span></div>
    <?php 
        $user = $_SESSION['user']['id'];
        $nav_user = mysqli_query($connect,"SELECT Players.avatar,Players.login FROM Players WHERE Players.id=$user");
        while($item=mysqli_fetch_assoc($nav_user)){ 
    ?>
    <div class="profile" onClick="window.location='../profile_world/index_prof.php'">
        <p class="profile_name_nav"><?=$item['login']?></p>
        <div class="menu-button-wrapper">
            <a><img src="../<?=$item['avatar']?>"></a>
        </div>
    </div>
    <?php
        }
    ?>
</nav>

<div class="pagination">
<div data-tooltip="Идеи" class="pagination__dot" onClick="window.location='idea.php'"><img src="/assets/img/icons/menu/idea.svg" alt=""></div>
  <div data-tooltip="Полезное" class="pagination__dot" onClick="window.location='benifit.php'"><img src="/assets/img/icons/menu/benefi.svg" alt=""></div>
  <div data-tooltip="Квест" class="pagination__dot" onClick="window.location='quest.php'"><img src="/assets/img/icons/menu/play.svg" alt=""></div>
  <div data-tooltip="Гайд" class="pagination__dot" onClick="window.location='guide.php'"><img src="/assets/img/icons/menu/guide.svg" alt=""></div>
  <div data-tooltip="Помощь" class="pagination__dot" onClick="window.location='help.php'"><img src="/assets/img/icons/menu/help.svg" alt=""></div>

</div>