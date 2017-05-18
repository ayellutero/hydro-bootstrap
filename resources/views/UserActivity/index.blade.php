@extends('layouts.app')

@section('pageTitle', 'User Activity')

@section('content')
<div class="row" style="margin:0%; margin-top:0%;">
    <div class="col-lg-12">
        <div class="panel-body">
            <table id="user-activity" class="table table-striped table-bordered desc" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Activity</th>
                    </tr>
                </thead>
                <tbody  class="sorting_desc">
                    <?php $user_activity = DB::table('user_activities')->get(); ?>
                    @foreach ($user_activity as $key => $activity)
                        <tr class="sorting_desc">
                            <td>{{ \Carbon\Carbon::parse($activity->sent_at_date)->format('M d, Y') }} {{ \Carbon\Carbon::parse($activity->sent_at_time)->format('h:i A')  }}</td>
                            <td>{{ $activity->empID }}</td>
                            <td>{{ $activity->employee_name }}</td>
                            <td>{{ $activity->employee_position }}</td>
                            <td>{{ $activity->activity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection