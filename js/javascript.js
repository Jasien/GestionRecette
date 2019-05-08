$(document).ready(function() {
	
	/* affichage de la recette au clic */
	$('.holy-grail-body').on('click','.ticket ',function(){
	
		var id = $(this).attr('id');
		if(id)
		{
			$.ajax({
				type:'POST',
				url:'./pages/description_recette.php',
				data: { 
					ticket: id
				},
				dataType : 'html',
				success:function(data){
					$(".holy-grail-body").html(data);
				}
			})
		}
	});
	
	$('#RechercheRecette').click(function(){
		$(".holy-grail-body").load('./pages/frm_recherche_recette.php');
	});
		
	$('#AjouterRecette').click(function(){		
		$(".holy-grail-body").load('./pages/frm_ajout_modif_recette.php');
	});
	
	$('#ContacterNous').click(function(){
		$(".holy-grail-body").load('./pages/frm_contact.php');
	});
	
	/* Javascript pour le textarea pour les ingrédients */
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('#chp_ingredients_recette').jqte({"status" : jqteStatus})
	});
	
	/* Javascript pour le textarea pour la recette */
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('#chp_explication_recette').jqte({"status" : jqteStatus})
	});
	
	/* Enregistrement des recettes */
	$("#frmSendRecipe").on('click','#btnValidation',function(event)
	{
		var titre 		= $("#chp_titre_recette").val();
		var description = $("#chp_description_recette").val();
		var ingredients = $("#chp_ingredients_recette").val();
		var explication = $("#chp_explication_recette").val();
		var video 		= $("#chp_video_recette").val();

		if(!titre)
		{
			$('.titre_error').replaceWith('<div class="titre_error error">Sans titre comment retrouver votre recette?</div>');
		}
		else{
			$('.titre_error').replaceWith('<div class="titre_error error"></div>');
		}
		
		if(!description)
		{
			$('.description_error').replaceWith('<div class="description_error error">Mettez une description sympa de la recette!</div>');
		}
		else{
			$('.description_error').replaceWith('<div class="titre_error error"></div>');
		}
		
		if(!ingredients)
		{
			$('.ingredient_error').replaceWith('<div class="ingredient_error error">Vous n\'avez pas d\'ingrédient dans votre recette?</div>');
		}
		else{
			$('.ingredient_error').replaceWith('<div class="titre_error error"></div>');
		}
		
		if(!explication)
		{
			$('.explication_error').replaceWith('<div class="explication_error error">Expliquez la recette, nous ne pouvons la deviner</div>');
		}
		else{
			$('.explication_error').replaceWith('<div class="titre_error error"></div>');
		}
		
		if(titre && description && ingredients && explication)
		{
			$.ajax({
				url: './pages/enregistrement_recette.php',
				type:'POST',
				data: { 
					titre : $('#chp_titre_recette').val(),
					description : $('#chp_description_recette').val(),
					img : 'neutre.jpg',
					ingredients : $('#chp_ingredients_recette').val(),
					explication : $('#chp_explication_recette').val(),
					video : $('#chp_video_recette').val()
				},
				success: function(data, textStatus, jqXHR)
				{
					alert('Recette enregistrée!');
					window.location.replace("index.php");
				}
			});
		}
	});
	
	/* Recherche des recettes */
	$("#frmLookRecipe div").on('click','#btnValidation',function(event)
	{
		var Rech = $("#chp_recipe").val();

		if(!Rech)
		{
			$('.recherche_error').replaceWith('<div class="recherche_error error">Essayez de mettre un élément de recherche, cela fonctionnera mieux!</div>');
		}
		else{
			$('.recherche_error').replaceWith('<div class="recherche_error error"></div>');
			$.ajax({
				url: './pages/recherche_recette.php',
				type:'POST',
				data: { 
					recherche : $('#chp_recipe').val()
				},
				success: function(data, textStatus, jqXHR)
				{
					$(".holy-grail-body").html(data);
				}
			});
		}
	});
	
	/* Envoi du message */
	$("#frmContact div").on('click','#btnEnvoi',function(event)
	{
		var nom = $("#chp_nom").val();
		var mail = $("#chp_mail").val();
		var sujet = $("#chp_sujet").val();
		var message = $("#chp_msg").val();

		if(!nom)
		{
			$('.nom_error').replaceWith('<div class="nom_error error">Mettez un petit nom que nous puissions vous recontacter personnellement!</div>');
		}
		else{
			$('.nom_error').replaceWith('<div class="nom_error error"></div>');
		}
		
		if(!mail || validateEmail(mail)==false)
		{
			$('.mail_error').replaceWith('<div class="mail_error error">Vérifiez votre adresse mail, il y a un soucis.</div>');
		}
		else{
			$('.mail_error').replaceWith('<div class="mail_error error"></div>');
		}
		
		if(!sujet)
		{
			$('.sujet_error').replaceWith('<div class="sujet_error error">Un petit sujet pour mieux traiter votre demande</div>');
		}
		else{
			$('.sujet_error').replaceWith('<div class="sujet_error error"></div>');
		}
		
		if(!message)
		{
			$('.message_error').replaceWith('<div class="message_error error">Nous envoyer un message sans message, est ce logique?</div>');
		}
		else{
			$('.message_error').replaceWith('<div class="message_error error"></div>');
		}
		
		
		if(nom && mail && sujet && message){
			$('.recherche_error').replaceWith('<div class="recherche_error error"></div>');
			$.ajax({
				url: './pages/envoi_message.php',
				type:'POST',
				data: { 
					nom : nom,
					mail : mail,
					sujet : sujet,
					message : message
				},
				success: function(data, textStatus, jqXHR)
				{
					alert('Message envoyé!');
					window.location.replace("index.php");
				}
			});
		}		
	});
	
	function validateEmail($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test( $email );
	}
});