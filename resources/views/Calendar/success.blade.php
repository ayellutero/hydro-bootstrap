@extends('layouts.app')
 
@section('content')

<div class="alert alert-success ">
    SUCCESS! You have confirmed your maintenance schedule. Redirecting you back. Please wait...
    <script>
      setTimeout(function () {
        window.location.href= '/'; // the redirect goes here
      },3000);
    </script>
</div>


@endsection