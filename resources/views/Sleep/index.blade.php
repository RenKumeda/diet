<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>sleep</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Sleep</h1>
        <a href="/sleep/create">create</a>
        <div class="sleeps">
            @foreach ($sleeps as $sleep)
                <div class="sleep">
                    <a href="/sleep/{{ $sleep->id }}"></a>
                    <p class="">{{ $sleep->date }}</p>
                    <p class="">{{ $sleep->time }}h</p>
                    <p class="">{{ $sleep->goal }}h</p>
                    <form action="/Sleep/{{ $sleep->id }}" id="form_{{ $sleep->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $sleep->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $sleeps->links() }}
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