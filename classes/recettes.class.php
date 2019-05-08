<?php
class Recipe{
	
	private $id;
	private $titre;
	private $description;
	private $ingredient;
	private $explication;
	private $lien;
	
	function _construct($id, $titre, $description, $ingredient, $explication, $lien)
	{
		$this->id=$id;
		$this->titre=ucfirst(strtolower($titre));
		$this->description=$description;
		$this->ingredient=$ingredient;
		$this->explication=$explication;
		$this->lien=$lien;
	}
	
	function liste_recette()
	{
		$DBase = new ConnexionBDD();
		$db = $DBase->connexion();
		$liste = "";
		
		$requete = $db->prepare("SELECT * FROM recettes ORDER BY titre_recette ASC");
		$requete->execute();
		
		$res = $requete->fetchAll();
		if (count($res) == 0) {
			$liste = "<div class='alerte'>Aucune recette disponible en base!</div>";
		} else {
			foreach ($res as $row) {
				$liste.= "
				<div class='ticket' id='".$row['id_recette']."'>
					<div id='title'>".$row['titre_recette']."</div>
					<div class='body_vignette'>
						<div id='image_vignette'><img src='imgRecettes/".$row['image_recette']."' alt='".$row['titre_recette']."'/></div>
						<div id='recette_vignette'>".$row['description_recette']."</div>
					</div>
				</div>";
			}
		}
		echo $liste;
	}
	
	function enregistrer_recette($titre, $description, $image, $ingredient, $explication, $lien)
	{
		$DBase = new ConnexionBDD();
		$db = $DBase->connexion();
		
		$requete = $db->prepare("INSERT INTO recettes(titre_recette, description_recette, image_recette, ingredient_recette, explication_recette, lien_recette) values(:titre_recette,:description_recette,:image_recette,:ingredient_recette,:explication_recette, :lien_recette)"); 
		$requete->execute(array( 
			":titre_recette"=>$titre, 
			":description_recette"=>$description, 
			":image_recette"=>$image, 
			":ingredient_recette"=>$ingredient, 
			":explication_recette"=>$explication, 
			":lien_recette"=>substr(strstr($lien, '='),1)
		)); 
	}
	
	function rechercher_recette($recherche)
	{
		$DBase = new ConnexionBDD();
		$db = $DBase->connexion();
		
		$liste = "";

		$requete = $db->prepare("	SELECT * 
									FROM recettes 
									WHERE titre_recette LIKE (".$recherche.") 
									OR  description_recette like (".$recherche.") 
									OR  ingredient_recette like (".$recherche.") 
									OR  explication_recette like (".$recherche.");");
		$requete->execute();
		$res = $requete->fetchAll();
		
		if (count($res) == 0) {
			$liste = "<div class='alerte'>Aucune recette ne correspond à votre recherche : '".$recherche."'!</div>";
		} else {
			foreach ($res as $row) {
				$liste.= "
				<div class='ticket' id='".$row['id_recette']."'>
					<div id='title'>".$row['titre_recette']."</div>
					<div class='body_vignette'>
						<div id='image_vignette'><img src='imgRecettes/".$row['image_recette']."' alt='".$row['titre_recette']."'/></div>
						<div id='recette_vignette'>".$row['description_recette']."</div>
					</div>
				</div>";
			}
		}
		echo $liste;
	}

	function afficher_recette($recherche)
	{
		$DBase = new ConnexionBDD();
		$db = $DBase->connexion();

		$requete = $db->prepare("	SELECT * 
									FROM recettes 
									WHERE id_recette = ".$recherche.";");
		$requete->execute();
		$res = $requete->fetchAll();
		
		if (count($res) == 0) {
			$liste = "<div class='alerte'>Aucune recette ne correspond à votre recherche : '".$recherche."'!</div>";
		} else {
			foreach ($res as $row) {
				echo "
				<div id='recette'>
					<div id='title'>".$row['titre_recette']."</div>
					<div id='body_recette'>
						<div id='image_recette'>
							<img src='imgRecettes/".$row['image_recette']."' alt='".$row['titre_recette']."'/>
						</div>
						<div id='ingredient_recette'>
							<label id='titre_ingredient'>Ingrédients : </label>
							".$row['ingredient_recette']."
						</div>
						<div id='explication_recette'>
							<label id='titre_recette'>Recette : </label>
							".$row['explication_recette']."
						</div>";
						if(isset($row['lien_recette']))
						{
							echo "
							<div id='lien_recette'>
								<iframe width='600' height='300' src='https://www.youtube.com/embed/".$row['lien_recette']."' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
							</div>
							";
						}
				echo "
					</div>
				</div>";
			}
		}
	}
}
?>