<script src="js/javascript.js"></script>
<form action="" id="frmContact" name="frmContact" method="POST">
	<div id="title">
		Tapez le nom d'une recette ou d'un ingrédient pour trouver les recettes qui s'y rapportent : 
	</div>
	<div class="rech_recipe" id="frmContact">
		
		<div id="mail-status"></div>
		<div>
			<label style="padding-top:20px;">Name</label><span class="nom_error"></span>
			<input type="text" name="chp_nom" id="chp_nom" class="" maxlength='50'><br/><br/>
		</div>
		<div>
			<label>Email</label><span class="mail_error"></span>
			<input type="text" name="chp_mail" id="chp_mail" class="" maxlength='100'><br/><br/>
		</div>
		<div>
			<label>Sujet</label><span class="sujet_error"></span>
			<input type="text" name="chp_sujet" id="chp_sujet" class="" maxlength='100'><br/><br/>
		</div>
		<div>
			<label>Message</label><span class="message_error"></span>
			<textarea name="chp_msg" id="chp_msg" class="" cols="60" rows="6"></textarea><br/><br/>
		</div>
		<div>
			<input type="button" id="btnEnvoi" name="envoyer" value="Envoyer"/>
			<br /><br /><br /><br />
		</div>
		
	</div>
</form>