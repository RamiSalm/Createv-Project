<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pations', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('number');
            $table->string('address');
            $table->string('img');
            $table->string('username');
            $table->string('pass');
            $table->string('resault');
            $table->string('age');
            
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('pations');
    }
}
