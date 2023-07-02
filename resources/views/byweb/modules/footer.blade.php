<section id="footer" class="pt-50">
    <div class="container">
        {{-- якорь на заказ --}}
        <a id="zakaz"></a>

        <div class="footer-header center">
            <h2>{{$item->title}}</h2>
            <div class="footer-desc">

                {!!$item->content !!} <br />

                @if(isset($sape))
                    {!! $sape->return_links() !!}
                @endif

            </div>
        </div>

        @include('byweb.modules.form')
        <div class="center">
            <div id="footer-photo" class="pb-30">
                <span id="footer-first-photo"><img id="footer-ceo" src="{{asset('/tpl/byweb/img/dirbyweb.jpg')}}" alt=""></span>
                <img id="footer-qr" src="{{asset('/tpl/byweb/img/qr-code.jpg')}}" alt="">
            </div>

            <div class="footer-phone">
                <h3>Телефон:</h3>
                <a id='footer-phone' href="tel:+375295573639" rel="nofollow noopener noreferrer">
                    <small>+375 (29)</small> 557-36-39
                </a>

                <small>МТС</small>

                <a href="https://telegram.me/sozdaniesajta" rel="nofollow noopener noreferrer" target="_blank">

                    <img id="telegram" src="{{asset('/tpl/byweb/img/telegram.png')}}" alt="">

                </a>

            </div>
        </div>

    </div>





</section>




