<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                                        //remplissage de la table client
        $rows = [];
        $addresses = ['Bizerte','Sfax','Sousse','Béja','Gafsa','Tunis'];
        for ($i=1; $i <11 ; $i++) { 
            $num_tel = strval(rand(50000000,59000000));
            $row = ['Nom_Prenom' => 'client'.strval($i), 'adresse_cli' => $addresses[rand(0,5)], 'num_tel' => $num_tel, 'email_cli' => 'client'.strval($i).'@gmail.com'];
            array_push($rows,$row);
        };
        DB::table('clients')->insert($rows);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
