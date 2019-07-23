@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">

		<form class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Data Services</strong></h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-3 control-label">Nama Merchant		:</label>
								<div class="col-md-9">   
									<label class="col-md- control-label">{{$engineer_services->merchant['nama_merchant']}}   </label> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Alamat Merchant		:</label>
								<div class="col-md-9">   
									<label class="col-md- control-label">{{$engineer_services->merchant['alamat_merchant']}}   </label> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">PIC Merchant		:</label>
								<div class="col-md-9">   
									<label class="col-md- control-label">{{$engineer_services->merchant['pic_merchant']}}   </label> 
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-3 control-label">Telepon		:</label>
								<div class="col-md-9">   
									<label class="col-md- control-label">{{$engineer_services->merchant['telepon']}}   </label> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">TID		:</label>
								<div class="col-md-9">   
									<label class="col-md- control-label">{{$engineer_services->merchant['tid']}}   </label> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">MID		:</label>
								<div class="col-md-9">   
									<label class="col-md- control-label">{{$engineer_services->merchant['mid']}}   </label> 
								</div>
							</div>

						</div>
						<div class="col-md-6">

							<div class="form-group">

								<div class="form-group">
									<label class="col-md-3 control-label">CSI		:</label>
									<div class="col-md-9">   
										<label class="col-md- control-label">{{$engineer_services->merchant['csi']}}   </label> 
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Type EDC		:</label>
									<div class="col-md-9">   
										<label class="col-md- control-label">{{$engineer_services->merchant['type_edc']}}   </label> 
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Service Point		:</label>
									<div class="col-md-9">   
										<label class="col-md- control-label">{{$engineer_services->service_point['nama']}}   </label> 
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Nomor Laporan  :</label>
									<div class="col-md-9">   
										<label class="col-md- control-label">{{$engineer_services->nomor_laporan}}</label> 
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Description		:</label>
									<div class="col-md-9">   
										<label class="col-md- control-label" style="text-align: left;">{{$engineer_services->description}}   </label> 
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Nama Engineer		:</label>
									<div class="col-md-9">   
										<label class="col-md- control-label">{{$engineer_services->user['name']}}   </label> 
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

<div class="row">
	<div class="col-md-12">

		<form class="form-horizontal" method="post" action="work-orders" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Work Order</strong> create</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">                                                                        
					<div class="row">
						<div class="col-md-6">

							<div class="form-group">
								<label class="col-md-3 control-label">Id Work Order</label>
								<div class="col-md-3">                                            
									<label class="col-md- control-label">{{$engineer_services->work_order['id']}}   </label>                         
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Supply Thermal Roll</label>
								<div class="col-md-3">                                            
									<label class="col-md- control-label">{{$engineer_services->work_order['supply_thermal']}}   </label>                         
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Response Time Debit</label>
								<div class="col-md-1">                                            
									<label class="col-md- control-label">{{$engineer_services->work_order['respon_time_debit']}}   </label>                   
								</div>
								<label class="control-label">Detik</label>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Response Time Kredit / Installment</label>
								<div class="col-md-1">                                            
									<label class="col-md- control-label">{{$engineer_services->work_order['respon_time_kredit']}}   </label>                       
								</div>
								<label class="control-label">Detik</label>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Response Time Top Up / Prepaid</label>
								<div class="col-md-1">                                            
									<label class="col-md- control-label">{{$engineer_services->work_order['respon_time_prepaid']}}   </label>                         
								</div>
								<label class="control-label">Detik</label>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Loyalty</label>
								<div class="col-md-1">                                            
									<div class="input-group">
										<label class="col-md- control-label">{{$engineer_services->work_order['respon_time_loyalty']}}   </label>
									</div>                         
								</div>
								<label class="control-label">Detik</label>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Type Komunikasi</label>
								<div class="col-md-3">

									<div class="input-group">
										<label class="col-md- control-label">{{$engineer_services->work_order['type_komunikasi']}}   </label>
									</div>   

								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Mobile Operator</label>
								<div class="col-md-3">

									<div class="input-group">
										@if ($engineer_services->work_order['mobile_operator'] == '')
										<label class="col-md- control-label">-</label>
										@else
										<label class="col-md- control-label">{{$engineer_services->work_order['mobile_operator']}}   </label>
										@endif
									</div>   

								</div>
							</div>

							<div class="form-group" id="mobile_operators" style="display: none;">
								<label class="col-md-3 control-label">Moblie Operator</label>
								<div class="input-group">
									<label class="col-md- control-label">{{$engineer_services->work_order['type_komunikasi']}}   </label>
								</div>   
							</div>

							<div class="form-group" id="direct-line" style="display: none;">
								<label class="col-md-3 control-label">Nomer Direct Line </label>
								<div class="col-md-5">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
										<input name="nomor_direct_line" type="number" class="form-control"/>
									</div>                         
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Kelengkapan EDC</label>
								<div class="input-group">
									<label class="col-md- control-label" style="text-align: left;">{{$engineer_services->work_order['kelengkapan_edc']}}   </label>
								</div>   
							</div>
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label class="col-md-3 control-label">Kelengkapan Dongle</label>
								<div class="input-group">
									<label class="col-md- control-label" style="text-align: left;">{{$engineer_services->work_order['kelengkapan_dongle']}}   </label>
								</div>   
							</div>
							<div class="form-group">               
								<label class="col-md-3 control-label">Description</label>
								<div class="col-md-9">
									<div class="input-group">
										<label class="col-md- control-label" style="text-align: left;">{{$engineer_services->work_order['description']}}   </label>
									</div>   
								</div>
							</div>

							<div class="form-group">               
								<label class="col-md-3 control-label">Tanggal</label>
								<div class="col-md-5">
									<div class="input-group">
										<label class="col-md- control-label" style="text-align: left;">{{$engineer_services->work_order['tanggal']}}   </label>
									</div>   
								</div>
							</div>

							<div class="form-group">               
								<label class="col-md-3 control-label">Jam Mulai</label>
								<div class="col-md-3">
									<div class="input-group">
										<label class="col-md- control-label" style="text-align: left;">{{$engineer_services->work_order['jam_mulai']}}   </label>
									</div> 
								</div>  
							</div>

							<div class="form-group">               
								<label class="col-md-3 control-label">Jam Selesai</label>
								<div class="col-md-3">
									<div class="input-group">
										<label class="col-md- control-label" >{{$engineer_services->work_order['jam_selesai']}}   </label>
									</div>   
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Upload Photo Struk</label>
								<div class="col-md-3">
									<div class="input-group">
										<a href="#" class="pop">
											<img style="width:304px;height:228px;" src="/uploads/photo_struk/{{ $engineer_services->work_order['photo_struk'] }}" alt="">
										</a>
									</div>   
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Upload Photo Toko</label>
								<div class="col-md-3">
									<div class="input-group">
										<a href="#" class="pop">
											<img style="width:304px;height:228px;"" src="/uploads/photo_toko/{{ $engineer_services->work_order['photo_toko'] }}" alt="">
										</a>
									</div>   
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">PIC Merchant</label>
								<div class="col-md-9">
									<div class="input-group">
										<label class="col-md- control-label" style="text-align: left;">{{$engineer_services->work_order['nama_pic']}}   </label>
									</div>   
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Telepon</label>
								<div class="input-group">
									<label class="col-md- control-label" style="text-align: left;">{{$engineer_services->work_order['no_telepon']}}   </label>
								</div>   
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Status</label>
								<div class="input-group">
									@if($engineer_services['status'] == 3)
									<label class="col-md- control-label" style="text-align: left;">DONE</label>
									@else
									<label class="col-md- control-label" style="text-align: left;">COMPLETED</label>
									@endif
								</div>   
							</div>


							<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">              
										<div class="modal-body">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<img src="" class="imagepreview" style="width: 100%;" >
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</form>

	</div>
</div>                    

</div>
<!-- END PAGE CONTENT WRAPPER -->       

<script type="text/javascript">
	$(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});
</script>
@endsection