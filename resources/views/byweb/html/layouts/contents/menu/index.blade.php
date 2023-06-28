<div class="row" id="nav">
    <div class="container">
        <div class="nav">
            <div id="logo">
                <a href="{{ url('/') }}">BYWEB</a>
            </div>

            <nav class="nav-menu" id="nav-menu">
                {{-- бургер-кнопка завязана на vue --}}
                 <div id="menu-burger-button">
                    <i :class="menuBurgerIcon" @click="menuButton()"></i>
                </div>
{{-- рекурсивная передача меню - нужно переделать глобально в компосер для сквозного доступа --}}
                @include('byweb.html.layouts.contents.menu.tmp.default', ['parent' => 0, 'items' => $items])

            </nav>
        </div>


    </div>
</div>










