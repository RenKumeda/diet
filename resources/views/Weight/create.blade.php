<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>weight</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <form action="/weights" method="POST">
           @csrf
            <div class="title">
               <h2>日時</h2>
            <input type="date" name="weight[date]"/>
                <h2>現体重</h2>
            <input type="nymber" name="weight[now]"/>
                <h2>目標体重</h2>
            <input type="nymberl" name="weight[goal]"/>
                <h2>目標との差</h2>
            <input type="number" name="weight[difference]"/>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href='/weights'>戻る</a>
        </div>
    </body>
</html>