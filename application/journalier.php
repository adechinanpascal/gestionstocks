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
                                    <h4 class="mb-0">Bilan des ventes</h4>

                                

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        

                      
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="" style="margin-right:20px">
                                                <div class="form-inline ">
                                                    <div class="search-box ">
                                                        <div class="position-relative">
                                                            <form class="app-search  d-flex" action="" method="post">
                                                                <div class="col-lg-10">
                                                                    <input type="text" class="form-control bg-light border-light rounded product_name" placeholder="Recherche....">
                                                                </div>
                                                                <button class="btn btn-primary col-lg-2 product-journaliere">Rechercher</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-4">Bilan journalier</h4>
                                         <button class="btn btn-primary m-2 fw-bold">Prix total vendu : <span id="total-journaliere"><?= total_journaliere() ?></span> F CFA </button>
                                       </div>
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                         
                                                        <th>Id</th>
                                                        <th>Date et heure</th>
                                                        <th>Nom produits</th>
                                                        <th>Quantité vendue</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Prix total</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="journaliere">
                                                    <?php
                                                        global $con;

                                                        $date = date('Y-m-d');
                                                        $query = "Select * from `ventes` where date='$date'";
                                                        $execute = mysqli_query($con, $query);
                                                        while($row = mysqli_fetch_assoc($execute)) {
                                                            $id = $row['id'];
                                                            $date = $row['date'];
                                                            $nom_produit = $row['nom_produit'];
                                                            $quantite = $row['quantite'];
                                                            $prix_unitaire = $row['prix_unitaire'];
                                                            $prix_total = $row['prix_total'];

                                                    ?>
                                                    <tr id="<?= $id ?>">
                                                        <td>
                                                            <?= $id ?>
                                                        </td>
                                                        <td><?= $date ?></td>
                                                        <td><?= $nom_produit ?></td>
                                                        <td><?= $quantite ?></td>
                                                        <td><?= $prix_unitaire ?> </td>
                                                        <td><?= $prix_total ?>  </td>
                                                        <td>
                                                            
                                                            <a onclick="supprimerLigne('<?= $id ?>')" class="btn btn-outline-danger btn-sm edit" title="fermer">
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
                


<?php include "footer.php"; ?>