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
		<ul>
			<li><a href="./index.php?etat=compte">Mon compte</a></li>
		</ul>  	
	</header>
	<body>
		<?= recup_donnees()?>
	</body>
</html>
