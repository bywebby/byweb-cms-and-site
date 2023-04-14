<li class="nav-item @include('admin.html.layouts.menu.activeclass', ['name' => 'calc.item'])">
    <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Блоки<i class="fas fa-angle-left right"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('calc.item.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Все блоки</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('calc.item.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Создать блок</p>
            </a>
        </li>
    </ul>
</li>
