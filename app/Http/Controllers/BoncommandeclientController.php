<?php

namespace App\Http\Controllers;

use App\Models\BoncommandeClient;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;

class BoncommandeclientController extends Controller
{
    public function index()
    
    {
        $clients = Client::all();
        $bon_commande_client = BoncommandeClient::all();
        // dd($bon_commande_client['7']->Client->Nom_Prenom);
        return view ('boncommandeclient.index',compact('clients'),compact('bon_commande_client'));
    }
    public function create()
    {
        $clients = Client::where('type_de_client','=','fidele')->get();
        
        return view('boncommandeclient.create', compact('clients'));
    }
    public function store(Request $request)
    {   
        $data1 = array(   
            'desc'=>$request->desc,
            'client_id'=>$request->client_id,
            'dat_com'=>$request->dat_com,
            'dat_exp'=>$request->dat_com,
        );
        $data2 = array(     
            'Nom_Prenom'=>$request->Nom_Prenom,
            'adresse_cli'=>$request->adresse_cli,
            'num_tel'=>$request->num_tel,
            'email_cli'=>$request->email_cli,
            'type_de_client'=>$request->checkclienttype,
        );
        if ($data2["type_de_client"] == 'fidele'){
            
            BoncommandeClient::create($data1);
        }
        if ($data2["type_de_client"] == 'passager'){
            $client=client::create($data2);
            $data1['client_id']=$client['id'];
            BoncommandeClient::create($data1);
        }
        
        return response()->json(['message' => "Votre bon de commande a bien passée ",$data1]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bon_commande_client = BoncommandeClient::find($id);
        return view('boncommandeclient.show')->with('bon_commande_client', $bon_commande_client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bon_commande_client = BoncommandeClient::find($id);
        $clients = Client::all();
        return view('boncommandeclient.edit',compact('bon_commande_client'),compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bon_commande_client = BoncommandeClient::find($id); // Bon_commande_frs est le nom de model   
        $input = $request->all();
        $ValidateInput = [];
        foreach ($input as $key => $value) {
            if ($value != null) {
                $ValidateInput[$key] = $value;
            };
        }
        $bon_commande_client->update($ValidateInput);
        return redirect('/boncommandeclient')->with('msg', 'Commande modifiée avec succé !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BoncommandeClient::destroy($id);
        return redirect('/boncommandeclient')->with('msg', 'Commande supprimée avec succé!');
    }
}
