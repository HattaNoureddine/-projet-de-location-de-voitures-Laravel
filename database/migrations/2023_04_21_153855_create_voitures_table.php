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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nom');
            $table->string('immatruculation');
            $table->date('module');
            $table->date('année_achat');
            $table->decimal('prix_achat');
            $table->integer('nbr_place');
            $table->decimal('prix');
            $table->integer('prix_promotion')->default(0);
            $table->string('etat')->default('despo');

            $table->unsignedBigInteger('marque_id');
            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('categorie_id')->unsigned();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('typemoteur_id')->unsigned();
            $table->foreign('typemoteur_id')->references('id')->on('typemoteurs')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('voitures');
    }
};
