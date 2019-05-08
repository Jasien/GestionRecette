<script src="js/javascript.js"></script>
<form action="" id="frmLookRecipe" name="frmLookRecipe" method="POST">
	<div id="title">
		Tapez le nom d'une recette ou d'un ingrédient pour trouver les recettes qui s'y rapportent : 
	</div>
	<div class="rech_recipe">
		<label for="titre">
			<div class="recherche_error"></div>
			<input type="text" id="chp_recipe" value="" placeholder="Tapez votre recherche ici" class="" maxlength="30" />
		</label>
		
		<div id="validation">
			<input type="button" id="btnValidation" name="envoyer" value="Rechercher"/>
		</div>
	</div>
</form>