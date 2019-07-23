<!DOCTYPE html>
<html lang="en"><head>
	<meta charset="UTF-8">
	<title>Register Laboratorium</title> 
	<!-- Optional tdeme -->
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
</style><div><br></div><body>
	<div class="col-md-12">
		<table style="width: 100%;">
			<tr valign='top'>
				<td valign='middle' style="border: 2px solid #000;width: 23%;text-align: center;font-size: 8pt;">
					PENANGGULANGAN TB NASIONAL								
				</td>
				<td></td>
				<td align="right" colspan="3" style="border: 2px solid #000;width: 10%;text-align: center;font-size: 8pt;">
					TB.04<br>
					Indoneisa/{{date('Y')}}
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
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td style="border: 2px solid #000;width: 10%;text-align: center;font-size: 8pt;">Nama Laboratorium Pemeriksaan : {{ $detail_user->nama_faskes['nama']}}<br>
					Kabupaten/Kota : {{ $detail_user->nama_faskes['kabupaten']}}<br>
					Propinsi : {{ $detail_user->nama_faskes['provinsi']}}<br>
					Tahun : {{date('Y')}}
				</td>
				<td>
					<div style="font-weight: bold; padding-bottom: 5px; font-size: 14pt;text-align: center;">
						REGISTER LABORATORIUM TB<br>
						UNTUK LABORATORIUM FASKES MIKROSKOPIS DAN TES CEPAT 
					</div>
				</td>
				<td align="right" style="border: 2px solid #000;width: 0.5%;text-align: center;font-size: 8pt;">
					TB.04<br>
				</td>
				<td align="right" style="border: 2px solid #000;width: 0.5%;text-align: center;font-size: 8pt;">
					TB.04<br>
				</td>
				<td align="right" style="border: 2px solid #000;width: 0.5%;text-align: center;font-size: 8pt;">
					TB.04<br>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td style="text-align: center;font-size: 8pt;" width="100">Bulan {{date('F')}} Tahun {{date('Y')}} </td>
			</tr>
		</table>
		<table style="width: 100%;"  cellpadding='0' cellspacing='0' class="table table-bordered">
				<tr>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">No Reg Lab</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">No Identitas Contoh Uji</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2" height="80">Tanggal Penerimaan Contoh Uji(NM/BB)</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">Nama Lengkap Pasien</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">NomorInduk Kependudukan (NIK)</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">Umur (Tahun)</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">Jenis Kelamin</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">Alamat</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">Nama Fasilitas Kesehatan Asal Contoh Uji</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">Alasan Pemeriksaan</td>	
					<td style="font-size: 8pt; text-align: center;" colspan="4">Asal Pemeriksaan Mikroskopis (BTA/Lainnya)</td>
					<td style="font-size: 8pt; text-align: center;" colspan="3">Hasil Test Cepat dengan Xpert</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">Tanda Tangan</td>
					<td style="font-size: 8pt; text-align: center;" rowspan="2">Keterangan</td>
				</tr>

				<tr>
					<td style="font-size: 8pt; text-align: center;">Tanggal Hasil</td>
					<td style="font-size: 8pt; text-align: center;">1</td>
					<td style="font-size: 8pt; text-align: center;">2</td>
					<td style="font-size: 8pt; text-align: center;">3</td>
					<td style="font-size: 8pt; text-align: center;">Tgl Pemeriksaan</td>
					<td style="font-size: 8pt; text-align: center;">Hasil Pemeriksaan</td>
					<td style="font-size: 8pt; text-align: center;">Tgl Hasil Dilaporkan</td>
				</tr>

				<tr>
					<td style="text-align: center; font-size: 8pt">1</td>
					<td style="text-align: center; font-size: 8pt">2</td>
					<td style="text-align: center; font-size: 8pt">3</td>
					<td style="text-align: center; font-size: 8pt">4</td>
					<td style="text-align: center; font-size: 8pt">5</td>
					<td style="text-align: center; font-size: 8pt">6</td>
					<td style="text-align: center; font-size: 8pt">7</td>
					<td style="text-align: center; font-size: 8pt">8</td>
					<td style="text-align: center; font-size: 8pt">9</td>
					<td style="text-align: center; font-size: 8pt">10</td>
					<td style="text-align: center; font-size: 8pt">11</td>
					<td style="text-align: center; font-size: 8pt">12</td>
					<td style="text-align: center; font-size: 8pt">13</td>
					<td style="text-align: center; font-size: 8pt">14</td>
					<td style="text-align: center; font-size: 8pt">15</td>
					<td style="text-align: center; font-size: 8pt">16</td>
					<td style="text-align: center; font-size: 8pt">17</td>
					<td style="text-align: center; font-size: 8pt">18</td>
					<td style="text-align: center; font-size: 8pt">19</td>
				</tr>
				@php $no = 1; @endphp
				@foreach ($datas as $data)
				<tr>
				<td style="text-align: center; font-size: 8pt">{{$no++}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->no_reg_lab}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->tanggal_pengiriman_sediaan}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->daftar_terduga->nama_lengkap}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->daftar_terduga->nik}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->daftar_terduga->umur}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->daftar_terduga->jenis_kelamin}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->daftar_terduga->alamat}}, RT.{{$data->daftar_terduga->rt}}, {{$data->daftar_terduga->rw}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->nama_faskes->nama}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->alasan_pemeriksaan}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->tanggal}}</td>
				<td style="text-align: center; font-size: 8pt">
					@if($data->sewaktu_satu == 'plus_tiga')
					+++
					@elseif($data->sewaktu_satu == 'plus_dua')
					++
					@elseif($data->sewaktu_satu == 'plus_satu')
					+
					@elseif($data->sewaktu_satu == 'satu_sembilan')
					1-9
					@elseif($data->sewaktu_satu == 'negatif')
					Neg
					@endif
				</td>
				<td class=" p">
					@if($data->sewaktu_pagi == 'plus_tiga')
					+++
					@elseif($data->sewaktu_pagi == 'plus_dua')
					++
					@elseif($data->sewaktu_pagi == 'plus_satu')
					+
					@elseif($data->sewaktu_pagi == 'satu_sembilan')
					1-9
					@elseif($data->sewaktu_pagi == 'negatif')
					Neg
					@endif
				</td>
				<td class=" s2">
					@if($data->sewaktu_dua == 'plus_tiga')
					+++
					@elseif($data->sewaktu_dua == 'plus_dua')
					++
					@elseif($data->sewaktu_dua == 'plus_satu')
					+
					@elseif($data->sewaktu_dua == 'satu_sembilan')
					1-9
					@elseif($data->sewaktu_dua == 'negatif')
					Neg
					@endif
				</td>
				<td style="text-align: center; font-size: 8pt">{{$data->daftar_terduga->tanggal_expert}}</td>
				<td style="text-align: center; font-size: 8pt">{{$data->daftar_terduga->hasil_expert}}</td>
				<td style="text-align: center; font-size: 8pt"></td>
				<td style="text-align: center; font-size: 8pt"></td>
				<td style="text-align: center; font-size: 8pt"></td>
				</tr>
				@endforeach
		</table>
		<br>
	</div>
</body></html>