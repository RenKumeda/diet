<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>User</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    @foreach($users as $user)
    <div>
      <div>{{$user->name}}</div>
      <button>フォロー</button>
    </div>
    @endforeach
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
      function follow(userId) {
        $.ajax({
          headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
          url: `/follow/${userId}`,
          type: "POST",
        })
          .done((data) => {
            console.log(data);
          })
          .fail((data) => {
            console.log(data);
          });
      }
    </script>
    
    </body>
</html>