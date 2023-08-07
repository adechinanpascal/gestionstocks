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
                                    <h4 class="mb-0">Ventes</h4>

                                

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex justify-content-between flex-wrap">  
                                          <h4 class="card-title mb-4">Ventes des produits</h4>
                                        <a href="ajoutvente.php" class="btn btn-success mb-4"><i class="fa fa-plus"></i> Ajouter une vente</a></div>
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
                                                        <th>Type de clients</th>
                                                        <th>Nom du client</th>
                                                        <th>Contact</th>
                                                        <th>Code bare</th>
                                                        <th>Produits</th>
                                                        <th>Quantité</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Prix total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        global $con;

                                                        $query = "Select * from `ventes`";
                                                        $result_query = mysqli_query($con, $query);
                                                        while($row = mysqli_fetch_assoc($result_query)) {
                                                            $id = $row['id'];
                                                            $date = $row['date'];
                                                            $type_client = $row['type_client'];
                                                            $nom_client = $row['nom_client'];
                                                            $contacte = $row['contacte'];
                                                            $code_bare = $row['code_bare'];
                                                            $nom_produit = $row['nom_produit'];
                                                            $quantite = $row['quantite'];
                                                            $prix_unitaire = $row['prix_unitaire'];
                                                            $prix_total = $row['prix_total'];
                                                    ?>
                                                    <tr data-id="<?= $id ?>">
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="vente_id"><?= $id ?></td>
                                                        <td class="date_vente">
                                                            <?= $date ?>
                                                        </td>
                                                        <td class="type_client_vente"><?= $type_client ?></td>
                                                        <td class="nom_client_vente"><?= $nom_client ?></td>
                                                        <td class="contacte_vente">
                                                            <?= $contacte ?>
                                                        </td>
                                                        <td class="code_bare_vente">
                                                            <?= $code_bare ?>
                                                        </td>
                                                        <td class="nom_produit_vente">
                                                            <?= $nom_produit ?>
                                                        </td>
                                                        <td class="quantite_vente">
                                                            <?= $quantite ?>
                                                        </td>
                                                          <td class="prix_unitaire_vente">
                                                            <?= $prix_unitaire ?>
                                                        </td>

                                                        <td class="prix_total_vente">
                                                            <?= $prix_total ?>
                                                        </td>
                                                       
                                                        <td >
                                                            <a class="btn btn-outline-success btn-sm waves-light update-vente" title="Modifier"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a class="btn btn-outline-danger btn-sm edit delete-vente" title="Supprimer">
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
                                <h5 class="modal-title">Modifier une vente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="" method="post">
        
                                            <div class="row">
                                                <input type="hidden" class="id-vente" name="id_vente">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control date_vente" placeholder="Date">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Type de client</label>
                                                  <select class=" form-select wide mb-3 type_client" tabindex="-98">
                                                        <option value="Entreprise">Entreprise</option>
                                                    <option value="Particulier">Particulier</option>
                                                  </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Nom &amp; Prénom du client</label>
                                                    <input type="text" class="form-control nom_client" placeholder="Nom &amp; Prénom du client">
                                                </div>
                    
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control contacte_client" placeholder="Contact">
                                                </div>
                                            
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Nom du produit acheté</label>
                                                    <input type="text" class="form-control nom_produit" placeholder="Nom du produit">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Quantité</label>
                                                    <input type="text" class="form-control quantite" placeholder="Quantité">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Prix unitaire</label>
                                                    <input type="text" class="form-control prix_unitaire_vente" placeholder="Prix unitaire">
                                                </div>
                                                
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Prix Total</label>
                                                <input type="text" class="form-control prix_total_vente" placeholder="Prix total">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Code bare</label>
                                                <input type="text" class="form-control code_bare" placeholder="Code bare du produit">
                                            </div>
                                    </form>
                                    
                                            <button type="submit" class="btn btn-warning start-updatevente">Modifier</button>
                                        
                                    </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

               



<?php include "footer.php"; ?>