<?php
//calcul du Montant Hors Taxe
$total_hors_taxe = 0;
foreach ($boncommande_clients->lignecommandeclients as $produit){
   $total_hors_taxe += $produit->qte * $produit->pu; 
}
$total_TTC = $total_hors_taxe + $total_hors_taxe * (19/100);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Receipt page - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container bootdey">
<div class="row invoice row-printable">
    <div class="col-md-10">
        <!-- col-lg-12 start here -->
        <div class="panel panel-default plain" id="dash_0">
            <!-- Start .panel -->
            <div class="panel-body p30">
                <div class="row">
                    <!-- Start .row -->
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="invoice-details mt25">
                            <div class="well">
                                <ul class="list-unstyled mb0">
                                    <li><strong>code de la commande :</strong>{{  $boncommande_clients->id }}</li>
                                    <li><strong>Date de confirmation :</strong> {{$boncommande_clients->dat_com}}</li>
                                    <li><strong>Date d'expiration :</strong>{{$boncommande_clients->dat_exp}}</li>
                                    <li><strong>Mode de paiement :</strong> <span class="label label-primary">éléctronique</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-to mt25">
                            <ul class="list-unstyled">
                                <li><strong>Envoyée à :</strong></li> 
                                <li>Nom et prénom : {{$boncommande_clients->Nom_Prenom ?? $client->Nom_Prenom }}</li>
                                <li>Téléhpone : {{$boncommande_clients->num_tel ?? $client->num_tel }}</li>
                                <li>Adresse : (216) {{$boncommande_clients->adresse_cli ?? $client->adresse_cli }}</li> 
                                <li>E-mail : {{$boncommande_clients->email_cli ?? $client->email_cli }}</li> 
                                
                            </ul>
                        </div>
                        <div class="invoice-items">
                            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="per70 text-center">Désignation</th>
                                            <th class="per5 text-center">Prix Unitaire</th>
                                            <th class="per5 text-center">Quantité</th>
                                            <th class="per25 text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($boncommande_clients->lignecommandeclients as $ligne)   
                                        <tr>
                                            <td class="text-center">{{$ligne->designation}}</td>
                                            <td class="text-center">{{$ligne->pu}}</td>
                                            <td class="text-center">{{$ligne->qte}}</td>
                                            <td class="text-center">{{$ligne->mont_Ht}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        
                                        <tr>
                                            
                                            <th colspan="3" class="text-right">Total Hors Taxe:</th>
                                            <th class="text-center">{{$total_hors_taxe}} DT</th>
                                        </tr>
                                        <tr>
                                            
                                            <th colspan="3" class="text-right">TVA:</th>
                                            <th class="text-center">{{$total_hors_taxe*(19/100)}} DT</th>
                                        </tr>
                                        <tr>
                                        
                                            <th colspan="3" class="text-right">Total TTC:</th>
                                            <th class="text-center">{{$total_TTC}} DT</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-footer mt25">
                            <p class="text-center">Tous les droits sont reservés <a href="javascript:;" onclick="window.print()" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p>
                        </div>
                    </div>
                    <!-- col-lg-12 end here -->
                </div>
                <!-- End .row -->
            </div>
        </div>
        <!-- End .panel -->
    </div>
    <!-- col-lg-12 end here -->
</div>
</div>

<style type="text/css">
body{
    margin-top:10px;
    background:#eee;    
}
</style>

<script type="text/javascript">

</script>
</body>
</html>