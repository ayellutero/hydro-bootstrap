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
        Schema::create('reports', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('emp_id');
            $table->string('station_id');
            $table->string('station_name');
            $table->string('location');
            $table->string('sensor_type');
            $table->date('date_assessed');
            $table->text('problem');
            $table->text('work_tdone');
            $table->date('last_data');
            $table->text('init_remarks');
            $table->date('date_visited');
            $table->text('actual_defects');
            $table->text('work_done');
            $table->text('part_replaced')->nullable();
            $table->text('tp_results')->nullable();
            $table->text('rc_performed')->nullable();
            $table->text('onsite_remarks');
            $table->string('conducted_by');
            $table->string('c_position');
            $table->string('noted_by')->nullable();
            $table->string('n_position')->nullable();
            $table->tinyInteger('if_approved')->default(0);
            $table->date('date_approved')->nullable();
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