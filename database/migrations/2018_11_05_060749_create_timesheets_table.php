<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_code_id')->signed();
            $table->integer('emp_id')->unsigned();
            $table->string('task');
            $table->date('timesheet_date');
            $table->timestamps();

            $table->foreign('emp_id')
             ->references('id')->on('employees')
            ->onDelete('cascade')->onupdate('cascade');

            $table->foreign('project_code_id')
             ->references('project_code')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
}
