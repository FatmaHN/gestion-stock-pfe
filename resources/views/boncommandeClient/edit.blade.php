@extends('layouts.app')
@section('content')
 
<div class="card">
  <div class="mt-5 text-center">
      <h1>Modifier ce Bon de commande</h1>
  </div>
    @if ($message = Session :: get ('msg')) 
      <div class="alert alert-success">
      {{$message}}
      </div>
    @endif
  <div class="card-body">
      
      <form action="{{ url('boncommandeclient/' .$bon_commande_client->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="" id="id" />
        <label>Description</label></br>
        <input type="text" name="desc" id="desc" value="" class="form-control"></br>
        <label>Date d'expiration</label></br>
        <input type="date" name="dat_exp" id="dat_exp" value="" class="form-control"></br>
        <label for="client_id" class="form-label">client</label>
        <select class="form-control @error('client_id') is-invalid @enderror" id="client_id" name="client_id" required="">
            @foreach($clients as $client)
                    value="{"{$client->id}}"
                <option value="{{$client->id}}" >{{ $client->Nom_Prenom }}</option>
            @endforeach
        </select>
        <div class="form-label">Changer l'etat de votre commande</div>
        <select class="mt-2 form-control @error('client_id') is-invalid @enderror" id="statut" name="statut" required="">
            <option value="En attente"> En préparation </option>
            <option value="Acceptée" > Acceptée </option>
            <option value="Envoyée" > Envoyée </option>
            <option value="Refusée" > Refusée </option>
        </select>
        <input type="submit" value="Update" class="my-2 btn btn-success"></br>
    </form>  
  </div>
</div>
@stop