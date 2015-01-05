<?php

/*
*	Classe recherche, héritant de la classe Controller
*	Permet d'effectuer une recherche sur un mot ou ensemble de mot 
*	dans les colonnes 'Title' de la table album
*	et 'Title' de la table music
*/

class Recherche extends Controller{

	function index(){
		$this->loadModel('search');
		if(isset($_POST['find']) and $_POST['find'] != ''){
			$d['album'] = $this->search->findFieldAlbum($_POST['find']);
			$d['music'] = $this->search->findFieldMusic($_POST['find']);
			$this->set($d);
		} 
		$this->render('index');
	}
}


?>