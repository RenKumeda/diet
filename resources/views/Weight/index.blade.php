<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>weight</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>weight</h1>
        <div class='weights'>
            @foreach ($weights as $weight)
                <div class='weight'>
                    <a href='/weights/{{ $weight->id }}'><h2 class='title'>{{ $weight->title }}</h2></a>
                    <p class='body'>{{ $weight->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $weights->links() }}
        </div>
    </body>
</html>