<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegisterLaboratorium extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_laboratoriums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faskes_id');
            $table->integer('dokter_id')->unsigned();
            $table->integer('pasien_id')->unsigned();
            $table->date('tanggal_pengambilan_dahak_terakhir');
            $table->date('tanggal_pengiriman_sediaan');
            $table->string('alasan_pemeriksaan');
            $table->string('pemeriksaan_ulang_pengobatan');
            $table->string('pemeriksaan_ulang_pasca_pengobatan');
            $table->string('no_Reg_tb_or_tb_MDR_Faskes');
            $table->string('no_Reg_tb_or_tb_MDR_Kab/Kota');
            $table->string('jenis_terduga');
            $table->string('jenis_dan_jumlah_pemeriksaan');
            $table->string('klasifikasi_penyakit');
            $table->string('lokasi');
            $table->string('status_hiv');
            $table->string('tipe_spesimen');
            $table->string('nanah_lendir_1');
            $table->string('nanah_lendir_2');
            $table->string('nanah_lendir_3');
            $table->string('bercak_darah_1');
            $table->string('bercak_darah_2');
            $table->string('bercak_darah_3');
            $table->string('air_liur_1');
            $table->string('air_liur_2');
            $table->string('air_liur_3');
            $table->date('tanggal');
            $table->string('nama_jelas_dokter_pengirim');
            $table->date('tanggal_hasil_sewaktu_1');
            $table->date('tanggal_hasil_sewaktu_2');
            $table->date('tanggal_hasil_sewaktu_3');
            $table->string('+++_sewaktu_1');
            $table->string('++_sewaktu_1');
            $table->string('+_sewaktu_1');
            $table->string('1-9_sewaktu_1');
            $table->string('neg_sewaktu_1');
            $table->string('+++_sewaktu_2');
            $table->string('++_sewaktu_2');
            $table->string('+_sewaktu_2');
            $table->string('1-9_sewaktu_2');
            $table->string('neg_sewaktu_2');
            $table->string('+++_sewaktu_3');
            $table->string('++_sewaktu_3');
            $table->string('+_sewaktu_3');
            $table->string('1-9_sewaktu_3');
            $table->string('neg_sewaktu_3');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dokter_id')->references('id')->on('dokters');
            $table->foreign('pasien_id')->references('id')->on('tb_06s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_laboratoriums');
    }
}
