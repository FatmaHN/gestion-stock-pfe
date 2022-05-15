<?php

namespace App\Http\Controllers;
use App\Models\LigneCommande;
use App\Models\BonCommandeFrs;
use App\Models\Fournisseur;
use App\Mail\contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\BoncommandeClient;
use App\Models\Client;
use App\Models\lignecommandeclient;
use Illuminate\Support\Arr;

class GenerateController extends Controller
{
    public function display($id)
    {
        $bon_commande_frs = BonCommandeFrs::find($id);
        $fournisseur = Fournisseur::find($bon_commande_frs['fournisseur_id']);
        $ligne_commandes = BonCommandeFrs::with('lignes_commandes')->find($id)->lignes_commandes;
        return view('display',compact('bon_commande_frs'),compact('ligne_commandes'),compact('fournisseur'));
    }

    public function displayclient($id)
    
    {
        $boncommande_clients = BoncommandeClient::find($id);
        $client=$boncommande_clients->client;
        if ($client == NULL) {
            $client = Client::find($boncommande_clients['client_id']);
        }     
        return view('displayclient',compact('boncommande_clients'),compact('client'));
    }

    public function sendToFournisseur($id)
    {
        $FournisseurMail = BonCommandeFrs::find($id)->Fournisseur->email;
        $commandeDetails = $this->CommandDetails($id);
        $commandeDetails['type'] = 0 ; // 0 c'est à dire commande à un fournisseur
        Mail::to($FournisseurMail)
        ->send(new contact($commandeDetails));      
        BonCommandeFrs::find($id)->update(['statut' => 'Envoyée']);
        return redirect('/generate/'.$id);
    }

    public function sendToClient($id) 
    
    {
        $ClientMail = BoncommandeClient::find($id)->Client->email_cli;
        $commandeDetails['client'] = BoncommandeClient::find($id)->Client;
        $commandeDetails['commandeDetails'] = BoncommandeClient::find($id);
        $ligne_commandes = BoncommandeClient::find($id)->lignecommandeclients;
        $commandeDetails['lignecommandeclients'] = $ligne_commandes;
        $commandeDetails['type'] = 1 ;// 1 c'est à dire une commande à un client
        Mail::to($ClientMail)
        ->send(new contact($commandeDetails));      
        BoncommandeClient::find($id)->update(['statut' => 'Envoyée']);
        return redirect('/generateclient/'.$id);
    }

    /**
     * Get the command details
     * 
     * @param int $id 
     * @return array
     */

    private function CommandDetails($id): array    
    {
        $bon_commande_frs = BonCommandeFrs::find($id);
        $fournisseur = Fournisseur::find($bon_commande_frs['fournisseur_id']);
        $ligne_commandes = BonCommandeFrs::with('lignes_commandes')->find($id)->lignes_commandes;
        $commandeAttributes = ['id','desc','dat_com','dat_exp'];
        $fournisseurAttributes = ['nom_prenom','adresse','num_tel','email'];
        $commandeDetails = [];
        foreach ($commandeAttributes as $value) {
            $commandeDetails[$value] = $bon_commande_frs->$value; 
        };
        $commandeDetails['fournisseurDetails']=[];
        foreach ($fournisseurAttributes as $value) {
            $commandeDetails['fournisseurDetails'][$value] = $fournisseur->$value;
        };
        $commandeDetails['lignes_commandes']= [];
        foreach ($ligne_commandes as $value) {
            array_push($commandeDetails['lignes_commandes'],$value);
        }
        return $commandeDetails;
    }
}