<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            
            $clients = Client::where('type_de_client','=','fidele')->get();
          return view ('Client.index')->with('clients', $clients);
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::orderBy('Nom_Prenom')->get();
        return view('Client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $exist=Client::where("email_cli","=",$request->email_cli)->first();
       if($exist!=null)
       {
        return redirect('client')->with('msg', 'Email existe déja!');
       }
       $exist=Client::where("num_tel","=",$request->num_tel)->first();
       if($exist!=null)
       {
        return redirect('client')->with('mssg', 'numero existe déja!');
       }
       $input = $request->all();
        Client::create($input);
        return redirect('client')->with('msg', 'Client ajouté!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('Client.show')->with('clients', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('client.edit')->with('clients', $client);
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
        $client = Client::find($id); // Fournisseur est le nom de model
        $input = $request->all();
        $client->update($input);
        return redirect('client')->with('msg', 'Client modifié !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect('client')->with('msg', 'Client  supprimé avec succé!');
    }

    public function search(Request $request)
{
    $clients = $request->clients;

    $clients = Client::where('Nom_Prenom', 'like', '%'.$clients.'%')
        ->orderBy('nom_prenom')
        ->paginate(5);

    return view('Client.index')
        ->with('clients', $clients);    
}}
