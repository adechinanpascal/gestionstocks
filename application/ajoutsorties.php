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
                                    <h4 class="mb-0">Ajouter une transaction</h4>

                                

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                   
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="" method="post">
                                    
                                            <div class="form-row">
                                                
                                                <div class="form-group col-md-12">
                                                    <label>Dates</label>
                                                    <input type="date" class="form-control date_sortie" placeholder="Dates">
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Fournisseur</label>
                                                    <select class="form-select col-md-12 default-select fournisseur_achat" tabindex="-98">
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
                                                <div class="form-group col-md-12">
                                                    <label>Produits</label>
                                                    <select id="inputState" class="form-select col-md-12 default-select produit_sortie" tabindex="-98">
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
                                                    <input type="text" class="form-control motif_sortie" placeholder="Motif">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Quantité</label>
                                                    <input type="text" class="form-control quantite_sortie" placeholder="Quantité">
                                                </div> <br> <br>
                                                

                                            </div>
                                        </form>
                                  <button type="submit" class="btn btn-warning col-lg-1 add-sortie">Ajouter</button>
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