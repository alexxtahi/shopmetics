<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_tags', function (Blueprint $table) {
            $table->id();
            // ! Clés étrangères
            $table->foreignId('id_prod')->references('id')->on('produits');
            $table->foreignId('id_tag')->references('id')->on('tags');
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
        Schema::dropIfExists('produit_tags');
    }
}
