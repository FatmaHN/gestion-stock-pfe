<?php

namespace App\Models;
use App\Models\BoncommandeClient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lignecommandeclient extends Model
{
    use HasFactory;
    protected $table = 'lignecommandeclients';
    protected $primaryKey = 'id';
    protected $fillable = ['boncommande_client_id','produit_id','designation','pu','qte','mont_Ht'];
    public function boncommande_clients(){
        return $this->hasMany('App\Models\BoncommandeClient','boncommande_client_id','id');
    }
        
    public function produits(){
        return $this->hasMany('App\Models\Produit');
    }
}

