<?php

include("../classes/requetes.class.php");
include("../classes/recettes.class.php");

$DBase = new ConnexionBDD();
$db = $DBase->connexion();
		
$Crecette = new Recipe();

$nom	 = $db->quote($_POST['nom']);
$mail 	 = $db->quote($_POST['mail']);
$sujet	 = $db->quote($_POST['sujet']);
$message = $db->quote($_POST['message']);

if (isset($nom))
{
	try
	{
		$toEmail = "jasiakjulien@gmail.com";
		$mailHeaders = "From: " . $nom . "<". $mail .">\r\n";
		if(mail($toEmail, $sujet, $message, $mailHeaders)) {
			echo "<p class='success'>Mail envoyé.</p>";
		} else {
			echo "<p class='Error'>Problème dans l'envoi du message.</p>";
		}
	}
	catch (Exception $e)
	{
		echo "<p class='Error'>Problème dans l'envoi du message.</p>";
	}
}
else
{
	echo "<p class='Error'>Problème dans l'envoi du message.</p>";
}
?>