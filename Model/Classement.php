<?php
require_once 'Model.php';

/**
 * 
 */
class Classement 
{

	private $id_user;
	private $date;
	private $temps;
	
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

			$p = Model::$pdo->prepare('CALL inser_new_tentative(:id_user, :temps)');
			$p->execute([
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

			$p = Model::$pdo->prepare('CALL inser_new_tentative(:id_user, :temps)');
			$p->execute([
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

	public static function getAllTentatives($id_user){
		try{
			$q = Model::$pdo->prepare('SELECT id_user, temps, ct.date FROM casse_tentatives ct WHERE id_user=:id_user ORDER BY ct.date');
			$q->execute([
				":id_user" => $id_user
			]);
			$q->setFetchMode(PDO::FETCH_CLASS, 'Classement');
			$tab_t = $q->fetchAll();

		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}

		if(empty($tab_t))
			return [];
		return $tab_t;
	}

	public static function getBestTentative($id_user){
		try{
			$q = Model::$pdo->prepare('SELECT MIN(temps) best FROM casse_tentatives ct WHERE id_user=:id_user GROUP BY id_user');
			$q->execute([
				":id_user" => $id_user
			]);
			
			$tab_min = $q->fetchAll();

		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}

		if(empty($tab_min))
			return [];
		return $tab_min[0]['best'];
	}

	public static function getMoyenneTentative($id_user){
		try{
			$q = Model::$pdo->prepare('SELECT AVG(temps) moyenne FROM casse_tentatives ct WHERE id_user=:id_user GROUP BY id_user');
			$q->execute([
				":id_user" => $id_user
			]);
			
			$tab_avg = $q->fetchAll();

		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}

		if(empty($tab_avg))
			return [];
		return $tab_avg[0]['moyenne'];
	}
}