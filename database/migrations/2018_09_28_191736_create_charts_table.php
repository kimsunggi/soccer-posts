<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('question');
            $table->string('choice1',30);
            $table->string('choice2',30);
            $table->string('choice3',30)->nullable();
            $table->string('choice4',30)->nullable();
            $table->string('choice5',30)->nullable();
            $table->string('choice6',30)->nullable();
            $table->string('choice7',30)->nullable();
            $table->string('choice8',30)->nullable();
            
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charts');
    }
}
