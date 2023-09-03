<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>training</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $training->title }}
        </h1>
        <div class="content">
            <div class="content_training">
                <h3>本文</h3>
                <p class="body">{{ $training->body }}</p>
            </div>
        </div>
        <div class="footer">
            <a href='/trainings/'>戻る</a>
        </div>
    </body>
</html>