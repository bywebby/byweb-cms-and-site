<li class="nav-item @include('admin.html.layouts.menu.activeclass', ['name' => 'calc.title'])">
    <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>
            Составные части услуг
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('calc.title.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Все части услуг</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('calc.title.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Создать часть услуг</p>
            </a>
        </li>
    </ul>
</li>
