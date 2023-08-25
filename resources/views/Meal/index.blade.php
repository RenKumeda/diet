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
        <a href="/meal/create">create</a>
        <div class='meals'>
            @foreach ($meals as $meal)
                <div class='meal'>
                    <a href="/meals/{{ $meal->id }}"><h2 class="title">{{ $meal->meal }}</h2></a>
                    <p class="">{{ $meal->date }}</p>
                    @if($meal->time == 1)
                        <p>朝</p>
                    @elseif($meal->time == 2)
                        <p>昼</p>
                    @elseif($meal->time == 3)
                        <p>夜</p>
                    @endif
                    <p class="">{{ $meal->calorie }}kcal</p>
                    <p class="">{{ $meal->goal }}kcal</p>
                    <form action="/Meal/{{ $meal->id }}" id="form_{{ $meal->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $meal->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $meals->links()}}
        </div>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>