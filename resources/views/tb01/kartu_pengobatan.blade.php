@extends('layouts.app')
@section('content')
<style type="text/css">
	.select2-dropdown { z-index: 9999 }
</style>
<div class="col-md-12" style="margin-top: -50px;">
    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card wizard-card" data-color="rose" id="wizardProfile">
            <form method="post" action="/tb01/create"><!-- form start -->
				{{ csrf_field() }}
                <div class="wizard-navigation">
                    <ul>
                        <li>
                            <a href="#data_pasien" data-toggle="tab">Pasien</a>
                        </li>
                        <li>
                            <a href="#lab_1" data-toggle="tab">I</a>
                        </li>
                        <li>
                            <a href="#lab_2" data-toggle="tab">II</a>
                        </li>
                        <li>
                            <a href="#kontak" data-toggle="tab">Kontak</a>
                        </li>
                        <li>
                            <a href="#tahap_insentif" data-toggle="tab">Tahap Intensif</a>
                        </li>
                        <li>
                            <a href="#pemeriksaan_dahak" data-toggle="tab">Hasil Pemeriksaan Dahak</a>
                        </li>
                        <li>
                            <a href="#konseling_pdp" data-toggle="tab">Konseling dan PDP</a>
                        </li>
                        <li>
                            <a href="#tahap_awal" data-toggle="tab">Tahap Awal</a>
                        </li>
                        <li>
                            <a href="#tahap_lanjutan" data-toggle="tab">Tahap Lanjutan</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" style="margin-top: 0px;">
                	<div class="tab-pane" id="data_pasien">
                		<div class="row">
                			<div class="col-md-12">
	                            <div class="card">
	                                <div class="card-content">
	                                    <div class="material-datatables">
	                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	                                            <thead>
	                                                <tr>
														<th style="font-weight: bold;">No.</th>
														<th style="font-weight: bold;">NIK</th>
														<th style="font-weight: bold;">Nama Lengkap</th>
														<th style="font-weight: bold;">Jenis Kelamin</th>
														<th style="font-weight: bold;">Umur</th>
														<th style="font-weight: bold;">Alamat</th>
														<th style="font-weight: bold;">Tindakan</th>
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
																<a href="/tb01/{{$pasien->id}}/edit" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">edit</i></a>
							                                    <a href="/tb01/prints/{{$pasien->id}}" target="_blank" class="btn btn-simple btn-primary btn-icon like"><i class="material-icons">print</i></a>
							                                    <a class="btn btn-simple btn-danger btn-icon"><i class="material-icons delete-modal" data-id="{{$pasien->id}}">delete_outline</i></a>  
															</td>
											            </tr>
											            @endif
											        @endforeach
	                                            </tbody>
	                                        </table>
	                                    </div>
	                                </div>
	                                <!-- end content-->
	                            </div>
	                            <!--  end card  -->
	                        </div>
                		</div>
                	</div>
                  <div class="tab-pane" id="lab_1">
                    <div class="row">
                    	<div class="col-md-6">
            				<div class="form-group">
            					<label style="color:black;">Pilih Pasien</label>
            					<select class="form-control select2" name="permohonan_lab_id" id="select_pasien" style="width: 100%;">
				                  	<option value="">Pilih Pasien</option>
				                  	@foreach ($pasiens as $pasien)
				                  	<option value="{{$pasien->id}}">{{$pasien->no_reg_lab}} - {{$pasien->daftar_terduga['nama_lengkap']}}</option>
				                  	@endforeach
				                </select>
            				</div>   
            				<div class="form-group">
            					<label style="color:black;">Nama Pasien</label>
            					<input type="text" class="form-control" name="txtNamaLengkap" id="txtNamaLengkap" placeholder="Nama Pasien" readonly>
            				</div>
            				<div class="form-group" style="padding-bottom: 5px;">
            					<label style="color:black;">Telp./HP</label>
            					<input type="text" class="form-control" name="txtTelp" id="txtTelp" placeholder="Telp./HP Pasien">
            				</div>
            				<div class="form-group">
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
            				<div class="form-group">
            					<label style="color:black;">Alamat Lengkap</label>
            					<textarea class="form-control" name="txtAlamat" id="txtAlamat" placeholder="Alamat Rumah / Tempat Tinggal" rows="2" readonly></textarea>
            				</div>
            			</div>
                    	<div class="col-md-6">
                    		<div class="form-group" style="margin-bottom: -8px;">
            					<label style="color:black;">NIK</label>
            					<input type="number" class="form-control" name="txtNIK" id="txtNIK" maxlength="16" placeholder="NIK" readonly>
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Nama PMO</label>
            					<input type="text" class="form-control" name="txtNamaPMO" id="txtNamaPMO" placeholder="Nama PMO">
            				</div>            				                       
            				<div class="form-group">
            					<label style="color:black;">Telp./HP PMO</label>
            					<input type="text" class="form-control" name="txtTelpPMO" id="txtTelpPMO" placeholder="Telp./HP PMO">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Alamat PMO</label>
            					<textarea class="form-control" name="txtAlamatPMO" id="txtAlamatPMO" placeholder="Alamat Rumah / Tempat Tinggal PMO" rows="2"></textarea>
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Umur</label>
            					<input type="number" class="form-control" name="txtUmur" id="txtUmur" placeholder="Umur" readonly>
            				</div>
                    	</div>
                    </div>
                  </div>
                  <div class="tab-pane" id="lab_2">
                    <div class="row">
                    	<div class="col-md-6">
            				<div class="form-group">
            					<label style="color:black;">Tahun</label>
            					<input type="text" class="form-control datepicker" name="txtTahun" id="txtTahun" placeholder="Tahun">
            				</div>               				
            				<div class="form-group">
            					<label style="color:black;">No. Reg. TB03 UPK</label>
            					<input type="text" class="form-control" name="txtNoRegTB03UPK" id="txtNoRegTB03UPK" placeholder="No. Reg. TB03 UPK">
            				</div>            				
            				<div class="form-group">
            					<label style="color:black;">Parut BCG</label>
            					<select class="form-control cmb" name="cmbBCG" id="cmbBCG">
									<option value="">Pilih</option>
									<option value="Tidak Ada">Tidak Ada</option>
									<option value="Ada">Ada</option>
								</select>
            				</div>            				
            				<div class="form-group">
            					<label style="color:black;">Klasifikasi Berdasarkan Lokasi Anatomi</label>
            					<select class="form-control cmb" name="cmbKlasifikasi" id="cmbKlasifikasi">
									<option value="">Pilih</option>
									<option value="Paru">Paru</option>
									<option value="Ekstra Paru">Ekstra Paru</option>
								</select>
            				</div>            				
            				<div class="form-group">
            					<label style="color:black;">Tipe Diagnosis</label>
            					<select class="form-control cmb" name="tipeDiagnosis" id="tipeDiagnosis">
									<option value="">Pilih</option>
									<option value="Terkontaminasi Bakteriologis">Terkontaminasi Bakteriologis</option>
									<option value="Terdiagnosis Klinis">Terdiagnosis Klinis</option>
								</select>
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Dirujuk oleh</label>
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
            				<div class="form-group" style="display: none;" id="sebutkan">
            					<label style="color:black;">Sebutkan</label>
            					<input type="text" class="form-control" name="txtDirujuk" id="txtDirujuk" placeholder="Dirujuk  Oleh">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Nomor Seri</label>
            					<input type="text" class="form-control" name="nomor_seri" id="nomor_seri" placeholder="Nomor Seri">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Biopsi Jarum Halus (FNAB)</label>
            					<input type="text" class="form-control" name="biopsi_jarum" id="biopsi_jarum" placeholder="Biopsi Jarum Halus (FNAB)">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Biakan Hasil Contoh Uji Selain Dahak</label>
            					<select class="form-control cmb" name="contoh_uji_selain_dahak" id="contoh_uji_selain_dahak">
									<option value="">Pilih</option>
									<option value="MTB">MTB</option>
									<option value="Bukan MTB">Bukan MTB</option>
								</select>
            				</div>            				
            				<div class="form-group" style="display: none;" id="sebutkan_biakan_hasil">
            					<label style="color:black;">Sebutkan Biakan Hasil Contoh Uji Selain Dahak</label>
            					<input type="text" class="form-control sebutkanBiiakanHasil" name="sebutkan_biakan_hasil_contoh_uji_selain_dahak" id="sebutkan_biakan_hasil_contoh_uji_selain_dahak" placeholder="Sebutkan Biakan Hasil Contoh Uji Selain Dahak">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Riwayat DM</label>
            					<select class="form-control cmb" name="riwayat_dm" id="riwayat_dm">
									<option value="">Pilih</option>
									<option value="Ya">Ya</option>
									<option value="Tidak">Tidak</option>
								</select>
            				</div>            				
            				<div class="form-group">
            					<label style="color:black;">Terapi DM</label>
            					<select class="form-control cmb" name="terampil_dm" id="terampil_dm">
									<option value="">Pilih</option>
									<option value="OHO">OHO</option>
									<option value="Inj. Insulin">Inj. Insulin</option>
								</select>
            				</div>            				
            				<div class="form-group" style="display: none;" id="tipe_pasien">
            					<label style="color:black;">Sebutkan Tipe Pasien</label>
            					<input type="text" class="form-control" name="txtTipePasien" id="txtTipePasien" placeholder="Tipe Pasien">
            				</div>
            				<div class="form-group tipePasienPindahan" style="display: none;">
            					<label style="color:black;">Nama Faskes</label>
            					<input type="text" class="form-control" name="nama_faskes_pindahan" id="nama_faskes_pindahan" placeholder="Nama Faskes">
            				</div>            				
            				<div class="form-group tipePasienPindahan" style="display: none;">
            					<label style="color:black;">Alamat Faskes</label>
            					<textarea class="form-control" name="alamat_faskes_pindahan" placeholder="Alamat Faskes"></textarea>
            				</div>
            			</div>
                    	<div class="col-md-6">
                    		<div class="form-group">
            					<label style="color:black;">Nama UPK</label>
            					<input type="text" class="form-control" name="txtNamaUPK" id="txtNamaUPK" placeholder="Nama UPK">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">No. Reg. TB05 Kab./Kota</label>
            					<input type="text" class="form-control" name="txtNoRegTB03Kab" id="txtNoRegTB03Kab" placeholder="No. Reg. TB03 Kab./Kota">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Klasifikasi Berdasarkan Riwayat Pengobatan Sebelumnya</label>
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
            				<div class="form-group">
            					<label style="color:black;">Lokasi</label>
            					<input type="text" class="form-control" name="txtLokasi" id="txtLokasi" placeholder="Lokasi">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Klasifikasi Berdasarkan Riwaat Status HIV</label>
            					<select class="form-control cmb" name="status_hiv" id="status_hiv">
									<option value="">Pilih</option>
									<option value="Positif">Positif</option>
									<option value="Negatif">Negatif</option>
									<option value="Tidak Diketahui">Tidak Diketahui</option>
								</select>
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Uji Tuberkulin</label>
            					<input type="text" class="form-control" name="uji_tuberkulin" id="uji_tuberkulin" placeholder="Uji Tuberkulin">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Foto Toraks</label>
            					<input type="text" class="form-control" name="foto_toraks" id="foto_toraks" placeholder="Foto Toraks">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Kesan</label>
            					<input type="text" class="form-control" name="kesan" id="kesan" placeholder="Kesan">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Hasil</label>
            					<input type="text" class="form-control" name="txthasil" id="txthasil" placeholder="Hasil">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Hasil Tes DM</label>
            					<select class="form-control cmb" name="hasil_tes_dm" id="hasil_tes_dm">
									<option value="">Pilih</option>
									<option value="Positif">Positif</option>
									<option value="Negatif">Negatif</option>
								</select>
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Tipe Pasien</label>
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
            				<div class="form-group tipePasienPindahan" style="display: none;">
            					<label style="color:black;">Kab / Kota</label>
            					<input type="text" class="form-control" name="kabupaten_pindahan" id="kabupaten_pindahan"  placeholder="Kab / Kota">
            				</div>
            				<div class="form-group tipePasienPindahan" style="display: none;">
            					<label style="color:black;">Provinsi</label>
            					<input type="text" class="form-control" name="provinsi_pindahan" id="provinsi_pindahan"  placeholder="Provinsi">
            				</div>
                    	</div>
                    </div>
                  </div>
                  <div class="tab-pane" id="kontak">
                    <div class="row">
                    	<div class="col-md-8">
                    		<div class="form-group">
            					<label style="color:black;">Kontak Erat Dengan Anak</label>
            					<input type="text" class="form-control" name="kontak_erat" id="kontak_erat"  placeholder="Kontak Erat">
            				</div>
            			</div>
            			<div class="col-md-4">
                    		<div class="form-group">
                    			<a class="btn btn-info" id="btnAddRow" onclick="AddRow()">Tambah Kontak Serumah</a>
            				</div>
            			</div>
            			<div class="col-md-12">
            				<table id="kontak_serumah" class="table table-bordered table-striped">
					            <thead>
									<tr role="row">
										<th style="text-align: center; font-size: 14px; font-weight: bold;">Nama Lengkap</th>
										<th style="text-align: center; font-size: 14px; font-weight: bold;">Jenis Kelamin</th>
										<th style="text-align: center; font-size: 14px; font-weight: bold;">Umur</th>
										<th style="text-align: center; font-size: 14px; font-weight: bold;">Tanggal Periksa</th>
										<th style="text-align: center; font-size: 14px; font-weight: bold;">Hasil</th>
										<th style="text-align: center; font-size: 14px; font-weight: bold;">Tindak Lanjut</th>
										<th style="text-align: center; font-size: 14px; font-weight: bold;">Action</th>
									</tr>
								</thead>
					            <tbody>
								</tbody>
				      		</table>
            			</div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tahap_insentif">
                    <div class="row">
                    	<div class="col-md-6">
                    		<div class="form-group">
            					<label style="color:black;">Bentuk OAT</label>
            					<select class="form-control cmb" name="cmbJenisOAT" id="cmbJenisOAT">
									<option value="">Pilih</option>
									<option value="KDT (FDC)">KDT (FDC)</option>
									<option value="Kombipak / Obat Lepas">Kombipak / Obat Lepas</option>
								</select>
            				</div>
            			</div>
            			<div class="col-md-6">
                    		<div class="form-group">
            					<label style="color:black;">Paduan OAT</label>
            					<select class="form-control cmb" name="cmbTahapIntensif" id="cmbTahapIntensif">
									<option value="">Pilih</option>
									<option value="Kategori 1">Kategori 1</option>
									<option value="Kategori 2">Kategori 2</option>
									<option value="Kategori Anak">Kategori Anak</option>
								</select>
            				</div>
            			</div>
            			<div class="col-md-12">
            				<div class="form-group">
            					<label style="color:black;">Catatan</label>
            					<textarea class="form-control" name="txtCatatan" id="txtCatatan" placeholder="Catatan" rows="2"></textarea>
            				</div> 
            			</div>
            			<div class="col-md-6">
                    		<div class="form-group">
            					<label style="color:black;">4KDT (FDC)</label>
            					<input type="number" class="form-control" name="txtEKDT" id="txtEKDT" min="0" placeholder="Tablet / Hari">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">2KDT (FDC)</label>
            					<input type="number" class="form-control" name="txtDKDT" id="txtDKDT" min="0" placeholder="Tablet / Hari">
            				</div>
            				<div class="form-group" id="">
            					<label style="color:black;">Sumber Obat</label>
            					<select class="form-control cmb" name="sumber_obat" id="sumber_obat">
									<option value="">Pilih</option>
									<option value="Program TB">Program TB</option>
									<option value="Bayar Sendiri">Bayar Sendiri</option>
									<option value="Asuransi">Asuransi</option>
									<option value="Lain-lain">Lain-lain</option>
								</select>
            				</div>
            			</div>
            			<div class="col-md-6">
                    		<div class="form-group">
            					<label style="color:black;">Streptomisin</label>
            					<input type="number" class="form-control" name="txtStrep" id="txtStrep" min="0" placeholder="Mg / Hari">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Ethambutol</label>
            					<input type="number" class="form-control" name="txtEtham" id="txtEtham" min="0" placeholder="Tablet / Hari">
            				</div>
            				<div class="form-group" id="sumberObatLainLain" style="display: none;">
            					<label style="color:black;">Sumber Obat Lain - Lain</label>
            					<input type="text" class="form-control" name="sumber_obat_lain_lain" id="sumber_obat_lain_lain" placeholder="Sumber Obat">
            				</div>
            			</div>
                    </div>
                  </div>
                  <div class="tab-pane" id="pemeriksaan_dahak">
                    <div class="row">
                    	<div class="col-md-4">
                    		<a class="btn btn-info" id="btnRowAdd" onclick="RowAdd()">Tambah Hasil Pemeriksaan Dahak</a>
                    	</div>
                    	<div class="col-md-12">
                    		<table id="hasil_pemeriksaan_dahak" class="table table-bordered table-striped">
								<thead>
									<tr role="row">
										<th  style="font-size: 14px;text-align: center;font-weight: bold;">Bulan</th>
										<th  style="font-size: 14px;text-align: center;font-weight: bold;">Tanggal</th>
										<th  style="font-size: 14px;text-align: center;font-weight: bold;">No. Reg. Lab.</th>
										<th  style="font-size: 14px;text-align: center;font-weight: bold;">BTA</th>
										<th  style="font-size: 14px;text-align: center;font-weight: bold;">BB (Kg)</th>
										<th  style="font-size: 14px;text-align: center;font-weight: bold;">Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
                    	</div>
                    </div>
                  </div>
                  <div class="tab-pane" id="konseling_pdp">
                    <div class="row">
                    	<div class="col-md-6">
                    		<div class="form-group">
            					<label style="color:black;">Tanggal Dianjurkan</label>
            					<input type="text" class="form-control datepicker" name="txtTanggalAnjurShow" id="txtTanggalAnjurShow">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Tempat Test</label>
            					<input type="text" class="form-control" name="txtTempatTest" id="txtTempatTest" placeholder="Tempat Test">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Tanggal Post Test</label>
            					<input type="text" class="form-control datepicker" name="txtTanggalPostTestShow" id="txtTanggalPostTestShow">
            				</div>
            			</div>
            			<div class="col-md-6">
                    		<div class="form-group">
            					<label style="color:black;">Tanggal Pre Test</label>
            					<input type="text" class="form-control datepicker" name="txtTanggalPreTestShow" id="txtTanggalPreTestShow">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Tanggal Test</label>
            					<input type="text" class="form-control datepicker" name="txtTanggalTestShow" id="txtTanggalTestShow">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Hasil Test</label>
            					<select class="form-control cmb" name="cmbHasilTest" id="cmbHasilTest">
									<option value="">Pilih</option>
									<option value="Non Reaktif (Negatif)">Non Reaktif (Negatif)</option>
									<option value="Repeated Reaktif (2 x reaktif)">Repeated Reaktif (2 x reaktif)</option>
									<option value="Initial Reaktif">Initial Reaktif</option>
									<option value="3 x Reaktif">3 x Reaktif</option>
								</select>
            				</div>
            			</div>
            			<div class="col-md-12">
            				<div class="form-group">
            					<label style="color:black;">Nama Faskes PDP</label>
            					<input type="text" class="form-control" name="txtPDPNamaUPK" id="txtPDPNamaUPK" placeholder="NamaUPK">
            				</div> 
            			</div>
            			<div class="col-md-6">
                    		<div class="form-group">
            					<label style="color:black;">No Reg Nasional</label>
            					<input type="text" class="form-control" name="txtPDPNoReg" id="txtPDPNoReg">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Tanggal Mulai PPK</label>
            					<input type="text" class="form-control datepicker" name="txtTanggalMulaiPPKShow" id="txtTanggalMulaiPPKShow">
            				</div>
            				<div class="form-group" id="">
            					<label style="color:black;">PPK</label>
            					<select class="form-control cmb" name="cmb_ppk" id="cmb_ppk">
									<option  value="">Pilih</option>
									<option  value="Ya">Ya</option>
									<option  value="Tidak">Tidak</option>
								</select>
            				</div>
            				<div class="form-group" id="">
            					<label style="color:black;">Hasil Akhir Pengobatan</label>
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
            			</div>
            			<div class="col-md-6">
                    		<div class="form-group">
            					<label style="color:black;">Tanggal Rujukan PDP</label>
            					<input type="text" class="form-control datepicker" name="txtPDPTanggalRujukanShow" id="txtPDPTanggalRujukanShow">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Tanggal Mulai ART</label>
            					<input type="text" class="form-control datepicker" name="txtTanggalMulaiARTShow" id="txtTanggalMulaiARTShow">
            				</div>
            				<div class="form-group">
            					<label style="color:black;">HRT</label>
            					<select class="form-control cmb" name="cmb_hrt" id="cmb_hrt">
									<option  value="">Pilih</option>
									<option  value="Ya">Ya</option>
									<option  value="Tidak">Tidak</option>
								</select>
            				</div>
            				<div class="form-group">
            					<label style="color:black;">Tanggal Hasil</label>
            					<input type="text" class="form-control datepicker" name="txtTanggalHasilShow" id="txtTanggalHasilShow">
            				</div>
            			</div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tahap_awal">
                    <div class="row">
            			<div class="col-md-4">
                    		<div class="form-group">
                    			<a class="btn btn-info" id="btnAddRow" onclick="row_tahap_awal()">Tambah Data</a>
            				</div>
            			</div>
            			<div class="col-md-12">
            				<div class="table-responsive">
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
							</div>
            			</div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tahap_lanjutan">
                    <div class="row">
            			<div class="col-md-4">
                    		<div class="form-group">
                    			<a class="btn btn-info" onclick="row_tahap_lanjutan()">Tambah Data</a>
            				</div>
            			</div>
            			<div class="col-md-12">
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
						<label for="nik" class="col-sm-3 control-label" style="font-weight:bold; color:black; text-align: left;">NIK</label>
						<div class="control col-sm-8">
							<input type="text" class="form-control" name="nik" id="nik" value="" maxlength="16" placeholder="Nomor Induk Kependudukan">
							<span class="help-inline text-white" id="lblNIK"></span>
						</div>
					</div><!-- NIK -->
					<div class="form-group" id="grpNamaLengkap">
						<label for="nama_lengkap" class="col-sm-3 control-label" style="font-weight:bold; color:black; text-align: left;">Nama Lengkap</label>
						<div class="control col-sm-8">
							<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="" maxlength="77" placeholder="Nama Lengkap">
							<span class="help-inline text-red" id="lblNamaLengkap"></span>
						</div>
					</div><!-- Nama Lengkap -->
					<div class="form-group" id="grpNIK">
						<label for="nik" class="col-sm-3 control-label" style="font-weight:bold; color:black; text-align: left;">BPJS</label>
						<div class="control col-sm-4">
							<input type="text" class="form-control" name="bpjs" id="bpjs" value="" maxlength="16" placeholder="BPJS">
							<span class="help-inline text-red" id="lblBPJS"></span>
						</div>
						<label for="umur" class="col-sm-1 control-label" style="font-weight:bold; color:black; text-align: left;">Tinggi</label>
						<div class="control col-sm-3">
							<input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" value="" maxlength="22" placeholder="Tinggi">
							<span class="help-inline text-white" id="lblUmur">Cm</span>
						</div>
					</div><!-- BPJS -->
					<div class="form-group" id="grpUmur">
						<label for="umur" class="col-sm-3 control-label" style="font-weight:bold; color:black; text-align: left;">Tanggal Lahir</label>
						<div class="control col-sm-4">
							<input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" value="" maxlength="22" placeholder="Tanggal Lahir">
							<span class="help-inline text-red" id="lblUmur"></span>
						</div>
						<label for="umur" class="col-sm-1 control-label" style="font-weight:bold; color:black; text-align: left;">Umur</label>
						<div class="control col-sm-3">
							<input type="number" class="form-control" name="umur" id="umur" value="" min="1" placeholder="Umur">
							<span class="help-inline text-red" id="lblUmur"></span>
						</div>
					</div><!-- Umur -->
					<div class="form-group" id="grpKelamin">
						<label for="optKelamin" class="col-sm-3 control-label" style="font-weight:bold; color:black; text-align: left;">Jenis Kelamin</label>

						<div class="control col-sm-4">
							  <label>
				                  <input type="radio" name="jenis_kelamin" value="font-weight:bold; color:black; pria" class="flat-red" checked>
				                 Pria
				              </label>
				              <label>
				                  <input type="radio" value="wanita" name="font-weight:bold; color:black; jenis_kelamin" class="flat-red">
				                  Wanita
				              </label>
						</div>
						<label for="umur" class="col-sm-1 control-label">Beratfont-weight:bold; color:black; </label>
						<div class="control col-sm-3">
							<input type="number" class="form-control" name="berat" id="berat" min="1" placeholder="Berat">
							<span class="help-inline text-red" id="lblUmur"></span>
						</div>
					</div><!-- Kelamin -->
					<div class="form-group" id="grpAlamat">
						<label for="alamat" class="col-sm-3 control-label" style="font-weight:bold; color:black; text-align: left;">Alamat</label>
						<div class="control col-sm-8">
							<input type="text" class="form-control" name="alamat" id="alamat" value="" maxlength="111" placeholder="Alamat">
							<span class="help-inline text-red" id="lblAlamat"></span>
						</div>
					</div><!-- Alamat -->
					<div class="form-group" id="grpRTRW">
						<label for="rt" class="col-sm-3 control-label" style="font-weight:bold; color:black; text-align: left;">&nbsp;</label>
						<label for="rt" class="col-sm-1 control-label" style="font-weight:bold; color:black; text-align: left;">RT</label>
						<div class="control col-sm-2">
							<input type="number" class="form-control" name="rt" id="rt" value="" maxlength="3" placeholder="RT.">
							<span class="help-inline text-red" id="lblRT"></span>
						</div>
						<label for="rw" class="col-sm-1 control-label" style="font-weight:bold; color:black; text-align: left;">RW</label>
						<div class="control col-sm-2">
							<input type="number" class="form-control" name="rw" id="rw" value="" maxlength="3" placeholder="RW.">
							<span class="help-inline text-red" id="lblRW"></span>
						</div>
					</div><!-- RT / RW -->
					<div class="form-group" id="grpKota">
						<label for="kota" class="col-sm-3 control-label" style="font-weight:bold; color:black; text-align: left;">Kota</label>
						<div class="control col-sm-8">
							<select class="form-control select2" name="kota" id="kota">
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
						<label for="kecamatan" class="col-sm-3 control-label" style="font-weight:bold; color:black; text-align: left;">Kec.</label>
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
						<label for="kelurahan" class="col-sm-3 control-label" style="font-weight:bold; color:black; text-align: left;">Kel.</label>
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
				<button class="btn btn-primary" id="btnSimpan" disabled>Simpan</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	$().ready(function() {
        demo.initMaterialWizardPermohonanLab();
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            }
         });
        // demo.initFormExtendedDatetimepickers();
    });
	$(document).ready(function() {

		$('.select2').select2()

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
	});
</script>
<script type="text/javascript">

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
		      		$("#pria").prop('checked',true);
		      	}else{
		      		$("#wanita").prop('checked',true);
		      	}
		      	// $("#subscribeAddress").iCheck('uncheck');
		      	// $('#pria').iCheck('checked');
		      }
		   }
		);
	});

	$('#cmbDirujuk').on('change', function() {
		if($('#cmbDirujuk').val() == 'Lainnya') {
            $('#sebutkan').show(); 
        } else {
            $('#sebutkan').hide(); 
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
            $('#tipe_pasien').show(); 
        } else {
            $('#tipe_pasien').hide(); 
        } 
	});

	$('#contoh_uji_selain_dahak').on('change', function() {
		if($('#contoh_uji_selain_dahak').val() == 'Bukan MTB') {
            $('#sebutkan_biakan_hasil').show(); 
        } else {
            $('#sebutkan_biakan_hasil').hide(); 
        } 
	});

	$('#sumber_obat').on('change', function() {
		if($('#sumber_obat').val() == 'Lain-lain') {
            $('#sumberObatLainLain').show(); 
        } else {
            $('#sumberObatLainLain').hide(); 
        } 
	});

	$('.btn-next-child').click(function(){
  	 $('.nav-tabs > .active').next('li').find('a').trigger('click');
	});

  	$('.btn-prev-child').click(function(){
  	$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});
</script>
@endsection