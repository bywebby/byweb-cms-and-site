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
