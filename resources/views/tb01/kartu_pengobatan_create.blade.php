@extends('layouts.app')
@section('content')
<style type="text/css">
	.select2-dropdown { z-index: 9999 }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		TB01<small>Kartu Pengobatan Pasien TB - {{$nama_faskes->nama_faskes->nama}}</small>					
	</h1>
	<ol class="breadcrumb">
		<li><a href="http://siporter.puskesmasjoharbaru.com/tb01#"><i class="fa fa-dashboard"></i> Formulir</a></li>
		<li class="active">TB01</li>
	</ol>
</section>
<section class="content"><!-- Main content -->
	<div class="row"><span id="spGagal"></span>
	<div class="col-md-12"><!-- Custom Tabs -->
		<h3 class="box-title">Kartu Pengobatan Pasien TB<br>&nbsp;</h3>
		<a class="btn btn-info" data-toggle="modal" data-target="#mdlRegLab">Pasien Baru</a>
		  <br><br>
		<form class="form-inline" action="/tb01/search" method="GET">
		  <div class="form-group">
		    <input type="text" class="form-control datepicker" id="start_date" name="start_date" placeholder="Start Date" required>
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control datepicker" id="end_date" name="end_date" placeholder="End Date" required>
		  </div>
		  <button type="submit" class="btn btn-default" name="action" value="filter">Filter</button>

<!-- 		  <button type="submit" class="btn btn-default">Submit</button>
		<a class="btn btn-info" id="print-tb01" href="/tb01/prints" target="_blank"><i class="fa fa-print"></i>  Cetak</a> -->
		</form>
		<span class="bg-red hidden" id="lblStatus">&nbsp;&nbsp;Data ini belum terdaftar di TB01!&nbsp;&nbsp;</span><br>&nbsp;<br>
		<form class="form-horizontal" method="post" action="/tb01/create">
			{{ csrf_field() }}
			<div class="nav-tabs-custom">
				<ul id="tabs" class="nav nav-tabs">
					<li class="active"><a href="#tab_2" data-toggle="tab">Pasien TB01<i id="tData1" class="fa fa-close text-red invisible"></i></a></li>
	 				<li><a href="#tab_3" data-toggle="tab">I<i id="tData2" class="fa fa-check-square-o text-green invisible"></i></a></li>
					<li><a href="#tab_4" data-toggle="tab">II<i id="tData3" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_5" data-toggle="tab">Kontak<i id="tData4" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_6" data-toggle="tab">Tahap Intensif<i id="tData5" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_7" data-toggle="tab">Hasil Pemeriksaan Dahak<i id="tData6" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_8" data-toggle="tab">Konseling dan PDP<i id="tData7" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_9" data-toggle="tab">Tahap Awal<i id="tData7" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_10" data-toggle="tab">Tahap Lanjutan<i id="tData7" class="fa fa-close text-red invisible"></i></a></li>
				</ul>
				<div class="tab-content">								
					<div class="tab-pane active" id="tab_2">
						<div class="box box-info">
							<div class="box-header with-border"></div>
							<div class="box-body">
								<table id="example2" class="table table-bordered table-striped">
						            <thead>
										<tr role="row">
											<th class="sorting_disabled edit" rowspan="1" colspan="1" style="width: 0px;">No.</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">NIK</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">Nama Lengkap</th>
											<th class="sorting_disabled tanggal_show" rowspan="1" colspan="1" style="width: 0px;">Jenis Kelamin</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">Umur</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">Alamat</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">Tindakan</th>
										</tr>
									</thead>
						            <tbody>
						            	@foreach ($data_kartu_pengobatan as $key => $pasien)
						            	@if (!empty($pasien->daftar_terduga))
							            <tr>
							            	<td>{{$key+1}}</td>
							            	<td>{{$pasien->daftar_terduga['nik']}}</td>
							            	<td>{{$pasien->daftar_terduga['nama_lengkap']}}</td>
							            	<td>{{$pasien->daftar_terduga['jenis_kelamin']}}</td>
							            	<td>{{$pasien->daftar_terduga['umur']}}</td>
							            	<td>{{$pasien->daftar_terduga['alamat']}}</td>
							            	<td>
							            		<a href="/tb01/{{$pasien->id}}/edit" id="de_1">
													<i class="fa fa-edit text-blue"></i>
												</a>&nbsp;
												<a class="btnDelete" href="/tb01/prints/{{$pasien->id}}" target="_blank" id="de_1">
													<i class="fa fa-print text-blue"></i>
												</a>&nbsp;
												<a><i class="delete-modal fa fa-trash text-red" data-id="{{$pasien->id}}" style="margin-right: 10px;cursor: pointer;"></i></a>
											</td>
							            </tr>
							            @endif
							            @endforeach
						            </tbody>
					      		</table>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div>
										<!-- /.tab_2 -->
					<div class="tab-pane" id="tab_3">
						<div class="box box-info">
							<!-- Button: Pasien Baru, Berikutnya --><!--region-->
							<div class="box-header with-border">
								<table class="pull-right">
									<tbody><tr>
										<td></td>
										<td>&nbsp;&nbsp;</td>
										<!-- <td><a data-toggle="modal" data-target="#mdlRegLab" class="btn btn-info" id="btnNewPatient">Pasien Baru</a>&nbsp;&nbsp;</td> -->
										<td><a class="btn btn-success btn-next-child">Berikutnya</a></td>
									</tr>
								</tbody></table>
							</div>
							<!--endregion-->

							<div class="box-body">
								<!-- NIK --><!--region-->
								<div class="form-group" id="nik-group">
									<label for="txtNamaPMO" class="col-sm-2 control-label" style="text-align: left;">Pilih Pasien</label>

									<div class="col-sm-4">
										
										<select class="form-control select2" name="permohonan_lab_id" id="select_pasien" style="width: 100%;">
							                  <option value="">Pilih Pasien</option>
							                  @foreach ($pasiens as $pasien)
							                  <option value="{{$pasien->id}}">{{$pasien->no_reg_lab}} - {{$pasien->daftar_terduga['nama_lengkap']}}</option>
							                  @endforeach
							                </select>
									</div>
										<input type="hidden" name="pasien_id" id="pasien_id">
									<label for="txtNIK" class="col-sm-2 control-label" style="text-align: left;">NIK</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtNIK" id="txtNIK" maxlength="16" placeholder="NIK" readonly>
										</div>
										<span class="help-block" id="nik-help-block"></span>
									</div>
								</div>
								<!--endregion-->

								<!-- Nama Lengkap, Nama PMO --><!--region-->
								<div class="form-group">
									<label for="txtNamaLengkap" class="col-sm-2 control-label" style="text-align: left;">Nama Pasien</label>

									<div class="col-sm-4">
										<input type="text" class="form-control" name="txtNamaLengkap" id="txtNamaLengkap" placeholder="Nama Pasien" readonly>
									</div>
									<label for="txtNamaPMO" class="col-sm-2 control-label" style="text-align: left;">Nama PMO</label>

									<div class="col-sm-4">
										<input type="text" class="form-control" name="txtNamaPMO" id="txtNamaPMO" placeholder="Nama PMO">
									</div>

								</div>
								<!--endregion-->

								<!-- Telp, Telp PMO --><!--region-->
								<div class="form-group">
									<label for="txtTelp" class="col-sm-2 control-label" style="text-align: left;">Telp./HP</label>

									<div class="col-sm-4">
										<input type="text" class="form-control" name="txtTelp" id="txtTelp" placeholder="Telp./HP Pasien">
									</div>
									<label for="txtTelpPMO" class="col-sm-2 control-label" style="text-align: left;">Telp./HP PMO</label>

									<div class="col-sm-4">
										<input type="text" class="form-control" name="txtTelpPMO" id="txtTelpPMO" placeholder="Telp./HP PMO">
									</div>
								</div>
								<!--endregion-->

								<!-- Alamat, Alamat PMO --><!--region-->
								<div class="form-group">
									<label for="txtAlamat" class="col-sm-2 control-label" style="text-align: left;">Alamat Lengkap</label>

									<div class="col-sm-4">
										<textarea class="form-control" name="txtAlamat" id="txtAlamat" placeholder="Alamat Rumah / Tempat Tinggal" rows="2" readonly></textarea>
									</div>

									<label for="txtAlamatPMO" class="col-sm-2 control-label" style="text-align: left;">Alamat PMO</label>

									<div class="col-sm-4">
										<textarea class="form-control" name="txtAlamatPMO" id="txtAlamatPMO" placeholder="Alamat Rumah / Tempat Tinggal PMO" rows="2"></textarea>
									</div>
								</div>
								<!--endregion-->

								<!-- Jenis Kelamin, Umur --><!--region-->
								<div class="form-group">
									<label for="optKelamin" class="col-sm-2 control-label" style="text-align: left;">Jenis Kelamin</label>

									<div class="col-sm-4">
										<label>
							                    <input type="radio" name="jenis_kelamin" id="pria" class="flat-red" value="pria" disabled="">
							                    Pria
							                  </label>
							                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							                  <label>
							                    <input value="wanita" type="radio" name="jenis_kelamin" id="wanita" class="flat-red" disabled="">
							                    Wanita
							                  </label>	
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</div>

									<label for="txtUmur" class="col-sm-2 control-label" style="text-align: left;">Umur</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtUmur" id="txtUmur" placeholder="Umur" readonly>
										<span class="input-group-addon"> tahun</span>
										</div>
									</div>
								</div>
								<!--endregion-->

							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div><!-- /.tab_2 -->										
					<div class="tab-pane" id="tab_4">
						<div class="box box-info">
							<!-- BoxHeader, Button: Kembali, Berikutnya --><!--region-->
							<div class="box-header with-border">
								<table class="pull-right">
									<tbody><tr>
										<td></td>
										<td>&nbsp;&nbsp;</td>
										<td><a class="btn btn-danger btn-prev-child">Kembali</a></td>
										<td>&nbsp;&nbsp;</td>
										<td><a class="btn btn-success btn-next-child">Berikutnya</a></td>
									</tr>
								</tbody></table>
							</div>
							<!--endregion-->
							<div class="box-body">
									<!-- Tahun, Nama UPK --><!--region-->
									<div class="form-group">
										<label for="txtTahun" class="col-sm-2 control-label" style="text-align: left;">Tahun</label>

										<div class="col-sm-4">
											<input type="text" class="form-control datepicker" name="txtTahun" id="txtTahun" placeholder="Tahun">
										</div>
										<label for="txtNamaUPK" class="col-sm-2 control-label" style="text-align: left;">Nama UPK</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="txtNamaUPK" id="txtNamaUPK" placeholder="Nama UPK">
										</div>
									</div>
									<!--endregion-->

									<!-- No. Reg. TB03 UPK, No. Reg. TB03 Kab. --><!--region-->
									<div class="form-group">
										<label for="txtNoRegTB03UPK" class="col-sm-2 control-label" style="text-align: left;">No. Reg. TB03 UPK</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="txtNoRegTB03UPK" id="txtNoRegTB03UPK" placeholder="No. Reg. TB03 UPK">
										</div>
										<label for="txtNoRegTB03Kab" class="col-sm-2 control-label" style="text-align: left;">No. Reg. TB05 Kab./Kota</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="txtNoRegTB03Kab" id="txtNoRegTB03Kab" placeholder="No. Reg. TB03 Kab./Kota">
										</div>
									</div>
									<!--endregion-->

									<hr style="border: 1px grey solid;">

									<!-- Parut BCG, Riwayat Pengobatan Sebelumnya --><!--region-->
									<div class="form-group">
										<label for="cmbBCG" class="col-sm-2 control-label" style="text-align: left;">Parut BCG</label>

										<div class="col-sm-3">
											<select class="form-control cmb" name="cmbBCG" id="cmbBCG">
												<option value="">Pilih</option>
												<option value="Tidak Ada">Tidak Ada</option>
												<option value="Ada">Ada</option>
											</select>
										</div>
										<label for="cmbRiwayat" class="col-sm-3 control-label" style="text-align: left;">Klasifikasi Berdasarkan Riwayat Pengobatan Sebelumnya</label>

										<div class="col-sm-4">
											<select class="form-control cmb" name="cmbRiwayat" id="cmbRiwayat">
												<option value="">Pilih</option>
												<option value="Baru">Baru</option>
												<option value="Diobati setelah Gagal">Diobati setelah Gagal</option>
												<option value="Kambuh">Kambuh</option>
												<option value="Diobat Setelah Putus Berobat">Diobat Setelah Putus Berobat</option>
												<option value="Riwayat Pengobatan Sebelumnya Tidak Diketahui">Riwayat Pengobatan Sebelumnya Tidak Diketahui</option>
												<option value="Lain-Lain">Lain-Lain</option>

											</select>
										</div>
									</div>
									<!--endregion-->

									<!-- Klasifikasi Penyakit, Lokasi --><!--region-->
									<div class="form-group">
										<label for="cmbKlasifikasi" class="col-sm-2 control-label" style="text-align: left;">Klasifikasi Berdasarkan Lokasi Anatomi</label>

										<div class="col-sm-3">
											<select class="form-control cmb" name="cmbKlasifikasi" id="cmbKlasifikasi">
												<option value="">Pilih</option>
												<option value="Paru">Paru</option>
												<option value="Ekstra Paru">Ekstra Paru</option>
											</select>
										</div>
										<label for="txtLokasi" class="col-sm-3 control-label" style="text-align: left;">Lokasi</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="txtLokasi" id="txtLokasi" placeholder="Lokasi">
										</div>
									</div>
									<!--endregion-->
									<!-- Klasifikasi Penyakit, Lokasi --><!--region-->
									<div class="form-group">
										<label for="cmbKlasifikasi" class="col-sm-2 control-label" style="text-align: left;">Tipe Diagnosis</label>

										<div class="col-sm-3">
											<select class="form-control cmb" name="tipeDiagnosis" id="tipeDiagnosis">
												<option value="">Pilih</option>
												<option value="Terkontaminasi Bakteriologis">Terkontaminasi Bakteriologis</option>
												<option value="Terdiagnosis Klinis">Terdiagnosis Klinis</option>
											</select>
										</div>
										<label for="txtLokasi" class="col-sm-3 control-label" style="text-align: left;">Klasifikasi Berdasarkan Riwaat Status HIV</label>

										<div class="col-sm-4">
											<select class="form-control cmb" name="status_hiv" id="status_hiv">
												<option value="">Pilih</option>
												<option value="Positif">Positif</option>
												<option value="Negatif">Negatif</option>
												<option value="Tidak Diketahui">Tidak Diketahui</option>
											</select>
										</div>
									</div>
									<!--endregion-->
									<!-- Dropdown: Dirujuk Oleh, Tipe Pasien --><!--region-->
									<div class="form-group">
										<label for="cmbDirujuk" class="col-sm-2 control-label" style="text-align: left;">Dirujuk oleh</label>

										<div class="col-sm-3">
											<select class="form-control cmb" name="cmbDirujuk" id="cmbDirujuk">
												<option value="">Pilih</option>
												<option value="Inisiatif Pasien / Keluarga">Inisiatif Pasien / Keluarga</option>
												<option value="Anggota Masyarakat">Anggota Masyarakat</option>
												<option value="Faskes">Faskes</option>
												<option value="Dokter Praktek Mandiri">Dokter Praktek Mandiri</option>
												<option value="Poli">Poli</option>
												<option value="Lainnya">Lainnya</option>
											</select>
										</div>
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Uji Tuberkulin</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="uji_tuberkulin" id="uji_tuberkulin" placeholder="Uji Tuberkulin">
										</div>
									</div>
									<!--endregion-->

									<!-- Text: Dirujuk Oleh, Tipe Pasien --><!--region-->
									<div class="form-group">
										<label for="txtDirujuk" class="col-sm-2 control-label dirujuk" style="text-align: left; display: none;">Sebutkan</label>

										<div class="col-sm-3 dirujuk" style="display: none;">
											<input type="text" class="form-control" name="txtDirujuk" id="txtDirujuk" placeholder="Dirujuk  Oleh">
										</div>
									</div>
									<!--endregion-->

									<!-- Dropdown: Dirujuk Oleh, Tipe Pasien --><!--region-->
									<div class="form-group">
										<label for="cmbDirujuk" class="col-sm-2 control-label" style="text-align: left;">Nomor Seri</label>

										<div class="col-sm-3">
											<input type="text" class="form-control" name="nomor_seri" id="nomor_seri" placeholder="Nomor Seri">
										</div>										
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Foto Toraks</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="foto_toraks" id="foto_toraks" placeholder="Foto Toraks">
										</div>
									</div>

									<!-- Dropdown: Dirujuk Oleh, Tipe Pasien --><!--region-->
									<div class="form-group">
										<label for="cmbDirujuk" class="col-sm-2 control-label" style="text-align: left;">Biopsi Jarum Halus (FNAB)</label>

										<div class="col-sm-3">
											<input type="text" class="form-control" name="biopsi_jarum" id="biopsi_jarum" placeholder="Biopsi Jarum Halus (FNAB)">
										</div>										
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Kesan</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="kesan" id="kesan" placeholder="Kesan">
										</div>
									</div>
									<!--endregion-->

									<!-- Dropdown: Dirujuk Oleh, Tipe Pasien --><!--region-->
									<div class="form-group">
										<label for="cmbDirujuk" class="col-sm-2 control-label" style="text-align: left;">Biakan Hasil Contoh Uji Selain Dahak</label>

										<div class="col-sm-3">
											<select class="form-control cmb" name="contoh_uji_selain_dahak" id="contoh_uji_selain_dahak">
												<option value="">Pilih</option>
												<option value="MTB">MTB</option>
												<option value="Bukan MTB">Bukan MTB</option>
											</select>
										</div>
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Hasil</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="txthasil" id="txthasil" placeholder="Hasil">
										</div>
									</div>
									<!--endregion-->
									<!-- Text: Dirujuk Oleh, Tipe Pasien --><!--region-->
									<div class="form-group">
										<label for="txtDirujuk" class="col-sm-2 control-label sebutkanBiiakanHasil" style="text-align: left; display: none;">Sebutkan Biakan Hasil Contoh Uji Selain Dahak</label>

										<div class="col-sm-3 sebutkanBiiakanHasil" style="display: none;">
											<input type="text" class="form-control sebutkanBiiakanHasil" name="sebutkan_biakan_hasil_contoh_uji_selain_dahak" id="sebutkan_biakan_hasil_contoh_uji_selain_dahak" placeholder="Sebutkan Biakan Hasil Contoh Uji Selain Dahak">
										</div>
									</div>
									<div class="form-group">
										<label for="cmbTipePasien" class="col-sm-2 control-label" style="text-align: left;">Riwayat DM</label>

										<div class="col-sm-3">
											<select class="form-control cmb" name="riwayat_dm" id="riwayat_dm">
												<option value="">Pilih</option>
												<option value="Ya">Ya</option>
												<option value="Tidak">Tidak</option>
											</select>
										</div>
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Hasil Tes DM</label>

										<div class="col-sm-4">
											<select class="form-control cmb" name="hasil_tes_dm" id="hasil_tes_dm">
												<option value="">Pilih</option>
												<option value="Positif">Positif</option>
												<option value="Negatif">Negatif</option>
											</select>
										</div>
									</div>
									<!--endregion-->

									<!--endregion-->

									<div class="form-group">
										
										<label for="cmbTipePasien" class="col-sm-2 control-label" style="text-align: left;">Terapi DM</label>

										<div class="col-sm-3">
											<select class="form-control cmb" name="terampil_dm" id="terampil_dm">
												<option value="">Pilih</option>
												<option value="OHO">OHO</option>
												<option value="Inj. Insulin">Inj. Insulin</option>
											</select>
										</div>
										<label for="cmbTipePasien" class="col-sm-3 control-label" style="text-align: left;">Tipe Pasien</label>

										<div class="col-sm-4">
											<select class="form-control cmb" name="cmbTipePasien" id="cmbTipePasien">
												<option value="">Pilih</option>
												<option value="Baru">Baru</option>
												<option value="Pindahan">Pindahan</option>
												<option value="Pengobatan setelah default">Pengobatan setelah default</option>
												<option value="Kambuh">Kambuh</option>
												<option value="Gagal">Gagal</option>
												<option value="Lain-lain">Lain-lain</option>
											</select>
										</div>
									</div>
									<!--endregion-->

									<div class="form-group" id="tipePasienLainya" style="display: none;">
										
										<label for="txtTipePasien" class="col-sm-2 control-label tipePasien" style="text-align: left; ">Sebutkan Tipe Pasien</label>

										<div class="col-sm-3 tipePasien" style="">
										<input type="text" class="form-control" name="txtTipePasien" id="txtTipePasien" placeholder="Tipe Pasien">
										</div>
									</div>
									<!--endregion-->

									<div class="form-group tipePasienPindahan" style="display: none;">
										<label for="cmbTipePasien" class="col-sm-2 control-label" style="text-align: left;">Nama Faskes</label>

										<div class="col-sm-3">
											<input type="text" class="form-control" name="nama_faskes_pindahan" id="nama_faskes_pindahan" placeholder="Nama Faskes">
										</div>
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Kab / Kota</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="kabupaten_pindahan" id="kabupaten_pindahan"  placeholder="Kab / Kota">
										</div>
									</div>
									<!--endregion-->
									<div class="form-group tipePasienPindahan" style="display: none;">
										<label for="cmbTipePasien" class="col-sm-2 control-label" style="text-align: left;">Alamat Faskes</label>

										<div class="col-sm-3">
											<textarea class="form-control" name="alamat_faskes_pindahan" placeholder="Alamat Faskes"></textarea>
										</div>
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Provinsi</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="provinsi_pindahan" id="provinsi_pindahan"  placeholder="Provinsi">
										</div>
									</div>
									<!--endregion-->

							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div>										
					<div class="tab-pane" id="tab_5">
						<div class="box box-info">
							<!-- BoxHeader, Button: Kembali, Berikutnya --><!--region-->
							<div class="box-header with-border">
								<table class="pull-right">
									<tbody>
										<tr>
											<td>Kontak Erat Dengan Anak</td>
											<td>:</td>
											<td><input type="text" class="form-control" name="kontak_erat" id="kontak_erat"  placeholder="Kontak Erat"></td>
											<td><a class="btn btn-info" id="btnAddRow" onclick="AddRow()">Tambah Kontak Serumah</a></td>
											<td>&nbsp;&nbsp;</td>
											<td><a class="btn btn-danger btn-prev-child">Kembali</a></td>
											<td>&nbsp;&nbsp;</td>
											<td><a class="btn btn-success btn-next-child">Berikutnya</a></td>
										</tr>
									</tbody>
								</table>
							</div>
							<!--endregion-->
							<div class="box-body">
								<table id="kontak_serumah" class="table table-bordered table-striped">
						            <thead>
										<tr role="row">
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">Nama Lengkap</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">Jenis Kelamin</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">Umur</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">Tanggal Periksa</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">Hasil</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">Tindak Lanjut</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">Action</th>
										</tr>
									</thead>
						            <tbody>
							</tbody>
					      </table>
					</div>
						</div><!-- /.box-body -->
					</div><!-- /.box -->										
					<div class="tab-pane" id="tab_6">
						<div class="box box-info">
							<!-- BoxHeader, Button: Kembali, Berikutnya --><!--region-->
							<div class="box-header with-border">
								<table class="pull-right">
									<tbody><tr>
										<td></td>
										<td>&nbsp;&nbsp;</td>
										<td><a class="btn btn-danger btn-prev-child">Kembali</a></td>
										<td>&nbsp;&nbsp;</td>
										<td><a class="btn btn-success btn-next-child">Berikutnya</a></td>
									</tr>
								</tbody></table>
							</div>
							<!--endregion-->
							<div class="box-body">
								<!-- Jenis OAT, Tahap Intensif --><!--region-->
								<div class="form-group">
									<label for="cmbJenisOAT" class="col-sm-2 control-label" style="text-align: left;">Bentuk OAT</label>
									<div class="col-sm-4">
										<select class="form-control cmb" name="cmbJenisOAT" id="cmbJenisOAT">
											<option value="">Pilih</option>
											<option value="KDT (FDC)">KDT (FDC)</option>
											<option value="Kombipak / Obat Lepas">Kombipak / Obat Lepas</option>
										</select>
									</div>

									<label for="cmbTahapIntensif" class="col-sm-2 control-label" style="text-align: left;">Paduan OAT</label>
									<div class="col-sm-4" id="">
										<select class="form-control cmb" name="cmbTahapIntensif" id="cmbTahapIntensif">
											<option value="">Pilih</option>
											<option value="Kategori 1">Kategori 1</option>
											<option value="Kategori 2">Kategori 2</option>
											<option value="Kategori Anak">Kategori Anak</option>
										</select>
									</div>
								</div>
								<!--endregion-->

								<!-- Catatan --><!--region-->
								<div class="form-group">
									<label for="txtCatatan" class="col-sm-2 control-label" style="text-align: left;">Catatan</label>

									<div class="col-sm-10">
										<textarea class="form-control" name="txtCatatan" id="txtCatatan" placeholder="Catatan" rows="2"></textarea>
									</div>
								</div>
								<!--endregion-->

								<!-- EKDT, Strep --><!--region-->
								<div class="form-group">
									<label for="txtEKDT" class="col-sm-2 control-label" style="text-align: left;">4KDT (FDC)</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtEKDT" id="txtEKDT" min="0">
										<span class="input-group-addon"> tablet/hari</span>
										</div>
									</div>
									<label for="txtStrep" class="col-sm-2 control-label" style="text-align: left;">Streptomisin</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtStrep" id="txtStrep" min="0">
										<span class="input-group-addon"> mg/hari</span>
										</div>
									</div>
								</div>
								<!--endregion-->

								<!-- DKDT, Etham --><!--region-->
								<div class="form-group">
									<label for="txtDKDT" class="col-sm-2 control-label" style="text-align: left;">2KDT (FDC)</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtDKDT" id="txtDKDT" min="0">
										<span class="input-group-addon"> tablet/hari</span>
										</div>
									</div>
									<label for="txtEtham" class="col-sm-2 control-label" style="text-align: left;">Ethambutol</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtEtham" id="txtEtham" min="0">
										<span class="input-group-addon"> tablet/hari</span>
										</div>
									</div>
								</div>
								<!--endregion-->
								<div class="form-group">
									<label for="cmbJenisOAT" class="col-sm-2 control-label" style="text-align: left;">Sumber Obat</label>
									<div class="col-sm-4">
										<select class="form-control cmb" name="sumber_obat" id="sumber_obat">
											<option value="">Pilih</option>
											<option value="Program TB">Program TB</option>
											<option value="Bayar Sendiri">Bayar Sendiri</option>
											<option value="Asuransi">Asuransi</option>
											<option value="Lain-lain">Lain-lain</option>
										</select>
									</div>

									<div id="sumberObatLainLain" style="display: none;">
									<label for="cmbTahapIntensif" class="col-sm-2 control-label" style="text-align: left;">Sumber Obat Lain - Lain</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="sumber_obat_lain_lain" id="sumber_obat_lain_lain" placeholder="Sumber Obat">
									</div>
									</div>
								</div>
							</div>
						</div><!-- /.box-body -->
					</div><!-- /.box -->										
					<div class="tab-pane" id="tab_7">
						<div class="box box-info">
							<!-- BoxHeader, Button: Kembali, Berikutnya --><!--region-->
							<div class="box-header with-border">
								<table class="pull-right">
									<tbody><tr>
										<td><a class="btn btn-info" id="btnRowAdd" onclick="RowAdd()">Tambah Hasil Pemeriksaan Dahak</a></td>
										<td>&nbsp;&nbsp;</td>
										<td><a class="btn btn-danger btn-prev-child">Kembali</a></td>
										<td>&nbsp;&nbsp;</td>
										<td><a class="btn btn-success btn-next-child">Berikutnya</a></td>
									</tr>
								</tbody></table>
							</div>
							<!--endregion-->
							<div class="box-body">
								<table id="hasil_pemeriksaan_dahak" class="table table-bordered table-striped">
						            <thead>
										<tr role="row">
											<th class="sorting_disabled edit" rowspan="1" colspan="1" style="width: 0px;text-align: center;">Bulan</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">Tanggal</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">No. Reg. Lab.</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">BTA</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;text-align: center;">BB (Kg)</th>
										</tr>
									</thead>
						            <tbody>
							</tbody>
					      </table>
								</div>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
					<!--region Layanan Konseling dan Test Sukarela - Layanan PDP -->										
					<div class="tab-pane" id="tab_8">
						<div class="box box-info">
							<!--region BoxHeader, Button: Kembali, Berikutnya, Simpan -->
							<div class="box-header with-border">
								<table class="pull-right">
									<tbody><tr>
										<td></td>
										<td>&nbsp;&nbsp;</td>
										<td><a class="btn btn-danger btn-prev-child">Kembali</a></td>
										<td>&nbsp;&nbsp;</td>
										<td><a class="btn btn-success btn-next-child">Berikutnya</a></td>
									</tr>
								</tbody></table>
							</div>
							<!--endregion-->

							<!--region box-body -->
							<div class="box-body">
								<!--region Tanggal Dianjurkan, Tanggal Pre Test -->
								<div class="form-group">
									<label for="txtTanggalAnjur" class="col-sm-3 control-label" style="text-align: left;">Tanggal Dianjurkan</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalAnjurShow" id="txtTanggalAnjurShow">
									</div>

									<label for="txtTanggalPreTest" class="col-sm-3 control-label" style="text-align: left;">Tanggal Pre Test</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalPreTestShow" id="txtTanggalPreTestShow">
									</div>
								</div>
								<!--endregion-->

								<!--region Tempat Test, Tanggal Test -->
								<div class="form-group">
									<label for="txtTempatTest" class="col-sm-3 control-label" style="text-align: left;">Tempat Test</label>

									<div class="col-sm-3">
										<input type="text" class="form-control" name="txtTempatTest" id="txtTempatTest" placeholder="Tempat Test">
									</div>

									<label for="txtTanggalTest" class="col-sm-3 control-label" style="text-align: left;">Tanggal Test</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalTestShow" id="txtTanggalTestShow">
									</div>
								</div>
								<!--endregion-->

								<!--region Tanggal Post Test, Hasil Test -->
								<div class="form-group">
									<label for="txtTanggalPostTest" class="col-sm-3 control-label" style="text-align: left;">Tanggal Post Test</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalPostTestShow" id="txtTanggalPostTestShow">
									</div>

									<label for="cmbHasilTest" class="col-sm-3 control-label" style="text-align: left;">Hasil Test</label>
									<div class="col-sm-3">
										<select class="form-control cmb" name="cmbHasilTest" id="cmbHasilTest">
											<option value="">Pilih</option>
											<option value="Non Reaktif (Negatif)">Non Reaktif (Negatif)</option>
											<option value="Repeated Reaktif (2 x reaktif)">Repeated Reaktif (2 x reaktif)</option>
											<option value="Initial Reaktif">Initial Reaktif</option>
											<option value="3 x Reaktif">3 x Reaktif</option>
										</select>
									</div>
								</div>
								<!--endregion-->

								<hr style="border: 1px grey solid;">

								<!--region Nama UPK -->
								<div class="form-group">
									<label for="txtPDPNamaUPK" class="col-sm-3 control-label" style="text-align: left;">Nama Faskes PDP</label>

									<div class="col-sm-9">
										<input type="text" class="form-control" name="txtPDPNamaUPK" id="txtPDPNamaUPK" placeholder="NamaUPK">
									</div>
								</div>
								<!--endregion-->

								<!--region No. Reg Pra ART, Tanggal Rujukan PDP -->
								<div class="form-group">
									<label for="txtPDPNoReg" class="col-sm-3 control-label" style="text-align: left;">No Reg Nasional</label>

									<div class="col-sm-3">
										<input type="text" class="form-control" name="txtPDPNoReg" id="txtPDPNoReg">
									</div>

									<label for="txtPDPTanggalRujukan" class="col-sm-3 control-label" style="text-align: left;">Tanggal Rujukan PDP</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtPDPTanggalRujukanShow" id="txtPDPTanggalRujukanShow">
									</div>
								</div>
								<!--endregion-->

								<!--region Tanggal Mulai PPK, Tanggal Mulai ART -->
								<div class="form-group">
									<label for="txtTanggalMulaiPPK" class="col-sm-3 control-label" style="text-align: left;">Tanggal Mulai PPK</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalMulaiPPKShow" id="txtTanggalMulaiPPKShow">
									</div>

									<label for="txtTanggalMulaiART" class="col-sm-3 control-label" style="text-align: left;">Tanggal Mulai ART</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalMulaiARTShow" id="txtTanggalMulaiARTShow">
									</div>
								</div>
								<!--endregion-->
								<div class="form-group">
									<label for="txtTanggalMulaiPPK" class="col-sm-3 control-label" style="text-align: left;">PPK</label>

									<div class="col-sm-3">
										<select class="form-control cmb" name="cmb_ppk" id="cmb_ppk">
											<option  value="">Pilih</option>
											<option  value="Ya">Ya</option>
											<option  value="Tidak">Tidak</option>
										</select>
									</div>

									<label for="txtTanggalMulaiART" class="col-sm-3 control-label" style="text-align: left;">HRT</label>

									<div class="col-sm-3">
										<select class="form-control cmb" name="cmb_hrt" id="cmb_hrt">
											<option  value="">Pilih</option>
											<option  value="Ya">Ya</option>
											<option  value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<hr style="border: 1px grey solid;">

								<!--region Hasil Akhir, Tanggal Hasil -->
								<div class="form-group">
									<label for="cmbHasilAkhir" class="col-sm-3 control-label" style="text-align: left;">Hasil Akhir Pengobatan</label>
									<div class="col-sm-3">
										<select class="form-control cmb" name="cmbHasilAkhir" id="cmbHasilAkhir">
											<option value="">Pilih</option>
											<option value="Sembuh">Sembuh</option>
											<option value="Pengobatan Lengkap">Pengobatan Lengkap</option>
											<option value="Gagal">Gagal</option>
											<option value="Meninggal">Meninggal</option>
											<option value="Putus Berobat">Putus Berobat</option>
											<option value="Tidak Dievaluasi">Tidak Dievaluasi</option>
											<option value="Pindah">Pindah</option>
											<option value="Default">Default</option>
										</select>
									</div>

									<label for="txtTanggalHasil" class="col-sm-3 control-label" style="text-align: left;">Tanggal Hasil</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalHasilShow" id="txtTanggalHasilShow">
									</div>
								</div>
								<!--endregion-->

							</div>
							<!--endregion-->
						</div>
						<!--endregion-->
					</div>
					<div class="tab-pane" id="tab_9">
						<div class="box box-info">
							<div class="box-header with-border">
								<div class="pull-right">
								<a class="btn btn-info" id="btnAddRow" onclick="row_tahap_awal()">Tambah Data</a>&nbsp;<a class="btn btn-danger btn-prev-child">Kembali</a>
								<a class="btn btn-success btn-next-child">Berikutnya</a>
								</tr>
								</div>
							</div>
							<div class="box-body table-responsive no-padding">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Bulan</th>
											<th>1</th>
											<th>2</th>
											<th>3</th>
											<th>4</th>
											<th>5</th>
											<th>6</th>
											<th>7</th>
											<th>8</th>
											<th>9</th>
											<th>10</th>
											<th>11</th>
											<th>12</th>
											<th>13</th>
											<th>14</th>
											<th>15</th>
											<th>16</th>
											<th>17</th>
											<th>18</th>
											<th>19</th>
											<th>20</th>
											<th>21</th>
											<th>22</th>
											<th>23</th>
											<th>24</th>
											<th>25</th>
											<th>26</th>
											<th>27</th>
											<th>28</th>
											<th>29</th>
											<th>30</th>
											<th>31</th>
											<th>Jumlah</th>
											<th>Berat Badan (Kg)</th>
											<th></th>			         
										</tr>
									</thead>
									<tbody id="tahap_awal">
									</tbody>
								</table>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div>

					<div class="tab-pane" id="tab_10">
						<div class="box box-info">
							<div class="box-header with-border">
								<div class="pull-right">
								<a class="btn btn-info" onclick="row_tahap_lanjutan()">Tambah Data</a>
									<a class="btn btn-danger btn-prev-child">Kembali</a>&nbsp;
								<button class="btn btn-info">Simpan</button>
								</div>
							</div>
							<div class="box-body">
								<div class="table-responsive">
				              <table id="table_tahap_lanjutan" class="table table-bordered table-striped">
				                <thead>
										<tr>
											<th>Bulan</th>
											<th>1</th>
											<th>2</th>
											<th>3</th>
											<th>4</th>
											<th>5</th>
											<th>6</th>
											<th>7</th>
											<th>8</th>
											<th>9</th>
											<th>10</th>
											<th>11</th>
											<th>12</th>
											<th>13</th>
											<th>14</th>
											<th>15</th>
											<th>16</th>
											<th>17</th>
											<th>18</th>
											<th>19</th>
											<th>20</th>
											<th>21</th>
											<th>22</th>
											<th>23</th>
											<th>24</th>
											<th>25</th>
											<th>26</th>
											<th>27</th>
											<th>28</th>
											<th>29</th>
											<th>30</th>
											<th>31</th>
											<th>Jumlah</th>
											<th>Berat Badan (Kg)</th>
											<th></th>			         
										</tr>
									</thead>
									<tbody id="tahap_lanjutan">
									</tbody>
				              </table>
				              </div>
				            </div>
						</div><!-- /.box -->
					</div>
					<!--endregion-->				
				</div>
			</div>
		</form>
		<!-- form -->
	</div><!-- /.col -->
</div>

<div class="modal modal-success fade" id="mdlTahap">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</a>
				<h4 class="modal-title">Pilih Tahap Intensif Pasien</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" onsubmit="return false;">
					<div class="form-group" id="grpTahap">
					<!-- Hasil --><!--region-->
						<label for="cmbTahap" class="col-sm-4 control-label" style="text-align: left;">Tahap Intensif</label>
						<div class="control col-sm-7">
							<select class="form-control" name="cmbTahap" id="cmbTahap">
								<option disable=""></option>
								<option value="Kategori 1">Kategori 1</option>
								<option value="Kategori 2">Kategori 2</option>
							</select>
						</div>
					</div>
					<!--endregion-->
				</form>
			</div>
			<div class="modal-footer">
				<a class="btn btn-outline pull-left" id="btnBatalTa" data-dismiss="modal">Batal</a>
				<a class="btn btn-outline" id="btnSimpanTa">Simpan</a>
			</div>
		</div>
	</div>
</div>				
</section><!-- /.Main content -->

<div class="modal modal-primary fade" id="mdlSerumah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</a>
				<h4 class="modal-title">Tambah Kontak Serumah</h4>
			</div>
			<div class="modal-body">

				<!-- NIK --><!--region-->
				<div class="form-group" id="grpNIKs">
					<label for="txtNIKs" class="col-sm-4 control-label" style="text-align: left;">NIK</label>
					<div class="control col-sm-7">
						<input type="text" class="form-control" name="txtNIKs" id="txtNIKs" maxlength="16" placeholder="Nomor Induk Kependudukan">
					</div>
				</div>
				<!--endregion-->

				<!-- Nama Lengkap --><!--region-->
				<div class="form-group" id="grpNamaLengkaps">
					<label for="txtNamaLengkaps" class="col-sm-4 control-label" style="text-align: left;">Nama Lengkap</label>
					<div class="control col-sm-7">
						<input type="text" class="form-control" name="txtNamaLengkaps" id="txtNamaLengkaps" maxlength="77" placeholder="Nama Lengkap">
						<span class="help-inline text-red" id="lblNamaLengkaps"></span>
					</div>
				</div>
				<!--endregion-->

				<!-- Kelamin --><!--region-->		
				<div class="form-group" id="grpKelamins">
					<label for="optKelamins" class="col-sm-4 control-label" style="text-align: left;">Jenis Kelamin</label>

					<div class="col-sm-4">
						<label><div class="iradio_polaris" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="optKelamins" id="optKelamins1" value="1" class="flat-red optKelamins" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Pria</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label><div class="iradio_polaris" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="optKelamins" id="optKelamins0" class="flat-red optKelamins" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Wanita</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</div>
				</div>
				<div class="form-group" id="grpUmurs">
					<label for="txtUmurs" class="col-sm-4 control-label" style="text-align: left;">Umur</label>
					<div class="control col-sm-4">
						<input type="number" class="form-control" name="txtUmurs" id="txtUmurs" maxlength="22" placeholder="Umur">
						<span class="help-inline text-red" id="lblUmurs"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="txtTanggalSerumahShow" class="col-sm-4 control-label" style="text-align: left;">Tanggal Pemeriksaan</label>

					<div class="col-sm-3">
						<input type="text" class="form-control datepicker" id="txtTanggalSerumahShow">
					</div>
				</div>
				<div class="form-group" id="grpHasilSerumah">
					<label for="cmbHasilSerumah" class="col-sm-4 control-label" style="text-align: left;">Hasil</label>
					<div class="control col-sm-7">
						<select class="form-control" name="cmbHasilSerumah" id="cmbHasilSerumah">
							<option value="">Pilih</option>
							<option value="Positif">Positif</option>
							<option value="Negatif">Negatif</option>
						</select>
						<span class="help-inline text-red" id="lblHasilSerumah"></span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-outline pull-left" data-dismiss="modal">Batal</a>
				<a class="btn btn-outline" id="btnSimpanSe">Simpan</a>
			</div>
		</div>
	</div>
</div>

<div class="modal modal-warning fade" id="mdlSerumahDialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</a>
				<h4 class="modal-title">Hapus Kontak Serumah</h4>
			</div>
			<div class="modal-body">
				Yakin akan menghapus data <b><span id="txtHapusNama"></span></b>
			</div>
			<div class="modal-footer">
				<a class="btn btn-outline" data-dismiss="modal">Batal</a>
				<a class="btn btn-outline" id="btnHapus">Yakin</a>
			</div>
		</div>
	</div>
</div>


<div class="modal modal-warning fade" id="mdlChangePass">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</a>
				<h4 class="modal-title">Ubah Password</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" onsubmit="return false;">
					<div class="row" id="grpOldPassword">
						<label for="txtPassword" class="col-sm-3 control-label" style="text-align: left;">Kata Sandi Lama</label>
						<div class="control col-sm-8">
							<input type="password" class="form-control" name="txtOldPassword" id="txtOldPassword" maxlength="22" placeholder="Kata Sandi Lama">
							<span class="help-inline text-red" id="lblOldPassword"></span>
						</div>
					</div>
					<div class="row" id="grpPassword">
						<label for="txtPassword" class="col-sm-3 control-label" style="text-align: left;">Kata Sandi</label>
						<div class="control col-sm-8">
							<input type="password" class="form-control" name="txtPassword" id="txtPassword" maxlength="22" placeholder="Kata Sandi">
							<span class="help-inline text-red" id="lblPassword"></span>
						</div>
					</div>
					<div class="row" id="grpConfirm">
						<label for="txtConfirm" class="col-sm-3 control-label" style="text-align: left;">Konfirmasi</label>
						<div class="control col-sm-8">
							<input type="password" class="form-control" name="txtConfirm" id="txtConfirm" maxlength="22" placeholder="Konfirmasi Kata Sandi">
							<span class="help-inline text-red" id="lblConfirm"></span>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a class="btn btn-outline pull-left" data-dismiss="modal">Batal</a>
				<a class="btn btn-outline" id="btnUbahPass">Simpan</a>
			</div>
		</div>
	</div>
</div>

      <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

        <div class="modal-dialog modal-md" role="document">

          <div class="modal-content">

            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

              <h4 class="modal-title">Delete Data</h4>

            </div>

            <div class="modal-body">

              <div class="form-group">

                {{ csrf_field() }}

                <input type="hidden" name="id-delete" id="id-delete">

                <p>Yakin Ingin Menghapus Data? </p>

              </div>

              <div class="form-group" align="right">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                <button type="button" id="delete" class="btn btn-danger" data-dismiss="modal">Delete</button>

              </div>

            </div>

          </div>

        </div>

      </div>

<div class="modal modal-primary fade" id="mdlRegLab">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<a class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</a>
						<h4 class="modal-title">Daftar Terduga TB</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" onsubmit="">
							{{ csrf_field() }}
							<div class="form-group" id="grpNIK">
								<label for="nik" class="col-sm-3 control-label" style="text-align: left;">NIK</label>
								<div class="control col-sm-8">
									<input type="text" class="form-control" name="nik" id="nik" value="" maxlength="16" placeholder="Nomor Induk Kependudukan">
									<span class="help-inline text-white" id="lblNIK"></span>
								</div>
							</div><!-- NIK -->
							<div class="form-group" id="grpNamaLengkap">
								<label for="nama_lengkap" class="col-sm-3 control-label" style="text-align: left;">Nama Lengkap</label>
								<div class="control col-sm-8">
									<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="" maxlength="77" placeholder="Nama Lengkap">
									<span class="help-inline text-red" id="lblNamaLengkap"></span>
								</div>
							</div><!-- Nama Lengkap -->
							<div class="form-group" id="grpNIK">
								<label for="nik" class="col-sm-3 control-label" style="text-align: left;">BPJS</label>
								<div class="control col-sm-4">
									<input type="text" class="form-control" name="bpjs" id="bpjs" value="" maxlength="16" placeholder="BPJS">
									<span class="help-inline text-red" id="lblBPJS"></span>
								</div>
								<label for="umur" class="col-sm-1 control-label" style="text-align: left;">Tinggi</label>
								<div class="control col-sm-3">
									<input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" value="" maxlength="22" placeholder="Tinggi">
									<span class="help-inline text-white" id="lblUmur">Cm</span>
								</div>
							</div><!-- BPJS -->
							<div class="form-group" id="grpUmur">
								<label for="umur" class="col-sm-3 control-label" style="text-align: left;">Tanggal Lahir</label>
								<div class="control col-sm-4">
									<input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" value="" maxlength="22" placeholder="Tanggal Lahir">
									<span class="help-inline text-red" id="lblUmur"></span>
								</div>
								<label for="umur" class="col-sm-1 control-label" style="text-align: left;">Umur</label>
								<div class="control col-sm-3">
									<input type="number" class="form-control" name="umur" id="umur" value="" min="1" placeholder="Umur">
									<span class="help-inline text-red" id="lblUmur"></span>
								</div>
							</div><!-- Umur -->
							<div class="form-group" id="grpKelamin">
								<label for="optKelamin" class="col-sm-3 control-label" style="text-align: left;">Jenis Kelamin</label>

								<div class="control col-sm-4">
									  <label>
						                  <input type="radio" name="jenis_kelamin" value="pria" class="flat-red" checked>
						                 Pria
						              </label>
						              <label>
						                  <input type="radio" value="wanita" name="jenis_kelamin" class="flat-red">
						                  Wanita
						              </label>
								</div>
								<label for="umur" class="col-sm-1 control-label">Berat</label>
								<div class="control col-sm-3">
									<input type="number" class="form-control" name="berat" id="berat" min="1" placeholder="Berat">
									<span class="help-inline text-red" id="lblUmur"></span>
								</div>
							</div><!-- Kelamin -->
							<div class="form-group" id="grpAlamat">
								<label for="alamat" class="col-sm-3 control-label" style="text-align: left;">Alamat</label>
								<div class="control col-sm-8">
									<input type="text" class="form-control" name="alamat" id="alamat" value="" maxlength="111" placeholder="Alamat">
									<span class="help-inline text-red" id="lblAlamat"></span>
								</div>
							</div><!-- Alamat -->
							<div class="form-group" id="grpRTRW">
								<label for="rt" class="col-sm-3 control-label" style="text-align: left;">&nbsp;</label>
								<label for="rt" class="col-sm-1 control-label" style="text-align: left;">RT</label>
								<div class="control col-sm-2">
									<input type="number" class="form-control" name="rt" id="rt" value="" maxlength="3" placeholder="RT.">
									<span class="help-inline text-red" id="lblRT"></span>
								</div>
								<label for="rw" class="col-sm-1 control-label" style="text-align: left;">RW</label>
								<div class="control col-sm-2">
									<input type="number" class="form-control" name="rw" id="rw" value="" maxlength="3" placeholder="RW.">
									<span class="help-inline text-red" id="lblRW"></span>
								</div>
							</div><!-- RT / RW -->
							<div class="form-group" id="grpKota">
								<label for="kota" class="col-sm-3 control-label" style="text-align: left;">Kota</label>
								<div class="control col-sm-8">
									<select class="form-control select2" name="kota" id="kota" style="width: 400px;">
										<option value="Kota Jakarta Pusat" selected="">Kota Jakarta Pusat</option>
										<option value="Kota Jakarta Timur">Kota Jakarta Timur</option>
										<option value="Kota Jakarta Barat">Kota Jakarta Barat</option>
										<option value="Kota Jakarta Utara">Kota Jakarta Utara</option>
										<option value="Kota Jakarta Selatan">Kota Jakarta Selatan</option>
									</select>
									<span class="help-inline text-red" id="lblKota"></span>
								</div>
							</div><!-- Kota -->
							<div class="form-group" id="grpKec">
								<label for="kecamatan" class="col-sm-3 control-label" style="text-align: left;">Kec.</label>
								<div class="control col-sm-8">
									<select class="form-control select2" name="kecamatan" id="kecamatan" required>
										<option value="0" selected>Pilih Kecamatan</option>
										@foreach ($kecamatans as $kecamatan)
										<option value="{{$kecamatan->id}}">{{$kecamatan->nama}}</option>
										@endforeach
									</select>
									<span class="help-inline text-white" id="lblKec"></span>
								</div>
							</div><!-- Kecamatan -->
							<div class="form-group" id="grpKel">
								<label for="kelurahan" class="col-sm-3 control-label" style="text-align: left;">Kel.</label>
								<div class="control col-sm-8">
									<select class="form-control select2" name="kelurahan" id="kelurahan" required>
										<option value="0" selected>Pilih Kelurahan</option>
										@foreach ($kelurahans as $kelurahan)
										<option value="{{$kelurahan->id}}">{{$kelurahan->nama}}</option>
										@endforeach
									</select>
									<span class="help-inline text-white" id="lblKel"></span>
								</div>
							</div><!-- Kelurahan -->
						</form>
					</div>
					<div class="modal-footer">
						<a class="btn btn-outline pull-left" data-dismiss="modal">Batal</a>
						<button class="btn btn-outline" id="btnSimpan" disabled>Simpan</button>
					</div>
				</div>
			</div>
		</div>
@endsection
@section('javascript')
<script type="text/javascript">
	$(document).ready(function() {

		$('#tanggal_lahir').on('change',function(){
			var dob = $('#tanggal_lahir').val();
			if(dob != ''){
				dob = new Date(dob);
				var today = new Date();
				var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
				$('#umur').val(age);
			}
		});
		
		$('#nik').on('keyup',function(){
			if($(this).val().length < 16) { 
				$("#lblNIK").html("Masukan 16 Digit NIK");
	            document.getElementById('btnSimpan').disabled = true; 
	        } else { 
	        	$("#lblNIK").remove();
	            document.getElementById('btnSimpan').disabled = false;
	        }
		});
	$("#btnSimpan").click(function() {
        var kecamatan = $('select[name=kecamatan]').val();
        var kelurahan = $('select[name=kelurahan]').val();
        var nama_lengkap = $('select[name=nama_lengkap]').val();
        var status = 2;
        if (kecamatan == 0) {
        	$("#lblKec").html("Pilih Kecamatan");
        }else if (kelurahan == 0) {
        	$("#lblKel").html("Pilih Kelurahan"); 
        }else{
        	 $.ajax({
			      type: 'post',
			      url: '/tb01/daftar-terduga',
			      data: {
			        '_token': $('input[name=_token]').val(),
			        'nik': $('input[name=nik]').val(),
			        'bpjs': $('input[name=bpjs]').val(),
			        'nama_lengkap': $('input[name=nama_lengkap]').val(),
			        'umur': $('input[name=umur]').val(),
			        'berat_badan': $('input[name=berat]').val(),
			        'tinggi_badan': $('input[name=tinggi_badan]').val(),
			        'tanggal_lahir': $('input[name=tanggal_lahir]').val(),
			        'jenis_kelamin': $('input[name=jenis_kelamin]:checked').val(),
			        'alamat': $('input[name=alamat]').val(),
			        'rt': $('input[name=rt]').val(),
			        'rw': $('input[name=rw]').val(),
			        'kota': $('select[name=kota]').val(),
			        'kecamatan': $('select[name=kecamatan]').val(),
			        'kelurahan': $('select[name=kelurahan]').val(),
			        'status' : status,
			      },
			      success: function(data) {
	        		$('#mdlRegLab').modal('toggle');
			        if ((data.errors)){
			          $('.error').removeClass('hidden');
			          $('.error').text(data.errors.name);
			        }
			        else {
			          $('.error').remove();
						  swal({type: 'success',title: 'Data Pasien Berhasil Disimpan',showConfirmButton: false})
				              location.href = "/tb01"
			        }
			      },
			    });
			    $('#nik').val('');
			    $('#nama_lengkap').val('');
			    $('#umur').val('');
		    	$('#berat').val(),
		        $('#tinggi_badan').val(),
		        $('#tanggal_lahir').val(),
			    $('#jenis_kelamin').val('');
			    $('#alamat').val('');
			    $('#rt').val('');
			    $('#rw').val('');
			    $('#kota').val('');
			    $('#kecamatan').val('');
			    $('#kelurahan').val('');
        }
  });
    	$('#example2').DataTable( {
    	});
	});
</script>
<script type="text/javascript">
	$(document).on('click', '.datepicker', function(){
	   $(this).datepicker({
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
	   }); 
	});

	$(document).on('click', '.delete-modal', function() {

    	$('#id-delete').val($(this).data('id'));

 	   $('.bs-example-modal-sm3').modal('show');

  	});


  	$("#delete").click(function() {

  		window.swal({
		  title: "Checking...",
		  text: "Please wait",
		  imageUrl: "images/ajaxloader.gif",
		  showConfirmButton: false,
		  allowOutsideClick: false
		});

	    $.ajax({

	      type: 'post',

	      url: '/tb01/delete',

	      data: {

	        '_token': $('input[name=_token]').val(),

	        'id' : $('input[name=id-delete]').val()

	      },

	      success: function(data) {

	      	$('.item' + data.id).remove();

	        swal("Success", "Delete Data Berhasil", "success");

	        location.href = "/tb01"

	      }

	    });

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
	});
	var numRow = 0;
	function AddRow()
	{
		numRow ++;
		var row = '<tr class="realBody" id="rowNum'+numRow+'"><th style="text-align: center;"><input class="form-control" type="text" id="nama_'+numRow+'" name="nama_lengkap[]"/></th><th style="text-align: center;"><select name="jenis_kelamin_kontak_serumah[]" class="form-control"><option value="">Pilih</option><option value="pria">Pria</option><option value="wanita">Wanita</option></select></th><th style="text-align: center;"><input class="form-control" type="text" id="umur_'+numRow+'" name="umur[]"></th><th style="text-align: center;"><input class="form-control datepicker" type="text" id="tanggal_periksa_'+numRow+'" style="color:black;" name="tanggal_periksa[]"></th><th><input class="form-control" type="text" id="hasil_'+numRow+'" style="color:black;" name="hasil[]"></th><th><input class="form-control" type="text" id="tindak_lanjut_'+numRow+'" style="color:black;" name="tindak_lanjut[]"></th><th><input type="button" value="Hapus" class="btn btn-danger" onclick="removeRow('+numRow+');" class="btn btn-default btn-xs" title="Delete"></th></tr>';
	    $('#kontak_serumah').append(row)
	}

	function removeRow(rnum) {
    	jQuery('#rowNum'+rnum).remove();
		
		var rowCount = $('#kontak_serumah tr').length;
    }

    function RowAdd()
	{
		numRow ++;
		var war = '<tr class="realBody" id="rowNum'+numRow+'"><th style="text-align: center;"><select class="form-control select2" name="bulan[]" id="bulan_'+numRow+'"><option value="Januari">Januari</option><option value="Februari">Februari</option><option value="Maret">Maret</option><option value="April">April</option><option value="Mei">Mei</option><option value="Juni">Juni</option><option value="Juli">Juli</option><option value="Agustus">Agustus</option><option value="September">September</option><option value="Oktober">Oktober</option><option value="November">November</option><option value="Desember">Desember</option></select></th><th style="text-align: center;"><input class="form-control datepicker" type="text" id="tanggal_'+numRow+'" name="tanggal_pemeriksaan_dahak[]"></th><th style="text-align: center;"><input class="form-control" type="text" id="no_reg_lab_'+numRow+'" name="no_reg_lab[]"></th><th style="text-align: center;"><input class="form-control" type="text" id="bta_'+numRow+'" style="color:black;" name="bta[]"></th><th><input class="form-control" type="number" min="0" id="bb_'+numRow+'" style="color:black;" name="bb[]"></th><th> <input type="button" value="Hapus" class="btn btn-danger" onclick="rowRemove('+numRow+');" class="btn btn-default btn-xs" title="Delete"></th></tr>';
	    $('#hasil_pemeriksaan_dahak').append(war)
	}

	function rowRemove(rnum) {
    	jQuery('#rowNum'+rnum).remove();
		
		var rowCount = $('#hasil_pemeriksaan_dahak tr').length;
    }

    var num_row = 1;
    function row_tahap_awal (){
    	$('.odd').remove();
    	num_row ++;
    	var row_data = '<tr class="bodyRow" id="bodyRowr'+num_row+'"><td><select class="form-control" style="width:100px;" name="tahap_awal_bulan[]" id="bulan_'+num_row+'"><option value="Januari">Januari</option><option value="Februari">Februari</option><option value="Maret">Maret</option><option value="April">April</option><option value="Mei">Mei</option><option value="Juni">Juni</option><option value="Juli">Juli</option><option value="Agustus">Agustus</option><option value="September">September</option><option value="Oktober">Oktober</option><option value="November">November</option><option value="Desember">Desember</option></select></td><td><input type="checkbox" name="tanggal_1_checklist[]" value="check">check<input type="checkbox" name="tanggal_1_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_2_checklist[]" value="check">check<input type="checkbox" name="tanggal_2_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_3_checklist[]" value="check">check<input type="checkbox" name="tanggal_3_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_4_checklist[]" value="check">check<input type="checkbox" name="tanggal_4_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_5_checklist[]" value="check">check<input type="checkbox" name="tanggal_5_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_6_checklist[]" value="check">check<input type="checkbox" name="tanggal_6_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_7_checklist[]" value="check">check<input type="checkbox" name="tanggal_7_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_8_checklist[]" value="check">check<input type="checkbox" name="tanggal_8_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_9_checklist[]" value="check">check<input type="checkbox" name="tanggal_9_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_10_checklist[]" value="check">check<input type="checkbox" name="tanggal_10_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_11_checklist[]" value="check">check<input type="checkbox" name="tanggal_11_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_12_checklist[]" value="check">check<input type="checkbox" name="tanggal_12_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_13_checklist[]" value="check">check<input type="checkbox" name="tanggal_13_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_14_checklist[]" value="check">check<input type="checkbox" name="tanggal_14_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_15_checklist[]" value="check">check<input type="checkbox" name="tanggal_15_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_16_checklist[]" value="check">check<input type="checkbox" name="tanggal_16_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_17_checklist[]" value="check">check<input type="checkbox" name="tanggal_17_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_18_checklist[]" value="check">check<input type="checkbox" name="tanggal_18_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_19_checklist[]" value="check">check<input type="checkbox" name="tanggal_19_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_20_checklist[]" value="check">check<input type="checkbox" name="tanggal_20_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_21_checklist[]" value="check">check<input type="checkbox" name="tanggal_21_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_22_checklist[]" value="check">check<input type="checkbox" name="tanggal_22_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_23_checklist[]" value="check">check<input type="checkbox" name="tanggal_23_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_24_checklist[]" value="check">check<input type="checkbox" name="tanggal_24_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_25_checklist[]" value="check">check<input type="checkbox" name="tanggal_25_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_26_checklist[]" value="check">check<input type="checkbox" name="tanggal_26_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_27_checklist[]" value="check">check<input type="checkbox" name="tanggal_27_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_28_checklist[]" value="check">check<input type="checkbox" name="tanggal_28_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_29_checklist[]" value="check">check<input type="checkbox" name="tanggal_29_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_30_checklist[]" value="check">check<input type="checkbox" name="tanggal_30_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_31_checklist[]" value="check">check<input type="checkbox" name="tanggal_31_strip[]" value="strip">strip</td><td><input style="width: 50px;" type="number" name="jumlah[]"></td><td><input style="width: 50px;" type="number" name="berat_badan[]"></td><td><a onclick="remove_row_tahap_awal('+num_row+');"><i class="delete-modal fa fa-trash text-red" style="margin-right: 10px;cursor: pointer;"></i></a></td></tr>';
    	$('#example1').append(row_data);
    }

    function remove_row_tahap_awal(rnum) {
    	jQuery('#bodyRowr'+rnum).remove();
		
		var rowCount = $('#hasil_pemeriksaan_dahak tr').length;
    }

    var row_num = 1;
     function row_tahap_lanjutan (){
    	$('.odd').remove();
    	row_num ++;
    	var row_datas = '<tr class="bodyRowr" id="body_rows'+row_num+'"><td><select class="form-control" style="width:100px;" name="tahap_lanjutan_bulan[]" id="bulan_'+row_num+'"><option value="Januari">Januari</option><option value="Februari">Februari</option><option value="Maret">Maret</option><option value="April">April</option><option value="Mei">Mei</option><option value="Juni">Juni</option><option value="Juli">Juli</option><option value="Agustus">Agustus</option><option value="September">September</option><option value="Oktober">Oktober</option><option value="November">November</option><option value="Desember">Desember</option></select></td><td><input type="checkbox" name="tanggal_lanjutan_1_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_1_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_2_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_2_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_3_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_3_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_4_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_4_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_5_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_5_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_6_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_6_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_7_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_7_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_8_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_8_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_9_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_9_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_10_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_10_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_11_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_11_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_12_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_12_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_13_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_13_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_14_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_14_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_15_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_15_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_16_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_16_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_17_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_17_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_18_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_18_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_19_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_19_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_20_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_20_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_21_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_21_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_22_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_22_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_23_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_23_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_24_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_24_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_25_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_25_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_26_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_26_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_27_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_27_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_28_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_28_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_29_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_29_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_30_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_30_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_31_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_31_strip[]" value="strip">strip</td><td><input style="width: 50px;" type="number" name="lanjutan_jumlah[]"></td><td><input style="width: 50px;" type="number" name="lanjutan_berat_badan[]"></td><td><a onclick="remove_row_tahap_lanjutan('+row_num+');"><i class="delete-modal fa fa-trash text-red" style="margin-right: 10px;cursor: pointer;"></i></a></td></tr>';
    	$('#table_tahap_lanjutan').append(row_datas);
    }

    function remove_row_tahap_lanjutan(rnum) {
    	jQuery('#body_rows'+rnum).remove();
		
		var rowCount = $('#hasil_pemeriksaan_dahak tr').length;
    }

	$('#select_pasien').on('change', function() {
	  $.ajax(
		   {
		      type:'GET',
		      url:'/tb05/get-data-pasien-tb',
		      data:{'id' : this.value },
		      success: function(data){
		      	$('#pasien_id').val(data.daftar_terduga.id);
		      	$('#txtNIK').val(data.daftar_terduga.nik);
		      	$('#txtNamaLengkap').val(data.daftar_terduga.nama_lengkap);
		      	$('#txtAlamat').val(data.daftar_terduga.alamat);
		      	$('#txtUmur').val(data.daftar_terduga.umur);
		      	$('#txtPropinsi').val(data.daftar_terduga.kota);
		      	$('#txtKabupaten').val(data.daftar_terduga.kecamatan);
		      	$('#txtNoIdentitasSediaanDahak').val(data.daftar_terduga.no_identitas_sediaan_dahak);
		      	if (data.daftar_terduga.jenis_kelamin == 'pria') {
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

	$('#cmbDirujuk').on('change', function() {
		if($('#cmbDirujuk').val() == 'Lainnya') {
            $('.dirujuk').show(); 
        } else {
            $('.dirujuk').hide(); 
        } 
	});

	$('#cmbTipePasien').on('change', function() {
		if($('#cmbTipePasien').val() == 'Pindahan') {
            $('.tipePasienPindahan').show(); 
        } else {
            $('.tipePasienPindahan').hide(); 
        } 
	});

	$('#cmbTipePasien').on('change', function() {
		if($('#cmbTipePasien').val() == 'Lain-lain') {
            $('#tipePasienLainya').show(); 
        } else {
            $('#tipePasienLainya').hide(); 
        } 
	});

	$('#contoh_uji_selain_dahak').on('change', function() {
		if($('#contoh_uji_selain_dahak').val() == 'Bukan MTB') {
            $('.sebutkanBiiakanHasil').show(); 
        } else {
            $('.sebutkanBiiakanHasil').hide(); 
        } 
	});

	$('#sumber_obat').on('change', function() {
		if($('#sumber_obat').val() == 'Lain-lain') {
            $('#sumberObatLainLain').show(); 
        } else {
            $('#sumberObatLainLain').hide(); 
        } 
	});

	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

	$('.select2').select2();

	$('.btn-next-child').click(function(){
  	 $('.nav-tabs > .active').next('li').find('a').trigger('click');
	});

  	$('.btn-prev-child').click(function(){
  	$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});

	$('.select2').select2({ width: '100%' });
</script>
@endsection	