<?php

/*
*	Classe Search, héritant de la classe Model
*	Ne contient pas de Getters et Setters car cette classe n'est liée à aucune table
*	Contient quelques requètes de recherche.
*/

class Search extends model
{		
	public function findFieldAlbum($field)
	{		
		$sql = "SELECT * FROM Album WHERE Title LIKE '%$field%'";
		$connect = new Connect();
		$DB = $connect->Connect();
		$req = $DB->query($sql);
		$db = array();		
		while($d = $req->fetch(PDO::FETCH_ASSOC)){
			$db[] = $d;			
		}		
		return $db;
	}
	
	public function findFieldMusic($field)
	{		
		$sql = "
			SELECT m.Title as music, a.Title, a.Releasedate
			FROM music m 
			INNER JOIN album a 
			ON m.Album_id = a.id 
			WHERE m.Title LIKE '%$field%' 
			ORDER BY music ASC";
		$connect = new Connect();
		$DB = $connect->Connect();
		$req = $DB->query($sql);
		$db = array();		
		while($d = $req->fetch(PDO::FETCH_ASSOC)){
			$db[] = $d;			
		}		
		return $db;
	}
	
	public function find($data = array()){
		$conditions = "1=1";
		$fields = "*";
		$limit = "";
		$order = "id ASC";
		if(isset($data["conditions"])) { $conditions = $data["conditions"]; }
		if(isset($data["fields"])) { $fields = $data["fields"]; }
		if(isset($data["limit"])) { $limit = "LIMIT ".$data["limit"]; }
		if(isset($data["order"])) { $order = $data["order"]; }
		
		$sql = "SELECT $fields FROM ".$this->table." WHERE $conditions ORDER BY $order $limit";
		$connect = new Connect();
		$DB = $connect->Connect();
		$req = $DB->query($sql);
		$d = array();		
		while($d = $req->fetch(PDO::FETCH_ASSOC)){
			$db[] = $d;			
		}		
		return $db;
	}
}