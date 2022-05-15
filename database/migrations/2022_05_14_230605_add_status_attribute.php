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
        Schema::table('boncommande_clients', function(Blueprint $table){
            $table->string('statut')->default('En préparation');
        });

        Schema::table('bon_commande_frs', function(Blueprint $table){
            $table->string('statut')->default('En préparation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
