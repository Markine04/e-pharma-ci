
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "sihapp";
    //On essaie de se connecter
    try {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    }catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>
