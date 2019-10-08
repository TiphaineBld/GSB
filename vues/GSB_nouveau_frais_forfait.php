<?php
if(!(session_id())){
	session_start();
}              
?>
<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="./GSB2.css">
		<title>GALAXY SWISS BOURDIN</title>
	</head>
	<header>
		<h1>Nouveau frais forfait</h1>
		<!--redirige sur l'index lorsqu'on clique sur mon compte-->
		<ul>
			<li><a href="./index.php?etat=compte">Mon compte</a></li>
		</ul>  	
	</header>
	<body>
		<!--redirige sur l'index lorsqu'on clique sur sauvegarder-->
		<form method="post"action="./index.php?etat=insertionFF">
			<section id = "frais_forfaitisés">
				<table id="frais_forfaitisés" class="tabcenter">
					<caption>Ligne de frais forfatisés</caption>
					<br/>

					<thead>
						<!--Couleur du tableau-->
						<tr>
							<td bgcolor="#6699ff">Forfait</td>
							<td bgcolor="#6699ff">Quantité</td>
						</tr>
					</thead>
					<!--Affiche un tableau avec un menu déroulant permettant de sélectionner une option-->
					<tbody>
						<!--Couleur du tableau-->
						<tr bgcolor="white">
							<td>Frais au kilomètre</td>
							<td><input type="text"name="KM"value="0"/></td>
						</tr>
						<tr bgcolor="white">
							<td>Frais étape</td>
							<td><input type="text"name="ETP"value="0"/></td>
						</tr>
						<tr bgcolor="white">
							<td>Frais nuitée</td>
							<td><input type="text"name="NUI"value="0"/></td>
						</tr>
						<tr bgcolor="white">
							<td>Frais repas</td>
							<td><input type="text"name="REP"value="0"/></td>
						</tr>						
					</tbody>
				</table>
			</section>
			<div id = "bouton1">
				<a><input class="sauvegarder" type="submit" value="Sauvegarder"></a>
				<!--redirige sur l'index lorsqu'on clique sur Consulter les fiches de frais-->
				<a href="./index.php?etat=consultCF" title="GSB"><input class="sauvegarder" type="button" value="Consulter les fiches de frais"></a>
			</div>
		</form>
	</body>
</html>