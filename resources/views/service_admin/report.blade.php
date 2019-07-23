@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="report" target="_blank">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Report </strong></h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Date From</label>
						<div class="input-group col-md-3">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<input type="text" name="date_from" class="form-control datepicker">                                            
						</div>
					</div>
					<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Date To</label>
						<div class="input-group col-md-3">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<input type="text" name="date_to" class="form-control datepicker">                                            
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="col-sm-offset-2 col-sm-10">
						<button class="btn btn-default">Reset</button>                            
						<button class="btn btn-primary pull-right">Report</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-md-12">

		<!-- START DATATABLE EXPORT -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Table </h3>
				<div class="btn-group pull-right">
					<button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Print Data</button>
					<ul class="dropdown-menu">
						<li><a href="print" target="_blank" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='{{asset('img/icons/print.jpg')}}' width="24"/> Print</a></li>
					</ul>
				</div>                                    

			</div>
			<div class="panel-body">
				<table class="table datatable">
					<thead>
						<tr>
							<th>Mid</th>
							<th>Nama Merchant</th>
							<th>ALamat Merchant</th>
							<th>Nama Service Point</th>
							<th>Description</th>
							<th>Engineer</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($services_completed as $services_complete )
						<tr>
							<td>{{$services_complete->merchant['mid']}}</td>
							<td>{{$services_complete->merchant['nama_merchant']}}</td>
							<td>{{$services_complete->merchant['alamat_merchant']}}</td>
							<td>{{$services_complete->service_point['nama']}}</td>
							<td>{{$services_complete->description}}</td>
							<td>{{$services_complete->user['name']}}</td>
							@if($services_complete->status ==4)
							<td>{{'Completed'}}</td>
							@endif
							<td>
								<a href="{{ $services_complete->id }}/detail-completed" class="btn btn-danger btn-sm">Detail</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- END DATATABLE EXPORT -->                           
	</div>
</div>
@endsection