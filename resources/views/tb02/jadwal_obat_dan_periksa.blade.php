@extends('layouts.app')
@section('content')
<div class="col-md-12" style="margin-top: -50px;">
    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card wizard-card" data-color="rose" id="wizardProfile">
            <form method="post" action="/tb01/create"><!-- form start -->
				{{ csrf_field() }}
                <div class="wizard-navigation">
                    <ul>
                        <li>
                            <a href="#tanggal_perjanjian" data-toggle="tab">Tanggal Perjanjian</a>
                        </li>
                        <li>
                            <a href="#periksa_ulang_dahak" data-toggle="tab">Periksa Ulang Dahak</a>
                        </li>
                        <li>
                            <a href="#mindua" data-toggle="tab">H-2</a>
                        </li>
                        <li>
                            <a href="#minsatu" data-toggle="tab">H-1</a>
                        </li>
                        <li>
                            <a href="#minnol" data-toggle="tab">H-0</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" style="margin-top: 0px;">
                	<div class="tab-pane" id="tanggal_perjanjian">
                		<div class="row">
                			<div class="col-md-12">
                				<div class="card-content table-responsive table-full-width">
                                    <table class="table table-hover">
										<thead>
											<tr role="row">
												<th style="font-weight: bold;">No.</th>
												<th style="font-weight: bold;">NIK</th>
												<th style="font-weight: bold;">Nama Lengkap</th>
												<th style="font-weight: bold;">Jenis Kelamin</th>
												<th style="font-weight: bold;">Umur</th>
												<th style="font-weight: bold;">Alamat</th>
												<th style="font-weight: bold;">Action</th>
											</tr>
										</thead>										
										<tbody>
										@php $i = 1; @endphp
										@foreach ($kartu_pengobatans as $kartu_pengobatan)
										@if (!empty($kartu_pengobatan->daftar_terduga))
										<tr>
											<td>{{$i++}}</td>
											<td>{{$kartu_pengobatan->daftar_terduga->nik}}</td>
											<td>{{$kartu_pengobatan->daftar_terduga->nama_lengkap}}</td>
											<td>{{$kartu_pengobatan->daftar_terduga->jenis_kelamin}}</td>
											<td>{{$kartu_pengobatan->daftar_terduga->umur}}</td>
											<td>{{$kartu_pengobatan->daftar_terduga->alamat}},RT.{{$kartu_pengobatan->daftar_terduga->rt}}/RW.{{$kartu_pengobatan->daftar_terduga->rw}}</td>
											<td>
												<a href="/tb02/detail/{{ $kartu_pengobatan->id }}" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">home</i></a>
			                                    <a href="/tb02/print/{{ $kartu_pengobatan->id }}" target="_blank" class="btn btn-simple btn-primary btn-icon like"><i class="material-icons">print</i>
			                                    </a>
			                                    <a class="btn btn-simple btn-danger btn-icon"><i class="material-icons delete-modal" data-id="{{$pasien->id}}">delete_outline</i>
			                                    </a>
			                                </td>
										</tr>
										@endif
										@endforeach
										</tbody>
									</table>
                                </div>
	                        </div>
                		</div>
                	</div>
                  	<div class="tab-pane" id="periksa_ulang_dahak">
                    	<div class="row">
	                    	<div class="col-md-12">
	                    		<div class="card-content table-responsive table-full-width">
                                    <table class="table table-hover">
										<thead>
											<tr role="row">
												<th style="font-weight: bold;">No.</th>
												<th style="font-weight: bold;">NIK</th>
												<th style="font-weight: bold;">Nama Lengkap</th>
												<th style="font-weight: bold;">Jenis Kelamin</th>
												<th style="font-weight: bold;">Umur</th>
												<th style="font-weight: bold;">Alamat</th>
												<th style="font-weight: bold;">Action</th>
											</tr>
										</thead>										
										<tbody>
										@php $i = 1; @endphp
										@foreach ($kartu_pengobatans as $kartu_pengobatan)
										@if (!empty($kartu_pengobatan->daftar_terduga))
										<tr>
											<td>{{$i++}}</td>
											<td>{{$kartu_pengobatan->daftar_terduga->nik}}</td>
											<td>{{$kartu_pengobatan->daftar_terduga->nama_lengkap}}</td>
											<td>{{$kartu_pengobatan->daftar_terduga->jenis_kelamin}}</td>
											<td>{{$kartu_pengobatan->daftar_terduga->umur}}</td>
											<td>{{$kartu_pengobatan->daftar_terduga->alamat}},RT.{{$kartu_pengobatan->daftar_terduga->rt}}/RW.{{$kartu_pengobatan->daftar_terduga->rw}}</td>
											<td>
												<a href="/tb02/detail_periksa_ulang/{{ $kartu_pengobatan->id }}" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">home</i></a>
										</tr>
										@endif
										@endforeach
										</tbody>
									</table>
								</div>
	                    	</div>
                    	</div>
                  	</div>
                  	<div class="tab-pane" id="mindua">
                    	<div class="row">
	                    	<div class="col-md-12">
	                    		<div class="card-content table-responsive table-full-width">
                                    <table class="table table-hover">
										<thead>
											<tr role="row">
												<th style="font-weight: bold;">No.</th>
												<th style="font-weight: bold;">NIK</th>
												<th style="font-weight: bold;">Nama Lengkap</th>
												<th style="font-weight: bold;">Jenis Kelamin</th>
												<th style="font-weight: bold;">Umur</th>
												<th style="font-weight: bold;">Alamat</th>
												<th style="font-weight: bold;">Action</th>
											</tr>
										</thead>										
										<tbody>
										@php $i = 1; @endphp
										@foreach ($list_min_duas as $list_min_dua)
										@if (!empty($list_min_dua->kartu_pengobatan->daftar_terduga))
										<tr class="dateClosed odd" role="row">
											<td>{{$i++}}</td>
											<td>{{$list_min_dua->kartu_pengobatan->daftar_terduga->nik}}</td>
											<td>{{$list_min_dua->kartu_pengobatan->daftar_terduga->nama_lengkap}}</td>
											<td>{{$list_min_dua->kartu_pengobatan->daftar_terduga->jenis_kelamin}}</td>
											<td>{{$list_min_dua->kartu_pengobatan->daftar_terduga->umur}}</td>
											<td>{{$list_min_dua->kartu_pengobatan->daftar_terduga->alamat}},RT.{{$list_min_dua->kartu_pengobatan->daftar_terduga->rt}}/RW.{{$list_min_dua->kartu_pengobatan->daftar_terduga->rw}}</td>
											<td>{{$list_min_dua->kartu_pengobatan->daftar_terduga->telepon}}</td>
											<td>{{date('d F Y', strtotime($list_min_dua->tanggal_harus_kembali))}}</td>
										</tr>
										@endif
										@endforeach
										</tbody>
									</table>
								</div>
	                    	</div>
                    	</div>
                  	</div>
                  	<div class="tab-pane" id="minsatu">
                    	<div class="row">
                    		<div class="col-md-12">
	                    		<div class="card-content table-responsive table-full-width">
                                    <table class="table table-hover">
										<thead>
											<tr role="row">
												<th style="font-weight: bold;">No.</th>
												<th style="font-weight: bold;">NIK</th>
												<th style="font-weight: bold;">Nama Lengkap</th>
												<th style="font-weight: bold;">Jenis Kelamin</th>
												<th style="font-weight: bold;">Umur</th>
												<th style="font-weight: bold;">Alamat</th>
												<th style="font-weight: bold;">Action</th>
											</tr>
										</thead>										
										<tbody>
										@php $i = 1; @endphp
										@foreach ($list_min_satus as $list_min_satu)
										@if (!empty($list_min_satu->kartu_pengobatan->daftar_terduga))
										<tr class="dateClosed odd" role="row">
											<td class=" edit">{{$i++}}</td>
											<td class=" tanggal_show">{{$list_min_satu->kartu_pengobatan->daftar_terduga->nik}}</td>
											<td class=" tanggal_show">{{$list_min_satu->kartu_pengobatan->daftar_terduga->nama_lengkap}}</td>
											<td class=" tanggal_show">{{$list_min_satu->kartu_pengobatan->daftar_terduga->jenis_kelamin}}</td>
											<td class=" tanggal_show">{{$list_min_satu->kartu_pengobatan->daftar_terduga->umur}}</td>
											<td>{{$list_min_satu->kartu_pengobatan->daftar_terduga->alamat}},RT.{{$list_min_satu->kartu_pengobatan->daftar_terduga->rt}}/RW.{{$list_min_satu->kartu_pengobatan->daftar_terduga->rw}}</td>
											<td>{{$list_min_satu->kartu_pengobatan->daftar_terduga->telepon}}</td>
											<td>{{date('d F Y', strtotime($list_min_satu->tanggal_harus_kembali))}}</td>
										</tr>
										@endif
										@endforeach
										</tbody>
									</table>
								</div>
	                    	</div>
                    	</div>
                  	</div>
                  	<div class="tab-pane" id="minnol">
                    	<div class="row">
                    		<div class="col-md-12">
	                    		<div class="card-content table-responsive table-full-width">
                                    <table class="table table-hover">
										<thead>
											<tr role="row">
												<th style="font-weight: bold;">No.</th>
												<th style="font-weight: bold;">NIK</th>
												<th style="font-weight: bold;">Nama Lengkap</th>
												<th style="font-weight: bold;">Jenis Kelamin</th>
												<th style="font-weight: bold;">Umur</th>
												<th style="font-weight: bold;">Alamat</th>
												<th style="font-weight: bold;">Action</th>
											</tr>
										</thead>										
										<tbody>
										@php $i = 1; @endphp
										@foreach ($list_min_nows as $list_min_now)
										@if (!empty($list_min_now->kartu_pengobatan->daftar_terduga))
										<tr class="dateClosed odd" role="row">
											<td class=" edit">{{$i++}}</td>
											<td class=" tanggal_show">{{$list_min_now->kartu_pengobatan->daftar_terduga->nik}}</td>
											<td class=" tanggal_show">{{$list_min_now->kartu_pengobatan->daftar_terduga->nama_lengkap}}</td>
											<td class=" tanggal_show">{{$list_min_now->kartu_pengobatan->daftar_terduga->jenis_kelamin}}</td>
											<td class=" tanggal_show">{{$list_min_now->kartu_pengobatan->daftar_terduga->umur}}</td>
											<td>{{$list_min_now->kartu_pengobatan->daftar_terduga->alamat}},RT.{{$list_min_now->kartu_pengobatan->daftar_terduga->rt}}/RW.{{$list_min_now->kartu_pengobatan->daftar_terduga->rw}}</td>
											<td>{{$list_min_now->kartu_pengobatan->daftar_terduga->telepon}}</td>
											<td>{{date('d F Y', strtotime($list_min_now->tanggal_harus_kembali))}}</td>
										</tr>
										@endif
										@endforeach
										</tbody>
									</table>
								</div>
	                    	</div>
                    		<table id="example3" class="table table-bordered table-striped">
								<thead>
								<tr role="row">
									<th>No.</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Jenis Kelamin</th>
									<th>Umur</th>
									<th>Alamat</th>
									<th>Telepon</th>
									<th>Tanggal Harus Kembali</th>
								</tr>
								</thead>
								
								<tbody>
								@php $i = 1; @endphp
								@foreach ($list_min_nows as $list_min_now)
								@if (!empty($list_min_now->kartu_pengobatan->daftar_terduga))
								<tr class="dateClosed odd" role="row">
									<td class=" edit">{{$i++}}</td>
									<td class=" tanggal_show">{{$list_min_now->kartu_pengobatan->daftar_terduga->nik}}</td>
									<td class=" tanggal_show">{{$list_min_now->kartu_pengobatan->daftar_terduga->nama_lengkap}}</td>
									<td class=" tanggal_show">{{$list_min_now->kartu_pengobatan->daftar_terduga->jenis_kelamin}}</td>
									<td class=" tanggal_show">{{$list_min_now->kartu_pengobatan->daftar_terduga->umur}}</td>
									<td>{{$list_min_now->kartu_pengobatan->daftar_terduga->alamat}},RT.{{$list_min_now->kartu_pengobatan->daftar_terduga->rt}}/RW.{{$list_min_now->kartu_pengobatan->daftar_terduga->rw}}</td>
									<td>{{$list_min_now->kartu_pengobatan->daftar_terduga->telepon}}</td>
									<td>{{date('d F Y', strtotime($list_min_now->tanggal_harus_kembali))}}</td>
								</tr>
								@endif
								@endforeach
								</tbody>
							</table>
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

	function Edit_Button_Periksa_Ulang(e, event_id){
		$('.edit-modal-periksa').modal('show');
		e.stopPropagation();

		$.ajax({
			url: "/tb02/get-data-periksa", 
			type: "GET",
			data: {"id" : event_id},
			success: function(response){
				console.log(response);
				$('#ids_edit').val(response.id);
				$('#pasien_ids_edit').val(response.pasien_id);
				$('#faskes_ids_edit').val(response.faskes_id);
				$('#tanggal_janji_edit').val(response.tanggal_janji);
				$('#bulan_ke_edit').val(response.bulan_ke);
				$('#status_janji_edit').val(response.status_janji);
			}

		});

	}

	$("#btnEditPeriksa").click(function() {

	    $.ajax({
	      type: 'post',
	      url: '/tb02/update-periksa',
	      data: {
	        '_token': $('input[name=_token]').val(),
	        'id': $('input[name=ids_edit]').val(),
	        'pasien_id': $('select[name=pasien_ids_edit]').val(),
	        'faskes_id': $('select[name=faskes_ids_edit]').val(),
	        'tanggal_janji': $('input[name=tanggal_janji_edit]').val(),
	        'bulan_ke': $('input[name=bulan_ke_edit]').val(),
	        'status_janji': $('input[name=status_janji_edit]').val(),
	      },
	      success: function(data) {
	      	// console.log(data);
	          $('.edit-modal-periksa').modal('hide');
				  swal({type: 'success',title: 'Data Periksa Ulang Berhasil Diupdate',showConfirmButton: false})
		              window.location.href = "/tb02"
	      },
	    });
	  });


	$("#btnUpdateJadwal").click(function() {
	    $.ajax({
	      type: 'post',
	      url: '/tb02/update',
	      data: {
	        '_token': $('input[name=_token]').val(),
	        'id': $('input[name=id_edit]').val(),
	        'pasien_id': $('select[name=pasien_id_edit]').val(),
	        'faskes_id': $('select[name=faskes_id_edit]').val(),
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
	              window.location.href = "/tb02"
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
	        location.href = "/tb02"
	      }
	    });
	  });

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

	$('.select2').select2();

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
</script>
@endsection