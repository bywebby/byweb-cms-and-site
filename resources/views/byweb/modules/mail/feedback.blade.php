<h1>Сообщение с формы обратной связи</h1>

<p>Компания: {{$messages['company']}} | Тел: {{$messages['phone']}} | ФИО: {{$messages['fio']}}</p>

<h2>Текст сообщения:</h2>
<p>{{$messages['main-text']}}</p>
<hr />
<p>Время события {{ date("Y-m-d H:i:s") }}</p>
