<?php
class Model{

	public $table;
	public $id;
		
	public function read($fields=null){
		if($fields == null)$fields = "*";
		$sql = "SELECT $fields FROM ".$this->table." WHERE id=".$this->id;
		$connect = new Connect();
		$DB = $connect->Connect();
		$req = $DB->query($sql);
		while($d = $req->fetch(PDO::FETCH_OBJ)){
			echo '<pre>';
			print_r($d);
			echo '</pre>';
		}
		//$data = mysql_fetch_assoc($req);
		//foreach($data as $k => $v){
		//	$this->$k = $v;
		//}
	}

	public function save($data){
		if(isset($data["id"]) && !empty(isset($data["id"]))){
			$sql = "UPDATE ".$this->table." SET ";			
			foreach($data as $k => $v){
				if($k != "id"){
					$sql .= "$k = $v,";
					}
			}
			$sql = substr($sql,0,-1);
			$sql .= "WHERE id=".$data["id"];
			echo $sql;
		} else {
			$sql = "INSERT INTO ".$this->table." (";	
			unset($data["id"]);
			foreach($data as $k => $v){
				$sql .= "$k,";
			}
			$sql = substr($sql,0,-1);
			$sql .= ") VALUES (";		
			foreach($data as $v){
				$sql .= "'$v',";
			}
			$sql = substr($sql,0,-1);
			$sql .= ")";
			echo $sql;
		}
		//mysql_query($sql) or die(mysql_error("<br/> => ".mysql_query()));
		$connect = new Connect();
		$DB = $connect->Connect();
		$req = $DB->query($sql);
		if(!isset($data["id"]) && empty(isset($data["id"]))){
			$this->id = mysql_insert_id();
		} else {
			$this->id = $data["id"];
		}
	}
	
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
			
			/* 
			
			*/
		$connect = new Connect();
		$DB = $connect->Connect();
		$req = $DB->query($sql);
		$db = array();		
		while($d = $req->fetch(PDO::FETCH_ASSOC)){
			$db[] = $d;			
		}		
		return $db;
	}
	
	public function findDate($date)
	{		
		$sql = "SELECT * FROM ".$table." WHERE ReleaseDate LIKE '%$date%'";
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
	
	static function load($name){
		require("$name.php");
		return new $name();
	}
}