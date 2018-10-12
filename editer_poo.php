<?php
	include('Identite.class.php');
	include('Driver.class.php');
	include('connect.php');


	if(isset($_POST) && !empty($_POST['nom']))
	{
		$driver = new Driver($base);
		$identite = new Identite();

		$identite->setNom($_POST['nom']);
		$identite->setPrenom($_POST['prenom']);
		$identite->setAge($_POST['age']);
		$identite->setCommentaire($_POST['commentaire']);

		$id=$_GET['id'];

		$driver->editAction($identite, $id);

		echo "Modification effectuée <META http-equiv=\"refresh\" content=\"0; URL=affichage.php\">";
	}

	$driver = new Driver($base);
	$contenu = $driver->listePersonneAction($_GET['id']);
	foreach ($contenu as $val) 
	{
		$nom=$val->getNom();
		$prenom=$val->getPrenom();
		$age=$val->getAge();
		$commentaire=$val->getCommentaire();
	}
?>

<!DOCTYPE html>
<head>
	<title>Liste des personnages</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>Modification de données <a href="affichage.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-left"></span> Retour</a></h1>
		<form action="" method="post">
			<div class="form-group">
				<label for="nom">Id</label>
				<p><?php echo $_GET['id']; ?></p>			
			</div>
			<div class="form-group">
				<label for="nom">Nom</label>
				<input type="text" class="form-control" name="nom" id="nom" value="<?php echo $nom; ?>">				
			</div>
			<div class="form-group">
				<label for="prenom">Prénom</label>
				<input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $prenom; ?>">				
			</div>
			<div class="form-group">
				<label for="age">Age</label>
				<input type="number" class="form-control" name="age" id="age" value="<?php echo $age; ?>">				
			</div>
			<div class="form-group">
				<label for="commentaire">Commentaire</label>
				<textarea class="form-control" id="commentaire" name="commentaire" rows="5"><?php echo $commentaire; ?></textarea>				
			</div>
			<button type="submit" class="btn btn-primary">Editer</button>
		</form>		
	</div>
</body>