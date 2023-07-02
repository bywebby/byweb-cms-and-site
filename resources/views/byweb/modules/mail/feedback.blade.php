<h1>Сообщение с формы обратной связи</h1>

<p>
    Компания: {{$messages['company']}}<br />
    Тел: {{$messages['phone']}}<br />
    ФИО: {{$messages['fio']}}
</p>

<h2>Текст сообщения:</h2>
<p>{{$messages['main-text']}}</p>

@if($messages['order'])
    <h2>Заказ с калькулятора он-лайн:</h2>
<p>{{$messages['order']}}</p>
@endif

<hr />
<p>Время события {{ date("Y-m-d H:i:s") }}</p>
