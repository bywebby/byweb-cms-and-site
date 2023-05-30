<div class="center pb-30">

    @include('admin.html.layouts.errors')

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

</div>

