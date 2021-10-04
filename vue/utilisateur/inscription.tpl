<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
</head>
<body>
<h3>Formulaire d'inscription</h3>
<form action="index.php?controle=utilisateur&action=inscription" method="post">
    <input name="nom" type="text" value="<?php echo $nom;?>" /> Nom<br />
    <input name="prenom" type="text" value="<?php echo $prenom;?>" /> Prenom <br />
    <input name="mail" type="text" value="<?php echo $mail;?>" /> E-Mail<br />
    <input name="num" type="text" value="<?php echo $num;?>" /> Matricule <br />
    <input type="submit" value="soumettre" />
</form>
<div><?php echo $msg; ?></div>
</body>
</html>