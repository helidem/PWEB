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

    function inscription() {
        $nom=  isset($_POST['nom'])?($_POST['nom']):'';
        $prenom=  isset($_POST['prenom'])?($_POST['prenom']):'';
        $num=  isset($_POST['num'])?($_POST['num']):'';
        $email=  isset($_POST['email'])?($_POST['email']):'';
        $msg='';

        if (count($_POST)==0) require("vue/utilisateur/inscription.tpl");
        else{
            require("modele/inscriptionBD.php");

            if(verif_existant($email)){
                $msg = "Utilisateur existant !";
                require("vue/utilisateur/inscription.tpl");
            }else{
                create_new($nom,$num,$prenom,$email,$profil);
                require ("./modele/utilisateurBD.php");
                verif_bd($nom,$num,$profil);
                $_SESSION['profil'] = $profil;
                $nexturl = "index.php?controle=utilisateur&action=accueil";
                header ("Location:" . $nexturl);
            }
        }
    }