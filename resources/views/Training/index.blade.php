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
        <a href="/training/create">create</a>
        <div class="trainings">
            @foreach ($trainings as $training)
                <div class="training">
                    <a href="/trainings/{{ $training->id }}"><h2 class='title'>{{ $training->training }}</h2></a>
                    <p class="">{{ $training->date }}</p>
                    <p class="">{{ $training->time }}</p>
                    <p class="">{{ $training->calorie }}kcal</p>
                    <p class="">{{ $training->goal }}kcal</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $trainings->links()}}
        </div>
    </body>
</html>