<?php

function create_new($nom,$num,$prenom,$email,&$profil) {
    require ("modele/connectBD.php");

    $sql = "INSERT INTO `utilisateur` (nom, prenom, num, email) VALUES (:nom ,:prenom,:num,:email)";

    $commande = $pdo->prepare($sql);
    $commande->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':num' => $num,
        ':email' => $email
    ]);
    return true;
}

function verif_existant ($email) {
    require ("modele/connectBD.php");
    $sql= 'SELECT * FROM utilisateur  where email=:email';

    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':email', $email);

        $bool = $commande->execute();

        if ($bool) {
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
            // var_dump($resultat); die();
            while ($ligne = $commande->fetch()) { // ligne par ligne
                print_r($ligne);
            }
        }

        if (count($resultat)== 0) return false;
        else return true;
    }

    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }
}

?>