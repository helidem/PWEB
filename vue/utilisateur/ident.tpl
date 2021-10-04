<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>TP1 contacts - mvc - formulaire d'identification</title>
	<link rel="stylesheet" href="vue/styleCSS/utilisateur.css" />
	<!-- <script src="script.js"></script> -->
</head>
<body>
<form action="index.php?controle=utilisateur&action=ident" method="post">
	<label>nom :</label>
	<input name="nom" class="nom" value="<?php echo $nom ?>" />
	<label>identifiant :</label>
	<input name="num" class="num" value="<?php echo $num ?>" />
	<input type="submit" value="ok" />
</form>
<div id="m"><?php echo $msg; ?></div>
</body>
</html>