<?php

/*
*	Classe Controlleur
*	Permet l'affichage des pages avec transmission de paramètres à la vue
*	cette vue est intégrée à un layout générale
*	L'instanciation "automatique" de la classe appelée
*/

class Controller {

	var $vars = array();
	var $layout = 'default';

	public function set($d){
		$this->vars = array_merge($this->vars, $d);
	}

	public function render($filename){
		extract($this->vars);
		ob_start();
		require(ROOT.'views/'.get_class($this).'/'.$filename.'.php');
		$content_for_layout = ob_get_clean();
		if($this->layout == false){
			echo content_for_layout;
		} else {
			require(ROOT.'views/layout/'.$this->layout.'.php');
		}
	}

	public function loadModel($name) {
		require_once(ROOT.'models/'.strtolower($name).'.php');
		$this->$name = new $name();
	}
}
?>