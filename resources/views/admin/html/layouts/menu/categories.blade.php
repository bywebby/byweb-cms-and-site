<li class="nav-item @include('admin.html.layouts.menu.activeclass', ['name' => 'categories'])">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
            Категории
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">{{$countCategory}}</span>
        </p>
    </a>

    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Все категории</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('categories.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Создать</p>
            </a>
        </li>
    </ul>
</li>
