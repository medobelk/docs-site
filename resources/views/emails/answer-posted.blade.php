<!DOCTYPE html>
<html>
    <head>
        <title>Ответ</title>
    </head>
    <body>
        <h1>{{$question->name}}</h1>
        <span>
            Здравствуйте! Доктор Брезицкий Юрий Иосифович ответил на Ваш вопрос, ознакомьтесь с ответом по ссылке : 
            <a href="{{ url('/QA/getlist/question/'.$question->id) }}">{{ url('/QA/getlist/question/'.$question->id )}}.</a>
        </span>
    </body>
</html>