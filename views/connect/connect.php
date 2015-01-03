<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Joe Satriani</h1>
		<h2>Connexion à la bdd</h2>
        <p>Impossible de se connecter à la base de données. Veuillez renseigner les champs demandés.</p>
      </div>
    </div>
	
<div class="row">
	<form method="post" action="index" class="form-horizontal">
		<div class="form-group">
			<label for="host" class="col-sm-2 control-label">votre host : </label>
			<div class="col-sm-10">
				<input type="text" name="host" placeholder="localhost" >
			</div>
		</div>
		<div class="form-group">
			<label for="bdname" class="col-sm-2 control-label">le nom de votre BDD : </label>
			<div class="col-sm-10">
				<input type="text" name="bdname" >
			</div>
		</div>
		<div class="form-group">
			<label for="login" class="col-sm-2 control-label">votre login : </label>
			<div class="col-sm-10">
				<input type="text" name="login" >
			</div>
		</div>
		<div class="form-group">
			<label for="mdp" class="col-sm-2 control-label">votre mot de passe : </label>
			<div class="col-sm-10">
				<input type="text" name="mdp" >
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Envoyer</button>
			</div>
		</div>
	</form>
</div>