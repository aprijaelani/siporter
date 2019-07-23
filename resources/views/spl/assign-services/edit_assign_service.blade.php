@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="update">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Assign Data </strong> Services</h3>
					<ul class="panel-controls">
						<li><a href="" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-4 control-label">Merchant</label>
						<div class="col-md-4">
							<select name="merchant_id" class="form-control select" data-live-search="true" disabled>
								<option value="{{ $admin_services->merchant_id }}" selected>{{$nama_merchant[0]->nama_merchant}}</option>
							</select>                                            
							{!! $errors->first('merchant_id', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Service Point</label>
						<div class="col-md-4">           
							<select name="service_point_id" class="form-control select" data-live-search="true" disabled>
								<option value="{{ $admin_services->service_point_id }}" selected>{{$nama_service_point[0]['nama']}}</option>
							</select>                                            
							{!! $errors->first('service_point_id', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Description</label>
						<div class="col-md-4">
							<textarea readonly style="color: #000;" name="description" class="form-control" rows="10" required>{{$admin_services->description}}</textarea>                                                
							{!! $errors->first('description', '<span class="help-block">:message</span>')!!}        
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Engineer</label>
						<div class="col-md-4">           
							<select name="user_id" class="form-control select" data-live-search="true">
		                        <option>Pilih Engineer</option>
		                        @foreach ($engineers as $engineer)
		                        <option value="{{ $engineer->id }}">{{$engineer->name}}</option>
		                    	@endforeach 
							</select>                                            
							{!! $errors->first('user_id', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="col-sm-offset-2 col-sm-10">                           
					<button class="btn btn-info pull-right">Update</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>   
@endsection