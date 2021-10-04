<?php 
	/*controleur contact.php :
		fonctions-action de gestion des contacts
	*/
	
	function liste_contacts() {
		require ("modele/contactBD.php");
		$idn = (isset($_GET['id']))?$_GET['id']:$_SESSION['profil']['id_nom'];
		$Contact = contacts($idn);
		require ("vue/contact/liste_contacts.tpl");
	}
	
	function ajout_c() {
		echo ("ajout_c :: ajout d'un contact <br/>");
	}
	
	function maj_c(){
		echo ("maj_c :: mise à jour d'un contact <br/>");
	}
	
	function destr_c () {
		echo ("destr_c :: destruction d'un contact <br/>");
	}
?>
