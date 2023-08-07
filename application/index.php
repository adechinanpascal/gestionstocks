<?php 

include "header.php";
     
?>

            

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
                                    <h4 class="mb-0">Bilan journalier</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        <div>
                                            <h4 class="mb-1 mt-1"><?= count_stocks() ?></h4>
                                            <p class="text-muted mb-0">Produits en stock</p>
                                        </div>
                                       
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                      
                                        <div>
                                            <h4 class="mb-1 mt-1"><?= count_fournisseur() ?></h4>
                                            <p class="text-muted mb-0">Nombre de fournisseurs</p>
                                        </div>
                                       
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                      
                                        <div>
                                            <h4 class="mb-1 mt-1"><?= count_client() ?></h4>
                                            <p class="text-muted mb-0">Nombre total de Clients</p>
                                        </div>
                                      
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">

                                <div class="card">
                                    <div class="card-body">
                                      
                                        <div>
                                            <h4 class="mb-1 mt-1"><?= gain_total() ?> F CFA</h4>
                                            <p class="text-muted mb-0">Gain Total</p>
                                        </div>
                                      
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row-->


                      
                        <!-- end row -->

                        <div id="update_content"  class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-4">Stock des produits</h4>
                                        <a href="ajoutstock.php"><button class="btn btn-primary">Ajouter</button></a>
                                       </div>
                                        <div class="table-responsive" >
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
                                                        <th>Désignation</th>
                                                        <th>Photo</th>
                                                        <th>Fournisseurs</th>
                                                        <th>Date de livraison</th>
                                                        <th>Date d'expiration</th>
                                                        <th>Total livré</th>
                                                        <th>Total en stock</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Stock Restant</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        global $con;

                                                        $select_query = "Select * from `stocks`";
                                                        $result_query = mysqli_query($con, $select_query);
                                                        while($row = mysqli_fetch_assoc($result_query)) {
                                                            $id = $row['id'];
                                                            $designation = $row['designation'];
                                                            $photo = $row['photo'];
                                                            $fournisseur = $row['fournisseur_id'];
                                                            $date_livraison = $row['date_livraison'];
                                                            $date_exp = $row['date_exp'];
                                                            $total_livre = $row['total_livre'];
                                                            //$total_stock = $row['total_stock'];
                                                            $prix_unitaire = $row['prix_unitaire'];
                                                            //$stock_rest = $row['stock_rest'];

                                                            // Requête pour obtenir le stock et le reste de tous les profuits qui ont même nom
                                                            $query = "Select * from `stocks` where designation='$designation' and fournisseur_id=$fournisseur order by id desc LIMIT 1";
                                                            $execute = mysqli_query($con, $query);
                                                            $data = mysqli_fetch_assoc($execute);
                                                            $total_stock = $data['total_stock'];
                                                            $stock_rest = $data['stock_rest'];

                                                                // Requête pour obtenir le nom des fournisseurs à partir de leur id
                                                                $select_fournisseur = "Select * from `fournisseurs` where id=$fournisseur";
                                                                $execute2 = mysqli_query($con, $select_fournisseur);
                                                                $row = mysqli_fetch_assoc($execute2);
                                                                $nom = $row['nom'];
                                                    ?>
                                                    <tr data-id="<?= $id ?>">
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="javascript: void(0);" class="text-body fw-bold stock_id"><?= $id ?></a> </td>
                                                        <td class="designation_stock"><?= $designation ?></td>
                                                        <td>
                                                            <div class="image" style="width: 50px;">
                                                                <img style="width: 100%;" src="<?= $photo ?>" alt="">
                                                            </div>
                                                        </td>
                                                        <td class="nom_stock"><?= $nom ?></td>
                                                        <td class="date_livraison_stock">
                                                            <?= $date_livraison ?>
                                                        </td>
                                                        <td class="date_exp_stock">
                                                            <?= $date_exp ?>
                                                        </td>
                                                        <td class="total_livre_stock"><?= $total_livre ?></td>
                                                          <td class="total_stock">
                                                            <?= $total_stock ?>
                                                        </td>

                                                        <td>
                                                            <span class="badge rounded-pill bg-soft-success font-size-12 prix_unitaire_stock"><?= $prix_unitaire ?></span>
                                                        </td>
                                                        <td class="stock_rest">
                                                            <i class="fab fa-cc-mastercard me-1"></i><?= $stock_rest ?>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-outline-success btn-sm waves-light update-stock" title="Modifier"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a class="btn btn-outline-danger btn-sm edit delete-stock" title="Supprimer">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>

                                            
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
                                <h5 class="modal-title">Modifier un stock</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="basic-form">
                                    
                                    
                                        <form class="row" action="" method="post" enctype="multipart/form-data">
                                            <div class="col-lg-6 mb-3">
                                                <!-- <div style="display: none;" class="stock_viewing_data id" id="id"></div> -->
                                                <input type="hidden" class="stock_viewing_data id" name="stock_viewing_data">
                                                
                                                <label class="form-label" for="formrow-Fullname-input">Désignation</label>
                                                <input type="text" class="form-control designation" name="designation" id="formrow-Fullname-input"  placeholder="Désignation">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="formrow-Fullname-input">Photo</label>
                                                <input type="file" class="form-control photo" name="photo" id="formrow-Fullname-input" >
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="formrow-Fullname-input">Fournisseur</label>
                                                <!-- <input type="text" class="form-control fournisseur" name="fournisseur" id="formrow-Fullname-input"  placeholder="Fournisseur"> -->
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
                                                <input type="date" class="form-control date_livraison" name="fournisseur" id="formrow-Fullname-input"  placeholder="Date de livraison">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="formrow-Fullname-input">Date d'expiration</label>
                                                <input type="date" class="form-control date_exp" name="date_exp" id="formrow-Fullname-input"  placeholder="Date d'expiration">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="formrow-Fullname-input">Total livré</label>
                                                <input type="text" class="form-control total_livre" name="total_livre" id="formrow-Fullname-input"  placeholder="Total livré">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="formrow-Fullname-input">Total en stock</label>
                                                <input type="text" class="form-control total_stock"  name="total_stock" id="formrow-Fullname-input"  placeholder="Total en stock">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="formrow-Fullname-input">Prix unitaire</label>
                                                <input type="text" class="form-control prix_unitaire" id="formrow-Fullname-input"  placeholder="Prix unitaire">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="formrow-Fullname-input">Stock en temps réel</label>
                                                <input type="text" class="form-control stock_rest" id="formrow-Fullname-input"  placeholder="stock">
                                            </div>


                                            
                                           
                                            
                                            <div class="d-flex flex-wrap gap-3 mt-3">
                                                <button type="submit" class="btn btn-warning waves-effect waves-light w-md btn-update">Modifier</button>
                                               
                                            </div>
                                        </form>
                                    
                                           
                                        
                                    </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

              
            </div>

             <!-- ============================================================== -->
            <!-- End Page content here -->
            <!-- ============================================================== -->


<?php 
include "footer.php"; 
?>