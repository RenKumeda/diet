<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>sleep</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Sleep</h1>
        <a href="/Sleep.create">create</a>
        <div class="sleeps">
            @foreach ($sleeps as $sleep)
                <div class="sleep">
                    <a href="/sleep/{{ $sleep->id }}"><h2 class='title'>{{ $sleep->title }}</h2></a>
                    <p class="body">{{ $sleep->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $sleeps->links() }}
        </div>
    </body>
</html>