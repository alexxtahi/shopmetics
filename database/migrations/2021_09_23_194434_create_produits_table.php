<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id('id_prod');
            // ! Attributs
            $table->string('code_prod');
            $table->string('designation');
            $table->string('description')->nullable();
            $table->integer('qte_prod');
            $table->string('img_prod')->nullable();
            $table->integer('prix_prod');
            $table->integer('ancien_prix')->nullable();
            // ! Clés étrangères
            $table->integer('id_cat')->unsigned();
            $table->integer('id_sous_cat')->unsigned()->nullable();
            // ! Statistiques
            $table->dateTime('deleted_at')->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
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
        Schema::dropIfExists('produits');
    }
}
