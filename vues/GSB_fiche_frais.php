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
		<h1>Consultation des frais</h1>
		<!--redirige sur l'index lorsqu'on clique sur mon compte-->
		<ul>
			<li><a href="./index.php?etat=compte">Mon compte</a></li>
		</ul>
	</header>
	<body>
		<!--redirige sur l'index lorsqu'on clique sur sélectionner-->
		<form method="post" action="./index.php?etat=consult">
			<h3><label for="mois">Veuillez selectionner un mois :</label>
				<select name="mois" id="mois">
					<option value="January">Janvier</option>
					<option value="February">Février</option>
					<option value="March">Mars</option>
					<option value="April 2020">Avril</option>
					<option value="May 2020">Mai</option>
					<option value="June 2020">Juin</option>
					<option value="July">Juillet</option>
					<option value="August">Août</option>
					<option value="September">Septembre</option>
					<option value="October 2019">Octobre</option>
					<option value="November 2019">Novembre</option>
					<option value="December 2019">Décembre</option>
				</select>
			</h3>
			<br/>
			<a ><input class="favorite styled" type="submit" value="Sélectionner"></a>
		</form>
		<br>
		<br>
		<br>
	</body>
</html>