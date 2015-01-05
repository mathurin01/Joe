<?php

/*
*	Classe Music, héritant de la classe Model
*	Contient les Getters et Setters de la table correspondante
* 	Contient également une fonction, propre à la classe, permettant l'affichage des morceaux Et des albums dans lesquelles ils apparaissent
*/

class Music extends model
{
	var $table = 'music';
    public $id;
    private $title;
	
    private $Album;

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
		
	public function getAll()
	{	
		$sql = "SELECT m.Title as music, a.Title, a.Releasedate FROM music m INNER JOIN album a ON m.Album_id = a.id ORDER BY music ASC";
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

