@extends('layouts.app')

@section('pageTitle', 'Approved Reports')

@section('content')
<div class="row" style="margin:0%; margin-top:0%;">
    <div class="col-lg-12">
            <div class="panel-body">
                <table id="all-reports" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Initial Findings</th>
                            <th>Onsite Date</th>
                            <th>Part Replaced/Installed</th>
                            <th>Work Done</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $reports = DB::table('reports')->get(); ?>
                    @foreach ($reports as $report)
                        @if ($report->if_approved == '1')
                        <tr>
                            <td>{{ $report->station_id }}</td>
                            <td>{{ $report->station_name.', '.$report->location }}</td>
                            <td>{{ $report->sensor_type }}</td>
                            <td>{{ $report->status }}</td>
                            <td>{{ $report->init_findings }}</td>
                            <td>{{ $report->onsite_date }}</td>
                            <td>{{ $report->part_installed }}</td>
                            <td>{{ $report->work_done }}</td>
                            <td>
                                <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" data-toggle="modal" title="View" data-target="#viewReport-<?= $report->id?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Download PDF" href="{{ route('pdfview',['download'=>'pdf', 'data'=>$report->id]) }}"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a>
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
                                        <a class="btn btn-info" href="{{ route('pdfview',['download'=>'pdf', 'data'=>$report->id]) }}">Download PDF</a>
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

@endsection