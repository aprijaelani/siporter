@extends('layouts.app')
@section('content')
<div class="container-fluid" style="margin-top: -30px;">
	<h3 class="title">Daftar Terduga TB</h3>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-content">
					<div class="toolbar">
						<a class="btn btn-primary" data-toggle="modal" data-target="#mdlRegLab" id="testing">Tambah Data</a>
					</div>
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
												<input type="text" class="form-control" name="nik" id="nik" value="" maxlength="16" placeholder="Nomor Induk Kependudukan">
												<span class="help-inline text-white" id="lblNIK"></span>
											</div>
										</div><!-- NIK -->
										<div class="form-group" id="grpNamaLengkap">
											<label for="nama_lengkap" class="col-sm-3 control-label" style="text-align: left;">Nama Lengkap</label>
											<div class="control col-sm-8">
												<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="" maxlength="77" placeholder="Nama Lengkap">
												<span class="help-inline text-red" id="lblNamaLengkap"></span>
											</div>
										</div><!-- Nama Lengkap -->
										<div class="form-group" id="grpNIK">
											<label for="nik" class="col-sm-3 control-label" style="text-align: left;">BPJS</label>
											<div class="control col-sm-4">
												<input type="text" class="form-control" name="bpjs" id="bpjs" value="" maxlength="16" placeholder="BPJS">
												<span class="help-inline text-red" id="lblBPJS"></span>
											</div>
											<label for="umur" class="col-sm-1 control-label" style="text-align: left;">Tinggi</label>
											<div class="control col-sm-3">
												<input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" value="" maxlength="22" placeholder="Tinggi">
												<span class="help-inline text-white" id="lblUmur">Cm</span>
											</div>
										</div><!-- BPJS -->
										<div class="form-group" id="grpUmur">	
											<label for="umur" class="col-sm-3 control-label" style="text-align: left;">Tanggal Lahir</label>
											<div class="control col-sm-4">	
												<input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" value="" maxlength="22" placeholder="Tanggal Lahir">
												<span class="help-inline text-red" id="lblUmur"></span>
											</div>
											<label for="umur" class="col-sm-1 control-label" style="text-align: left;">Umur</label>
											<div class="control col-sm-3">	
												<input type="number" class="form-control" name="umur" id="umur" value="" maxlength="22" placeholder="Umur">
												<span class="help-inline text-red" id="lblUmur"></span>
											</div>
										</div><!-- Umur -->
										<div class="form-group" id="grpKelamin">	
											<label for="optKelamin" class="col-sm-3 control-label" style="text-align: left;">Jenis Kelamin</label>
											<div class="control col-sm-4">	
												  <label>
									                  <input type="radio" name="jenis_kelamin" value="pria" class="flat-red" checked>
									                 Pria
									              </label>
									              <label>
									                  <input type="radio" value="wanita" name="jenis_kelamin" class="flat-red">
									                  Wanita
									              </label>
											</div>
											<label for="umur" class="col-sm-1 control-label">Berat</label>
											<div class="control col-sm-3">	
												<input type="number" class="form-control" name="berat" id="berat" value="" maxlength="22" placeholder="Berat">
												<span class="help-inline text-red" id="lblUmur"></span>
											</div>
										</div><!-- Kelamin -->
										<div class="form-group" id="grpAlamat">	
											<label for="alamat" class="col-sm-3 control-label" style="text-align: left;">Alamat</label>
											<div class="control col-sm-8">	
												<input type="text" class="form-control" name="alamat" id="alamat" value="" maxlength="111" placeholder="Alamat">
												<span class="help-inline text-red" id="lblAlamat"></span>
											</div>
										</div><!-- Alamat -->
										<div class="form-group" id="grpRTRW">	
											<label for="rt" class="col-sm-3 control-label" style="text-align: left;">&nbsp;</label>
											<label for="rt" class="col-sm-1 control-label" style="text-align: left;">RT</label>
											<div class="control col-sm-2">	
												<input type="number" class="form-control" name="rt" id="rt" value="" maxlength="3" placeholder="RT.">
												<span class="help-inline text-red" id="lblRT"></span>
											</div>
											<label for="rw" class="col-sm-1 control-label" style="text-align: left;">RW</label>
											<div class="control col-sm-2">	
												<input type="number" class="form-control" name="rw" id="rw" value="" maxlength="3" placeholder="RW.">
												<span class="help-inline text-red" id="lblRW"></span>
											</div>
										</div><!-- RT / RW -->
										<div class="form-group" id="grpKota">	
											<label for="kota" class="col-sm-3 control-label" style="text-align: left;">Kota</label>
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
											<label for="kecamatan" class="col-sm-3 control-label" style="text-align: left;">Kec.</label>
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
											<label for="kelurahan" class="col-sm-3 control-label" style="text-align: left;">Kel.</label>
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
					<div class="material-datatables">
						<table id="example1" class="table">
		                <thead>
							<tr role="row">
								<th style="width: 22px;font-size: 14px; font-weight:bold;">No.</th>
								<th style="width: 194px;font-size: 14px; font-weight:bold;">No. Identitas Sediaan Dahak</th>
								<th style="width: 94px;font-size: 14px; font-weight:bold;">BPJS</th>
								<th style="width: 122px;font-size: 14px; font-weight:bold;">Tanggal Didaftar</th>
								<th style="width: 90px;font-size: 14px; font-weight:bold;">NIK</th>
								<th style="width: 122px;font-size: 14px; font-weight:bold;">Nama Lengkap</th>
								<th style="width: 40px;font-size: 14px; font-weight:bold;">Umur</th>
								<th style="width: 87px;font-size: 14px; font-weight:bold;">Jenis Kelamin</th>
								<th style="width: 132px;font-size: 14px; font-weight:bold;">Alamat</th>
								<th style="width: 201px;font-size: 14px; font-weight:bold;">Dirujuk Oleh</th>
								<th style="width: 162px;font-size: 14px; font-weight:bold;">Lokasi Anatomi Penyakit</th>
								<th style="width: 140px;font-size: 14px; font-weight:bold;">Total Skoring TB Anak</th>
								<th style="width: 72px;font-size: 14px; font-weight:bold;">Foto Toraks</th>
								<th style="width: 69px;font-size: 14px; font-weight:bold;">Status HIV</th>
								<th style="width: 155px;font-size: 14px; font-weight:bold;">Riwayat Diabetes Melitus</th>
								<th style="width: 60px;font-size: 14px; font-weight:bold;">Sewaktu A</th>
								<th style="width: 60px;font-size: 14px; font-weight:bold;">Pagi B</th>
								<th style="width: 60px;font-size: 14px; font-weight:bold;">Sewaktu C</th>
								<th style="width: 126px;font-size: 14px; font-weight:bold;">Tanggal Mikroskopis</th>
								<th style="width: 42px;font-size: 14px; font-weight:bold;">Hasil A</th>
								<th style="width: 43px;font-size: 14px; font-weight:bold;">Hasil B</th>
								<th style="width: 42px;font-size: 14px; font-weight:bold;">Hasil C</th>
								<th style="width: 86px;font-size: 14px; font-weight:bold;">Tanggal Expert</th>
								<th style="width: 75px;font-size: 14px; font-weight:bold;">Hasil Expert</th>
								<th style="width: 94px;font-size: 14px; font-weight:bold;">Tanggal Biakan</th>
								<th style="width: 77px;font-size: 14px; font-weight:bold;">Hasil Biakan</th>
								<th style="width: 77px;font-size: 14px; font-weight:bold;">No. Reg. Lab</th>
								<th style="width: 162px;font-size: 14px; font-weight:bold;">Tanggal Mulai Pengobatan</th>
								<th style="width: 65px;font-size: 14px; font-weight:bold;">Dirujuk Ke</th>
								<th style="width: 72px;font-size: 14px; font-weight:bold;">Keterangan</th>
								<th style="width: 58px;font-size: 14px; font-weight:bold;">Tindakan</th>
							</tr>
						</thead>
		                <tbody>
		                	@php
		                	$a = 1;
		                	@endphp
				            @foreach($pasiens as $pasien)
				            <tr role="row" class="odd">
				                <td style="font-size: 12px;">{{$a++}}</td>
				                <td style="font-size: 12px;">{{$pasien->no_identitas_sediaan_dahak}}</td>
				                <td style="font-size: 12px;">{{$pasien->bpjs}}</td>
				                <td style="font-size: 12px;">{{date('d F Y', strtotime($pasien->tanggal_didaftar))}}</td>
				                <td style="font-size: 12px;">{{$pasien->nik}}</td>
				                <td style="font-size: 12px;">{{$pasien->nama_lengkap}}</td>
				                <td style="font-size: 12px;">{{$pasien->umur}}</td>
				                <td style="font-size: 12px;">{{$pasien->jenis_kelamin}}</td>
				                <td style="font-size: 12px;">{{$pasien->alamat}} RT:{{$pasien->rt}} RW:{{$pasien->rw}}</td>
				                <td style="font-size: 12px;">{{$pasien->dirujuk_oleh}}</td>
				                <td style="font-size: 12px;">{{$pasien->lokasi_anatomi_penyakit}}</td>
				                <td style="font-size: 12px;">{{$pasien->total_skoring_tb_anak}}</td>
				                <td style="font-size: 12px;">{{$pasien->foto_toraks}}</td>
				                <td style="font-size: 12px;">{{$pasien->status_hiv}}</td>
				                <td style="font-size: 12px;">{{$pasien->riwayat_diabetes_melitus}}</td>
				                <td style="font-size: 12px;">{{$pasien->tanggal_a}}</td>
				                <td style="font-size: 12px;">{{$pasien->tanggal_b}}</td>
				                <td style="font-size: 12px;">{{$pasien->tanggal_c}}</td>
				                <td style="font-size: 12px;">{{$pasien->tanggal_mikroskopis}}</td>
				                <td style="font-size: 12px;">{{$pasien->hasil_a}}</td>
				                <td style="font-size: 12px;">{{$pasien->hasil_b}}</td>
				                <td style="font-size: 12px;">{{$pasien->hasil_c}}</td>
				                <td style="font-size: 12px;">{{$pasien->tanggal_expert}}</td>
				                <td style="font-size: 12px;">{{$pasien->hasil_expert}}</td>
				                <td style="font-size: 12px;">{{$pasien->tanggal_biakan}}</td>
				                <td style="font-size: 12px;">{{$pasien->hasil_biakan}}</td>
				                <td style="font-size: 12px;">{{$pasien->no_reg_lab}}</td>
				                <td style="font-size: 12px;">{{$pasien->tanggal_mulai_pengobatan}}</td>
				                <td style="font-size: 12px;">{{$pasien->dirujuk_ke}}</td>
				                <td style="font-size: 12px;">{{$pasien->keterangan}}</td>
				                <!-- <td>
				                	<a href="/tb06/{{ $pasien->id }}/edit" class="btnEdit" id="ed_4"><i class="fa fa-edit text-green"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><i class="delete-modal fa fa-trash text-red" data-id="{{$pasien->id}}" style="margin-right: 10px;cursor: pointer;"></i></a>
				                </td> -->
				                <td class="text-right" style="width: 100px;">
                                    <a href="/tb06/{{ $pasien->id }}/edit" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">edit</i></a>
                                    <a href="/tb06/{{ $pasien->id }}/detail" class="btn btn-simple btn-primary btn-icon like"><i class="material-icons">assignment</i></a>
                                    <a class="btn btn-simple btn-danger btn-icon"><i class="material-icons delete-modal" data-id="{{$pasien->id}}">delete_outline</i></a>                                    
                                </td>

				            </tr>

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
        var status = 1;

        if (kecamatan == 0) {
        	$("#lblKec").html("Pilih Kecamatan");
        }else if (kelurahan == 0) {
        	$("#lblKel").html("Pilih Kelurahan"); 
        }else{
        	window.swal({
					  title: "Checking...",
					  text: "Please wait",
					  imageUrl: "images/ajaxloader.gif",
					  showConfirmButton: false,
					  allowOutsideClick: false
					});
        	 $.ajax({
			      type: 'post',
			      url: '/tb06',
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
			        'status': status,
			      },

			      success: function(data) {
	        		$('#mdlRegLab').modal('toggle');
			        if ((data.errors)){
			          $('.error').removeClass('hidden');
			          $('.error').text(data.errors.name);
			        }else {
			          $('.error').remove();
			          var date = new Date(data.created_at);
					  var monthNames = ["January", "February", "March","April", "May", "June", "July","August", "September", "October","November", "December"];
					  var day = date.getDate();
					  var monthIndex = date.getMonth();
					  var year = date.getFullYear();
					  var tanggal_fix =  day + ' ' + monthNames[monthIndex] + ' ' + year;
			          $('#example1').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td></td><td>" + tanggal_fix + "</td><td>" + data.nik + "</td><td>" + data.nama_lengkap + "</td><td>" + data.umur + "</td><td>" + data.jenis_kelamin + "</td><td>" + data.alamat + "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><a href='' class='btnEdit' id='ed_4'><i class='fa fa-edit text-green'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://siporter.puskesmasjoharbaru.com/tb06' class='btnDelete' id='de_4'><i class='fa fa-trash text-red'></i></a></td></tr>");
						  swal({type: 'success',title: 'Data Pasien Berhasil Disimpan',showConfirmButton: false})
				              location.href = "/tb06"
			        }
			      },
			    });
			    $('#nik').val('');
			    $('#nama_lengkap').val('');
			    $('#umur').val('');
			    $('#jenis_kelamin').val('');
			    $('#alamat').val('');
			    $('#berat').val('');
			    $('#tanggal_lahir').val('');
			    $('#rt').val('');
			    $('#rw').val('');
			    $('#kota').val('');
			    $('#kecamatan').val('');
			    $('#kelurahan').val('');

        }

  });
		$(document).on('click', '.delete-modal', function() {
		    $('#id-delete').val($(this).data('id'));
		    $('.bs-example-modal-sm3').modal('show');
		 });
		$("#delete").click(function() {
			$.ajax({
				type: 'post',
				url: '/tb06/delete',
				data: {
					'_token': $('input[name=_token]').val(),
					'id' : $('input[name=id-delete]').val()
				},
				success: function(data) {
					swal({
		                title: "Data Berhasil Dihapus!",
		                buttonsStyling: false,
		                showConfirmButton: false,
		                type: "success"
		            });
			        location.href = "/tb06"
				}
			});
		});

        $('#datatables').DataTable({
			"scrollX": true,
        });
    });
    $(document).ready(function() {
	    $('#example1').DataTable( {
	        "scrollX": true
	    });
	});
	$().ready(function() {
        demo.initMaterialWizard();
        demo.initFormExtendedDatetimepickers();
    });
</script>
@endsection