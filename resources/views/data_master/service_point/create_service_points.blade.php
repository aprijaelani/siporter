@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="create">
				{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Input Data </strong> Service Points</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Nama</label>
						<div class="col-md-5">                                            
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required autofocus />
							{!! $errors->first('nama', '<span class="help-block">:message</span>') !!}
						</div>
					</div>
					<div class="form-group{{ $errors->has('alamat') ? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Alamat</label>
						<div class="col-md-5">                                            
							<textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Alamat" required></textarea>
							{!! $errors->first('alamat', '<span class="help-block">:message</span>') !!}   
						</div>
					</div>
					<div class="form-group{{ $errors->has('telepon') ? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Telepon</label>
						<div class="col-md-5">                                            
							<input name="telepon" id="telepon" type="number" class="form-control" placeholder="Telepon" required />
							{!! $errors->first('telepon', '<span class="help-block">:message</span>') !!}   
						</div>
					</div>
					<div class="form-group{{ $errors->has('zipcode') ? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Zipcode</label>
						<div class="col-md-5">                                            
							<input name="zipcode" id="zipcode" type="number" class="form-control" placeholder="Zipcode" required />
							{!! $errors->first('zipcode', '<span class="help-block">:message</span>') !!}
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="col-sm-offset-2 col-sm-10">
						<button class="btn btn-default">Reset</button>                            
						<button class="btn btn-primary pull-right">Save</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>   
@endsection