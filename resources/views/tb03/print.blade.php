<!DOCTYPE html>

<html lang="en"><head>

	<meta charset="UTF-8">

	<title>Register TBC UPK</title> 

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
    tab1 { padding-left: 4em; }
    tab2 { padding-left: 8em; }
    tab3 { padding-left: 12em; }
    tab4 { padding-left: 16em; }
    tab5 { padding-left: 20em; }
    tab6 { padding-left: 24em; }
    tab7 { padding-left: 28em; }
    tab8 { padding-left: 32em; }
    tab9 { padding-left: 36em; }
    tab10 { padding-left: 40em; }
    tab11 { padding-left: 44em; }
    tab12 { padding-left: 48em; }
    tab13 { padding-left: 52em; }
    tab14 { padding-left: 56em; }
    tab15 { padding-left: 60em; }
    tab16 { padding-left: 64em; }

tr td.checked::before {
  content: '';
  position: absolute;
  border-color: #fff;
  border-style: solid;
  border-width: 0 2px 2px 0;
  top: 10px;
  left: 16px;
  transform: rotate(45deg);
  height: 15px;
  width: 7px;
}

</style><body>			
	<div class="col-md-12">
		<table style="width: 100%;">
			<tr valign='top'>
				<td valign='middle' colspan="3" style="border: 2px solid #000;width: 23%;text-align: center;font-size: 8pt;">
					PROGRAM PENGENDALIAN TBC NASIONAL								
				</td>
				<td colspan="6"></td>
				<td align="right" colspan="2" style="width: 13%;text-align: center;font-size: 7pt;">
					Lembar ASLI ditinggal di UPK
				</td>
			</tr>
			<tr>
				<td colspan="10"></td>
				<td align="right" style="border: 2px solid #000;text-align: center;font-size: 7pt;">
					TB-3 
				</td>
			</tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="6">
					<div style="font-weight: bold; padding-bottom: 5px; font-size: 18pt;">
						REGISTER TBC UNIT PELAYANAN KESEHATAN (UPK)
					</div>
				</td>
				<td></td>			
			</tr>
			<tr>
				<td colspan="3"></td>
				<td colspan="3">
					<div style="font-size: 8pt;">
						Nama UPK : {{$faskes->nama}}   <br>
						No. Kode UPK :  {{$faskes->kode}}<br>
						Kab. Kota :  {{$faskes->kabupaten}}<br>
						Provinsi : {{$faskes->provinsi}}
					</div>
				</td>
				<td colspan="3">
					<div style="font-size: 8pt;">
						@php
						$triwulan = intval(date('m')/3);
						@endphp
						Tahun : {{date('Y')}}  <br>
						Triwulan : {{$triwulan}} <br>
						Bulan :  {{date('F')}} <br>
						Jumlah Suspek : {{$count}}
					</div>
				</td>
				<td colspan="2"></td>
			</tr>
		</table>
		<table style="width: 100%;"  cellpadding='0' cellspacing='0' class="table table-bordered">
			<thead>
				<tr>
					<th style="font-size: 6pt; text-align: center;" rowspan="3">No</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="3">Nomor Reg. TB. Kab.</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="3">Tanggal Mulai Berobat</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="3">Nama Lengkap</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="3">Jenis Kelamin L/P</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="3">Umur</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="3">Alamat Lengkap</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="3">Rejimen yang Diberikan</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="3">Klasifikasi Penyakit Paru / Ekstra Paru (P/EP)</th>
					<th style="font-size: 6pt; text-align: center;" colspan="5" rowspan="2">Tipe Penderita</th>	
					<th style="font-size: 6pt; text-align: center;" colspan="10" rowspan="1">Pemeriksaan Dahak</th>
					<th style="font-size: 6pt; text-align: center;" colspan="6" rowspan="2">Tanggal Berhenti Berobat</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="3">Keterangan</th>
				</tr>

				<tr>
					<th style="font-size: 6pt; text-align: center;" rowspan="1" colspan="2">Sebelum Pengobatan</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1" colspan="2">Akhir Intensif</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1" colspan="2">Akhir Sisipan</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1" colspan="2">1 Bln Sebelum AP</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1" colspan="2">Akhir Pengobatan</th>					
				</tr>

				<tr>
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Baru <br> (B)</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Kambuh <br> (K)</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Pindahan <br> (P)</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Defauller <br> (D)</th>					
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Lain - lain <br> (L)</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Reg lab</th>					
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Hasil</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Reg lab</th>					
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Hasil</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Reg lab</th>					
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Hasil</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Reg lab</th>					
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Hasil</th>
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Reg lab</th>					
					<th style="font-size: 6pt; text-align: center;" rowspan="1">Hasil</th>			
					<th style="font-size: 6pt; text-align: center;" rowspan="1">1. Sembuh</th>			
					<th style="font-size: 6pt; text-align: center;" rowspan="1">2. Pengob. Lengkap</th>			
					<th style="font-size: 6pt; text-align: center;" rowspan="1">3. Meninggal</th>			
					<th style="font-size: 6pt; text-align: center;" rowspan="1">4. Gagal BT(Apos)</th>			
					<th style="font-size: 6pt; text-align: center;" rowspan="1">5. Defauller (BTA neg)</th>			
					<th style="font-size: 6pt; text-align: center;" rowspan="1">5. Pindah</th>			
				</tr>

				
			</thead>

			<tbody>

				<tr>
					<td style="text-align: center; font-size: 6pt">1</td>
					<td style="text-align: center; font-size: 6pt">2</td>
					<td style="text-align: center; font-size: 6pt">3</td>
					<td style="text-align: center; font-size: 6pt">4</td>
					<td style="text-align: center; font-size: 6pt">5</td>
					<td style="text-align: center; font-size: 6pt">6</td>
					<td style="text-align: center; font-size: 6pt">7</td>
					<td style="text-align: center; font-size: 6pt">8</td>
					<td style="text-align: center; font-size: 6pt">9</td>
					<td style="text-align: center; font-size: 6pt">10</td>
					<td style="text-align: center; font-size: 6pt">11</td>
					<td style="text-align: center; font-size: 6pt">12</td>
					<td style="text-align: center; font-size: 6pt">13</td>
					<td style="text-align: center; font-size: 6pt">14</td>
					<td style="text-align: center; font-size: 6pt">15</td>
					<td style="text-align: center; font-size: 6pt">16</td>
					<td style="text-align: center; font-size: 6pt">17</td>
					<td style="text-align: center; font-size: 6pt">18</td>
					<td style="text-align: center; font-size: 6pt">19</td>
					<td style="text-align: center; font-size: 6pt">20</td>
					<td style="text-align: center; font-size: 6pt">21</td>
					<td style="text-align: center; font-size: 6pt">22</td>
					<td style="text-align: center; font-size: 6pt">23</td>
					<td style="text-align: center; font-size: 6pt">24</td>
					<td style="text-align: center; font-size: 6pt">25</td>
					<td style="text-align: center; font-size: 6pt">26</td>
					<td style="text-align: center; font-size: 6pt">27</td>
					<td style="text-align: center; font-size: 6pt">28</td>
					<td style="text-align: center; font-size: 6pt">29</td>
					<td style="text-align: center; font-size: 6pt">30</td>
					<td style="text-align: center; font-size: 6pt">31</td>
				</tr>
				@php
				$a = 1;
				@endphp
				@foreach ($pasiens as $pasien)
				<tr>
					<td style="text-align: center; font-size: 6pt">{{$a++}}</td>
					<td style="text-align: center; font-size: 6pt">{{$pasien->no_reg_tb03_kab_kota}}</td>
					<td style="text-align: center; font-size: 6pt">{{$pasien->daftar_terduga->tanggal_mulai_pengobatan}}</td>
					<td style="text-align: center; font-size: 6pt">{{$pasien->daftar_terduga->nama_lengkap}}</td>
					<td style="text-align: center; font-size: 6pt">{{$pasien->daftar_terduga->jenis_kelamin}}</td>
					<td style="text-align: center; font-size: 6pt">{{$pasien->daftar_terduga->umur}}</td>
					<td style="text-align: center; font-size: 6pt">{{$pasien->daftar_terduga->alamat}}</td>
					<td style="text-align: center; font-size: 6pt">{{$pasien->tahap_intensif}}</td>
					<td style="text-align: center; font-size: 6pt">{{$pasien->klasifikasi_penyakit}}</td>
					@if ($pasien->tipe_pasien == 'Baru')
					<td align="center"><input type="checkbox" style="margin-top: 5px;margin-left:2px; font-size: 14px" checked></td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->tipe_pasien == 'Kambuh')
					<td align="center"><input type="checkbox" style="margin-top: 5px;margin-left:2px; font-size: 14px" checked></td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->tipe_pasien == 'Pindahan')
					<td align="center"><input type="checkbox" style="margin-top: 5px;margin-left:2px; font-size: 14px" checked></td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->tipe_pasien == 'Pengobatan setelah default')
					<td align="center"><input type="checkbox" style="margin-top: 5px;margin-left:2px; font-size: 14px" checked></td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->tipe_pasien == 'Lain-lain')
					<td align="center"><input type="checkbox" style="margin-top: 5px;margin-left:2px; font-size: 14px" checked></td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->permohonan_lab['pengobatan_ke'] == 0)
					<td style="text-align: center; font-size: 6pt">{{$pasien->permohonan_lab['no_reg_lab']}}</td>
					<td style="text-align: center; font-size: 6pt">
					@if($pasien->permohonan_lab['sewaktu_satu'] == 'plus_satu')
						$pasien->permohonan_lab['sewaktu_satu'] = '1+';
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'plus_dua')
						$pasien->permohonan_lab['sewaktu_satu'] = '2+';
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'plus_tiga')
						$pasien->permohonan_lab['sewaktu_satu'] = '3+';
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'satu_sembilan')
						$pasien->permohonan_lab['sewaktu_satu'] = '1-9';
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'negatif')
						$pasien->permohonan_lab['sewaktu_satu'] = 'negatif';
					@endif
					@if($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_satu')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '3+';@endphp
					@endif
					@if($pasien->permohonan_lab['sewaktu_dua'] == 'plus_satu')
					@php $pasien->permohonan_lab['sewaktu_dua'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '3+';@endphp
					@endif
					{{$pasien->permohonan_lab['sewaktu_satu']}} . {{$pasien->permohonan_lab['sewaktu_pagi']}} . {{$pasien->permohonan_lab['sewaktu_dua']}}.
					</td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->permohonan_lab['pengobatan_ke'] == 2 || $pasien->permohonan_lab['pengobatan_ke'] == 3)
					<td style="text-align: center; font-size: 6pt">{{$pasien->permohonan_lab['no_reg_lab']}}</td>
					<td style="text-align: center; font-size: 6pt">
					@if($pasien->permohonan_lab['sewaktu_satu'] == 'plus_satu')
						@php$pasien->permohonan_lab['sewaktu_satu'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_satu'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_satu'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_satu'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_satu'] = 'negatif';@endphp
					@endif
					@if($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_satu')
					@php $pasien->permohonan_lab['sewaktu_pagi'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '3+';@endphp
					@endif
					@if($pasien->permohonan_lab['sewaktu_dua'] == 'plus_satu')
					@php $pasien->permohonan_lab['sewaktu_dua'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '3+';@endphp
					@endif					
					{{$pasien->permohonan_lab['sewaktu_satu']}} . {{$pasien->permohonan_lab['sewaktu_pagi']}} . {{$pasien->permohonan_lab['sewaktu_dua']}}.
					</td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					<td style="text-align: center; font-size: 6pt"></td>
					<td style="text-align: center; font-size: 6pt"></td>
					@if ($pasien->permohonan_lab['pengobatan_ke'] == 5 || $pasien->permohonan_lab['pengobatan_ke'] == 7)
					<td style="text-align: center; font-size: 6pt">{{$pasien->permohonan_lab['no_reg_lab']}}</td>
					<td style="text-align: center; font-size: 6pt">
					@if($pasien->permohonan_lab['sewaktu_satu'] == 'plus_satu')
						@php$pasien->permohonan_lab['sewaktu_satu'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_satu'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_satu'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_satu'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_satu'] = 'negatif';@endphp
					@endif
					@if($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_satu')
					@php $pasien->permohonan_lab['sewaktu_pagi'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '3+';@endphp
					@endif
					@if($pasien->permohonan_lab['sewaktu_dua'] == 'plus_satu')
					@php $pasien->permohonan_lab['sewaktu_dua'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '3+';@endphp
					@endif					
					{{$pasien->permohonan_lab['sewaktu_satu']}} . {{$pasien->permohonan_lab['sewaktu_pagi']}} . {{$pasien->permohonan_lab['sewaktu_dua']}}.
					</td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->permohonan_lab['pengobatan_ke'] == 6 || $pasien->permohonan_lab['pengobatan_ke'] == 8)
					<td style="text-align: center; font-size: 6pt">{{$pasien->permohonan_lab['no_reg_lab']}}</td>
					<td style="text-align: center; font-size: 6pt">
					@if($pasien->permohonan_lab['sewaktu_satu'] == 'plus_satu')
						@php$pasien->permohonan_lab['sewaktu_satu'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_satu'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_satu'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_satu'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_satu'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_satu'] = 'negatif';@endphp
					@endif
					@if($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_satu')
					@php $pasien->permohonan_lab['sewaktu_pagi'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_pagi'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_pagi'] = '3+';@endphp
					@endif
					@if($pasien->permohonan_lab['sewaktu_dua'] == 'plus_satu')
					@php $pasien->permohonan_lab['sewaktu_dua'] = '1+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'plus_dua')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '2+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'plus_tiga')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '3+';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'satu_sembilan')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '1-9';@endphp
					@elseif ($pasien->permohonan_lab['sewaktu_dua'] == 'negatif')
						@php $pasien->permohonan_lab['sewaktu_dua'] = '3+';@endphp
					@endif					
					{{$pasien->permohonan_lab['sewaktu_satu']}} . {{$pasien->permohonan_lab['sewaktu_pagi']}} . {{$pasien->permohonan_lab['sewaktu_dua']}}.
					</td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					<td style="text-align: center; font-size: 6pt"></td>
					@endif					
					@if ($pasien->hasil_akhir_pengobatan == 'Sembuh')
					<td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_hasil}}</td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->hasil_akhir_pengobatan == 'Pengobatan Lengkap')
					<td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_hasil}}</td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif			
					@if ($pasien->hasil_akhir_pengobatan == 'Meninggal')
					<td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_hasil}}</td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->hasil_akhir_pengobatan == 'Gagal')
					<td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_hasil}}</td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->hasil_akhir_pengobatan == 'Default')
					<td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_hasil}}</td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					@if ($pasien->hasil_akhir_pengobatan == 'Pindah')
					<td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_hasil}}</td>
					@else
					<td style="text-align: center; font-size: 6pt"></td>
					@endif
					<td></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<br>

		<table style="width: 100%">
			<tr>
				<td colspan="3"></td>
				<td style="font-size: 12px">
					Pembuat Data Laporan
				</td>
				<td colspan="6"></td>
				<td align="right" style="font-size: 12px">
					Penerima Data Laporan
				</td>
				<td colspan="2"></td>
			</tr>

			<tr>
				<td colspan="10"></td>
				<td align="right" style="font-size: 12px">
					Tgl..............................<tab1>
				</td>
				<td colspan="2"></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td colspan="10"></td>
				<td align="right" style="font-size: 12px">
					ttd<tab1>
				</td>
				<td colspan="2"></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"></td>
				<td style="font-size: 12px">
					&nbsp;(<tab2>)
				</td>
				<td colspan="6"></td>
				<td align="right" style="font-size: 12px">
					Wasor.................... <tab1>
				</td>
				<td colspan="2">&nbsp;</td>
			</tr>

		</table>
		<br>
		<table>
			<tr>
				<td align="left" style="font-size: 12px">
					JB/FORM/TB/003/00-2010
				</td>
			</tr>
		</table>
	</div>
</body></html>