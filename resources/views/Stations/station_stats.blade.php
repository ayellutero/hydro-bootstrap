<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-toggle/css/bootstrap-toggle.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/sb-admin.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="images/masthead.png" alt="DOST logo"></a>
            </div>
            <!-- /.navbar-header -->

            @if (Route::has('login'))
                <ul class="nav navbar-right top-nav">
                    @if (Auth::check())
                    <!-- Notifs -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="badge badge-pill badge-danger"> 
                                @if ( Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Head') ? 'checked' : '' )
                                    {{ App\Report::where(['if_approved' => 0])->get()->count() + App\Notification::where(['is_read' => 0, 'receiver_id' => Auth::user()->employee_id ])->get()->count()  }}
                                @else
                                    {{ App\Notification::where(['is_read' => 0, 'receiver_id' => Auth::user()->employee_id ])->get()->count() }}
                                @endif
                            </span> Notifications <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu message-dropdown">
                            @if ( Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Head') ? 'checked' : '' )
                            <li class="message-preview">
                                <a href="viewPendingReports"><span class="badge badge-pill badge-danger">{{ App\Report::where(['if_approved' => 0])->get()->count() }}</span> Pending Reports</a>
                            </li>
                            @endif
                            <li class="message-preview">
                                <?php $notifications = DB::table('notifications')->get(); ?>
                                {!! Form::model($notifications,['method' => 'PATCH','route'=>['notifications.update', Auth::user()->employee_id]]) !!}
                                    <div class="hide">
                                        {!! Form::text('is_read', 1,['class'=>'form-control', 'readonly'=>'true' ]) !!}
                                    </div>
                                    <button href="#" class="btn btn-flat" style="background:white"><span class="badge badge-pill badge-danger"> {{ App\Notification::where(['is_read' => 0, 'receiver_id' => Auth::user()->employee_id ])->get()->count() }}</span> All Notifications</button>
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </li>

                    <!-- User Profile -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/userProfile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    
                     @endif
                </ul>
            @endif
            <!-- /.navbar-top-links -->

            <!-- Sidebar Menu Items -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    @if (Auth::check())
                        <li>
                            <a href="/"><i class="fa fa-dashboard fa-fw" aria-hidden="true"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#stationmgt"><i class="fa fa-th-list fa-fw"></i> Station Management <i class="fa fa-caret-down"></i></a>
                            <ul id="stationmgt" class="collapse">
                                <li>
                                    <a href="stationManagement"><i class="fa fa-flag fa-fw" aria-hidden="true"></i> Stations and Devices</a>
                                </li>
                                <li>
                                    <a href="maintenanceHistory"><i class="fa fa-file-o fa-fw" aria-hidden="true"></i> Reports and Stats</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-wrench fa-fw"></i> Maintenance Reports <i class="fa fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="addMaintenanceReport"><i class="fa fa-plus-square-o fa-fw" aria-hidden="true"></i> Add Report</a>
                                </li>
                                <li>
                                    <a href="viewMyMaintenanceReports"><i class="fa fa-file-o fa-fw" aria-hidden="true"></i> View My Reports</a>
                                </li>
                                <li>
                                    <a href="viewMaintenanceReports"><i class="fa fa-files-o fa-fw" aria-hidden="true"></i> View All Reports</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="calendar"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i> Calendar</a>
                        </li>                       
                        
                            @if ( Auth::user()->hasRole('Admin'))
                                <li>
                                    <a href="userCRUD"><i class="fa fa-users fa-fw"></i> Users</a>
                                </li>

                                <li><a class="waves-effect waves-cyan" href="user_activity"><i class="#"></i> User Activity</a>
                            @endif
                            
                    @else
                    <li>
                        <a href="/login" class=""><i class="fa fa-sign-in fa-fw"></i>Log in</a>
                    </li>
                        </li>
                        
                        @if ( Auth::user()->hasRole('Admin'))
                            <li>
                                <a href="userCRUD"><i class="fa fa-users fa-fw"></i> Users</a>
                            </li>
                            <li>
                                <a class="waves-effect waves-cyan" href="user_activity"><i class="#"></i> User Activity</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        
        <div id="page-wrapper">
            <div class="panel-heading"><a href="maintenanceHistory"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Stations</a></div>

            <!-- graph of stations and how many times a report/maintenance was done on them -->
            <div class="row" style="margin:0%; margin-top:0%;">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Device ID: {{$dev_id}} *</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-6" style="text-align: center;">
                                <h4>Most frequently replaced part</h4>
                                <div id="sen_frp" style="margin-left: 15%;width:350px;height:350px"></div>
                                <br>
                                <div id="flot-memo1">&nbsp;</div>
                            </div>
                            <div class="col-sm-6" style="text-align: center;">
                                <h4>Most common sensor defect</h4>
                                <div id="sen_mcd" style="margin-left: 15%;width:350px;height:350px"></div>   
                                <br>
                                <div id="flot-memo2">&nbsp;</div>
                            </div>
                            <div class="text-right hide">
                                <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <h6 class="pull-right">*Results are based entirely on approved reports.</h6>
                </div>
                
            </div>

            <!---->
            <div id="senStatData" class="hide">
            {{$statsData}}
            </div>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') }}"></script>


    <!-- FLOT Script -->
    <script type="text/javascript" src="{{ asset('vendor/flot/jquery.flot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/flot/jquery.flot.categories.js') }}"></script>
    
    <script> // MAIN Script
   
   
        $(document).ready(function() {
            var senStatData = $('#senStatData').html();  
            var senDataSet =  JSON.parse(senStatData);

            $.plot('#sen_frp', [senDataSet[0]], {
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.7,
                        align: "center"
                    }
                },
                xaxis: {
                    mode: "categories",
                    tickLength: 0
                },
                yaxis: {
                    tickDecimals: 0
                }
            });  // end of chart: frequently replaced part  
    

            $.plot('#sen_mcd', [senDataSet[1]], {
               series: {
                    bars: {
                        show: true,
                        barWidth: 0.7,
                        align: "center"
                    }
                },
                xaxis: {
                    mode: "categories",
                    tickLength: 0
                },
                yaxis: {
                    tickDecimals: 0
                }
            });  // end of chart: frequently replaced part  


        })//main

        function pieHover1(event, pos, obj) {
            if (!obj)
                return;
        
            percent = parseFloat(obj.series.percent).toFixed(2);
            $("#flot-memo1").html('<span style="font-weight: bold;">'+obj.series.label+': '+ obj.series.data[0][1] +' ('+percent+'%)</span>');
        }
        function pieHover2(event, pos, obj) {
            if (!obj)
                return;
        
            percent = parseFloat(obj.series.percent).toFixed(2);
            $("#flot-memo2").html('<span style="font-weight: bold;">'+obj.series.label+': '+ obj.series.data[0][1] +' ('+percent+'%)</span>');
        }

    </script>
