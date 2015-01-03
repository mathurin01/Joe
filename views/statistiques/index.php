<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Quelques statistiques</h1>
        <p></p>
      </div>
    </div>
	
	
<div class="container">
<?php //var_dump($album); $ii = 0;?>
<?php //var_dump($music); ?>
	<?php foreach($music as $m){ ?>
		<p><b><?php echo $m['music']; ?></b>
		<?php //foreach($album as $a){ ?>
			 -- est présent sur <?php echo $m['count(id)']; ?> album<?php if($m['count(id)'] > 1){echo 's'; } ?></p>	
		<?php //} ?>
	<?php } ?>
</div>