<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NeedEmployeeMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needForStaff',function (Blueprint $table){
            $table->string('company',255)->nullable(false);
            $table->date('date')->nullable(false);
            $table->integer('colNeedForStaff')->nullable(false);
            $table->primary(['company', 'date']);
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
