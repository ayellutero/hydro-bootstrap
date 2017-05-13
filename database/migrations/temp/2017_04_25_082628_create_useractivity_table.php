<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseractivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activities', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->string('employee_name');
            $table->string('position');             
            $table->text('activity');
            $table->date('sent_at_date');//->nullable();
            $table->time('sent_at_time');//->nullable();
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
        Schema::dropIfExists('user_activities');
    }
}
