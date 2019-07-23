@extends('layouts.app')
@section('content')

<div class="col-md-12" style="margin-top: -50px;">
    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card wizard-card" data-color="rose" id="wizardProfile">
            <form method="post" action="update"><!-- form start -->
				{{ csrf_field() }}
                <div class="wizard-header">
                    <h3 class="wizard-title">
                        Formulir Permohonan Laboratorium TB Untuk Pemeriksaan Dahak
                    </h3>
                </div>
                <div class="wizard-navigation">
                    <ul>
                        <li>
                            <a href="#data_pasien" data-toggle="tab">Hasil Pemeriksaan Laboratorium</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                	<div class="tab-pane" id="data_pasien">
                		<div class="row">
                			<div class="col-md-12">
                				<div class="form-group">
                					<label style="color:black;">No Reg Lab</label>
                					<input type="text" class="form-control" name="no_reg_lab" id="no_reg_lab" maxlength="77" placeholder="No Reg Lab" value="{{$permohonan_labs->no_reg_lab}}">
                				</div>
                			</div>
                			<div class="col-md-12">
                				<table id="hasil" class="table">
									<tbody>
										<tr>
											<th style="border: none;" class="pull-left">Spesimen Dahak</th>
											<th style="border: none;">Tanggal Hasil</th>
											<th style="border: none;">+++</th>
											<th style="border: none;">++</th>
											<th style="border: none;">+</th>
											<th style="border: none;"></th>
											<th style="border: none;">1-9</th>
											<th style="border: none;">Neg</th>
										</tr><!-- Table Header -->
										<tr>
											<td style="border:none;" class="pull-left">Sewaktu</td>
											<td style="border:none;">
												<input type="text" class="form-control datepicker col-sm-3" value="{{$permohonan_labs->tanggal_hasil_sewaktu_1}}" name="txtTanggalSewaktu1Show" id="txtTanggalSewaktu1Show" placeholder="Tanggal">
											</td>
											<td style="border:none;">
								              	<div class="radio">
									              	<label>
									                  <input type="radio" name="sewaktu_satu" class="flat-red" value="plus_tiga" {{ $permohonan_labs->sewaktu_satu == 'plus_tiga' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_satu" class="flat-red" value="plus_dua" {{ $permohonan_labs->sewaktu_satu == 'plus_dua' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_satu" class="flat-red" value="plus_satu" {{ $permohonan_labs->sewaktu_satu == 'plus_satu' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_satu" class="flat-red" value="satu_sembilan" {{ $permohonan_labs->sewaktu_satu == 'satu_sembilan' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_satu" class="flat-red" value="negatif" {{ $permohonan_labs->sewaktu_satu == 'negatif' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
										</tr><!-- Sewaktu 1, check -->
										<tr>
											<td style="border:none;" class="pull-left">Pagi</td>
											<td style="border:none;">
												<input type="text" class="form-control datepicker col-sm-3" name="txtTanggalPagiShow" value="{{$permohonan_labs->tanggal_hasil_sewaktu_2}}" id="txtTanggalPagiShow" placeholder="Tanggal">
											</td>
											<td style="border:none;">
								              	<div class="radio">
									              	<label>
									                  <input type="radio" name="sewaktu_pagi" class="flat-red" value="plus_tiga" {{ $permohonan_labs->sewaktu_pagi == 'plus_tiga' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_pagi" class="flat-red" value="plus_dua" {{ $permohonan_labs->sewaktu_pagi == 'plus_dua' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_pagi" class="flat-red" value="plus_satu" {{ $permohonan_labs->sewaktu_pagi == 'plus_satu' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_pagi" class="flat-red" value="satu_sembilan" {{ $permohonan_labs->sewaktu_pagi == 'satu_sembilan' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_pagi" class="flat-red" value="negatif" {{ $permohonan_labs->sewaktu_pagi == 'negatif' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
										</tr><!-- Pagi, check -->
										<tr>
											<td style="border:none;" class="pull-left">Sewaktu</td>
											<td style="border:none;">
												<input type="text" class="form-control datepicker col-sm-3" name="txtTanggalSewaktu2Show" value="{{$permohonan_labs->tanggal_hasil_sewaktu_3}}" id="txtTanggalSewaktu2Show" placeholder="Tanggal">
											</td>
											<td style="border:none;">
								              	<div class="radio">
									              	<label>
									                  <input type="radio" name="sewaktu_dua" class="flat-red" value="plus_tiga" {{ $permohonan_labs->sewaktu_dua == 'plus_tiga' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_dua" class="flat-red" value="plus_dua" {{ $permohonan_labs->sewaktu_dua == 'plus_dua' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_dua" class="flat-red" value="plus_satu" {{ $permohonan_labs->sewaktu_dua == 'plus_satu' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_dua" class="flat-red" value="satu_sembilan" {{ $permohonan_labs->sewaktu_dua == 'satu_sembilan' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
											<td style="border:none;">
												<div class="radio">
													<label>
									                  <input type="radio" name="sewaktu_dua" class="flat-red" value="negatif" {{ $permohonan_labs->sewaktu_dua == 'negatif' ? 'checked' : '' }}>								                
									                </label>
									            </div>
											</td>
										</tr><!-- Sewaktu 2, check -->
									</tbody>
								</table>
                			</div>
                		</div>
                	</div>
                </div>
                <div class="wizard-footer">
                    <div class="pull-right">
                        <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                        <input type='submit' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Finish' />
                    </div>
                    <div class="pull-left">
                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- wizard container -->
</div>
@endsection
@section('javascript')

<script type="text/javascript">
	$().ready(function() {
        demo.initMaterialWizardPermohonanLab();
        demo.initFormExtendedDatetimepickers();
    });

	$('#select_pasien').on('change', function() {
	  $.ajax(
		   {
		      type:'GET',
		      url:'/tb05/get-data-pasien',
		      data:{'id' : this.value },
		      success: function(data){
		      	$('#txtNIK').val(data.nik);
		      	$('#txtAlamat').val(data.alamat);
		      	$('#txtUmur').val(data.umur);
		      	$('#txtPropinsi').val(data.kota);
		      	$('#txtKabupaten').val(data.kecamatan);
		      	$('#txtNoIdentitasSediaanDahak').val(data.no_identitas_sediaan_dahak);
		      	if (data.jenis_kelamin == 'pria') {
		      		$("#pria").iCheck('check');
		      	}else{
		      		$("#wanita").iCheck('check');
		      	}
		      	// $("#subscribeAddress").iCheck('uncheck');
		      	// $('#pria').iCheck('checked');
		      }
		   }
		);
	});

	// function getPasien(sel)
	// {
	//     alert(sel.value);
	// }

	$('.select2').select2()
	     //Flat red color scheme for iCheck
    // $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    //   checkboxClass: 'icheckbox_flat-green',
    //   radioClass   : 'iradio_flat-green'
    // })

	 $('.btn-next-child').click(function(){
  	 $('.nav-tabs > .active').next('li').find('a').trigger('click');
	});

  	$('.btn-prev-child').click(function(){
  	$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});
	$(document).ready(function() {
		$('#example1').DataTable( {
			"scrollX": true
		} );
	});
	$('.datepicker').datepicker({
      	days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],

		daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],

		daysMin: ['Mi', 'Sn', 'Sl', 'Rb', 'Km', 'Ju', 'Sa'],

		months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],

		monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],

		today: 'Hari ini',

		clear: 'Bersihkan',

		format: 'yyyy-mm-dd',

		titleFormat: 'MM yyyy',

		weekStart: 0,

		autoclose: true
    })
</script>
@endsection