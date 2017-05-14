@extends('layouts.app')

@section('pageTitle', 'Stations and Devices')

@section('content')
<style>
    .panel.with-nav-tabs .panel-heading{
        padding: 5px 5px 0 5px;
    }
    .panel.with-nav-tabs .nav-tabs{
        border-bottom: none;
    }
    .panel.with-nav-tabs .nav-justified{
        margin-bottom: -1px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#stations" data-toggle="tab"><i class="fa fa-flag"></i> Stations</a></li>
                        <li><a href="#parts" data-toggle="tab"><i class="fa fa-gear"></i> Device Parts</a></li>
                        <li><a href="#works" data-toggle="tab"><i class="fa fa-wrench"></i> Works to be Done</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="stations">
                            <div>
                                <a class="btn" data-toggle="modal" data-target="#createStation"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
                                New Station
                            </div>
                            <table id="all-station" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Device ID</th>
                                        <th>Location</th>
                                        <th>Province</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stations as $key => $station)
                                        <tr>
                                            <td>{{ $station->device_id }}</td>
                                            <td>{{ $station->location }}</td>
                                            <td>{{ $station->province }}</td>
                                            <td>{{ $station->lat }}</td>
                                            <td>{{ $station->lng }}</td>
                                            <td>{{ $station->type }}</td>
                                            <td>
                                                <a class="btn" data-toggle="modal" data-target="#viewStation-<?= $station->id?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                                <a class="btn" data-toggle="modal" data-target="#editStation-<?= $station->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['stationManagement.destroy', $station->id],'style'=>'display:inline']) !!}
                                                    <button class="btn" type="submit">
                                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                                    </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>

                                        <!-- Create Station Modal -->
                                        <div id="createStation" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">New Station</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::open(array('route' => 'stationManagement.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                                                    @include('StationManagement.create')
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success" type="submit" name="action">Create Station</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                                                    {{ Form::close() }}
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- View Station Modal -->
                                        <div id="viewStation-<?= $station->id?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Station {{ $station->device_id }}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    @include('StationManagement.show')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Edit Station Modal -->
                                        <div id="editStation-<?= $station->id?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Station</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($station, ['method' => 'POST','route' => ['stationManagement.update', $station->id]]) !!}
                                                    @include('stationManagement.edit')                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success" type="submit" name="action">Save Changes</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                                                    {{ Form::close() }}
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="tab-pane fade" id="parts">
                            {!! Form::open(array('route' => 'partManagement.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                                {!! Form::text('part', null,['required' => 'true']) !!}
                                <button class="btn btn-success" type="submit" name="action">Add Part</button>
                            {!! Form::close() !!}
                            <table id="all-parts" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parts as $key => $part)
                                        <tr>
                                            <td>{{ $part->part }}</td>
                                            <td>{{ $part->created_at }}</td>
                                            <td>
                                                <a class="btn" data-toggle="modal" data-target="#viewPart-<?= $part->id?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                                <a class="btn" data-toggle="modal" data-target="#editPart-<?= $part->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="works">
                            <table id="all-works" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($works as $key => $work)
                                    <tr>
                                        <td>{{ $part->part }}</td>
                                        <td>{{ $part->created_at }}</td>
                                        <td>
                                            <a class="btn" data-toggle="modal" data-target="#viewPart-<?= $part->id?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                            <a class="btn" data-toggle="modal" data-target="#editPart-<?= $part->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection