<?php include "header2.php"; ?>
  
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Ajouter un fournisseur</h4>

                                

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                   
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form>

                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Nom du fournisseur</label>
                                                    <input type="text" class="form-control nom" name="nom" placeholder="Nom">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control contacte" name="contacte" placeholder="Contact">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control email" name="email" placeholder="Email">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Produits fournis</label>
                                                    <input type="text" class="form-control produit_fournit" name="produit_fournit" placeholder="Produits fournis">
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-warning add-fournisseur">Ajouter</button>
                                        </form>
                                    
                                    </div>
                            </div>
                       
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                

              

<?php include "footer.php"; ?>