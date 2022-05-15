<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BoncommandeClient extends Model
{
    use HasFactory;
    protected $table = 'boncommande_clients';
    protected $primaryKey = 'id';
    protected $fillable = ['desc','dat_com','dat_exp','client_id','statut'];
    public function client(){
        return $this->belongsTo('App\Models\Client');
    }
    public function lignecommandeclients() {
        return $this->hasMany('App\Models\lignecommandeclient');
    }
    
}
