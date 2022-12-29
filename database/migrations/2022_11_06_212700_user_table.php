<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users',function (Blueprint $table){
            $table->increments('id');
            $table->string('login',255)->nullable(false)->unique('login');
            $table->string('password',255)->nullable(false);
            $table->string('fullName',255)->nullable(false);
            $table->string('address',255)->nullable(false);
            $table->string('city',255)->nullable(false);
            $table->string('email',255)->nullable(false);
            $table->string('country',255)->nullable(false);
            $table->string('company',255)->nullable(false);
            $table->string('object',255)->nullable(false);
            $table->string('remember_token',100)->nullable(true);
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
        //
    }
}
