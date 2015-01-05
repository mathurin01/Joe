<?php

/*
*	Classe Musique, héritant de la classe Controller
*	Permet l'affichage de la la liste de l'ensemble des morceaux de l'artiste
*/

class Musique extends Controller{

	function index(){
		$this->loadModel('music');
		$d['music'] = $this->music->getAll();
		$this->set($d);
		$this->render('index');
	}
}


?>