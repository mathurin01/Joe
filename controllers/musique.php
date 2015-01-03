<?php
class Musique extends Controller{

	function index(){
		$this->loadModel('music');
		$d['music'] = $this->music->getAll();
		$this->set($d);
		$this->render('index');
	}
}


?>