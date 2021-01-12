<?php
require_once 'Model.php';

/**
 * 
 */
class Classement 
{
	
	function __construct($data = NULL)
	{
		if(!is_null($data)){
			foreach ($data as $key => $value) {
				$this->key = $value;
			}
		}
	}

	public static function getClassement(){
		try{
			$q = Model::$pdo->query('SELECT id, identifiant, temps, tentative FROM casse_utilisateur JOIN casse_classement ON id=id_user ORDER BY temps, tentative');
			
			$q->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
			$tab_u = $q->fetchAll();

		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}

		if(empty($tab_u))
			return[];
		return $tab_u;
	}

	public static function insertClassement($score){
		try{
			$q = Model::$pdo->prepare('INSERT INTO casse_classement(id_user, temps) VALUES(:id_user, :temps)');
			$q->execute([
				":id_user" => $_SESSION['user_connected']->getAttr('id'),
				":temps" => $score
			]);

			$_SESSION['user_connected']->setAttr('temps', $score);
			$_SESSION['user_connected']->setAttr('tentative', 0);

			

		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
	}

	public static function updateClassement($score){
		try{
			$q = Model::$pdo->prepare('UPDATE casse_classement SET temps=:temps WHERE id_user=:id_user');
			$q->execute([
				":id_user" => $_SESSION['user_connected']->getAttr('id'),
				":temps" => $score
			]);

			$_SESSION['user_connected']->setAttr('temps', $score);
			$_SESSION['user_connected']->setAttr('tentative', $_SESSION['user_connected']->getAttr('tentative')+1);
			

		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
	}
}