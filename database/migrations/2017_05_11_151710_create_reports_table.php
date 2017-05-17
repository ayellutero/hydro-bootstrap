<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('main_reports', function(Blueprint $table)
        {
            $table->increments('id');
            // $table->string('emp_id');
            $table->string('station_id');
            $table->string('station_name');
            $table->string('location');
            $table->string('sensor_type');

            // Pre-repair
            $table->date('monitoring_date');
            $table->text('init_findings');
            $table->date('last_data');
            $table->text('assessed_by');
           
            // Post repair
            $table->date('onsite_date');
            $table->text('actual_findings');
            $table->text('work_done');
            $table->text('part_installed');
            $table->string('status');
            $table->string('conducted_by');

            // Verified by
            $table->string('supervisor');
            $table->string('designation');

            $table->tinyInteger('if_verified')->default(0);
            $table->date('verified_date')->nullable();
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
        Schema::dropIfExists('reports');
    }
}