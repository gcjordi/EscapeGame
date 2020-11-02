<?php
require_once 'Model.php';

/**
 * 
 */
class Definitions 
{
	private $id;
	private $definition;
	private $reponse;
	
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


	public static function getAllDefinitions(){
		try{
			$q = Model::$pdo->query('SELECT id, definition, reponse FROM casse_definitions');
			
			$q->setFetchMode(PDO::FETCH_CLASS, 'Definitions');
			$tab_def = $q->fetchAll();

		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}

		if(empty($tab_def))
			return[];
		return $tab_def;
	}
}