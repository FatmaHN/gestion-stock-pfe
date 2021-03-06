<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@extends('layouts.app')
@section('content')
<body>
<div class="container mt-2">
    <div class="text-center m-2 row">
        <div class="col-md-12 text-center font-weight-bold">
          <h2 class="mt-5 text-center">L'Apport De Stock</h2>
        </div>
        <div class="col-md-12 my-3 "><button type="button" id="addNewBook" class="btn fs-6 btn-success">Ajouter un apport de stock</button></div>
        <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="fs-4" scope="col"></th>
                  <th class="fs-4" scope="col">Produit</th>
                  <th class="fs-4" scope="col">Quantité</th>
                  <th class="fs-4" scope="col">Date</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($inputs as $input)
                <tr>
                  <th>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-success bi-arrow-down-up" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                  </th>
                  <td>{{ $input->produit->designation}}</td>
                  <td>{{ $input->qte }}</td>
                  <td>{{ $input->date}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>    
</div>
<!-- boostrap model -->
    <div class="modal fade" id="ajax-book-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          </div>
          <div class="modal-body">
          
            <form  class="form-horizontal" novalidate action="{{ url('add') }}" method="post">
              @csrf
              <div class="col">
                  <label for="produit_id" class="form-label">Produits</label>
                  <select class="form-control @error('produit_id') is-invalid @enderror" id="produit_id" name="produit_id" required="">
                      @foreach($produits as $produit)
                          <option value="{{$produit->id}}" >{{$produit->designation}}</option>
                      @endforeach
                  </select>
                  @error('produit_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Quantité</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="qte" name="qte" placeholder="Entrer quantité" value="" required="">
                </div>
              </div>
              <div class="col">
                <label for="date" class="form-label">Date de transfert</label>
                <input type="date" name="date" id="date" class="form-control" required="">
              <div class="text-center m-5">
                <button type="submit" class="text-center btn btn-primary" id="btn-save" value="addNewBook">Save changes</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
<script type="text/javascript">
    $('#addNewBook').click(function () {
       $('#addEditBookForm').trigger("reset");
       $('#ajaxBookModel').html("Add Book");
       $('#ajax-book-model').modal('show');
    });

</script>
@endsection