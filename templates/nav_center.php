<nav id="menu">
    <div class="menu-item">
    <div class="menu-text">
        <a href="#">Квест</a>
    </div>
    <div class="sub-menu">
        <div class="icon-box">
            <div class="icon"><i class="fal fa-dragon"></i></div>
            <div class="text">
                <div class="title"><a href="quest.php">Прохождение</a> <i class="far fa-arrow-right"></i></div>
                <div class="sub-text">Проходи квест и получай бонусы.</div>
            </div>
        </div>
        <div class="icon-box">
            <div class="icon"><i class="fal fa-chart-network"></i></div>
            <div class="text">
                <div class="title">Статистика <i class="far fa-arrow-right"></i></div>
                <div class="sub-text">Просматривай свои результаты квеста.</div>
            </div>
        </div>
        <div class="icon-box">
            <div class="icon"><i class="fal fa-gift"></i></div>
            <div class="text">
                <div class="title">Достижения <i class="far fa-arrow-right"></i></div>
                <div class="sub-text">Здесь можешь забрать свои бонусы.</div>
            </div>
        </div>
        <div class="sub-menu-holder"></div>
    </div>
    </div>
    <div class="menu-item">
        <div class="menu-text">
            <a href="#">Контакты</a>
        </div>
        <div class="sub-menu">
            <div class="icon-box">
                <div class="icon"><i class="fal fa-newspaper"></i></div>
                <div class="text">
                    <div class="title"><a href="news.php">О нас </a><i class="far fa-arrow-right"></i></div>
                    <div class="sub-text">Здесь ты можешь узнать о том кто мы.</div>
                </div>
            </div>
            <div class="icon-box">
                <div class="icon"><i class="fal fa-lightbulb-on"></i></div>
                <div class="text">
                    <div class="title"><a href="new_mind.php">Ваши пожелания </a><i class="far fa-arrow-right"></i></div>
                    <div class="sub-text">У вас появилась новая идея для квеста?</div>
                </div>
            </div>
            <div class="sub-menu-holder"></div>
        </div>
    </div>
    <div class="menu-item">
        <div class="menu-text">
            <a href="#">Архив</a>
        </div>
            <div class="sub-menu">
            <div class="icon-box">
                <div class="icon"><i class="far fa-book"></i></div>
                <div class="text">
                    <div class="title">Гайд по квету <i class="far fa-arrow-right"></i></div>
                    <div class="sub-text">Не знаете как проходить наш квест?</div>
                </div>
            </div>
            <div class="icon-box">
                <div class="icon"><i class="far fa-award"></i></div>
                <div class="text">
                    <div class="title">Рекомендуем <i class="far fa-arrow-right"></i></div>
                    <div class="sub-text">Наши рекомендации полезны для тебя</div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="menu-text">
            <a href="#">Телеграмм</a>
        </div>
        <div class="sub-menu">
            <div class="icon-box">
                <div class="icon"><i class="far fa-satellite"></i></div>
                <div class="text">
                    <div class="title">Новости <i class="far fa-arrow-right"></i></div>
                    <div class="sub-text">Подпишись чтобы узнавать новое о квесте.</div>
                </div>
            </div>
            <div class="icon-box">
                <div class="icon"><i class="fab fa-telegram"></i></div>
                <div class="text">
                    <div class="title">Вопросы и ответы <i class="far fa-arrow-right"></i></div>
                    <div class="sub-text">То место где сможешь задать свой вопрос.</div>
                </div>
            </div>
        </div>
    </div>

    <div id="sub-menu-container">
        <div id="sub-menu-holder">
            <div id="sub-menu-bottom">

            </div>
        </div>
    </div>
</nav>
<nav class="nav-bar">
    <div class="logo">Ura quest <span>  Квест / Модули</span></div>
    <div class="profile">
        <i class="far fa-bell"></i>

        <div class="menu-button-wrapper">
            <a href="#demo-modal"><img src="assets/img/icons/images.jpeg"></a>
        </div>

    </div>
    
</nav>
<div id="demo-modal" class="modal_con">
    <div class="modal__content">
        <div class="item-list">
            <h4><?= $_SESSION['user']['login'] ?></h4>
            <a href="vendor/logout.php">Выйти</a>
        </div>
        <a href="#" class="modal__close">&times;</a>
    </div>
</div>