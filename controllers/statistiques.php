<?php

/*
*	Classe statitiques, héritant de la classe Controller
*	Permet l'affichage de quelques statistiques liées au fichier
*/

class Statistiques extends Controller
{	
	var $table = 'music';
	
	function index(){
		$this->loadModel('stat');
		$d['music'] = $this->stat->getSameAlbum();
		$this->set($d);
		$this->render('index');
	}
	
}

