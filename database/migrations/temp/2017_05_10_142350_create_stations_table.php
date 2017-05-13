<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id')->unsigned()->unique();
            $table->string('province');
            $table->string('location');
            $table->float('lat');
            $table->float('lng');
            $table->string('type');
            $table->string('sim');
            $table->string('status');
            $table->float('elevation')->nullable();
            $table->date('date_deployed')->nullable();
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
        Schema::dropIfExists('stations');
    }
}