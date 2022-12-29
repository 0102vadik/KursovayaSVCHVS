<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffInformation',function (Blueprint $table){
            $table->string('personalEmployeeNumber')->unique('personalEmployeeNumber');
            $table->string('fullName',255)->nullable(false);
            $table->string('address',255)->nullable(false);
            $table->string('city',255)->nullable(false);
            $table->string('email',255)->nullable(false);
            $table->string('country',255)->nullable(false);
            $table->string('company',255)->nullable(false);
            $table->string('object',255)->nullable(false);
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
