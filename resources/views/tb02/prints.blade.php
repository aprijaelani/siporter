<!DOCTYPE html>

<html lang="en"><head>

	<meta charset="UTF-8">

	<title>Kartu Identitas Penderita</title> 

	<!-- Optional theme -->

</head><style type="text/css">

table.table-bordered{

	border:1px solid black;

	margin-top:20px;

}

table.table-bordered > thead > tr > th{

	border:1px solid black;

}

table.table-bordered > tbody > tr > td{

	border:1px solid black;

}



</style><body>

				<div>

					<table style="width: 100%;">

						<tr>	

							<td valign='middle' style="border: 2px solid #000;width: 20%;text-align: center;font-size: 8pt;">
								PENANGGULANGAN TB NASIONAL								
							</td>
							<td></td>
							<td align="right" style="border: 2px solid #000;width: 10%;text-align: center;font-size: 8pt; vertical-align: middle;">
								TB.02
							</td>

						</tr>

						<tr>
							<td></td>
							<td style="font-weight: bold; font-size: 14pt; text-align: center;">
								KARTU IDENTITAS PENDERITA
							</td>
							<td></td>
						</tr>

					</table>

					<br>

					<table style="width: 100%;">
						<tr>
							<td>Nama : {{$data_kartu_pengobatan->daftar_terduga->nama_lengkap}}</td>
						</tr>
						<tr>
							<td>Alamat : {{$data_kartu_pengobatan->daftar_terduga->alamat}} RT.{{$data_kartu_pengobatan->daftar_terduga->rt}} / RW.{{$data_kartu_pengobatan->daftar_terduga->rw}}</td>
						</tr>
						<tr>
							<td>
								Jenis Kelamin :
								<span style="display:inline; width: 2em"></span>
								L
								@if ($data_kartu_pengobatan->daftar_terduga->jenis_kelamin == 'pria')
								<input type="checkbox" style="margin-top: 5px;" checked />
								@else
								<input type="checkbox" style="margin-top: 5px;"/>
								@endif
								<span style="display:inline-block; width: 2em"></span>
								P 
								@if ($data_kartu_pengobatan->daftar_terduga->jenis_kelamin == 'wanita')
								<input type="checkbox" style="margin-top: 5px;" checked />
								@else
								<input type="checkbox" style="margin-top: 5px;"/>
								@endif
								<span style="display:inline-block; width: 5em"></span>
								Umur : {{$data_kartu_pengobatan->daftar_terduga->umur}} Tahun
							</td>
						</tr>
						<tr>
							<td>No. Reg. Kab. :  {{$data_kartu_pengobatan->no_reg_tb03_kab_kota}}</td>
						</tr>
						<tr>
							<td>Nama Unit Pengobatan : {{$data_kartu_pengobatan->daftar_terduga->nama_faskes->nama}}</td>
						</tr>
					</table>

					<br>

					<table style="width: 100%;">
						<tr>
							<td style="width: 50%">
								<table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:1px black solid; width: 80%" cellpadding="0" cellspacing="0">
									<tr>
										<td style="text-align: center;">KLASIFIKASI PENYAKIT</td>
									</tr>
									<tr>
										<td>
											<span style="display:inline-block; width: 1em"></span>
											Paru
											@if ($data_kartu_pengobatan->klasifikasi_penyakit == 'Paru')
											<input type="checkbox" style="margin-top: 5px;" checked />
											@else
											<input type="checkbox" style="margin-top: 5px;"/>
											@endif
											<span style="display:inline-block; width: 2em"></span>
											Extra Paru
											@if ($data_kartu_pengobatan->klasifikasi_penyakit == 'Ekstra Paru')
											<input type="checkbox" style="margin-top: 5px;" checked />
											@else
											<input type="checkbox" style="margin-top: 5px;"/>
											@endif
											<span style="display:inline-block; width: 5em"></span>
										</td>
									</tr>
									<tr>
										<td>
											<span style="display:inline-block; width: 1em"></span>
											Lokasi : {{$data_kartu_pengobatan->daftar_terduga->nama_faskes->nama}}
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
								</table>
							</td>
							<td style="width: 50%">
								Tanggal Mulai Berobat : <strong>{{$data_kartu_pengobatan->daftar_terduga->tanggal_mulai_pengobatan}}</strong>
							</td>
						</tr>
						
					</table>

					<br>

					<table style="width: 100%;">
						<tr>
							<td style="width: 50%">
								<table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:1px black solid; width: 80%" cellpadding="0" cellspacing="0">
									<tr>
										<td style="text-align: center;">Tipe Penderita</td>
									</tr>
									<tr>
										<td>
											<span style="display: block;">
												<span style="display:inline-block; width: 1em"></span>
												Baru
												@if ($data_kartu_pengobatan->tipe_pasien == 'Baru')
												<input type="checkbox" style="margin-top: 5px;" checked>
												@else
												<input type="checkbox" style="margin-top: 5px;"/>
												@endif
												<span style="display:inline-block; width: 2em"></span>
												Kambuh
												@if ($data_kartu_pengobatan->tipe_pasien == 'Kambuh')
												<input type="checkbox" style="margin-top: 5px;" checked>
												@else
												<input type="checkbox" style="margin-top: 5px;"/>
												@endif
											</span>
											<span style="display: block;">
												<span style="display:inline-block; width: 1em"></span>
												Pindahan
												@if ($data_kartu_pengobatan->tipe_pasien == 'Pindahan')
												<input type="checkbox" style="margin-top: 5px;" checked>
												@else
												<input type="checkbox" style="margin-top: 5px;"/>
												@endif
												<span style="display:inline-block; width: 2em"></span>
												Gagal
												@if ($data_kartu_pengobatan->tipe_pasien == 'Gagal')
												<input type="checkbox" style="margin-top: 5px;" checked>
												@else
												<input type="checkbox" style="margin-top: 5px;"/>
												@endif
											</span>
											<span style="display: block;">
												<span style="display:inline-block; width: 1em"></span>
												Defaulter
												@if ($data_kartu_pengobatan->tipe_pasien == 'Pengobatan setelah default')
												<input type="checkbox" style="margin-top: 5px;" checked>
												@else
												<input type="checkbox" style="margin-top: 5px;"/>
												@endif
												<span style="display:inline-block; width: 2em"></span>
												<span style="font-size: 14px">Lain - lain</span>
												@if ($data_kartu_pengobatan->tipe_pasien == 'Lain-lain')
												<input type="checkbox" style="margin-top: 5px;" checked>
												@else
												<input type="checkbox" style="margin-top: 5px;"/>
												@endif
											</span>
											<span style="display: block;">
												&nbsp;
											</span>
										</td>
									</tr>
								</table>
							</td>
							<td style="width: 50%">
								Rejimen Obat yang Diberikan : <strong>{{$data_kartu_pengobatan->tahap_intensif}}</strong>
							</td>
						</tr>
						
					</table>

					<br><hr>

					<table border="1" cellpadding="0" cellspacing="0" style="width: 100%">
						<tr style="text-align: center;">
							<td>No</td>
							<td>Tanggal</td>
							<td>Tahap Pengobatan</td>
							<td>Jumlah Obat yang Dibawa Pulang</td>
							<td>Tanggal Harus Kembali</td>
							<td>Status Kembali</td>
						</tr>
						@php
						$a=1;
						@endphp
						@foreach ($data_kartu_pengobatan->jadwal_perjanjian as $jadwal)
						<tr>
							<td style="text-align: center;">{{$a++}}</td>
							<td style="text-align: center;">{{$jadwal->tanggal}}</td>
							<td style="text-align: center;">{{$jadwal->tahap_pengobatan}}</td>
							<td style="text-align: center;">{{$jadwal->jumlah_obat}}</td>
							<td style="text-align: center;">{{$jadwal->tanggal_harus_kembali}}</td>
							<td style="text-align: center;">{{$jadwal->status_kembali}}</td>
						</tr>
						@endforeach

					</table>

				</div>

	</div></body></html>