<!DOCTYPE html>
<html>
    <head>
        <title>Новый Пользователь</title>
    </head>
    <body>
        <h1>Новая Запись</h1>
        <p><b>{{$user->name}}</b> создал новую заявку на Вашем сайте в {{ date('d.m.Y', strtotime($enroll->created_at)) }}.</p>
        <h4>Данные</h4>
        <p>Номер: {{$user->phone}}</p>
        <p>Почта: {{$user->email}}</p>
        <p>Жалобы:</p>
        <span>{{$enroll->complaints}}</span>
    </body>
</html>