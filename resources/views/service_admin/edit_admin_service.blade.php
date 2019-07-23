@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="update">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit Data </strong> Admin Services</h3>
					<ul class="panel-controls">
						<li><a href="" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-md-4 control-label">Nomor Laporan</label>
						<div class="col-md-4">
							<input type="text" name="nomor_laporan" class="form-control" placeholder="No Laporan" value="{{$adminService->nomor_laporan}}">                                 
							{!! $errors->first('nama', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Merchant</label>
						<div class="col-md-4">
							<select name="merchant_id" class="form-control select" data-live-search="true">
								<option value="{{ $adminService->merchant_id }}" selected>{{$nama_merchant[0]->nama_merchant}}</option>
								@foreach ($merchants as $merchant)
								<option value="{{ $merchant->id }}"> {{$merchant->nama_merchant}}</option>
								@endforeach 
							</select>                                            
							{!! $errors->first('nama', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Service Point</label>
						<div class="col-md-4">           
							<select name="service_point_id" class="form-control select" data-live-search="true">
								<option value="{{ $adminService->service_point_id }}" selected>{{$nama_service_point[0]['nama']}}</option>
								@foreach ($service_points as $service_point)
								<option value="{{ $service_point->id }}">{{$service_point->nama}}</option>
								@endforeach 
							</select>                                            
							{!! $errors->first('alamat', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Description</label>
						<div class="col-md-4">
							<textarea name="description" class="form-control" rows="10" required>{{$adminService->description}}</textarea>                                                
							{!! $errors->first('description', '<span class="help-block">:message</span>')!!}        
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-primary">Clear Form</button>                            
					<button class="btn btn-info pull-right">Update</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>   
@endsection