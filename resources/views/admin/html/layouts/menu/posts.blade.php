<li class="nav-item @include('admin.html.layouts.menu.activeclass', ['name' => 'posts'])">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Статьи
            <i class="right fas fa-angle-left"></i>
            <span class="badge badge-info right">{{ $countPost }}</span>
{{--            countPost--}}
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('posts.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Все статьи</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('posts.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Создать</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('types-posts.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Типы статей</p>
            </a>
        </li>
    </ul>
</li>
