@extends('layouts.app') <!-- Nom de dossier qui contients les vues et le nom de fichier layout -->
@section('content') 
  <div class="card">
    <div class="mt-5 p-3 fs-3 mx-5 bg-secondary">
      <div class=" text-center">
        Détails de cette commande client
      </div>
    </div>
  </div>
  <div class="mx-2 row">
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Code de la commande
          </div>
          <div class="card-body"> 
            <h5 class="card-title">{{ $bon_commande_client->id   }}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Description
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $bon_commande_client->desc   }}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Client
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $bon_commande_client->Client->Nom_Prenom ??  $bon_commande_client->Nom_Prenom  }}</h5>
          </div>
        </div>
      </div>
  </div>
  <div class="row mx-2">
  <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Date de confirmation
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $bon_commande_client->dat_com   }}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Date d'expiration
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $bon_commande_client->dat_exp }}</h5>
          </div>
        </div>
      </div>
  </div>
@endsection