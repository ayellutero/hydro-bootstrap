@extends('layouts.app')

@section('pageTitle', 'Dashboard')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js"></script>

<!-- Google Map -->
<div id="mymap" style="width:100%;border:1px solid red;height:400px;margin-bottom: 10px"></div>

<!-- Count Widgets -->
<div class="row" style="margin:0%; margin-top:0%;">
    @if ( Auth::user()->hasRole('Admin') )
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-exclamation-triangle fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ App\Report::where(['if_approved' => 0])->get()->count() }}</div>
                            <div>Pending Reports</div>
                        </div>
                    </div>
                </div>
                <a href="viewPendingReports">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if ( Auth::user()->hasRole('Admin') )
    <div class="col-lg-4 col-md-6">
    @else
    <div class="col-lg-6 col-md-6">
    @endif
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check-square-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ App\Report::where(['if_approved' => 1])->get()->count() }}</div>
                        <div>Approved Reports</div>
                    </div>
                </div>
            </div>
            <a href="viewMaintenanceReports">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    @if ( Auth::user()->hasRole('Admin') )
    <div class="col-lg-4 col-md-6">
    @else
    <div class="col-lg-6 col-md-6">
    @endif
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-calendar-plus-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ App\Schedule::get()->count() }}</div>
                        <div>Schedules</div>
                    </div>
                </div>
            </div>
            <a href="calendar">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Graph of stations and number of times a report/maintenance was performed on them -->
<div class="row" style="margin:0%; margin-top:0%;">
    <div class="col-xs-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-wrench"></i> Stations and Reports *</h3>
            </div>
            <div class="panel-body">
                <div class="col-sm-6" style="text-align: center;">
                    <h4>Frequency of Parts Replaced</h4>
                     <div id='freq_replaced_part' style="width:500px;height:350px"></div>
                    <br>
                </div>
                <div class="col-sm-6" style="text-align: center;">
                    <h4>Frequency of Work Done</h4>
                    <div id='most_common_defect' style="width:500px;height:350px"></div>
                    <br>
                </div>
            </div>
        </div>
        <h6 class="pull-right">*Results are based entirely on approved reports.</h6>
    </div>
</div>

<!---->
<div id="all-stat-data" class="hide">
    {{ $statsData }}
</div>

<script type="text/javascript" src="{{ asset('dist/js/gmaps.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var locations = <?php print_r(json_encode($locations)) ?>;
        
        var infoWindow = new google.maps.InfoWindow({
            content: 'Content goes here..'
        });

        var mymap = new GMaps({
            el: '#mymap',
            lat: 14.16,
            lng: 121.23,
            zoom:8
        });

        $.each( locations, function( index, value ){
            mymap.addMarker({
                lat: value.lat,
                lng: value.lng,
                title: value.location + ' ' + value.province,
                infoWindow: {
                    content:'<b>Device ID: </b>' + value.device_id + '</br><b>Location: </b>' 
                            + value.location + ' ' + value.province 
                            + '<br><b>Latitude: </b>' + value.lat + '<b> Longitude: </b>' + value.lng + '<br><b>Status: </b>' + value.status + '<br><b>Elevation: </b>' + value.elevation
                            + '<br><b>Type: </b>' + value.type + '<br>'
                },
                click: function(e) {
                    infoWindow.open();
                }
            });
        });
    });
</script>
@endsection