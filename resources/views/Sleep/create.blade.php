<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>sleep</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <form action="/sleeps" method="POST">
           @csrf
           <h2>日時</h2>
        <input type="date" name="sleep[date]"/>
            <h2>睡眠時間</h2>
        <input type="number" name="sleep[time]"/>
            <h2>目標時間</h2>
        <input type="number" name="sleep[goal]"/>
        <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href='/sleeps'>戻る</a>
        </div>
    </body>
</html>