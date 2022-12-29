<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeePayrollsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeePayrolls',function (Blueprint $table){
            $table->string('personalEmployeeNumber')->unique('personalEmployeeNumber');
            $table->date('date')->nullable(false);
            $table->integer('dueSalary')->nullable(false);
            $table->integer('actualSalary')->nullable(false);
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
    }
}
