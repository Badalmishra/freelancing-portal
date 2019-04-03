@extends('layouts.app')
@section("content")
    <link rel="stylesheet" href="css/certain.css">
    <script>
    window.token='{{Auth::user()->api_token}}';
    </script>
            <div id="example" class="w-100 "></div>
    <script src="js/app.js"></script>
 @endsection
