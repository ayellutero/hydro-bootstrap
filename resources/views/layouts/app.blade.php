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

    <title>@yield('pageTitle') | {{ config('app.name') }}</title>

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
    
    <!-- Bootstrap select CSS -->    
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

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

    <!-- Styles -->
    <style>
        .modal-body {
            overflow-y: auto;
            max-height: 70vh;
        }
        .modal {
            text-align: center;
            padding: 0!important;
        }

        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px; /* Adjusts for spacing */
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
    </style>
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
                    @if ( Auth::user()->hasRole('Admin') )
                    <li >
                        <a href="viewPendingReports"><span class="badge badge-pill badge-danger">{{ App\Report::where(['if_approved' => 0])->get()->count() }}</span> Pending Reports</a>
                    </li>
                    @endif
                    

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
                        @if ( Auth::user()->hasRole('Admin') )
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#stationmgt"><i class="fa fa-th-list fa-fw"></i> Station Management <i class="fa fa-caret-down"></i></a>
                            <ul id="stationmgt" class="collapse">
                                <li>
                                    <a href="stationManagement"><i class="fa fa-flag fa-fw" aria-hidden="true"></i> Stations and Devices</a>
                                </li>
                                <li>
                                    <a href="maintenanceHistory"><i class="fa fa-line-chart fa-fw" aria-hidden="true"></i> Reports and Stats</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li>
                            <a href="maintenanceHistory"><i class="fa fa-line-chart fa-fw" aria-hidden="true"></i> Reports and Stats</a>
                        </li>
                        @endif
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

    <!-- FLOT Script -->
    <script type="text/javascript" src="{{ asset('vendor/flot/jquery.flot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/flot/jquery.flot.pie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/flot/jquery.flot.categories.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/flot/jquery.flot.resize.js') }}"></script>
    
    <!-- Bootstrap select Script -->
    <script type="text/javascript" src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    

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

            // Datatable JS
            var stationsTable = $('#all-station').DataTable({
                language: {
                    "emptyTable": "No stations to display.",
                    "infoEmpty": ""
                },
                "scrollX": true
            });
            var tableAllParts = $('#all-parts').DataTable({
                language: {
                    "emptyTable": "You have not added a device yet.",
                    "infoEmpty": ""
                },
                "fixedHeader": true
            });
            var tableAllParts = $('#all-status').DataTable({
                language: {
                    "emptyTable": "You have not added a status yet.",
                    "infoEmpty": ""
                },
                "fixedHeader": true
            });
            var tableAllParts = $('#all-type').DataTable({
                language: {
                    "emptyTable": "You have not added a type yet.",
                    "infoEmpty": ""
                },
                "fixedHeader": true
            });
            var tableAllWorks = $('#all-works').DataTable({
               language: {
                    "emptyTable": "No works to display.",
                    "infoEmpty": ""
                },
                "fixedHeader": true
            });
            var tableAllUsers = $('#all-users').DataTable({
                language: {
                    "emptyTable": "You have not created a user yet.",
                    "infoEmpty": ""
                },
                "scrollX": true
            });
            
            var tableMyReps = $('#my-reports').DataTable({
                order: [[ 5, "desc" ]],
                language: {
                    "emptyTable": "You have not created a report yet.",
                    "infoEmpty": ""
                },
                "scrollX": true
            });
            var tableAllReps = $('#all-reports').DataTable({
                order: [[ 5, "desc" ]],
                language: {
                    "emptyTable": "There are no approved reports.",
                    "infoEmpty": ""
                },
                "scrollX": true
            });
            var tablePenReps = $('#pending-reports').DataTable({
                order: [[ 5, "desc" ]],
                language: {
                    "emptyTable": "There are no pending reports.",
                    "infoEmpty": ""
                },
                "scrollX": true
            })
            
            var tableUserAct = $('#user-activity').DataTable({
                order: [[ 0, "desc" ]],
                "scrollX": true
            });

            var tableUserAct = $('#my-scheds').DataTable({
                order: [[ 1, "desc" ]],
                language: {
                    "emptyTable": "No schedules yet.",
                    "infoEmpty": ""
                },
                "scrollX": true
            });
            
            var tableAllStations = $('#all-stations').dataTable({
                language: {
                    "emptyTable": "No stations to display.",
                    "infoEmpty": ""
                },
                "scrollX": true
            });
            
            var tableAllStations = $('#all-statuses').dataTable({
                language: {
                    "emptyTable": "No status to display.",
                    "infoEmpty": ""
                },
            });
            
            var tableAllStations = $('#all-sim').dataTable({
                language: {
                    "emptyTable": "No sim network to display.",
                    "infoEmpty": ""
                },
            });
            
            var tableSenReps = $('#station-reports').DataTable({
                order: [[ 4, "desc" ]],
                language: {
                    "emptyTable": "No reports yet for this station.",
                    "infoEmpty": ""
                },
                "scrollX": true
            });

            //tooltip
            $('[data-toggle="tooltip"]').tooltip(); 
            $('.withTooltip').tooltip();

            //START return to current tab after refresh
            $(function() { 
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    // save the latest tab; use cookies if you like 'em better:
                    localStorage.setItem('lastTab', $(this).attr('href'));
                });

                // go to the latest tab, if it exists:
                var lastTab = localStorage.getItem('lastTab');
                if (lastTab) {
                    $('[href="' + lastTab + '"]').tab('show');
                }
            });
            //END return to current tab after refresh

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
                    var side = $('#eventTitle');

                    var ttl = "<strong>Station: </strong>" + calEvent.title + "&nbsp;&nbsp;<a data-toggle='modal' data-target='#confirmDelete'>"
                    
                    if(calEvent.is_confirmed == 0){
                         fin = "No"
                         ttl += "<i class='fa fa-trash' aria-hidden='true'></i></a>"
                    }
                    else{ 
                        fin = "Yes"
                        ttl+= "</a>"
                    }                   
                
                    side.html(ttl);
                     
                    side = $('#eventID');
                    side.html("<label>eventID:</label><input name='eventIDinput' type=text value='" + calEvent.id + "' class='form-control' readonly></input>")

                    side = $('#eventDate');
                    side.html("<label>Date:</label><input type=text value='" + moment(calEvent.start).format('MMM DD, YYYY') + "' class='form-control' readonly></input>")

                    side = $('#eventStaff');
                    side.html("<label>Staff-in-charge:</label><input type=text value='" + calEvent.staff_name + "' class='form-control' readonly onclick='this.select()'></input>")
                    
                    side = $('#eventEmail');
                    side.html("<label>Email:</label><input type=text value='" + calEvent.email + "' class='form-control' readonly onclick='this.select()'></input>")
                    
                    side = $('#eventPerformed');
                    side.html("<label>Performed:</label><input type=text value='" + fin + "' class='form-control' readonly></input>")
                    
                }
            });  // end fullcalendar
            /* FLOT bar charts */
            var statData = $('#all-stat-data').html();  
            var data =  JSON.parse(statData) ;
            
            var dataSet = [
                { data: data[0], color: "#5482FF" }
            ];
            $.plot('#freq_replaced_part',  dataSet , {
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.7,
                        align: "center",
                        horizontal: true
                    }
                },
                xaxis: {
                    tickDecimals: 0
                },
                yaxis: {
                    mode: "categories",
                    tickLength: 0
                }
            });

            dataSet = [
                { data: data[1], color: "#5482FF" }
            ];
             $.plot('#most_common_defect', dataSet, {
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.7,
                        align: "center",
                        horizontal: true
                    }
                },
                xaxis: {
                    tickDecimals: 0
                },
                yaxis: {
                    mode: "categories",
                    tickLength: 0
                }
            });
     });// end of main
    </script>
</body>
</html>
