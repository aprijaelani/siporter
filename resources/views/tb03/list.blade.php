@extends('layouts.app')
@section('content')
<div class="container-fluid" style="margin-top: -30px;">
	<h3 class="title">Register TBC UPK</h3>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-content">
					<form class="form-inline" action="/tb03/search" method="GET">
					  <div class="form-group">
					    <input type="text" class="form-control datepicker" required id="start_date" name="start_date" placeholder="Start Date">
					  </div>
					  <div class="form-group">
					    <input type="text" class="form-control datepicker" required id="end_date" name="end_date" placeholder="End Date">
					  </div>
					  <button type="submit" class="btn btn-default" name="action" value="filter">Filter</button>
			    	  <button type="submit" class="btn btn-info" name="action" value="Cetak"><i class="fa fa-print"></i>  Cetak</button>

			<!-- 		  <button type="submit" class="btn btn-default">Submit</button>
					<a class="btn btn-info" id="print-tb01" href="/tb01/prints" target="_blank"><i class="fa fa-print"></i>  Cetak</a> -->
					</form>
					<div class="material-datatables">
						<table id="example1" class="table">
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
		                	@foreach ($datas as $key => $pasien)
				            	@if (!empty($pasien->daftar_terduga))
					            <tr>
					            	<td>{{$key+1}}</td>
					            	<td>{{$pasien->daftar_terduga->nik}}</td>
					            	<td>{{$pasien->daftar_terduga->nama_lengkap}}</td>
					            	<td>{{$pasien->daftar_terduga->jenis_kelamin}}</td>
					            	<td>{{$pasien->daftar_terduga->umur}}</td>
					            	<td>{{$pasien->daftar_terduga->alamat}} RT.{{$pasien->daftar_terduga->rt}} / RW.{{$pasien->daftar_terduga->rw}}, Kel:{{$pasien->daftar_terduga->kelurahan->nama}}, Kec:{{$pasien->daftar_terduga->kecamatan->nama}}, Kota:{{$pasien->daftar_terduga->kota}}</td>
					            	<td>
					            		<a href="/tb03/prints/" target="_blank" class="btn btn-simple btn-primary btn-icon like"><i class="material-icons">print</i></a>
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
@endsection
@section('javascript')
<script type="text/javascript">
	$('.select2').select2({ width: '100%' });
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
        if (kecamatan == 0) {
        	$("#lblKec").html("Pilih Kecamatan");
        }else if (kelurahan == 0) {
        	$("#lblKel").html("Pilih Kelurahan"); 
        }else{
        	 $.ajax({
			      type: 'post',
			      url: '/tb06',
			      data: {
			        '_token': $('input[name=_token]').val(),
			        'nik': $('input[name=nik]').val(),
			        'bpjs': $('input[name=bpjs]').val(),
			        'nama_lengkap': $('input[name=nama_lengkap]').val(),
			        'umur': $('input[name=umur]').val(),
			        'jenis_kelamin': $('input[name=jenis_kelamin]').val(),
			        'alamat': $('input[name=alamat]').val(),
			        'rt': $('input[name=rt]').val(),
			        'rw': $('input[name=rw]').val(),
			        'kota': $('select[name=kota]').val(),
			        'kecamatan': $('select[name=kecamatan]').val(),
			        'kelurahan': $('select[name=kelurahan]').val(),
			      },
			      success: function(data) {
	        		$('#mdlRegLab').modal('toggle');
			        if ((data.errors)){
			          $('.error').removeClass('hidden');
			          $('.error').text(data.errors.name);
			        }
			        else {
			          $('.error').remove();
			          // console.log(data);
			          var date = new Date(data.created_at);
					  var monthNames = ["January", "February", "March","April", "May", "June", "July","August", "September", "October","November", "December"];
					  var day = date.getDate();
					  var monthIndex = date.getMonth();
					  var year = date.getFullYear();
					  var tanggal_fix =  day + ' ' + monthNames[monthIndex] + ' ' + year;
			          $('#example1').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td></td><td>" + tanggal_fix + "</td><td>" + data.nik + "</td><td>" + data.nama_lengkap + "</td><td>" + data.umur + "</td><td>" + data.jenis_kelamin + "</td><td>" + data.alamat + "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><a href='' class='btnEdit' id='ed_4'><i class='fa fa-edit text-green'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://siporter.puskesmasjoharbaru.com/tb06' class='btnDelete' id='de_4'><i class='fa fa-trash text-red'></i></a></td></tr>");
						  swal({type: 'success',title: 'Data Pasien Berhasil Disimpan',showConfirmButton: false})
				              location.href = "/tb01"
			        }
			      },
			    });
			    $('#nik').val('');
			    $('#nama_lengkap').val('');
			    $('#umur').val('');
			    $('#jenis_kelamin').val('');
			    $('#alamat').val('');
			    $('#rt').val('');
			    $('#rw').val('');
			    $('#kota').val('');
			    $('#kecamatan').val('');
			    $('#kelurahan').val('');
        }
  });
    	$('#example1').DataTable( {
    	});
	});
</script>
<script type="text/javascript">
	$(document).on('click', '.datepicker', function(){
	   $(this).datepicker({
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
	   }).focus();
	   $(this).removeClass('datepicker'); 
	});

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
	var numRow = 0;
	function AddRow()
	{
		numRow ++;
		var row = '<tr class="realBody" id="rowNum'+numRow+'"><th style="text-align: center;"><input class="form-control" type="text" id="nama_'+numRow+'" name="nama_lengkap[]"/></th><th style="text-align: center;"><select name="jenis_kelamin_kontak_serumah[]" class="form-control"><option value="">Pilih</option><option value="pria">Pria</option><option value="wanita">Wanita</option></select></th><th style="text-align: center;"><input class="form-control" type="text" id="umur_'+numRow+'" name="umur[]"></th><th style="text-align: center;"><input class="form-control datepicker" type="text" id="tanggal_periksa_'+numRow+'" style="color:black;" name="tanggal_periksa[]"></th><th><input class="form-control" type="text" id="hasil_'+numRow+'" style="color:black;" name="hasil[]"></th><th> <input type="button" value="Hapus" class="btn btn-danger" onclick="removeRow('+numRow+');" class="btn btn-default btn-xs" title="Delete"></th></tr>';
	    $('#kontak_serumah').append(row)
	}

	function removeRow(rnum) {
    	jQuery('#rowNum'+rnum).remove();
		
		var rowCount = $('#kontak_serumah tr').length;
    }

    function RowAdd()
	{
		numRow ++;
		var war = '<tr class="realBody" id="rowNum'+numRow+'"><th style="text-align: center;"><select class="form-control select2" name="bulan[]" id="bulan_'+numRow+'"><option value="Januari">Januari</option><option value="Februari">Februari</option><option value="Maret">Maret</option><option value="April">April</option><option value="Mei">Mei</option><option value="Juni">Juni</option><option value="Juli">Juli</option><option value="Agustus">Agustus</option><option value="September">September</option><option value="Oktober">Oktober</option><option value="November">November</option><option value="Desember">Desember</option></select></th><th style="text-align: center;"><input class="form-control datepicker" type="text" id="tanggal_'+numRow+'" name="tanggal_pemeriksaan_dahak[]"></th><th style="text-align: center;"><input class="form-control" type="text" id="no_reg_lab_'+numRow+'" name="no_reg_lab[]"></th><th style="text-align: center;"><input class="form-control" type="text" id="bta_'+numRow+'" style="color:black;" name="bta[]"></th><th><input class="form-control" type="number" min="0" id="bb_'+numRow+'" style="color:black;" name="bb[]"></th><th> <input type="button" value="Hapus" class="btn btn-danger" onclick="rowRemove('+numRow+');" class="btn btn-default btn-xs" title="Delete"></th></tr>';
	    $('#hasil_pemeriksaan_dahak').append(war)
	}

	function rowRemove(rnum) {
    	jQuery('#rowNum'+rnum).remove();
		
		var rowCount = $('#hasil_pemeriksaan_dahak tr').length;
    }

	$('#select_pasien').on('change', function() {
	  $.ajax(
		   {
		      type:'GET',
		      url:'/tb05/get-data-pasien',
		      data:{'id' : this.value },
		      success: function(data){
		      	$('#txtNIK').val(data.nik);
		      	$('#txtNamaLengkap').val(data.nama_lengkap);
		      	$('#txtAlamat').val(data.alamat);
		      	$('#txtUmur').val(data.umur);
		      	$('#txtPropinsi').val(data.kota);
		      	$('#txtKabupaten').val(data.kecamatan);
		      	$('#txtNoIdentitasSediaanDahak').val(data.no_identitas_sediaan_dahak);
		      	if (data.jenis_kelamin == 'pria') {
		      		$("#pria").iCheck('check');
		      	}else{
		      		$("#wanita").iCheck('check');
		      	}
		      	// $("#subscribeAddress").iCheck('uncheck');
		      	// $('#pria').iCheck('checked');
		      }
		   }
		);
	});

	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

	$('.select2').select2();

	$('.btn-next-child').click(function(){
  	 $('.nav-tabs > .active').next('li').find('a').trigger('click');
	});

  	$('.btn-prev-child').click(function(){
  	$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});
</script>
@endsection