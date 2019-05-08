<script src="js/javascript.js"></script>
<form action="" id="frmSendRecipe" name="frmSendRecipe" method="POST">
	<div id="title">
		Ajouter la nouvelle recette
	</div>
	<div class="ajt_recipe">
		<label for="titre">
			<span>Titre </span><div class="titre_error"></div>
			<input type="text" id="chp_titre_recette" value="" class="" maxlength="100" />
		</label>
		<label for="description">
			<span>Description </span><div class="description_error"></div>
			<input type="text" id="chp_description_recette" value="" class="" maxlength="250" />
		</label>
		<label for="ingredient">
			<span>Ingrédient </span><div class="ingredient_error"></div>
			<textarea name="textarea" id="chp_ingredients_recette"></textarea>
		</label>
		<label for="explication">
			<span>Explication </span><div class="explication_error"></div>
			<textarea name="textarea" id="chp_explication_recette"></textarea>
		</label>
		<label for="lien">
			<span>Lien vidéo </span><div class="lien_error"></div>
			<input type="text" id="chp_video_recette" value="" class="" maxlength="100" />
		</label>
		<label for="ajouter">
			<div id="validation">
				<input type="button" id="btnValidation" name="envoyer" value="Enregistrer"/>
			</div>
		</label>
	</div>
	<script>
		$('#chp_ingredients_recette').jqte();
		$('#chp_explication_recette').jqte();
	</script>
</form>