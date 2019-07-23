@extends('layouts.app')
@section('content')

<div class="container-fluid" style="margin-top: -30px;">
	<h3 class="title">Register Laboratorium </h3>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-content">
					<form class="form-inline" method="GET" action="/tb06/search">
					  <div class="form-group">
					    <input type="text" class="form-control datepicker" id="start_date" name="start_date" placeholder="Start Date" required>
					  </div>
					  <div class="form-group">
					    <input type="text" class="form-control datepicker" id="end_date" name="end_date" placeholder="End Date" required>
					  </div>
					  <button type="submit" class="btn btn-default" name="action" value="filter">Filter</button>
			    	  <button type="submit" class="btn btn-info" name="action" value="Cetak">Cetak</button>
					</form>
					<div class="material-datatables">
						<table id="example1" class="table">
							<thead>
								<tr role="row">
									<th style="font-size: 14px; font-weight:bold;width: 5%;">No.</th>
									<th style="font-size: 14px; font-weight:bold;width: 81px;">No. Reg. Lab.</th>
									<th style="font-size: 14px; font-weight:bold;width: 132px;">No. Identitas Sediaan</th>
									<th style="font-size: 14px; font-weight:bold;width: 158px;">Tanggal Sediaan Diterima</th>
									<th style="font-size: 14px; font-weight:bold;width: 132px;">Tanggal Pemeriksaan</th>
									<th style="font-size: 14px; font-weight:bold;width: 92px;">Nama Lengkap</th>
									<th style="font-size: 14px; font-weight:bold;width: 35px;">Umur</th>
									<th style="font-size: 14px; font-weight:bold;width: 87px;">Jenis Kelamin</th>
									<th style="font-size: 14px; font-weight:bold;width: 132px;">Alamat</th>
									<th style="font-size: 14px; font-weight:bold;width: 78px;">Nama UPK</th>
									<th style="font-size: 14px; font-weight:bold;width: 125px;">Alasan Pemeriksaan</th>
									<th style="font-size: 14px; font-weight:bold;width: 8px;">S</th>
									<th style="font-size: 14px; font-weight:bold;width: 9px;">P</th>
									<th style="font-size: 14px; font-weight:bold;width: 8px;">S</th>
									<th style="font-size: 14px; font-weight:bold;width: 55px;">TTD</th>
									<th style="font-size: 14px; font-weight:bold;width: 90px;">Tindakan</th>
								</tr>
							</thead>
							<tbody>
								@php $no = 1; @endphp
								@foreach($permohonan_labs as $permohonan_lab)
								@if (!empty($permohonan_lab->daftar_terduga))
								<tr role="row" class="odd">
									<td style="font-size:12px;">{{$no++}}</td>
									<td style="font-size:12px;">{{$permohonan_lab->no_reg_lab}}</td>
									<td style="font-size:12px;">{{$permohonan_lab->daftar_terduga['no_identitas_sediaan_dahak']}}</td>
									<td style="font-size:12px;">{{$permohonan_lab->tanggal_pengiriman_sediaan}}</td>
									<td style="font-size:12px;">{{$permohonan_lab->tanggal}}</td>
									<td style="font-size:12px;">{{$permohonan_lab->daftar_terduga['nama_lengkap']}}</td>
									<td style="font-size:12px;">{{$permohonan_lab->daftar_terduga['umur']}}</td>
									<td style="font-size:12px;">{{$permohonan_lab->daftar_terduga['jenis_kelamin']}}</td>
									<td style="font-size:12px;">{{$permohonan_lab->daftar_terduga['alamat']}} RT.{{$permohonan_lab->daftar_terduga['rt']}} / RW.{{$permohonan_lab->daftar_terduga['rw']}} {{$permohonan_lab->daftar_terduga->kecamatan->nama}}{{$permohonan_lab->daftar_terduga['kabupaten']}} {{$permohonan_lab->daftar_terduga['kota']}}</td>
									<td style="font-size:12px;">
										{{$permohonan_lab->daftar_terduga->nama_faskes['nama']}}
									</td>
									<td style="font-size:12px;">{{$permohonan_lab->alasan_pemeriksaan}}</td>
									<td style="font-size:12px;">
										@if($permohonan_lab->sewaktu_satu == 'plus_tiga')
										+++
										@elseif($permohonan_lab->sewaktu_satu == 'plus_dua')
										++
										@elseif($permohonan_lab->sewaktu_satu == 'plus_satu')
										+
										@elseif($permohonan_lab->sewaktu_satu == 'satu_sembilan')
										1-9
										@elseif($permohonan_lab->sewaktu_satu == 'negatif')
										Neg
										@endif
									</td>
									<td style="font-size:12px;">
										@if($permohonan_lab->sewaktu_pagi == 'plus_tiga')
										+++
										@elseif($permohonan_lab->sewaktu_pagi == 'plus_dua')
										++
										@elseif($permohonan_lab->sewaktu_pagi == 'plus_satu')
										+
										@elseif($permohonan_lab->sewaktu_pagi == 'satu_sembilan')
										1-9
										@elseif($permohonan_lab->sewaktu_pagi == 'negatif')
										Neg
										@endif
									</td>
									<td style="font-size:12px;">
										@if($permohonan_lab->sewaktu_dua == 'plus_tiga')
										+++
										@elseif($permohonan_lab->sewaktu_dua == 'plus_dua')
										++
										@elseif($permohonan_lab->sewaktu_dua == 'plus_satu')
										+
										@elseif($permohonan_lab->sewaktu_dua == 'satu_sembilan')
										1-9
										@elseif($permohonan_lab->sewaktu_dua == 'negatif')
										Neg
										@endif
									</td>
									<td style="font-size:12px;">{{$permohonan_lab->nama_jelas_dokter_pengirim}}</td>
									<td style="font-size:12px;">
                                    	<a href="/tb04/prints/{{$permohonan_lab->id}}" target="_blank" class="btn btn-simple btn-primary btn-icon like"><i class="material-icons">print</i></a>
										<a href="/tb04/{{ $permohonan_lab->id }}/edit" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">edit</i></a>
                                    	<a class="btn btn-simple btn-danger btn-icon"><i class="material-icons delete-modal" data-id="{{$permohonan_lab->id}}">delete_outline</i></a>
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

@endsection
@section('javascript')

<script type="text/javascript">
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
	$(document).ready(function() {
		$('#example1').DataTable( {
			"scrollX": true
		} );
	});
	$(document).on('click', '.delete-modal', function() {
	    $('#id-delete').val($(this).data('id'));
	    $('.bs-example-modal-sm3').modal('show');
	  });
	$("#delete").click(function() {
	    $.ajax({
	      type: 'post',
	      url: '/tb04/delete',
	      data: {
	        '_token': $('input[name=_token]').val(),
	        'id' : $('input[name=id-delete]').val()
	      },
	      success: function(data) {
	      	// console.log(data);
	        $('.item' + data.id).remove();
	        swal({type: 'success',title: 'Data Berhasil Dihapus',showConfirmButton: false})
              location.href = "/tb04"
	      }
	    });
	  });
</script>
@endsection