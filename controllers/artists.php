<?php
class artists extends controller{


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