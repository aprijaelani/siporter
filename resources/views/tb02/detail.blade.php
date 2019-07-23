@extends('layouts.app')
@section('content')

<section class="content-header">
	<h1>
		TB02<small>Kartu Identitas Penderita - Puskesmas Kecamatan Johar Baru</small>					
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Formulir</a></li>
		<li class="active">TB02</li>
	</ol>
</section>

<section class="content"><!-- Main content -->
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Detail</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" readonly value="{{$kartu_pengobatans->daftar_terduga->nama_lengkap}}">
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>Alamat Lengkap</label>
						<textarea class="form-control" readonly>{{$kartu_pengobatans->daftar_terduga->alamat}},RT.{{$kartu_pengobatans->daftar_terduga->rt}}/RW.{{$kartu_pengobatans->daftar_terduga->rw}}
						</textarea>
					</div>
					<!-- /.form-group -->
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<input type="text" class="form-control" readonly value="{{$kartu_pengobatans->daftar_terduga->jenis_kelamin}}">
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>Umur</label>
						<input type="text" class="form-control" readonly value="{{$kartu_pengobatans->daftar_terduga->umur}}">
					</div>
					<!-- /.form-group -->
				</div>
				<!-- /.col -->
				<div class="col-md-3">
					<div class="form-group">
						<label>No Reg Kab</label>
						<input type="text" class="form-control" readonly value="{{$kartu_pengobatans->no_reg_tb03_kab_kota}}">
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>Nama Unit Pengobatan</label>
						<input type="text" class="form-control" readonly value="{{$kartu_pengobatans->daftar_terduga->nama_faskes->nama}}">
					</div>
					<!-- /.form-group -->
				</div>
				<!-- /.col -->
				<div class="col-md-3">
					<!-- /.form-group -->
					<div class="form-group">
						<label>Klasifikasi Penyakit</label>
						<input type="text" class="form-control" readonly value="{{$kartu_pengobatans->klasifikasi_penyakit}}">
					</div>
					<div class="form-group">
						<label>Tanggal Mulai Berobat</label>
						<input type="text" class="form-control" readonly value="{{$kartu_pengobatans->daftar_terduga->tanggal_mulai_pengobatan}}">
					</div>

					<!-- /.form-group -->
				</div>
				<!-- /.col -->
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Tipe Penderita</label>
						<input type="text" class="form-control" readonly value="{{$kartu_pengobatans->riwayat_pengobatan_sebelumnya}}">
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>Rejimen Obat Yang Diberikan</label>
						<input type="text" class="form-control" readonly value="{{$kartu_pengobatans->tahap_intensif}}">
					</div>
					<!-- /.form-group -->
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Lokasi</label>
						<input type="text" class="form-control" readonly value="{{$kartu_pengobatans->lokasi}}">
					</div>
					<!-- /.form-group -->
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>

	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Jadwal Perjanjian</h3>
			<div class="pull-right">
				<a class="btn btn-success" data-toggle="modal" data-target="#btnMedicine">Tambah Jadwal</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr role="row">
						<th class="sorting_disabled edit" rowspan="1" colspan="1" style="width: 41px;">No.</th>
						<th class="sorting_disabled tanggal_show" rowspan="1" colspan="1" style="width: 100px;">Tanggal</th>
						<th class="sorting_disabled tahap_pengobatan" rowspan="1" colspan="1" style="width: 100px;">Tahap Pengobatan</th>
						<th class="sorting_disabled jumlah_obat" rowspan="1" colspan="1" style="width: 100px;">Jumlah Obat</th>
						<th class="sorting_disabled tanggal_harus_kembali_show" rowspan="1" colspan="1" style="width: 100px;">Tanggal Harus Kembali</th>
						<th class="sorting_disabled status_kembali_show" rowspan="1" colspan="1" style="width: 100px;">Status Kembali</th>
						<th class="sorting_disabled status_kembali_show" rowspan="1" colspan="1" style="width: 100px;">Action</th>
					</tr>
				</thead>		
				<tbody>
					@php $i = 1; @endphp
					@foreach ($kartu_pengobatans->jadwal_perjanjian as $jadwal_perjanjian)
					<tr class="dateClosed odd" role="row">
						<td class=" edit">{{$i++}}</td>
						<td class=" jumlah_obat">{{$jadwal_perjanjian->tanggal}}</td>
						<td class=" tanggal_harus_kembali_show">{{$jadwal_perjanjian->tahap_pengobatan}}</td>
						<td class=" status_kembali_show">{{$jadwal_perjanjian->jumlah_obat}}</td>
						<td class=" status_kembali_show">{{$jadwal_perjanjian->tanggal_harus_kembali}}</td>
						<td class=" status_kembali_show">{{$jadwal_perjanjian->status_kembali}}</td>
						<td><i class="fa fa-edit" onclick="Edit_Button_Jadwal_Perjanjian(event, {{$jadwal_perjanjian->id}})" style="cursor: pointer; font-size: 18px"></i> &nbsp; <i class="delete-modal fa fa-trash-o" data-id="{{$jadwal_perjanjian->id}}" style="cursor: pointer; font-size: 18px"></i></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.row -->
	</div>
	<!--endregion-->
	<div class="modal modal-primary fade create-modal-jadwal" id="btnMedicine">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</a>
					<h4 class="modal-title">Buat Perjanjian</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" onsubmit="">
						{{ csrf_field() }}
						<input type="hidden" id="kartu_pengobatan_id" name="kartu_pengobatan_id" value="{{$kartu_pengobatans->id}}">
						<div class="form-group" id="grpUmur">
							<label for="umur" class="col-sm-3 control-label" style="text-align: left;">Tanggal</label>
							<div class="control col-sm-8">
								<input type="text" class="form-control datepicker" name="tanggal" id="tanggal" placeholder="Tanggal">
								<span class="help-inline text-red" id="lblUmur"></span>
							</div>
						</div><!-- Umur -->
						<div class="form-group" id="grpNIK">
							<label for="nik" class="col-sm-3 control-label" style="text-align: left;">Tahap Pengobatan</label>
							<div class="control col-sm-8">
								<input type="text" class="form-control" name="tahap_pengobatan" id="tahap_pengobatan" value="" maxlength="16" placeholder="Tahap Pengobatan">
								<span class="help-inline text-red" id="lblNIK"></span>
							</div>
						</div><!-- BPJS -->
						<div class="form-group" id="grpNamaLengkap">
							<label for="nama_lengkap" class="col-sm-3 control-label" style="text-align: left;">Jumlah Obat</label>
							<div class="control col-sm-8">
								<input type="number" class="form-control" name="jumlah_obat" id="jumlah_obat" value="" min="0" placeholder="Jumlah Obat">
								<span class="help-inline text-red" id="lblNamaLengkap"></span>
							</div>
						</div><!-- Nama Lengkap -->
						<div class="form-group" id="grpUmur">
							<label for="umur" class="col-sm-3 control-label" style="text-align: left;">Tanggal Harus Kembali</label>
							<div class="control col-sm-8">
								<input type="text" class="form-control datepicker" name="tanggal_harus_kembali" id="tanggal_harus_kembali" value="" maxlength="22" placeholder="Tanggal Harus Kembali">
								<span class="help-inline text-red" id="lblUmur"></span>
							</div>
						</div><!-- Umur -->
						<div class="form-group" id="grpUmur">
							<label for="umur" class="col-sm-3 control-label" style="text-align: left;">Status Kembali</label>
							<div class="control col-sm-8">
								<input type="text" class="form-control" name="status_kembali" id="status_kembali" value="" maxlength="22" placeholder="Status Kembali">
								<span class="help-inline text-red" id="lblUmur"></span>
							</div>
						</div><!-- Umur -->
					</form>
				</div>
				<div class="modal-footer">
					<a class="btn btn-outline pull-left" data-dismiss="modal">Batal</a>
					<a class="btn btn-outline" id="btnSimpan">Simpan</a>
				</div>
			</div>
		</div>
	</div>

	<!--endregion-->
	<div class="modal modal-primary fade create-modal-jadwal-edit" id="btnNewMedicine">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</a>
					<h4 class="modal-title">Buat Perjanjian</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" onsubmit="">
						{{ csrf_field() }}
						<input type="hidden" class="form-control datepicker" name="id_edit" id="id_edit">
						<div class="form-group" id="grpUmur">
							<label for="umur" class="col-sm-3 control-label" style="text-align: left;">Tanggal</label>
							<div class="control col-sm-8">
								<input type="text" class="form-control datepicker" name="tanggal_edit" id="tanggal_edit" placeholder="Tanggal">
								<span class="help-inline text-red" id="lblUmur"></span>
							</div>
						</div><!-- Umur -->
						<div class="form-group" id="grpNIK">
							<label for="nik" class="col-sm-3 control-label" style="text-align: left;">Tahap Pengobatan</label>
							<div class="control col-sm-8">
								<input type="text" class="form-control" name="tahap_pengobatan_edit" id="tahap_pengobatan_edit" value="" maxlength="16" placeholder="Tahap Pengobatan">
								<span class="help-inline text-red" id="lblNIK"></span>
							</div>
						</div><!-- BPJS -->
						<div class="form-group" id="grpNamaLengkap">
							<label for="nama_lengkap" class="col-sm-3 control-label" style="text-align: left;">Jumlah Obat</label>
							<div class="control col-sm-8">
								<input type="number" class="form-control" name="jumlah_obat_edit" id="jumlah_obat_edit" value="" min="0" placeholder="Jumlah Obat">
								<span class="help-inline text-red" id="lblNamaLengkap"></span>
							</div>
						</div><!-- Nama Lengkap -->
						<div class="form-group" id="grpUmur">
							<label for="umur" class="col-sm-3 control-label" style="text-align: left;">Tanggal Harus Kembali</label>
							<div class="control col-sm-8">
								<input type="text" class="form-control datepicker" name="tanggal_harus_kembali_edit" id="tanggal_harus_kembali_edit" value="" maxlength="22" placeholder="Tanggal Harus Kembali">
								<span class="help-inline text-red" id="lblUmur"></span>
							</div>
						</div><!-- Umur -->
						<div class="form-group" id="grpUmur">
							<label for="umur" class="col-sm-3 control-label" style="text-align: left;">Status Kembali</label>
							<div class="control col-sm-8">
								<input type="text" class="form-control" name="status_kembali_edit" id="status_kembali_edit" value="" maxlength="22" placeholder="Status Kembali">
								<span class="help-inline text-red" id="lblUmur"></span>
							</div>
						</div><!-- Umur -->
					</form>
				</div>
				<div class="modal-footer">
					<a class="btn btn-outline pull-left" data-dismiss="modal">Batal</a>
					<a class="btn btn-outline" id="btnUpdateJadwal">Simpan</a>
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
                <p style="margin-left: 10px;">Yakin Ingin Menghapus Data? </p>
              </div>
              <div class="form-group" align="right" style="margin-right: 15px;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="delete" class="btn btn-danger" data-dismiss="modal">Delete</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      	<script type="text/javascript">
    	  $(document).on('click', '.delete-modal', function() {
		    $('#id-delete').val($(this).data('id'));
		    $('.bs-example-modal-sm3').modal('show');
		  });
    	</script>
	<!--region Data Pasien -->
	<script type="text/javascript">
		var kartu_pengobatan_id = $('#kartu_pengobatan_id').val();
		$("#btnSimpan").click(function() {
			$('#btnMedicine').modal('toggle');
			$.ajax({
				type: 'post',
				url: '/tb02',
				data: {
					'_token': $('input[name=_token]').val(),
					'kartu_pengobatan_id': $('input[name=kartu_pengobatan_id]').val(),
					'tanggal': $('input[name=tanggal]').val(),
					'tahap_pengobatan': $('input[name=tahap_pengobatan]').val(),
					'jumlah_obat': $('input[name=jumlah_obat]').val(),
					'tanggal_harus_kembali': $('input[name=tanggal_harus_kembali]').val(),
					'status_kembali': $('input[name=status_kembali]').val(),
				},
				success: function(data) {
					var myDivID = "/tb02/detail/" + kartu_pengobatan_id + "";
				      	// console.log(data);				      	
				      	swal({type: 'success',title: 'Data Jadwal Berhasil Disimpan',showConfirmButton: false})
				      	window.location.href = myDivID;
				      },
				  });
		});
	</script>
</section>
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
	})
	function Edit_Button_Jadwal_Perjanjian(e, event_id){
		$('.create-modal-jadwal-edit').modal('show');
		e.stopPropagation();

		$.ajax({
			url: "/tb02/get-data-jadwal", 
			type: "GET",
			data: {"id" : event_id},
			success: function(response){
				console.log(response);
				$('#id_edit').val(response.id);
				$('#faskes_id_edit').val(response.faskes_id);
				$('#pasien_id_edit').val(response.pasien_id);
				$('#tanggal_edit').val(response.tanggal);
				$('#tahap_pengobatan_edit').val(response.tahap_pengobatan);
				$('#jumlah_obat_edit').val(response.jumlah_obat);
				$('#tanggal_harus_kembali_edit').val(response.tanggal_harus_kembali);
				$('#status_kembali_edit').val(response.status_kembali);
			}

		});

	}

	$("#btnUpdateJadwal").click(function() {
		    $.ajax({
		      type: 'post',
		      url: '/tb02/update',
		      data: {
		        '_token': $('input[name=_token]').val(),
		        'id': $('input[name=id_edit]').val(),
		        'tanggal': $('input[name=tanggal_edit]').val(),
		        'tahap_pengobatan': $('input[name=tahap_pengobatan_edit]').val(),
		        'jumlah_obat': $('input[name=jumlah_obat_edit]').val(),
		        'tanggal_harus_kembali': $('input[name=tanggal_harus_kembali_edit]').val(),
		        'status_kembali': $('input[name=status_kembali_edit]').val(),

		      },
		      success: function(data) {
		      	console.log(data)
		        $('.create-modal-jadwal-edit').modal('hide');
				  swal({type: 'success',title: 'Data Jadwal Berhasil Diupdate',showConfirmButton: false})
		              window.location.href = "/tb02/detail/" + kartu_pengobatan_id + "";
		      },
		    });
		  });

		$("#delete").click(function() {
		    $.ajax({
		      type: 'post',
		      url: '/tb02/delete',
		      data: {
		        '_token': $('input[name=_token]').val(),
		        'id' : $('input[name=id-delete]').val()
		      },
		      success: function(data) {
		      	$('.item' + data.id).remove();
		        swal({type: 'success',title: 'Data Jadwal Berhasil Diupdate',showConfirmButton: false})
		        location.href = "/tb02/detail/" + kartu_pengobatan_id + "";
		      }
		    });
		  });
	
</script>
@endsection