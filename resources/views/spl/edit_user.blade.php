@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="update-user">
				{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit </strong> Password</h3>
					<ul class="panel-controls">
						<li><a href="" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-4 control-label">Nama</label>
						<div class="col-md-4">                                            
							<input type="text" style="color: #000;" value="{{ old('name') ?: $data_user->name }}" name="name" id="name" class="form-control" placeholder="Name" disabled />
							{!! $errors->first('name', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Email</label>
						<div class="col-md-4">                                            
							<input type="text" style="color: #000;" value="{{ old('email') ?: $data_user->email }}" name="email" id="email" class="form-control" placeholder="Email" disabled />
							{!! $errors->first('email', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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