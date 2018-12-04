<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',128);
            $table->string('last_name',128);
            $table->string('phone',14)->nullable();
            $table->string('email')->unique();
            $table->string('gender');
             $table->date('date_of_birth')->nullable()->default(null);
            $table->string('image');
             //if it was 0 then female
            //if it was 1 then  male
            $table->integer('department_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->string('district',128);
            $table->text('location');
            
             
          
            $table->timestamps();

             $table->foreign('department_id')
             ->references('id')->on('departments')
            ->onDelete('cascade')->onupdate('cascade');


            $table->foreign('province_id')
             ->references('id')->on('provinces')
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
        Schema::dropIfExists('employees');
    }
}
