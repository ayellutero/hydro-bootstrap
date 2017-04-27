@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"> My Reports </div>

            <div class="panel-body">
                <table id="all-reports" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Station Name</th>
                            <th>Location</th>
                            <th>Sensor Type</th>
                            <th>Date Assessed</th>
                            <th>Conducted By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $reports = DB::table('reports')->get(); ?>
                    @foreach ($reports as $report)
                        @if ($report->if_approved == '1')
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->station_name }}</td>
                            <td>{{ $report->location }}</td>
                            <td>{{ $report->sensor_type }}</td>
                            <td>{{ $report->date_assessed }}</td>
                            <td>{{ $report->conducted_by }}</td>
                            <td>
                                <a class="btn" data-toggle="modal" data-target="#viewReport-<?= $report->id?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endif

                        <!-- View Report Modal -->
                        <div id="viewReport-<?= $report->id?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Report #{{ $report->id }}</h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                        @include('Reports/display_report')
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection