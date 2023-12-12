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
        Schema::create('contrat_assurances', function (Blueprint $table) {
            $table->id();
            $table->date('date_début')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('remarque')->nullable();
            $table->unsignedBigInteger('voiture_id')->nullable();
            $table->foreign('voiture_id')->references('id')->on('voitures')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('etat');
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
        Schema::dropIfExists('contrat_assurances');
    }
};
