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
