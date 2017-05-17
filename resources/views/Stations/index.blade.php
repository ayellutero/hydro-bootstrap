@extends('layouts.app')

@section('pageTitle', 'Reports and Stats')

@section('content')

<div class="row" style="margin:0%; margin-top:0%;">
    <div class="col-lg-12">
        <div class="panel-body">
                <table id="all-stations" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Device ID</th>
                            <th>Location</th>
                            <th>Province</th>
                            <th>Sim Network</th>
                            <th>Last Data</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1 ?>
                    @foreach ($stations as $station)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $station->device_id }}</td>
                            <td>{{ $station->location }}</td>
                            <td>{{ $station->province }}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a data-toggle="tooltip" data-container="body" style="z-index:1000; position:relative" title="Reports" href="station-{{$station->device_id}}-maintenance-history"><i style="margin: .2em .25em .15em" class="fa fa-file-text-o fa-2x " aria-hidden="true"></i></a>&nbsp;
                                <a  class="withTooltip" data-container="body" style="z-index:1000; position:relative" title="Statistics" href="station-{{$station->device_id}}-statistics"><i style="margin: .2em .25em .15em" class="fa fa-bar-chart-o fa-2x " aria-hidden="true"></i></a>
                            </td>
                        </tr>
                     <?php $count++ ?>
                     <!-- View Stats Modal -->
                        <div id="viewStats-<?= $station->id?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Station {{ $station->device_id }}</h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                       
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

@endsection