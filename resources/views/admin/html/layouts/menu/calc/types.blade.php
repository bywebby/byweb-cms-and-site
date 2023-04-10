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
