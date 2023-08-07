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
                                    <h4 class="mb-0">Bilan Mensuel</h4>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="" style="margin-right:20px">
                                            <div class="form-inline ">
                                                <div class="search-box d-flex ">
                                                    <div class="col-lg-10">
                                                        <form class="app-search  d-flex" action="" method="">
                                                            <div class="col-lg-8">
                                                                <input type="hidden" class="target_mois" id="target" name="">
                                                                <input type="text" class="form-control bg-light border-light rounded product_name" placeholder="Recherche....">
                                                            </div>
                                                            <button class="btn btn-primary col-lg-2 product-hebdomadaire">Rechercher</button>
                                                        </form>
                                                    </div>
                                                    

                                                <div class=" ms-5 d-flex justify-content-between flex-wrap">
                                                    <div >
                                                    <form id="form-ventes" action="" method="post">
                                                    
                                                        <select name="mois" id="" class="form-select col-lg-2 mois">
                                                            
                                                            <option value="">Choisir mois...</option>
                                                            <option value="january" <?php if(isset($_POST['mois']) && $_POST['mois'] == "january"){echo "selected";} ?> > Janvier </option>
                                                            <option value="february" <?php if(isset($_POST['mois']) && $_POST['mois'] == "february"){echo "selected";} ?> >Février</option>
                                                            <option value="march" <?php if(isset($_POST['mois']) && $_POST['mois'] == "march"){echo "selected";} ?> >Mars</option>
                                                            <option value="april" <?php if(isset($_POST['mois']) && $_POST['mois'] == "april"){echo "selected";} ?> >Avril</option>
                                                            <option value="may" <?php if(isset($_POST['mois']) && $_POST['mois'] == "may"){echo "selected";} ?> >Mai</option>
                                                            <option value="june" <?php if(isset($_POST['mois']) && $_POST['mois'] == "june"){echo "selected";} ?> >Juin</option>
                                                            <option value="july" <?php if(isset($_POST['mois']) && $_POST['mois'] == "july"){echo "selected";} ?> >Juillet</option>
                                                            <option value="august" <?php if(isset($_POST['mois']) && $_POST['mois'] == "august"){echo "selected";} ?> >Aout</option>
                                                            <option value="september" <?php if(isset($_POST['mois']) && $_POST['mois'] == "september"){echo "selected";} ?> >Septembre</option>
                                                            <option value="october" <?php if(isset($_POST['mois']) && $_POST['mois'] == "october"){echo "selected";} ?> >Octobre</option>
                                                            <option value="november" <?php if(isset($_POST['mois']) && $_POST['mois'] == "november"){echo "selected";} ?> >Novembre</option>
                                                            <option value="december" <?php if(isset($_POST['mois']) && $_POST['mois'] == "december"){echo "selected";} ?> >Décembre</option>
                                                        </select>
                                                    </form>
                                                    </div>
                                                </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                                    <div class=""></div>
                                                    <?php
                                                       
                                                    ?>
                                                    <button class="btn btn-primary m-2 fw-bold">Prix total vendu : <span class="total-mensuel" id="mensuel"></span> F CFA </button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                           
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                         
                                                        <th>Id</th>
                                                        <th>Nom produits</th>
                                                        <th>Quantité vendue</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Prix total</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody class="mensuel" id="resultats">
                                                    
                                            
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
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Nom du fournisseur</label>
                                                    <input type="text" class="form-control" placeholder="Nom">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control" placeholder="Contact">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Produits fournis</label>
                                                    <input type="text" class="form-control" placeholder="Produits fournis">
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-warning">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

               


<?php include "footer.php"; ?>