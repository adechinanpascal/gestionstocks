<?php

include_once('../includes/connect.php');


// fonction pour qu'un administrateur puisse se connecter
function admin_connexion() {
    global $con;

    if(isset($_POST['connexion'])) {
        $username = $_POST['username'];
        $password = $_POST['userpassword'];

        $select_query = "Select * from `admin` where nom_utilisateur='$username'";
        $result_query = mysqli_query($con, $select_query);
        $row = mysqli_fetch_assoc($result_query);

        $admin_id = $row['id'];
        $password_define = $row['password'];
        $username_deifne = $row['nom_utilisateur'];
        $email = $row['email'];
        

        if(password_verify($password, $password_define)) {
            session_start();
            $_SESSION['admin'] = [
                'id' => $admin_id,
                'username' => $username_deifne,
                'email' => $email,
            ];

            header('location:index.php');
        }else {
            echo "<span style='color: red;'>mot de passe ou nom d'utilisateur incorrecte</span>";
        }
    }
}

// fonction pour déconnecter l'adminstrateur
function admin_logout() {
    if(isset($_GET['logout'])) {
        session_destroy();
        echo "<script>window.open('auth-login.php','_self')</script>";
        //header('location:./auth-login.php');

    }
}

// fonction pour calculer le nombre de produis en stock
function count_stocks() {
    global $con;

    $query = "Select count(distinct designation) as total_stock from `stocks`";
    $execute = mysqli_query($con, $query);
    $check = mysqli_num_rows($execute);
    if($check > 0) {
        $row = mysqli_fetch_assoc($execute);
        $total_stock = $row['total_stock'];

        return $total_stock;
    }
    
}


// fonction pour calculer le nombre de client
function count_client() {
    global $con;

    $query = "Select count(*) as total_client from `clients`";
    $execute = mysqli_query($con, $query);
    $check = mysqli_num_rows($execute);
    if($check > 0) {
        $row = mysqli_fetch_assoc($execute);
        $total_client = $row['total_client'];

        return $total_client;
    }
    
}


// fonction pour calculer le nombre de fournisseur total
function count_fournisseur() {
    global $con;

    $query = "Select count(*) as total_fournisseur from `fournisseurs`";
    $execute = mysqli_query($con, $query);
    $check = mysqli_num_rows($execute);
    if($check > 0) {
        $row = mysqli_fetch_assoc($execute);
        $total_fournisseur = $row['total_fournisseur'];

        return $total_fournisseur;
    }
    
}

// fonction pour calculer le montant total de sortie
function total_sortie() {
    global $con;

    $query = "Select * from `sorties`";
    $execute = mysqli_query($con, $query);
    $check = mysqli_num_rows($execute);
    if($check > 0) {
        $total_sortie = 0;
   
        while($row = mysqli_fetch_assoc($execute)) {
        $id = $row['id'];
        $date = $row['date'];
        $motifs = $row['motifs'];
        $produit = $row['produit'];
        $fournisseur = $row['fournisseur_id'];
        $quantite = $row['quantite'];

            $select = "Select * from `stocks` where designation='$produit' and fournisseur_id=$fournisseur";
            $result = mysqli_query($con, $select);
            $rox = mysqli_fetch_assoc($result);
                $prix_unitaire = $rox['prix_unitaire'];

                $prix_total_sortie_unitaire = $prix_unitaire * $quantite;

                $total_sortie += $prix_total_sortie_unitaire;
            
        }
        $resultat_formate = number_format($total_sortie, 2, ',', '.');
        return $resultat_formate;
    }
    
}


// fonction pour calculer le montant total d'entrée
function total_entree() {
    global $con;

    $query = "Select * from `entrees`";
    $execute = mysqli_query($con, $query);
    $check = mysqli_num_rows($execute);
    if($check > 0) {
        $total_entree = 0;
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

        $prix_total_entree_unitaire = $prix_unitaire * $quantite;

        $total_entree += $prix_total_entree_unitaire;
        }
        $resultat_formate = number_format($total_entree, 2, ',', '.');
        return $resultat_formate;
    }
    
}

// fonction pour calculer le total vendu journali-rement
function total_journaliere() {
    global $con;

    $date = date('Y-m-d');
    $query = "Select * from `ventes` where date='$date'";
    $execute = mysqli_query($con, $query);
    $check = mysqli_num_rows($execute);
    if($check > 0) {
        $total_journaliere = 0;
        while($row = mysqli_fetch_assoc($execute)) {
                                                                
        $prix_total = $row['prix_total'];

        $total_journaliere += $prix_total;
        }
        $resultat_formate = number_format($total_journaliere, 2, ',', '.');
        return $resultat_formate;
    }
    
}


// fonction 
function total_mensuel() {
    global $con;
    // Récupération du mois sélectionné
    if (isset($_POST['mois'])) {
        $mois = $_POST['mois'];
    } else {
        $mois = date('F');
    }

    $mois_num = date("m", strtotime($mois));

    $requete = "Select * from `ventes` where DATE_FORMAT(date, '%m') = '$mois_num'";
    $resultat = mysqli_query($con, $requete);
    $check = mysqli_num_rows($resultat);

    if($check > 0) {
        $total_mensuel = 0;
        while ($row = mysqli_fetch_assoc($resultat)) {
            $prix_total = $row['prix_total'];

            $total_mensuel += $prix_total;
        }
        $resultat_formate = number_format($total_mensuel, 2, ',', '.');
        return $resultat_formate;
    }

    
}

// fonction pour calculer le gain total
function gain_total() {
    global $con;
    $total_sortie = 0;
    $total_entree = 0;

    $query = "Select * from `entrees`";
    $execute = mysqli_query($con, $query);
    $check = mysqli_num_rows($execute);
    if($check > 0) {
        
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

        $prix_total_entree_unitaire = $prix_unitaire * $quantite;

        $total_entree += $prix_total_entree_unitaire;
        }
    }


    $query = "Select * from `sorties`";
    $execute = mysqli_query($con, $query);
    $check = mysqli_num_rows($execute);
    if($check > 0) {
        
   
        while($row = mysqli_fetch_assoc($execute)) {
        $id = $row['id'];
        $date = $row['date'];
        $motifs = $row['motifs'];
        $produit = $row['produit'];
        $fournisseur = $row['fournisseur_id'];
        $quantite = $row['quantite'];

            $select = "Select * from `stocks` where designation='$produit' and fournisseur_id=$fournisseur";
            $result = mysqli_query($con, $select);
            $rox = mysqli_fetch_assoc($result);
                $prix_unitaire = $rox['prix_unitaire'];

                $prix_total_sortie_unitaire = $prix_unitaire * $quantite;

                $total_sortie += $prix_total_sortie_unitaire;
            
            }
        }
        $gain = $total_entree - $total_sortie;
        $resultat_formate = number_format($gain, 2, ',', '.');

        return $resultat_formate;

    
}












if(isset($_POST['checking_total_stock'])) {
    //============ fonction pour calculer automatiquement le total en stock du produit =======
    global $con;

    $designation = $_POST['designation'];
    $fournisseur = $_POST['fournisseur'];

    $query = "Select * from `stocks` where id=(Select max(id) from `stocks` where designation='$designation' and fournisseur_id=$fournisseur) and designation='$designation' and fournisseur_id=$fournisseur";
    $execute = mysqli_query($con, $query);

    if($execute) {
        $row = mysqli_fetch_assoc($execute);

        $data = array('total_stock' => $row['total_stock'],'stock_rest' => $row['stock_rest'],'prix' => $row['prix_unitaire']);

        // Encodez le tableau en JSON et renvoyez-le en réponse
        echo json_encode($data);

    } 

} elseif(isset($_POST['checking_addstock'])) {
    // ====================fonction qui permet d'ajouter un stock avec des données en ajax=======================
    global $con;
    $designation = $_POST['designation'];
        $fournisseur = $_POST['fournisseur'];
        $date_livraison = $_POST['date_livraison'];
        $date_exp = $_POST['date_exp'];
        $total_livre = $_POST['total_livre'];
        $total_stock = $_POST['total_stock'];
        $prix_unitaire = $_POST['prix_unitaire'];
        $stock_rest = $_POST['stock_rest'];

        // acceder à l'image
        $target_dir = "../stock_images/";
        $target_file = $target_dir . basename($_FILES["photo_stock"]["name"]);
        move_uploaded_file($_FILES["photo_stock"]["tmp_name"], $target_file);

    

        $insert_query = "insert into `stocks` (designation,photo,fournisseur_id,date_livraison,date_exp,total_livre,total_stock,prix_unitaire,stock_rest) 
        values ('$designation','$target_file',$fournisseur,'$date_livraison','$date_exp','$total_livre','$total_stock','$prix_unitaire','$stock_rest')";
        
        $result_query = mysqli_query($con, $insert_query);
        if($result_query) {
            echo 'success';
        } else {
            echo 'error';
        }
    
} elseif(isset($_POST['checking_update'])) {
    // ================fonction pour récupérer l'id à modifier et préremplir les champs=======================
    global $con;
    $stock_id = $_POST['stock_id'];

    $select_stock = "Select * from `stocks` where id=$stock_id";
    $query_result = mysqli_query($con, $select_stock);
    $row = mysqli_fetch_assoc($query_result);

    // Créez un tableau associatif avec les valeurs des champs de formulaire
    $data = array('id' => $row['id'],'designation' => $row['designation'], 'fournisseur' => $row['fournisseur_id'], 'date_livraison' => $row['date_livraison'],
    'date_exp' => $row['date_exp'], 'total_livre' => $row['total_livre'], 'total_stock' => $row['total_stock'], 
    'prix_unitaire' => $row['prix_unitaire'], 'stock_rest' => $row['stock_rest']);

    // Encodez le tableau en JSON et renvoyez-le en réponse
    echo json_encode($data);

    
    
} elseif(isset($_POST['start_update'])) {
    // ====================fonction pour la modification du stock=======================
    global $con;

    $stock_id = $_POST['id'];
    $designation = $_POST['designation'];
    $fournisseur = $_POST['fournisseur'];
    $date_livraison = $_POST['date_livraison'];
    $date_exp = $_POST['date_exp'];
    $total_livre = $_POST['total_livre'];
    $total_stock = $_POST['total_stock'];
    $prix_unitaire = $_POST['prix_unitaire'];
    $stock_rest = $_POST['stock_rest'];

    if(isset($_FILES["photo_stock"])) {

        // acceder à l'image
        $target_dir = "../stock_images/";
        $target_file = $target_dir . basename($_FILES["photo_stock"]["name"]);
        move_uploaded_file($_FILES["photo_stock"]["tmp_name"], $target_file);

        $update_query = "update `stocks` set designation='$designation',photo='$target_file',fournisseur_id='$fournisseur',date_livraison='$date_livraison',date_exp='$date_exp',
        total_livre='$total_livre',total_stock='$total_stock',prix_unitaire='$prix_unitaire',stock_rest='$stock_rest' where id=$stock_id";

        $result_query = mysqli_query($con, $update_query);
        if($result_query) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        $update_query = "update `stocks` set designation='$designation',fournisseur_id='$fournisseur',date_livraison='$date_livraison',date_exp='$date_exp',
        total_livre='$total_livre',total_stock='$total_stock',prix_unitaire='$prix_unitaire',stock_rest='$stock_rest' where id=$stock_id";

        $result_query = mysqli_query($con, $update_query);
        if($result_query) {
            echo "success";
        } else {
            echo "error";
        }
    }

    
} elseif(isset($_POST['delete_stock'])) {
    //================================= fonction pour supprimer un stock ======================
    global $con;

    $stock_id = $_POST['stock_id'];

    // supprimer maintenant le stock
    $delete_query = "delete from `stocks` where id=$stock_id";
    $result_query = mysqli_query($con, $delete_query);

    if($result_query) {
        echo "success";
    } else {
        echo "error";
    }


} elseif(isset($_POST['checking_addclients'])) {
    //============================================= CLIENT PANEL =======================================================
    //================================= fonction pour ajouter un client ======================
    global $con;

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $contacte = $_POST['contacte'];
    $email = $_POST['email'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $residence = $_POST['residence'];
    

    

        $insert_query = "insert into `clients` (nom,prenom,contacte,email,pays,ville,residence) 
        values ('$nom','$prenom','$contacte','$email','$pays','$ville','$residence')";
        
        $result_query = mysqli_query($con, $insert_query);
        if($result_query) {
            echo 'success';
        } else {
            echo 'error';
        }


} elseif(isset($_POST['checking_update_client'])) {
    //================== fonction pour préremplir les champs pour un client ==================
    global $con;

    $client_id = $_POST['client_id'];

    $select_client = "Select * from `clients` where id=$client_id";
    $query_result = mysqli_query($con, $select_client);
    $row = mysqli_fetch_assoc($query_result);

    // Créez un tableau associatif avec les valeurs des champs de formulaire
    $data = array('id' => $row['id'],'nom' => $row['nom'], 'prenom' => $row['prenom'], 'contacte' => $row['contacte'],
    'email' => $row['email'], 'pays' => $row['pays'], 'ville' => $row['ville'], 
    'residence' => $row['residence']);

    // Encodez le tableau en JSON et renvoyez-le en réponse
    echo json_encode($data);

} elseif(isset($_POST['start_updateclient'])) {
    //==================== fonction pour modifier un client ===================
    global $con;

    $client_id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $contacte = $_POST['contacte'];
    $email = $_POST['email'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $residence = $_POST['residence'];

   
    $update_query = "update `clients` set nom='$nom',prenom='$prenom',contacte='$contacte',email='$email',pays='$pays',
    ville='$ville',residence='$residence' where id=$client_id";

    $result_query = mysqli_query($con, $update_query);
    if($result_query) {
        echo "success";
    } else {
        echo "error";
    }
    
} elseif(isset($_POST['delete_client'])) {
    //======================= fonction pour supprimer un client ===========================
    global $con;

    $client_id = $_POST['client_id'];

    $delete_query = "delete from `clients` where id=$client_id";
    $result_query = mysqli_query($con, $delete_query);
    if($result_query) {
        echo "success";
    } else {
        echo "error";
    }

} elseif(isset($_POST['checking_addfournisseur'])) {
    //======================================== PANEL FOURNISSEUR ==================================================
    //======================== fonction pour ajouter un fournisseur =========================
    global $con;

    $nom = $_POST['nom'];
    $contacte = $_POST['contacte'];
    $email = $_POST['email'];
    $produit_fournit = $_POST['produit_fournit'];
    

        $insert_query = "insert into `fournisseurs` (nom,contacte,email,produit_fournit) 
        values ('$nom','$contacte','$email','$produit_fournit')";
        
        $result_query = mysqli_query($con, $insert_query);
        if($result_query) {
            echo 'success';
        } else {
            echo 'error';
        }

} elseif(isset($_POST['checking_update_fourn'])) {
    //================== fonction pour préremplir les champs pour un fournisseur ==================
    global $con;

    $fournisseur_id = $_POST['fournisseur_id'];

    $select_client = "Select * from `fournisseurs` where id=$fournisseur_id";
    $query_result = mysqli_query($con, $select_client);
    $row = mysqli_fetch_assoc($query_result);

    // Créez un tableau associatif avec les valeurs des champs de formulaire
    $data = array('id' => $row['id'],'nom' => $row['nom'], 'contacte' => $row['contacte'],
    'email' => $row['email'], 'produit_fournit' => $row['produit_fournit']);

    // Encodez le tableau en JSON et renvoyez-le en réponse
    echo json_encode($data);

} elseif(isset($_POST['start_updatefourn'])) {
    //==================== fonction pour modifier un fournisseur ===================
    global $con;

    $fournisseur_id = $_POST['id'];
    $nom = $_POST['nom'];
    $contacte = $_POST['contacte'];
    $email = $_POST['email'];
    $produit_fournit = $_POST['produit_fournit'];

   
    $update_query = "update `fournisseurs` set nom='$nom',contacte='$contacte',email='$email',produit_fournit='$produit_fournit' where id=$fournisseur_id";

    $result_query = mysqli_query($con, $update_query);
    if($result_query) {
        echo "success";
    } else {
        echo "error";
    }

} elseif(isset($_POST['delete_fournisseur'])) {
    //======================= fonction pour supprimer un fournisseur ===========================
    global $con;

    $fournisseur_id = $_POST['fournisseur_id'];

    $delete_query = "delete from `fournisseurs` where id=$fournisseur_id";
    $result_query = mysqli_query($con, $delete_query);
    if($result_query) {
        echo "success";
    } else {
        echo "error";
    }

} elseif(isset($_POST['checking_total_price'])) {
    //================================================= PANEL VENTES ===============================================
    //================ fonction pour automatisé le calcul de prix total d'une vente=========
    global $con;
    $nom_produit = $_POST['nom_produit'];

    $query = "Select * from `stocks` where designation='$nom_produit'";
    $execute = mysqli_query($con, $query);
    $check_rows = mysqli_num_rows($execute);

    if($check_rows > 0) {
        echo "success";
    } else {
        echo "error";
    }

} elseif(isset($_POST['checking_addvente'])) {
    //================ fonction pour ajouter une vente =========
    global $con;

    $date = $_POST['date'];
    $type_client = $_POST['type_client'];
    $nom_client = $_POST['nom_client'];
    $contacte = $_POST['contacte'];
    $nom_produit = $_POST['nom_produit'];
    $quantite = $_POST['quantite'];
    $prix_unitaire = $_POST['prix_unitaire'];
    $prix_total = $_POST['prix_total'];
    $code_bare = $_POST['code_bare'];
    

        $insert_query = "insert into `ventes` (date,type_client,nom_client,contacte,code_bare,nom_produit,quantite,prix_unitaire,prix_total) 
        values ('$date','$type_client','$nom_client','$contacte','$code_bare','$nom_produit',$quantite,'$prix_unitaire','$prix_total')";
        
        $result_query = mysqli_query($con, $insert_query);

        $query = "update `stocks` set stock_rest = stock_rest - $quantite where id=(Select max(id) from `stocks` where designation='$nom_produit') and designation='$nom_produit'";
        $execute = mysqli_query($con, $query);

        if($result_query and $execute) {
            echo 'success';
        } else {
            echo 'error';
        }

} elseif(isset($_POST['checking_update_vente'])) {
    //================ fonction pour préremplir les champs =========
    global $con;

    $vente_id = $_POST['vente_id'];

    $select_client = "Select * from `ventes` where id=$vente_id";
    $query_result = mysqli_query($con, $select_client);
    $row = mysqli_fetch_assoc($query_result);

    // Créez un tableau associatif avec les valeurs des champs de formulaire
    $data = array('id' => $row['id'],'date' => $row['date'], 'type_client' => $row['type_client'], 'nom_client' => $row['nom_client'],
    'contacte' => $row['contacte'], 'code_bare' => $row['code_bare'], 'nom_produit' => $row['nom_produit'], 'quantite' => $row['quantite'], 
    'prix_unitaire' => $row['prix_unitaire'], 'prix_total' => $row['prix_total']);

    // Encodez le tableau en JSON et renvoyez-le en réponse
    echo json_encode($data);
    
} elseif(isset($_POST['start_updatevente'])) {
    //================ fonction pour modofier une vente =========
    global $con;

    $vente_id = $_POST['id'];
    $date = $_POST['date'];
    $type_client = $_POST['type_client'];
    $nom_client = $_POST['nom_client'];
    $contacte = $_POST['contacte'];
    $nom_produit = $_POST['nom_produit'];
    $quantite = $_POST['quantite'];
    $prix_unitaire = $_POST['prix_unitaire'];
    $prix_total = $_POST['prix_total'];
    $code_bare = $_POST['code_bare'];

   
    $update_query = "update `ventes` set date='$date',type_client='$type_client',nom_client='$nom_client',contacte='$contacte',code_bare='$code_bare',
    nom_produit='$nom_produit',quantite='$quantite',prix_unitaire='$prix_unitaire',prix_total=$prix_total where id=$vente_id";

    $result_query = mysqli_query($con, $update_query);
    if($result_query) {
        echo "success";
    } else {
        echo "error";
    }

} elseif(isset($_POST['delete_vente'])) {
    //================ fonction pour supprimer une vente =========
    global $con;

    $vente_id = $_POST['vente_id'];
    // selectionner d'abord la vente à supprimer
    $select_client = "Select * from `ventes` where id=$vente_id";
    $query_result = mysqli_query($con, $select_client);
    $row = mysqli_fetch_assoc($query_result);
    $nom_produit = $row['nom_produit'];
    $quantite = $row['quantite'];

    // supprimer maintenant la vente
    $delete_query = "delete from `ventes` where id=$vente_id";
    $result_query = mysqli_query($con, $delete_query);
    // rajouter la quantité à la quantité restante
    $query = "update `stocks` set stock_rest = stock_rest + $quantite where id=(Select max(id) from `stocks` where designation='$nom_produit') and designation='$nom_produit'";
    $execute = mysqli_query($con, $query);

    if($result_query and $query) {
        echo "success";
    } else {
        echo "error";
    }

} elseif(isset($_POST['checking_entree'])) {
    //==================================== PANEL ENTREE ==========================================================
    // fonction pour préremplir les champs et vérifie pour une entrée
    global $con;

    //$date_entree = $_POST['date_entree'];
    $date_entree = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_entree'])));
    $produit = $_POST['produit'];


    $exist_query = "Select * from `entrees` where date='$date_entree' and produit='$produit'";
    $exist_result = mysqli_query($con, $exist_query);
    $exist_rows = mysqli_num_rows($exist_result);

    if($exist_rows > 0) {
        echo "exist";
    } else {
        $check_query = "Select * from `ventes` where date='$date_entree' and nom_produit='$produit'";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);

        if($check_rows > 0) {
            $quantite_query = "Select COALESCE(sum(quantite), 0) as total_quantite from `ventes` where date='$date_entree' and nom_produit='$produit'";
            $quantite_result = mysqli_query($con, $quantite_query);
            $rows = mysqli_fetch_assoc($quantite_result);
            $total_quantite = $rows['total_quantite'];

            echo $total_quantite;
        } else {
            echo "error";
        }
    }

    
} elseif(isset($_POST['checking_addentree'])) {
    //=================== fonction pour ajouter une entrée
    global $con;

    $date_entree = $_POST['date_entree'];
    $produit = $_POST['produit'];
    $motif = $_POST['motif'];
    $quantite_entree = $_POST['quantite_entree'];
    

        $insert_query = "insert into `entrees` (date,motifs,produit,quantite) 
        values ('$date_entree','$motif','$produit',$quantite_entree)";
        
        $result_query = mysqli_query($con, $insert_query);
        if($result_query) {
            echo 'success';
        } else {
            echo 'error';
        }

} elseif(isset($_POST['checking_update_entree'])) {
    // fonction pour préremplir les champs
    global $con;

    $entree_id = $_POST['entree_id'];

    $select_entree = "Select * from `entrees` where id=$entree_id";
    $query_result = mysqli_query($con, $select_entree);
    $row = mysqli_fetch_assoc($query_result);

    // Créez un tableau associatif avec les valeurs des champs de formulaire
    $data = array('id' => $row['id'],'date' => $row['date'], 'motifs' => $row['motifs'],
    'produit' => $row['produit'], 'quantite' => $row['quantite']);

    // Encodez le tableau en JSON et renvoyez-le en réponse
    echo json_encode($data);

} elseif(isset($_POST['start_updateentree'])) {
    //============ fonction pour modifier une entrée ====================
    global $con;

    $entree_id = $_POST['id'];
    $date = $_POST['date'];
    $produit = $_POST['produit'];
    $motif = $_POST['motif'];
    $quantite_entree = $_POST['quantite_entree'];

   
    $update_query = "update `entrees` set date='$date',motifs='$motif',produit='$produit',quantite=$quantite_entree where id=$entree_id";

    $result_query = mysqli_query($con, $update_query);
    if($result_query) {
        echo "success";
    } else {
        echo "error";
    }

} elseif(isset($_POST['delete_entree'])) {
    //================ fonction pour supprimer une entrée ======================
    global $con; 

    $entree_id = $_POST['entree_id'];

    $delete_query = "delete from `entrees` where id=$entree_id";
    $result_query = mysqli_query($con, $delete_query);
    if($result_query) {
        echo "success";
    } else {
        echo "error";
    }

} elseif(isset($_POST['checking_sortie'])) {
    //===================================== PANEL SORTIES ======================================================
    //=============== fonctions pour vérifier les sortie =================
    global $con;

    $date_sortie = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_sortie'])));
    $produit = $_POST['produit'];
    $fournisseur = $_POST['fournisseur'];


    $exist_query = "Select * from `sorties` where date='$date_sortie' and produit='$produit' and fournisseur_id=$fournisseur";
    $exist_result = mysqli_query($con, $exist_query);
    $exist_rows = mysqli_num_rows($exist_result);

    if($exist_rows > 0) {
        echo "exist";
    } else {
        $check_query = "Select * from `stocks` where date_livraison='$date_sortie' and designation='$produit' and fournisseur_id=$fournisseur";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);

        if($check_rows > 0) {
            $quantite_query = "Select COALESCE(sum(total_livre), 0) as total_quantite from `stocks` where date_livraison='$date_sortie' and designation='$produit' and fournisseur_id=$fournisseur";
            $quantite_result = mysqli_query($con, $quantite_query);
            $rows = mysqli_fetch_assoc($quantite_result);
            $total_quantite = $rows['total_quantite'];

            echo $total_quantite;
        } else {
            echo "error";
        }
    }


} elseif(isset($_POST['checking_addsortie'])) {
    //===================== fonction pour ajouté une sortie ===============
    global $con;

    $date_sortie = $_POST['date_sortie'];
    $fournisseur_achat = $_POST['fournisseur_achat'];
    $produit = $_POST['produit_sortie'];
    $motif = $_POST['motif_sortie'];
    $quantite_sortie = $_POST['quantite_sortie'];
    $fournisseur = $_POST['fournisseur'];
    

        $insert_query = "insert into `sorties` (date,motifs,produit,fournisseur_id,quantite) 
        values ('$date_sortie','$motif','$produit',$fournisseur_achat,$quantite_sortie)";
        
        $result_query = mysqli_query($con, $insert_query);
        if($result_query) {
            echo 'success';
        } else {
            echo 'error';
        }

} elseif(isset($_POST['checking_update_sortie'])) {
    //================== fonction pour préremplir les champs ============
    global $con;

    $sortie_id = $_POST['sortie_id'];

    $select_entree = "Select * from `sorties` where id=$sortie_id";
    $query_result = mysqli_query($con, $select_entree);
    $row = mysqli_fetch_assoc($query_result);

    // Créez un tableau associatif avec les valeurs des champs de formulaire
    $data = array('id' => $row['id'],'date' => $row['date'], 'motifs' => $row['motifs'],
    'produit' => $row['produit'], 'fournisseur' => $row['fournisseur_id'], 'quantite' => $row['quantite']);

    // Encodez le tableau en JSON et renvoyez-le en réponse
    echo json_encode($data);

} elseif(isset($_POST['start_updatesortie'])) {
    //============= fonction pour modifier une sortie ==================
    global $con;

    $sortie_id = $_POST['id'];
    $date = $_POST['date'];
    $fournisseur = $_POST['fournisseur'];
    $produit = $_POST['produit'];
    $motif = $_POST['motif'];
    $quantite_sortie = $_POST['quantite_sortie'];

   
    $update_query = "update `sorties` set date='$date',motifs='$motif',produit='$produit',fournisseur_id=$fournisseur,quantite=$quantite_sortie where id=$sortie_id";

    $result_query = mysqli_query($con, $update_query);
    if($result_query) {
        echo "success";
    } else {
        echo "error";
    }

} elseif(isset($_POST['delete_sortie'])) {
    //============ fonction pour supprimer une sortie ================
    global $con;

    $sortie_id = $_POST['sortie_id'];

    $delete_query = "delete from `sorties` where id=$sortie_id";
    $result_query = mysqli_query($con, $delete_query);
    if($result_query) {
        echo "success";
    } else {
        echo "error";
    }


} elseif(isset($_POST['mois'])) {
    // Récupération des ventes du mois dans la base de données
    global $con;
    $mois = $_POST['mois'];

    $mois_num = date("m", strtotime($mois));

    $requete = "Select * from `ventes` where DATE_FORMAT(date, '%m') = '$mois_num'";
    $resultat = mysqli_query($con, $requete);
  
    $total_mensuel = 0;
    $ligne = "";
    while($row = mysqli_fetch_assoc($resultat)) {
        $id = $row['id'];
        $nom_produit = $row['nom_produit'];
        $quantite = $row['quantite'];
        $prix_unitaire = $row['prix_unitaire'];
        $prix_total = $row['prix_total'];

        $total_mensuel += $prix_total;

        $ligne .= "<tr id='$id'>
        <td>
             $id
        </td>
        <td>$nom_produit</td>
        <td>$quantite</td>
        <td>$prix_unitaire</td>
        <td>$prix_total</td>
        <td>
            
            <a onclick='supprimerLigne($id)' class='btn btn-outline-danger btn-sm edit' title='Edit'>
                <i class='fas fa-times'></i>
            </a>
        </td>
        </tr>";
    }
    $total_mensuel_formate = number_format($total_mensuel, 2, ',', '.');
    $data = array('ligne' => $ligne,'total_mensuel' => $total_mensuel_formate, 'mois' => $mois_num);

    // Encodez le tableau en JSON et renvoyez-le en réponse
    echo json_encode($data);
    
  
  } elseif(isset($_POST['date_from_to'])) {
    //================= fonction pour selectionner les ventes hebdomadaire===========
    global $con;

    $date_from = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_from']))); 
    $date_to = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_to'])));

    $query = "Select * from `ventes` where date between '$date_from' AND '$date_to'";
    $execute = mysqli_query($con, $query);

    $total_hebdomadaire = 0;
    $ligne = "";
    while($row = mysqli_fetch_assoc($execute)) {
        $id = $row['id'];
        $nom_produit = $row['nom_produit'];
        $quantite = $row['quantite'];
        $prix_unitaire = $row['prix_unitaire'];
        $prix_total = $row['prix_total'];

        $total_hebdomadaire += $prix_total;

        $ligne .= "<tr id='$id'>
        <td>
             $id
        </td>
        <td>
            <p>$date_from à $date_to</p>
        
        </td>
        <td>$nom_produit</td>
        <td>$quantite</td>
        <td>$prix_unitaire</td>
        <td>$prix_total</td>
        <td>
            
            <a onclick='supprimerLigne($id)' class='btn btn-outline-danger btn-sm edit' title='Edit'>
                <i class='fas fa-times'></i>
            </a>
        </td>
        </tr>";
    }
    $total_hebdomadaire_formate = number_format($total_hebdomadaire, 2, ',', '.');
    $data = array('ligne' => $ligne,'total_hebdomadaire' => $total_hebdomadaire_formate, 'date_from' => $date_from, 'date_to' => $date_to);

    // Encodez le tableau en JSON et renvoyez-le en réponse
    echo json_encode($data);

  } elseif(isset($_POST['search_target_journaliere'])) {
    //=========== fonction pour la recherche dans le bilan journalière =========
    global $con;

    $mot = $_POST['product_name'];
    $date = date('Y-m-d');

    $query = "Select * from `ventes` where nom_produit like '%$mot%' and date='$date'";
    $execute = mysqli_query($con, $query);

    $total_journaliere = 0;
    $ligne = "";
    while($row = mysqli_fetch_assoc($execute)) {
        $id = $row['id'];
        $date = $row['date'];
        $nom_produit = $row['nom_produit'];
        $quantite = $row['quantite'];
        $prix_unitaire = $row['prix_unitaire'];
        $prix_total = $row['prix_total'];

        $total_journaliere += $prix_total;

        $ligne .= "<tr id='$id'>
        <td>
             $id
        </td>
        <td>$date</td>
        <td>$nom_produit</td>
        <td>$quantite</td>
        <td>$prix_unitaire</td>
        <td>$prix_total</td>
        <td>
            
            <a onclick='supprimerLigne($id)' class='btn btn-outline-danger btn-sm edit' title='Edit'>
                <i class='fas fa-times'></i>
            </a>
        </td>
        </tr>";
    }
    $total_journaliere_formate = number_format($total_journaliere, 2, ',', '.');
    $data = array('ligne' => $ligne,'total_journaliere' => $total_journaliere_formate);

    // Encodez le tableau en JSON et renvoyez-le en réponse
    echo json_encode($data);


} elseif(isset($_POST['search_target_hebdomadaire'])) {
    //=========== fonction pour rechercher dans le bilan hebdomadaire et le bilan mensuel =============
    //=================== HEBDOMADAIRE ================
    global $con;

    $date_from = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_from']))); 
    $date_to = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_to'])));
    $mot = $_POST['product_name'];
    

    $query = "Select * from `ventes` where nom_produit like lower('%$mot%') and date between '$date_from' AND '$date_to'";
    $execute = mysqli_query($con, $query);

    $total_hebdomadaire = 0;
    $ligne = "";
    while($row = mysqli_fetch_assoc($execute)) {
        $id = $row['id'];
        $nom_produit = $row['nom_produit'];
        $quantite = $row['quantite'];
        $prix_unitaire = $row['prix_unitaire'];
        $prix_total = $row['prix_total'];

        $total_hebdomadaire += $prix_total;

        $ligne .= "<tr id='$id'>
        <td>
             $id
        </td>
        <td>
            <p>$date_from à $date_to</p>
        
        </td>
        <td>$nom_produit</td>
        <td>$quantite</td>
        <td>$prix_unitaire</td>
        <td>$prix_total</td>
        <td>
            
            <a onclick='supprimerLigne($id)' class='btn btn-outline-danger btn-sm edit' title='Edit'>
                <i class='fas fa-times'></i>
            </a>
        </td>
        </tr>";
    }
    $total_hebdomadaire_formate = number_format($total_hebdomadaire, 2, ',', '.');

    //=============== MENSUEL =====================
    $target_mois = $_POST['target_mois'];

    $requete = "Select * from `ventes` where nom_produit like lower('%$mot%') and month(date) = $target_mois";
    $resultat = mysqli_query($con, $requete);
  
    $total_mensuel = 0;
    $ligne2 = "";
    while($row = mysqli_fetch_assoc($resultat)) {
        $id = $row['id'];
        $nom_produit = $row['nom_produit'];
        $quantite = $row['quantite'];
        $prix_unitaire = $row['prix_unitaire'];
        $prix_total = $row['prix_total'];

        $total_mensuel += $prix_total;

        $ligne2 .= "<tr id='$id'>
        <td>
             $id
        </td>
        <td>$nom_produit</td>
        <td>$quantite</td>
        <td>$prix_unitaire</td>
        <td>$prix_total</td>
        <td>
            
            <a onclick='supprimerLigne($id)' class='btn btn-outline-danger btn-sm edit' title='Edit'>
                <i class='fas fa-times'></i>
            </a>
        </td>
        </tr>";
    }
    $total_mensuel_formate = number_format($total_mensuel, 2, ',', '.');

    

    $data = array('ligne' => $ligne, 'ligne2' => $ligne2, 'total_hebdomadaire' => $total_hebdomadaire_formate, 'total_mensuel' => $total_mensuel_formate);

    // Encodez le tableau en JSON et renvoyez-le en réponse
    echo json_encode($data);


  } elseif(isset($_POST['checking_notification'])) {
    //======================= NOTIFICATIONS ===========================================================
    global $con;

    $query = "Select distinct(designation, fournisseur_id) from `stocks` where stock_rest < 15 and id=(Select max(id) from `stocks`)";
    $execute = mysqli_query($con, $query);
    $check = mysqli_num_rows($execute);

    $contenu = "";
    if($check > 0) {
        while($row = mysqli_fetch_assoc($execute)) {
            $designation = $row['designation'];
            //$title = "Pénurie";
            //$message = "Le produit ".$designation." est en pénurie de stock.";
 
            //$query = "insert into `notifications` (title,message,produit,date) values ('$title','$message','$designation',NOW())";
            //$execute = mysqli_query($con, $query);
            $contenu .= $designation.", ";
        }
        $message = "Le".(($check > 1)? "s " : " ")."produit".(($check > 1)? "s " : " ").$contenu.(($check > 1)? " sont " : " est")." en pénurie".(($check > 1)? "s " : " ")."de stock";
        $data = array('message' => $message);

        // Encodez le tableau en JSON et renvoyez-le en réponse
        echo json_encode($data);
    }
    
    
  }
  



?>