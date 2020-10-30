<?php
require_once 'Model.php';

/**
 * 
 */
class Utilisateur 
{
	private $id;
	private $identifiant;
	private $role;
	
	function __construct($data = NULL)
	{
		if(!is_null($data)){
			foreach ($data as $key => $value) {
				$this->key = $value;
			}
		}
	}

	public function getAttr($attr){
		return $this->$attr;
	}


	public static function saveUtilisateur($identifiant, $crypt_mdp){
		try{
			$q = Model::$pdo->prepare('INSERT INTO casse.utilisateur(identifiant, mdp) VALUES(:i, :m)');
			$q->execute([
				':i' => $identifiant,
				':m' => $crypt_mdp
			]);		
		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
	}
	
	public static function existByIdent($identifiant){
		try{
			$q = Model::$pdo->prepare('SELECT id FROM casse.utilisateur WHERE identifiant=:ident');
			$q->execute([
				':ident' => $identifiant
			]);
			$tab_exist = $q->fetchAll();		
		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}

		if(empty($tab_exist))
			return false;
		return true;
	}
}