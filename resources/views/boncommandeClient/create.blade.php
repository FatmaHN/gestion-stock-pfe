
@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ajouter Bon de commande client</h3>
            </div>
            <div class="card-body">
                <form id="submission" class="row g-2 needs-validation" novalidate action="{{ url('boncommandeclient/add') }}" method="post" >
                    @csrf
                    <div class="my-3 row">
                        <div class="col">
                            <label for="desc" class="form-label">Description</label>
                            <input type="text" name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror " value="{{ old('desc') }}" required="">
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="row mb-2">Choisir le type de  client</div>                            
                              <div class=" form-check">
                                  <input class="form-check-input" type="radio" name="checkclienttype" value="fidele" id="clientfidele" >
                                  <label class="form-check-label" for="clientfidele">
                                    Client Fidèle
                                  </label>
                              </div>
                              <div class=" form-check">
                                <input class="form-check-input" type="radio" name="checkclienttype" value="passager" id="clientpassager" >
                                <label class="form-check-label" for="clientpassager">
                                    Client passsager
                                </label>
                              </div>
                        </div>  
                    </div>
                    <div id="cliPassager" class="my-3">
                        <div class="my-3 row">
                            <div  class="row">
                              <div class="col">
                                <input type="text" class="form-control" name="Nom_Prenom" placeholder="Nom et prenom de client" aria-label="First name">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="email_cli" placeholder="Email du client" aria-label="Last name">
                              </div>
                            </div>
                        </div>
                        <div class="my-3 row">
                            <div class="row">
                              <div class="col">
                                <input type="text" class="form-control" name="adresse_cli" placeholder="Adresse de client" aria-label="First name">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="num_tel" placeholder="numéro de téléphone de client" aria-label="Last name">
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-3" id="cliFidele">
                        <label for="client_id" class="form-label">client</label>
                        <select class="form-control " id="client_id" name="client_id" required="">
                            <option value="" selected disabled hidden>Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}" >{{$client->id}} - {{ $client->Nom_Prenom }}</option>
                            @endforeach
                            <option value="NULL" selected disabled hidden>Select Client</option>
                        </select>
                        @error('client_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="my-3 row">
                        <div class="col">
                            <label for="dat_com" class="form-label">Date de création</label>
                            <input type="date" name="dat_com" id="dat_com" class="form-control @error('dat_com') is-invalid @enderror" required="">
                            @error('dat_com')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="col">
                            <label for="dat_exp" class="form-label">Date d'expiration</label>
                            <input type="date" name="dat_exp" id="dat_exp" class="form-control @error('dat_exp') is-invalid @enderror" required="">
                        </div>
                    </div>
                    <div style="display:none" id="err" class="text-center mb-2 invalid-feedback">S'il vous plait choisissez des dates valides</div>
                    <button  class="btn btn-primary" type="submit">Ajouter un bon de commande</button>          
                </form>
                <div id="alert" class="alert alert-success mt-2"></div>
                <a id="alertsuivre" class="text-center alert alert-primary my-2" href="/boncommandeclient{{$input->id ?? ''}}">
                    Vous pouvez suivre votre demande ici
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg>
                </a>
            </div>
        </div>
	</div>
 </div>
 <script>
        $(document).ready(function () {
            const prud ="La durée entre les deux dates doit etre au maximum 20 jours !";
            // To compare arrays directly
            const equals = (a,b) => JSON.stringify(a) === JSON.stringify(b)
            // To format date and month 
            function conversionArray(array){
                nouveauTab = []
                array.forEach(element =>{
                    nouveauTab.push(parseInt(element));
                });
                return nouveauTab; 
            };           
            const currentDate = new Date();
            const currentDay = currentDate.getUTCDate();
            const currentMonth = (currentDate.getMonth() + 1); // He count from 0
            const currentYear = currentDate.getFullYear();

            console.log($("#dat_com").val());
            var actualDate = [currentYear,currentMonth,currentDay]   
            $("#cliPassager").hide();
            $("#cliFidele").hide();
            $("#alert").hide();
            $("#alertsuivre").hide();
            $('#clientfidele').click(function (e) { 
                $("#cliFidele").show('slow');
                $("#cliPassager").hide('slow');
            });
            $('#clientpassager').click(function (e) { 
                $("#cliFidele").hide('slow');
                $("#cliPassager").show('slow');
            });
            $("#dat_com").click(function (e) { 
                e.preventDefault();
                $("#err").hide();
            });
            $("#dat_exp").click(function (e) { 
                e.preventDefault();
                $("#err").hide();
            });
            //tester la durée entre la date de confirmation et la date d'expiration
            $("#submission").submit(function (e) {
                e.preventDefault();
                var form_url = $(this).attr('action');
                var form_method = $(this).attr('method');
                var form_data = $(this).serialize();
                var date_exp = $("#dat_exp").val().split('-');
                var date_com = $("#dat_com").val().split('-');
                // console.log(conversionArray(date_com));
                // console.log(actualDate);
                console.log(equals(conversionArray(date_com),actualDate));
                var con1 = date_com[0] == date_exp[0];
                var diff = date_exp[1] - date_com[1]
                var con2 = diff < 2 && diff >= 0;
                if (date_com.length == 1 || date_exp.length == 1 || !con1 || !con2 || !equals(conversionArray(date_com),actualDate)) {
                    $("#err").show();
                    return 
                }
                if ((diff == 0 && (dat_exp[2]-date_com[2]) > 20) || (diff == 1 && (date_exp[2] - date_com[2] + 30 ) > 20) ) {
                    $("#err").text(prud);
                    $("#err").show();
                    return
                }
                $.ajax({
                    url : form_url,
                    type: form_method,
                    data: form_data
                }).done(function(response){
                    $("#alert").text(response['message']);
                    $("#alert").show();
                    $("#alertsuivre").show();
                })
            });
        });
    </script>
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush
@endsection
