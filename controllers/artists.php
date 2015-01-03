<?php
class Artists extends Controller{

	function index(){
		$d = array();
		$d['cate'] = array(
			'titre' => 'Hard-Rock',
			'descr' => 'type de musique',
		);
		$this->set($d);
		$this->render('index');
	}
}


?>