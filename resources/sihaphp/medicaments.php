
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "sihapp";
    //On essaie de se connecter
    try {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    $response = array();

    if($conn){
        $sql = "SELECT * FROM medicaments";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("Content-Type: application/json");
            header("Access-Control-Allow-Origin: *");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['id'] = $row['id'];
                $response[$i]['code_barre'] = $row['code_barre'];
                $response[$i]['nom'] = $row['nom'];
                $response[$i]['principe_actif'] = $row['principe_actif'];
                $response[$i]['dosage'] = $row['dosage'];
                $response[$i]['forme_galenique'] = $row['forme_galenique'];
                $response[$i]['categorie_id'] = $row['categorie_id'];
                $response[$i]['fournisseur_id'] = $row['fournisseur_id'];
                $response[$i]['prix_achat'] = $row['prix_achat'];
                $response[$i]['prix_vente'] = $row['prix_vente'];
                $response[$i]['taux_tva'] = $row['taux_tva'];
                $response[$i]['besoin_ordonnance'] = $row['besoin_ordonnance'];
                $response[$i]['conditionnement'] = $row['conditionnement'];
                $response[$i]['temperature_conservation'] = $row['temperature_conservation'];
                $response[$i]['description'] = $row['description'];
                $response[$i]['user_enreg'] = $row['user_enreg'];
                $response[$i]['created_at'] = $row['created_at'];
                $response[$i]['updated_at'] = $row['updated_at'];

                $i++;
            }
            echo json_encode($response,JSON_PRETTY_PRINT);
        }

    }else{
        echo "Connexion échouée";
    }
    
