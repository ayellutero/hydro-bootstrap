@extends('layouts.app')

@section('pageTitle', 'Your Schedules')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>{{ Session::get('success') }}</strong>
</div>
@elseif(Session::has('error'))
<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>{{ Session::get('error') }}</strong>
</div>
@endif


<div class="row" style="margin:0%; margin-top:0%;">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            My Schedules
        </div>
        <div class="panel-body">
            <table id="my-scheds" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Station</th>
                        <th>Scheduled on</th>
                        <th>Confirmed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($scheds as $sched)
                    <tr>
                        <td>{{ $sched->title }}</td>
                        <td>{{ $sched->start_date }}</td>
                        <td>@if($sched->is_confirmed == 1) Yes @else No @endif</td>
                        <td>
                            @if($sched->is_confirmed == 0)
                            {!! Form::model($sched,['method' => 'PATCH','route'=>['calendar.update',$sched->id]]) !!}
                            <button class="btn btn-info" type="submit" style="z-index:1000; position:relative">Confirm Schedule</a>
                            {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection