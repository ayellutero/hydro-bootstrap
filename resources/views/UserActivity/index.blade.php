@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"> User Activity </div>

            <div class="panel-body">
                <table id="user-activity" class="table table-striped table-bordered desc" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th>Timestamp</th>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Activity</th>
                    </tr>
                    </thead>
                    <tbody  class="sorting_desc">
                    <?php $user_activity = DB::table('user_activities')->get(); ?>
                        @foreach ($user_activity as $key => $activity)
                        <tr  class="sorting_desc">
                            <td>{{ \Carbon\Carbon::parse($activity->sent_at_date)->format('M d, Y') }} {{ \Carbon\Carbon::parse($activity->sent_at_time)->format('h:i A')  }}</td>
                            <td>{{ $activity->employee_id }}</td>
                            <td>{{ $activity->employee_name }}</td>
                            <td>{{ $activity->position }}</td>
                            <td>{{ $activity->activity }}</td>          
                        </tr>
                        @endforeach
                    </tbody>   
                </table>
            </div>
        </div>
    </div>
</div>
@endsection