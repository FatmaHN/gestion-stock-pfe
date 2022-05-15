
@extends('layouts.app')
@section('content')
<style>
 input,label{font-size: 15px;}
</style>
 						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0 text-primary">Modifier Client</h4>
							</div>
            </div>
<div class="card">
  <div class="card-header">Modifier Client </div>
      @if ($message = Session :: get ('msg')) 
        <div class="alert alert-success">
        {{$message}}
        </div>
      @endif
  <div class="card-body">
      
      <form action="{{ url('client/' .$clients->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$clients->id}}" id="id" />
        <label>Nom et Prénom</label></br>
        <input type="text" name="Nom_Prenom" id="Nom_Prenom" value="{{$clients->Nom_Prenom }}" class="form-control"></br>
        <label>Adresse</label></br>
        <input type="text" name="adresse_cli" id="adresse_cli" value="{{$clients->adresse_cli}}" class="form-control"></br>
        <label>Numéro de téléphone</label></br>
        <input type="text" name="num_tel" id="num_tel" value="{{$clients->num_tel}}" class="form-control"></br>
        <label>adresse E-mail</label></br>
        <input type="email" name="email_cli" id="email" value="{{$clients->email_cli}}" class="form-control"></br>
        <input type="submit" value="Modifier" class="btn bg-primary-transparent"></br>
    </form>
   
  </div>
</div>
 
@stop