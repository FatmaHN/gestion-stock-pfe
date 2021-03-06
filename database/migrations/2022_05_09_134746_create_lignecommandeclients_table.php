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
        Schema::create('lignecommandeclients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Boncommande_client_id')->nullable();
            $table->foreign('Boncommande_client_id')->references('id')->on('boncommande_clients')->onDelete('set null')->onUpdate('set null');
            $table->unsignedBigInteger('produit_id')->nullable();
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('set null')->onUpdate('set null');
            $table->string('designation');
            $table->float('pu');
            $table->integer('qte');
            $table->integer('mont_Ht')->default(0);
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
        Schema::dropIfExists('lignecommandeclients');
    }
};
