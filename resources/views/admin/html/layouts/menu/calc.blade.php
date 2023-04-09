<li class="nav-item menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon far fa-plus-square"></i>
        <p>
            Калькулятор
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>




    <ul class="nav nav-treeview">
        <li class="nav-item @include('admin.html.layouts.menu.activeclass', ['name' => 'calc.title'])">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Категории
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('calc.title.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Все категории</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('calc.title.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Создать категорию</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item @include('admin.html.layouts.menu.activeclass', ['name' => 'calc.class'])">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Классы
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('calc.class.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Все классы</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('calc.class.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Создать класс</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item @include('admin.html.layouts.menu.activeclass', ['name' => 'calc.types'])">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                   Типы
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{route('calc.types.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Все типы</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('calc.types.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Создать тип поля</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item @include('admin.html.layouts.menu.activeclass', ['name' => 'calc.modules'])">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Модули
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{route('calc.modules.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Все модули</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('calc.modules.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Создать модуль</p>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</li>
