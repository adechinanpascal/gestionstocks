<?php include "header2.php"; ?>

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Caisse</h4>

                                

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex justify-content-between flex-wrap">  
                                          <h4 class="card-title mb-4">Caisse</h4>
                                        <a href="ajoutcaisse.html" class="btn btn-success mb-4"><i class="fa fa-plus"></i> Ajouter une transaction</a></div>
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th style="width: 20px;">
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                            </div>
                                                        </th>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                        <th>Type de transaction</th>
                                                        <th>Date</th>
                                                        <th>Motifs</th>
                                                        <th>Produits</th>
                                                        <th>Quantité</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Prix total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td>#MB2540</td>
                                                        <td>
                                                            07 Oct, 2019
                                                        </td>
                                                        <td>Particulier</td>
                                                        <td>Neal Matthews</td>
                                                        <td>
                                                           65 76 89 77
                                                        </td>
                                                        <td>
                                                            $400
                                                        </td>
                                                        <td>
                                                            Whisky Crème
                                                        </td>
                                                        <td>
                                                           40
                                                        </td>
                                                          <td>
                                                           15000f
                                                        </td>
                                                        <td >
                                                            <a class="btn btn-outline-success btn-sm waves-light"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a class="btn btn-outline-danger btn-sm edit" title="Edit">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                            
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier une vente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="basic-form">
                                        
                                        <form>
                                    
                                            <div class="form-row">
                                                
                                                <div class="form-group col-md-12">
                                                    <label>Dates</label>
                                                    <input type="date" class="form-control" placeholder="Dates">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Produits</label>
                                                    <input type="text" class="form-control" placeholder="Produits">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Motif</label>
                                                    <input type="text" class="form-control" placeholder="Motif">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Quantité</label>
                                                    <input type="text" class="form-control" placeholder="Quantité">
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <label>Prix unitaires</label>
                                                    <input type="text" class="form-control" placeholder="Prix unitaires">
                                                </div>
                                                
                                                <div class="form-group col-md-12 mb-3">
                                                    <label>Type de transaction</label>
                                                    <select id="inputState" class="form-select col-md-12 default-select" tabindex="-98">
                                                        <option selected="">choisissez...</option>
                                                        <option>Entrer</option>
                                                        <option>Sortie</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Annuler</button>
                                        </form>
                                    </div>
                                </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

               


<?php include "footer.php"; ?>