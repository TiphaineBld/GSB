<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="./GSB.css">
		<title>GALAXY SWISS BOURDIN</title>
	</head>
	<body>
		<img src="./images/Logo.png"/>
		<div id = "page_login">
			<img src ="./images/Logo_utilisateur.png"/>
			<!--redirige sur l'index lorsqu'on clique sur connexion-->
			<form method="post"action="./index.php?etat=login">            
				<p><label for="login">Pseudo</label><br/>
					<input type="text"name="login"id="login" required
						   required placeholder="Entrez le pseudo "/><br/>
					<br/>
					<label for="mdp">Mot de passe </label><br/>
					<input type="password"name="mdp"id="mdp" required
						   required placeholder="Entrez le mot de passe"/><br/>
					<br/>

					<input class="button" type="submit" value="connexion">
					
					<!--Affiche un message si l'un des champs est vide-->
					<?php
					if(isset($erreur))
					{
						echo '<font color="red">'.$erreur."</font>";
					}
					?>
				</p>
			</form>
		</div>
	</body>
</html>