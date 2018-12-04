<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unsigned();
            $table->date('request_date');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('reason');
            $table->string('approve');
            $table->timestamps();

             $table->foreign('emp_id')
             ->references('id')->on('employees')
            ->onDelete('cascade')->onupdate('cascade');
        });
    }
        /////////->default(0)->nullable()/////
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_requests');
    }
}
