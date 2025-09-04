
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

    if ($conn) {
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Content-Type: application/json");
            header("Access-Control-Allow-Origin: *");
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $response[$i]['id'] = $row['id'];
                $response[$i]['libelle'] = $row['libelle'];
                $response[$i]['image'] = $row['image'];
                $response[$i]['description'] = $row['description'];
                $response[$i]['user_enreg'] = $row['user_enreg'];
                $response[$i]['created_at'] = $row['created_at'];
                $response[$i]['updated_at'] = $row['updated_at'];

                $i++;
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    } else {
        echo "Connexion échouée";
    }
