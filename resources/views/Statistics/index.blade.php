@extends('layouts.app')

@section('content')
<!-- Count Widgets -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bell fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ App\Notification::where(['is_read' => 0, 'receiver_id' => Auth::user()->employee_id ])->get()->count() }}</div>
                        <div>New Notifications!</div>
                    </div>
                </div>
            </div>
            <a href="notifications">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    @if ( Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Head') ? 'checked' : '' )
        <div class="col-lg-3 col-md-6">
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

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
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

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-calendar-check-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ App\Schedule::get()->count() }}</div>
                        <div>Schedules Created</div>
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

<!-- graph of stations and how many times a report/maintenance was done on them -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-wrench"></i> Stations and Reports</h3>
                <h6>NOTE: Results are based entirely on approved reports.</h6>
            </div>
            <div class="panel-body">
                <div style="float:left; text-align: center">
                    <h4>Most frequently replaced part (overall)</h4>
                    <div id="freq_replaced_part" style="width:400px;height:300px"></div>
                    </div>
                <div style="float:left; text-align: center">
                    <h4>Most common sensor defect (overall)</h4>
                    <div id="most_common_defect" style="width:400px;height:300px"></div>
                </div>
                <div style="float:left; text-align: center" class="hide">
                    <h4>Most frequently defective sensor (overall)</h4>
                    <div id="most_freq_def" style="width:400px;height:300px"></div>
                </div>
                <div class="text-right hide">
                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!---->
<div id="statData" class="hide">
{{$statsData}}
</div>

@endsection