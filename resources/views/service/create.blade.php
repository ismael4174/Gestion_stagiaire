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
                <div class="breadcrumb-title pe-3">Service d'activité</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Créer un service</li>
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
                                    <h5 class="mb-0 text-primary">Creation d'un service</h5>
                                </div>
                                <hr>
                                    @if($errors)
                                        @foreach($errors->all() as $error)
                                        <p class="text-danger">{{$error}}</p>
                                        @endforeach
                                    @endif

                                    @if(Session::has('success'))
                                    <p class="text-success">{{session('success')}}</p>
                                    @endif
                                <form class="row g-3" method="post" action="{{url('service')}}">
                                @csrf
                                    <div class="col-md-12">
                                        <label for="" class="form-label">Nom du service</label>
                                        <input type="text" class="form-control" name="nom_serv" placeholder="Entrer le nom du service">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" class="form-label">Numéro de téléphone du service</label>
                                        <input type="text" class="form-control" name="tel_serv" placeholder="Entrer le numéro du service">
                                    </div>
                                    
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary px-5">Ajouter</button>
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
@endsection