

@extends('layout')

@section('page-title','ANALYSE DES ASSISES')

@section('script')


@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 pr-2 mb-3">
      <a type="button" href="{{route('extractall')}}" class="btn btn-primary btn-lg btn-block col-lg-6 offset-lg-3" ><i class="fa fa-print"></i> Extraire toutes les assises
      </a>
            <br>
      <div class="card">
        <div class="card-collapsible card">
          <div class="card-header"> <i class="fa fa-th-list"></i><h5 class="text-primary">LISTE DES ASSISES</h5><span class="badge badge-danger badge-pill">{{$assise->count()}}</span>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead class="thead">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Titre</th>
                  <th scope="col">thème</th>
                  <th scope="col" colspan="2" class="text-center"><i class="fa fa-print"></i> Actions</th>

                </tr>
              </thead>
              <tbody>
                @foreach($assise as $row)
                <tr class="text-primary">
                  <th scope="row">{{$row->id}}</th>
                  <td>{{$row->titre}}</td>
                  <td>{{$row->theme}}</td>
                  <td>
                     <form action="{{(Route('assise_id'))}}" method="POST">
                      @csrf
                      <input type="hidden" value="{{$row->id}}" name="id_assise">
                      <button type="submit" class="btn btn-outline-primary"><i class="fa fa-eye"></i> Voir les statistiques</button>
                  </form>
                    </td>
                  <td> 
                    <form action="{{(Route('extract'))}}" method="POST">
                      @csrf
                      <input type="hidden" value="{{$row->id}}" name="assise">
                      <button type="submit" class="btn btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i> Extraire tout</button>
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
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrer le thème de l'assise" name="theme">
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