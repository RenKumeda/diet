<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        function like(postId) {
            console.log("動いてる？");
        }
        function unlike(postId) {
          $.ajax({
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: `/unlike/${postId}`,
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
</html>