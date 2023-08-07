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
                                    <h4 class="mb-0">Ajouter une vente</h4>

                                

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                   
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="" method="post">
        
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control date_vente" name="date_vente" placeholder="Date">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Type de client</label>
                                                  <select class=" form-select wide mb-3 type_client" name="type_client" tabindex="-98">
                                                        <option value="Entreprise">Entreprise</option>
                                                    <option value="Particulier">Particulier</option>
                                                  </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Nom &amp; Prénom du client</label>
                                                    <input type="text" class="form-control nom_client" name="nom_client" placeholder="Nom &amp; Prénom du client">
                                                </div>
                    
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control contacte_client" name="contacte_client" placeholder="Contact">
                                                </div>
                                            
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Nom du produit acheté</label>
                                                    <input type="text" class="form-control nom_produit" name="nom_produit" placeholder="Nom du produit">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Quantité</label>
                                                    <input type="text" class="form-control quantite" name="quantite" placeholder="Quantité">
                                                </div>

                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Prix unitaire</label>
                                                    <input type="text" class="form-control prix_unitaire_vente" name="prix_unitaire" placeholder="Prix unitaire">
                                                </div>
                                                
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Prix Total</label>
                                                <input type="text" class="form-control prix_total_vente" name="prix_total" placeholder="Prix total">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Code bare</label>
                                                <input type="text" class="form-control code_bare" name="code_bare" placeholder="Code bare du produit">
                                            </div>
                                    </form>
                                    
                                            <button type="submit" class="btn btn-warning col-lg-1 add-vente">Ajouter</button>
                                        
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