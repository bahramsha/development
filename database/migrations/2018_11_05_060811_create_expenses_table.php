<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->integer('emp_id')->unsigned();
            $table->integer('project_code_id')->signed();
            $table->string('item_name');
            $table->date('expense_date');
            $table->integer('qty');
            $table->integer('price');
            $table->string('description');
            $table->string('currency');  
            $table->timestamps();
            $table->primary(['emp_id', 'project_code_id']);
        
            
            $table->foreign('emp_id')
             ->references('id')->on('employees')
            ->onDelete('cascade')->onupdate('cascade');

            $table->foreign('project_code_id')
             ->references('project_code')->on('projects');
            //emp_id primary key foriegn key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
