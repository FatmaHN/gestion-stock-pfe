
@extends('layouts.app')
@section('content')
<style>
* {
  box-sizing: border-box;
  
}

/* Style the search field */
form.example input[type=text] {
  
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  floats: left;
  width: 20%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  floats: left;
  width: 10%;
  padding: 10px;
  background: #6211c8;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
    <div class="container">
        
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4 > Liste de Fournisseurs</h4></div>
                        @if ($message = Session :: get ('msg')) 
                            <div class="alert alert-success">
                            {{$message}}
                            </div>
                        @endif

                        @if ($message = Session :: get ('mssg')) 
                            <div class="alert alert-success">
                            {{$message}}
                            </div>
                        @endif

                        
                    
                    <div class="card-body">
                        <a href="{{ url('/fournisseur/create') }}" class="btn bg-primary-transparent" title="Add New fournisseur">
                        <i class="fe fe-plus"></i>  Ajouter un nouveau Fournisseur
                        </a>  
                        <form action="{{ route('fournisseurSearch') }}" class="example"  method="POST" role="search">
                           @csrf
                           <div class="card-body">
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" placeholder="chercher.." name="fournisseurs">
                            <button type="submit"><i class="fe fe-search">Chercher</i></button>
                            </div>
                        </form>  
                     </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr class="table-primary text-center">
                                        <th>#</th>
                                        <th>Nom et prenom </th>
                                        <th>Adresse</th>
                                        <th>Numéro de téléphone</th>
                                        <th>Adresse Mail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-striped">
                                @foreach($fournisseurs as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nom_prenom }}</td>
                                        <td>{{ $item->adresse }}</td>
                                        <td>{{ $item->num_tel }}</td>
                                        <td>{{ $item->email }}</td>
 
                                        <td>
                                            <a href="{{ url('/fournisseur/' . $item->id) }}" title="Consulter fournisseur"><button class="btn btn-info"><i class="fe fe-eye" aria-hidden="true"> Consulter</i> </button></a>
                                            <a href="{{ url('/fournisseur/' . $item->id . '/edit') }}" title="Modifier fournisseur"><button class="btn btn-success"><i class="si si-pencil" aria-hidden="true"> Modifier</i> </button></a>
 
                                            <form method="POST" action="{{ url('/fournisseur' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger" title="Supprimer fournisseur" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fe fe-trash" aria-hidden="true"> Supprimer</i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection