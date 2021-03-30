<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CretaProgramtourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour', function (Blueprint $table) {
            $table->id();
            $table->string('tour_name');
            $table->string('status');
            $table->dateTime('pay_date');
            $table->dateTime('start_round');
            $table->dateTime('end_round');
            $table->integer('tour_price');
            $table->integer('num_people');
            $table->string('country');
            $table->string('city');
            $table->string('note');
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
        Schema::dropIfExists('tour');
    }
}
