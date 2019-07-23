@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="header text-center" style="margin-top: -100px;">
        <h3>Dashboard {{$nama_faskes->nama_faskes->nama}}</h3>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons">weekend</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$satu}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i>
                        Jumlah Pasien TB Paru Terkonfirmasi Bakteriologis (BTA/biakan/tes cepat) Baru Diobati
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$dua}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Jumlah Pasien TB Paru Terdiagnosis Klinis (Paru BTA negatif,rontgen positif) Yang Diobati
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">child_care</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$tiga}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Jumlah Pasien TB Anak Yang Diobati
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$empat}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Jumlah Pasien TB Paru Terkonfirmasi Bakteriologis Baru yang Sembuh
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="yellow">
                    <i class="material-icons">beenhere</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$lima}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Jumlah Pasien TB Paru Terkonfirmasi Bakteriologis Baru yang Mendapatkan Pengobatan Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="purple">
                    <i class="material-icons">check</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$enam}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Jumlah Pasien TB Paru Terdiagnosis Klinis (Paru BTA negatif,rontgen positif) baru yang mendapatkan pengobatan lengkap
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons">refresh</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$tujuh}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i>Jumlah pasien TB kambuh
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$delapan}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Jumlah Pasien Terduga TB Paru (SUSPEK)
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="material-icons">priority_high</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$sembilan}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Jumlah pasien Gagal
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="yellow">
                    <i class="material-icons">warning</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$sepuluh}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i>Jumlah Pasien Putus Berobat
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="material-icons">hotel</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$sebelas}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Jumlah pasien Meninggal
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="purple">
                    <i class="material-icons">cancel</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$duabelas}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Jumlah Pasien Tidak Dievaluasi
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="material-icons">people</i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah</p>
                    <h3 class="card-title">{{$tigabelas}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Jumlah pasien TB Baru
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection