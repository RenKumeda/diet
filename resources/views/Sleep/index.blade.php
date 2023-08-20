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
        <div class='sleeps'>
            @foreach ($sleeps as $sleep)
                <div class='sleep'>
                    <h2 class='title'>Title</h2>
                    <p class='body'>This is a sample body.</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $sleeps->links() }}
        </div>
    </body>
</html>