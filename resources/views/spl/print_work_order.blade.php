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

    <form class="form-horizontal">
      <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center;">
          <h3 class="panel-title" style="text-align: center;"><strong style="text-align: center;">Form Bukti Kunjungan PT. Visionet Data Internasional</strong></h3>
        </div>

        <div class="panel-body">                                                                        

          <div class="row">

            <div class="col-md-3">


              <div class="form-group">
                <label class="col-md-3 control-label">Nama Merchant   :</label>
                <div class="col-md-9">   
                  <label class="col-md- control-label">{{$spl_services->merchant['nama_merchant']}}   </label> 
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Alamat Merchant   :</label>
                <div class="col-md-9">   
                  <label class="col-md- control-label">{{$spl_services->merchant['alamat_merchant']}}   </label> 
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">PIC Merchant    :</label>
                <div class="col-md-9">   
                  <label class="col-md- control-label">{{$spl_services->merchant['pic_merchant']}}   </label> 
                </div>
              </div>


              <div class="form-group">
                <label class="col-md-3 control-label">Telepon   :</label>
                <div class="col-md-9">   
                  <label class="col-md- control-label">{{$spl_services->merchant['telepon']}}   </label> 
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">TID   :</label>
                <div class="col-md-9">   
                  <label class="col-md- control-label">{{$spl_services->merchant['tid']}}   </label> 
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">MID   :</label>
                <div class="col-md-9">   
                  <label class="col-md- control-label">{{$spl_services->merchant['mid']}}   </label> 
                </div>
              </div>

            </div>
            <div class="col-md-3">

              <div class="form-group">

                <div class="form-group">
                  <label class="col-md-3 control-label">CSI   :</label>
                  <div class="col-md-9">   
                    <label class="col-md- control-label">{{$spl_services->merchant['csi']}}   </label> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Type EDC    :</label>
                  <div class="col-md-9">   
                    <label class="col-md- control-label">{{$spl_services->merchant['type_edc']}}   </label> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Service Point   :</label>
                  <div class="col-md-9">   
                    <label class="col-md- control-label">{{$spl_services->service_point['nama']}}   </label> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Nomor Laporan  :</label>
                  <div class="col-md-9">   
                    <label class="col-md- control-label">{{$spl_services->nomor_laporan}}</label> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Description   :</label>
                  <div class="col-md-9">   
                    <label class="col-md- control-label">{{$spl_services->description}}   </label> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Nama Engineer   :</label>
                  <div class="col-md-9">   
                    <label class="col-md- control-label">{{$spl_services->user['name']}}   </label> 
                  </div>
                </div>    
                <div class="form-group">
                  <label class="col-md-3 control-label">Nama PIC   :</label>
                  <div class="col-md-9">   
                    <label class="col-md- control-label"> </label> 
                  </div>
                </div>    
                <div class="form-group">
                  <label class="col-md-3 control-label">No Telepon   :</label>
                  <div class="col-md-9">   
                    <label class="col-md- control-label"></label> 
                  </div>
                </div>    
                <div class="form-group">
                  <label class="col-md-3 control-label">Tanda Tangan   :</label>
                  <div class="col-md-9">   
                    <label class="col-md- control-label"> </label> 
                  </div>
                </div>                                        
              </div>

            </div>

          </div>

        </div>
      </div>
    </form>

  </div>
</div>                    

</div>
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