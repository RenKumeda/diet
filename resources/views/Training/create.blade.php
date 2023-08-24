<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>training</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <form action="/trainings" method="POST">
            @csrf
            <div class="title">
                <h1>運動内容</h1>
                <input type="text" name="training[training]" placeholder="運動内容"/>
            </div>
                <h2>日時</h2>
            <input type="date" name="training[date]"/>
                <h2>運動時間</h2>
            <input type="time" name="training[time]"/>
                <h2>消費カロリー</h2>
            <input type="number" name="training[calorie]"/>
                <h2>目標消費カロリー</h2>
            <input type="number" name="training[goal]"/>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/trainings">戻る</a>
        </div>
    </body>
</html>