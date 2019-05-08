<?php
include("classes/requetes.class.php");
include("classes/recettes.class.php");

$DBase = new ConnexionBDD();
$db = $DBase->connexion();

?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Récapitulatif des recettes</title>
		
		<link rel="stylesheet" type="text/css" href="css/general.css">
		<link type="text/css" rel="stylesheet" href="css/demo.css">
		<link type="text/css" rel="stylesheet" href="css/jquery-te-1.4.0.css">
		
		<script type="text/javascript" src="js/jquery-3.4.0.js"></script>
		<script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
		<script type="text/javascript" src="js/javascript.js"></script>
	</head>	


	<body class="holy-grail">

		<header class="main-header">
			<div class="container">
				<div class="mh-logo">
					<a href="index.php"><img src="img/Ours.png" width="119" height="50" alt="Patissier Geek"></a>
				</div>
				<nav class="main-nav">
					<ul class="main-nav-list">
						<li>
							<a href="#" id="RechercheRecette">Rechercher une recette</a>
						</li>
						<li>
							<a href="#" id="AjouterRecette">Ajouter une recette</a>
						</li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="holy-grail-body">
		<?php
			$Crecette = new Recipe();
			$listRecette = $Crecette->liste_recette();
		?>
		</div>
		<footer>
			<a href="#" id="ContacterNous">Contactez-nous</a>
		</footer>
	</body>
</html>