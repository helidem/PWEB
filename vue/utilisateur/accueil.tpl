<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TP econtact - mvc - page d'accueil avec liste des contacts</title>
		
		<link rel="stylesheet" href="./vue/styleCSS/style.css"/>
		<link rel="stylesheet" href="./vue/styleCSS/utilisateur.css"/>
		<link rel="stylesheet" href="./vue/styleCSS/contact.css"/>
		<!-- <script src="script.js"></script> -->
	</head>
	<body>
		
		<h1 style="padding-bottom:5%"> Bienvenue 
			<?php echo ($_SESSION['profil']['prenom'] . " " . $_SESSION['profil']['nom'] . "."); ?>
		</h1>
		
		<nav>
			<?php require ("vue/menu.tpl");?>
		</nav>
		
		<div id="main">
			<?php 
				if (count($Contact) != 0) {

					echo ("<h2 style='color:blue'> Voici vos contacts :</h2>");
					echo ('<table>');
					echo ('<tr><th> NOM </th><th> PRENOM </th><th> EMAIL </th></tr>'); 	
					foreach ($Contact as $c) {
				echo ("index.php?controle=contact&action=liste_contacts&id=" . $c[0] . $c[2] . "</a></br>");
						echo "<tr class='contact'>";
						echo ("<td><a href='index.php?controle=contact&action=liste_contacts&id='" . $c[1] .'>' . $c['nom'] . "</a></td>"); // utf8_encode($c['nom']) si nécessaire
						echo ("<td>" . $c['prenom'] . "</td>"); 
						echo ("<td>" . $c['email'] . "</td>"); 
						echo "</tr>\n";
					}
					echo ('</table>');
				}
				else echo ('pas de contact');
			?>
		</div>
	</body>
</html>
