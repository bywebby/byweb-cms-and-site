<div class="center pb-30">

{{--    vue component, который делает модальное окно отправлена форма--}}
{{--    {{dump($status)}}--}}
{{--    {{dump(session('statusForm'))}}--}}

{{--на всякий случай подключаю ошибки валидации если js будет отключен--}}
    @include('byweb.html.layouts.errors')

    <form action="{{route('front.form')}}" method="post">

        @csrf

        <div class="controls">

            <div class="input">
                <input type="text" name="company" placeholder="Компания">
            </div>

            <div class="input">
                <input type="text" name="phone" placeholder="Телефон">
            </div>

            <div class="input">
                <input type="text" name="fio" placeholder="ФИО">
            </div>

        </div>

        <div class="textarea">
            <textarea name="main-text" id="" cols="30" placeholder="Сообщение"></textarea>
        </div>

        <button type="submit" class="form-button">Отправить</button>

    </form>


    @php
        $errorsForm = '';

        if ($errors->any()) {

             $errorsForm = [];
                foreach ($errors->all() as $error) {
                   $errorsForm[] = $error;
             }

            $errorsForm = json_encode($errorsForm);
        }

    @endphp




    <byweb-form-modal form-status-success="{{session('statusForm')}}" form-status-errors="{{$errorsForm}}"></byweb-form-modal>

</div>

