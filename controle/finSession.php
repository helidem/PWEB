<?php  

//fin de la session de connexion
session_start();


function bye() {
	echo ("<h2>Au revoir M. ou Mdme" . $_SESSION['profil']['nom'] . "</h2>");

session_destroy();
}

?>