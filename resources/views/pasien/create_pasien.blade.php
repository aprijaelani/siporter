@extends('layouts.app')
@section('css')
		<link rel="stylesheet" href="{{asset('siporter/jquery.fileupload.css')}}">
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Master Pasien<small>Data Pasien - Puskesmas Kecamatan Johar Baru</small>					</h1>
		<ol class="breadcrumb">
			<li><a href="http://siporter.puskesmasjoharbaru.com/master-pasien#"><i class="fa fa-dashboard"></i> Master</a></li>
			<li class="active">Master Pasien</li>
		</ol>
	</section>

<section class="content"><!-- Main content -->
<br>
<form class="form-horizontal" onsubmit="return false;">
	<div class="row">
		<div class="col-md-12"><!-- Custom Tabs -->
			<div class="box box-primary">
				<br>
				<div class="box-body">
					<div class="row-fluid">
						<div class="col-md-9">
							<div class="form-group" id="grpNIK">
								<label for="txtNIK" class="col-sm-3 control-label" style="text-align: left;">NIK</label>
								<div class="control col-sm-4">
									<input type="text" class="form-control" name="txtNIK" id="txtNIK" value="" maxlength="16" placeholder="Nomor Induk Kependudukan">
									<span class="help-inline text-red" id="lblNIK"></span>
								</div>
							</div><!-- NIK -->
							<div class="form-group" id="grpNamaLengkap">
								<label for="txtNamaLengkap" class="col-sm-3 control-label" style="text-align: left;">Nama Lengkap</label>
								<div class="control col-sm-4">
									<input type="text" class="form-control" name="txtNamaLengkap" id="txtNamaLengkap" value="" maxlength="77" placeholder="Nama Lengkap">
									<span class="help-inline text-red" id="lblNamaLengkap"></span>
								</div>
							</div><!-- Nama Lengkap -->
							<div class="form-group" id="grpUmur">
								<label for="txtUmur" class="col-sm-3 control-label" style="text-align: left;">Umur</label>
								<div class="control col-sm-4">
									<input type="number" class="form-control" name="txtUmur" id="txtUmur" value="" maxlength="22" placeholder="Umur">
									<span class="help-inline text-red" id="lblUmur"></span>
								</div>
							</div><!-- Umur -->
							<div class="form-group" id="grpKelamin">
								<label for="optKelamin" class="col-sm-3 control-label" style="text-align: left;">Jenis Kelamin</label>

								<div class="col-sm-4">
									<input type="hidden" name="txtKelamin" id="txtKelamin" value="1">
									<label><div class="iradio_polaris" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="optKelamin" id="optKelamin1" value="1" class="flat-red optKelamin" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Pria</label>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<label><div class="iradio_polaris" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="optKelamin" id="optKelamin0" value="0" class="flat-red optKelamin" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Wanita</label>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</div>
							</div><!-- Kelamin -->
						</div>
						<div class="col-md-3">
							<div>
								<span class="btn btn-primary fileinput-button">
									<i class="glyphicon glyphicon-plus"></i>
									<span>Pilih Foto</span>
									<input id="fileupload" type="file" name="files[]" multiple="">
								</span>
								<div id="progress" class="progress">
									<div class="progress-bar progress-bar-success"></div>
								</div>
								<div id="files" class="files"></div>
							</div>
					</div>
					<div class="row-fluid">
						<div class="col-md-9">
							<div class="form-group" id="grpAlamat">
								<label for="txtAlamat" class="col-sm-3 control-label" style="text-align: left;">Alamat</label>
								<div class="control col-sm-4">
									<textarea class="form-control" name="txtAlamat" id="txtAlamat" value="" placeholder="Alamat"></textarea>
									<span class="help-inline text-red" id="lblAlamat"></span>
								</div>
							</div><!-- Alamat -->
							<div class="form-group" id="grpRTRW">
								<label for="txtRT" class="col-sm-3 control-label" style="text-align: left;">&nbsp;</label>
								<label for="txtRT" class="col-sm-1 control-label" style="text-align: left;">RT</label>
								<div class="control col-sm-2">
									<input type="number" class="form-control" name="txtRT" id="txtRT" value="" maxlength="3" placeholder="RT.">
									<span class="help-inline text-red" id="lblRT"></span>
								</div>
								<label for="txtRW" class="col-sm-1 control-label" style="text-align: left;">RW</label>
								<div class="control col-sm-2">
									<input type="number" class="form-control" name="txtRW" id="txtRW" value="" maxlength="3" placeholder="RW.">
									<span class="help-inline text-red" id="lblRW"></span>
								</div>
							</div><!-- RT / RW -->
							<div class="form-group" id="grpKota">
								<label for="cmbKota" class="col-sm-3 control-label" style="text-align: left;">Kota</label>
								<div class="control col-sm-7">
									<select class="form-control" name="cmbKota" id="cmbKota" disabled="">
										<option value="3173" selected="">Kota Jakarta Pusat</option>
										<option value="3172">Kota Jakarta Timur</option>
										<option value="3174">Kota Jakarta Barat</option>
										<option value="3175">Kota Jakarta Utara</option>
										<option value="3171">Kota Jakarta Selatan</option>
									</select>
									<input type="hidden" id="txtKotaVal" value="3173">
									<span class="help-inline text-red" id="lblKota"></span>
								</div>
							</div><!-- Kota -->
							<div class="form-group" id="grpKec">
								<label for="cmbKec" class="col-sm-3 control-label" style="text-align: left;">Kec.</label>
								<div class="control col-sm-7">
									<select class="form-control" name="cmbKec" id="cmbKec" disabled="">
										<option value="3173040" selected="">Johar Baru</option>
									</select>
									<input type="hidden" id="txtKecVal" value="3173040">
									<span class="help-inline text-red" id="lblKec"></span>
								</div>
							</div><!-- Kecamatan -->
							<div class="form-group" id="grpKel">
								<label for="cmbKel" class="col-sm-3 control-label" style="text-align: left;">Kel.</label>
								<div class="control col-sm-7">
									<select class="form-control" name="cmbKel" id="cmbKel">
										<option value="3173040001">Johar Baru</option>
										<option value="3173040002">Kampung Rawa</option>
										<option value="3173040003">Tanah Tinggi</option>
										<option value="3173040004">Galur</option>
									</select>
									<input type="hidden" id="txtKelVal" value="">
									<span class="help-inline text-red" id="lblKel"></span>
								</div>
							</div><!-- Kelurahan -->
							<div class="btn-toolbar">
								<a class="btn btn-primary" id="btnSimpan">Simpan</a>
								<a class="btn btn-danger pull-left" disabled="">Batal</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

				</div></form></section><!-- /.Main content -->
@endsection
@section('javascript')
<script type="text/javascript">
	$('#btnSimpan').click(function(){
	warn('Penyimpanan data berhasil!', 'success');
	});
	$(document).ready(function(){
		$.fn.datepicker.dates['id'] = {/* jshint ignore:line */
			days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
			daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
			daysMin: ['Mi', 'Sn', 'Sl', 'Rb', 'Km', 'Ju', 'Sa'],
			months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
			today: 'Hari ini',
			clear: 'Bersihkan',
			format: 'dd/mm/yyyy',
			titleFormat: 'MM yyyy',
			weekStart: 0
		};

		$('#btnChangePassword').click(function()
		{
			$('#mdlChangePass').modal('show');
			return false;
		});

		$('#mdlChangePass').on('shown.bs.modal', function()
		{
			$('#txtOldPassword').focus();
		});

		$('#btnUbahPass').click(function()
		{
			var pass = $('#txtPassword').val();
			var conf = $('#txtConfirm').val();
			var oldp = $('#txtOldPassword').val();

			$('#txtPassword').val('');
			$('#txtConfirm').val('');
			$('#txtOldPassword').val('');

			if (pass !== conf)
			{
				$('#lblConfirm').html('Kata Sandi berbeda dengan Konfirmasi');
				$('#txtPassword').focus();
				return;
			}

			$('#mdlChangePass').modal('hide');

			jQuery.ajax({
				'type':'POST',
				'url':'password',
				'data':
				{
					'password'		: pass,
					'confirm'		: conf,
					'oldpass'		: oldp
				},
				'cache':false,
				'success':function(html)
				{
					if (html === 'ok')
					{
						warn('Penyimpanan data berhasil', 'success');
					}
					else
					{
						warn('Penyimpanan data gagal!\n' + html, 'danger');
					}
				}
			});
		});
	});

	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		checkboxClass: 'icheckbox_polaris',
		radioClass: 'iradio_polaris'
	});

	function reset_input(field, type)
	{
		if (typeof type !== 'undefined') type = 'txt';
		$('#' + type + field).val('');
		$('#lbl' + field).html('');
		$('#grp' + field).removeClass('has-error');
	}

	function warn(msg, type)
	{
		var icon = 'exclamation-triangle';
		var message	= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		type = type !== 'success' && type !== 'danger' ? 'info' : type;

		switch (type)
		{
			case 'success':
			icon = 'check';
			break;
			case 'danger':
			icon = 'close';
			break;
		}

		message	= '<span class="fa fa-' + icon + '"></span>' + message + msg;

		$.notify({
			title	: '<strong>SI PORTER</strong><br />&nbsp;<br />',
			message	: message
		},
		{
			type: type,
			/*allow_dismiss: true,*/
			/*delay: 100,*/
					/*animate:
					{
						enter: 'animated bounceInDown',
						exit: 'animated bounceOutUp'
					}*/
				});
	}

	function msgbox(message, icon)
	{
		if (typeof icon !== 'undefined')
		{
			$.notify({
				icon	: icon,
				title	: ".: SI PORTER :.",
				message	: message
			});
		}
		else
		{
			$.notify({
				title	: ".: SI PORTER :.",
				message	: message
			});
		}
	}

	function GetNotif(page, mid)
	{
		var that = $('#' + mid).html();
		var postdata;
		jQuery.ajax({
			'type':'POST',
			'url':page,
			'data':{
				'par0':page
			},
			'cache':false,
			'success':function(html)
			{
				if((html.trim()).length !== (that.trim()).length + 28)
				{
					$('#' + mid).html(html);
				}
			}
		});
	}

	function setIntvl(par1, par2)
	{
		if($('#' + par2).length)
		{
			setInterval(function() { GetNotif(par1, par2) }, 7777);
		}
	}
</script>

<script>
	/*jslint unparam: true, regexp: true */
	/*global window, $ */
	$(function () {
		'use strict';
				// Change this to the location of your server-side upload handler:
				var url = window.location.hostname === 'blueimp.github.io' ?
				'//jquery-file-upload.appspot.com/' : 'server/php/',
				uploadButton = $('<button/>')
				.addClass('btn btn-primary')
				.prop('disabled', true)
				.text('Processing...')
				.on('click', function () {
					var $this = $(this),
					data = $this.data();
					$this
					.off('click')
					.text('Abort')
					.on('click', function () {
						$this.remove();
						data.abort();
					});
					data.submit().always(function () {
						$this.remove();
					});
				});
				$('#fileupload').fileupload({
					url: url,
					dataType: 'json',
					autoUpload: false,
					acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
					maxFileSize: 999000,
					// Enable image resizing, except for Android and Opera,
					// which actually support image resizing, but fail to
					// send Blob objects via XHR requests:
					disableImageResize: /Android(?!.*Chrome)|Opera/
					.test(window.navigator.userAgent),
					previewMaxWidth: 100,
					previewMaxHeight: 100,
					previewCrop: true
				}).on('fileuploadadd', function (e, data) {
					data.context = $('<div/>').appendTo('#files');
					$.each(data.files, function (index, file) {
						var node = $('<p/>')
						.append($('<span/>').text(file.name));
						if (!index) {
							node
							.append('<br>')
							.append(uploadButton.clone(true).data(data));
						}
						node.appendTo(data.context);
					});
				}).on('fileuploadprocessalways', function (e, data) {
					var index = data.index,
					file = data.files[index],
					node = $(data.context.children()[index]);
					if (file.preview) {
						node
						.prepend('<br>')
						.prepend(file.preview);
					}
					if (file.error) {
						node
						.append('<br>')
						.append($('<span class="text-danger"/>').text(file.error));
					}
					if (index + 1 === data.files.length) {
						data.context.find('button')
						.text('Upload')
						.prop('disabled', !!data.files.error);
					}
				}).on('fileuploadprogressall', function (e, data) {
					var progress = parseInt(data.loaded / data.total * 100, 10);
					$('#progress .progress-bar').css(
						'width',
						progress + '%'
						);
				}).on('fileuploaddone', function (e, data) {
					$.each(data.result.files, function (index, file) {
						if (file.url) {
							var link = $('<a>')
							.attr('target', '_blank')
							.prop('href', file.url);
							$(data.context.children()[index])
							.wrap(link);
						} else if (file.error) {
							var error = $('<span class="text-danger"/>').text(file.error);
								$(data.context.children()[index])
							.append('<br>')
							.append(error);
						}
					});
				}).on('fileuploadfail', function (e, data) {
					$.each(data.files, function (index) {
						var error = $('<span class="text-danger"/>').text('File upload failed.');
						$(data.context.children()[index])
						.append('<br>')
						.append(error);
					});
				}).prop('disabled', !$.support.fileInput)
				.parent().addClass($.support.fileInput ? undefined : 'disabled');
			});
		</script>
		<script src="{{ asset('siporter/adminlte.js.download')}}"></script>
		<script src="{{ asset('siporter/icheck.min.js.download')}}"></script>
		<script src="{{ asset('siporter/jquery-ui.min.js.download')}}"></script>
		<script src="{{ asset('siporter/jquery.dataTables.min.js.download')}}"></script>
		<script src="{{ asset('siporter/dataTables.bootstrap.min.js.download')}}"></script>
		<script src="{{ asset('siporter/bootstrap-datepicker.js.download')}}"></script>
		<script src="{{ asset('siporter/bootstrap-notify.min.js.download')}}"></script>
		<script src="{{ asset('siporter/dashboard2.js.download')}}"></script>
		<script src="{{ asset('siporter/siporter.js.download')}}"></script>
		<script src="{{ asset('siporter/form.js.download')}}"></script>
		<script src="{{ asset('siporter/jquery.ui.widget.js.download')}}"></script>
		<script src="{{ asset('siporter/load-image.all.min.js.download')}}"></script>
		<script src="{{ asset('siporter/canvas-to-blob.min.js.download')}}"></script>
		<script src="{{ asset('siporter/jquery.iframe-transport.js.download')}}"></script>
		<script src="{{ asset('siporter/jquery.fileupload.js.download')}}"></script>
		<script src="{{ asset('siporter/jquery.fileupload-process.js.download')}}"></script>
		<script src="{{ asset('siporter/jquery.fileupload-image.js.download')}}"></script>
		<script src="{{ asset('siporter/jquery.fileupload-audio.js.download')}}"></script>
		<script src="{{ asset('siporter/jquery.fileupload-video.js.download')}}"></script>
		<script src="{{ asset('siporter/jquery.fileupload-validate.js.download')}}"></script>
@endsection