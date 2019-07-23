@extends('layouts.app')
@section('content')
<style type="text/css">
.has-error .select2-selection {
    border-color:rgb(185, 74, 72) !important;
}
.select2-dropdown { z-index: 9999 }
</style>
<div class="col-md-12" style="margin-top: -50px;">
    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card wizard-card" data-color="rose" id="wizardProfile">
            <form method="post" action="/tb05/create"><!-- form start -->
				{{ csrf_field() }}
                <div class="wizard-header">
                    <h3 class="wizard-title">
                        Create Permohonan Lab
                    </h3>
                </div>
                <div class="wizard-navigation">
                    <ul>
                        <li>
                            <a href="#data_pasien" data-toggle="tab">Data Pasien</a>
                        </li>
                        <li>
                            <a href="#lab_1" data-toggle="tab">Data Lab. 1</a>
                        </li>
                        <li>
                            <a href="#lab_2" data-toggle="tab">Data Lab. 2</a>
                        </li>
                        <li>
                            <a href="#tampak_visual_dahak" data-toggle="tab">Tampak Visual Dahak</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                	<div class="tab-pane" id="data_pasien">
                		<div class="row">
                			<div class="col-md-6">
                				<div class="form-group">
                					<label style="color:black;">Nama Faskes</label>
                					<select class="form-control select2" name="cmbNamaFaskes" id="cmbNamaFaskes" style="width: 100%;">
                						<option value="">Pilih Faskes</option>
                						<option value="{{$faskes->id}}">{{$faskes->nama}}</option>
                					</select>
                				</div>
                				<div class="form-group">
                					<label style="color:black;margin-bottom: 13px;">Nama</label>
                					<select class="form-control select2" name="pasien_id" id="select_pasien" style="width: 100%;">
                						<option value="">Pilih Pasien</option>
                						@foreach ($pasiens as $pasien)
                						<option value="{{$pasien->id}}">{{$pasien->nik}} - {{$pasien->nama_lengkap}}</option>
                						@endforeach
                					</select>
                				</div>                        
                				<div class="form-group">
                					<label style="color:black;">Pengobatan Ke</label>
                					<select class="form-control" name="pengobatan_ke" id="pengobatan_ke">
                						<option>Pilih</option>
                						<option value="1">1</option>
                						<option value="2">2</option>
                						<option value="3">3</option>
                						<option value="4">4</option>
                						<option value="5">5</option>
                						<option value="6">6</option>
                						<option value="6">7</option>
                						<option value="6">8</option>
                						<option value="6">9</option>
                						<option value="6">10</option>
                					</select>
                				</div>
                				<div class="form-group">
                					<label style="color:black;">Telepon</label>
                					<input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon">
                				</div>
                				<div class="form-group">
                					<label style="color:black;">Kabupaten</label>
                					<input type="text" class="form-control" name="txtKabupaten" id="txtKabupaten" value="" disabled="" placeholder="Kabupaten">
                				</div>
                			</div>
                			<div class="col-md-6">
                				<div class="form-group" style="margin-bottom: -5px;">
                					<label style="color:black;">Nama Tim Ahli Klinis</label>
                					<select class="form-control select2" name="cmbNamaTimAhliKlinis" id="cmbNamaTimAhliKlinis" style="width: 100%;">
                						<option value="">Pilih Dokter</option>
                						@foreach ($dokters as $dokter)
                						<option value="{{$dokter->id}}">{{$dokter->nama_dokter}}</option>
                						@endforeach
                					</select>
                				</div>                        
                				<div class="form-group">
                					<label style="color:black;">NIK</label>
                					<input type="text" style="margin-top: 6px;" class="form-control" name="txtNIK" id="txtNIK" value="" placeholder="Nomor Induk Kependudukan" disabled="">
                				</div>                			
                				<div class="form-group" style="padding-bottom: 0px;">
                					<label style="color:black;">Jenis Kelamin</label>
                					<div class="radio">
                						<label style="color: black; margin-right: 50px;margin-left: -10px;">
                							<input type="radio" name="jenis_kelamin" class="flat-red" value="pria" id="pria" disabled="">Pria
                						</label>
                						<label style="color: black;">
                							<input type="radio" name="jenis_kelamin" class="flat-red" value="wanita" id="wanita" disabled="">Wanita
                						</label>
                					</div>
                				</div>
                				<div class="form-group" style="margin-top: 35px;">
                					<label style="color:black;">Umur</label>
                					<input type="number" min="1" class="form-control" name="txtUmur" id="txtUmur" value="" placeholder="Umur" disabled="">
                				</div>
                				<div class="form-group">
                					<label style="color:black;">Kota</label>
                					<input type="text" class="form-control" name="txtPropinsi" id="txtPropinsi" value="" placeholder="Propinsi" disabled="">
                				</div>
                			</div>
                			<div class="col-md-12">
                				<div class="form-group">
                					<label style="color:black;">Alamat Lengkap</label>
                					<textarea class="form-control" name="txtAlamat" id="txtAlamat" placeholder="Alamat Rumah / Tempat Tinggal" rows="2" disabled=""></textarea>
                				</div>
                			</div>
                		</div>
                	</div>
                  <div class="tab-pane" id="lab_1">
                    <div class="row">
                    	<div class="col-md-6">
            				<div class="form-group">
            					<label style="color:black;">No. Identitas Sediaan Dahak</label>
            					<input type="text" class="form-control" name="txtNoIdentitasSediaanDahak" id="txtNoIdentitasSediaanDahak" placeholder="No. Identitas Sediaan Dahak" disabled="">
            				</div>   
            				<div class="form-group">
            					<label style="color:black;">Tanggal Pengiriman Sediaan</label>
            					<input type="text" class="form-control datepicker" name="txtTanggalPengirimanSediaanShow" id="txtTanggalPengirimanSediaanShow" placeholder="Tanggal">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Pemeriksaan Ulang Pengobatan (Bulan Ke)</label>
            					<select class="form-control" name="txtPemeriksaanUlangPengobatan" id="txtPemeriksaanUlangPengobatan">
									<option value="0">0</option>
									<option value="2">2</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								</select>
            				</div>
            				<div class="form-group">
            					<label style="color:black;">No.Reg. TB/TB MDR Faskes</label>
            					<input type="text" class="form-control" name="txtNoRegTBMDRFaskes" id="txtNoRegTBMDRFaskes" value="" placeholder="No.Reg. TB/TB MDR Faskes">
            				</div>
            			</div>
                    	<div class="col-md-6">
            				<div class="form-group">
            					<label style="color:black;">Tanggal Pengambilan Dahak Terakhir</label>
            					<input type="text" class="form-control datepicker" name="txtTanggalPengambilanDahakTerakhirShow" id="txtTanggalPengambilanDahakTerakhirShow" placeholder="Tanggal">
            				</div>                        
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Alasan Pemeriksaan</label>
            					<div class="radio">
	        						<label style="color: black; margin-right: 50px;margin-left: -10px;">
	        							<input type="radio" value="Diagnosis" name="optAlasanPemeriksaan" id="alasan_pemeriksaan" class="flat-red">Diagnosis
	        						</label>
	        						<label style="color: black;">
	        							<input type="radio" value="Kriteria Terduga TB MDR" name="optAlasanPemeriksaan" class="flat-red">Kriteria Terduga TB MDR
	        						</label>
	        					</div>
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Pemeriksaan Ulang Pasca Pengobatan (Bulan Ke)</label>
            					<select class="form-control" name="txtPemeriksaanUlangPascaPengobatan" id="txtPemeriksaanUlangPascaPengobatan">
									<option value="0">0</option>
									<option value="2">2</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								</select>
            				</div>
            				<div class="form-group">
            					<label style="color:black;">No.Reg. TB/TB MDR Kab/Kota</label>
            					<input type="text" class="form-control" name="txtNoRegTBMDRKab" id="txtNoRegTBMDRKab" value="{{$faskes->kode}}" placeholder="No.Reg. TB/TB MDR Kab/Kota">
            				</div>
                    	</div>
                    </div>
                  </div>
                  <div class="tab-pane" id="lab_2">
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Jenis Terduga</label>
            					<div class="radio">
	        						<label style="color: black; margin-right: 50px;margin-left: -10px;">
	        							<input type="radio" name="jenis_terduga" class="flat-red" value="TB" checked>
	        							TB
	        						</label>
	        						<label style="color: black;margin-right: 50px">
	        							<input type="radio" name="jenis_terduga" class="flat-red" value="TB ANAK">
	        							TB Anak
	        						</label>
	        						<label style="color: black;margin-right: 50px">
	        							<input type="radio" name="jenis_terduga" class="flat-red" value="TB HIV">
							            TB HIV
	        						</label>
	        						<label style="color: black;margin-right: 50px">
	        							<input type="radio" name="jenis_terduga" class="flat-red" value="TB MDR">
							            TB MDR
	        						</label>
	        					</div>
            				</div>
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Jenis dan Jumlah Pemeriksaan</label>
            					<div class="radio">
	        						<label style="color: black; margin-right: 50px;margin-left: -10px;">
	        							<input type="radio" name="jenis_dan_jumlah_pemeriksaan" class="flat-red" checked value="Tes Cepat">
							            Tes Cepat
	        						</label>
	        						<label style="color: black;margin-right: 50px">
	        							<input type="radio" name="jenis_dan_jumlah_pemeriksaan" class="flat-red" value="BTA">
										BTA
	        						</label>
	        						<label style="color: black;margin-right: 50px">
	        							<input type="radio" name="jenis_dan_jumlah_pemeriksaan" class="flat-red" value="Biakan">
							            Biakan
	        						</label>
	        						<label style="color: black;margin-right: 50px">
	        							<input value="Kepekaan Lini 1" type="radio" name="jenis_dan_jumlah_pemeriksaan" class="flat-red">
							            Kepekaan Lini 1
	        						</label>
	        						<label style="color: black;margin-right: 50px">
	        							<input value="Kepekaan Lini 2" type="radio" name="jenis_dan_jumlah_pemeriksaan" class="flat-red">
							            Kepekaan Lini 2
	        						</label>
	        					</div>
            				</div>
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Klasifikasi Penyakit</label>
            					<div class="radio">
	        						<label style="color: black; margin-right: 50px;margin-left: -10px;">
	        							<input value="Paru" type="radio" name="klasifikasi_penyakit" class="flat-red" checked>
							            Paru
	        						</label>
	        						<label style="color: black;">
	        							<input value="Extra Paru" type="radio" name="klasifikasi_penyakit" class="flat-red">
							            Extra Paru
	        						</label>
	        					</div>
            				</div>
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Lokasi</label>
            					<input type="text" class="form-control" name="txtLokasi" id="txtLokasi" value="" placeholder="Lokasi">
            				</div>
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Status HIV</label>
            					<div class="radio">
	        						<label style="color: black; margin-right: 50px;margin-left: -10px;">
	        							<input value="Negatif" type="radio" name="optHIV" class="flat-red" checked>
							            Negatif
	        						</label>
	        						<label style="color: black;margin-right: 50px">
	        							<input value="Positif" type="radio" name="optHIV" class="flat-red">
							            Positif
	        						</label>
	        						<label style="color: black;">
	        							<input value="Tidak diketahui" type="radio" name="optHIV" class="flat-red">
							            Tidak diketahui
	        						</label>
	        					</div>
            				</div>
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Tipe Spesimen</label>
            					<div class="radio">
	        						<label style="color: black; margin-right: 50px;margin-left: -10px;">
	        							<input value="Dahak" type="radio" name="optSpesimen" class="flat-red" checked>
							            Dahak
	        						</label>
	        						<label style="color: black;">
	        							<input value="Lainnya" type="radio" name="optSpesimen" class="flat-red">
							            Lainnya
	        						</label>
	        					</div>
            				</div>
                    	</div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tampak_visual_dahak">
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Nanah Lendir</label>
            					<div class="checkbox">
	        						<label style="color: black; margin-right: 50px;">
	        							<input type="checkbox" name="chkNanahLendir0" class="flat-red">
							            S
	        						</label>
	        						<label style="color: black;margin-right: 50px;">
	        							<input type="checkbox" name="chkNanahLendir1" class="flat-red">
							            P
	        						</label>
	        						<label style="color: black;margin-right: 50px;	">
	        							<input type="checkbox" name="chkNanahLendir2" class="flat-red">
							        	S
	        						</label>	        						
	        					</div>
            				</div>
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Bercak Darah</label>
            					<div class="checkbox">
	        						<label style="color: black; margin-right: 50px;">
	        							<input type="checkbox" class="flat-red" name="chkBercakDarah0">
							            S
	        						</label>
	        						<label style="color: black;margin-right: 50px;">
	        							<input type="checkbox" class="flat-red" name="chkBercakDarah1">
							            P
	        						</label>
	        						<label style="color: black;margin-right: 50px;	">
	        							<input type="checkbox" class="flat-red" name="chkBercakDarah2">
							            S
	        						</label>
	        					</div>
            				</div>
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Air Liur</label>
            					<div class="checkbox">
	        						<label style="color: black; margin-right: 50px;">
	        							<input type="checkbox" class="flat-red" name="chkAirLiur0">
							            S
	        						</label>
	        						<label style="color: black;margin-right: 50px;">
	        							<input type="checkbox" class="flat-red" name="chkAirLiur1">
							            P
	        						</label>
	        						<label style="color: black;margin-right: 50px;	">
	        							<input type="checkbox" class="flat-red" name="chkAirLiur2">
							            S
	        						</label>
	        					</div>
            				</div>
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Tanggal</label>
            					<input type="text" class="form-control datepicker" name="txtTanggalTampakVisualShow" id="txtTanggalTampakVisualShow" value="" placeholder="Tanggal">
            				</div>
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Nama Jelas Dokter Pengirim</label>
            					<input type="text" class="form-control" name="txtNamaDokterPengirim" id="txtNamaDokterPengirim" value="" placeholder="Nama Jelas Dokter Pengirim">
            				</div>
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

		      	$('#txtKabupaten').val(data.kota);

		      	$('#txtPropinsi').val('DKI Jakarta');

		      	$('#txtNoIdentitasSediaanDahak').val(data.no_identitas_sediaan_dahak);

		      	if (data.jenis_kelamin == 'pria') {

		      		$("#pria").prop('checked',true);

		      	}else{

		      		$("#wanita").prop('checked',true);

		      	}

		      }

		   }

		);

	});

	$('.select2').select2()

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


</script>

<script type="text/javascript">
	function validasiSimpan(event)
	{
		event.preventDefault();

		nama_faskes = $("#cmbNamaFaskes").val();
		nama_tim_ahli_klinis = $("#cmbNamaTimAhliKlinis").val();
		nama_pasien = $("#select_pasien").val();
		is_error = false

		$("#error_cmb_nama_faskes").html('');
		$("#error_cmb_nama_tim_ahli_klinis").html('');
		$("#error_select_pasien").html('');

		if( (is_error === false) && (nama_faskes === "") )
		{
			$("#error_cmb_nama_faskes").html('<font color="red">Pilih Nama Faskes</font>');
			$( document ).ready(function() {
			    MoveTab();
			});
			is_error = true;
		}

		if( (is_error === false) && (nama_tim_ahli_klinis === "") )
		{
			$("#error_cmb_nama_tim_ahli_klinis").html('<font color="red">Pilih Nama Tim Ahli Klinis</font>');
			$( document ).ready(function() {
			    MoveTab();
			});
			is_error = true;
			$("#error_cmb_nama_faskes").html('');
		}

		if( (is_error === false) && (nama_pasien === "") )
		{
			$("#error_select_pasien").html('<font color="red">Pilih Nama Pasien</font>');
			$( document ).ready(function() {
			    MoveTab();
			});
			is_error = true;
			$("#error_cmb_nama_faskes").html('');
			$("#error_cmb_nama_tim_ahli_klinis").html('');
		}

		if( (is_error === false) )
		{
			document.getElementById("form_tb05").submit();
		}	
	}
	function MoveTab()
    {
        $('#child a[href="#tab_1"]').tab('show');
	    window.scrollTo(0,0);
    }
</script>
@endsection