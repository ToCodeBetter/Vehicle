<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_user', function (Blueprint $table) {
            $table->increments('id');
            $table->char('user_name','60')->default('某人');
            $table->char('user_password','32')->default('e10adc3949ba59abbe56e057f20f883e');
            $table->integer('role_id')->default(3);
            $table->char('role_name','20')->default('user');
            $table->timestamps();
            $table->engine="innodb";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_user');
    }
}
