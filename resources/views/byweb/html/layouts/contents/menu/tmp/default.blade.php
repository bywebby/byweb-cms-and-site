{{--Рекурсиваня постройка дерева меню--}}

@if (count($items->where('parrent_id', $parent)))
    {{--1 - заголовок; 2--подменю; 3--корневая; справочник в дб menu_types--}}
    @if(!isset($podmenu) || $podmenu == 3)
{{--        parrent 0 - это типа первая проходка - корневые кнопки--}}
    <ul class="{{ $parent == 0 ? 'menu-list' : 'sub-menu'}}"
{{--            интеграция vue функций--}}
            @if($parent == 0) :class="menuClassOpen"
{{--        иначе для субменю --}}
                @else :class="subMenuClassOpen"
            @endif>
    @else
        <ul>
    @endif

        @foreach ($items->where('parrent_id',$parent) as $item)

            <li class="{{$parent == 0 ? '' : (($item->menu_type_id == 1) ? 'sub-menu-items' : '')}}">

              @if($parent == 0)

                  @php
                        $slug = $item->slug;
                  @endphp

              @endif

{{--                если тип меню заголовок--}}
            @if($item->menu_type_id == 1)
                <div class="sub-menu-item">
                    <div class="sub-menu-title">
                        {{ $item->title }}
                    </div>

            @else




                    <a href="{{isset($slug) ? $slug.'/'.$item->slug : $item->slug}}" @if(isset($item->children)) @click="openSubMenuBurger($event)" @endif>
{{--                        {{dd($item->children->isNotEmpty())}}--}}
                         @if(isset($podmenu) and $item->class )
{{--                             fa fa-screwdriver-wrench--}}
                            <i class="{{$item->class}}"></i>&nbsp;

                        @endif
                            {{ $item->title }}
                    </a>
            @endif

                {{--рекурсивный вызов самого себя в шаблоне--}}
                @include('byweb.html.layouts.contents.menu.tmp.default', ['parent' => $item->id, 'podmenu' => $item->menu_type_id])
                    {{--если тип меню заголовок, то дописываем закрытие ранее начатого div для заголовка--}}
                    @if($item->menu_type_id == 1)
                    </div>
                @endif
            </li>

        @endforeach
    </ul>

@endif
