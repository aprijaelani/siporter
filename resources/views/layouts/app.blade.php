<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('plugin_new/assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('plugin_new/assets/img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Si Porter</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('plugin_new/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('plugin_new/assets/css/material-dashboard.css') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('plugin_new/assets/css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="{{ asset('plugin_new/assets/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugin_new/assets/css/google-roboto-300-700.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css')}}">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('plugin_new/assets/img/sidebar-1.jpg') }}">
            <div class="logo">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    Ct
                </a>
            </div>
            @include('layouts.navigation')
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">{{$count_notification}}</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu" style="width: 500px;">
                                    <li class="header" style="text-align: center;"><strong>{{$count_notification}} notifikasi memerlukan tindakan</strong></li>
                                      <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">                 
                                          @if($list_min_nows->isNotEmpty())
                                          @foreach ($list_min_nows as $list_min_now)
                                          @if ($list_min_now->kartu_pengobatan->daftar_terduga->faskes_id == $data_user->faskes_id)
                                          <li><!-- start message -->
                                            <a href="/tb02">
                                              <div class="pull-left">
                                                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                              </div>
                                              <strong>
                                                <h5 style="color: red;font-size: 20px;">
                                                    <i class="fa fa-warning"></i> 
                                                    {{$list_min_now->kartu_pengobatan->daftar_terduga->nama_lengkap}}
                                                </h5>
                                              </strong>
                                              <h4 style="color: red;">
                                                <div class="external-event bg-red" style="width: 200px;">
                                                    {{$list_min_now->kartu_pengobatan->daftar_terduga->jenis_kelamin}}, {{$list_min_now->kartu_pengobatan->daftar_terduga->umur}} th. {{$list_min_now->kartu_pengobatan->tahap_intensif}}
                                                </div>
                                                <span style="float: right;">
                                                    <i class="fa fa-calendar"></i>
                                                    hari ini
                                                </span>
                                              </h4>
                                              <h4>
                                                {{date('d-F-Y',strtotime($list_min_now->tanggal_harus_kembali))}}
                                              </h4>
                                            </a>
                                          </li>
                                          @endif
                                          @endforeach
                                          @endif
                                          @if($list_min_satus->isNotEmpty())
                                          @foreach ($list_min_satus as $list_min_satu)
                                          @if ($list_min_satu->kartu_pengobatan->daftar_terduga->faskes_id == $data_user->faskes_id)
                                          <li>
                                            <a href="/tb02">
                                              <div class="pull-left">
                                                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                              </div>
                                              <strong>
                                                <h5 style="color: yellow;font-size: 20px;">
                                                    <i class="fa fa-info-circle"></i> 
                                                    {{$list_min_satu->kartu_pengobatan->daftar_terduga->nama_lengkap}}
                                                </h5>
                                              </strong>
                                              <h4 style="color: yellow;">
                                                <div class="external-event bg-yellow" style="width: 200px;">
                                                    {{$list_min_satu->kartu_pengobatan->daftar_terduga->jenis_kelamin}}, {{$list_min_satu->kartu_pengobatan->daftar_terduga->umur}} th. {{$list_min_satu->kartu_pengobatan->tahap_intensif}}
                                                </div>
                                                <span style="float: right;"
                                                    <i class="fa fa-calendar"></i>
                                                    1 hari
                                                </span>
                                              </h4>
                                              <h4>
                                                {{date('d-F-Y',strtotime($list_min_satu->tanggal_harus_kembali))}}
                                              </h4>
                                            </a>
                                          </li>
                                          @endif
                                          @endforeach
                                          @endif
                                          @if($list_min_duas->isNotEmpty())
                                          @foreach ($list_min_duas as $list_min_dua)
                                          @if ($list_min_dua->kartu_pengobatan->daftar_terduga->faskes_id == $data_user->faskes_id)
                                          <li>
                                            <a href="/tb02">
                                              <div class="pull-left">
                                                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                              </div>
                                              <strong>
                                                <h5 style="color: green;font-size: 20px;">
                                                    <i class="fa fa-commenting"></i> 
                                                    {{$list_min_dua->kartu_pengobatan->daftar_terduga->nama_lengkap}}
                                                </h5>
                                              </strong>
                                              <h4 style="color: green;">
                                                <div class="external-event bg-green" style="width: 200px;">
                                                    {{$list_min_dua->kartu_pengobatan->daftar_terduga->jenis_kelamin}}, {{$list_min_dua->kartu_pengobatan->daftar_terduga->umur}} th. {{$list_min_dua->kartu_pengobatan->tahap_intensif}}
                                                </div>
                                                <span style="float: right;">
                                                    <i class="fa fa-calendar"></i>
                                                    2 hari
                                                </span>
                                              </h4>
                                              <h4>
                                                {{date('d-F-Y',strtotime($list_min_dua->tanggal_harus_kembali))}}
                                              </h4>
                                            </a>
                                          </li>
                                          @endif
                                          @endforeach
                                          @endif
                                        </ul>
                                      </li>
                                      <li class="footer"><a href="/tb02">See All Messages</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                @include('flash::message')
                @include('sweetalert::alert')
                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com/">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('plugin_new/assets/js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('plugin_new/assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('plugin_new/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('plugin_new/assets/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('plugin_new/assets/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('plugin_new/assets/js/jquery.validate.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('plugin_new/assets/js/moment.min.js')}}"></script>
<!--  Charts Plugin -->
<script src="{{ asset('plugin_new/assets/js/chartist.min.js')}}"></script>

<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!--  Plugin for the Wizard -->
<script src="{{ asset('plugin_new/assets/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('plugin_new/assets/js/bootstrap-notify.js')}}"></script>
<!--   Sharrre Library    -->
<script src="{{ asset('plugin_new/assets/js/jquery.sharrre.js')}}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{ asset('plugin_new/assets/js/bootstrap-datetimepicker.js')}}"></script>
<!-- Vector Map plugin -->
<script src="{{ asset('plugin_new/assets/js/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin -->
<script src="{{ asset('plugin_new/assets/js/nouislider.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<!--<script src="{{ asset('plugin_new/assets/js/jquery.select-bootstrap.js')}}"></script>-->
<!-- Select Plugin -->
<script src="{{ asset('plugin_new/assets/js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{ asset('plugin_new/assets/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('plugin_new/assets/js/sweetalert2.js')}}"></script>
<!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('plugin_new/assets/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{ asset('plugin_new/assets/js/fullcalendar.min.js')}}"></script>
<!-- TagsInput Plugin -->
<script src="{{ asset('plugin_new/assets/js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('plugin_new/assets/js/material-dashboard.js')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('plugin_new/assets/js/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>
@yield('javascript') 
<!-- START THIS PAGE PLUGINS-->  
<script>
    $('#flash-overlay-modal').modal();
</script>      

</html>