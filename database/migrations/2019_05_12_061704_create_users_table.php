<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('image_id')->unsigned()->index()->nullable();

            $table->string('email')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();

            $table->bigInteger('last_mounth_sales')->nullable();
            $table->bigInteger('last_mounth_pv')->nullable();

            $table->string('blog_url')->nullable();
            // $table->string('tw_url')->nullable();

            $table->boolean('ban')->nullable();

            $table->rememberToken();

            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');

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
        Schema::dropIfExists('users');
    }
}
