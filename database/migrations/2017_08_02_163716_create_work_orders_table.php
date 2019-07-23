<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_laporan');
            $table->integer('user_id')->unsigned();
            $table->integer('merchant_id')->unsigned();
            $table->integer('service_point_id')->unsigned();
            $table->integer('admin_service_id')->unsigned();
            $table->string('supply_thermal');
            $table->string('mobile_operator');
            $table->string('type_komunikasi');
            $table->string('nomor_direct_line');
            $table->integer('respon_time_debit');
            $table->integer('respon_time_kredit');
            $table->integer('respon_time_prepaid');
            $table->integer('respon_time_loyalty');
            $table->string('kelengkapan_edc');
            $table->string('kelengkapan_dongle');
            $table->string('description');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->date('tanggal');
            $table->string('photo_toko');
            $table->string('photo_struk');
            $table->string('nama_pic');
            $table->string('no_telepon');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('service_point_id')->references('id')->on('service_points');
            $table->foreign('admin_service_id')->references('id')->on('admin_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_orders');
    }
}
