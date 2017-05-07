@extends('layouts.app')
 
@section('content')

<div class="alert alert-danger ">
    ERROR! The schedule has either been deleted or confirmed. Redirecting you back. Please wait...
    <script>
      setTimeout(function () {
        window.location.href= '/'; // the redirect goes here
      },3000);
    </script>

</div>


@endsection