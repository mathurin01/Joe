<?php
class albums extends Controller{

	function index(){
		$this->loadModel('album');
		$d['album'] = $this->album->getLast();
		$this->set($d);
		$this->render('index');
	}
}


?>