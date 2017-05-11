<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_id');
            // $table->foreign('device_id')->references('device_id')->on('stations')->onDelete('cascade');
            $table->string('station_id');
            // $table->foreign('station_id')->references('station_id')->on('reports')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('station_reports');
    }
}
