@extends('layouts.app')
 
@section('content')


<div class="row">
    <div id="admin" class="col s12">
        <div class="card material-table">
            <div class="table-header">
            <span class="table-title">User Activity</span>
                <div class="actions">
                    <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
                </div>
            </div>

            <table id="datatable">
                <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Activity</th>
                    </tr>
                </thead>
                <tbody>
                <?php $user_activity = DB::table('user_activities')->get(); ?>
                    @foreach ($user_activity as $key => $activity)
                    <tr>
                        <td>{{ $activity->sent_at_time }} {{ $activity->sent_at_date }}</td>
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
@endsection