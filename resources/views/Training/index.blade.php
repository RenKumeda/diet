<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>training</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Training</h1>
        <div class='trainings'>
            @foreach ($trainings as $training)
                <div class='training'>
                    <a hrem='/trainings/{{ $training->id }}'><h2 class='title'>{{ $training->title }}</h2></a>
                    <p class='body'>{{ $training->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $trainings->links()}}
        </div>
    </body>
</html>