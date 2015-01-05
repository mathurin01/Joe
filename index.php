<?php
	define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
	define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
	
	require(ROOT.'core/controller.php');
	require(ROOT.'core/model.php');
	require(ROOT.'core/core.php');
		
	include_once(ROOT.'controllers/connect.php');
	
	$connect = new Connect();
	
	if(isset($_POST['bdname']) and isset($_POST['login']))
	{
		$connect->index();
		$_POST['host'] != '' ? $host = $_POST['host'] : $host = 'localhost';
		$fic=fopen("doc/parameters.txt", "r+");
		fputs($fic, $host.'/'.$_POST['bdname'].'/'.$_POST['login'].'/'.$_POST['mdp']); 
		fclose($fic);
	}
	
	if(isset($_GET['p']))
	{
		$params = explode('/',$_GET['p']);
		if($params[0] == ''){
			$controller = 'accueil';
			$action = 'index';
		} else {
			$controller = (isset($params[0]) and ($params[0] != 'index'))? $params[0] : 'accueil';
			$action = isset($params[1]) ? $params[1] : 'index';
		}
		if($connect->isConnect()){	
			require('controllers/'.$controller.'.php');	
			$controller = new $controller();
			if(method_exists($controller, $action))
			{
				$controller->$action();
			} else {		
				echo 'erreur 404';
			}	
		}
	}
