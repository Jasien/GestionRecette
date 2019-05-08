<?php
include("../classes/requetes.class.php");
include("../classes/recettes.class.php");

$DBase = new ConnexionBDD();
$db = $DBase->connexion();

$Crecette = new Recipe();

$titre			= $db->quote($_POST['titre']);
$description 	= $db->quote($_POST['description']);
$image 			= $_POST['img'])
$ingredients 	= $db->quote($_POST['ingredients']);
$explication	= $db->quote($_POST['explication']);
$video 			= $_POST['video'];

if (isset($titre))
{
	try
	{
		$enregistrerRecette = $Crecette->enregistrer_recette($titre, $description, $image, $ingredients, $explication, $video);
		echo "1";
	}
	catch (Exception $e)
	{
		echo "0";
	}
}
else
{
	echo "0";
}
?>