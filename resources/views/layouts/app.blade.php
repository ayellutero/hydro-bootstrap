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

    <!-- Calendar CSS -->    
    <link href="{{ asset('vendor/fullcalendar/css/fullcalendar.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

    <!--FLOT-->
    <!--<link href="{{ asset('vendor/flot/excanvas.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">-->
    
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
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
                    <li>
                        <a href="/"><i class="fa fa-home fa-fw" aria-hidden="true"></i> Home</a>
                    </li>
                    @if (Auth::check())
                        <li>
                            <a href="calendar"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i> Calendar</a>
                        </li>
                        <li>
                            <a href="statistics"><i class="fa fa-bar-chart-o fa-fw"></i> Statistics</a>
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
                    @endif
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        
        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

    <!-- Calendar Script -->
    <script type="text/javascript" src="{{ asset('vendor/fullcalendar/lib/jquery-ui.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/fullcalendar/js/fullcalendar.min.js') }}"></script>
    <!--<script type="text/javascript" src="{{ asset('vendor/fullcalendar/fullcalendar-script.js') }}"></script>-->

    <!-- FLOT Script -->
    <script type="text/javascript" src="{{ asset('vendor/flot/jquery.flot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/flot/jquery.flot.pie.js') }}"></script>
    
    <script> // MAIN Script
   
   
        $(document).ready(function() {
            var panels = $('.user-infos');
            var panelsButton = $('.dropdown-user');
            panels.hide();

            //Click dropdown
            panelsButton.click(function() {
                //get data-for attribute
                var dataFor = $(this).attr('data-for');
                var idFor = $(dataFor);

                //current button
                var currentButton = $(this);
                idFor.slideToggle(400, function() {
                    //Completed slidetoggle
                    if(idFor.is(':visible'))
                    {
                        currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
                    }
                    else
                    {
                        currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
                    }
                })
            });

        
      
            // hide PW field button
            // $('#change_pw').hide();
            /*$('#pw_btn').on('click', function (event) {
                $('#pw_btn').hide();
                $('#change_pw').show();
            });
            $('#cancel-button').on('click', function (event) {
                $('#pw_btn').show();
                $('#change_pw').hide();
            });*/

            // Datatable JS
            $('#all-users').DataTable();
            var tableMyReps = $('#my-reports').DataTable({
                order: [[ 4, "desc" ]]
            });
            var tableAllReps = $('#all-reports').DataTable({
                order: [[ 4, "desc" ]]
            });
            var tablePenReps = $('#pending-reports').DataTable({
                order: [[ 4, "desc" ]]
            });
            var tableUserAct = $('#user-activity').DataTable({
                order: [[ 0, "desc" ]]
            });
            var tableAllNotifs = $('#all-notifs').dataTable({
                order: [[ 0, "desc"]]
            });

            //tooltip
            $('[data-toggle="tooltip"]').tooltip(); 

            // customize fullcalendar
            $('#calendar').fullCalendar({
                height: 500,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                eventLimit: true, 
                editable: false,
                eventSources: ['calendarEvents'], // gets all events from database
                eventClick: function(calEvent, jsEvent, view) {
                    var fin;
                    if(calEvent.is_confirmed == 0) fin = "No"
                    else fin = "Yes"                    
                    
                    var side = $('#eventTitle');
                    side.html("<strong>Station: </strong>" + calEvent.title + "&nbsp;&nbsp;<a data-toggle='modal' data-target='#confirmDelete'><i class='fa fa-trash' aria-hidden='true'></i></a>");
                     
                    side = $('#eventID');
                    side.html("<label>eventID:</label><input name='eventIDinput' type=text value='" + calEvent.id + "' class='form-control' readonly></input>")

                    side = $('#eventDate');
                    side.html("<label>Date:</label><input type=text value='" + moment(calEvent.start).format('MMM DD, YYYY') + "' class='form-control' readonly></input>")

                    side = $('#eventStaff');
                    side.html("<label>Staff-in-charge:</label><input type=text value='" + calEvent.staff + "' class='form-control' readonly></input>")
                    
                    side = $('#eventEmail');
                    side.html("<label>Email:</label><input type=text value='" + calEvent.email + "' class='form-control' readonly onclick='this.select()'></input>")
                    
                    side = $('#eventPerformed');
                    side.html("<label>Performed:</label><input type=text value='" + fin + "' class='form-control' readonly></input>")
                    
                }
            });  // end fullcalendar

            // FLOT pie charts

            var repPart = $('#freq_repPart').html();  
            var dataSet =  JSON.parse(repPart) ;
    
            $.plot('#freq_replaced_part', dataSet[0], {
                series: {
                    pie: {
                        innerRadius: 0.4,
                        show: true,                
                        label: {
                            show:true,
                            radius: 0.8,
                            formatter: function (label, series) {                
                                return '<div style="border:1px solid grey;font-size:8pt;text-align:center;padding:5px;color:white;">' +
                                label + ' : ' +
                                Math.round(series.percent) +
                                '%</div>';
                            },
                            background: {
                                opacity: 0.8,
                                color: '#000'
                            }
                        }
                    }
                }
                // grid: {
                //     hoverable: true,
                //     clickable: true
                // }
            });  // end of chart: frequently replaced part  

            $.plot('#most_common_defect', dataSet[1], {
                series: {
                    pie: {
                        innerRadius: 0.4,
                        show: true,                
                        label: {
                            show:true,
                            radius: 0.8,
                            formatter: function (label, series) {                
                                return '<div style="border:1px solid grey;font-size:8pt;text-align:center;padding:5px;color:white;">' +
                                label + ' : ' +
                                Math.round(series.percent) +
                                '%</div>';
                            },
                            background: {
                                opacity: 0.8,
                                color: '#000'
                            }
                        }
                    }
                }
                // grid: {
                //     hoverable: true,
                //     clickable: true
                // }
            }); // end of chart: most common defect

            // $.plot('#most_freq_def', dataSet, {
            //     series: {
            //         pie: {
            //             innerRadius: 0.4,
            //             show: true,                
            //             label: {
            //                 show:true,
            //                 radius: 0.8,
            //                 formatter: function (label, series) {                
            //                     return '<div style="border:1px solid grey;font-size:8pt;text-align:center;padding:5px;color:white;">' +
            //                     label + ' : ' +
            //                     Math.round(series.percent) +
            //                     '%</div>';
            //                 },
            //                 background: {
            //                     opacity: 0.8,
            //                     color: '#000'
            //                 }
            //             }
            //         }
            //     }
            //     // grid: {
            //     //     hoverable: true,
            //     //     clickable: true
            //     // }
            // }); // end of chart: most common defect   

           
     });// end of main
    </script>
</body>

</html>
