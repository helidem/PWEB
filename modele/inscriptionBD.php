<?php

function create_new($nom,$num,$prenom,$mail,&$profil) {
    require ("modele/connectBD.php");

    $sql = "INSERT INTO `utilisateur` (nom, prenom, num, email) VALUES (:nom ,:prenom,:num,:mail)";

    $commande = $pdo->prepare($sql);
    $commande->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':num' => $num,
        ':mail' => $mail
    ]);
    return true;
}

function verif_existant ($mail) {
    require ("modele/connectBD.php");
    $sql= 'SELECT * FROM utilisateur  where email=:mail';

    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':mail', $mail);

        $bool = $commande->execute();

        if ($bool)
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements

        if (count($resultat)== 0) return false;
        else return true;
    }

    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }
}
?>