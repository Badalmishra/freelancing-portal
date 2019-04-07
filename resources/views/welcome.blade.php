@extends('layouts.app')
@section("content")
    <link rel="stylesheet" href="css/certain.css">
    <script>
    window.token='{{Auth::user()->api_token}}';
    </script>
            <div id="example" class="lay "></div>
    <script src="js/app.js"></script>
    <script>
        ScrollReveal({ reset: true });
        ScrollReveal().reveal('.punchline'  );

    </script>
 @endsection
