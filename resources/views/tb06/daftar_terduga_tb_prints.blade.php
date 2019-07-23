<!DOCTYPE html>

<html lang="en"><head>

	<meta charset="UTF-8">

	<title>Daftar Terduga TB</title> 

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

			<tr valign='top'>

				<td valign='middle' style="border: 2px solid #000;width: 23%;text-align: center;font-size: 8pt;">

					PENANGGULANGAN TB NASIONAL								

				</td>

				<td></td>

				<td align="right" style="border: 2px solid #000;width: 10%;text-align: center;font-size: 8pt; vertical-align: middle;">

					TB.06

				</td>

			</tr>

			<tr>

				<td></td>
				<td></td>
				<td style="text-align: center;font-size: 8pt;" valign="top">Indonesia/{{date('Y')}}</td>

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

				<td style="border: 2px solid #000;width: 10%;text-align: center;font-size: 8pt;">Nama Fasilitas Kesehatan : {{$detail_user->nama_faskes['nama']}}<br>

					Kabupaten/Kota : {{$detail_user->nama_faskes['kabupaten']}}<br>

					Provinsi : {{$detail_user->nama_faskes['provinsi']}}

				</td>

				<td>

					<div style="font-weight: bold; padding-bottom: 5px; font-size: 18pt;text-align: center;">

						DAFTAR TERDUGA TB 

					</div>

				</td>

				<td></td>

			</tr>

			<tr>

				<td></td>

				<td></td>

				<td style="text-align: center;font-size: 8pt;" width="100">Bulan {{date('F')}} Tahun {{date('Y')}} </td>

			</tr>

		</table>

		<table style="width: 100%;"  cellpadding='0' cellspacing='0' class="table table-bordered">

				<tr>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">No</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">No Identitas Sediaan Dahak</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">BPJS</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Tanggal Didaftar</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">NIK</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Nama Lengkap</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Umur</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Jenis Kelamin</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Alamat</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Dirujuk Oleh</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Lokasi Anatomi Penyakit</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Total Skoring TB Anak</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Foto Toraks</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Status HIV</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Riwayat Diabetes Melitus</td>

					<td style="font-size: 6pt; text-align: center;" colspan="3">Tanggal pengambilan Contoh Uji</td>

					<td style="font-size: 6pt; text-align: center;" colspan="4">Mikroskopis</td>

					<td style="font-size: 6pt; text-align: center;" colspan="2">Xpert MTB/RIF</td>

					<td style="font-size: 6pt; text-align: center;" colspan="2">Baikan</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">No. Reg Lab (TB.04)</td>

					<td style="font-size: 6pt; text-align: center;" colspan="2">Tindakan Lanjut Pengobatan</td>

					<td style="font-size: 6pt; text-align: center;" rowspan="2">Keterangan</td>

				</tr>



				<tr>

					<td style="font-size: 6pt; text-align: center;">A</td>

					<td style="font-size: 6pt; text-align: center;">B</td>

					<td style="font-size: 6pt; text-align: center;">C</td>

					<td style="font-size: 6pt; text-align: center;">Tanggal Hasil Diperoleh</td>

					<td style="font-size: 6pt; text-align: center;">Hasil A</td>

					<td style="font-size: 6pt; text-align: center;">Hasil B</td>

					<td style="font-size: 6pt; text-align: center;">Hasil C</td>

					<td style="font-size: 6pt; text-align: center;">Tanggal Hasil Diperoleh</td>

					<td style="font-size: 6pt; text-align: center;">Hasil</td>

					<td style="font-size: 6pt; text-align: center;">Tanggal Hasil Diperoleh</td>

					<td style="font-size: 6pt; text-align: center;">Hasil</td>

					<td style="font-size: 6pt; text-align: center;">Tanggal Mulai Pengobatan TB</td>

					<td style="font-size: 6pt; text-align: center;">Dirujuk Ke</td>

				</tr>

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

				</tr>

				@php $no = 1; @endphp

				@foreach ($pasiens as $pasien)

				<tr>

				<td style="text-align: center; font-size: 6pt">{{$no++}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->no_identitas_sediaan_dahak}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->bpjs}}</td>

                <td style="text-align: center; font-size: 6pt">{{date('d F Y', strtotime($pasien->tanggal_didaftar))}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->nik}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->nama_lengkap}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->umur}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->jenis_kelamin}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->alamat}} RT:{{$pasien->rt}} RW:{{$pasien->rw}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->dirujuk_oleh}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->lokasi_anatomi_penyakit}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->total_skoring_tb_anak}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->foto_toraks}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->status_hiv}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->riwayat_diabetes_melitus}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_a}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_b}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_c}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_mikroskopis}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->hasil_a}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->hasil_b}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->hasil_c}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_expert}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->hasil_expert}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_biakan}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->hasil_biakan}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->no_reg_lab}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->tanggal_mulai_pengobatan}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->dirujuk_ke}}</td>

                <td style="text-align: center; font-size: 6pt">{{$pasien->keterangan}}</td>

				</tr>

				@endforeach

		</table>

		<br>

	</div>

</body></html>