@extends('layouts.app') <!-- Nom de dossier qui contients les vues et le nom de fichier layout -->
@section('content') 
<div class="card">
    <div class="mt-5 p-3 fs-3 mx-5 bg-secondary">
      <div class=" text-center">
        Détails de cette commande fournisseur
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
            <h5 class="card-title">{{ $bon_commande_frs->id   }}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Description
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $bon_commande_frs->desc   }}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Client
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $bon_commande_frs->fournisseur->nom_prenom ??  $bon_commande_frs->fournisseur->nom_prenom  }}</h5>
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
            <h5 class="card-title">{{ $bon_commande_frs->dat_com   }}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Date d'expiration
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $bon_commande_frs->dat_exp }}</h5>
          </div>
        </div>
      </div>
  </div>
@endsection