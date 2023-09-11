<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>post</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .liked{
                color:red
            }
        </style>
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
                    <div class="mt-10">
                        @auth
                            @if($post->is_liked_by_auth_user())
                                <i class="text-4xl like-toggle fas fa-heart liked" data-id="{{ $post->id }}"></i>
                                <span class="like-counter">{{ $post->likes->count() }}</span>
                            @else
                                <i class="text-4xl like-toggle fas fa-heart" data-id="{{ $post->id }}"></i>
                                <span class="text-4xl like-counter">{{ $post->likes->count() }}</span>
                            @endif
                        @endauth
                        @guest
                            @if($post->is_liked_by_auth_user())
                                <a class="w-11 block"href="/login"><i class="w-full block like-toggle fas fa-heart liked" data-id="{{ $post->id }}"></i></a>
                                <span class="like-counter">{{ $post->likes->count() }}</span>
                            @else
                                <a class="w-11"href="/login"><i class="w-full like-toggle fas fa-heart" data-id="{{ $post->id }}"></i></a>
                                <span class="like-counter">{{ $post->likes->count() }}</span>
                            @endif
                        @endguest
                    </div>

                </div>
            @endforeach
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            
            
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
            $(function(){
                let like = $('.like-toggle');
                let likePostId;
                like.on('click',function(){
                    let $this = $(this);
                    likePostId = $this.data('id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                        },
                        url:'/like',
                        method: 'POST',
                        data: {
                            'post_id':likePostId
                        }
                })
                    .done(function (data) {
                        $this.toggleClass('liked');
                        $this.next('.like-counter').html(data.likes_count);
                    })
                    .fail(function(){
                        console.log('fail');
                    });
                });
            });
        </script>
    </body>
</html>