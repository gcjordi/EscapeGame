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
	private $temps;
	private $tentative;
	
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

	public function setAttr($attr, $value){
		$this->$attr = $value;
	}

	public static function saveUtilisateur($identifiant, $crypt_mdp){
		try{
			$q = Model::$pdo->prepare('INSERT INTO casse_utilisateur(identifiant, mdp) VALUES(:i, :m)');
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
			$q = Model::$pdo->prepare('SELECT id FROM casse_utilisateur WHERE identifiant=:ident');
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

	public static function getIdentifiant(){ // Marche pas 
  	return $this->identifiant;
	}

	public static function getUserByIdent($identifiant){
		try{
			$q = Model::$pdo->prepare('SELECT id, identifiant, role, temps, tentative FROM casse_utilisateur LEFT JOIN casse_classement ON id=id_user WHERE identifiant=:ident');
			$q->execute([
				':ident' => $identifiant
			]);
			$q->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
			$tab_user = $q->fetchAll();		
		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}

		if(empty($tab_user))
			return false;
		return $tab_user[0];
	}

	public static function getMdpByIdent($identifiant){
		try{
			$q = Model::$pdo->prepare('SELECT mdp FROM casse_utilisateur WHERE identifiant=:ident');
			$q->execute([
				':ident' => $identifiant
			]);
			$tab_mdp = $q->fetchAll();		
		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}

		if(empty($tab_mdp))
			return false;
		return $tab_mdp[0]['mdp'];
	}

	public static function disconnect(){
        session_unset();
        session_destroy();
        header("Location:index.php"); 
    }
}