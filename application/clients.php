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
                                    <h4 class="mb-0">Clients</h4>

                                

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                           
                           
                        </div> <!-- end row-->


                      
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-4">Régistre des clients</h4>
                                        <a href="ajoutclient.php"><button class="btn btn-primary">Ajouter</button></a>
                                       </div>
                                        <div class="table-responsive">
                                            <table id="dataTable" class="table table-centered table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th style="width: 20px;">
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                            </div>
                                                        </th>
                                                        <th>ID</th>
                                                        <th>Nom et prénoms</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                        <th>Pays</th> 
                                                        <th>Ville</th>
                                                        <th>Résidence</th>
                                                
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        global $con;

                                                        $select_query = "Select * from `clients`";
                                                        $result_query = mysqli_query($con, $select_query);
                                                        while($row = mysqli_fetch_assoc($result_query)) {
                                                            $id = $row['id'];
                                                            $nom = $row['nom'];
                                                            $prenom = $row['prenom'];
                                                            $contacte = $row['contacte'];
                                                            $email = $row['email'];
                                                            $pays = $row['pays'];
                                                            $ville = $row['ville'];
                                                            $residence = $row['residence'];
                                                            $nom_complet = $prenom." ".$nom;
                                                            

                                                    ?>
                                                    <tr data-id="<?= $id ?>">
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="javascript: void(0);" class="text-body fw-bold client_id"><?= $id ?></a> </td>
                                                        <td class="nom_complet_client"><?= $nom_complet ?></td>
                                                        <td class="contacte_client">
                                                        <?= $contacte ?>
                                                        </td>
                                                        <td class="email_client">
                                                        <?= $email ?>
                                                        </td>
                                                        <td class="pays_client">
                                                        <?= $pays ?>
                                                        </td>
                                                       

                                                        <td>
                                                            <span class="badge rounded-pill bg-soft-success font-size-12 ville_client"><?= $ville ?></span>
                                                        </td>
                                                        <td class="residence_client">
                                                            <i class="fab fa-cc-mastercard me-1"></i> <?= $residence ?>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-outline-success btn-sm waves-light update-client" title="Modifier"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a class="btn btn-outline-danger btn-sm edit delete-client" title="Supprimer">
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
                                <h5 class="modal-title">Modifier les informations</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="" method="post">
        
                                            <div class="row">
                                            <input type="hidden" class="stock_viewing_data id-client" name="stock_viewing_data">
                                                
                                            
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Nom</label>
                                                    <input type="text" class="form-control nom" placeholder="Nom">
                                                </div>
                    
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Prénom</label>
                                                    <input type="text" class="form-control prenom" placeholder="Prénom">
                                                </div>
                                            
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control contacte" placeholder="Contact">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control email" placeholder="Email">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Pays</label>
                                                    <input type="text" class="form-control pays" placeholder="Pays">
                                                </div>
                                                
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Ville</label>
                                                <input type="text" class="form-control ville" placeholder="Ville">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Résidence</label>
                                                <input type="text" class="form-control residence" placeholder="Résidence">
                                            </div>
                                            <button type="submit" class="btn btn-warning start-updateclient">Modifier</button>
                                    </form>
                                    
                                            
                                        
                                    </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

            </div>

           


<?php include "footer.php"; ?>