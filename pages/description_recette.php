<?php
include("../classes/requetes.class.php");
include("../classes/recettes.class.php");

$DBase = new ConnexionBDD();
$db = $DBase->connexion();

$Crecette = new Recipe();

$id_recette = $db->quote($_POST['ticket']);

if (isset($id_recette))
{
	try
	{
		$rechercheRecette = $Crecette->afficher_recette($id_recette);
	}
	catch (Exception $e)
	{
		echo "Erreur dans l'affichage de la recettes.";
	}
}
else
{
	echo "Erreur dans l'affichage de la recettes.";
}
?>