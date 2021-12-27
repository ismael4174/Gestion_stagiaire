@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Postulants</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des postulants</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
						<div class="btn-group">
						<a href="{{url('postulant/create')}}"><button type="button" class="btn btn-outline-primary">Ajouter un postulant</button></a>
							</button>
						</div>
				</div>
                
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Liste des postulants</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:5%">Id Postulant</th>
                                    <th>Filière</th>
                                    <th>Type de stage</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse mail</th>
                                    <th>Sexe</th>
                                    <th>Date de naissance</th>
                                    <th>Nationalité</th>
                                    <th>CV</th>
                                    <th>DM</th>
                                    <th>Admissibilté</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($postulants as $postulant)
                                <tr>
                                    <td>{{$postulant->id}}</td>
                                    <td>{{$postulant->nom_fil}}</td>
                                    <td>{{$postulant->nom_tstage}}</td>
                                    <td>{{$postulant->nom_post}}</td>
                                    <td>{{$postulant->pren_post}}</td>
                                    <td>{{$postulant->adress_post}}</td>
                                    <td>{{$postulant->sexe_post}}</td>
                                    <td>{{$postulant->naiss_post}}</td>
                                    <td style="text-transform:uppercase">{{$postulant->nation_post}}</td>
                                    <td>{{asset('document/cv').'/'.$postulant->cv_post}}</td>
                                    <td>{{asset('document/demande').'/'.$postulant->demande_post}}</td>
                                    <td>{{asset('document/admission').'/'.$postulant->admission_post}}</td>
                                    <td style="text-align:center;">
                                    <a href="{{ url('liste-demande') }}"><button type="button" class="btn btn-primary px-2 radius-30">Voir Demande</button> </a>
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
    <!--end page wrapper -->
    @endsection

@section("script")
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
      } );
</script>

@endsection