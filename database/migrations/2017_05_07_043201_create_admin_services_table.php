<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('work_order_id');
            $table->integer('merchant_id')->unsigned();
            $table->integer('service_point_id')->unsigned();
            $table->text('description');
            $table->integer('status');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('service_point_id')->references('id')->on('service_points');
            $table->foreign('merchant_id')->references('id')->on('merchants');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_services');
    }
}
