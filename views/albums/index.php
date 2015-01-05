<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1>Les albums de Joe Satriani</h1>
		<p>Il n'en manque pas un, jetez-y un  oeil !</p>
	</div>
</div>
	
<div class="container">
	<?php foreach($album as $a){ ?>
		<h2><?php echo $a['Title']; ?></h2>
		<p> album sorti le <?php $formatter = new IntlDateFormatter('fr_FR',IntlDateFormatter::LONG,
					IntlDateFormatter::NONE,
					'Europe/Paris',
					IntlDateFormatter::GREGORIAN );
				$date =new DateTime($a['Releasedate']);
				echo $formatter->format($date); ?><p>		
	<?php } ?>
</div>