@extends('layouts.app')
 
@section('content')

<div id="card-alert" class="card green lighten-5" style="margin:2%">
  <div id="stat" class="card-content green-text">
      SUCCESS! You have confirmed your maintenance schedule. Redirecting you back. Please wait...
      <script>
        setTimeout(function () {
          window.location.href= '/'; // the redirect goes here
        },3000);
      </script>
  </div>
  </div>


@endsection