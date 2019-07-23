@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="create">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Create Data </strong> Laporan Merchant</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Nomor Laporan</label>
						<div class="col-md-5">
							<input type="text" placeholder="Nomor Laporan" name="nomor_laporan" class="form-control" required>
						</div>
					</div>
					<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Nama Merchant</label>
						<div class="col-md-5">
							<select name="merchant_id" class="form-control select" data-live-search="true">
								<option value="">Nama Merchant</option>
								@foreach ($merchants as $merchant)
								<option value="{{ $merchant->id }}">{{$merchant->nama_merchant}}</option>
								@endforeach                   
							</select>
						</div>
					</div>
					<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Service Point</label>
						<div class="col-md-5">
							<select name="service_point_id" class="form-control select" data-live-search="true">
								<option value="">Nama Service Point</option>
								@foreach ($service_points as $service_point)
								<option value="{{ $service_point->id }}">{{$service_point->nama}}</option>
								@endforeach                   
							</select>
						</div>
					</div>
					<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Description</label>
						<div class="col-md-5">
							<textarea class="form-control" name="description" placeholder="Description" rows="10"></textarea>
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
<script type="text/javascript">
	$(document).ready(function() {
		$('select[name="state"]').on('change', function() {
			var stateID = $(this).val();
			if(stateID) {
				$.ajax({
					url: 'ajax/'+stateID,
					type: "GET",
					dataType: "json",
					success:function(data) {


						$('input[name="city"]').empty();
						$.each(data, function(key, value) {
							$('input[name="city"]').append('<input value="'+ key +'">'+ value +'/>');
						});

					}
				});
			}else{
				$('input[name="city"]').empty();
			}
		});
	});
</script>
@endsection