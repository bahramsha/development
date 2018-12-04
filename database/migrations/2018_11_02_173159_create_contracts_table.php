<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unique()->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('contract_type_name')->unsigned();
            $table->string('position');
            $table->integer('gross_salary');
            $table->string('currency');  
            $table->timestamps();

              $table->foreign('emp_id')
             ->references('id')->on('employees')
            ->onDelete('cascade')->onupdate('cascade');


            $table->foreign('contract_type_name')
             ->references('id')->on('contract_types')
            ->onDelete('cascade')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
