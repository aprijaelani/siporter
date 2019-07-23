@extends('layouts.app')
@section('content')

<div class="col-md-12" style="margin-top: -50px;">
    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card wizard-card" data-color="rose" id="wizardProfile">
            <form action="update" method="post">
              {{ csrf_field() }}
                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                <div class="wizard-header">
                    <h3 class="wizard-title">
                        Create Daftar Terduga TB
                    </h3>
                </div>
                <div class="wizard-navigation">
                    <ul>
                        <li>
                            <a href="#about" data-toggle="tab">Step 1</a>
                        </li>
                        <li>
                            <a href="#account" data-toggle="tab">Step 2</a>
                        </li>
                        <li>
                            <a href="#address" data-toggle="tab">Step 3</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                  <div class="tab-pane" id="about">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="color:black;">No. Identitas Sediaan Dahak</label>
                          <input readonly type="text" name="no_identitas_sediaan_dahak" id="no_identitas_sediaan_dahak" class="form-control" value="{{$data->no_identitas_sediaan_dahak}}">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">BPJS</label>
                          <input readonly type="text" name="bpjs" class="form-control" value="{{$data->bpjs}}">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Tanggal Didaftar</label>
                          <input readonly type="text" class="form-control datepicker" value="{{$data->tanggal_didaftar}}" id="datepicker" name="tanggal_didaftar">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">NIK</label>
                          <input readonly type="text" class="form-control" value="{{$data->nik}}" name="nik" value="{{$data->nik}}">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Nama Lengkap</label>
                          <input readonly type="text" class="form-control" value="{{$data->nama_lengkap}}" name="nama_lengkap">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Umur</label>
                          <input readonly type="text" class="form-control" value="{{$data->umur}}" name="umur">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Tanggal Lahir</label>
                          <input readonly type="text" class="form-control datepicker" value="{{$data->tanggal_lahir}}" name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Berat Badan</label>
                          <input readonly type="text" class="form-control" value="{{$data->berat_badan}}" name="berat_badan">
                        </div>                              
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="color:black;">Tinggi Badan</label>
                          <input readonly type="text" class="form-control" value="{{$data->tinggi_badan}}" name="tinggi_badan">
                        </div>
                        <div class="form-group" style="margin-bottom: -5px;">
                          <label style="color:black;">Jenis Kelamin</label>
                          <div class="radio">
                              <label style="color: black; margin-right: 50px;margin-left: -10px;">
                                  <input disabled="true" type="radio" name="jenis_kelamin" class="flat-red" value="pria" {{ $data->jenis_kelamin == 'pria' ? 'checked' : '' }}>Pria
                              </label>
                              <label style="color: black;">
                                <input disabled="true" type="radio" name="jenis_kelamin" class="flat-red" value="wanita" {{ $data->jenis_kelamin == 'wanita' ? 'checked' : '' }}>Wanita
                              </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Jika Wanita Usia Subur</label>
                          <select disabled="true" name="country" class="form-control" disabled>
                              <option value="">Pilih</option>
                              <option value="Hamil" @if ($data->wanita_usia_subur == 'Hamil')selected="selected"@endif>Hamil</option>
                              <option value="Tidak Hamil" @if ($data->wanita_usia_subur == 'Tidak Hamil')selected="selected"@endif>Tidak Hamil</option>
                          </select> 
                        </div>                        
                        <div class="form-group">
                          <label style="color:black;">RT</label>
                          <input readonly type="text" class="form-control" value="{{$data->rt}}" name="rt">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">RW</label>
                          <input readonly type="text" class="form-control" value="{{$data->rw}}" name="rw">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Kota</label>
                          <select disabled="true" class="form-control" name="kota" id="kota" disabled>
                            <option value="Kota Jakarta Pusat" @if ($data->kota == 'Kota Jakarta Pusat')selected="selected"@endif>Kota Jakarta Pusat</option>
                            <option value="Kota Jakarta Timur" @if ($data->kota == 'Kota Jakarta Timur')selected="selected"@endif>Kota Jakarta Timur</option>
                            <option value="Kota Jakarta Barat" @if ($data->kota == 'Kota Jakarta Barat')selected="selected"@endif>Kota Jakarta Barat</option>
                            <option value="Kota Jakarta Utara" @if ($data->kota == 'Kota Jakarta Utara')selected="selected"@endif>Kota Jakarta Utara</option>
                            <option value="Kota Jakarta Selatan" @if ($data->kota == 'Kota Jakarta Selatan')selected="selected"@endif>Kota Jakarta Selatan</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Kecamatan</label>
                          <select disabled="true" class="form-control select2" name="kecamatan" id="kecamatan">
                            <option value="0">Pilih Kecamatan</option>
                            @foreach ($kecamatans as $kecamatan)
                            <option value="{{$kecamatan->id}}" {{ ( $data->kecamatan_id == $kecamatan->id ) ? 'selected' : '' }}>{{$kecamatan->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Kelurahan</label>
                          <select disabled="true" class="form-control select2" name="kelurahan" id="kelurahan">
                            <option value="0">Pilih Kelurahan</option>
                            @foreach ($kelurahans as $kelurahan)
                            <option value="{{$kelurahan->id}}" {{ ( $data->kelurahan_id == $kelurahan->id ) ? 'selected' : '' }} >{{$kelurahan->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:black;">Alamat</label>
                          <textarea class="form-control" name="alamat">{{$data->alamat}}</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="account">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="color:black;">Dirujuk Oleh</label>
                          <select disabled="true" name="dirujuk_oleh" class="form-control select2">
                            <option value="">Pilih</option>
                            <option value="Inisiatif Pasien" @if ($data->dirujuk_oleh == 'Inisiatif Pasien')selected="selected"@endif>Inisiatif Pasien</option>
                            <option value="Klinik atau DPS" @if ($data->dirujuk_oleh == 'Klinik atau DPS')selected="selected"@endif>Klinik atau DPS</option>
                            <option value="Faskes" @if ($data->dirujuk_oleh == 'Faskes')selected="selected"@endif>Faskes</option>
                            <option value="RS" @if ($data->dirujuk_oleh == 'RS')selected="selected"@endif>RS</option>
                            <option value="Kader" @if ($data->dirujuk_oleh == 'Kader')selected="selected"@endif>Kader</option>
                            <option value="KPLDH" @if ($data->dirujuk_oleh == 'KPLDH')selected="selected"@endif>KPLDH</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Lokasi Anatomi Penyakit</label>
                          <select disabled="true" name="lokasi_anatomi_penyakit" class="form-control select2">
                            <option value="">Pilih</option>
                            <option value="Paru" @if ($data->lokasi_anatomi_penyakit == 'Paru')selected="selected"@endif>Paru</option>
                            <option value="Extra Paru" @if ($data->lokasi_anatomi_penyakit == 'Extra Paru')selected="selected"@endif>Extra Paru</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Total Skoring TB Anak</label>
                          <input readonly type="text" class="form-control" value="{{$data->total_skoring_tb_anak}}" name="total_skoring_tb_anak">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Foto Toraks</label>
                          <input readonly type="text" class="form-control" value="{{$data->foto_toraks}}" name="foto_toraks">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Status HIV</label>
                          <input readonly type="text" class="form-control" value="{{$data->status_hiv}}" name="status_hiv">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Riwayat Diabetes Melitus</label>
                          <input readonly type="text" class="form-control" value="{{$data->riwayat_diabetes_melitus}}" name="riwayat_diabetes_melitus">
                        </div>                      
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                          <label style="color:black;">A Sewaktu</label>
                          <input readonly type="text" class="form-control datepicker" value="{{$data->tanggal_a}}" name="tanggal_a">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">B Pagi</label>
                          <input readonly type="text" class="form-control datepicker" value="{{$data->tanggal_b}}" name="tanggal_b">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">C Sewaktu</label>
                          <input readonly type="text" class="form-control datepicker" value="{{$data->tanggal_c}}" name="tanggal_c">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Hasil A</label>
                          <input readonly type="text" class="form-control" value="{{$data->hasil_a}}" name="hasil_a">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Hasil B</label>
                          <input readonly type="text" class="form-control" value="{{$data->hasil_b}}" name="hasil_b">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Hasil C</label>
                          <input readonly type="text" class="form-control" value="{{$data->hasil_c}}" name="hasil_c">
                        </div>                        
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="address">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="color:black;">Tanggal Expert</label>
                          <input readonly type="text" class="form-control datepicker" value="{{$data->tanggal_expert}}" name="tanggal_expert">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Tanggal Mikroskopis</label>
                          <input readonly type="text" class="form-control datepicker" value="{{$data->tanggal_mikroskopis}}" name="tanggal_mikroskopis">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Hasil Expert</label>
                          <input readonly type="text" class="form-control" value="{{$data->hasil_expert}}" name="hasil_expert">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Tanggal Biakan</label>
                          <input readonly type="text" class="form-control datepicker" value="{{$data->tanggal_biakan}}" name="tanggal_biakan">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="color:black;">Hasil Biakan</label>
                          <input readonly type="text" class="form-control" value="{{$data->hasil_biakan}}" name="hasil_biakan">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">No. Reg. Lab</label>
                          <input readonly type="text" class="form-control" value="{{$data->no_reg_lab}}" name="no_reg_lab">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Tanggal Mulai Pengobatan</label>
                          <input readonly type="text" class="form-control  datepicker" value="{{$data->tanggal_mulai_pengobatan}}" name="tanggal_mulai_pengobatan">
                        </div>
                        <div class="form-group">
                          <label style="color:black;">Dirujuk Ke</label>
                          <input readonly type="text" class="form-control" value="{{$data->dirujuk_ke}}" name="dirujuk_ke">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:black;">Keterangan</label>
                          <textarea class="form-control" rows="4" name="keterangan">{{$data->keterangan}}</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="wizard-footer">
                    <div class="pull-right">
                        <input readonly type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                        <!-- <input readonly type='submit' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Finish' /> -->
                    </div>
                    <div class="pull-left">
                        <input readonly type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
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
        demo.initMaterialWizard();
        demo.initFormExtendedDatetimepickers();
    });
  var identitas = <?php echo $data->no_identitas_sediaan_dahak; ?>;
  if (identitas == '') {  
    $('#no_identitas_sediaan_dahak').val(kode_faskes);
  }
  $(function () {
    //Initialize Select2 Elements

  })
</script>
<script type="text/javascript">
   // $(function(){
    //Date picker
  // $(".datepicker").datepicker({ 
  //   days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],

  //   daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],

  //   daysMin: ['Mi', 'Sn', 'Sl', 'Rb', 'Km', 'Ju', 'Sa'],

  //   months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],

  //   monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],

  //   today: 'Hari ini',

  //   clear: 'Bersihkan',

  //   format: 'yyyy-mm-dd',

  //   titleFormat: 'MM yyyy',

  //   weekStart: 0,

  //   autoclose: true 
  // });
  //       $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
  //           var minValue = $(this).val();
  //           minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
  //           minValue.setDate(minValue.getDate()+1);
  //           $(".datepicker").datepicker( "option", "minDate", minValue );
  //       });
  //   });

  // $('.select2').select2();
        //Timepicker
    // $('.timepicker').timepicker({
    //   showInputs: false
    // });
    //iCheck for checkbox and radio inputs
    // $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    //   checkboxClass: 'icheckbox_minimal-blue',
    //   radioClass   : 'iradio_minimal-blue'
    // })
    // //Red color scheme for iCheck
    // $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    //   checkboxClass: 'icheckbox_minimal-red',
    //   radioClass   : 'iradio_minimal-red'
    // })
    // //Flat red color scheme for iCheck
    // $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    //   checkboxClass: 'icheckbox_flat-green',
    //   radioClass   : 'iradio_flat-green'
    // })
</script>
@endsection