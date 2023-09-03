<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>post</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content_post">
                <h3>本文</h3>
                <p class="body">{{ $post->body }}</p>
            </div>
        </div>
        <div class="comment-area">
            @foreach($post->comments as $comment)
                <p>{{ $comment->user->name }}</p>
                <p>{{ $comment->body }}</p>
            @endforeach
        </div>
        <form action={{"/comments/".$post->id }} method='POST'>
            @csrf
            <input type="text" name="comment[body]" placeholder="コメントを記入してください。">
            <input type="submit" value="送信">
        </form>
        <div class="footer">
            <a href="/posts">戻る</a>
        </div>
    </body>
</html>