<?php

/*
*	Classe artists, héritant de la classe Controller
*	Permet l'affichage des différents artistes de la base
*	- non utilisé actuellement
*/

class Artists extends Controller{

	function index(){
		$this->render('index');
	}
}


?>