<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>meal</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Meal</h1>
        <div class='meals'>
            @foreach ($meals as $meal)
                <div class='meal'>
                    <a href='/meals/{{ $meal->id }}'><h2 class='title'>{{ $meal->title }}</h2></a>
                    <p class='body'>{{ $meal->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $meals->links()}}
        </div>
    </body>
</html>