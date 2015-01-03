<?php

	if(isset($_POST['host']) and isset($_POST['bdname']) and isset($_POST['login'])){
		$fic=fopen("doc/parameters.txt", "r+");
		fputs($fic, $_POST['host'].'/'.$_POST['bdname'].'/'.$_POST['login'].'/'.$_POST['mdp']); 
		fclose($fic);
		$host = $_POST['host'];
		$bdname = $_POST['bdname'];
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		try{
			$DB = new PDO('mysql:host='.$host.';dbname='.$bdname,$login,$mdp);
			$DB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
			define('BDNAME',$bdname);
			$sql = '
CREATE TABLE IF NOT EXISTS `Album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Releasedate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `album_artist` (
  `album_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`album_id`,`artist_id`),
  KEY `IDX_D322AB301137ABCF` (`album_id`),
  KEY `IDX_D322AB30B7970CF8` (`artist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `Artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) COLLATE utf8_unicode_ci  NULL,
  `Lastname` varchar(255) COLLATE utf8_unicode_ci  NULL,
  `Band` varchar(255) COLLATE utf8_unicode_ci  NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `Music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Album_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C930D4EE841C999` (`Album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;ALTER TABLE `album_artist`;

  ADD CONSTRAINT `FK_D322AB30B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `Artist` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D322AB301137ABCF` FOREIGN KEY (`album_id`) REFERENCES `Album` (`id`) ON DELETE CASCADE;

ALTER TABLE `Music`
  ADD CONSTRAINT `FK_C930D4EE841C999` FOREIGN KEY (`Album_id`) REFERENCES `Album` (`id`);';
			$res = $DB->exec($sql);
			$nblignes = sizeof(file('doc/joe.txt'));
			
			$fic=fopen("doc/joe.txt", "r+");
			$i=1 ;
			$j=0;
			while(!feof($fic))
			{
				$line= fgets($fic,1024);
				$tab[$i] = $line;
				if($i == 1) {
					$res = explode(' ',$line);
					$firstname = $res[1];
					$lastname = $res[2];
							$j++;
				}else{
					//if(preg_match("/((.)*\n{1,2})\s{0,2}sorti\sle:\s{0,1}([0-9]{2}\s{0,1}\/[0-9]{2}\s{0,1}\/[0-9]{4})/i", trim($line)))
					if(preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/i", trim($line)))
					{
						$j++;
						if (strlen($tab[$i-1]) == 2){
							$data[$j]['title'] = $tab[$i-2];
						}
						else{
							$data[$j]['title'] = $tab[$i-1];
						}
						$date = substr($line,-12);
						$date = explode('/',$date);
						$date = trim($date[2]).'-'.trim($date[1]).'-'.trim($date[0]);
						$data[$j]['Releasedate'] = $date;

					}else{
						if (strlen($tab[$i]) != 2 and $i != $nblignes){
							$music[$j]['title'][$i] = $line;
						}
					}
				}
				$i ++;
			}
			$nb = $i;
			$nbalbum = $j;
			fclose($fic);
			
			
			
			$artist = array($firstname, $lastname);
			$req0 = $DB->prepare('INSERT INTO '.BDNAME.'.artist (Firstname, Lastname) VALUES (?, ?)');
			$req0->execute($artist);
			$artistid = $DB->lastInsertId();
			
			for($k=2 ; $k <= $nbalbum ; $k++){
				$req1 = $DB->prepare('INSERT INTO '.BDNAME.'.album (Title, Releasedate) VALUES (:title, :date)');
				$req1->execute(array(
					'title' => $data[$k]['title'],
					'date' => date('Y-m-d', strtotime($data[$k]['Releasedate']))
					));
				$albumid = $DB->lastInsertId();
				
				$d2 = array($albumid, $artistid);
				$req2 = $DB->prepare('INSERT INTO '.BDNAME.'.album_artist (album_id, artist_id) VALUES (?, ?)');
				$req2->execute($d2);
				
				$nbmusic = count($music[$k]['title']);
				//var_dump($data[$k]['title']);
				//var_dump($music[$k]['title']);
				$mm = 0;
				foreach($music[$k]['title'] as $kk => $vv){
					if(($vv!=null or strlen($vv) == 1)and ($mm != $nbmusic-1)){
						$d3 = array($vv, $albumid);
						$req3 = $DB->prepare('INSERT INTO '.BDNAME.'.music (Title, Album_id) VALUES (?, ?)');
						$req3->execute($d3);
					}
					$mm++;
				}
			
			}	
			echo header('Location '.ROOT.'index.php');
			exit();
		}
		catch(PDOException $e){
			echo 'pas de connection';
		}
	} else {
	$fic=fopen("doc/parameters.txt", "r");
	while(!feof($fic))
	{
		$line= fgets($fic,1024);
	}
	fclose($fic) ;
	if(strlen($line) == 0){
			echo'
			<h1>Connexion à la bdd</h1>
			<p> Impossible de se connecter à la bdd de données.
			Veuillez renseigner les champs demandés.</p>
			<form method=\'post\' action=\'connect_bdd\'><div class="form-group">
				votre host (localhost ?) : <input type=\'text\' name=\'host\' ><br/></div>
  <div class="form-group">
				le nom de votre BDD : <input type=\'text\' name=\'bdname\' ><br/></div>
  <div class="form-group">
				votre login : <input type=\'text\' name=\'login\' ><br/></div>
  <div class="form-group">
				votre mot de passe : <input type=\'text\' name=\'mdp\' ><br/></div></div>
  <div class="form-group">
				<input type=\'submit\' class="btn btn-default" value=\'envoyer\'>
			</form>';
			
		}else{
			$param_connect = explode('/',$line);
			$host = $param_connect[0];
			$bdname = $param_connect[1];
			$login = $param_connect[2];
			$mdp = $param_connect[3];
		}
	}
	