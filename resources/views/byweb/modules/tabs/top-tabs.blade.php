<div class="top-tabs pb-40">
    <div class="container">
        <div class="top-tabs-desc center pb-20">
            <div class="top-tabs-header">
                <h3>{{ $module->title }}</h3>
            </div>
            <div class="top-tabs-txt">
                {!! $module->desc !!}
            </div>
        </div>

        <ul class="top-tabs-items">
            @foreach($data as $item)
                @if($module->types->id == $item->type_id)

                    <li class="top-tabs-item">

                        <div class="top-tabs-item-header">
                            <div class="top-tabs-item-title">{{ $item->title }}</div>
                            <div class="top-tabs-icon"><i class="fa fa-plus"></i></div>
                        </div>

                        <div class="top-tabs-item-txt">{!! $item->content !!}</div>
                    </li>

                @endif
            @endforeach
        </ul>
    </div>


</div>
