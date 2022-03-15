<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_promotions', function (Blueprint $table) {
            $table->id();
            // ! Clés étrangères
            $table->foreignId('id_prod')->references('id')->on('produits');
            $table->foreignId('id_promo')->references('id')->on('promotions');
            // ! Attributs
            $table->integer('qte_prod_promo');
            $table->integer('prix_prod_promo');
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
        Schema::dropIfExists('produit_promotions');
    }
}
