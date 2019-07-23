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
									<label class="col-md- control-label">{{$engineer_services['nomor_laporan']}}   </label> 
								</div>
							</div>

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
										<label class="col-md- control-label">{{$engineer_services['nomor_laporan']}} </label> 
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Description		:</label>
									<div class="col-md-9">   
										<label class="col-md- control-label">{{$engineer_services->description}}   </label> 
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
								<label class="col-md-3 control-label">Supply Thermal Roll</label>
								<div class="col-md-3">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
										<input name="supply_thermal" type="number" class="form-control" required />
									</div>                         
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Response Time Debit</label>
								<div class="col-md-3">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
										<input name="respon_time_debit" type="number" class="form-control"/>
									</div>                         
								</div>
								<label class="control-label">Detik</label>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Response Time Kredit / Installment</label>
								<div class="col-md-3">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
										<input name="respon_time_kredit" type="number" class="form-control"/>
									</div>                         
								</div>
								<label class="control-label">Detik</label>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Response Time Top Up / Prepaid</label>
								<div class="col-md-3">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
										<input type="number" name="respon_time_prepaid" class="form-control"/>
									</div>                         
								</div>
								<label class="control-label">Detik</label>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Loyalty</label>
								<div class="col-md-3">                                            
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
										<input name="respon_time_loyalty" type="number" class="form-control"/>
									</div>                         
								</div>
								<label class="control-label">Detik</label>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Type Komunikasi</label>
								<div class="col-md-3">

									<label class="radio" style="margin-left: 20px;"><input type="radio" name="type_komunikasi" value="WIFI" checked="checked"/> Wifi</label>

									<label class="radio" style="margin-left: 20px;"><input type="radio" name="type_komunikasi" value="PABX"/> PABX</label>

									<label class="radio" style="margin-left: 20px;"><input type="radio" name="type_komunikasi" value="Direct Line"/> Direct Line</label>

									<label class="radio" style="margin-left: 20px;"><input type="radio" id="id-gprs" name="type_komunikasi" value="GPRS"/> GPRS</label>

									<label class="radio" style="margin-left: 20px;"><input type="radio" name="type_komunikasi" value="LAN"/> LAN</label>

								</div>
							</div>

							<div class="form-group" id="mobile_operators" style="display: none;">
								<label class="col-md-3 control-label">Moblie Operator</label>
								<div class="col-md-3">
									<label class="radio"><input type="radio" name="mobile_operator" class="iradio" value="telkomsel" /> Telkomsel</label>

									<label class="radio"><input type="radio" name="mobile_operator" value="indosat" class="iradio"/> Indosat</label>

									<label class="radio"><input type="radio" name="mobile_operator" value="xl" class="iradio"/> XL</label>

									<label class="radio"><input type="radio" name="mobile_operator" value="tri" class="iradio"/> 3 (TRI)</label>

									<label class="radio"><input type="radio" name="mobile_operator" value="axis" class="iradio"/> AXIS</label>

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
								<div class="col-md-9">                                                        
									<label class="check"><input name="kelengkapan_edc[]" value="kabel power" type="checkbox" class="icheckbox"/> Kabel Power</label>

									<label class="check"><input type="checkbox" name="kelengkapan_edc[]" value="pin cover" class="icheckbox"/> Pin Cover</label>

									<label class="check"><input type="checkbox" name="kelengkapan_edc[]" value="sticker edc" class="icheckbox"/> Sticker EDC</label>

									<label class="check"><input type="checkbox" name="kelengkapan_edc[]" value="kartu tbm" class="icheckbox"/> Kartu TBM</label>

									<label class="check"><input type="checkbox" name="kelengkapan_edc[]" value="acrylic / tendcard" class="icheckbox"/> Acrylic / Tendcard</label>

									<label class="check"><input type="checkbox" name="kelengkapan_edc[]" value="sticker bank" class="icheckbox"/> Sticker Bank</label>

									<label class="check"><input type="checkbox" name="kelengkapan_edc[]" value="buku panduan" class="icheckbox"/> Buku Panduan</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Kelengkapan Dongle</label>
								<div class="col-md-9">                                                        
									<label class="check"><input type="checkbox" name="kelengkapan_dongle[]" value="kabel power" class="icheckbox"/> Kabel Power</label>

									<label class="check"><input type="checkbox" name="kelengkapan_dongle[]" value="kabel data" class="icheckbox"/> Kabel Data</label>

									<label class="check"><input type="checkbox" name="kelengkapan_dongle[]" value="sticker" class="icheckbox"/> Sticker</label>

									<label class="check"><input type="checkbox" name="kelengkapan_dongle[]" value="dudukan dongle" class="icheckbox"/> Dudukan Dongle</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">

							<div class="form-group">               
								<label class="col-md-3 control-label">Description</label>
								<div class="col-md-9">
									<div class="input-group">
										<textarea name="description" class="form-control" rows="10" style="width: 390px;"></textarea>          
									</div>
								</div>
							</div>

							<div class="form-group">               
								<label class="col-md-3 control-label">Jam Mulai</label>
								<div class="col-md-3">
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
										<input type="text" name="jam_mulai" class="form-control timepicker">            
									</div>
								</div>
							</div>

							<div class="form-group">               
								<label class="col-md-3 control-label">Jam Selesai</label>
								<div class="col-md-3">
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
										<input type="text" name="jam_selesai" class="form-control timepicker">            
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Upload Photo Struk</label>
								<div class="col-md-3">
									<input type="file" name="photo_struk" class="fileinput" name="filename1" id="filename1"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Upload Photo Toko</label>
								<div class="col-md-3">
									<input type="file" name="photo_toko" class="fileinput" name="filename1" id="filename1"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">PIC Merchant</label>
								<div class="col-md-9">
									<input type="text" name="nama_pic" class="form-control"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Telepon</label>
								<div class="col-md-9">
									<input type="number" name="no_telepon"  class="form-control"/>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-default">Clear Form</button>                                    
					<button class="btn btn-primary pull-right">Submit</button>
				</div>
			</div>
		</form>

	</div>
</div>                    

</div>
<!-- END PAGE CONTENT WRAPPER -->       

<script type="text/javascript">
	$("input[name='type_komunikasi']").click(function () {
		$('#mobile_operators').css('display', ($(this).val() === 'GPRS') ? 'block':'none');
	});

	$("input[name='type_komunikasi']").click(function () {
		$('#direct-line').css('display', ($(this).val() === 'Direct Line') ? 'block':'none');
	});

	$("input[name='type_komunikasi']").click(function () {
		$('#pabx').css('display', ($(this).val() === 'PABX') ? 'block':'none');
	});

</script>
@endsection