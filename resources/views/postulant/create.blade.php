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
                            <li class="breadcrumb-item active" aria-current="page">Ajouter un postulant</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                    <div class="col-xl-7 mx-auto">
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body p-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">Enregistrement d'un postulant</h5>
                                </div>
                                <hr>
                                <form class="row g-3" method="post" action="{{url('postulant')}}">
                                @csrf
                                    <div class="col-md-6">
                                        <label for="nom_post" class="form-label">Nom</label>
                                        <input type="text" class="form-control" name="nom_post" id="nom_post" placeholder="Entrer votre nom">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pren_post" class="form-label">Prenom</label>
                                        <input type="text" class="form-control" name="pren_post" placeholder="Entrer votre prénom">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="adress_post" class="form-label">Adresse mail</label>
                                        <input type="email" class="form-control" name="adress_post" placeholder="Entrer votre email">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Filiere</label>
                                        <select class="form-select" name="filiere">
                                            <option selected>Choisir...</option>
                                            @foreach($fils as $fil)
                                            <option value="{{$fil->id}}">{{$fil->nom_fil}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Type de stage</label>
                                        <select name="typestage" class="form-select">
                                            <option selected>Choisir...</option>
                                            @foreach($type as $types)
                                            <option value="{{$types->id}}">{{$types->nom_tstage}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sexe_post" class="form-label">Sexe</label>
                                        <select name="sexe_post" class="form-select">
                                            <option selected>Choisir...</option>
                                            <option value="M">M</option>
                                            <option value="F">F</option>
                                            <option value="---">---</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="naiss_post" class="form-label">Date de naissance</label>
                                        <input type="date" class="form-control" name="naiss_post" placeholder="Entrer votre date de naissance">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nation_post" class="form-label">Nationalité</label>
                                        <input type="text" class="form-control" name="nation_post" placeholder="Entrer votre nationalité">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="cv_post" class="form-label">Cv</label>
                                        <input type="file" class="form-control" name="cv_post" placeholder="Uploader votre CV">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="demande_post" class="form-label">Demande Manuscrite</label>
                                        <input type="file" class="form-control" name="demande_post" placeholder="Uploader votre Demande Manuscrite">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="admission_post" class="form-label">Attestion d'admission</label>
                                        <input type="file" class="form-control" name="admission_post" placeholder="Uploader votre Attestation d'admission">
                                    </div>
                                    
                                    <div class="col-12" style="text-align:center;">
                                        <button type="submit" class="btn btn-lg btn-primary px-5">Ajouter</button>
                                    </div>
                                </form>
                            </div>
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
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>
@endsection