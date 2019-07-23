@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="update">
				{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit Data </strong> Service Points</h3>
					<ul class="panel-controls">
						<li><a href="" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-4 control-label">Nama</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('nama') ?: $servicePoint->nama }}" name="nama" id="nama" class="form-control" placeholder="Nama"/>
							{!! $errors->first('nama', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Alamat</label>
						<div class="col-md-4">                                            
							<textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Alamat">{{ old('alamat') ?: $servicePoint->alamat }}</textarea> 
							{!! $errors->first('alamat', '<span class="help-block">:message</span>')!!}  
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Telepon</label>
						<div class="col-md-4">                                            
							<input name="telepon" value="{{ old('telepon') ?: $servicePoint->telepon }}" id="telepon" type="number" class="form-control" placeholder="Telepon"/>     
							{!! $errors->first('telepon', '<span class="help-block">:message</span>')!!}        
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Zipcode</label>
						<div class="col-md-4">                                            
							<input name="zipcode" value="{{ old('zipcode') ?: $servicePoint->zipcode }}" id="zipcode" type="number" class="form-control" placeholder="Zipcode"/>
							{!! $errors->first('zipcode', '<span class="help-block">:message</span>')!!}
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