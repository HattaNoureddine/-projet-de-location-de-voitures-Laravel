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
        Schema::create('compagnie_assurances', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('addresse');
            $table->integer('tel');
            $table->string('email');
            $table->string('remarque');
            $table->unsignedBigInteger('ville_id')->nullable();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('compagnie_assurances');
    }
};
