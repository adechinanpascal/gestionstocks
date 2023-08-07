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
                                    <h4 class="mb-0">Bilan hebdomadaire</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    
                                  <div class="col-lg-12 d-flex flex-wrap  align-items-center">
                                    <div class="" >
                                        <div class="form-inline ">
                                            <div class="search-box ">
                                                <div class="position-relative">
                                                    <form class="app-search  d-flex" action="" method="post">
                                                        <div class="d-flex"> 
                                                            <div class="">
                                                                <input type="date" class="form-control bg-light border-light rounded date_from" placeholder="Recherche....">
                                                            </div>
                                                            <div class="text-center"> à </div>
                                                            <div class="">
                                                            <input type="date" class="form-control bg-light border-light rounded date_to" placeholder="Recherche....">
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary search-hebdo">Rechercher</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="">
                                        <div class="form-inline ">
                                            <div class="search-box ">
                                                <div class="position-relative">
                                                    <form class="app-search  d-flex" action="" method="">
                                                        <div class="">
                                                            <input type="hidden" class="date_from" id="date-from" name="">
                                                            <input type="hidden" class="date_to" id="date-to" name="">
                                                            <input type="text" class="form-control bg-light border-light rounded product_name" placeholder="Recherche....">
                                                        </div>
                                                        <button class="btn btn-primary product-hebdomadaire">Rechercher</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box d-flex align-items-center justify-content-between">
                                            <div class=""></div>
                                            <button class="btn btn-primary m-2 fw-bold">Prix total vendu : <span id="total-hebdomadaire"></span> F CFA </button>
                                            
                                        </div>
                                    </div>
                                 </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                         
                                                        <th>Id</th>
                                                        <th>Semaine</th>
                                                        <th>Nom produits</th>
                                                        <th>Quantité vendue</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Prix total</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="hebdomadaire">
                                                   
                                            
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
                                <h5 class="modal-title">Modifier un fournisseur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="basic-form">
                                        
                                        <form>

                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Nom du fournisseur</label>
                                                    <input type="text" class="form-control" placeholder="Nom">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control" placeholder="Contact">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Produits fournis</label>
                                                    <input type="text" class="form-control" placeholder="Produits fournis">
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-warning">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

              


<?php include "footer.php"; ?>