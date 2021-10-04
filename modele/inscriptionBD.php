<?php

$nom=  isset($_POST['nom'])?($_POST['nom']):'';
$prenom=  isset($_POST['prenom'])?($_POST['prenom']):'';
$num=  isset($_POST['num'])?($_POST['num']):'';
$mail=  isset($_POST['email'])?($_POST['email']):'';
$msg='';

if  (count($_POST)==0)
    require ("vue/utilisateur/inscription.tpl") ;
else {
    create_new($nom,$num,$prenom,$mail);
}

function create_new($nom,$num,$prenom,$mail) {
    require ("modele/connectBD.php");

    $sql = "INSERT INTO `utilisateur` (nom, prenom, num, email) VALUES (:nom ,:prenom,:num,:mail)";

    if(verif_existant($mail)){ // si l'utilisateur existe deja
        return false;
    }

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

    if (count($resultat)== 0) return false;
    else return true;
}

?>