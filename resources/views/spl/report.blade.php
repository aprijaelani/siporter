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

</div>
@endsection