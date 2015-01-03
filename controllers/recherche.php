<?php
class Recherche extends Controller{

	function index(){
		$this->loadModel('search');
		if(isset($_POST) and !empty($_POST)){
			$d['album'] = $this->search->findFieldAlbum($_POST['find']);
			$d['music'] = $this->search->findFieldMusic($_POST['find']);
			$this->set($d);
		}
		$this->render('index');
	}
}


?>