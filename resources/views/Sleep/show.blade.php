<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>sleep</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $sleep->title }}
        </h1>
            <div class="content">
                <div class="content_sleep">
                <h3>本文</h3>
                <p class="body">{{ $sleep->body }}</p>
            </div>
        </div>
        <div class="footer">
            <a href='/sleeps/'>戻る</a>
        </div>
    </body>
</html>