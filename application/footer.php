            <!-- ============================================================== -->
            <!-- start footer here -->
            <!-- ============================================================== -->

            <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © FUN HIGH TECH.
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center p-3">

                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'small')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-colored" value="colored" onchange="document.body.setAttribute('data-sidebar', 'colored')">
                        <label class="form-check-label" for="sidebar-color-colored">Colored</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script src="assets/libs/jquery/sweatalert.min.js"></script>

        <script src="assets/js/custom.js"></script>

        <script>

            //============ calculer automatiquement le total en stock du produit lorsqu'on un livraison ====================
            $(document).ready(function() {
                var initial_total_stock = parseFloat($('.total_stock').val()) || 0;
                var total_stock_from_ajax = 0;

                var initial_stock_rest = parseFloat($('.stock_rest').val()) || 0;
                var stock_rest_from_ajax = 0;
                            
                // Ajouter un événement de saisie sur le champ de quantité
                $('.total_livre').on('input keyup', function (e) {
                    e.preventDefault();

                    var designation = $(this).closest('form').find('.designation').val();
                    var total_livre = $(this).val();
                    var stock_total = 0;
                    var stock_rest = 0;

                    // Vérifier si total_livre a une valeur
                    if (total_livre) {
                        var stock_total = parseFloat(total_livre) + initial_total_stock;
                        var stock_rest = parseFloat(total_livre) + initial_stock_rest;
                        $('.total_stock').val(stock_total);
                        $('.stock_rest').val(stock_rest);
                    } else {
                        $('.total_stock').val(initial_total_stock);
                        $('.stock_rest').val(initial_stock_rest);
                    }
                });

                 //============ calculer automatiquement le total en stock du produit ====================
                // Ajouter un événement de saisie sur le champ de désignation
                $('.fournisseur').on('input', function (e) {
                    e.preventDefault();

                    var fournisseur = $(this).val();
                    var designation = $(this).closest('form').find('.designation').val();
                    

                    $.ajax({
                        type: "POST",
                        url: "../functions/functions.php",
                        data: {
                            'checking_total_stock': true,
                            'fournisseur': fournisseur,
                            'designation': designation,
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Stocker la valeur de total_stock récupérée de la requête AJAX dans la variable globale
                            total_stock_from_ajax = parseFloat(response.total_stock);
                            stock_rest_from_ajax = parseFloat(response.stock_rest);
                            prix = parseFloat(response.prix);
                            

                            // Remplir le champ "total_stock" avec le total_stock récupéré
                            $('.total_stock').val(total_stock_from_ajax);
                            $('.stock_rest').val(stock_rest_from_ajax);
                            $('.prix_unitaire').val(prix);

                            // Réinitialiser initial_total_stock avec le total_stock récupéré
                            initial_total_stock = total_stock_from_ajax;
                            initial_stock_rest = stock_rest_from_ajax;
                        }
                    });
                });
            });

  

            //================================== Traité Ajouté et Alerter pour un stock =============================
            $(document).ready(function () {
                
                $('.add-stock').click(function (e) {
                    e.preventDefault();


                    var form_data = new FormData();
                    form_data.append('checking_addstock', true);
                    form_data.append('designation', $('.designation').val());
                    form_data.append('photo_stock', $('.photo')[0].files[0]);
                    form_data.append('fournisseur', $('.fournisseur').val());
                    form_data.append('date_livraison', $('.date_livraison').val());
                    form_data.append('date_exp', $('.date_exp').val());
                    form_data.append('total_livre', $('.total_livre').val());
                    form_data.append('total_stock', $('.total_stock').val());
                    form_data.append('prix_unitaire', $('.prix_unitaire').val());
                    form_data.append('stock_rest', $('.stock_rest').val());
                    //console.log(photo);
                    
                    $.ajax({
                        type: "POST",
                        url: "../functions/functions.php",
                        data: form_data,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            //console.log(response);
                            // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                            if (response === 'success') {
                                swal("Succès!", "Stock ajouté avec succès.", "success");
                            } else {
                                swal("Erreur!", "Une erreur s'est produite lors de l'insertion du stock.", "error");
                            }     
                        }
                    });

                });
            });

            
            //========================================= pour préremplir les champs ==============================
            // pour récupérer le id de stock
            $(document).ready(function () {
                
                $('.update-stock').click(function (e) {
                    e.preventDefault();

                    var stock_id = $(this).closest('tr').find('.stock_id').text();
                    //console.log(stock_id);
                    
                    $.ajax({
                        type: "POST",
                        url: "../functions/functions.php",
                        data: {
                            'checking_update': true,
                            'stock_id': stock_id,
                        },
                        dataType: 'json',
                        success: function (response) {
                            // Préremplir les champs de formulaire dans le pop-up avec les valeurs renvoyées
                            $('.id').val(response.id);
                            $('.designation').val(response.designation);
                            $('.fournisseur').val(response.fournisseur);
                            $('.date_livraison').val(response.date_livraison);
                            $('.date_exp').val(response.date_exp);
                            $('.total_livre').val(response.total_livre);
                            $('.total_stock').val(response.total_stock);
                            $('.prix_unitaire').val(response.prix_unitaire);
                            $('.stock_rest').val(response.stock_rest);
                        }
                    });

                });
            });


            //=========================== Pour modifier les information de stock ================================
            $(document).ready(function () {
                
                $('.btn-update').click(function (e) {
                    e.preventDefault();


                    var form_data = new FormData();
                    form_data.append('start_update', true);
                    form_data.append('id', $('.id').val());
                    form_data.append('designation', $('.designation').val());
                    form_data.append('photo_stock', $('.photo')[0].files[0]);
                    form_data.append('fournisseur', $('.fournisseur').val());
                    form_data.append('date_livraison', $('.date_livraison').val());
                    form_data.append('date_exp', $('.date_exp').val());
                    form_data.append('total_livre', $('.total_livre').val());
                    form_data.append('total_stock', $('.total_stock').val());
                    form_data.append('prix_unitaire', $('.prix_unitaire').val());
                    form_data.append('stock_rest', $('.stock_rest').val());

                    var idLigneModifiee = $('.id').val();
                    
                    $.ajax({
                        type: "POST",
                        url: "../functions/functions.php",
                        data: form_data,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                            if (response === 'success') {
                                swal("Succès!", "Stock modifié avec succès.", "success");
                                var ligneModifiee = $("tr[data-id='" + idLigneModifiee + "']");
                                ligneModifiee.find(".designation_stock").text($('.designation').val());
                                ligneModifiee.find(".nom_stock").text($('.fournisseur').val());
                                ligneModifiee.find(".date_livraison_stock").text($('.date_livraison').val());
                                ligneModifiee.find(".date_exp_stock").text($('.date_exp').val());
                                ligneModifiee.find(".total_livre_stock").text($('.total_livre').val());
                                ligneModifiee.find(".total_stock").text($('.total_stock').val());
                                ligneModifiee.find(".prix_unitaire_stock").text($('.prix_unitaire').val());
                                ligneModifiee.find(".stock_rest").text($('.stock_rest').val());
                                //$("#update_content").load(location.href + " #update_content");
                                //location.reload();
                            } else {
                                swal("Erreur!", "Une erreur s'est produite lors de la modification du stock.", "error");
                            }
                            
                        }
                    });

                });
            });


            //====================== Pour supprimer un stock =====================================
            $(document).ready(function () {
                
                $('.delete-stock').click(function (e) {
                    e.preventDefault();


                    var stock_id = $(this).closest('tr').find('.stock_id').text();
                    // var designation = $(this).closest('tr').find('.designation').text();
                    // var fournisseur = $(this).closest('tr').find('.fournisseur').text();
                    // var stock = $(this).closest('tr').find('.stock').text();
                    //console.log(fournisseur);
                    

                    swal({
                    title: "Voulez vous vraiment supprimer ce stock ?",
                    text: "Une fois supprimer, vous ne pouvez plus le récupérer ce stock!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "../functions/functions.php",
                            data: {
                            'delete_stock': true,
                            'stock_id': stock_id,
                            // 'designation': designation,
                            // 'fournisseur': fournisseur,
                            },
                            success: function (response) {
                                // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                                if (response === 'success') {
                                    swal("Succès!", "Stock supprimé avec succès.", "success").then((result) => {
                                        location.reload();
                                    });
                                } else {
                                    swal("Erreur!", "Une erreur s'est produite lors de la suppression du stock.", "error").then((result) => {
                                        location.reload();
                                    });
                                }   
                            }
                        });
                    } else {
                        swal("Suppression annuler!");
                    }
                    });

                });
            });
        </script>

    </body>



</html>

