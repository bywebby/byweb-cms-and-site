<div class="center pb-30">

{{--    vue component, который делает модальное окно отправлена форма--}}
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

{{-- записывае ошикб в json, чтобы передать в vue модальное окно уведомлений --}}
    @php
//пустая строка если нет ошибок
        $errorsForm = '';
// если есть любые ошибки
        if ($errors->any()) {
//запизываем ошибки в json для передачи в vue модальное окно ниде
            $errorsForm = json_encode($errors->all());
        }
    @endphp
{{--vue модальное окно уведомлений вормы - передем, что у нас есть по флеш сессии  по ошикба или удачной отправки формы--}}
    <byweb-form-modal form-status-success="{{session('statusForm')}}" form-status-errors="{{$errorsForm}}"></byweb-form-modal>

</div>

