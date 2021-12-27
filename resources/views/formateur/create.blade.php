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
					<div class="breadcrumb-title pe-3">Formateurs</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter un formateur</li>
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
                                        <h5 class="mb-0 text-primary">Enregistrement d'un formateur</h5>
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
                                    <form class="row g-3"  method="post" action="{{url('formateur')}}">
									@csrf
                                        <div class="col-md-6">
                                            <label for="nom_form" class="form-label">Nom</label>
                                            <input type="text" class="form-control" name="nom_form" placeholder="Entrer votre nom">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pren_form" class="form-label">Prenom</label>
                                            <input type="text" class="form-control" name="pren_form" placeholder="Entrer votre prénom">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="adress_form" class="form-label">Adresse mail</label>
                                            <input type="email" class="form-control" name="adress_form" placeholder="Entrer votre email">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tel_form" class="form-label">Numero de téléphone</label>
                                            <input type="tel" class="form-control" name="tel_form" placeholder="Entrer votre numero">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nom_serv" class="form-label">Service d'activité</label>
                                            <select name="id_serv" class="form-select">
                                                <option selected>Choisir...</option>
                                                @foreach($serv as $service)
                                            	<option value="{{$service->id}}">{{$service->nom_serv}}</option>
                                            	@endforeach
                                            </select>
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