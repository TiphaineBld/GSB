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
		<h1>Nouveau frais hors forfait</h1>
		<!--redirige sur l'index lorsqu'on clique sur mon compte-->
		<ul>
			<li><a href="./index.php?etat=compte">Mon compte</a></li>
		</ul>      
	</header>
	<body>
		<!--redirige sur l'index lorsqu'on clique sur sauvegarder-->
		<form method="post"action="./index.php?etat=insertionFHF">	
			<section id = "frais_hors_forfaits">
				<table id="frais_hors_forfaits" class="tabcenter">
					<caption>Ligne de frais hors forfait</caption>
					<br/>
					<thead>
						<!--Couleur du tableau-->
						<tr>
							<td bgcolor="#6699ff">Date</td>
							<td bgcolor="#6699ff">Description</td>
							<td bgcolor="#6699ff">Montant</td>
						</tr>
					</thead>
					<tbody>
						<!--Couleur du tableau-->
						<tr bgcolor="white">
							<!--zone de texte-->
							<td>
								<input type="text"name="date"id="dateHF"/>
							</td>
							<td>
								<input type="text"name="libelle"id="libelle"/>
							</td>
							<td>
								<input type="text"name="montant"id="montant"/>
							</td>
						</tr>	
					</tbody>
				</table>
			</section>	
			<br/>
			<br/>
			<br/>
			<br/>
			<div id = "bouton1">
				<input class="sauvegarder" type="submit" value="Sauvegarder">
				<!--redirige sur l'index lorsqu'on clique sur consulter les fiches de frais-->
				<a href="./index.php?etat=consultCF" title="GSB"><input class="sauvegarder" type="button" value="Consulter les fiches de frais"></a>
			</div>
		</form>
	</body>
</html>