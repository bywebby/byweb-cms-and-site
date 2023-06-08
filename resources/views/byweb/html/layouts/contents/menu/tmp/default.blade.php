{{--Рекурсиваня постройка дерева меню--}}

@if (count($items->where('parrent_id', $parent)))


    @if(!isset($podmenu) || $podmenu == 3)
        <ul class="{{ $parent == 0 ? 'menu-list' : 'sub-menu'}}" @if($parent == 0) :class="menuClassOpen" @else :class="subMenuClassOpen" @endif>
    @else
        <ul>
    @endif


        @foreach ($items->where('parrent_id',$parent) as $item)
{{--1 - заголовок; 2--подменю; 3--корневая; --}}
            <li class="{{$parent == 0 ? '' : (($item->menu_type_id == 1) ? 'sub-menu-items' : '')}}">

            @if($item->menu_type_id == 1)
                <div class="sub-menu-item">
                    <div class="sub-menu-title">
                        {{ $item->title }}
                    </div>

            @else
                    <a href="{{$item->slug}}" @if(isset($item->children)) @click="openSubMenuBurger($event)" @endif>
{{--                        {{dd($item->children->isNotEmpty())}}--}}
                         @if(isset($podmenu))
                            <i class="fa fa-screwdriver-wrench"></i>&nbsp;
                        @endif
                            {{ $item->title }}
                    </a>
            @endif

                {{--рекурсивный вызов самого себя в шаблоне--}}
                @include('byweb.html.layouts.contents.menu.tmp.default', ['parent' => $item->id, 'podmenu' => $item->menu_type_id])

                    @if($item->menu_type_id == 1)
                    </div>
                @endif
            </li>

        @endforeach
    </ul>

@endif
