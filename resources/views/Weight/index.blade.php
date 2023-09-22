<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>weight</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>weight</h1>
        <a href="/weight/create">create</a>
        <div class="weights">
            @foreach ($weights as $weight)
                <div class="weight">
                    <a href="/weights/{{ $weight->id }}"></a>
                    <p class="">{{ $weight->date }}</p>
                    <p class="">{{ $weight->now }}kg</p>
                    <p class="">{{ $weight->goal }}kg</p>
                    <p class="">{{ $weight->difference }}kg</p>
                    <form action="/Weight/{{ $weight->id }}" id="form_{{ $weight->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $weight->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $weights->links() }}
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
</x-app-layout>