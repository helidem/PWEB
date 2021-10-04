<?php 
	/*controleur utilisateur.php :
		fonctions-action de gestion des utilisateurs
	*/
	
	function ident () {
		$nom=isset($_POST['nom'])?trim($_POST['nom']):''; // trim pour enlever les espaces avant et apres
		$num=isset($_POST['num'])?trim($_POST['num']):'';
		$msg="";

		if (count($_POST)==0) require("vue/utilisateur/ident.tpl");
		else {
			
			require ("./modele/utilisateurBD.php");
			
			if (verif_bd($nom, $num, $profil)) {
				//echo ('<br/>PROFIL : <pre>'); var_dump ($profil); echo ('</pre><br/>'); die("ident");
				
				//session_start(); //deja fait dans index
				$_SESSION['profil'] = $profil;
				$nexturl = "index.php?controle=utilisateur&action=accueil";
				header ("Location:" . $nexturl);
			}
			else {
				$msg = "Utilisateur inconnu !";
				require("vue/utilisateur/ident.tpl");
			}
		}
	}
	
	function accueil() {
		require ("modele/contactBD.php");
		$idn = $_SESSION['profil']['id_nom'];
		$Contact = contacts($idn);
		require ("vue/utilisateur/accueil.tpl");
	}
	
	function bye() {
		echo ("<h2>Au revoir M. ou Mdme " . $_SESSION['profil']['nom'] . "</h2>");
		session_destroy();
	}
	
	function ajout_u()  {
		echo ("ajout_u ::");
	}
	function maj_u() {
		echo ("maj_u ::");
	}
	function destr_u ()  {
		echo ("destr_u ::");
	}				