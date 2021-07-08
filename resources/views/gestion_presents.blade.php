

@extends('layout')

@section('page-title','GESTION DES PRESENTS')

@section('script')

@endsection

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
      <div class="card text-white bg-primary">
        <div class="card-header"><h5><i class="fa fa-user fa-2x"></i> PARTICIPANTS</h5>
        </div>
        <div class="card-body">
          <h1 class="card-title text-center" style="font-size: 3.5rem;font-weight:bold;">{{$presents->count()}}</h1>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
      <div class="card text-white bg-success">
        <div class="card-header"><h5><i class="fa fa-globe fa-2x"></i> PAYS PARTICIPANTS</h5>
        </div>
        <div class="card-body">
          <h1 class="card-title text-center" style="font-size: 3.5rem;font-weight:bold;">{{$p_pays->count()}}
          </h1>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
      <div class="card text-white bg-info">
        <div class="card-header"><h5><i class="fa fa-user-plus fa-2x"></i> MEMBRES AAE</h5>
        </div>
        <div class="card-body">
          <h1 class="card-title text-center" style="font-size: 3.5rem; font-weight:bold;">{{$members->count()}}</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-md-4 ">
      <button type="button" class="btn btn-lg btn-block btn-primary " data-toggle="modal" data-target="#import"><i class="fa fa-upload"></i> AJOUTER UNE LISTE
      </button>
    </div>
    <div class="col-md-4 ">
      <button type="button" class="btn btn-info btn-lg btn-block " data-toggle="modal" data-target="#exporter"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;&nbsp;EXPORTER LA LISTE
      </button>
    </div>
    <div class="col-md-4 ">
      <button type="button" class="btn btn-danger btn-lg btn-block " data-toggle="modal" data-target="#suprimer"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;SUPPRIMER LA LISTE
      </button>
    </div>
  </div>
</div>
<div class="container-fluid mt-5">
  <div class="row">
    <div class="alert alert-success col-md-12 text-center"><h3>LISTE DE PRESENCE</h3></div>
    <div class="col-md-12 ">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénoms</th>
            <th scope="col">Email</th>
            <th scope="col">Fonction</th>
            <th scope="col">Comté Spécial</th>
            <th scope="col">Pays</th>
            <th scope="col">Organisation</th>
            <th scope="col">Type Organisation</th>
            <th scope="col">Type Membre</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $row)
          <tr>
            <th scope="row">{{$row->id}}</th>
            <td>{{$row->nom}}</td>
            <td>{{$row->prenoms}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->fonction}}</td>
            <td>{{$row->sigle}}</td>
            <td>{{$row->libelle_pays}}</td>
            <td>{{$row->organisation}}</td>
            <td>{{$row->libelle_type_org}}</td>
            <td>{{$row->lib_typ_membre}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
        <div class="d-flex justify-content-center">
            {!! $data->links() !!}
        </div>

    </div>
  </div>
</div>


        
  
        <!------------------------------------------------------------
                      formulaire assise
          ------------------------------------------------------------->
          <!-- Modal -->

           <!------------------------------------------------------------
                      formulaire type organisation
          ------------------------------------------------------------->
          <!-- Modal -->
          <div class="modal fade" id="organisation" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="exampleModalScrollableTitle"><h3><i class="fa fa-calendar"></i> Ajouter uun type d'organisation</h3></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <form class="text-primary" action="{{route('add.org')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1"><strong>Type d'organisation</strong></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="saisir le type d'organisation à ajouter" name="libelle">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> Valider</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Abandonner</button>

                </div>
              </div>
            </div>
          </div>
          <!------------------------------------------------------------
                      formulaire import de liste
          ------------------------------------------------------------->
        <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title" id="exampleModalScrollableTitle"><h3><i class="fa fa-cloud"></i> Ajouter une liste de présence</h3></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <select name="id" class="form-control" required="">
                        <option value="">Choisir...</option>
                      @foreach($assise as $row)
                       <option value="{{$row->id}}">{{$row->titre}}</option>
                       @endforeach
                     </select><br>
                      
                      <input type="file" name="file" class="form-control" required="">
                      <br>
                      <button type="submit" class="btn btn-block btn-success">Importer la liste</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Quitter</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="exporter" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title" id="exampleModalScrollableTitle"><h3><i class="fa fa-download"></i> Liste de présence</h3></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('export.present') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <select name="id" class="form-control" required="">
                        <option value="">Choisir...</option>
                      @foreach($assise as $row)
                       <option value="{{$row->id}}">{{$row->titre}}</option>
                       @endforeach
                     </select><br>
                      <button type="submit" class="btn btn-block btn-success"><i class="fa fa-download"></i> Télécharger la liste</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Quitter</button>
                </div>
              </div>
            </div>
          </div>
           <!------------------------------------------------------------
                      formulaire type membre
          ------------------------------------------------------------->
          <!-- Modal -->
          <div class="modal fade" id="suprimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <form action="{{ route('delete.present') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalScrollableTitle"><h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Avertissement !!!</h3></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <select name="id" class="form-control" required="">
                        <option value="">Choisir...</option>
                      @foreach($assise as $row)
                       <option value="{{$row->id}}">{{$row->titre}}</option>
                       @endforeach
                     </select><br>
                  <h5>Voulez-vous supprimer tous les présents à cette assise ?</h5>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Oui, supprimer</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Non, Quitter</button>

                </div>
              </form>
              </div>
            </div>
          </div>
                  <!------------------------------------------------------------
                      formulaire comité specialisé
          ------------------------------------------------------------->
@endsection

@section('js')
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table2').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('gestion') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nom', name: 'nom'},
            {data: 'prenoms', name: 'prenoms'},
            {data: 'email', name: 'email'},
            {data: 'fonction', name: 'fonction'},
            {data: 'sigle', name: 'sigle'},
            {data: 'libelle_pays', name: 'libelle_pays'},
            {data: 'organisation', name: 'organisation'},
            {data: 'libelle_type_org', name: 'libelle_type_org'},
           {data: 'lib_typ_membre', name: 'lib_typ_membre'},
            
            
           // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endsection