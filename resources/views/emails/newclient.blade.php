@component('mail::message')
# У вас есть новый клиент от {{ $site }}

<i>Ф.И.О.:</i> {{ $name }}<br>
<i>Номер телефона:</i> {{ $phone }}<br>
<i>Сообщение: </i> {{ $message ?? 'нет' }}<br>
<i>Откуда:</i> {{ $address }}

@component('mail::button', ['url' => config('app.url')])
Перейти в панель администратора
@endcomponent

С уважением,<br>
Business Compass Corp
@endcomponent
