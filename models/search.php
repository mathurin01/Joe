<?php
class Search extends model
{	
	public function getSameAlbum()
	{	
		$sql = "
			SELECT count(id) , Title as music
			FROM music 
			GROUP BY music 	DESC 
			ORDER BY (count(id)) DESC
            LIMIT 25 ";
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