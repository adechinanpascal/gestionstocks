//==================================================================================================
//                              TRAITEMENT DU CLIENT                                               =
//==================================================================================================

//================================== Traité Ajouté et Alerter pour un client =============================
$(document).ready(function () {
                
    $('.add-client').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('checking_addclients', true);
        form_data.append('nom', $('.nom').val());
        form_data.append('prenom', $('.prenom').val());
        form_data.append('contacte', $('.contacte').val());
        form_data.append('email', $('.email').val());
        form_data.append('pays', $('.pays').val());
        form_data.append('ville', $('.ville').val());
        form_data.append('residence', $('.residence').val());
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
                    swal("Succès!", "Client ajouté avec succès.", "success");
                } else {
                    swal("Erreur!", "Une erreur s'est produite lors de l'insertion du client.", "error");
                }     
            }
        });

    });
});



//========================================= pour préremplir les champs ==============================
            // pour récupérer le id de stock
            $(document).ready(function () {
                
                $('.update-client').click(function (e) {
                    e.preventDefault();

                    var client_id = $(this).closest('tr').find('.client_id').text();
                    //console.log(client_id);
                    
                    $.ajax({
                        type: "POST",
                        url: "../functions/functions.php",
                        data: {
                            'checking_update_client': true,
                            'client_id': client_id,
                        },
                        dataType: 'json',
                        success: function (response) {
                            // Préremplir les champs de formulaire dans le pop-up avec les valeurs renvoyées
                            $('.id-client').val(response.id);
                            $('.nom').val(response.nom);
                            $('.prenom').val(response.prenom);
                            $('.contacte').val(response.contacte);
                            $('.email').val(response.email);
                            $('.pays').val(response.pays);
                            $('.ville').val(response.ville);
                            $('.residence').val(response.residence);
                        }
                    });

                });
            });


 //=========================== Pour modifier les information de stock ================================
 $(document).ready(function () {
                
    $('.start-updateclient').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('start_updateclient', true);
        form_data.append('id', $('.id-client').val());
        form_data.append('nom', $('.nom').val());
        form_data.append('prenom', $('.prenom').val());
        form_data.append('contacte', $('.contacte').val());
        form_data.append('email', $('.email').val());
        form_data.append('pays', $('.pays').val());
        form_data.append('ville', $('.ville').val());
        form_data.append('residence', $('.residence').val());

        var idLigneModifiee = $('.id-client').val();
        
        $.ajax({
            type: "POST",
            url: "../functions/functions.php",
            data: form_data,
            processData: false,
            contentType: false,
            success: function (response) {
                // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                if (response === 'success') {
                    swal("Succès!", "Client modifié avec succès.", "success");
                    var ligneModifiee = $("tr[data-id='" + idLigneModifiee + "']");
                    ligneModifiee.find(".nom_complet_client").text($('.nom').val());
                    ligneModifiee.find(".contacte_client").text($('.contacte').val());
                    ligneModifiee.find(".email_client").text($('.email').val());
                    ligneModifiee.find(".pays_client").text($('.pays').val());
                    ligneModifiee.find(".ville_client").text($('.ville').val());
                    ligneModifiee.find(".residence_client").text($('.residence').val());
                } else {
                    swal("Erreur!", "Une erreur s'est produite lors de la modification du client.", "error");
                }
                
            }
        });

    });
});



//====================== Pour supprimer un client =====================================
$(document).ready(function () {
                
    $('.delete-client').click(function (e) {
        e.preventDefault();


        var client_id = $(this).closest('tr').find('.client_id').text();
        //console.log(photo);
        

        swal({
        title: "Voulez vous vraiment supprimer ce client ?",
        text: "Une fois supprimer, vous ne pouvez plus récupérer cette donnée!",
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
                'delete_client': true,
                'client_id': client_id,
                },
                success: function (response) {
                    // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                    if (response === 'success') {
                        swal("Succès!", "Client supprimé avec succès.", "success").then((result) => {
                            location.reload();
                        });
                    } else {
                        swal("Erreur!", "Une erreur s'est produite lors de la suppression du client.", "error");
                    }   
                }
            });
        } else {
            swal("Suppression annuler!");
        }
        });

    });
});




//==================================================================================================
//                              TRAITEMENT DU FOURNISSEUR                                          =
//==================================================================================================
//================================== Traité Ajouté et Alerter pour un client =============================
$(document).ready(function () {
                
    $('.add-fournisseur').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('checking_addfournisseur', true);
        form_data.append('nom', $('.nom').val());
        form_data.append('contacte', $('.contacte').val());
        form_data.append('email', $('.email').val());
        form_data.append('produit_fournit', $('.produit_fournit').val());
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
                    swal("Succès!", "Fournisseur ajouté avec succès.", "success");
                } else {
                    swal("Erreur!", "Une erreur s'est produite lors de l'insertion du fournisseur.", "error");
                }     
            }
        });

    });
});


//========================================= pour préremplir les champs ==============================
            // pour récupérer le id de stock
            $(document).ready(function () {
                
                $('.update-fournisseur').click(function (e) {
                    e.preventDefault();

                    var fournisseur_id = $(this).closest('tr').find('.fournisseur_id').text();
                    //console.log(fournisseur_id);
                    
                    $.ajax({
                        type: "POST",
                        url: "../functions/functions.php",
                        data: {
                            'checking_update_fourn': true,
                            'fournisseur_id': fournisseur_id,
                        },
                        dataType: 'json',
                        success: function (response) {
                            // Préremplir les champs de formulaire dans le pop-up avec les valeurs renvoyées
                            $('.id-fournisseur').val(response.id);
                            $('.nom').val(response.nom);
                            $('.contacte').val(response.contacte);
                            $('.email').val(response.email);
                            $('.produit_fournit').val(response.produit_fournit);
                        }
                    });

                });
            });



//=========================== Pour modifier les information de fournisseur ================================
$(document).ready(function () {
                
    $('.start-updatefourn').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('start_updatefourn', true);
        form_data.append('id', $('.id-fournisseur').val());
        form_data.append('nom', $('.nom').val());
        form_data.append('contacte', $('.contacte').val());
        form_data.append('email', $('.email').val());
        form_data.append('produit_fournit', $('.produit_fournit').val());

        var idLigneModifiee = $('.id-fournisseur').val();
        
        $.ajax({
            type: "POST",
            url: "../functions/functions.php",
            data: form_data,
            processData: false,
            contentType: false,
            success: function (response) {
                // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                if (response === 'success') {
                    swal("Succès!", "Fournisseur modifié avec succès.", "success");
                    var ligneModifiee = $("tr[data-id='" + idLigneModifiee + "']");
                    ligneModifiee.find(".nom_fr").text($('.nom').val());
                    ligneModifiee.find(".contacte_fr").text($('.contacte').val());
                    ligneModifiee.find(".email_fr").text($('.email').val());
                    ligneModifiee.find(".produit_fournit_fr").text($('.produit_fournit').val());
                } else {
                    swal("Erreur!", "Une erreur s'est produite lors de la modification du fournisseur.", "error");
                }
                
            }
        });

    });
});


//====================== Pour supprimer un fournisseur =====================================
$(document).ready(function () {
                
    $('.delete-fournisseur').click(function (e) {
        e.preventDefault();


        var fournisseur_id = $(this).closest('tr').find('.fournisseur_id').text();
        //console.log(photo);
        

        swal({
        title: "Voulez vous vraiment supprimer ce fournisseur ?",
        text: "Une fois supprimer, vous ne pouvez plus récupérer cette donnée!",
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
                'delete_fournisseur': true,
                'fournisseur_id': fournisseur_id,
                },
                success: function (response) {
                    // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                    if (response === 'success') {
                        swal("Succès!", "Fournisseur supprimé avec succès.", "success").then((result) => {
                            location.reload();
                        });
                    } else {
                        swal("Erreur!", "Une erreur s'est produite lors de la suppression du fournisseur.", "error").then((result) => {
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





//==================================================================================================
//                              TRAITEMENT DE LA VENTES                                            =
//==================================================================================================
//================================ Calculer les prix totals =============================================
$(document).ready(function() {
    // Ajouter un événement de saisie sur le champ de quantité
    $('.prix_unitaire_vente').on('input', function (e) {
        e.preventDefault();

        var nom_produit = $(this).closest('form').find('.nom_produit').val();
        var quantite = $(this).closest('form').find('.quantite').val();
        var prix_unitaire_vente = $(this).val();
      //console.log(quantite);
  
      $.ajax({
        type: "POST",
        url: "../functions/functions.php",
        data: {
          'checking_total_price': true,
          'nom_produit': nom_produit,
        },
        success: function(response) {
            if (response === 'error') {
                swal("Attention!", "Ce produit n'existe pas dans le stock.", "warning");
            } else {
               
                // Calculer le prix total et le remplir dans le champ correspondant
                var prix_total = prix_unitaire_vente * quantite;
                $('.prix_total_vente').val(prix_total);
            }   
        }
      });

    });
  });
  



//================================== Traité Ajouté et Alerter pour une vente =============================
$(document).ready(function () {
                
    $('.add-vente').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('checking_addvente', true);
        form_data.append('date', $('.date_vente').val());
        form_data.append('type_client', $('.type_client').val());
        form_data.append('nom_client', $('.nom_client').val());
        form_data.append('contacte', $('.contacte_client').val());
        form_data.append('nom_produit', $('.nom_produit').val());
        form_data.append('quantite', $('.quantite').val());
        form_data.append('prix_unitaire', $('.prix_unitaire_vente').val());
        form_data.append('prix_total', $('.prix_total_vente').val());
        form_data.append('code_bare', $('.code_bare').val());
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
                    swal("Succès!", "Vente ajouté avec succès.", "success");
                } else {
                    swal("Erreur!", "Une erreur s'est produite lors de l'insertion de la vente.", "error");
                }     
            }
        });

    });
});



//========================================= pour préremplir les champs ==============================
            // pour récupérer le id de vente
            $(document).ready(function () {
                
                $('.update-vente').click(function (e) {
                    e.preventDefault();

                    var vente_id = $(this).closest('tr').find('.vente_id').text();
                    //console.log(fournisseur_id);
                    
                    $.ajax({
                        type: "POST",
                        url: "../functions/functions.php",
                        data: {
                            'checking_update_vente': true,
                            'vente_id': vente_id,
                        },
                        dataType: 'json',
                        success: function (response) {
                            // Préremplir les champs de formulaire dans le pop-up avec les valeurs renvoyées
                            $('.id-vente').val(response.id);
                            $('.date_vente').val(response.date);
                            $('.type_client').val(response.type_client);
                            $('.nom_client').val(response.nom_client);
                            $('.contacte_client').val(response.contacte);
                            $('.nom_produit').val(response.nom_produit);
                            $('.quantite').val(response.quantite);
                            $('.prix_unitaire_vente').val(response.prix_unitaire);
                            $('.prix_total_vente').val(response.prix_total);
                            $('.code_bare').val(response.code_bare);
                        }
                    });

                });
            });



//=========================== Pour modifier les information de fournisseur ================================
$(document).ready(function () {
                
    $('.start-updatevente').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('start_updatevente', true);
        form_data.append('id', $('.id-vente').val());
        form_data.append('date', $('.date_vente').val());
        form_data.append('type_client', $('.type_client').val());
        form_data.append('nom_client', $('.nom_client').val());
        form_data.append('contacte', $('.contacte_client').val());
        form_data.append('nom_produit', $('.nom_produit').val());
        form_data.append('quantite', $('.quantite').val());
        form_data.append('prix_unitaire', $('.prix_unitaire_vente').val());
        form_data.append('prix_total', $('.prix_total_vente').val());
        form_data.append('code_bare', $('.code_bare').val());


        var idLigneModifiee = $('.id-vente').val();
        
        $.ajax({
            type: "POST",
            url: "../functions/functions.php",
            data: form_data,
            processData: false,
            contentType: false,
            success: function (response) {
                // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                if (response === 'success') {
                    swal("Succès!", "Vente modifié avec succès.", "success");
                    var ligneModifiee = $("tr[data-id='" + idLigneModifiee + "']");
                    ligneModifiee.find(".date_vente").text($('.date_vente').val());
                    ligneModifiee.find(".type_client_vente").text($('.type_client').val());
                    ligneModifiee.find(".nom_client_vente").text($('.nom_client').val());
                    ligneModifiee.find(".contacte_vente").text($('.contacte_client').val());
                    ligneModifiee.find(".nom_produit_vente").text($('.nom_produit').val());
                    ligneModifiee.find(".quantite_vente").text($('.quantite').val());
                    ligneModifiee.find(".prix_unitaire_vente").text($('.prix_unitaire_vente').val());
                    ligneModifiee.find(".prix_total_vente").text($('.prix_total_vente').val());
                    ligneModifiee.find(".code_bare_vente").text($('.code_bare').val());
                } else {
                    swal("Erreur!", "Une erreur s'est produite lors de la modification de la vente.", "error");
                }
                
            }
        });

    });
});


//====================== Pour supprimer une vente =====================================
$(document).ready(function () {
                
    $('.delete-vente').click(function (e) {
        e.preventDefault();


        var vente_id = $(this).closest('tr').find('.vente_id').text();
        //console.log(photo);
        

        swal({
        title: "Voulez vous vraiment supprimer cette vente ?",
        text: "Une fois supprimer, vous ne pouvez plus récupérer cette donnée!",
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
                'delete_vente': true,
                'vente_id': vente_id,
                },
                success: function (response) {
                    // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                    if (response === 'success') {
                        swal("Succès!", "Vente supprimé avec succès.", "success").then((result) => {
                            location.reload();
                        });
                    } else {
                        swal("Erreur!", "Une erreur s'est produite lors de la suppression de la vente.", "error").then((result) => {
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


//==================================================================================================
//                              TRAITEMENT DES ENTREES                                             =
//==================================================================================================
// fonction pour la vérification des entrées 
$(document).ready(function() {
    // Ajouter un événement de saisie sur le champ de quantité
    $('.produit').on('input', function (e) {
        e.preventDefault();

        var date_entree = $(this).closest('form').find('.date_entree').val();
        var motif = $(this).closest('form').find('.motif').val();
        var produit = $(this).val();
        //console.log(quantite);
  
        $.ajax({
            type: "POST",
            url: "../functions/functions.php",
            data: {
            'checking_entree': true,
            'date_entree': date_entree,
            'produit': produit,
            },
            success: function(response) {
                if (response === 'exist') {
                    swal("Attention!", "L'entrée de ce produit dans cette date existe déjà dans la base de données.", "warning");
                }  else if (response === 'error') {
                    swal("Attention!", "Cette vente n'existe pas. Vous ne pouvez pas ajouter une vente qui n'a pas été effectué comme entrée !", "warning");
                }
                else {
                    // Remplir le champ "prix unitaire" avec le prix récupéré
                    var total_quantite = parseFloat(response);
                    $('.quantite_entree').val(total_quantite);
                }   
            }
        });

    });
  });

//================================== Traité Ajouté et Alerter pour une entrée =============================
$(document).ready(function () {
                
    $('.add-entree').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('checking_addentree', true);
        form_data.append('date_entree', $('.date_entree').val());
        form_data.append('produit', $('.produit').val());
        form_data.append('motif', $('.motif').val());
        form_data.append('quantite_entree', $('.quantite_entree').val());
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
                    swal("Succès!", "Entrée ajoutée avec succès.", "success");
                } else {
                    swal("Erreur!", "Une erreur s'est produite lors de l'insertion de l'entrée.", "error");
                }     
            }
        });

    });
});


//========================================= pour préremplir les champs ==============================
            // pour récupérer le id d'entrée
            $(document).ready(function () {
                
                $('.update-entree').click(function (e) {
                    e.preventDefault();

                    var entree_id = $(this).closest('tr').find('.entree_id').text();
                    //console.log(entree_id);
                    
                    $.ajax({
                        type: "POST",
                        url: "../functions/functions.php",
                        data: {
                            'checking_update_entree': true,
                            'entree_id': entree_id,
                        },
                        dataType: 'json',
                        success: function (response) {
                            // Préremplir les champs de formulaire dans le pop-up avec les valeurs renvoyées
                            $('.entree-id').val(response.id);
                            $('.date_entree').val(response.date);
                            $('.motif').val(response.motifs);
                            $('.produit').val(response.produit);
                            $('.quantite_entree').val(response.quantite);
                        }
                    });

                });
            });



//=========================== Pour modifier les information d'entrée ================================
$(document).ready(function () {
                
    $('.start-updateentree').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('start_updateentree', true);
        form_data.append('id', $('.entree-id').val());
        form_data.append('date', $('.date_entree').val());
        form_data.append('produit', $('.produit').val());
        form_data.append('motif', $('.motif').val());
        form_data.append('quantite_entree', $('.quantite_entree').val());

        var idLigneModifiee = $('.entree-id').val();
       
        
        $.ajax({
            type: "POST",
            url: "../functions/functions.php",
            data: form_data,
            processData: false,
            contentType: false,
            success: function (response) {
                // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                if (response === 'success') {
                    swal("Succès!", "Entrée modifiée avec succès.", "success");
                    var ligneModifiee = $("tr[data-id='" + idLigneModifiee + "']");
                    ligneModifiee.find(".date_entree").text($('.date_entree').val());
                    ligneModifiee.find(".produit_entree").text($('.produit').val());
                    ligneModifiee.find(".motif_entree").text($('.motif').val());
                    ligneModifiee.find(".quantite_entree").text($('.quantite_entree').val());
                } else {
                    swal("Erreur!", "Une erreur s'est produite lors de la modification de l'entrée.", "error");
                }
                
            }
        });

    });
});


//====================== Pour supprimer une entrée =====================================
$(document).ready(function () {
                
    $('.delete-entree').click(function (e) {
        e.preventDefault();


        var entree_id = $(this).closest('tr').find('.entree_id').text();
        //console.log(photo);
        

        swal({
        title: "Voulez vous vraiment supprimer cette entrée ?",
        text: "Une fois supprimer, vous ne pouvez plus récupérer cette donnée!",
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
                'delete_entree': true,
                'entree_id': entree_id,
                },
                success: function (response) {
                    // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                    if (response === 'success') {
                        swal("Succès!", "Entrée supprimé avec succès.", "success").then((result) => {
                            location.reload();
                        });
                    } else {
                        swal("Erreur!", "Une erreur s'est produite lors de la suppression de l'entrée.", "error").then((result) => {
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



//==================================================================================================
//                              TRAITEMENT DES SORTIES                                             =
//==================================================================================================
// fonction pour la vérification des entrées 
$(document).ready(function() {
    // Ajouter un événement de saisie sur le champ de quantité
    $('.produit_sortie').on('input', function (e) {
        e.preventDefault();

        var date_sortie = $(this).closest('form').find('.date_sortie').val();
        var fournisseur = $(this).closest('form').find('.fournisseur_achat').val();
        var produit = $(this).val();
        //console.log(fournisseur);
  
        $.ajax({
            type: "POST",
            url: "../functions/functions.php",
            data: {
            'checking_sortie': true,
            'date_sortie': date_sortie,
            'produit': produit,
            'fournisseur': fournisseur,
            },
            success: function(response) {
                if (response === 'exist') {
                    swal("Attention!", "La sortie de ce produit dans cette date existe déjà dans la base de données.", "warning");
                }  else if (response === 'error') {
                    swal("Attention!", "Ce stock n'existe pas. Vous ne pouvez pas ajouter un stock qui n'a pas été effectué comme sortie !", "warning");
                }
                else {
                    // Remplir le champ "prix unitaire" avec le prix récupéré
                    var total_quantite = parseFloat(response);
                    $('.quantite_sortie').val(total_quantite);
                }   
            }
        });

    });
  });


//================================== Traité Ajouté et Alerter pour une entrée =============================
$(document).ready(function () {
                
    $('.add-sortie').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('checking_addsortie', true);
        form_data.append('date_sortie', $('.date_sortie').val());
        form_data.append('fournisseur_achat', $('.fournisseur_achat').val());
        form_data.append('produit_sortie', $('.produit_sortie').val());
        form_data.append('motif_sortie', $('.motif_sortie').val());
        form_data.append('quantite_sortie', $('.quantite_sortie').val());
        form_data.append('fournisseur', $('.fournisseur').val());
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
                    swal("Succès!", "Sortie ajoutée avec succès.", "success");
                } else {
                    swal("Erreur!", "Une erreur s'est produite lors de l'insertion de la sortie.", "error");
                }     
            }
        });

    });
});


//========================================= pour préremplir les champs ==============================
            // pour récupérer le id de sortie
            $(document).ready(function () {
                
                $('.update-sortie').click(function (e) {
                    e.preventDefault();

                    var sortie_id = $(this).closest('tr').find('.sortie_id').text();
                    //console.log(sortie_id);
                    
                    $.ajax({
                        type: "POST",
                        url: "../functions/functions.php",
                        data: {
                            'checking_update_sortie': true,
                            'sortie_id': sortie_id,
                        },
                        dataType: 'json',
                        success: function (response) {
                            // Préremplir les champs de formulaire dans le pop-up avec les valeurs renvoyées
                            $('.sortie-id').val(response.id);
                            $('.date_sortie').val(response.date);
                            $('.motif_sortie').val(response.motifs);
                            $('.produit_sortie').val(response.produit);
                            $('.fournisseur_achat').val(response.fournisseur);
                            $('.quantite_sortie').val(response.quantite);
                        }
                    });

                });
            });


//=========================== Pour modifier les information de sortie ================================
$(document).ready(function () {
                
    $('.start-updatesortie').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('start_updatesortie', true);
        form_data.append('id', $('.sortie-id').val());
        form_data.append('date', $('.date_sortie').val());
        form_data.append('fournisseur', $('.fournisseur_achat').val());
        form_data.append('produit', $('.produit_sortie').val());
        form_data.append('motif', $('.motif_sortie').val());
        form_data.append('quantite_sortie', $('.quantite_sortie').val());
       
        
        $.ajax({
            type: "POST",
            url: "../functions/functions.php",
            data: form_data,
            processData: false,
            contentType: false,
            success: function (response) {
                // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                if (response === 'success') {
                    swal("Succès!", "Sortie modifiée avec succès.", "success").then((result) => {
                        location.reload();
                    });
                } else {
                    swal("Erreur!", "Une erreur s'est produite lors de la modification de la sortie.", "error");
                }
                
            }
        });

    });
});


//====================== Pour supprimer une entrée =====================================
$(document).ready(function () {
                
    $('.delete-sortie').click(function (e) {
        e.preventDefault();


        var sortie_id = $(this).closest('tr').find('.sortie_id').text();
        //console.log(photo);
        

        swal({
        title: "Voulez vous vraiment supprimer cette sortie ?",
        text: "Une fois supprimer, vous ne pouvez plus récupérer cette donnée!",
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
                'delete_sortie': true,
                'sortie_id': sortie_id,
                },
                success: function (response) {
                    // Afficher une alerte avec SweetAlert en fonction de la réponse renvoyée par le script PHP
                    if (response === 'success') {
                        swal("Succès!", "Sortie supprimé avec succès.", "success").then((result) => {
                            location.reload();
                        });
                    } else {
                        swal("Erreur!", "Une erreur s'est produite lors de la suppression de la sortie.", "error").then((result) => {
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



//==================================================================================================
//                              TRAITEMENT DU BILAN JOURNALIER                                     =
//==================================================================================================
// pour la recherche dans le bilan journaliere
$(document).ready(function () {
                
    $('.product-journaliere').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('search_target_journaliere', true);
        form_data.append('product_name', $('.product_name').val());
       
        
        $.ajax({
            type: "POST",
            url: "../functions/functions.php",
            data: form_data,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                // Mettre à jour la partie de la page avec les résultats reçus
                $('#journaliere').html(response.ligne);
                $('#total-journaliere').html(response.total_journaliere);
                
                
            }
        });

    });
});



//====================== Pour supprimer la vue d'un bilan journalière =====================================
function supprimerLigne(id) {
    var ligne = document.getElementById(id);
    ligne.parentNode.removeChild(ligne);
  }
  



//==================================================================================================
//                              TRAITEMENT DU BILAN MENSUEL                                        =
//==================================================================================================
// soumettre le formulaire de sélection de mois au changement
$(document).ready(function() {
    // Sélectionner le formulaire
    var form = $('#form-ventes');
  
    // Ajouter un gestionnaire d'événements change() sur la liste de sélection de mois
    $('.mois').change(function() {
      // Soumettre le formulaire lorsque la sélection change
      form.submit();
    });
});
  


  // récupérer les informatios dans le formulaire et traité avec ajax pour renvoyer les lignes de ventes sans
  // récharger la page
$(function() {
    // Soumission du formulaire
    $('#form-ventes').on('submit', function(e) {
      // Empêcher la soumission normale du formulaire
      e.preventDefault();

      // Récupérer les données du formulaire
      var formData = $(this).serialize();

      // Envoyer une requête AJAX pour mettre à jour les résultats
      $.ajax({
        url: '../functions/functions.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(data) {
          // Mettre à jour la partie de la page avec les résultats reçus
          $('#resultats').html(data.ligne);
          $('#mensuel').html(data.total_mensuel);
          $('#target').val(data.mois);
          //console.log(data.mois);
        }
      });
    });
});






//==================================================================================================
//                              TRAITEMENT DU BILAN HEBDOMADAIRE                                   =
//==================================================================================================
// fonction pour selectionner les ventes dans un intervalle de temps
$(document).ready(function () {
                
    $('.search-hebdo').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('date_from_to', true);
        form_data.append('date_from', $('.date_from').val());
        form_data.append('date_to', $('.date_to').val());
       
       
        
        $.ajax({
            type: "POST",
            url: "../functions/functions.php",
            data: form_data,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                // Mettre à jour la partie de la page avec les résultats reçus
                $('#hebdomadaire').html(response.ligne);
                $('#total-hebdomadaire').html(response.total_hebdomadaire);
                $('#date-from').html(response.date_from);
                $('#date-to').html(response.date_to);
                
            }
        });

    });
});

// fonction pour la recherche dans le bilan hebdomadaire et le bilan mensuel
$(document).ready(function () {
                
    $('.product-hebdomadaire').click(function (e) {
        e.preventDefault();


        var form_data = new FormData();
        form_data.append('search_target_hebdomadaire', true);
        form_data.append('product_name', $('.product_name').val());
        form_data.append('date_from', $('.date_from').val());
        form_data.append('date_to', $('.date_to').val());
        form_data.append('target_mois', $('.target_mois').val());
       
        
        $.ajax({
            type: "POST",
            url: "../functions/functions.php",
            data: form_data,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                // Mettre à jour la partie de la page avec les résultats reçus
                $('#hebdomadaire').html(response.ligne);
                $('#total-hebdomadaire').html(response.total_hebdomadaire);
                $('#resultats').html(response.ligne2);
                $('#mensuel').html(response.total_mensuel);
                
            }
        });

    });
});




//================================== NOTIFICATIONS ===================================
var delay = 60000; // Temps initial de 60 secondes
function checkNotifications() {
    // Code pour vérifier les notifications
    $.ajax({
        type: "POST",
        url: "../functions/functions.php",
        data: {
            'checking_notification': true,
        },
        dataType: 'json',
        success: function (response) {
            swal("Attention Pénurie!",response.message, "warning");
            // Augmenter le temps d'exécution de la fonction
            delay += 120000; // Ajouter 60 secondes
            setTimeout(checkNotifications, delay);
        }
    });
}

setTimeout(checkNotifications, delay); // Appel initial de la fonction après 60 secondes

