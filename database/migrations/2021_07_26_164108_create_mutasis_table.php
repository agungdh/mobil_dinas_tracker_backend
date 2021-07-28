<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobil_id')->nullable()->constrained();
            $table->softDeletes();
            $table->timestamps();

            $table->unsignedBigInteger('dari_skpd_id')->nullable();
            $table->foreign('dari_skpd_id')->references('id')->on('skpds');

            $table->unsignedBigInteger('ke_skpd_id');
            $table->foreign('ke_skpd_id')->references('id')->on('skpds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasis');
    }
}
