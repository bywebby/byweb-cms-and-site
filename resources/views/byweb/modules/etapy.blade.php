<section>

    <div class="row etapy py-30">
        <div class="container">


            <div class="center">
                <header>
                    <h2>{{ $module->title }}</h2>
                </header>

                @if($module->desc)
                    <div class="etapy-module-desc pb-30">
                        {!! $module->desc !!}
                    </div>
                @endif
            </div>


                        <div class="etapy-items">

                            @php
                                $i=0;
                            @endphp

                            @foreach($data as $item)
                                @if($module->types->id == $item->type_id)

                                    <div class="etapy-item py-20">

                                        @if($item->description)
                                            <div class="col-1">

                                                <div class="col-1-icon{{$i % 2 == 0 ? ' icon-even': '' }}">
                                                    <i class="{{$item->description}}"></i>
                                                </div>



                                            </div>
                                        @endif

                                        <div class="col-2">
                                            <h2>{{++$i}}. {{ $item->title }}</h2>
                                            <div>{!! $item->content !!}</div>
                                        </div>

                                        <div class="col-3">
                                               <figure>
                                                   <img src="{{ asset('uploads/'.$item->thumbnail ) }}" alt="">
                                               </figure>
                                        </div>

                                    </div>


                                @endif
                            @endforeach
        </div>




    </div>




</section>
