<?php

/*
*	Classe albums, héritant de la classe Controller
*	Permet l'affichage de la liste des albums
*/

class albums extends Controller{

	function index(){
		$this->loadModel('album');
		$d['album'] = $this->album->getLast();
		$this->set($d);
		$this->render('index');
	}
}


?>