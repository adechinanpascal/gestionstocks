<?php include "header2.php"; 

if(isset($_GET['stock_id'])) {
    $id = $_GET['stock_id'];

    global $con;

    $select_query = "Select * from `stocks` where id=$id";
    $result_query = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result_query);
    $designation = $row['designation'];
    $photo = $row['photo'];
    $fournisseur = $row['fournisseur'];
    $date_livraison = $row['date_livraison'];
    $date_exp = $row['date_exp'];
    $total_livre = $row['total_livre'];
    $total_stock = $row['total_stock'];
    $prix_unitaire = $row['prix_unitaire'];
    $stock_rest = $row['stock_rest'];
}
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
                                    <h4 class="card-title">Modifier un stock</h4>

                                    <div class="row">
                                        <div >
                                            <div class="mt-4">
                                               
                                                <form class="row" action="" method="post" enctype="multipart/form-data">
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Désignation</label>
                                                        <input type="text" class="form-control" name="designation" id="formrow-Fullname-input" value="<?= $designation ?>" placeholder="Désignation">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Photo</label>
                                                        <input type="file" class="form-control" name="photo_stock" id="formrow-Fullname-input" >
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Fournisseur</label>
                                                        <input type="text" class="form-control" name="fournisseur" id="formrow-Fullname-input" value="<?= $fournisseur ?>" placeholder="Fournisseur">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Date de livraison</label>
                                                        <input type="date" class="form-control" name="date_livraison" id="formrow-Fullname-input" value="<?= $date_livraison ?>" placeholder="Date de livraison">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Date d'expiration</label>
                                                        <input type="date" class="form-control" name="date_exp" id="formrow-Fullname-input" value="<?= $date_exp ?>" placeholder="Date d'expiration">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Total livré</label>
                                                        <input type="text" class="form-control" name="total_livre" id="formrow-Fullname-input" value="<?= $total_livre ?>" placeholder="Total livré">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Total en stock</label>
                                                        <input type="text" class="form-control" name="total_stock" id="formrow-Fullname-input" value="<?= $total_stock ?>" placeholder="Total en stock">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Prix unitaire</label>
                                                        <input type="text" class="form-control" name="prix_unitaire" id="formrow-Fullname-input" value="<?= $prix_unitaire ?>" placeholder="Prix unitaire">
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" for="formrow-Fullname-input">Stock en temps réel</label>
                                                        <input type="text" class="form-control" name="stock_rest" id="formrow-Fullname-input" value="<?= $stock_rest ?>" placeholder="stock">
                                                    </div>
        
        
                                                    
                                                   
                                                    
                                                    <div class="d-flex flex-wrap gap-3 mt-3">
                                                        <input type="submit" class="btn btn-primary waves-effect waves-light w-md" name="add_stock" value="Enregistrer">
                                                       
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