@extends('layouts.app')
@section('content')
 
  <div class="card">
    <div class="card-header">Ajouter Client</div>
      @if ($message = Session :: get ('msg')) 
        <div class="alert alert-success">
        {{$message}}
        </div>
        @endif

      
    <div class="card-body">
        
        <form action="{{ url('client') }}" method="post" name="client"  >
          {!! csrf_field() !!}
          <label>Nom et Prénom</label>
          <input type="text" name="Nom_Prenom" id="Nom_Prenom" class="form-control" required=""><br>
          <label>Adresse</label></br>
          <input type="text" name="adresse_cli" id="adresse_cli" class="form-control" required=""></br>
          <label>Numére de téléphone</label></br>
          <input type="tel"  name="num_tel" id="num_tel" class="form-control" required=""></br>
          <label>Adresse E-mail</label></br>
          <input type="email" name="email_cli" id="email_cli" class="form-control" required=""></br>
          <input type="submit" value="Enregistrer" class="btn bg-primary-transparent"></br>
      </form>
    
    </div>
  </div>
  <script>
  </script>
 
@stop