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
		<li><a href="#"><i class="fa fa-dashboard"></i> Formulir</a></li>
		<li class="active">TB01</li>
	</ol>
</section>
<section class="content"><!-- Main content -->
	<div class="row"><span id="spGagal"></span>
	<div class="col-md-12"><!-- Custom Tabs -->
		<h3 class="box-title">Kartu Pengobatan Pasien TB<br>&nbsp;</h3>
		<a class="btn btn-info" data-toggle="modal" data-target="#mdlRegLab">Pasien Baru</a>
		  <br><br>
		<form class="form-inline" action="/tb05/search" method="GET">
		  <div class="form-group">
		    <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" id="end_date" name="end_date" placeholder="End Date">
		  </div>
		  <button type="submit" class="btn btn-default" name="action" value="filter">Filter</button>
    	  <button type="submit" class="btn btn-info" name="action" value="Cetak"><i class="fa fa-print"></i>  Cetak</button>

<!-- 		  <button type="submit" class="btn btn-default">Submit</button>
		<a class="btn btn-info" id="print-tb01" href="/tb01/prints" target="_blank"><i class="fa fa-print"></i>  Cetak</a> -->
		</form>
		<span class="bg-red hidden" id="lblStatus">&nbsp;&nbsp;Data ini belum terdaftar di TB01!&nbsp;&nbsp;</span><br>&nbsp;<br>
		<form class="form-horizontal" method="post" action="/tb01/{{$data_kartu_pengobatan->id}}/update">
			{{ csrf_field() }}
			<div class="nav-tabs-custom">
				<ul id="tabs" class="nav nav-tabs">
	 				<li class="active"><a href="#tab_3" data-toggle="tab">I<i id="tData2" class="fa fa-check-square-o text-green invisible"></i></a></li>
					<li><a href="#tab_4" data-toggle="tab">II<i id="tData3" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_5" data-toggle="tab">Kontak Serumah<i id="tData4" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_6" data-toggle="tab">Tahap Intensif<i id="tData5" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_7" data-toggle="tab">Hasil Pemeriksaan Dahak<i id="tData6" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_8" data-toggle="tab">Konseling dan PDP<i id="tData7" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_9" data-toggle="tab">Tahap Awal<i id="tData7" class="fa fa-close text-red invisible"></i></a></li>
					<li><a href="#tab_10" data-toggle="tab">Tahap Lanjutan<i id="tData7" class="fa fa-close text-red invisible"></i></a></li>
				</ul>
				<div class="tab-content">								
					
										<!-- /.tab_2 -->
					<div class="tab-pane active" id="tab_3">
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
										
										<select class="form-control select2" name="pasien_id" id="select_pasien" style="width: 100%;">
							                  <option value="{{$data_kartu_pengobatan->daftar_terduga->id}}">{{$data_kartu_pengobatan->daftar_terduga->nama_lengkap}}</option>
							                </select>
									</div>

									<label for="txtNIK" class="col-sm-2 control-label" style="text-align: left;">NIK</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtNIK" id="txtNIK" maxlength="16" placeholder="NIK" value="{{$data_kartu_pengobatan->daftar_terduga->nik}}" readonly>
										</div>
										<span class="help-block" id="nik-help-block"></span>
									</div>
								</div>
								<!--endregion-->

								<!-- Nama Lengkap, Nama PMO --><!--region-->
								<div class="form-group">
									<label for="txtNamaLengkap" class="col-sm-2 control-label" style="text-align: left;">Nama Pasien</label>

									<div class="col-sm-4">
										<input type="text" class="form-control" name="txtNamaLengkap" id="txtNamaLengkap" placeholder="Nama Pasien" value="{{$data_kartu_pengobatan->daftar_terduga->nama_lengkap}}" readonly>
									</div>
									<label for="txtNamaPMO" class="col-sm-2 control-label" style="text-align: left;">Nama PMO</label>

									<div class="col-sm-4">
										<input type="text" class="form-control" name="txtNamaPMO" id="txtNamaPMO" placeholder="Nama PMO" value="{{$data_kartu_pengobatan->nama_pmo}}">
									</div>

								</div>
								<!--endregion-->

								<!-- Telp, Telp PMO --><!--region-->
								<div class="form-group">
									<label for="txtTelp" class="col-sm-2 control-label" style="text-align: left;">Telp./HP</label>

									<div class="col-sm-4">
										<input type="text" class="form-control" name="txtTelp" id="txtTelp" placeholder="Telp./HP Pasien" value="{{$data_kartu_pengobatan->telepon}}">
									</div>
									<label for="txtTelpPMO" class="col-sm-2 control-label" style="text-align: left;">Telp./HP PMO</label>

									<div class="col-sm-4">
										<input type="text" class="form-control" name="txtTelpPMO" id="txtTelpPMO" placeholder="Telp./HP PMO" value="{{$data_kartu_pengobatan->telepon_pmo}}">
									</div>
								</div>
								<!--endregion-->

								<!-- Alamat, Alamat PMO --><!--region-->
								<div class="form-group">
									<label for="txtAlamat" class="col-sm-2 control-label" style="text-align: left;">Alamat Lengkap</label>

									<div class="col-sm-4">
										<textarea class="form-control" name="txtAlamat" id="txtAlamat" placeholder="Alamat Rumah / Tempat Tinggal" rows="2" readonly>{{$data_kartu_pengobatan->daftar_terduga->alamat}} RT.{{$data_kartu_pengobatan->daftar_terduga->rt}}/RW.{{$data_kartu_pengobatan->daftar_terduga->rw}}</textarea>
									</div>

									<label for="txtAlamatPMO" class="col-sm-2 control-label" style="text-align: left;">Alamat PMO</label>

									<div class="col-sm-4">
										<textarea class="form-control" name="txtAlamatPMO" id="txtAlamatPMO" placeholder="Alamat Rumah / Tempat Tinggal PMO" rows="2">{{$data_kartu_pengobatan->alamat_pmo}}</textarea>
									</div>
								</div>
								<!--endregion-->

								<!-- Jenis Kelamin, Umur --><!--region-->
								<div class="form-group">
									<label for="optKelamin" class="col-sm-2 control-label" style="text-align: left;">Jenis Kelamin</label>

									<div class="col-sm-4">
										<label>
							                    <input type="radio" name="jenis_kelamin" id="pria" class="flat-red" value="pria" {{ $data_kartu_pengobatan->daftar_terduga->jenis_kelamin == 'pria' ? 'checked' : '' }}>
							                    Pria
							                  </label>
							                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							                  <label>
							                    <input value="wanita" type="radio" name="jenis_kelamin" id="wanita" class="flat-red" {{ $data_kartu_pengobatan->daftar_terduga->jenis_kelamin == 'wanita' ? 'checked' : '' }}>
							                    Wanita
							                  </label>	
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</div>

									<label for="txtUmur" class="col-sm-2 control-label" style="text-align: left;"">Umur</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtUmur" id="txtUmur" placeholder="Umur" readonly value="{{$data_kartu_pengobatan->daftar_terduga->umur}}">
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
											<input type="text" class="form-control datepicker" name="txtTahun" id="txtTahun" placeholder="Tahun" value="{{$data_kartu_pengobatan->tahun}}">
										</div>
										<label for="txtNamaUPK" class="col-sm-2 control-label" style="text-align: left;">Nama UPK</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="txtNamaUPK" id="txtNamaUPK" placeholder="Nama UPK" value="{{$data_kartu_pengobatan->nama_upk}}">
										</div>
									</div>
									<!--endregion-->

									<!-- No. Reg. TB03 UPK, No. Reg. TB03 Kab. --><!--region-->
									<div class="form-group">
										<label for="txtNoRegTB03UPK" class="col-sm-2 control-label" style="text-align: left;">No. Reg. TB03 UPK</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="txtNoRegTB03UPK" id="txtNoRegTB03UPK" placeholder="No. Reg. TB03 UPK" value="{{$data_kartu_pengobatan->no_reg_tb03_upk}}">
										</div>
										<label for="txtNoRegTB03Kab" class="col-sm-2 control-label" style="text-align: left;">No. Reg. TB05 Kab./Kota</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="txtNoRegTB03Kab" id="txtNoRegTB03Kab" placeholder="No. Reg. TB03 Kab./Kota" value="{{$data_kartu_pengobatan->no_reg_tb03_kab_kota}}">
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
												<option value="Tidak Ada" @if ($data_kartu_pengobatan->parut_bcg == 'Tidak Ada')selected="selected"@endif>Tidak Ada</option>
												<option value="Ada" @if ($data_kartu_pengobatan->parut_bcg == 'Ada')selected="selected"@endif>Ada</option>
											</select>
										</div>
										<label for="cmbRiwayat" class="col-sm-3 control-label" style="text-align: left;">Klasifikasi Berdasarkan Riwayat Pengobatan Sebelumnya</label>

										<div class="col-sm-4">
											<select class="form-control cmb" name="cmbRiwayat" id="cmbRiwayat">
												<option value="">Pilih</option>
												<option value="Baru" @if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Baru')selected="selected"@endif>Baru</option>
												<option value="Diobati setelah Gagal" @if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Diobati setelah Gagal')selected="selected"@endif>Diobati setelah Gagal</option>
												<option value="Kambuh" @if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Kambuh')selected="selected"@endif>Kambuh</option>
												<option value="Diobat Setelah Putus Berobat" @if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Diobat Setelah Putus Berobat')selected="selected"@endif>Diobat Setelah Putus Berobat</option>
												<option value="Riwayat Pengobatan Sebelumnya Tidak Diketahui" @if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Riwayat Pengobatan Sebelumnya Tidak Diketahui')selected="selected"@endif>Riwayat Pengobatan Sebelumnya Tidak Diketahui</option>
												<option value="Lain-Lain" @if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Lain-Lain')selected="selected"@endif>Lain-Lain</option>

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
												<option value="Paru" @if ($data_kartu_pengobatan->klasifikasi_penyakit == 'Paru')selected="selected"@endif>Paru</option>
												<option value="Ekstra Paru" @if ($data_kartu_pengobatan->klasifikasi_penyakit == 'Ekstra Paru')selected="selected"@endif>Ekstra Paru</option>
											</select>
										</div>
										<label for="txtLokasi" class="col-sm-3 control-label" style="text-align: left;">Lokasi</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="txtLokasi" id="txtLokasi" placeholder="Lokasi" value="{{$data_kartu_pengobatan->lokasi}}">
										</div>
									</div>
									<!--endregion-->
									<!-- Klasifikasi Penyakit, Lokasi --><!--region-->
									<div class="form-group">
										<label for="cmbKlasifikasi" class="col-sm-2 control-label" style="text-align: left;">Tipe Diagnosis</label>

										<div class="col-sm-3">
											<select class="form-control cmb" name="tipeDiagnosis" id="tipeDiagnosis">
												<option value="">Pilih</option>
												<option value="Terkontaminasi Bakteriologis" @if ($data_kartu_pengobatan->tipe_diagnosis == 'Terkontaminasi Bakteriologis')selected="selected"@endif>Terkontaminasi Bakteriologis</option>
												<option value="Terdiagnosis Klinis" @if ($data_kartu_pengobatan->tipe_diagnosis == 'Ekstra Terdiagnosis Klinis')selected="selected"@endif>Terdiagnosis Klinis</option>
											</select>
										</div>
										<label for="txtLokasi" class="col-sm-3 control-label" style="text-align: left;">Klasifikasi Berdasarkan Riwaat Status HIV</label>

										<div class="col-sm-4">
											<select class="form-control cmb" name="status_hiv" id="status_hiv">
												<option value="">Pilih</option>
												<option value="Positif" @if ($data_kartu_pengobatan->status_hiv == 'Positif')selected="selected"@endif>Positif</option>
												<option value="Negatif"@if ($data_kartu_pengobatan->status_hiv == 'Negatif')selected="selected"@endif>Negatif</option>
												<option value="Tidak Diketahui" @if ($data_kartu_pengobatan->status_hiv == 'Tidak Diketahui')selected="selected"@endif>Tidak Diketahui</option>
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
												<option value="Inisiatif Pasien / Keluarga" @if ($data_kartu_pengobatan->dirujuk_oleh == 'Inisiatif Pasien / Keluarga')selected="selected"@endif>Inisiatif Pasien / Keluarga</option>
												<option value="Anggota Masyarakat" @if ($data_kartu_pengobatan->dirujuk_oleh == 'Anggota Masyarakat')selected="selected"@endif>Anggota Masyarakat</option>
												<option value="Faskes" @if ($data_kartu_pengobatan->dirujuk_oleh == 'Faskes')selected="selected"@endif>Faskes</option>
												<option value="Dokter Praktek Mandiri" @if ($data_kartu_pengobatan->dirujuk_oleh == 'Dokter Praktek Mandiri')selected="selected"@endif>Dokter Praktek Mandiri</option>
												<option value="Poli" @if ($data_kartu_pengobatan->dirujuk_oleh == 'Poli')selected="selected"@endif>Poli</option>
												<option value="Lainnya" @if ($data_kartu_pengobatan->dirujuk_oleh == 'Lainnya')selected="selected"@endif>Lainnya</option>
											</select>
										</div>
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Uji Tuberkulin</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="uji_tuberkulin" id="uji_tuberkulin" placeholder="Uji Tuberkulin" value="{{$data_kartu_pengobatan->uji_tuberkulin}}">
										</div>
									</div>
									<!--endregion-->

									<!-- Text: Dirujuk Oleh, Tipe Pasien --><!--region-->
									<div class="form-group">
										<label for="txtDirujuk" class="col-sm-2 control-label dirujuk" style="text-align: left;">Sebutkan</label>

										<div class="col-sm-3 dirujuk" @if ($data_kartu_pengobatan->dirujuk_lainnya == '')style="display: none;" @endif>
											<input type="text" class="form-control" name="txtDirujuk" id="txtDirujuk" placeholder="Dirujuk  Oleh" value="{{$data_kartu_pengobatan->dirujuk_lainnya}}">
										</div>
									</div>
									<!--endregion-->

									<!-- Dropdown: Dirujuk Oleh, Tipe Pasien --><!--region-->
									<div class="form-group">
										<label for="cmbDirujuk" class="col-sm-2 control-label" style="text-align: left;">Nomor Seri</label>

										<div class="col-sm-3">
											<input type="text" class="form-control" name="nomor_seri" id="nomor_seri" placeholder="Nomor Seri" value="{{$data_kartu_pengobatan->nomor_seri}}">
										</div>										
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Foto Toraks</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="foto_toraks" id="foto_toraks" placeholder="Foto Toraks" value="{{$data_kartu_pengobatan->foto_toraks}}">
										</div>
									</div>

									<!-- Dropdown: Dirujuk Oleh, Tipe Pasien --><!--region-->
									<div class="form-group">
										<label for="cmbDirujuk" class="col-sm-2 control-label" style="text-align: left;">Biopsi Jarum Halus (FNAB)</label>

										<div class="col-sm-3">
											<input type="text" class="form-control" name="biopsi_jarum" id="biopsi_jarum" placeholder="Biopsi Jarum Halus (FNAB)" value="{{$data_kartu_pengobatan->biopsi_jarum_halus}}">
										</div>										
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Kesan</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="kesan" id="kesan" placeholder="Kesan" value="{{$data_kartu_pengobatan->kesan}}">
										</div>
									</div>
									<!--endregion-->

									<!-- Dropdown: Dirujuk Oleh, Tipe Pasien --><!--region-->
									<div class="form-group">
										<label for="cmbDirujuk" class="col-sm-2 control-label" style="text-align: left;">Biakan Hasil Contoh Uji Selain Dahak</label>

										<div class="col-sm-3">
											<select class="form-control cmb" name="contoh_uji_selain_dahak" id="contoh_uji_selain_dahak">
												<option value="">Pilih</option>
												<option value="MTB" @if ($data_kartu_pengobatan->hasil_selain_dahak == 'MTB')selected="selected"@endif>MTB</option>
												<option value="Bukan MTB" @if ($data_kartu_pengobatan->hasil_selain_dahak == 'Bukan MTB')selected="selected"@endif>Bukan MTB</option>
											</select>
										</div>
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Hasil</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="txthasil" id="txthasil" placeholder="Hasil" value="{{$data_kartu_pengobatan->hasil}}">
										</div>
									</div>
									<!--endregion-->
									<!-- Text: Dirujuk Oleh, Tipe Pasien --><!--region-->
									@if($data_kartu_pengobatan->biakan_hasil_contoh_uji_selain_dahak != '')
									<div class="form-group">
										<label for="txtDirujuk" class="col-sm-2 control-label sebutkanBiiakanHasil" style="text-align: left; display: none;">Sebutkan Biakan Hasil Contoh Uji Selain Dahak</label>

										<div class="col-sm-3 sebutkanBiiakanHasil">
											<input type="text" class="form-control sebutkanBiiakanHasil" name="sebutkan_biakan_hasil_contoh_uji_selain_dahak" id="sebutkan_biakan_hasil_contoh_uji_selain_dahak" placeholder="Sebutkan Biakan Hasil Contoh Uji Selain Dahak" value="{{$biakan_hasil_contoh_uji_selain_dahak}}">
										</div>
									</div>
									@endif
									<div class="form-group">
										<label for="cmbTipePasien" class="col-sm-2 control-label" style="text-align: left;">Riwayat DM</label>

										<div class="col-sm-3">
											<select class="form-control cmb" name="riwayat_dm" id="riwayat_dm">
												<option value="">Pilih</option>
												<option value="Ya" @if ($data_kartu_pengobatan->riwayat_dm == 'Ya')selected="selected"@endif>Ya</option>
												<option value="Tidak" @if ($data_kartu_pengobatan->riwayat_dm == 'Tidak')selected="selected"@endif>Tidak</option>
											</select>
										</div>
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Hasil Tes DM</label>

										<div class="col-sm-4">
											<select class="form-control cmb" name="hasil_tes_dm" id="hasil_tes_dm">
												<option value="">Pilih</option>
												<option value="Positif" @if ($data_kartu_pengobatan->hasil_tes_dm == 'Positif')selected="selected"@endif>Positif</option>
												<option value="Negatif" @if ($data_kartu_pengobatan->hasil_tes_dm == 'Negatif')selected="selected"@endif>Negatif</option>
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
												<option value="OHO" @if ($data_kartu_pengobatan->terampil_dm == 'OHO')selected="selected"@endif>OHO</option>
												<option value="Inj. Insulin" @if ($data_kartu_pengobatan->terampil_dm == 'Inj. Insulin')selected="selected"@endif>Inj. Insulin</option>
											</select>
										</div>
										<label for="cmbTipePasien" class="col-sm-3 control-label" style="text-align: left;">Tipe Pasien</label>

										<div class="col-sm-4">
											<select class="form-control cmb" name="cmbTipePasien" id="cmbTipePasien">
												<option value="">Pilih</option>
												<option value="Baru" @if ($data_kartu_pengobatan->tipe_pasien == 'Baru')selected="selected"@endif>Baru</option>
												<option value="Pindahan" @if ($data_kartu_pengobatan->tipe_pasien == 'Pindahan')selected="selected"@endif>Pindahan</option>
												<option value="Pengobatan setelah default" @if ($data_kartu_pengobatan->tipe_pasien == 'Pengobatan setelah default')selected="selected"@endif>Pengobatan setelah default</option>
												<option value="Kambuh" @if ($data_kartu_pengobatan->tipe_pasien == 'Kambuh')selected="selected"@endif>Kambuh</option>
												<option value="Gagal" @if ($data_kartu_pengobatan->tipe_pasien == 'Gagal')selected="selected"@endif>Gagal</option>
												<option value="Lain-lain" @if ($data_kartu_pengobatan->tipe_pasien == 'Lain-lain')selected="selected"@endif>Lain-lain</option>
											</select>
										</div>
									</div>
									@if ($data_kartu_pengobatan->tipe_pasien == 'Pindahan')
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
									@else
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
									@endif

									@if($data_kartu_pengobatan->tipe_pasien_lain != '')
									<div class="form-group" id="tipePasienLainya">
										
										<label for="txtTipePasien" class="col-sm-2 control-label tipePasien" style="text-align: left; ">Sebutkan Tipe Pasien</label>

										<div class="col-sm-3 tipePasien" style="">
										<input type="text" class="form-control" name="txtTipePasien" id="txtTipePasien" placeholder="Tipe Pasien" value="{{$data_kartu_pengobatan->tipe_pasien_lain}}">
										</div>
									</div>
									@endif
									<!--endregion-->
									@if($data_kartu_pengobatan->pindahan_nama_faskes != '')
									<div class="form-group tipePasienPindahan">
										<label for="cmbTipePasien" class="col-sm-2 control-label" style="text-align: left;">Nama Faskes</label>

										<div class="col-sm-3">
											<input type="text" value="{{$data_kartu_pengobatan->pindahan_nama_faskes}}" class="form-control" name="nama_faskes_pindahan" id="nama_faskes_pindahan" placeholder="Nama Faskes">
										</div>
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Kab / Kota</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="kabupaten_pindahan" id="kabupaten_pindahan"  placeholder="Kab / Kota" value="{{$data_kartu_pengobatan->pindahan_kabupaten}}">
										</div>
									</div>
									<!--endregion-->
									<div class="form-group tipePasienPindahan">
										<label for="cmbTipePasien" class="col-sm-2 control-label" style="text-align: left;">Alamat Faskes</label>

										<div class="col-sm-3">
											<textarea class="form-control" name="alamat_faskes_pindahan" placeholder="Alamat Faskes">{{$data_kartu_pengobatan->pindahan_alamat}}</textarea>
										</div>
										<label for="cmbDirujuk" class="col-sm-3 control-label" style="text-align: left;">Provinsi</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="provinsi_pindahan" id="provinsi_pindahan"  placeholder="Provinsi" value="{{$data_kartu_pengobatan->pindahan_provinsi}}">
										</div>
									</div>
									@endif
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
											<td><input type="text" class="form-control" name="kontak_erat" id="kontak_erat"  placeholder="Kontak Erat" value="{{$data_kartu_pengobatan->kontak_erat}}"></td>
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
						            <tbody id="id_kontak_serumah">
						            	@php $i = 1;
						            	@endphp
						            	@foreach($data_kartu_pengobatan->kontak_serumah as $key => $kontak_serumah)
						            	<tr>
						            		<td><input type="hidden" name="kontak_serumah_id[]" value="{{$kontak_serumah->id}}"><input class="form-control" type="text" id="nama_{{$key}}" name="nama_lengkap_edit[]" value="{{$kontak_serumah->nama_lengkap}}"></td>
						            		<td><select name="jenis_kelamin_kontak_serumah_edit[]" class="form-control"><option value="">Pilih</option><option value="pria" @if ($kontak_serumah->jenis_kelamin == 'pria')selected="selected"@endif>Pria</option><option value="wanita" @if ($kontak_serumah->jenis_kelamin == 'wanita')selected="selected"@endif>Wanita</option></select></td>
						            		<td><input class="form-control" type="text" id="umur_edit_{{$key}}" name="umur_edit[]" value="{{$kontak_serumah->umur}}"></td>
						            		<td><input class="form-control datepicker" type="text" id="tanggal_periksa_edit_{{$key}}" style="color:black;" name="tanggal_periksa_edit[]" value="{{$kontak_serumah->tanggal_periksa}}"></td>
						            		<td><input class="form-control" type="text" id="hasil_{{$key}}" style="color:black;" name="hasil_edit[]" value="{{$kontak_serumah->hasil}}"></td>
						            		<td><input class="form-control" type="text" id="tindak_lanjut_edit_{{$key}}" style="color:black;" name="tindak_lanjut_edit[]" value="{{$kontak_serumah->tindak_lanjut}}"></td>
						            		<td><a href="" data-kontak="{{$data_kartu_pengobatan->id}}" data-id="{{$kontak_serumah->id}}" class="btn btn-danger" id="delete-kontak">Hapus</a></td>
						            	</tr>
						            	@endforeach
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
											<option value="KDT (FDC)" @if ($data_kartu_pengobatan->jenis_oat == 'KDT (FDC)')selected="selected"@endif>KDT (FDC)</option>
											<option value="Kombipak / Obat Lepas" @if ($data_kartu_pengobatan->jenis_oat == 'Kombipak / Obat Lepas')selected="selected"@endif>Kombipak / Obat Lepas</option>
										</select>
									</div>

									<label for="cmbTahapIntensif" class="col-sm-2 control-label" style="text-align: left;">Paduan OAT</label>
									<div class="col-sm-4" id="">
										<select class="form-control cmb" name="cmbTahapIntensif" id="cmbTahapIntensif">
											<option value="">Pilih</option>
											<option value="Kategori 1" @if ($data_kartu_pengobatan->tahap_intensif == 'Kategori 1')selected="selected"@endif>Kategori 1</option>
											<option value="Kategori 2" @if ($data_kartu_pengobatan->tahap_intensif == 'Kategori 2')selected="selected"@endif>Kategori 2</option>
											<option value="Kategori Anak" @if ($data_kartu_pengobatan->tahap_intensif == 'Kategori Anak')selected="selected"@endif>Kategori Anak</option>
										</select>
									</div>
								</div>
								<!--endregion-->

								<!-- Catatan --><!--region-->
								<div class="form-group">
									<label for="txtCatatan" class="col-sm-2 control-label" style="text-align: left;">Catatan</label>

									<div class="col-sm-10">
										<textarea class="form-control" name="txtCatatan" id="txtCatatan" placeholder="Catatan" rows="2">{{$data_kartu_pengobatan->catatan}}</textarea>
									</div>
								</div>
								<!--endregion-->

								<!-- EKDT, Strep --><!--region-->
								<div class="form-group">
									<label for="txtEKDT" class="col-sm-2 control-label" style="text-align: left;">4KDT (FDC)</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtEKDT" id="txtEKDT" value="{{$data_kartu_pengobatan->empatkdt}}" min="0">
										<span class="input-group-addon"> tablet/hari</span>
										</div>
									</div>
									<label for="txtStrep" class="col-sm-2 control-label" style="text-align: left;">Streptomisin</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtStrep" id="txtStrep" value="{{$data_kartu_pengobatan->streptomisin}}" min="0">
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
											<input type="number" class="form-control" name="txtDKDT" id="txtDKDT" min="0" value="{{$data_kartu_pengobatan->duakdt}}">
										<span class="input-group-addon"> tablet/hari</span>
										</div>
									</div>
									<label for="txtEtham" class="col-sm-2 control-label" style="text-align: left;">Ethambutol</label>

									<div class="col-sm-4">
										<div class="input-group">
											<input type="number" class="form-control" name="txtEtham" id="txtEtham" min="0" value="{{$data_kartu_pengobatan->sthambutol}}">
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
											<option value="Program TB" @if ($data_kartu_pengobatan->sumber_obat == 'Program TB')selected="selected"@endif>Program TB</option>
											<option value="Bayar Sendiri" @if ($data_kartu_pengobatan->sumber_obat == 'Bayar Sendiri')selected="selected"@endif>Bayar Sendiri</option>
											<option value="Asuransi" @if ($data_kartu_pengobatan->sumber_obat == 'Asuransi')selected="selected"@endif>Asuransi</option>
											<option value="Lain-lain" @if ($data_kartu_pengobatan->sumber_obat == 'Lain-lain')selected="selected"@endif>Lain-lain</option>
										</select>
									</div>
									<div id="sumberObatLainLain" @if ($data_kartu_pengobatan->sumber_obat_lain_lain == '')style="display: none;" @endif>
										<label for="cmbTahapIntensif" class="col-sm-2 control-label" style="text-align: left;">Sumber Obat Lain - Lain</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="sumber_obat_lain_lain" id="sumber_obat_lain_lain" placeholder="Sumber Obat Lain-lain" value="{{$data_kartu_pengobatan->sumber_obat_lain_lain}}">
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
						            <tbody id="id_hasil_pemeriksaan_dahak">
									@foreach ($data_kartu_pengobatan->hasil_pemeriksaan_dahak as $key => $hasil_pemeriksaan_dahak)
									<tr>
										<td><input class="form-control datepicker" type="hidden" name="tanggal_pemeriksaan_id[]" value="{{$hasil_pemeriksaan_dahak->id}}"><select class="form-control select2" name="bulan_edit[]" id="bulan_edit_{{$key}}"><option value="Januari" @if ($hasil_pemeriksaan_dahak->bulan == 'Januari')selected="selected"@endif>Januari</option><option value="Februari" @if ($hasil_pemeriksaan_dahak->bulan == 'Februari')selected="selected"@endif>Februari</option><option value="Maret" @if ($hasil_pemeriksaan_dahak->bulan == 'Maret')selected="selected"@endif>Maret</option><option value="April" @if ($hasil_pemeriksaan_dahak->bulan == 'April')selected="selected"@endif>April</option><option value="Mei" @if ($hasil_pemeriksaan_dahak->bulan == 'Mei')selected="selected"@endif>Mei</option><option value="Juni" @if ($hasil_pemeriksaan_dahak->bulan == 'Juni')selected="selected"@endif>Juni</option><option value="Juli" @if ($hasil_pemeriksaan_dahak->bulan == 'Juli')selected="selected"@endif>Juli</option><option value="Agustus" @if ($hasil_pemeriksaan_dahak->bulan == 'Agustus')selected="selected"@endif>Agustus</option><option value="September" @if ($hasil_pemeriksaan_dahak->bulan == 'September')selected="selected"@endif>September</option><option value="Oktober" @if ($hasil_pemeriksaan_dahak->bulan == 'Oktober')selected="selected"@endif>Oktober</option><option value="November" @if ($hasil_pemeriksaan_dahak->bulan == 'November')selected="selected"@endif>November</option><option value="Desember" @if ($hasil_pemeriksaan_dahak->bulan == 'Desember')selected="selected"@endif>Desember</option></select></td>
										<td><input class="form-control datepicker" type="text" id="tanggal_pemeriksaan_dahak_edit_{{$key}}" name="tanggal_pemeriksaan_dahak_edit[]" value="{{$hasil_pemeriksaan_dahak->tanggal}}"></td>
										<td><input class="form-control" type="text" id="no_reg_lab_edit_{{$key}}" name="no_reg_lab_edit[]" value="{{$hasil_pemeriksaan_dahak->no_reg_lab}}"></td>
										<td><input class="form-control" type="text" id="bta_edit_{{$key}}" style="color:black;" name="bta_edit[]" value="{{$hasil_pemeriksaan_dahak->bta}}"></td>	
										<td><input class="form-control" type="number" min="0" id="bb_edit_{{$key}}" style="color:black;" name="bb_edit[]" value="{{$hasil_pemeriksaan_dahak->bb}}"></td>
										<td><input type="button" value="Hapus" class="btn btn-danger" onclick="rowRemove();" title="Delete"></td>
									</tr>
									@endforeach
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
										<input type="text" class="form-control datepicker" name="txtTanggalAnjurShow" id="txtTanggalAnjurShow" value="{{$data_kartu_pengobatan->tanggal_dianjurkan}}">
									</div>

									<label for="txtTanggalPreTest" class="col-sm-3 control-label" style="text-align: left;">Tanggal Pre Test</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalPreTestShow" id="txtTanggalPreTestShow" value="{{$data_kartu_pengobatan->tanggal_pre_test}}">
									</div>
								</div>
								<!--endregion-->

								<!--region Tempat Test, Tanggal Test -->
								<div class="form-group">
									<label for="txtTempatTest" class="col-sm-3 control-label" style="text-align: left;">Tempat Test</label>

									<div class="col-sm-3">
										<input type="text" class="form-control" name="txtTempatTest" id="txtTempatTest" placeholder="Tempat Test" value="{{$data_kartu_pengobatan->tempat_test}}">
									</div>

									<label for="txtTanggalTest" class="col-sm-3 control-label" style="text-align: left;">Tanggal Test</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalTestShow" id="txtTanggalTestShow" value="{{$data_kartu_pengobatan->tanggal_test}}">
									</div>
								</div>
								<!--endregion-->

								<!--region Tanggal Post Test, Hasil Test -->
								<div class="form-group">
									<label for="txtTanggalPostTest" class="col-sm-3 control-label" style="text-align: left;">Tanggal Post Test</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalPostTestShow" id="txtTanggalPostTestShow" value="{{$data_kartu_pengobatan->tanggal_post_test}}">
									</div>

									<label for="cmbHasilTest" class="col-sm-3 control-label" style="text-align: left;">Hasil Test</label>
									<div class="col-sm-3">
										<select class="form-control cmb" name="cmbHasilTest" id="cmbHasilTest">
											<option  value="">Pilih</option>
											<option  value="Non Reaktif (Negatif)" @if ($data_kartu_pengobatan->hasil_test == 'Non Reaktif (Negatif)')selected="selected"@endif>Non Reaktif (Negatif)</option>
											<option  value="Repeated Reaktif (2 x reaktif)" @if ($data_kartu_pengobatan->hasil_test == 'Repeated Reaktif (2 x reaktif)')selected="selected"@endif>Repeated Reaktif (2 x reaktif)</option>
											<option  value="Initial Reaktif" @if ($data_kartu_pengobatan->hasil_test == 'Initial Reaktif')selected="selected"@endif>Initial Reaktif</option>
											<option  value="3 x Reaktif" @if ($data_kartu_pengobatan->hasil_test == '3 x Reaktif')selected="selected"@endif>3 x Reaktif</option>
										</select>
									</div>
								</div>
								<!--endregion-->

								<hr style="border: 1px grey solid;">

								<!--region Nama UPK -->
								<div class="form-group">
									<label for="txtPDPNamaUPK" class="col-sm-3 control-label" style="text-align: left;">Nama Faskes PDP</label>

									<div class="col-sm-9">
										<input type="text" class="form-control" name="txtPDPNamaUPK" id="txtPDPNamaUPK" placeholder="Nama Faskes PDP" value="{{$data_kartu_pengobatan->nama_upk2}}">
									</div>
								</div>
								<!--endregion-->

								<!--region No. Reg Pra ART, Tanggal Rujukan PDP -->
								<div class="form-group">
									<label for="txtPDPNoReg" class="col-sm-3 control-label" style="text-align: left;">No Reg Nasional</label>

									<div class="col-sm-3">
										<input type="text" class="form-control" name="txtPDPNoReg" id="txtPDPNoReg" value="{{$data_kartu_pengobatan->no_reg_pra_art}}">
									</div>

									<label for="txtPDPTanggalRujukan" class="col-sm-3 control-label" style="text-align: left;">Tanggal Rujukan PDP</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtPDPTanggalRujukanShow" id="txtPDPTanggalRujukanShow" value="{{$data_kartu_pengobatan->tanggal_rujukan_pdp}}">
									</div>
								</div>
								<!--endregion-->

								<!--region Tanggal Mulai PPK, Tanggal Mulai ART -->
								<div class="form-group">
									<label for="txtTanggalMulaiPPK" class="col-sm-3 control-label" style="text-align: left;">Tanggal Mulai PPK</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalMulaiPPKShow" id="txtTanggalMulaiPPKShow" value="{{$data_kartu_pengobatan->tanggal_mulai_ppk}}">
									</div>

									<label for="txtTanggalMulaiART" class="col-sm-3 control-label" style="text-align: left;">Tanggal Mulai ART</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalMulaiARTShow" id="txtTanggalMulaiARTShow" value="{{$data_kartu_pengobatan->tanggal_mulai_art}}">
									</div>
								</div>
								<div class="form-group">
									<label for="txtTanggalMulaiPPK" class="col-sm-3 control-label" style="text-align: left;">PPK</label>

									<div class="col-sm-3">
										<select class="form-control cmb" name="cmb_ppk" id="cmb_ppk">
											<option  value="">Pilih</option>
											<option  value="Ya" @if ($data_kartu_pengobatan->ppk == 'Ya')selected="selected"@endif>Ya</option>
											<option  value="Tidak" @if ($data_kartu_pengobatan->ppk == 'Tidak')selected="selected"@endif>Tidak</option>
										</select>
									</div>

									<label for="txtTanggalMulaiART" class="col-sm-3 control-label" style="text-align: left;">HRT</label>

									<div class="col-sm-3">
										<select class="form-control cmb" name="cmb_hrt" id="cmb_hrt">
											<option  value="">Pilih</option>
											<option  value="Ya" @if ($data_kartu_pengobatan->hrt == 'Ya')selected="selected"@endif>Ya</option>
											<option  value="Tidak" @if ($data_kartu_pengobatan->hrt == 'Tidak')selected="selected"@endif>Tidak</option>
										</select>
									</div>
								</div>
								<!--endregion-->

								<hr style="border: 1px grey solid;">

								<!--region Hasil Akhir, Tanggal Hasil -->
								<div class="form-group">
									<label for="cmbHasilAkhir" class="col-sm-3 control-label" style="text-align: left;">Hasil Akhir Pengobatan</label>
									<div class="col-sm-3">
										<select class="form-control cmb" name="cmbHasilAkhir" id="cmbHasilAkhir">
											<option value="">Pilih</option>
											<option value="Sembuh" @if ($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Sembuh')selected="selected"@endif>Sembuh</option>
											<option value="Pengobatan Lengkap" @if ($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Pengobatan Lengkap')selected="selected"@endif>Pengobatan Lengkap</option>
											<option value="Gagal" @if ($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Gagal')selected="selected"@endif>Gagal</option>
											<option value="Meninggal" @if ($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Meninggal')selected="selected"@endif>Meninggal</option>
											<option value="Putus Berobat" @if ($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Putus Berobat')selected="selected"@endif>Putus Berobat</option>
											<option value="Tidak Dievaluasi" @if ($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Tidak Dievaluasi')selected="selected"@endif>Tidak Dievaluasi</option>
											<option value="Default" @if ($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Default')selected="selected"@endif>Default</option>
											<option value="Pindah" @if ($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Pindah')selected="selected"@endif>Pindah</option>
										</select>
									</div>

									<label for="txtTanggalHasil" class="col-sm-3 control-label" style="text-align: left;">Tanggal Hasil</label>

									<div class="col-sm-3">
										<input type="text" class="form-control datepicker" name="txtTanggalHasilShow" id="txtTanggalHasilShow" value="{{$data_kartu_pengobatan->tanggal_hasil}}">
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
									<tbody id="edit_tahap_awal">
										@foreach($data_kartu_pengobatan->tahap_awal as $tahap_awal)
										<tr class="bodyRow">
											<input type="hidden" name="tahap_awal_id[]" value="{{$tahap_awal->id}}">
											<td>
												<select style="width: 120px;" class="form-control" name="tahap_awal_bulan_edit[]">
													<option value="Januari" @if ($tahap_awal->tahap_awal_bulan == 'Januari')selected="selected"@endif>Januari</option>
													<option value="Februari" @if ($tahap_awal->tahap_awal_bulan == 'Februari')selected="selected"@endif>Februari</option>
													<option value="Maret" @if ($tahap_awal->tahap_awal_bulan == 'Maret')selected="selected"@endif>Maret</option>
													<option value="April" @if ($tahap_awal->tahap_awal_bulan == 'April')selected="selected"@endif>April</option>
													<option value="Mei" @if ($tahap_awal->tahap_awal_bulan == 'Mei')selected="selected"@endif>Mei</option>
													<option value="Juni" @if ($tahap_awal->tahap_awal_bulan == 'Juni')selected="selected"@endif>Juni</option>
													<option value="Juli" @if ($tahap_awal->tahap_awal_bulan == 'Juli')selected="selected"@endif>Juli</option>
													<option value="Agustus" @if ($tahap_awal->tahap_awal_bulan == 'Agustus')selected="selected"@endif>Agustus</option>
													<option value="September" @if ($tahap_awal->tahap_awal_bulan == 'September')selected="selected"@endif>September</option>
													<option value="Oktober" @if ($tahap_awal->tahap_awal_bulan == 'Oktober')selected="selected"@endif>Oktober</option>
													<option value="November" @if ($tahap_awal->tahap_awal_bulan == 'November')selected="selected"@endif>November</option>
													<option value="Desember" @if ($tahap_awal->tahap_awal_bulan == 'Desember')selected="selected"@endif>Desember</option>
												</select>
											</td>
											<td><input type="checkbox" name="edit_tanggal_1_checklist[]" value="check" {{ $tahap_awal->tanggal_1_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_1_strip[]" value="strip" {{ $tahap_awal->tanggal_1_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_2_checklist[]" value="check" {{ $tahap_awal->tanggal_2_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_2_strip[]" value="strip" {{ $tahap_awal->tanggal_2_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_3_checklist[]" value="check" {{ $tahap_awal->tanggal_3_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_3_strip[]" value="strip" {{ $tahap_awal->tanggal_3_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_4_checklist[]" value="check" {{ $tahap_awal->tanggal_4_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_4_strip[]" value="strip" {{ $tahap_awal->tanggal_4_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_5_checklist[]" value="check" {{ $tahap_awal->tanggal_5_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_5_strip[]" value="strip" {{ $tahap_awal->tanggal_5_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_6_checklist[]" value="check" {{ $tahap_awal->tanggal_6_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_6_strip[]" value="strip" {{ $tahap_awal->tanggal_6_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_7_checklist[]" value="check" {{ $tahap_awal->tanggal_7_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_7_strip[]" value="strip" {{ $tahap_awal->tanggal_7_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_8_checklist[]" value="check" {{ $tahap_awal->tanggal_8_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_8_strip[]" value="strip" {{ $tahap_awal->tanggal_8_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_9_checklist[]" value="check" {{ $tahap_awal->tanggal_9_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_9_strip[]" value="strip" {{ $tahap_awal->tanggal_9_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_10_checklist[]" value="check" {{ $tahap_awal->tanggal_10_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_10_strip[]" value="strip" {{ $tahap_awal->tanggal_10_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_11_checklist[]" value="check" {{ $tahap_awal->tanggal_11_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_11_strip[]" value="strip" {{ $tahap_awal->tanggal_11_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_12_checklist[]" value="check" {{ $tahap_awal->tanggal_12_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_12_strip[]" value="strip" {{ $tahap_awal->tanggal_12_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_13_checklist[]" value="check" {{ $tahap_awal->tanggal_13_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_13_strip[]" value="strip" {{ $tahap_awal->tanggal_13_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_14_checklist[]" value="check" {{ $tahap_awal->tanggal_14_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_14_strip[]" value="strip" {{ $tahap_awal->tanggal_14_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_15_checklist[]" value="check" {{ $tahap_awal->tanggal_15_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_15_strip[]" value="strip" {{ $tahap_awal->tanggal_15_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_16_checklist[]" value="check" {{ $tahap_awal->tanggal_16_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_16_strip[]" value="strip" {{ $tahap_awal->tanggal_16_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_17_checklist[]" value="check" {{ $tahap_awal->tanggal_17_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_17_strip[]" value="strip" {{ $tahap_awal->tanggal_17_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_18_checklist[]" value="check" {{ $tahap_awal->tanggal_18_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_18_strip[]" value="strip" {{ $tahap_awal->tanggal_18_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_19_checklist[]" value="check" {{ $tahap_awal->tanggal_19_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_19_strip[]" value="strip" {{ $tahap_awal->tanggal_19_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_20_checklist[]" value="check" {{ $tahap_awal->tanggal_20_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_20_strip[]" value="strip" {{ $tahap_awal->tanggal_20_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_21_checklist[]" value="check" {{ $tahap_awal->tanggal_21_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_21_strip[]" value="strip" {{ $tahap_awal->tanggal_21_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_22_checklist[]" value="check" {{ $tahap_awal->tanggal_22_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_22_strip[]" value="strip" {{ $tahap_awal->tanggal_22_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_23_checklist[]" value="check" {{ $tahap_awal->tanggal_23_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_23_strip[]" value="strip" {{ $tahap_awal->tanggal_23_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_24_checklist[]" value="check" {{ $tahap_awal->tanggal_24_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_24_strip[]" value="strip" {{ $tahap_awal->tanggal_24_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_25_checklist[]" value="check" {{ $tahap_awal->tanggal_25_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_25_strip[]" value="strip" {{ $tahap_awal->tanggal_25_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_26_checklist[]" value="check" {{ $tahap_awal->tanggal_26_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_26_strip[]" value="strip" {{ $tahap_awal->tanggal_26_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_27_checklist[]" value="check" {{ $tahap_awal->tanggal_27_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_27_strip[]" value="strip" {{ $tahap_awal->tanggal_27_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_28_checklist[]" value="check" {{ $tahap_awal->tanggal_28_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_28_strip[]" value="strip" {{ $tahap_awal->tanggal_28_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_29_checklist[]" value="check" {{ $tahap_awal->tanggal_29_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_29_strip[]" value="strip" {{ $tahap_awal->tanggal_29_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_30_checklist[]" value="check" {{ $tahap_awal->tanggal_30_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_30_strip[]" value="strip" {{ $tahap_awal->tanggal_30_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_31_checklist[]" value="check" {{ $tahap_awal->tanggal_31_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_31_strip[]" value="strip" {{ $tahap_awal->tanggal_31_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input style="width: 50px;" type="number" name="edit_jumlah[]" value="{{$tahap_awal->jumlah}}"></td>
											<td><input style="width: 50px;" type="number" name="edit_berat_badan[]" value="{{$tahap_awal->berat_badan}}"></td>
											<td><a href="" data-id="{{$tahap_awal->id}}" id="delete-tahap-awal" data-kartu_pengobatan="{{$data_kartu_pengobatan->id}}"><i class="fa fa-trash"></i></a></td></tr>

										@endforeach
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
								<div class="box-body table-responsive no-padding">
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
									<tbody id="edit_tahap_lanjutan">
										@foreach($data_kartu_pengobatan->tahap_lanjutan as $tahap_lanjutan)
										<tr class="bodyRow">
											<input type="hidden" name="tahap_lanjutan_id[]" value="{{$tahap_lanjutan->id}}">
											<td>
												<select style="width: 120px;" class="form-control" name="edit_tahap_lanjutan_bulan[]"">
													<option value="Januari" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'Januari')selected="selected"@endif>Januari</option>
													<option value="Februari" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'Februari')selected="selected"@endif>Februari</option>
													<option value="Maret" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'Maret')selected="selected"@endif>Maret</option>
													<option value="April" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'April')selected="selected"@endif>April</option>
													<option value="Mei" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'Mei')selected="selected"@endif>Mei</option>
													<option value="Juni" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'Juni')selected="selected"@endif>Juni</option>
													<option value="Juli" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'Juli')selected="selected"@endif>Juli</option>
													<option value="Agustus" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'Agustus')selected="selected"@endif>Agustus</option>
													<option value="September" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'September')selected="selected"@endif>September</option>
													<option value="Oktober" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'Oktober')selected="selected"@endif>Oktober</option>
													<option value="November" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'November')selected="selected"@endif>November</option>
													<option value="Desember" @if ($tahap_lanjutan->tahap_lanjutan_bulan == 'Desember')selected="selected"@endif>Desember</option>
												</select>
											</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_1_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_1_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_1_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_1_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_2_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_2_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_2_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_2_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_3_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_3_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_3_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_3_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_4_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_4_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_4_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_4_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_5_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_5_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_5_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_5_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_6_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_6_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_6_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_6_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_7_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_7_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_7_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_7_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_8_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_8_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_8_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_8_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_9_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_9_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_9_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_9_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_10_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_10_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_10_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_10_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_11_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_11_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_11_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_11_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_12_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_12_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_12_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_12_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_13_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_13_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_13_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_13_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_14_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_14_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_14_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_14_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_15_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_15_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_15_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_15_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_16_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_16_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_16_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_16_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_17_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_17_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_17_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_17_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_18_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_18_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_18_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_18_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_19_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_19_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_19_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_19_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_20_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_20_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_20_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_20_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_21_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_21_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_21_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_21_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_22_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_22_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_22_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_22_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_23_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_23_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_23_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_23_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_24_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_24_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_24_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_24_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_25_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_25_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_25_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_25_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_26_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_26_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_26_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_26_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_27_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_27_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_27_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_27_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_28_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_28_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_28_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_28_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_29_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_29_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_29_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_29_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_30_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_30_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_30_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_30_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="checkbox" name="edit_tanggal_lanjutan_31_checklist[]" value="check" {{ $tahap_lanjutan->tanggal_lanjutan_31_checklist == 'check' ? 'checked' : '' }}>check<input type="checkbox" name="edit_tanggal_lanjutan_31_strip[]" value="strip" {{ $tahap_lanjutan->tanggal_lanjutan_31_strip == 'strip' ? 'checked' : '' }}>strip</td>
											<td><input type="number" style="width: 50px;" name="edit_jumlah_lanjutan[]" value="{{$tahap_lanjutan->jumlah}}"></td>
											<td><input type="number" style="width: 50px;" name="edit_berat_badan_lanjutan[]" value="{{$tahap_lanjutan->berat_badan}}"></td>
											<td><a href="" data-id="{{$tahap_lanjutan->id}}" data-kartu_pengobatan="{{$data_kartu_pengobatan->id}}" id="delete-tahap-lanjutan"><i class="fa fa-trash"></i></a></td></tr>
										@endforeach
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
									<input type="text" class="form-control" name="nik" id="nik" maxlength="16" placeholder="Nomor Induk Kependudukan">
									<span class="help-inline text-white" id="lblNIK"></span>
								</div>
							</div><!-- NIK -->
							<div class="form-group" id="grpNIK">
								<label for="nik" class="col-sm-3 control-label" style="text-align: left;">BPJS</label>
								<div class="control col-sm-8">
									<input type="text" class="form-control" name="bpjs" id="bpjs" maxlength="16" placeholder="BPJS">
									<span class="help-inline text-red" id="lblBPJS"></span>
								</div>
							</div><!-- BPJS -->
							<div class="form-group" id="grpNamaLengkap">
								<label for="nama_lengkap" class="col-sm-3 control-label" style="text-align: left;">Nama Lengkap</label>
								<div class="control col-sm-8">
									<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" maxlength="77" placeholder="Nama Lengkap">
									<span class="help-inline text-red" id="lblNamaLengkap"></span>
								</div>
							</div><!-- Nama Lengkap -->
							<div class="form-group" id="grpUmur">
								<label for="umur" class="col-sm-3 control-label" style="text-align: left;">Umur</label>
								<div class="control col-sm-8">
									<input type="number" class="form-control" name="umur" id="umur" maxlength="22" placeholder="Umur">
									<span class="help-inline text-red" id="lblUmur"></span>
								</div>
							</div><!-- Umur -->
							<div class="form-group" id="grpKelamin">
								<label for="optKelamin" class="col-sm-3 control-label" style="text-align: left;">Jenis Kelamin</label>

								<div class="col-sm-4">
									  <label>
						                  <input type="radio" name="jenis_kelamin" value="pria" class="flat-red" checked>
						                 Pria
						              </label>
						              <label>
						                  <input type="radio" value="wanita" name="jenis_kelamin" class="flat-red">
						                  Wanita
						              </label>
								</div>
							</div><!-- Kelamin -->
							<div class="form-group" id="grpAlamat">
								<label for="alamat" class="col-sm-3 control-label" style="text-align: left;">Alamat</label>
								<div class="control col-sm-8">
									<input type="text" class="form-control" name="alamat" id="alamat" maxlength="111" placeholder="Alamat">
									<span class="help-inline text-red" id="lblAlamat"></span>
								</div>
							</div><!-- Alamat -->
							<div class="form-group" id="grpRTRW">
								<label for="rt" class="col-sm-3 control-label" style="text-align: left;">&nbsp;</label>
								<label for="rt" class="col-sm-1 control-label" style="text-align: left;">RT</label>
								<div class="control col-sm-2">
									<input type="number" class="form-control" name="rt" id="rt" maxlength="3" placeholder="RT.">
									<span class="help-inline text-red" id="lblRT"></span>
								</div>
								<label for="rw" class="col-sm-1 control-label" style="text-align: left;">RW</label>
								<div class="control col-sm-2">
									<input type="number" class="form-control" name="rw" id="rw" maxlength="3" placeholder="RW.">
									<span class="help-inline text-red" id="lblRW"></span>
								</div>
							</div><!-- RT / RW -->
							<div class="form-group" id="grpKota">
								<label for="kota" class="col-sm-3 control-label" style="text-align: left;">Kota</label>
								<div class="control col-sm-8">
									<select class="form-control select2" name="kota" id="kota" style="width: 100%">
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
									<select class="form-control select2" name="kecamatan" id="kecamatan" required style="width: 100%">
										<option value="0" selected>Pilih Kecamatan</option>
										@foreach ($kecamatans as $kecamatan)
										<option value="{{$kecamatan->nama}}">{{$kecamatan->nama}}</option>
										@endforeach
									</select>
									<span class="help-inline text-white" id="lblKec"></span>
								</div>
							</div><!-- Kecamatan -->
							<div class="form-group" id="grpKel">
								<label for="kelurahan" class="col-sm-3 control-label" style="text-align: left;">Kel.</label>
								<div class="control col-sm-8">
									<select class="form-control select2" name="kelurahan" id="kelurahan" required style="width: 100%">
										<option value="0" selected>Pilih Kelurahan</option>
										@foreach ($kelurahans as $kelurahan)
										<option value="{{$kelurahan->nama}}">{{$kelurahan->nama}}</option>
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
	$('.select2').select2({ width: '100%' });
	$(document).ready(function() {
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
        if (kecamatan == 0) {
        	$("#lblKec").html("Pilih Kecamatan");
        }else if (kelurahan == 0) {
        	$("#lblKel").html("Pilih Kelurahan"); 
        }else{
        	 $.ajax({
			      type: 'post',
			      url: '/tb06',
			      data: {
			        '_token': $('input[name=_token]').val(),
			        'nik': $('input[name=nik]').val(),
			        'bpjs': $('input[name=bpjs]').val(),
			        'nama_lengkap': $('input[name=nama_lengkap]').val(),
			        'umur': $('input[name=umur]').val(),
			        'jenis_kelamin': $('input[name=jenis_kelamin]').val(),
			        'alamat': $('input[name=alamat]').val(),
			        'rt': $('input[name=rt]').val(),
			        'rw': $('input[name=rw]').val(),
			        'kota': $('select[name=kota]').val(),
			        'kecamatan': $('select[name=kecamatan]').val(),
			        'kelurahan': $('select[name=kelurahan]').val(),
			      },
			      success: function(data) {
	        		$('#mdlRegLab').modal('toggle');
			        if ((data.errors)){
			          $('.error').removeClass('hidden');
			          $('.error').text(data.errors.name);
			        }
			        else {
			          $('.error').remove();
			          // console.log(data);
			          var date = new Date(data.created_at);
					  var monthNames = ["January", "February", "March","April", "May", "June", "July","August", "September", "October","November", "December"];
					  var day = date.getDate();
					  var monthIndex = date.getMonth();
					  var year = date.getFullYear();
					  var tanggal_fix =  day + ' ' + monthNames[monthIndex] + ' ' + year;
			          $('#example1').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td></td><td>" + tanggal_fix + "</td><td>" + data.nik + "</td><td>" + data.nama_lengkap + "</td><td>" + data.umur + "</td><td>" + data.jenis_kelamin + "</td><td>" + data.alamat + "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><a href='' class='btnEdit' id='ed_4'><i class='fa fa-edit text-green'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://siporter.puskesmasjoharbaru.com/tb06' class='btnDelete' id='de_4'><i class='fa fa-trash text-red'></i></a></td></tr>");
						  swal({type: 'success',title: 'Data Pasien Berhasil Disimpan',showConfirmButton: false})
				              location.href = "/tb01"
			        }
			      },
			    });
			    $('#nik').val('');
			    $('#nama_lengkap').val('');
			    $('#umur').val('');
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

    	// $('#edit_tahap_awal').DataTable( {
	    //     "scrollX": true,
	    //     "bSort" : false
	    // });

	    // $('#edit_tahap_lanjutan').DataTable( {
	    //     "scrollX": true,
	    //     "bSort" : false
	    // });
	});
</script>
	<script type="text/javascript">
		$(document).on('click', '#delete-kontak', function (e) {
	    e.preventDefault();
	    var id = $(this).data('id');
	    var kontak = $(this).data('kontak');
	        swal({
		      	title: "Are you sure!",
	            type: "error",
	            confirmButtonClass: "btn-danger",
	            confirmButtonText: "Yes!",
	            showCancelButton: true,
	        }).then((result) => {
		    	 $.ajax({
			      type: 'post',
			      url: '/tb01/delete-kontak',
			      data: {
			      	"_token": "{{ csrf_token() }}",
        			"id": id,
        			"kontak":kontak
			      },
			      success: function(data) {
			      	$('.item' + data.id).remove();
			        swal({type: 'success',title: 'Data Berhasil Dihapus',showConfirmButton: false})
			        location.href = "/tb01/" + kontak + "/edit";
			      }
			    });
		    })
	});

	$(document).on('click', '#delete-tahap-awal', function (e) {
	    e.preventDefault();
	    var id = $(this).data('id');
	    var kartu_pengobatan = $(this).data('kartu_pengobatan');
	        swal({
		      	title: "Are you sure!",
	            type: "error",
	            confirmButtonClass: "btn-danger",
	            confirmButtonText: "Yes!",
	            showCancelButton: true,
	        }).then((result) => {
		    	 $.ajax({
			      type: 'post',
			      url: '/tb01/delete-tahap-awal',
			      data: {
			      	"_token": "{{ csrf_token() }}",
        			"id": id,
			      },
			      success: function(data) {
			      	$('.item' + data.id).remove();
			        swal({type: 'success',title: 'Data Berhasil Dihapus',showConfirmButton: false})
			        location.href = "/tb01/" + kartu_pengobatan + "/edit";
			      }
			    });
		    })
	});

	$(document).on('click', '#delete-tahap-lanjutan', function (e) {
	    e.preventDefault();
	    var id = $(this).data('id');
	    var kartu_pengobatan = $(this).data('kartu_pengobatan');
	        swal({
		      	title: "Are you sure!",
	            type: "error",
	            confirmButtonClass: "btn-danger",
	            confirmButtonText: "Yes!",
	            showCancelButton: true,
	        }).then((result) => {
		    	 $.ajax({
			      type: 'post',
			      url: '/tb01/delete-tahap-lanjutan',
			      data: {
			      	"_token": "{{ csrf_token() }}",
        			"id": id,
			      },
			      success: function(data) {
			      	$('.item' + data.id).remove();
			        swal({type: 'success',title: 'Data Berhasil Dihapus',showConfirmButton: false})
			        location.href = "/tb01/" + kartu_pengobatan + "/edit";
			      }
			    });
		    })
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
	var numRow = $('#id_kontak_serumah tr').length;
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

    var numRow = $('#id_hasil_pemeriksaan_dahak tr').length;
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

    function row_tahap_awal (){
    	var num_row = $('#edit_tahap_awal >tbody >tr').length;
    	num_row ++;
    	var row_data = '<tr class="bodyRow" id="bodyRowr'+num_row+'"><td><select class="form-control" name="tahap_awal_bulan[]" id="bulan_'+num_row+'"><option value="Januari">Januari</option><option value="Februari">Februari</option><option value="Maret">Maret</option><option value="April">April</option><option value="Mei">Mei</option><option value="Juni">Juni</option><option value="Juli">Juli</option><option value="Agustus">Agustus</option><option value="September">September</option><option value="Oktober">Oktober</option><option value="November">November</option><option value="Desember">Desember</option></select></td><td><input type="checkbox" name="tanggal_1_checklist[]" value="check">check<input type="checkbox" name="tanggal_1_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_2_checklist[]" value="check">check<input type="checkbox" name="tanggal_2_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_3_checklist[]" value="check">check<input type="checkbox" name="tanggal_3_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_4_checklist[]" value="check">check<input type="checkbox" name="tanggal_4_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_5_checklist[]" value="check">check<input type="checkbox" name="tanggal_5_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_6_checklist[]" value="check">check<input type="checkbox" name="tanggal_6_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_7_checklist[]" value="check">check<input type="checkbox" name="tanggal_7_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_8_checklist[]" value="check">check<input type="checkbox" name="tanggal_8_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_9_checklist[]" value="check">check<input type="checkbox" name="tanggal_9_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_10_checklist[]" value="check">check<input type="checkbox" name="tanggal_10_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_11_checklist[]" value="check">check<input type="checkbox" name="tanggal_11_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_12_checklist[]" value="check">check<input type="checkbox" name="tanggal_12_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_13_checklist[]" value="check">check<input type="checkbox" name="tanggal_13_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_14_checklist[]" value="check">check<input type="checkbox" name="tanggal_14_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_15_checklist[]" value="check">check<input type="checkbox" name="tanggal_15_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_16_checklist[]" value="check">check<input type="checkbox" name="tanggal_16_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_17_checklist[]" value="check">check<input type="checkbox" name="tanggal_17_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_18_checklist[]" value="check">check<input type="checkbox" name="tanggal_18_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_19_checklist[]" value="check">check<input type="checkbox" name="tanggal_19_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_20_checklist[]" value="check">check<input type="checkbox" name="tanggal_20_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_21_checklist[]" value="check">check<input type="checkbox" name="tanggal_21_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_22_checklist[]" value="check">check<input type="checkbox" name="tanggal_22_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_23_checklist[]" value="check">check<input type="checkbox" name="tanggal_23_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_24_checklist[]" value="check">check<input type="checkbox" name="tanggal_24_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_25_checklist[]" value="check">check<input type="checkbox" name="tanggal_25_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_26_checklist[]" value="check">check<input type="checkbox" name="tanggal_26_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_27_checklist[]" value="check">check<input type="checkbox" name="tanggal_27_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_28_checklist[]" value="check">check<input type="checkbox" name="tanggal_28_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_29_checklist[]" value="check">check<input type="checkbox" name="tanggal_29_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_30_checklist[]" value="check">check<input type="checkbox" name="tanggal_30_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_31_checklist[]" value="check">check<input type="checkbox" name="tanggal_31_strip[]" value="strip">strip</td><td><input style="width: 50px;" type="number" name="jumlah[]"></td><td><input style="width: 50px;" type="number" name="berat_badan[]"></td><td><a onclick="remove_row_tahap_awal('+num_row+');"><i class="delete-modal fa fa-trash text-red" style="margin-right: 10px;cursor: pointer;"></i></a></td></tr>';
    	$('#edit_tahap_awal').append(row_data);
    }

    function remove_row_tahap_awal(rnum) {
    	jQuery('#bodyRowr'+rnum).remove();
		
		var rowCount = $('#hasil_pemeriksaan_dahak tr').length;
    }

     function row_tahap_lanjutan (){
     	var row_nums = $('#table_tahap_lanjutan >tbody >tr').length;
    	row_nums ++;
    	var row_datas = '<tr class="bodyRowr" id="body_rows'+row_nums+'"><td><select class="form-control" name="tahap_lanjutan_bulan[]" id="bulan_'+row_nums+'"><option value="Januari">Januari</option><option value="Februari">Februari</option><option value="Maret">Maret</option><option value="April">April</option><option value="Mei">Mei</option><option value="Juni">Juni</option><option value="Juli">Juli</option><option value="Agustus">Agustus</option><option value="September">September</option><option value="Oktober">Oktober</option><option value="November">November</option><option value="Desember">Desember</option></select></td><td><input type="checkbox" name="tanggal_lanjutan_1_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_1_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_2_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_2_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_3_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_3_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_4_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_4_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_5_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_5_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_6_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_6_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_7_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_7_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_8_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_8_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_9_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_9_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_10_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_10_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_11_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_11_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_12_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_12_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_13_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_13_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_14_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_14_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_15_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_15_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_16_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_16_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_17_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_17_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_18_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_18_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_19_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_19_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_20_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_20_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_21_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_21_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_22_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_22_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_23_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_23_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_24_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_24_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_25_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_25_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_26_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_26_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_27_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_27_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_28_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_28_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_29_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_29_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_30_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_30_strip[]" value="strip">strip</td><td><input type="checkbox" name="tanggal_lanjutan_31_checklist[]" value="check">check<input type="checkbox" name="tanggal_lanjutan_31_strip[]" value="strip">strip</td><td><input style="width: 50px;" type="number" name="lanjutan_jumlah[]"></td><td><input style="width: 50px;" type="number" name="lanjutan_berat_badan[]"></td><td><a onclick="remove_row_tahap_lanjutan('+row_nums+');"><i class="delete-modal fa fa-trash text-red" style="margin-right: 10px;cursor: pointer;"></i></a></td></tr>';
    	$('#edit_tahap_lanjutan').append(row_datas);
    }

    function remove_row_tahap_lanjutan(rnum) {
    	jQuery('#body_rows'+rnum).remove();
		
		var rowCount = $('#hasil_pemeriksaan_dahak tr').length;
    }

	$('#select_pasien').on('change', function() {
	  $.ajax(
		   {
		      type:'GET',
		      url:'/tb05/get-data-pasien',
		      data:{'id' : this.value },
		      success: function(data){
		      	$('#txtNIK').val(data.nik);
		      	$('#txtNamaLengkap').val(data.nama_lengkap);
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
</script>
@endsection