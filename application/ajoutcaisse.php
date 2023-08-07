<?php include "header.php"; ?>

            

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
                                    <h4 class="mb-0">Ajouter une entrées</h4>

                                

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
                                                    <input type="date" class="form-control date_entree" name="date_entree" placeholder="Dates">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Produits</label>
                                                    <select id="inputState" class="form-select col-md-12 default-select produit" name="produit" tabindex="-98">
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
                                                    <input type="text" class="form-control motif" name="motif" placeholder="Motif">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Quantité</label>
                                                    <input type="text" class="form-control quantite_entree" name="quantite_entree" placeholder="Quantité">
                                                </div> <br> <br>
                                                

                                            </div>
                                        </form>
                                  <button type="submit" class="btn btn-warning col-lg-1 add-entree">Ajouter</button>
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