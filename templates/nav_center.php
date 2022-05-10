<?//=$_SESSION['user']['login'] ?>
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
    <div class="profile" onClick="window.location='../profile_world/index.html'">
        <p class="profile_name_nav"><?= $_SESSION['user']['login'] ?></p>
    
        <div class="menu-button-wrapper">
            <a><img src="assets/img/icons/images.jpeg"></a>
        </div>

    </div>
    
</nav>
<!-- <div id="demo-modal" class="modal_con">
    <div class="modal__content">
        <div class="item-list">
            <div class="modal-container">
                <input type="radio" id="tab1" name="tab">
                <label class="profile-delete" for="tab1"><img src="/assets/img/profile/del_account.png" alt=""></label>
                <input type="radio" id="tab2" name="tab" checked>
                <label class="profile-header" for="tab2">Профиль игрока</label>
                <div class="modal-content-container">
                    <div class="modal-content" id="c1">
                        <div class="profile-leave-always">
                            <img src="/assets/img/profile/cry_for_leave.png" alt="">
                            <p>Неужели вы решили покинуть нас на всегда?</p>
                            <button class="profile-leave-always-yes">Да, удалить мой аккаунт</button>
                            <button class="profile-leave-always-no">Нет, я хочу остаться</button>
                        </div>
                    </div>
                    <div class="modal-content" id="c2">
                        <form class="profile-main-info">
                            <button class="btn-info-img"><img src="/assets/img/profile/avatar/1024x768-72898-astronaut-artist-artwork-digital-art-hd-4k.jpg" alt=""></button>
                            <h4></h4>
                            <input type="email" class="profile-input-first" placeholder="astronetngc3372@gmail.com">
                            <div class="date-birth">
                                <input type="text" placeholder="03.11.2001">
                                <input type="text" placeholder="19">
                            </div>
                            <div class="profile-status"><span>Статус:</span>Начинающий</div>
                            <div class="profile-exit-change-data">
                                <button class="profile-exit"><a href="vendor/logout.php">Выйти</a></button>
                                <button class="profile-change-data">Изменить</button>
                            </div>
                            
                        </form>
                        <div class="profile-other-info">
                            <div class="profile-about-info">
                                <h3>О себе</h3>
                                <textarea name="about-info" cols="30" rows="10"></textarea>
                            </div>
                            <div class="profile-tegs">
                                <h3>Теги</h3>
                            </div>
                            <form class="profile-change-password">
                                <h3>Изменение пароля</h3>
                                <div class="merge-change-password">
                                    <input type="password" placeholder="Старый пароль...">
                                    <input type="password" placeholder="Новый пароль...">
                                    <button>Изменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="modal__close">&times;</a>
    </div>
</div> -->