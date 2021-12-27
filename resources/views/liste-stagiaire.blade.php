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
                <div class="breadcrumb-title pe-3">Stagiaires</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des stagiaires</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Liste des stagiaires</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:5%">Id Stagiaire</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th style="width:25%">Infos</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>01</td>
                                    <td>01</td>
                                    <td style="text-align:center;">
                                        <button type="button" class="btn btn-primary px-2 radius-30">Voir les informations</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>02</td>
                                    <td>02</td>
                                    <td style="text-align:center;">
                                        <button type="button" class="btn btn-primary px-2 radius-30">Voir les informations</button>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>03</td>
                                    <td>03</td>
                                    <td style="text-align:center;">
                                        <button type="button" class="btn btn-primary px-2 radius-30">Voir les informations</button>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>04</td>
                                    <td>04</td>
                                    <td style="text-align:center;">
                                        <button type="button" class="btn btn-primary px-2 radius-30">Voir les informations</button>
                                    </td>
                                    
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:5%">Id Stagiaire</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th style="width:25%">Infos</th>
                                </tr>
                            </tfoot>
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