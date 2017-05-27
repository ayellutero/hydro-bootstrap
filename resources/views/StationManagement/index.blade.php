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

<div class="row" style="margin:0%; margin-top:0%;">
    <div class="col-lg-12">
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#stations" data-toggle="tab"><i class="fa fa-flag"></i> Stations</a></li>
                    <li><a href="#parts" data-toggle="tab"><i class="fa fa-gear"></i> Device Parts</a></li>
                    <li><a href="#types" data-toggle="tab"><i class="fa fa-link"></i> Device Type</a></li>
                    <li><a href="#works" data-toggle="tab"><i class="fa fa-wrench"></i> Works to be Done</a></li>
                    <li><a href="#statuses" data-toggle="tab"><i class="fa fa-filter"></i> Status</a></li>
                    <li><a href="#sims" data-toggle="tab"><i class="fa fa-signal"></i> Sim Network</a></li>
                </ul>
            </div>

             <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="stations">
                        <div>
                            <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="New" data-toggle="modal" data-target="#createStation"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
                            New Station
                        </div>
                        <table id="all-station" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Device ID</th>
                                    <th>Type</th>
                                    <th>Location</th>
                                    <th>Province</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($stations as $key => $station)
                                     <tr>
                                         <td>{{ $station->device_id }}</td>
                                         <td>{{ $station->type }}</td>
                                         <td>{{ $station->location }}</td>
                                         <td>{{ $station->province }}</td>
                                         <td>{{ $station->lat }}</td>
                                         <td>{{ $station->lng }}</td>
                                         <td>{{ $station->status }}</td>
                                         <td>
                                             <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="View" data-toggle="modal" data-target="#viewStation-<?= $station->id?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                             <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Edit" data-toggle="modal" data-target="#editStation-<?= $station->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                             {!! Form::open(['method' => 'DELETE','route' => ['stationManagement.destroy', $station->id],'style'=>'display:inline']) !!}
                                                <button class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Delete" type="submit">
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
                                                {!! Form::close() !!}
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
                                                    {!! Form::model($station, ['method' => 'POST', 'route' => ['stationManagement.update', $station->id]]) !!}
                                                    @include('StationManagement.edit')
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
                            {!! Form::text('part', null, ['required' => 'true', 'autofocus' => 'autofocus']) !!}
                            <button class="btn btn-success" type="submit" name="action"><i class="fa fa-plus" aria-hidden="true"></i> Part</button>
                        {!! Form::close() !!}

                        <table id="all-parts" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1 ?>
                                    @foreach ($parts as $key => $part)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $part->part }}</td>
                                            <td>{{ $part->created_at }}</td>
                                            <td>{{ $part->updated_at }}</td>
                                            <td>
                                                <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Edit" data-toggle="modal" data-target="#editPart-<?= $part->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['partManagement.destroy', $part->id],'style'=>'display:inline']) !!}
                                                    <button class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Delete" type="submit">
                                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                                    </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    <?php $count++ ?>

                                        <!-- Edit Part Modal -->
                                        <div id="editPart-<?= $part->id?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Part</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($part, ['method' => 'POST','route' => ['partManagement.update', $part->id]]) !!}
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Name:</strong>
                                                            {!! Form::text('part', $part->part, array('placeholder' => 'Part','class' => 'form-control', 'autofocus'=>'autofocus')) !!}
                                                        </div>
                                                    </div>
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
                    
                    <div class="tab-pane fade" id="types">
                        {!! Form::open(array('route' => 'typeManagement.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                            {!! Form::text('type', null, ['required' => 'true', 'autofocus' => 'autofocus']) !!}
                            <button class="btn btn-success" type="submit" name="action"><i class="fa fa-plus" aria-hidden="true"></i> Type</button>
                        {!! Form::close() !!}

                         <table id="all-type" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1 ?>
                                @foreach ($types as $key => $type)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $type->type }}</td>
                                        <td>{{ $type->created_at }}</td>
                                        <td>{{ $type->updated_at }}</td>
                                        <td>
                                            <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Edit" data-toggle="modal" data-target="#editType-<?= $type->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['typeManagement.destroy', $type->id],'style'=>'display:inline']) !!}
                                                <button class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Delete" type="submit">
                                                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                <?php $count++ ?>

                                    <!-- Edit Type Modal -->
                                    <div id="editType-<?= $type->id?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Type</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($type, ['method' => 'POST','route' => ['typeManagement.update', $type->id]]) !!}
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Name:</strong>
                                                            {!! Form::text('type', $type->type, array('placeholder' => 'Type','autofocus' => 'Autofocus','class' => 'form-control')) !!}
                                                        </div>
                                                    </div>
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

                    <div class="tab-pane fade" id="works">
                        {!! Form::open(array('route' => 'workManagement.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                            {!! Form::text('work', null,['required' => 'true', 'autofocus' => 'autofocus']) !!}
                            <button class="btn btn-success" type="submit" name="action"><i class="fa fa-plus" aria-hidden="true"></i> Work</button>
                        {!! Form::close() !!}
                        <table id="all-works" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1 ?>
                                @foreach ($works as $key => $work)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $work->work }}</td>
                                        <td>{{ $work->created_at }}</td>
                                        <td>{{ $work->updated_at }}</td>
                                        <td>
                                            <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Edit" data-toggle="modal" data-target="#editWork-<?= $work->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['workManagement.destroy', $work->id],'style'=>'display:inline']) !!}
                                                <button class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Delete" type="submit">
                                                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                <?php $count++ ?>
                                    <!-- Edit Work Modal -->
                                    <div id="editWork-<?= $work->id?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Work</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($work, ['method' => 'POST','route' => ['workManagement.update', $work->id]]) !!}
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Name:</strong>
                                                            {!! Form::text('work', $work->work, array('placeholder' => 'Work','autofocus' => 'autofocus','class' => 'form-control')) !!}
                                                        </div>
                                                    </div>
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
                    
                    <div class="tab-pane fade" id="statuses">
                        {!! Form::open(array('route' => 'statusManagement.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                            {!! Form::text('status', null, ['required' => 'true', 'autofocus' => 'autofocus']) !!}
                            <button class="btn btn-success" type="submit" name="action"><i class="fa fa-plus" aria-hidden="true"></i> Status</button>
                        {!! Form::close() !!}

                        <table id="all-statuses" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1 ?>
                                    @foreach ($statuses as $key => $status)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $status->status }}</td>
                                            <td>{{ $status->created_at }}</td>
                                            <td>{{ $status->updated_at }}</td>
                                            <td>
                                                <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Edit" data-toggle="modal" data-target="#editStatus-<?= $status->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['statusManagement.destroy', $status->id],'style'=>'display:inline']) !!}
                                                <button class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Delete" type="submit">
                                                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                                </button>
                                            {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        <?php $count++ ?>

                                        <!-- Edit Status Modal -->
                                        <div id="editStatus-<?= $status->id?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Status</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($status, ['method' => 'POST','route' => ['statusManagement.update', $status->id]]) !!}
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Name:</strong>
                                                            {!! Form::text('status', $status->status, array('placeholder' => 'Status','class' => 'form-control', 'autofocus'=>'autofocus')) !!}
                                                        </div>
                                                    </div>
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
                    
                    <div class="tab-pane fade" id="sims">
                        {!! Form::open(array('route' => 'simManagement.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                            {!! Form::text('sim', null, ['required' => 'true', 'autofocus' => 'autofocus']) !!}
                            <button class="btn btn-success" type="submit" name="action"><i class="fa fa-plus" aria-hidden="true"></i> Sim Network</button>
                        {!! Form::close() !!}

                        <table id="all-sim" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1 ?>
                                    @foreach ($sims as $key => $sim)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $sim->sim }}</td>
                                            <td>{{ $sim->created_at }}</td>
                                            <td>{{ $sim->updated_at }}</td>
                                            <td>
                                                <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Edit" data-toggle="modal" data-target="#editSim-<?= $sim->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['simManagement.destroy', $sim->id],'style'=>'display:inline']) !!}
                                                    <button class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Delete" type="submit">
                                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                                    </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        <?php $count++ ?>

                                        <!-- Edit Sim Modal -->
                                        <div id="editSim-<?= $sim->id?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Sim</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($sim, ['method' => 'POST','route' => ['simManagement.update', $sim->id]]) !!}
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Name:</strong>
                                                            {!! Form::text('sim', $sim->sim, array('placeholder' => 'Sim','class' => 'form-control', 'autofocus'=>'autofocus')) !!}
                                                        </div>
                                                    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection