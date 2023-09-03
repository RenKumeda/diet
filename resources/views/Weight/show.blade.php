<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>weight</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $weight->title }}
        </h1>
        <div class="content">
            <div class="content_weight">
                <h3>本文</h3>
                <a class="body">{{ $weight->body }}</a>
            </div>
        </div>
        <div class="footer">
            <a href='/weights'>戻る</a>
        </div>
    </body>
</html>