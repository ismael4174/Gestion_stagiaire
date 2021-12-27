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
                <div class="breadcrumb-title pe-3">Thèmes</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des thèmes</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
						<div class="btn-group">
						<a href="{{url('theme/create')}}"><button type="button" class="btn btn-outline-primary">Ajouter un theme</button></a>
							</button>
						</div>
				</div>
                
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Liste des thèmes</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th>Nom du thème</th>
                                    <th style="width:25%">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $themes)
                                <tr>
                                    <td>{{$themes->id}}</td>
                                    <td style="text-transform:uppercase">{{$themes->nom_theme}}</td>
                                    <td style="text-align:center;">
                                        <button type="button" class="btn btn-success px-2 radius-30"><i class="lni lni-pencil-alt"></i>Modifier</button>
                                        <button type="button" class="btn btn-danger px-2 radius-30"><i class="lni lni-close"></i>Supprimer</button>
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