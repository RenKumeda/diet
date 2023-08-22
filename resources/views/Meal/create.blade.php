<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>meal</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <form action="/meals" method="POST">
           @csrf
            <div class="title">
               <h1>食事内容</h1>
               <input type="text" name="meal[meal]" placeholder="食事内容"/>
            </div>
                <h2>日時</h2>
            <input type="date" name="meal[date]"/>
                <h2>いつ</h2>
                <p>朝</p>
            <input type="radio" value=1 name="meal[time]"/>
                <p>昼</p>
            <input type="radio" value=2 name="meal[time]"/>
                <p>夜</p>
            <input type="radio" value=3 name="meal[time]"/>
                <h2>カロリー</h2>
            <input type="number" name="meal[calorie]"/>
                <h2>目標摂取量</h2>
            <input type="number" name="meal[goal]"/>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/meals">戻る</a>
        </div>
    </body>
</html>