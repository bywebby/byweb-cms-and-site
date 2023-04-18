<section class="row">
    <div class="calc">

        <h2>{{$calcItems["module-title"]}}</h2>
        <div class="calc-desc">
            {{$calcItems["module-desc"]}}
        </div>
        <div class="calc-row">
            @foreach($calcItems as $k => $calcItem)

                @if(is_array($calcItem))

                    <div class="calc-item">
                        <h4>{{$k}}</h4>
                        @foreach($calcItem as $i)
                            @if(is_array($i))
                                <div class="calc-descprice">

                                    @foreach($i as $item)

                                        @if($item['price'] != 0)
                                            <label>

                                                @if(!empty($item['class']))
                                                    <i class="{{$item['class']}}"></i>
                                                @endif

                                                <input type="{{$item['type']}}" value="{{$item['price']}}">

                                                {{$item['title']}}

                                            </label>
                                        @else
                                            <span class="hr">{{$item['title']}}</span>


                                        @endif






                                    @endforeach
                                </div>
                            @endif
                            <br/>
                        @endforeach
                    </div>

                @endif

            @endforeach
        </div>
    </div>
</section>
