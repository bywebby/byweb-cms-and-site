<div class="row" id="nav">
    <div class="container">
        <div class="nav">
            <div id="logo">
                <a href="{{ url('/') }}">BYWEB</a>
            </div>

            <nav class="nav-menu" id="nav-menu">
{{--бургер кнопка завязана на js в корневом шаблоне --}}
                <i id="menu-burger-button" class="fa fa-bars"></i>
{{-- бургер кнопка добавляет класс open-menu и по клику в мобильной версии открвается menu-list--}}
                <ul class="menu-list">
                    <li>
                        <a href="#">Услуги</a>
                        <!-- первый уровень выпадающего списка -->
                        <ul class="sub-menu">
                            <li class="sub-menu-items">
                                <div class="sub-menu-item">
                                    <div class="sub-menu-title">
                                        Создание сайтов
                                    </div>
                                    <ul>
                                        <li><a href="/razrabotka-saita"><i class="fa fa-screwdriver-wrench"></i>Php-программист</a></li>
                                        <li><a href="#"><i class="fa fa-cart-plus"></i>Интернет-магазин</a></li>
                                        <li><a href="#"><i class="fa fa-cart-flatbed"></i>Каталог товаров</a></li>
                                        <li><a href="#"><i class="fa fa-id-card"></i>Сайт-визитка</a></li>
                                        <li><a href="#"><i class="fa fa-building-flag"></i>Корпоративный сайт</a></li>
                                        <li><a href="#"><i class="fa fa-wallet"></i>Лендинг пейдж</a></li>
                                        <li><a href="#"><i class="fa fa-house-flood-water-circle-arrow-right"></i>Интернет-портал</a></li>
                                    </ul>
                                </div>

                                <div class="sub-menu-item">
                                    <div class="sub-menu-title">
                                       Интернет-маркетинг
                                    </div>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-arrow-trend-up"></i>Продвижение сайтов</a></li>
                                        <li><a  href="#"><i class='fa fa-tasks'></i>Контекстная реклама</a></li>
                                        <li><a href="#"><i class='fa fa-gauge'></i>Техническая оптимизация</a></li>
                                    </ul>
                                </div>


                                <div class="sub-menu-item">
                                    <div class="sub-menu-title">
                                        Сопровождение
                                    </div>
                                    <ul>
                                        <li><a href="#">Themes</a></li>
                                        <li><a href="#">Изготовление шаблонов</a></li>
                                        <li><a href="#">Tutorials</a>
                                        </li>
                                    </ul>


                                </div>


                            </li>


                        </ul>


                    </li>

                    <li>
                        <a href="{{ URL::current() }}/#portfolio" class=" iceMenuTitle ">
                            <span class="icemega_title icemega_nosubtitle">Портфолио</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ URL::current() }}#cena" class=" iceMenuTitle ">
                            <span class="icemega_title icemega_nosubtitle">Цены</span>
                        </a>
                    </li>
                    <li>
                        <a href="/o-nas" class=" iceMenuTitle ">
                            <span class="icemega_title icemega_nosubtitle">О нас</span>
                        </a>
                    </li>
                    <li>
                        <a href="/o-nas/otzyvy" class=" iceMenuTitle ">
                            <span class="icemega_title icemega_nosubtitle">Отзывы</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::current() }}#zakaz" class=" iceMenuTitle ">
                            <span class="icemega_title icemega_nosubtitle">Заказать</span>
                        </a>
                    </li>
                    <li>
                        <a href="/kontakty" class=" iceMenuTitle ">
                            <span class="icemega_title icemega_nosubtitle">Контакты</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


    </div>
</div>











