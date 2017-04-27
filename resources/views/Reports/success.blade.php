@extends('layouts.app')
 
@section('content')

<div id="card-alert" class="card green lighten-5" style="margin:2%">
                      <div id="stat" class="card-content green-text">
                        SUCCESS! 
                        @if(strcmp(Session::get('message'), 'ADD') == 0)
                          Your report has been submitted for confirmation.
                          <script>
                            setTimeout(function () {
                              window.location.href= 'viewMaintenanceReports'; // the redirect goes here
                            },2500);
                          </script>
                        @elseif(strcmp(Session::get('message'), 'EDIT') == 0)
                          Your report has been edited.
                          <script>
                            setTimeout(function () {
                              window.location.href= 'viewMyMaintenanceReports'; // the redirect goes here
                            },2500);
                          </script>
                        @endif
                        Redirecting you back. Please wait...
                      </div>
                    </div>


@endsection