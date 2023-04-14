<li class="nav-item @include('admin.html.layouts.menu.activeclass', ['name' => 'calc.title'])">
    <a href="#" class="nav-link">
{{--        <i class="far fa-circle nav-icon"></i>--}}
        <p class="text-uppercase">
            Подвиды услуг
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('calc.title.index')}}" class="nav-link">
{{--                <i class="far fa-circle nav-icon"></i>--}}
                <p class="pl-3">- все подвиды услуг</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('calc.title.create')}}" class="nav-link">
{{--                <i class="far fa-circle nav-icon"></i>--}}
                <p class="pl-3">- cоздать подвид</p>
            </a>
        </li>
    </ul>
</li>
