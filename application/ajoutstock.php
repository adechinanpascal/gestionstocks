<?php include "header2.php"; 

//add_stock();
?>

            

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
                                    <h4 class="card-title">Ajouter un stock</h4>

                                    <div class="row">
                                        <div >
                                            <div class="mt-4">
                                               
                                                <form class="row" action="" method="post" id="my-dropzone" enctype="multipart/form-data">
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Désignation</label>
                                                        <input type="text" class="form-control designation" name="designation" id="formrow-Fullname-input" placeholder="Désignation" required="required">
                                                    </div>
                                                    <div class="col-lg-6 mb-3 fallback">
                                                        <label class="form-label" for="formrow-Fullname-input">Photo</label>
                                                        <input type="file" class="form-control photo" name="photo" id="formrow-Fullname-input" multiple />
                                                    </div>
                                                    <div class="col-lg-6 mb-3">                            
                                                        <label class="form-label" for="formrow-Fullname-input">Fournisseur</label>
                                                        <!-- <input type="text" class="form-control fournisseur" name="fournisseur" id="formrow-Fullname-input" placeholder="Fournisseur"> -->
                                                        <select class="form-select wide mb-3 fournisseur" name="fournisseur" tabindex="-98">
                                                            <option value="">Selectionner</option>
                                                            <?php
                                                                global $con;
                                                                $select_query = "Select * from `fournisseurs`";
                                                                $execute = mysqli_query($con, $select_query);
                                                                while($row = mysqli_fetch_assoc($execute)) {
                                                                $id = $row['id'];
                                                                $nom = $row['nom'];
                                                            ?>
                                                            <option value="<?= $id ?>"><?= $nom ?></option>

                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Date de livraison</label>
                                                        <input type="date" class="form-control date_livraison" name="date_livraison" id="formrow-Fullname-input" placeholder="Date de livraison">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Date d'expiration</label>
                                                        <input type="date" class="form-control date_exp" name="date_exp" id="formrow-Fullname-input" placeholder="Date d'expiration">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Total livré</label>
                                                        <input type="text" class="form-control total_livre" name="total_livre" id="formrow-Fullname-input" placeholder="Total livré">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Total en stock</label>
                                                        <input type="text" class="form-control total_stock" name="total_stock" id="formrow-Fullname-input" placeholder="Total en stock">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Prix unitaire</label>
                                                        <input type="text" class="form-control prix_unitaire" name="prix_unitaire" id="formrow-Fullname-input" placeholder="Prix unitaire">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Stock en temps réel</label>
                                                        <input type="text" class="form-control stock_rest" name="stock_rest" id="formrow-Fullname-input" placeholder="stock">
                                                    </div>
        
        
                                                    
                                                   
                                                    
                                                    <div class="d-flex flex-wrap gap-3 mt-3">
                                                        <input type="submit" class="btn btn-primary waves-effect waves-light w-md add-stock" name="add_stock" value="Enregistrer">
                                                
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