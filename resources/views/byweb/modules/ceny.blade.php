<section class="row">
    <div class="calc">
{{--заголовок модуля--}}
        <h2>{{$calcItems["module-title"]}}</h2>
{{--        описание модуля --}}
        <div class="calc-desc">
            {{$calcItems["module-desc"]}}
        </div>
        <div class="calc-row">
            @foreach($calcItems as $k => $calcItem)
                @if(is_array($calcItem))
                    <div class="calc-item">
                        <h4>{{$k}}</h4>
                        @foreach($calcItem as $id => $i)
                            @if(is_array($i))
                                <div class="calc-descprice">
                                    @foreach($i as $item)
                                        @if($item['price'] != 0)
                                            <label>
{{--                                                выводим иконку --}}
                                                @if(!empty($item['class']))
                                                    <i class="{{$item['class']}}"></i>
                                                @endif
{{--                                                вывыодим сам input или radio --}}
                                                <input type="{{$item['type']}}" value="{{$item['price']}}" {{$item['checked'] ? 'checked' : ''}} {{$item['type'] == 'radio' ? "name=pay_{$id}" : ''}}>
                                                {{$item['title']}}: {{$item['price']}} BYN
                                            </label>
{{--                                            если цена 0, то пишем примечание с hr границей --}}
                                       @else
                                            <span class="hr">{{$item['title']}}</span>
                                        @endif

                                    @endforeach
                                </div>
                            @endif
                            <div id="pay_price{{$id}}" class="calc-price"> 1234 <small>BYN</small></div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
