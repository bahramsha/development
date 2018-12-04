<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->integer('project_code');
            $table->string('project_name');
            $table->integer('project_type_id')->unsigned();
            $table->string('donar_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('project_cost');
            $table->string('currency');
            $table->primary('project_code');
            $table->timestamps();

             $table->foreign('project_type_id')
             ->references('id')->on('Project_types')
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
        Schema::dropIfExists('projects');
    }
}
