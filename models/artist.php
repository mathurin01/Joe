<?php

/*
*	Classe Artist, héritant de la classe Model
*	Contient les Getters et Setters de la table correspondante
*/

class Artist extends Model {

	var $table = 'artist';
    public $id;
    private $firstname;
    private $lastname;


    public function getId()
    {
        return $this->id;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }
}

