<?php 
	/*Fonctions-modèle réalisant les requètes de gestion des contacts en base de données*/
	
	// liste_contact_bd : retourne la liste des informations pour chaque contact de l'utilisateur $id
	
	function contacts($idn) {
		require ("Modele/connectBD.php") ; 
		$sql="SELECT c.id_nom, nom, prenom, email FROM contact c, utilisateur u 
		WHERE c.id_nom=:id_nom AND c.id_contact = u.id_nom
		LIMIT 0,30"; // LIMIT ne marche pas en MS SQL SERVER
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':id_nom', $idn);
			$bool = $commande->execute();
			$C= array();
			if ($bool) {
				while ($c = $commande->fetch()) {

					$C[] = $c; //stockage dans $C des enregistrements sélectionnés
				}	
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
		return $C;
	}
?>
