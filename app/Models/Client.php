<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $fillable = ['Nom_Prenom','adresse_cli','num_tel','email_cli','type_de_client'];
    public function BoncommandeClient(){
        return $this->hasMany('App\Models\BoncommandeClient');
    }

}
