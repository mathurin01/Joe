<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Toute la musique de Joe Satriani !</h1>
        <p>Classée, (pour le moment) par ordre alphabétique.</p>
      </div>
    </div>
	
	
<div class="container">
	<?php foreach($music as $m){ ?>
		<p><b><?php echo $m['music']; ?></b>
			 <i>tiré de l'album <?php echo $m['Title']; ?></i></p>	
		<?php //} ?>
	<?php } ?>
</div>