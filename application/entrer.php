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
                                    <h4 class="mb-0">Bilan Entrées</h4>                             
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex justify-content-between flex-wrap">  
                                          <h4 class="card-title mb-4">Les entrées</h4>
                                          <a href="#" class="btn btn-success mb-4"> Montant total : <?= total_entree() ?> F</a>
                                          <a href="ajoutcaisse.php" class="btn btn-success mb-4"><i class="fa fa-plus"></i> Ajouter une entrée</a>
                                    </div>
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
                                                        <th>Motifs</th>
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

                                                        $query = "Select * from `entrees`";
                                                        $execute = mysqli_query($con, $query);
                                                        while($row = mysqli_fetch_assoc($execute)) {
                                                            $id = $row['id'];
                                                            $date = $row['date'];
                                                            $motifs = $row['motifs'];
                                                            $produit = $row['produit'];
                                                            $quantite = $row['quantite'];

                                                            $select = "Select * from `ventes` where nom_produit='$produit'";
                                                            $result = mysqli_query($con, $select);
                                                            $rox = mysqli_fetch_assoc($result);
                                                            $prix_unitaire = $rox['prix_unitaire'];
                                                            $prix_unitaire_formate = number_format($prix_unitaire, 2, ',', '.');

                                                            $prix_total_entree = $prix_unitaire * $quantite;
                                                            $prix_total_entree_formate = number_format($prix_total_entree, 2, ',', '.');
                                                    ?>
                                                    <tr data-id="<?= $id ?>">
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="entree_id"><?= $id ?></td>
                                                        <td class="date_entree">
                                                            <?= $date ?>
                                                        </td>
                                                        <td class="motif_entree"><?= $motifs ?></td>
                                                        <td class="produit_entree"><?= $produit ?></td>
                                                        <td class="quantite_entree"><?= $quantite ?></td>
                                                        <td class="prix_unitaire_entree"><?= $prix_unitaire_formate ?></td>
                                                        <td class="prix_total_entree"><?= $prix_total_entree_formate ?></td>
                                                        <td >
                                                            <a class="btn btn-outline-success btn-sm waves-light update-entree" title="Modifier"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a class="btn btn-outline-danger btn-sm edit delete-entree" title="Supprimer">
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
                                <h5 class="modal-title">Modifier une entrer </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="basic-form">
                                        
                                        <form action="" method="post">
                                    
                                            <div class="form-row">
                                                <input type="hidden" class="entree-id" name="entree-id">
                                                
                                                <div class="form-group col-md-12">
                                                    <label>Dates</label>
                                                    <input type="date" class="form-control date_entree" name="date_entree" placeholder="Dates">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Produits</label>
                                                    <select id="inputState" class="form-select col-md-12 default-select produit" tabindex="-98">
                                                        <option value="">choisissez...</option>
                                                        <?php
                                                            global $con;

                                                            $query = "Select distinct designation from `stocks`";
                                                            $execute = mysqli_query($con, $query);
                                                            while($row = mysqli_fetch_assoc($execute)) {
                                                                $designation = $row['designation'];
                                                        ?>
                                                        <option value="<?= $designation ?>"> <?= $designation ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Motif</label>
                                                    <input type="text" class="form-control motif" placeholder="Motif">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Quantité</label>
                                                    <input type="text" class="form-control quantite_entree" placeholder="Quantité">
                                                </div> <br> <br>
                                                

                                            </div>
                                            <button type="submit" class="btn btn-primary start-updateentree">Enregistrer</button>
                                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Annuler</button>
                                        </form>
                                    </div>
                                </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

              


<?php include "footer.php"; ?>