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
            $table->id();
            // ! Attributs
            $table->string('code_prod');
            $table->string('designation');
            $table->string('description')->nullable();
            $table->integer('qte_prod')->default(0);
            $table->string('img_prod')->nullable();
            $table->integer('prix_prod');
            $table->integer('ancien_prix')->nullable();
            $table->boolean('en_promo')->nullable();
            // ! Clés étrangères
            $table->foreignId('id_cat')->references('id')->on('categories');
            $table->foreignId('id_sous_cat')->references('id')->on('sous_categories')->nullable();
            // ! Statistiques
            $table->timestamp('deleted_at')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->foreignId('created_by')->nullable();
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
