<?php

/*
*	Classe accueil, héritant de la classe Controller
*	Permet l'affichage de la page d'accueil
*/

class Accueil extends Controller{

	function index(){
		$this->render('index');
	}
}


?>
