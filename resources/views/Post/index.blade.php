<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>post</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Post</h1>
        <a href="/post/create">create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href="/posts/{{ $post->id }}">
                        <h2 class="title">{{ $post->title }}</h2>
                    </a>
                    <p class="">{{ $post->body }}</p>
                    <form action="/Post/{{ $post->id }}" id="form_{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                </div>
                <div>
                    <button>いいね</button>
                </div>
            @endforeach
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script>
                function like(postId) {
                  $.ajax({
                    headers: {
                      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: `/like/${postId}`,
                    type: "POST",
                  })
                    .done(function (data, status, xhr) {
                      console.log(data);
                    })
                    .fail(function (xhr, status, error) {
                      console.log();
                    });
                }
            </script>
            
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
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