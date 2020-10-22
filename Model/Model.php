<?php

/**
 * Classe de la Base de Donnée
 */
class Model 
{	
	public static $pdo;
	
	public static function Init($host="webinfo.iutmontp.univ-montp2.fr", $dbname="seguraa", $username="seguraa", $password="KYEQakry"){
		try{
			
			self::$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8mb4', $username, $password, [
	       	 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	       	 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	    	]);
			
			
		}catch(Exception $e){
			echo 'Il y a une erreur '.$e;
			die();
		}
	}

	
}

Model::Init();