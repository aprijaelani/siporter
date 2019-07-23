@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6">

        <!-- START BAR CHART -->
        <div class="panel panel-default" style="height: 400px;">
            <div class="panel-heading">
                <h3 class="panel-title">Bar Chart</h3>                                
            </div>
            <div class="panel-body">
                {!! Charts::assets() !!}
                {!! $chart->render() !!}
            </div>
        </div>
        <!-- END BAR CHART -->

    </div>
    <div class="col-md-6">

        <!-- START WIDGET CLOCK -->
        <div class="widget widget-info widget-padding-sm">
            <div class="widget-big-int plugin-clock">00:00</div>                            
            <div class="widget-subtitle plugin-date">Loading...</div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                            
            <div class="widget-buttons widget-c3">
                <div class="col">
                    <a href="#"><span class="fa fa-clock-o"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-bell"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-calendar"></span></a>
                </div>
            </div>                            
        </div>                        
        <!-- END WIDGET CLOCK -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon" onclick="location.href='/engineer/services';">
            <div class="widget-item-left">
                <span class="fa fa-wrench"></span>
            </div>                             
            <div class="widget-data">
                <a href="#">
                    <div class="widget-int num-count">{{$total_service_new}}</div>
                    <div class="widget-title">New Services </div>
                    <div class="widget-subtitle">Our New Service </div>
                </a>
            </div>      
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>                            
        <!-- END WIDGET MESSAGES -->

    </div>

        <div class="col-md-3">

        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon" onclick="location.href='/engineer/services-done';">
            <div class="widget-item-left">
                <span class="fa fa-check"></span>
            </div>                             
            <div class="widget-data">
                <a href="#">
                    <div class="widget-int num-count">{{$total_service_done}}</div>
                    <div class="widget-title">Services Done </div>
                    <div class="widget-subtitle">Our Service Done</div>
                </a>
            </div>      
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>                            
        <!-- END WIDGET MESSAGES -->

    </div>

    <div class="col-md-6">

        <!-- START WIDGET REGISTRED -->
        <div class="widget widget-default widget-item-icon" onclick="location.href='/engineer/services-completed';">
            <div class="widget-item-left">
                <span class="fa fa-check-square-o"></span>
            </div>
            <div class="widget-data">
                <a href="#">
                    <div class="widget-int num-count">{{$total_service_completed}}</div>
                    <div class="widget-title">Total Service Completed</div>
                    <div class="widget-subtitle">Our Service Completed</div>
                </a>
            </div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                            
        </div>                            
        <!-- END WIDGET REGISTRED -->

    </div>

</div>

<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">Total Completed Services {{date('F Y')}}</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Mid</th>
                            <th>Tid</th>
                            <th>Nama Merchant</th>
                            <th>ALamat Merchant</th>
                            <th>Nama Service Point</th>
                            <th>Description</th>
                            <th>Engineer</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($engineer_services_completed as $engineer_services_complete )
                        <tr>
                          <td>{{$engineer_services_complete->id}}</td>
                          <td>{{$engineer_services_complete->merchant['mid']}}</td>
                          <td>{{$engineer_services_complete->merchant['tid']}}</td>
                          <td>{{$engineer_services_complete->merchant['nama_merchant']}}</td>
                          <td>{{$engineer_services_complete->merchant['alamat_merchant']}}</td>
                          <td>{{$engineer_services_complete->service_point['nama']}}</td>
                          <td>{{$engineer_services_complete->description}}</td>
                          <td>{{$engineer_services_complete->user['name']}}</td>
                          @if($engineer_services_complete->status ==4)
                          <td>{{'Completed'}}</td>
                          @endif
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
      <!-- END DEFAULT DATATABLE -->
  </div>
</div> 
<!-- END WIDGETS --> 
@endsection