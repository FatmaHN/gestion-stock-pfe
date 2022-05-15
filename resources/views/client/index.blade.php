
@extends('layouts.app')
@section('content')

    <div class="container">
        
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h6> Liste de Clients</h6></div>
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
                        <a href="{{ url('/client/create') }}" class="btn bg-primary-transparent" title="Add New client">
                        <i class="fe fe-plus"></i>  Ajouter un nouveau Client
                        </a>   
                        <form action="{{ route('clientSearch') }}" method="POST" class="form form-inline" role="search">
                        @csrf
                        <div class="card-body">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                            <input type="text" name="clients" class="form-control" placeholder="client"> 
                            <button type="submit" class="btn btn-primary">Chercher</button>
                        </div>
                        </form>
                            
                        
                    </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom et prenom </th>
                                        <th>Adresse</th>
                                        <th>Numéro de téléphone</th>
                                        <th>Adresse Mail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Nom_Prenom }}</td>
                                        <td>{{ $item->adresse_cli }}</td>
                                        <td>{{ $item->num_tel }}</td>
                                        <td>{{ $item->email_cli }}</td>
 
                                        <td>
                                            <a href="{{ url('/client/' . $item->id) }}" title="Consulter client"><button class="btn bg-info-transparent"><i class="fe fe-eye" aria-hidden="true"></i> Consulter</button></a>
                                            <a href="{{ url('/client/' . $item->id . '/edit') }}" title="Modifier client"><button class="btn bg-primary-transparent"><i class="si si-pencil" aria-hidden="true"></i> Modifier</button></a>
 
                                            <form method="POST" action="{{ url('/client' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn bg-danger-transparent" title="Supprimer client" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fe fe-trash" aria-hidden="true"></i> Supprimer</button>
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