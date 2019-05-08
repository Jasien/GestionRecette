<?php

use PHPUnit\Framework\TestCase;

include("classes/requetes.class.php");
include("classes/recettes.class.php");

class recetteTest extends TestCase
{
	$recipe = new Recipe();
	
	/**
     * @return PHPUnit\DbUnit\Database\Connection
     */
    public function getConnection()
    {
        $pdo = new PDO('mysql::memory:');
        return $this->createDefaultDBConnection($pdo, ':memory:');
    }
	
    public function testCreerRecipe()
    {
		//neutre.jpg est l'image par défaut pour les recettes qui n'ont pas d'images
		$recipe->enregistrer_recette('Titre de la recette', 'Description sommaire de la recette','neutre.jpg','liste des ingrédients','explication total de la recette','p906xsADfv0');
		$recipe->enregistrer_recette('Titre de la recette', 'Description sommaire de la recette','neutre.jpg','liste des ingrédients','explication total de la recette','');
    }
    public function testRechercheRecipe()
    {
		$recipe->rechercher_recette('recette');
		$recipe->rechercher_recette('faux');
		$recipe->rechercher_recette('');
    }
    public function testAfficherRecipe()
    {
		$recipe->afficher_recette('1');
		$recipe->afficher_recette('0');
		$recipe->afficher_recette('faux');
		$recipe->afficher_recette('');
    }
}
?>