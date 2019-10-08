<?php
if(!(session_id())){
	session_start(); 
}              
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="./GSB2.css">
		<title>GALAXY SWISS BOURDIN</title>
	</head>
	<body>
		<header>
			<!--Récupère le nom et le prénom de l'utilisateur pour les afficher-->
			<h1>Bienvenue dans votre espace personnel <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?></h1>

		</header>

		<!--redirige sur l'index lorsqu'on clique sur déconnexion-->
		<ul>
			<li><a href="./index.php">Déconnexion</a></li>
		</ul>
		<img src ="./images/Logo_utilisateur.png"/>
		<h2>Que souhaitez-vous faire aujourd'hui ??</h2>
		<div id = "bouton1">
			<!--redirige sur l'index lorsqu'on clique sur le bouton-->
			<a href="./index.php?etat=ajoutFF" title="GSB"><input class="favorite styled" type="button" value="Nouveau frais forfait"></a>
			<!--redirige sur l'index lorsqu'on clique sur le bouton-->
			<a href="./index.php?etat=ajoutFHF" title="GSB"><input class="favorite styled" type="button" value="Nouveau frais hors forfait"></a>
			<!--redirige sur l'index lorsqu'on clique sur le bouton-->
			<a href="./index.php?etat=consultCF" title="GSB"><input class="favorite styled" type="button" value="Consulter les fiches de frais"></a>
		</div>	
	</body>
</html>