<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBesoinClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('besoin_clients', function (Blueprint $table) {
            $table->id();
            // ! Clés étrangères
            $table->foreignId('id_besoin')->references('id')->on('besoins');
            $table->foreignId('id_client')->references('id')->on('clients');
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
        Schema::dropIfExists('besoin_clients');
    }
}
