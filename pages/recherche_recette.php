<?php
include("../classes/requetes.class.php");
include("../classes/recettes.class.php");

$DBase = new ConnexionBDD();
$db = $DBase->connexion();

$Crecette = new Recipe();

$recherche = $db->quote("%".$_POST['recherche']."%");

if (isset($recherche))
{
	try
	{
		$rechercheRecette = $Crecette->rechercher_recette($recherche);
	}
	catch (Exception $e)
	{
		echo "Erreur dans le processus de recherche de recettes.";
	}
}
else
{
	echo "Erreur dans votre saisie de recherche!";
}
?>