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

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/sb-admin.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Calendar CSS -->    
    <link href="{{ asset('vendor/fullcalendar/css/fullcalendar.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

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
                            <a href="notifications"><span class="badge badge-pill badge-danger"> {{ App\Notification::where(['is_read' => 0, 'receiver_id' => Auth::user()->employee_id ])->get()->count() }}</span> All Notifications</a>
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
                @else
                <li>
                    <a href="/login" class="btn btn-primary btn-md">login <i class="fa fa-sign-in fa-fw"></i></a>
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
                        <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> Sensor Statistics</a>
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
                        <a href="userCRUD"><i class="fa fa-users fa-fw"></i> Users</a>
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

    <!-- DataTables JavaScript -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

    <!-- Calendar Script -->
    <script type="text/javascript" src="{{ asset('vendor/fullcalendar/lib/jquery-ui.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/fullcalendar/js/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/fullcalendar/fullcalendar-script.js') }}"></script>

    <script>
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

            // hide email and sms input fields
            $('input[name="email_to_notif"]').hide();
            $('input[name="sms_to_notif"]').hide();
            //show when the checkbox is clicked
            $('input[name="notify_email"]').on('click', function(){
                if ( $(this).prop('checked') ) {
                    $('input[name="email_to_notif"]').fadeIn();
                } 
                else {
                    $('input[name="email_to_notif"]').hide();
                }
            });
        
            $('input[name="notify_sms"]').on('click', function(){
                if ( $(this).prop('checked') ) {
                    $('input[name="sms_to_notif"]').fadeIn();
                } 
                else {
                    $('input[name="sms_to_notif"]').hide();
                }
            });

            // hide PW field button
            $('#change_pw').hide();
            $('#pw_btn').on('click', function (event) {
                $('#pw_btn').hide();
                $('#change_pw').show();
            });
            $('#cancel-button').on('click', function (event) {
                $('#pw_btn').show();
                $('#change_pw').hide();
            });

            // Datatable JS
            $('#all-users').DataTable();
            $('#all-reports').DataTable();
            $('#pending-reports').DataTable();
    
            //tooltip
            $('[data-toggle="tooltip"]').tooltip(); 

            // scheduler
            scheduler.init('scheduler_here', new Date(),"month");

            var events = [
                    {id:1, text:"Meeting",   start_date:"04/11/2013 14:00",end_date:"04/11/2013 17:00"},
                    {id:2, text:"Conference",start_date:"04/15/2013 12:00",end_date:"04/18/2013 19:00"},
                    {id:3, text:"Interview", start_date:"04/24/2013 09:00",end_date:"04/24/2013 10:00"}
            ];
                    
            scheduler.parse(events, "json");//takes the name and format of the data source
        });
    </script>
</body>

</html>
