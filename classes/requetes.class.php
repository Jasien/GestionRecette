<?php
class ConnexionBDD
{
	const DSN = 'localhost';
	const BDD = 'recettescuisines'; 
	const USERNAME = 'utilisateur'; 
	const PASSWD = 'KGzPKfqVcL4tiih';
 
	public static function connexion()
	{
		try{
			$db = new pdo('mysql:host='.self::DSN.';dbname='.self::BDD.';charset=utf8',self::USERNAME,self::PASSWD);
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $db;
		}
		catch(PDOException $ex){
			die(json_encode(array('outcome' => false, 'message' => 'Erreur de connexion!')));
		}
	}
}
?>