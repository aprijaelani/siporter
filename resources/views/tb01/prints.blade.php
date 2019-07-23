<!DOCTYPE html>

<html lang="en"><head>

	<meta charset="UTF-8">

	<title>Kartu Pengobatan</title> 

	<style type="text/css">
		.kotak 
		{ 
		    border: 1px solid black; 
		    width: .65em; 
		    height: .65em; 
		    display: inline-block;
		    margin-right: 4px;
		}
	</style>

</head><body>

	<div>

		<table style="width: 100%;">

			<tr valign='top'>
				<td valign='middle' style="border: 2px solid #000;width: 20%;text-align: center;font-size: 8pt;">
					PENANGGULANGAN TB NASIONAL								
				</td>
				<td></td>
				<td align="right" style="border: 2px solid #000;width: 10%;text-align: center;font-size: 8pt; vertical-align: middle;">
					TB.01
				</td>
			</tr>

			<tr>
				<td></td>
				<td style="font-weight: bold; padding-bottom: 5px; font-size: 14pt; padding-left: 100px">
					KARTU PENGOBATAN PASIEN TB
				</td>
				<td style="text-align: center;font-size: 8pt;" valign="top">Indonesia/{{date('Y')}}</td>
			</tr>

		</table>

		<br>

		<table style="width: 100%; font-size: 10px;">

			<tr>
				<td style="width: 60%">
					Nama Pasien TB : <b>{{$data_kartu_pengobatan->daftar_terduga['nama_lengkap']}}</b>
					<span style="display:inline-block; width: 12em"></span>
					No. Telp / HP : <b>{{$data_kartu_pengobatan->telepon}}</b>
				</td>
				<td style="width: 40%">Nama PMO : <b>{{$data_kartu_pengobatan->nama_pmo}}</b></td>
			</tr>
			<tr>
				<td style="width: 60%">Nomor Induk Kependudukan (NIK) : <b>{{$data_kartu_pengobatan->daftar_terduga['nik']}}</b></td>
				<td style="width: 40%">Alamat PMO : <b>{{$data_kartu_pengobatan->alamat_pmo}}</b></td>
			</tr>
			<tr>
				<td style="width: 60%">Alamat Lengkap : <b>{{$data_kartu_pengobatan->daftar_terduga['alamat']}}</b></td>
				<td style="width: 40%">Nama Faskes : <b>{{$data_kartu_pengobatan->nama_upk}}</b></td>
			</tr>
			<tr>
				<td style="width: 60%;">
					Jenis Kelamin : 
					<span style="display:inline; width: 2em"></span>
					L
					@if ($data_kartu_pengobatan->daftar_terduga['jenis_kelamin'] == 'pria')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>
					@endif
					<!-- <div class="kotak"></div> -->
					<span style="display:inline-block; width: 2em"></span>
					P 
					@if ($data_kartu_pengobatan->daftar_terduga['jenis_kelamin'] == 'wanita')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>
					@endif
				</td>
				<td style="width: 40%">Kab / Kota : <b>{{$data_kartu_pengobatan->daftar_terduga['kota']}}</b></td>
			</tr>
			<tr>
				<td style="width: 60%">
					Jika Wanita Usia Subur : 
					<span style="display:inline-block; width: 2em"></span>
					Hamil
					@if ($data_kartu_pengobatan->daftar_terduga['wanita_usia_subur'] == 'Hamil')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>
					@endif
					<span style="display:inline-block; width: 2em"></span>
					Tidak Hamil
					Hamil
					@if ($data_kartu_pengobatan->daftar_terduga['wanita_usia_subur'] == 'Tidak Hamil')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>
					@endif 
				</td>
				<td style="width: 40%">No. Reg TB.03 Faskes : <b>{{$data_kartu_pengobatan->no_reg_tb03_upk}}</b></td>
			</tr>
			<tr>
				<td style="width: 60%">
					Tanggal Lahir :  
					<span style="display:inline-block; width: 1em"></span>
					{{date('d M Y',strtotime($data_kartu_pengobatan->daftar_terduga['tanggal_lahir']))}}
					<span style="display:inline-block; width: 3em"></span>
					Umur : <b>{{$data_kartu_pengobatan->daftar_terduga['umur']}}</b>
				</td>
				<td style="width: 40%">Tahun : <b>{{$data_kartu_pengobatan->tahun}}</b></td>
			</tr>
			<tr>
				<td style="width: 60%">
					Berat Badan : <b>{{$data_kartu_pengobatan->daftar_terduga['berat_badan']}}</b> Kg 
					<span style="display:inline-block; width: 3em"></span>
					<span style="display:inline-block; width: 5em"></span>
					Tinggi Badan :  <b>{{$data_kartu_pengobatan->daftar_terduga['tinggi_badan']}}</b> cm
					<span style="display:inline-block; width: 3em"></span>
				</td>
				<td style="width: 40%">Provinsi : <b>{{$data_kartu_pengobatan->daftar_terduga['kota']}}</b></td>
			</tr>
			<tr>
				<td style="width: 60%">
					Perut BCG : <b>{{$data_kartu_pengobatan->parut_bcg}}</b>
				</td>
				<td style="width: 40%">No. Reg TB.05 Kab/Kota : <b>{{$data_kartu_pengobatan->no_reg_tb03_kab_kota}}</b></td>
			</tr>
			<tr>
				<td>Jumlah Skoring TB Anak : <b>{{$data_kartu_pengobatan->daftar_terduga['total_skoring_tb_anak']}}</b></td>
			</tr>

		</table>

		<table style="width: 100%; font-size: 10px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 50%;">
					<table border="1" width="90%" style="border-spacing: 0; border-collapse: 0;">
						<tr style="text-align: center;">
							<td rowspan="2">Bulan Ke</td>
							<td colspan="4">Hasil Pemeriksaan Contoh Uji ( Sesuai Dengan TB.05 )</td>
						</tr>
						<tr style="text-align: center;">
							<td rowspan="1" colspan="1">Tanggal</td>
							<td>No. Reg Lab</td>
							<td>BTA *)</td>
							<td>BB</td>
						</tr>
						@foreach ($data_kartu_pengobatan->hasil_pemeriksaan_dahak as $hasil_pemeriksaan_dahak)
						<tr style="text-align: center;">
							<td>{{$hasil_pemeriksaan_dahak->bulan}}</td>
							<td>{{$hasil_pemeriksaan_dahak->tanggal}}</td>
							<td>{{$hasil_pemeriksaan_dahak->no_reg_lab}}</td>
							<td>{{$hasil_pemeriksaan_dahak->bta}}</td>
							<td>{{$hasil_pemeriksaan_dahak->bb}}</td>
						</tr>
						@endforeach
						<tr>
							*) Tulislah 1+, 2+, 3+, Scanty, atau Neg Sesuai Hasil Pemeriksaan Dahak
						</tr>
					</table>
				</td>

				<td style="width: 50%;">
					<table border="1" width="100%" cellpadding="0" cellspacing="0">
						<tr style="text-align: center;">
							<td colspan="2">Tipe Diagnosis dan Klasifikasi Pasien TB</td>
						</tr>
						<tr>
							<td style="width: 50%;">
								<span style="display: block;"> Tipe Diagnosis</span>
								<span style="display: block;">
									<span style="display:inline-block; width: 2em"></span>
									@if ($data_kartu_pengobatan->tipe_diagnosis == 'Terkontaminasi Bakteriologis')
									<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked> Terkontaminasi Bakteriologis
									@else
									<input type="checkbox" style="margin-top: 5px;font-size: 14px"/> Terkontaminasi Bakteriologis
									@endif
								</span>
								<span style="display: block;">
									<span style="display:inline-block; width: 2em"></span>
									@if ($data_kartu_pengobatan->tipe_diagnosis == 'Terdiagnosis Klinis')
									<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked> Terdiagnosis Klinis
									@else
									<input type="checkbox" style="margin-top: 5px;font-size: 14px"/> Terdiagnosis Klinis
									@endif
								</span>
							</td>
							<td style="width: 50%;">
								<span style="display: block;"> Klasifikasi Berdasarkan Lokasi Anatomi</span>
								<span style="display: block;">
									<span style="display:inline-block; width: 2em"></span>
									@if ($data_kartu_pengobatan->klasifikasi_penyakit == 'Paru')
									<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked> TB Paru
									@else
									<input type="checkbox" style="margin-top: 5px;font-size: 14px"/> TB Paru
									@endif
								</span>
								<span style="display: block;">
									<span style="display:inline-block; width: 2em"></span>
									@if ($data_kartu_pengobatan->klasifikasi_penyakit == 'Ekstra Paru')
									<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked> TB Ekstraparu, Lokasi : {{$data_kartu_pengobatan->lokasi}}
									@else
									<input type="checkbox" style="margin-top: 5px;font-size: 14px"/> TB Ekstraparu, Lokasi : {{$data_kartu_pengobatan->lokasi}}
									@endif
								</span>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="width: 50%;">
								<span style="display: block;"> Klarifikasi Berdasarkan Riwayat Pengobatan Sebelumnya</span>
								<span style="display: block;">
									<span>
										<span style="display:inline-block; width: 2em"></span>
										@if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Baru')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked> Baru
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/> Baru
										@endif
									</span>
									<span style="margin-left: 100px;">
										@if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Kambuh')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked> Kambuh
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/> Kambuh
										@endif
									</span>
								</span>
								<span style="display: block;">
									<span>
										<span style="display:inline-block; width: 2em"></span>
										@if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Diobati setelah Gagal')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked> Diobati Setelah Gagal
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/> Diobati Setelah Gagal
										@endif
									</span>
									<span style="margin-left: 30px;">
										@if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Diobat Setelah Putus Berobat')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Diobati Setelah Putus Berobat (Lost To Follow Up)
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Diobati Setelah Putus Berobat (Lost To Follow Up)
										@endif
									</span>
								</span>
								<span style="display: block;">
									<span>
										<span style="display:inline-block; width: 2em"></span>
										@if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Riwayat Pengobatan Lain-Lain')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Lain-lain
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Lain-lain
										@endif
									</span>
									<span style="margin-left: 83px;">
										@if ($data_kartu_pengobatan->riwayat_pengobatan_sebelumnya == 'Riwayat Pengobatan Sebelumnya Tidak Diketahui')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Riwayat Pengobatan Sebelumnya Tidak Diketahui
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Riwayat Pengobatan Sebelumnya Tidak Diketahui
										@endif
									</span>
								</span>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="width: 50%;">
								<span style="display: block;"> Klarifikasi Berdasarkan Status HIV</span>
								<span style="display: block;">
									<span>
										<span style="display:inline-block; width: 2em"></span>
										@if ($data_kartu_pengobatan->status_hiv == 'Positif')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Positif
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Positif
										@endif
									</span>
									<span>
										@if ($data_kartu_pengobatan->status_hiv == 'Negatif')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Negatif
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Negatif
										@endif
									</span>
									<span>
										@if ($data_kartu_pengobatan->status_hiv == 'Tidak Diketahui')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Tidak Diketahui
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Tidak Diketahui
										@endif
									</span>
								</span>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td style="width: 50%;">
					<table width="90%" cellpadding="0" cellspacing="0">
						<tr>
							<td>Pemeriksaan Lain - lain</td>
						</tr>
						<tr>
							<td>
								<ul>
									<li>Uji Tuberkulin : <span style="display:inline-block; width: 1em"><b>{{$data_kartu_pengobatan->uji_tuberkulin}}</b></span> mm (Indukasi Bukan Eritema) </li>
									<li>
										Foto Toraks : <b>{{$data_kartu_pengobatan->daftar_terduga['foto_toraks']}}</b>
										<span style="display:inline-block; width: 3em"></span>
										No Seri : <b>{{$data_kartu_pengobatan->nomor_seri}}</b>
										<span style="display: block;">
											Kesan : <b>{{$data_kartu_pengobatan->kesan}}</b>
										</span>
									</li>
									<li>
										Biopsi Jarum Halus (FNAB) : Tanggal  <b>{{$data_kartu_pengobatan->biopsi_jarum_halus}}</b>
										<span style="display:inline-block; width: 3em"></span>
										Hasil : <b>{{$data_kartu_pengobatan->hasil}}</b>
									</li>
									<li style="margin-top: 3px">
										Biakan Hasil Contoh Uji Selain Dahak :
										@if ($data_kartu_pengobatan->hasil_selain_dahak == 'MTB')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  MTB
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  MTB
										@endif
										<span style="display:inline-block; width: 1em"></span>
										@if ($data_kartu_pengobatan->hasil_selain_dahak == 'Bukan MTB')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Bukan MTB
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Bukan MTB
										@endif
										<span style="display: block;">
											Sebutkan  : @if ($data_kartu_pengobatan->biakan_hasil_contoh_uji_selain_dahak != '')
											{{$data_kartu_pengobatan->biakan_hasil_contoh_uji_selain_dahak}}
											@endif
										</span>
									</li>
								</ul>
							</td>
						</tr>
						<tr>
							<table border="1" width="80%">
								<tr>
									<td>
										<span style="display: block;">Kegiatan TB DM</span>
										<span style="display: block;">
											<span>
												Riwayat DM
												<span style="display:inline-block; width: 2em"></span>
												@if ($data_kartu_pengobatan->riwayat_dm == 'Ya')
												<input type="checkbox" style="margin-top: 5px; font-size: 14px" checked="checked"> Ya
												@else
												<input type="checkbox" style="margin-top: 5px; font-size: 14px"> Ya
												@endif
												<!-- <div class="kotak"></div> -->
											</span>
											@if($data_kartu_pengobatan->riwayat_dm == 'Tidak')
												<input type="checkbox" style="margin-top: 5px; font-size: 14px" checked="checked"> Tidak
												@else
												<input type="checkbox" style="margin-top: 5px; font-size: 14px"> Tidak
											@endif
												<!-- <div class="kotak"></div> -->
											</span>
										</span>
										<span style="display: block;">
											<span>
												Hasil Tes DM
												<span style="display:inline-block; width: 2em"></span>
												@if($data_kartu_pengobatan->hasil_tes_dm == 'Positif')
												<input type="checkbox" style="margin-top: 5px; font-size: 14px" checked="checked"> Positif
												@else
												<input type="checkbox" style="margin-top: 5px; font-size: 14px"> Positif
											@endif
											</span>
											<span>
												@if($data_kartu_pengobatan->hasil_tes_dm == 'Negatif')
												<input type="checkbox" style="margin-top: 5px; font-size: 14px" checked="checked"> Negatif
												@else
												<input type="checkbox" style="margin-top: 5px; font-size: 14px"> Negatif
												@endif
											</span>
										</span>
										<span style="display: block;">
											<span>
												Terampil DM
												<span style="display:inline-block; width: 2em"></span>
												@if($data_kartu_pengobatan->terampil_dm == 'OHO')
												<input type="checkbox" style="margin-top: 5px; font-size: 14px" checked="checked"> OHO
												@else
												<input type="checkbox" style="margin-top: 5px; font-size: 14px"> OHO
												@endif
											</span>
											<span>
												@if($data_kartu_pengobatan->terampil_dm == 'Inj. Insulin')
												<input type="checkbox" style="margin-top: 5px; font-size: 14px" checked="checked"> Inj. Insulin
												@else
												<input type="checkbox" style="margin-top: 5px; font-size: 14px"> Inj. Insulin
												@endif
											</span>
										</span>
									</td>
								</tr>
							</table>
						</tr>
					</table>
				</td>

				<td style="width: 50%;">
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<span style="display: block;">Dirujuk Oleh : </span>
							</td>
							<td>
								<span style="display: block;">
									<span>
										<span style="display:inline-block; width: 3em"></span>
										@if ($data_kartu_pengobatan->dirujuk_oleh == 'Inisiatif Pasien / Keluarga')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Inisiatif Pasien / Keluarga
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Inisiatif Pasien / Keluarga
										@endif
									</span>
								</span>
							</td>
							<td>
								<span style="display: block;">
									<span>
										<span style="display:inline-block; width: 3em"></span>
										@if ($data_kartu_pengobatan->dirujuk_oleh == 'Anggota Masyarakat')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Anggota Masyarakat
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Anggota Masyarakat
										@endif
									</span>
								</span>
							</td>
						</tr>
						<tr>
							<td>
								
							</td>
							<td>
								<span style="display: block;">
									<span>
										<span style="display:inline-block; width: 3em"></span>
										@if ($data_kartu_pengobatan->dirujuk_oleh == 'Faskes')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Faskes
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Faskes
										@endif
									</span>
								</span>
							</td>
							<td>
								<span style="display: block;">
									<span>
										<span style="display:inline-block; width: 3em"></span>
										@if ($data_kartu_pengobatan->dirujuk_oleh == 'Dokter Praktek Mandiri')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Dokter Praktek Mandiri
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Dokter Praktek Mandiri
										@endif
									</span>
								</span>
							</td>
						</tr>
						<tr>
							<td>
								
							</td>
							<td>
								<span style="display: block;">
									<span>
										<span style="display:inline-block; width: 3em"></span>
										@if ($data_kartu_pengobatan->dirujuk_oleh == 'Poli')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Poli
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Poli
										@endif
									</span>
								</span>
							</td>
							<td>
								<span style="display: block;">
									<span>
										<span style="display:inline-block; width: 3em"></span>
										@if ($data_kartu_pengobatan->dirujuk_oleh == 'Lainnya')
										<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Lainnya
										@else
										<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Lainnya
										@endif
									</span>
								</span>
							</td>
						</tr>
						<tr>
							<table border="1" width="100%">
								<tr>
									<td>
										<span style="display: block;">Pindahan Dari : </span>
										<span style="display: block;">
											<span>
												Nama Faskes : <b>{{$data_kartu_pengobatan->pindahan_nama_faskes}}</b>
												<span style="display:inline-block; width: 20em"></span>
											</span>
											<span>
												Kab/Kota : <b>{{$data_kartu_pengobatan->pindahan_kabupaten}}</b>
											</span>
										</span>
										<span style="display: block;">
											<span>
												Alamat Faskes : <b>{{$data_kartu_pengobatan->pindahan_alamat}}</b>
												<span style="display:inline-block; width: 20em"></span>
											</span>
											<span>
												Provinsi : <b>{{$data_kartu_pengobatan->pindahan_provinsi}}</b>
											</span>
										</span>
									</td>
								</tr>
							</table>
						</tr>
					</table>

					<table width="100%">
						<tr>
							<td>
								<span style="display:inline-block; width: 3em"></span>
								Pemeriksaan Kontak
								<span style="display:inline-block; width: 12em"></span>
								Kontak Erat Dengan Anak, Sebutkan <b>{{$data_kartu_pengobatan->kontak_erat}}</b>
							</td>
						</tr>
					</table>

					<table width="100%" border="1" cellpadding="0" cellspacing="0">
						<tr style="text-align: center;">
							<td>No.</td>
							<td>Nama</td>
							<td>L/P</td>
							<td>Umur</td>
							<td>Hasil Pemeriksaan</td>
							<td>Tindak Lanjut</td>
						</tr>
						@php
						$nomor = 1;
						@endphp
						@foreach ($data_kartu_pengobatan->kontak_serumah as $kontak_serumah)
						<tr style="text-align: center;">
							<td>{{$nomor++}}</td>
							<td>{{$kontak_serumah->nama_lengkap}}</td>
							<td>{{$kontak_serumah->jenis_kelamin}}</td>
							<td>{{$kontak_serumah->umur}}</td>
							<td>{{$kontak_serumah->hasil}}</td>
							<td>{{$kontak_serumah->tindak_lanjut}}</td>
						</tr>
						@endforeach
												<tr style="text-align: center;">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr style="text-align: center;">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td>
								<span style="display: block;">
									<span style="display:inline-block; width: 5em"></span>
									<span>
										*) Hasil Diisi : Untuk Dewasa : Sehat/Sakit TB 
									</span>
								</span>
								<span style="display: block;">
									<span style="display:inline-block; width: 6em"></span>
									<span>
										Untuk Anak : Sehat/Infeksi Laten TB/Sakit TB
									</span>
								</span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<br>

		<table style="width: 100%; font-size: 10px; margin-top: 40px" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					Panduan OAT :
					<span style="display:inline-block; width: 1em"></span>
					@if ($data_kartu_pengobatan->tahap_intensif == 'Kategori 1')
					<span style="visibility: hidden;"><input style="font-size: 1px" type="checkbox" checked></span>
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Kategori 1
					@else
					<span style="visibility: hidden;"><input type="checkbox" style="margin-top: 5px; font-size: 1px"/></span>
					<input type="checkbox" style="margin-top: 5px;font-size: 14px">  Kategori 1
					@endif					 
					<span style="display:inline-block; width: 2em"></span>
					@if ($data_kartu_pengobatan->tahap_intensif == 'Kategori 2')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Kategori 2
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Kategori 2
					@endif
					<span style="display:inline-block; width: 2em"></span>
					@if ($data_kartu_pengobatan->tahap_intensif == 'Kategori Anak')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Kategori Anak
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Kategori Anak
					@endif
				</td>
				<td>
					<span style="display:inline-block; width: 5em"></span>
					Sumber Obat :
					<span style="display:inline-block; width: 1em"></span>
					@if ($data_kartu_pengobatan->sumber_obat == 'Program TB')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Program TB
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Program TB
					@endif
					<span style="display:inline-block; width: 1em"></span>
					@if ($data_kartu_pengobatan->sumber_obat == 'Bayar Sendiri')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Bayar Sendiri
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Bayar Sendiri
					@endif
				</td>
			</tr>
			<tr>
				<td>
					Bantuk OAT :
					<span style="display:inline-block; width: 1em"></span>
					@if ($data_kartu_pengobatan->jenis_oat == 'KDT (FDC)')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  KDT (FDC)
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  KDT (FDC)
					@endif
					<span style="display:inline-block; width: 2em"></span>
					@if ($data_kartu_pengobatan->jenis_oat == 'Kombipak / Obat Lepas')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Kombipak / Obat Lepas
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Kombipak / Obat Lepas
					@endif
				</td>
				<td>
					<span style="display:inline-block; width: 11em"></span>
					<span style="display:inline-block; width: 1em"></span>
					@if ($data_kartu_pengobatan->sumber_obat == 'Asuransi')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Asuransi
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Asuransi
					@endif
					<span style="display:inline-block; width: 1em"></span>
					@if ($data_kartu_pengobatan->sumber_obat == 'Lain-lain')
					<input type="checkbox" style="margin-top: 5px;font-size: 14px" checked>  Lain-lain
					@else
					<input type="checkbox" style="margin-top: 5px;font-size: 14px"/>  Lain-lain
					@endif
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<span style="display:inline-block; width: 11em"></span>
					<span style="display:inline-block; width: 3em"></span>
					{{$data_kartu_pengobatan->sumber_obat_lain_lain}}
					<span style="display:inline-block; width: 1em"></span>
				</td>
			</tr>
		</table>

		<table style="width: 100%; font-size: 10px;" cellpadding="0" cellspacing="0">
			<tr>
				<td>I. TAHAP AWAL : *)</td>
			</tr>
			<tr>
				<td>
					KDT : {{$data_kartu_pengobatan->duakdt}} 
					<span style="display:inline-block; width: 15em"></span>
					Tablet
					<span style="display:inline-block; width: 15em"></span>
					No. Batch
					<span style="display:inline-block; width: 15em"></span>
					Streptomisin**)<span style="display:inline-block; width: 4em;margin-top: 4px;margin-left: 30px">{{$data_kartu_pengobatan->streptomisin}} </span>mg/hari
					<span style="display:inline-block; width: 7em"></span>
					No. Batch
				</td>
			</tr>
		</table>

		<table style="width: 100%; font-size: 10px;" border="1" cellpadding="0" cellspacing="0">
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
				<th>BB (KG)</th>
			</tr>
			@if(!empty($data_kartu_pengobatan->tahap_awal) )
				@foreach ($data_kartu_pengobatan->tahap_awal as $tahap_awal)
				<tr>
					<td>{{$tahap_awal->tahap_awal_bulan}}</td>
					@if( $tahap_awal->tanggal_1_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_1_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_2_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_2_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_3_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_3_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_4_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_4_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_5_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_5_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_6_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_6_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_7_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_7_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_8_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_8_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_9_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_9_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_10_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_10_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_11_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_11_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_12_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_12_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_13_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_13_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_14_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_14_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_15_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_15_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_16_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_16_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_17_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_17_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_18_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_18_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_19_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_19_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_20_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_20_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_21_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_21_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_22_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_22_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_23_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_23_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_24_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_24_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_25_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_25_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_26_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_26_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_27_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_27_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_28_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_28_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_29_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_29_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_30_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_30_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_awal->tanggal_31_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_awal->tanggal_31_strip == 'strip' )
						<td><hr style="width: 6px; color: black;"></td>
					@else
						<td>&nbsp;</td>
					@endif
					<td>{{$tahap_awal->jumlah}}</td>
					<td>{{$tahap_awal->berat_badan}}</td>
				</tr>
				@endforeach
			@else
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			@endif
		</table>

		<table style="width: 100%; font-size: 10px;">
			<tr>
				<td>*) Berilah tanda jika pasien datang mengambil obat dan menelan obat di depan petugas kesehatan</td>
			</tr>
			<tr>
				<td> Berilah tanda <strong>"garis lurus sesuai tanggal minum obat"</strong> jika obat dibawa pulang dan ditelan sendiri di rumah </td>
			</tr>
			<tr>
				<td>**) Diisi untuk OAT kategori 2 dan keadaan khusus</td>
			</tr>
		</table>
		<br>
		<table style="width: 100%; font-size: 10px;" cellpadding="0" cellspacing="0">
			<tr>
				<td>II. TAHAP Lanjutan : ***)</td>
			</tr>
			<tr>
				<td>
					KDT : {{$data_kartu_pengobatan->empatkdt}} 
					<span style="display:inline-block; width: 15em"></span>
					Tablet
					<span style="display:inline-block; width: 15em"></span>
					No. Batch
					<span style="display:inline-block; width: 15em"></span>
					Etabutol***)<span style="display:inline-block; width: 4em;margin-top: 4px;margin-left: 30px;">{{$data_kartu_pengobatan->sthambutol}}</span>mg/hari
					<span style="display:inline-block; width: 7em"></span>
					No. Batch
				</td>
			</tr>
		</table>

		<table style="width: 100%; font-size: 10px;" border="1" cellpadding="0" cellspacing="0">
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
				<th>BB (KG)</th>
			</tr>
			@if(!empty($data_kartu_pengobatan->tahap_lanjutan) )
				@foreach ($data_kartu_pengobatan->tahap_lanjutan as $tahap_lanjutan)
				<tr>
					<td>{{$tahap_lanjutan->tahap_lanjutan_bulan}}</td>
					@if( $tahap_lanjutan->tanggal_lanjutan_1_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_1_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_2_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_2_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_3_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_3_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_4_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_4_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_5_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_5_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_6_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_6_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_7_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_7_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_8_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_8_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_9_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_9_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_10_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_10_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_11_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_11_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_12_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_12_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_13_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_13_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_14_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_14_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_15_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_15_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_16_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_16_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_17_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_17_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_18_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_18_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_19_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_19_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_20_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_20_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_21_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_21_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_22_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_22_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_23_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_23_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_24_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_24_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_25_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_25_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_26_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_26_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_27_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_27_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_28_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_28_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_29_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_29_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_30_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_30_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					@if( $tahap_lanjutan->tanggal_lanjutan_31_checklist == 'check' )
						<td style="text-align:center;"><strong>V</strong></td>
					@elseif( $tahap_lanjutan->tanggal_lanjutan_31_strip == 'strip' )
						<td><hr style="width: 6px; color: black;" /></td>
					@else
						<td>&nbsp;</td>
					@endif
					<td>{{$tahap_lanjutan->jumlah}}</td>
					<td>{{$tahap_lanjutan->berat_badan}}</td>
				</tr>
				@endforeach
			@else
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			@endif
			
		</table>

		<table style="width: 100%; font-size: 10px;">
			<tr>
				<td>***) Berilah tanda jika pasien datang mengambil obat dan menelan obat di depan petugas kesehatan</td>
			</tr>
			<tr>
				<td> Berilah tanda <strong>"garis lurus putus - putus sesuai tanggal minum obat"</strong> jika obat dibawa pulang dan ditelan sendiri di rumah </td>
			</tr>
			<tr>
				<td>**) Diisi untuk OAT kategori 2 dan keadaan khusus</td>
			</tr>
		</table>

		<br>

		<table style="width: 100%; font-size: 10px;" cellpadding="0" cellspacing="0">
			<tr>
				<td width="30%">
					<table style="width: 100%; font-size: 10px;" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<span style="display: block;">
									Catatan ( Baca Petunjuk Pengisian ) :
								</span>
								<span style="display: block;">
									{{$data_kartu_pengobatan->catatan}}
								</span>
							</td>
						</tr>
					</table>
					<br><br>
					<table style="width: 80%; font-size: 10px; text-align: center; border-spacing: 0; border-collapse: 0; border: 1px black solid;">
						<tr>
							<td colspan="3" style="text-align: center;">
								<span style="display: block;">
									Hasil Akhir Pengobatan
								</span>
								<span style="display: block;">
									Tulis tanggal dalam kotak yang sesuai
								</span>
								<span style="display: block;">
									&nbsp;
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<span style="display: block;">
									Sembuh
								</span>
								<span style="display: block;">
									@if($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Sembuh')
									{{$data_kartu_pengobatan->tanggal_hasil}}
									@else
									..........
									@endif

								</span>
							</td>
							<td>
								<span style="display: block;">
									Pengobatan Lengkap
								</span>
								<span style="display: block;">
									@if($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Pengobatan Lengkap')
									{{$data_kartu_pengobatan->tanggal_hasil}}
									@else
									..........
									@endif
								</span>
							</td>
							<td>
								<span style="display: block;">
									Gagal
								</span>
								<span style="display: block;">
									@if($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Gagal')
									{{$data_kartu_pengobatan->tanggal_hasil}}
									@else
									..........
									@endif
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<span style="display: block;">
									Meninggal
								</span>
								<span style="display: block;">
									@if($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Meninggal')
									{{$data_kartu_pengobatan->tanggal_hasil}}
									@else
									..........
									@endif
								</span>
							</td>
							<td>
								<span style="display: block;">
									Putus Berobat ( Lost To Follow Up )
								</span>
								<span style="display: block;">
									@if($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Putus Berobat')
									{{$data_kartu_pengobatan->tanggal_hasil}}
									@else
									..........
									@endif
								</span>
							</td>
							<td>
								<span style="display: block;">
									Tidak Dievaluasi
								</span>
								<span style="display: block;">
									@if($data_kartu_pengobatan->hasil_akhir_pengobatan == 'Tidak Dievaluasi')
									{{$data_kartu_pengobatan->tanggal_hasil}}
									@else
									..........
									@endif
								</span>
							</td>
						</tr>
					</table>
				</td>
				<td width="30%">
					<table style="width: 100%; font-size: 10px;" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<span style="display: block;">
									Rujukan / pindah pasien TB
								</span>
								<span style="display: block;">
									<ul style="padding: 0; margin: 0; padding-left: 10px">
										<li>* pindah pengobatan &nbsp;<span style="display:inline-block; width: 11em"></span> <div class="kotak"></div> </li>
									</ul>
								</span>
								<span style="display: block;">
									Nama Faskes Tujuan 
								</span>
								<span style="display: block;">
									Kab / Kota
								</span>
								<span style="display: block;">
									Provinsi
								</span>
								<span style="display: block;">
									<ul style="padding: 0; margin: 0; padding-left: 10px">
										<li>* pindah register pasien TB RO <span style="display:inline-block; width: 7em"></span> <div class="kotak"></div> </li>
									</ul>
								</span>
								<span style="display: block;">
									No. Register TB RO
								</span>
							</td>
						</tr>
					</table>
				</td>
				<td width="40%">
					<table style="width: 70%; font-size: 10px; text-align: center; border-spacing: 0; border-collapse: 0;" border="1">
						<tr>
							<td colspan="3">
								Layanan Tes dan Konseling HIV selama Pengobatan TB
							</td>
						</tr>
						<tr>
							<td>Tanggal Dianjur tes</td>
							<td>Tgl. Test</td>
							<td>Hasil tes* (R/I/RN)</td>
						</tr>
						<tr>
							<td>{{date('d F Y',strtotime($data_kartu_pengobatan->tanggal_dianjurkan))}}</td>
							<td>{{date('d F Y',strtotime($data_kartu_pengobatan->tanggal_test))}}</td>
							<td>{{$data_kartu_pengobatan->hasil_test}}</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</table>
					<table style="width: 60%; font-size: 10px; text-align: center;">
						<tr>
							<td>
								* Hasil Tes Ditulis dengan Kode : R = Reaktif, I = Indeterminate, NR = Non Reaktif
							</td>
						</tr>
					</table>
					<br>
					<table style="width: 100%; font-size: 10px; text-align: center; border-spacing: 0; border-collapse: 0;" border="1">
						<tr>
							<td colspan="4">
								<label>Layanan PDP ( Perawatan, Dukungan dan Pengobatan )</label>
							</td>
						</tr>
						<tr>
							<td>Nama Faskes PDP</td>
							<td>No. Reg Nasional</td>
							<td>PPK ( Ya/Tidak )</td>
							<td>HRT ( Ya/Tidak )</td>
						</tr>
						<tr>
							<td>{{$data_kartu_pengobatan->nama_upk2}}</td>
							<td>{{$data_kartu_pengobatan->no_reg_pra_art}}</td>
							<td>{{$data_kartu_pengobatan->ppk}}</td>
							<td>{{$data_kartu_pengobatan->hrt}}</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

	</div>

</body></html>