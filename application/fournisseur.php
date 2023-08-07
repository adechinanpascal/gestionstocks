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
                                    <h4 class="mb-0">Fournisseur</h4>

                                

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex justify-content-between flex-wrap">  
                                          <h4 class="card-title mb-4">Caisse</h4>
                                        <a href="ajoutfournisseur.php" class="btn btn-success mb-4"><i class="fa fa-plus"></i> Ajouter un fournisseur</a></div>
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
                                                        
                                                            <th>Id</th>
                                                            <th>Nom(particulier/societe)</th>
                                                            <th>Email</th>
                                                            <th>Contact</th>
                                                            <th>Produits fournis</th>
                                                            <th>Action</th>
                                                
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        global $con;

                                                        $select_query = "Select * from `fournisseurs`";
                                                        $result_query = mysqli_query($con, $select_query);
                                                        while($row = mysqli_fetch_assoc($result_query)) {
                                                            $id = $row['id'];
                                                            $nom = $row['nom'];
                                                            $contacte = $row['contacte'];
                                                            $email = $row['email'];
                                                            $produit_fournit = $row['produit_fournit'];

                                                    ?>
                                                    <tr data-id="<?= $id ?>">
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="fournisseur_id"><?= $id ?></td>
                                                         <td class="nom_fr"><?= $nom ?></td>
                                                         <td class="contacte_fr"><?= $contacte ?></td>
                                                          <td class="email_fr"><?= $email ?></td>
                                                          <td class="produit_fournit_fr"><?= $produit_fournit ?></td>
                                                        <td >
                                                            <a class="btn btn-outline-success btn-sm waves-light update-fournisseur" title="Modifier"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a class="btn btn-outline-danger btn-sm edit delete-fournisseur" title="Supprimer">
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
                                <h5 class="modal-title">Modifier un fournisseur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="basic-form">
                                        
                                        <form>

                                            <div class="row">
                                                <input type="hidden" class="id-fournisseur" name="id-fournisseur">

                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Nom du fournisseur</label>
                                                    <input type="text" class="form-control nom" placeholder="Nom">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control contacte" placeholder="Contact">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control email" placeholder="Email">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Produits fournis</label>
                                                    <input type="text" class="form-control produit_fournit" placeholder="Produits fournis">
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-warning start-updatefourn">Modifier</button>
                                        </form>
                                    </div>
                                </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

               


<?php include "footer.php"; ?>