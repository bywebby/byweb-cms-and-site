<li class="nav-item @include('admin.html.layouts.menu.activeclass', ['name' => 'calc.category'])">
    <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Категории<i class="fas fa-angle-left right"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('calc.category.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Все категории</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('calc.category.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Создать категорию</p>
            </a>
        </li>
    </ul>
</li>
