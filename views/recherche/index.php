<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Recherche</h1>
        <p>Vous pouvez chercher par mot ou ensemble de mots</p>
      </div>
    </div>
	
	
<div class="container">
	<div class="row">
		<form method="post" action="recherche" class="form-horizontal">
			<div class="form-group">
				<label for="find" class="col-sm-2 control-label"></label>
				<div class="col-sm-10">
					<input type="text" name="find" placeholder="votre recherche ici " >
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Chercher</button>
				</div>
			</div>
		</form>
	</div>
	<?php if(isset($_POST) and !empty($_POST)){ ?>	
		<?php if(isset($album) and !empty($album)){ ?>
			<h4>Le mot <b><?php echo $_POST['find'] ?></b> est présent sur le titre d'un album</h4>
			<?php foreach($album as $a){ ?>
				<h2><?php //echo $a['Title']; ?>
				<?php echo str_replace($_POST['find'], '<b>'.$_POST['find'].'</b>', $a['Title']); ?>
				</h2><p> album sorti le <?php $formatter = new IntlDateFormatter('fr_FR',IntlDateFormatter::LONG,
						IntlDateFormatter::NONE,
						'Europe/Paris',
						IntlDateFormatter::GREGORIAN );
					$date =new DateTime($a['Releasedate']);
					echo $formatter->format($date); ?><p>
			<?php } ?>
			
			
		<?php } ?>
		<hr />
		<?php if(isset($music) and !empty($music)){ ?>
			<h4>Le mot <b><?php echo $_POST['find'] ?></b> est présent sur le titre d'un morceau</h4>
			<?php foreach($music as $m){ ?>
				<h2><?php echo str_replace($_POST['find'], '<i>'.$_POST['find'].'</i>', $m['music']); ?></h2>
				 <i>tiré de l'album <?php echo $m['Title']; ?></i></p>	
			<?php } ?>
		<?php } ?>
		
		<?php if(empty($music) and empty($album)){ ?>
			<h4>Aucun résultat pour la recherche du mot  <b><?php echo $_POST['find'] ?></b></h4>
		<?php } ?>
	<?php } ?>
</div>