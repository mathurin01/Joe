<?php
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

