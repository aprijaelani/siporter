<!DOCTYPE html>
<html lang="en"><head>
	<meta charset="UTF-8">
	<title>Register Laboratorium</title> 
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
		<br>
	</div>
	<div class="col-md-12">
		<table style="width: 100%;">
			<tr valign='top'>
				<td valign='middle' style="border: 1px solid #000;width: 23%;text-align: center;font-size: 8pt;">
					PENGENDALIAN TB NASIONAL								
				</td>
				<td style="border-top: 0px;"></td>
				<td align="right" style="border: 1px solid #000;width: 10%;text-align: center;font-size: 8pt;">
					TB.05
				</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td colspan="3">
					<div style="font-weight: bold; font-size: 12pt;text-align: center; border: none;">
						FORMULIR PERMOHONAN LABORATORIUM TB UNTUK PEMERIKSAAN DAHAK
					</div>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td style="font-size: 10pt;">Nama Faskes</td>
				<td style="font-size: 10pt;">:</td>
				<td style="font-size: 10pt;">{{$datas->nama_faskes->nama}}</td>
				<td width="10"></td>
				<td style="font-size: 10pt;">No. Telp</td>
				<td style="font-size: 10pt;">:</td>
				<td style="font-size: 10pt;">{{$datas->telepon}}</td>
			</tr>
			<tr>
				<td style="font-size: 10pt;">Nama TIM Ahli Klinis (TAK)</td>
				<td style="font-size: 10pt;">:</td>
				<td style="font-size: 10pt;">{{$datas->dokter->nama_dokter}}</td>
				<td width="10"></td>
				<td style="font-size: 10pt;">Jenis Terduga/ Pasien TB</td>
				<td style="font-size: 10pt;">:</td>
				<td style="font-size: 10pt;">{{$datas->jenis_terduga}}</td>
			</tr>
			<tr>
				<td style="font-size: 10pt;">Nama Terduga TB / Pasien</td>
				<td style="font-size: 10pt;">:</td>
				<td style="font-size: 10pt;">{{$datas->daftar_terduga->nama_lengkap}}</td>
				<td style="font-size: 10pt;"></td>
				<td style="font-size: 10pt;">Kabupaten / Kota</td>
				<td style="font-size: 10pt;">:</td>
				<td style="font-size: 10pt;">{{$datas->daftar_terduga->nama_faskes->kabupaten}}</td>
			</tr>
			<tr>
				<td style="font-size: 10pt;">Jenis Kelamin</td>
				<td style="font-size: 10pt;">:</td>
				<td style="font-size: 10pt;">{{$datas->daftar_terduga->jenis_kelamin}}</td>
				<td style="font-size: 10pt;"></td>
				<td style="font-size: 10pt;">Provinsi</td>
				<td style="font-size: 10pt;">:</td>
				<td style="font-size: 10pt;">{{$datas->daftar_terduga->nama_faskes->provinsi}}</td>
			</tr>
			<tr>
				<td style="font-size: 10pt;">Nomor Identitas Kependudukan (NIK)</td>
				<td style="font-size: 10pt;">:</td>
				<td style="font-size: 10pt;">{{$datas->daftar_terduga->nik}}</td>
				<td style="font-size: 10pt;"></td>
				<td style="font-size: 10pt;">Alamat Lengkap</td>
				<td style="font-size: 10pt;">:</td>
				<td style="font-size: 10pt;">{{$datas->daftar_terduga->alamat}}, RT.{{$datas->daftar_terduga->rt}}, {{$datas->daftar_terduga->rw}}</td>
			</tr>
		</table>
			<div>
				<table style="width: 100%; border-top: 2px solid #000;border-left: 2px solid #000;border-right: 2px solid #000;border-bottom: 2px solid #000; margin-top: 10px;">
					<tr>
						<td style="font-size: 10pt;"><strong>No Identitas Sediaan</strong>(Sesuai no. Reg Suspek di TB.06/TB.06 MDR)</td>
						<td style="font-size: 10pt;">:{{$datas->daftar_terduga->no_identitas_sediaan_dahak}}</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">Tanggal Pengambilan Dahak Terakhir</td>
						<td style="font-size: 10pt;">:&nbsp;&nbsp;{{$datas->tanggal_pengambilan_dahak_terakhir}}</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">Tanggal Pengiriman Sediaan</td>
						<td style="font-size: 10pt;">:&nbsp;&nbsp;{{$datas->tanggal_pengiriman_sediaan}}</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">Tanda Tangan Pengambil Sediaan</td>
						<td style="font-size: 10pt;">:&nbsp;&nbsp;</td>
					</tr>
				</table>
				<table style="float: left;width: 40%;margin-top: 10px; border-top: 2px solid #000;border-left: 2px solid #000;border-right: 2px solid #000;border-bottom: 2px solid #000;">
					<tr>
						<td style="font-size: 10pt;"><strong>Jenis & Jumlah Pemeriksaan</strong></td>
						<td style="font-size: 10pt;">:&nbsp;&nbsp;{{$datas->jenis_dan_jumlah_pemeriksaan}}</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;"><strong>Klasifikasi Penyakit</strong></td>
						<td style="font-size: 10pt;">:&nbsp;&nbsp;{{$datas->klasifikasi_penyakit}}</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;"><strong>Lokasi</strong></td>
						<td style="font-size: 10pt;">:&nbsp;&nbsp;{{$datas->lokasi}}</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;"><strong>Status HIV</strong></td>
						<td style="font-size: 10pt;">:&nbsp;&nbsp;{{$datas->status_hiv}}</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;"><strong>Tipe Spesimen</strong></td>
						<td style="font-size: 10pt;">:&nbsp;&nbsp;{{$datas->tipe_spesimen}}</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">Nama Jelas Dokter Pengirim</td>
						<td style="font-size: 10pt;">: &nbsp;&nbsp;&nbsp; {{$datas->nama_jelas_dokter_pengirim}}</td>
					</tr>
				</table>
				<table style="margin-top:10px;float: left;width: 60%; height: 110px; margin-left:10px;border-top: 2px solid #000;border-left: 2px solid #000;border-right: 2px solid #000;border-bottom: 2px solid #000;">
					<tr>
						<td style="width: 230px;font-size: 10pt;"><strong>Alasan Pemeriksaan</strong></td>
						<td style="width: 130px;font-size: 10pt;">: &nbsp;&nbsp;&nbsp;{{($datas->alasan_pemeriksaan)}}</td>
						<td style="font-size: 10pt;"></td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">Pemeriksaan Ulang Pengobatan</td>
						<td style="font-size: 10pt;">: &nbsp;&nbsp;&nbsp; Bulan Ke : {{$datas->pemeriksaan_ulang_pengobatan}}</td>
						<td style="font-size: 10pt;"></td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">Pemeriksaan Ulang Pasca Pengobatan</td>
						<td style="font-size: 10pt;">: &nbsp;&nbsp;&nbsp; Bulan Ke : {{$datas->pemeriksaan_ulang_pasca_pengobatan}}</td>
						<td style="font-size: 10pt;"></td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">No. Reg. TB/TB MDR Faskes</td>
						<td style="font-size: 10pt;">: &nbsp;&nbsp;&nbsp; {{$datas->no_Reg_tb_or_tb_MDR_Faskes}}</td>
						<td style="font-size: 10pt;"></td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">No. Reg. TB/TB MDR Kab / Kota</td>
						<td style="font-size: 10pt;">: &nbsp;&nbsp;&nbsp; {{$datas->no_reg_tb_or_tb_mdr_kab_kota}}</td>
						<td style="font-size: 10pt;"></td>
					</tr>
				</table>
				<table style="width: 100%;margin-top:150px;border-top: 2px solid #000;border-left: 2px solid #000;border-right: 2px solid #000;border-bottom: 2px solid #000;">
					<tr>
						<td style="text-align: center;font-size: 10pt;border-bottom: 2px;" colspan="3"><strong>Secara Visual Dahak Tampak</strong></td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">Nanah Lendir</td>
						<td colspan="2">:&nbsp;&nbsp;&nbsp;
							@if ($datas->nanah_lendir_1 == 'on')
							<input style="margin-top: 6px;" type="checkbox" name="checkboxG4" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">S</label>
							@if ($datas->nanah_lendir_2 == 'on')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG5" id="checkboxG5" checked="checked"/>
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG5" id="checkboxG5"/>
							@endif
							<label style="font-size: 10pt;" for="checkboxG5">P</label>
							@if ($datas->nanah_lendir_3 == 'on')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG6" id="checkboxG6" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG6" id="checkboxG6" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG6">S</label>
						</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">Bercak Darah</td>
						<td colspan="2">:&nbsp;&nbsp;&nbsp;
							@if ($datas->bercak_darah_1 == 'on')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">S</label>
							@if ($datas->bercak_darah_2 == 'on')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG5" id="checkboxG5" checked="checked"/>
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG5" id="checkboxG5"/>
							@endif
							<label style="font-size: 10pt;" for="checkboxG5">P</label>
							@if ($datas->bercak_darah_3 == 'on')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG6" id="checkboxG6" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG6" id="checkboxG6" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG6">S</label>
						</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">Air Liur</td>
						<td colspan="2">:&nbsp;&nbsp;&nbsp;
							@if ($datas->air_liur_1 == 'on')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">S</label>
							@if ($datas->air_liur_2 == 'on')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG5" id="checkboxG5" checked="checked"/>
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG5" id="checkboxG5"/>
							@endif
							<label style="font-size: 10pt;" for="checkboxG5">P</label>
							@if ($datas->air_liur_3 == 'on')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG6" id="checkboxG6" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG6" id="checkboxG6" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG6">S</label>
						</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;">Tanggal</td>
						<td style="font-size: 10pt;">: &nbsp;&nbsp;&nbsp; {{$datas->tanggal}}</td>
						<td style="font-size: 10pt;"></td>
					</tr>
				</table>
			</div>
				<table style="width: 100%; margin-top: 10px;">
					<tr>	
						<td style="text-align: center;font-size: 14pt;" colspan="11">HASIL PEMERIKSAAN LABORATORIUM</td>
					</tr>
				</table>
				<table style="width: 100%;margin-top:10px;border: 2px solid #000;border-collapse: collapse;">
					<tr >
						<td style="font-size: 10pt;width: 20%;border: 2px; solid #000;padding: 8px 10px;">Spesimen Dahak *)</td>
						<td style="font-size: 10pt;width: 100px;">Tanggal Hasil</td>
						<td style="font-size: 10pt; text-align: center;"colspan="5">Hasil BTA **)</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;width: 20%;border-right: solid #E0E0E0;border-width: 1px 0;padding: 8px 10px;">Sewaktu</td>
						<td style="font-size: 10pt;">{{$datas->tanggal_hasil_sewaktu_1}}</td>
						<td>
							@if ($datas->sewaktu_satu == 'plus_tiga')
							<input type="checkbox" style="margin-top: 6px;" name="plus_3_sewaktu_1" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">+++</label>
						</td>
						<td>
							@if ($datas->sewaktu_satu == 'plus_dua')
							<input type="checkbox" style="margin-top: 6px;" name="plus_3_sewaktu_2" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">++</label>
						</td>
						<td>
							@if ($datas->sewaktu_satu == 'plus_satu')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">+</label>
						<td>
							@if ($datas->sewaktu_satu == 'satu_sembilan')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">1-9</label>
						</td>
						<td>
							@if ($datas->sewaktu_satu == 'negatif')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">Neg</label>
						</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;width: 20%;border-right: solid #E0E0E0;border-width: 1px 0;padding: 8px 10px;">Pagi</td>
						<td style="font-size: 10pt;">{{$datas->tanggal_hasil_sewaktu_2}}</td>
												<td>
							@if ($datas->sewaktu_pagi == 'plus_tiga')
							<input type="checkbox" style="margin-top: 6px;" name="plus_3_sewaktu_2" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">+++</label>
						</td>
						<td>
							@if ($datas->sewaktu_pagi == 'plus_dua')
							<input type="checkbox" style="margin-top: 6px;" name="plus_3_sewaktu_2" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">++</label>
						</td>
						<td>
							@if ($datas->sewaktu_pagi == 'plus_satu')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">+</label>
						<td>
							@if ($datas->sewaktu_pagi == 'satu_sembilan')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked"/>
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">1-9</label>
						</td>
						<td>
							@if ($datas->sewaktu_pagi == 'negatif')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked"/>
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">Neg</label>
						</td>
					</tr>
					<tr>
						<td style="font-size: 10pt;width: 20%;border-right: solid #E0E0E0;border-width: 1px 0;padding: 8px 10px;">Sewaktu</td>
						<td style="font-size: 10pt;">{{$datas->tanggal_hasil_sewaktu_3}}</td>
						<td>
							@if ($datas->sewaktu_dua == 'plus_tiga')
							<input type="checkbox" style="margin-top: 6px;" name="plus_3_sewaktu_3" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">+++</label>
						</td>
						<td>
							@if ($datas->sewaktu_dua == 'plus_dua')
							<input type="checkbox" style="margin-top: 6px;" name="plus_3_sewaktu_2" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">++</label>
						</td>
						<td>
							@if ($datas->sewaktu_dua == 'plus_satu')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked" />
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">+</label>
						<td>
							@if ($datas->sewaktu_dua == 'satu_sembilan')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked"/>
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">1-9</label>
						</td>
						<td>
							@if ($datas->sewaktu_dua == 'negatif')
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" checked="checked"/>
							@else
							<input type="checkbox" style="margin-top: 6px;" name="checkboxG4" id="checkboxG4" />
							@endif
							<label style="font-size: 10pt;" for="checkboxG4">Neg</label>
						</td>
					</tr>
				</table>
				<div>
					<table style="width: 100%; margin-top: 20px;">
						<tr>	
							<td style="text-align: center;font-size: 10pt;">Tanda Tangan Pemeriksa<br><br><br><br><br><br>(.................)</td>
							<td style="text-align: center;font-size: 10pt;">Mengetahui<br>Dokter PJ Pemeriksaan Lab <br><br><br><br><br><br>(.................)</td>
						</tr>
					</table>
				</div>
	</div></body></html>