

@extends('layout')

@section('page-title','GESTION DE FORMULAIRE')

@section('script')

@endsection

@section('content')

<div class="container-fluid">
  <div class="row d-flex justify-content-center mb-5 mt-5">
    <div class="col-lg-12 d-flex justify-content-center align-self-center">
      <div id="accordion" style=" width:100%;">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h4>Gestion des Assises @if($assise->count() > 1)
              <span class="badge badge-danger badge-pill">{{$assise->count()}} Assises</span>
               @else
              <span class="badge badge-danger badge-pill">{{$assise->count()}} Assise</span>
              @endif</h4>
              </button>
            </h5>
          </div>
          <div class="card-body">
              <button type="button" class="btn btn-primary btn-lg btn-block col-lg-6 offset-lg-3" data-toggle="modal" data-target="#assise">
                      <i class="fa fa-calendar"></i> Programmer une assise
              </button>
                    <br>
              <table class="table">
                <thead class="thead">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Thème</th>
                    <th scope="col">Date Debut</th>
                    <th scope="col">Date Fin</th>
                    <th scope="col">Période</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($assise as $row)
                  <tr class="text-primary">
                    <th scope="row">{{$row->id}}</th>
                    <td>{{$row->titre}}</td>
                    <td>{{$row->theme}}</td>
                    <td>{{$row->date_debut}}</td>
                    <td>{{$row->date_fin}}</td>
                    <td>{{$row->periode}}</td>
                    <td><a class="btn btn-primary" href="/edit_assise/{{$row->id}}"><i class="fa fa-edit"></i>Modifier</a></td>
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

        
  
        <!------------------------------------------------------------
                      formulaire assise
          ------------------------------------------------------------->
          <!-- Modal -->
          <div class="modal fade" id="assise" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="exampleModalScrollableTitle"><h3><i class="fa fa-calendar"></i> Ajouter une assise</h3></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <form class="text-primary" action="{{Route('assise')}}" method="POST">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1"><strong>TITRE</strong></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titre intégrale de l'assise à programmer" name="titre">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"><strong>THEME</strong></label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Entrer le thème de l'assise" name="theme"></textarea>
                      
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                          <label for="exampleInputPassword1"><strong>DATE DEBUT</strong></label>
                          <input type="date" class="form-control" name="debut">
                        </div>
                        <div class="col">
                          <label for="exampleInputPassword1"><strong>DATE FIN </strong></label>
                          <input type="date" class="form-control" name="fin">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"><strong>PERIODE CORRESPONDANTE A L'ASSISE</strong></label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="La période correspondante à l'assise" name="periode">
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
                  <h5 class="modal-title" id="exampleModalScrollableTitle"><h3><i class="fa fa-cloud"></i> Liste de présence</h3></h5>
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
           <!------------------------------------------------------------
                      formulaire comité spécialisé
          ------------------------------------------------------------->
        <div class="modal fade" id="cs" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title" id="exampleModalScrollableTitle"><h3><i class="fa fa-user-plus"></i> Ajout de comité spécialisé</h3></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <form class="text-info" action="{{route('add.cs')}}" method="post">
                   @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1"><strong>Comité spécialisé</strong></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez saisir comité spécialisé" name="libelle">
                      <small id="emailHelp" class="form-text text-danger">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputEmail1"><strong class="text-info">Affecter une Assise</strong></label>
                     <select name="id_assise" class="form-control">
                      @foreach($assise as $row)
                       <option value="{{$row->id}}">{{$row->titre}}</option>
                       @endforeach
                     </select>
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
                      formulaire type membre
          ------------------------------------------------------------->
          <!-- Modal -->
          <div class="modal fade" id="membre" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title" id="exampleModalScrollableTitle"><h3><i class="fa fa-user"></i> Ajout type de membre</h3></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <form class="text-info" action="{{route('add.membre')}}" method="post">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1"><strong>Type de membre</strong></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez saisir le type de membre" name="libelle">
                      <small id="emailHelp" class="form-text text-danger">Veuillez entrer le type de membre que vous désirez ajouter à ceux existants déjà</small>
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
                      formulaire comité specialisé
          ------------------------------------------------------------->
@endsection

@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endsection