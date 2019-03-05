@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/certain.css">
    <script>
    window.token='{{Auth::user()->api_token}}';
    </script>
            <div id="freehome" class="w-100 px-2"></div>
    <script src="js/freelancerapp.js"></script>
@endsection