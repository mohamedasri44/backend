<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activite_sda', function (Blueprint $table) {

            $table->foreignId('activite_id')->constrained();
            $table->foreignId('sda_id')->constrained();
            $table->dateTime('nature');
            $table->dateTime('operateur');
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
        Schema::dropIfExists('activite_sda');
    }
};
