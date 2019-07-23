<!DOCTYPE html>
<html lang="en">
<head>        
    <!-- META SECTION -->
    <title>PT. Visionet Data Internasional</title>            
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="{{asset('image/x-icon')}}" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->        
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/theme-default.css') }}"/>
    <!-- EOF CSS INCLUDE -->                                       
</head>
<body onLoad="window.print();">
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div>
            <br>
        </div>

        <div class="row">
            <div class="col-md-12">

                <!-- START BORDERED TABLE SAMPLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="margin-left: 20px;"><strong>Report Services PT. Visionet Data International on {{$mulai}} - {{$selesai}}</strong></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Laporan</th>
                                    <th>Mid</th>
                                    <th>Nama Merchant</th>
                                    <th>ALamat Merchant</th>
                                    <th>Nama Service Point</th>
                                    <th>Description</th>
                                    <th>Date Completed</th>
                                    <th>Engineer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services_completed as $services_complete )
                                <tr>
                                    <td>{{$services_complete->nomor_laporan}}</td>
                                    <td>{{$services_complete->merchant['mid']}}</td>
                                    <td>{{$services_complete->merchant['nama_merchant']}}</td>
                                    <td>{{$services_complete->merchant['alamat_merchant']}}</td>
                                    <td>{{$services_complete->service_point['nama']}}</td>
                                    <td>{{$services_complete->description}}</td>
                                    <td>{{$services_complete->updated_at}}</td>
                                    <td>{{$services_complete->user['name']}}</td>
                                    @if($services_complete->status ==4)
                                    <td>{{'Completed'}}</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                                
                    </div>
                </div>
                <!-- END BORDERED TABLE SAMPLE --> 
            </div>
        </div>
        <!-- END RESPONSIVE TABLES -->
    </body>        

    <script type='text/javascript' src="{{ asset('js/plugins/icheck/icheck.min.js') }}"></script>        
    <script type="text/javascript" src="{{ asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/plugins/morris/raphael-min.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('js/plugins/morris/morris.min.js') }}"></script>        -->
    <script type="text/javascript" src="{{ asset('js/plugins/rickshaw/d3.v3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/rickshaw/rickshaw.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>                
    <script type='text/javascript' src="{{ asset('js/plugins/bootstrap/bootstrap-datepicker.js') }}""></script>                
    <script type="text/javascript" src="{{ asset('js/plugins/owl/owl.carousel.min.js') }}"></script>                 

    <script type="text/javascript" src="{{ asset ('js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/bootstrap/bootstrap-colorpicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/bootstrap/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- END THIS PAGE PLUGINS-->        
    <script type="text/javascript" src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/tableexport/tableExport.js') }}"></script>
    <script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/html2canvas.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/sprintf.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/jspdf.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/base64.js')}}"></script> 
    <!-- START TEMPLATE -->
    <!-- <script type="text/javascript" src="{{ asset('js/settings.js') }}"></script> -->
    @yield('javascript')  
</body>
</html>                      