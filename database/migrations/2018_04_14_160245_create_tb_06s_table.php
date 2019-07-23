<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTb06sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_06s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('bpjs');
            $table->bigInteger('umur');
            $table->string('jenis_kelamin');
            $table->longText('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('no_identitas_sediaan_dahak');
            $table->date('tanggal_didaftar');
            $table->string('dirujuk_oleh');
            $table->string('lokasi_anatomi_penyakit');
            $table->string('total_skoring_tb_anak');
            $table->string('foto_toraks');
            $table->string('status_hiv');
            $table->string('riwayat_diabetes_melitus');
            $table->date('tanggal_a');
            $table->date('tanggal_b');
            $table->date('tanggal_c');
            $table->date('tanggal_mikroskopis');
            $table->string('hasil_a');
            $table->string('hasil_b');
            $table->string('hasil_c');
            $table->date('tanggal_expert');
            $table->string('hasil_expert');
            $table->date('tanggal_biakan');
            $table->string('hasil_biakan');
            $table->string('no_reg_lab');
            $table->date('tanggal_mulai_pengobatan');
            $table->string('dirujuk_ke');
            $table->longText('keterangan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_06s');
    }
}
