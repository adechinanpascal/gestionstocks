<?php include "header.php"; ?>

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                  <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Ajouter un Client</h4>

                                    <div class="row">
                                        <div >
                                            <div class="mt-4">
                                               
                                                <form action="" method="post">
        
                                                    <div class="row">
                                                    
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Nom</label>
                                                            <input type="text" class="form-control nom" name="nom" placeholder="Nom">
                                                        </div>
                            
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Prénom</label>
                                                            <input type="text" class="form-control prenom" name="prenom" placeholder="Prénom">
                                                        </div>
                                                    
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Contact</label>
                                                            <input type="text" class="form-control contacte" name="contacte" placeholder="Contact">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control email" name="email" placeholder="Email">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Pays</label>
                                                            <input type="text" class="form-control pays" name="pays" placeholder="Pays">
                                                        </div>
                                                        
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Ville</label>
                                                        <input type="text" class="form-control ville" name="ville" placeholder="Ville">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Résidence</label>
                                                        <input type="text" class="form-control residence" name="residence" placeholder="Résidence">
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-3 mt-3">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light w-md add-client">Ajouter</button>
                                                       
                                                    </div>

                                            </form>
                                            </div>
                                        </div>
                                    
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End Page-content -->


            

<?php include "footer.php"; ?>