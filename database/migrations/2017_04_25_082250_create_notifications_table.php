<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('notifications', function(Blueprint $table)
        {
            $table->increments('notif_id');
            $table->integer('receiver_id')->unsigned();
            $table->string('sender_id');             
            $table->string('message');
            $table->boolean('is_read')->default(0);
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
        //
        Schema::dropIfExists('notifications');
    }
}
