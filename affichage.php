<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title>Exemple POO</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h2>Affichage <a href="ajout.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h2>
			<?php
			include('Identite.class.php');
			include('Driver.class.php');
			include('connect.php');

			$driver = new Driver($base);
			$contenu = $driver->listeAction();
			if(empty($contenu))
			{
				echo 'Erreur' ;
			}
			else
			{
	?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>NOM</th>
							<th>PRENOM</th>
							<th>AGE</th>
							<th>COMMENTAIRE</th>
							<th>ACTIONS</th>
						</tr>	
					</thead>
					<tbody>
							<?php
							foreach ($contenu as $val) 
							{
								echo "<tr><td>".$val->getId()."</td>".
								"<td>".$val->getNom()."</td>".
								"<td>".$val->getPrenom()."</td>".
								"<td>".$val->getAge()."</td>".
								"<td>".$val->getCommentaire()."</td>";
								?>
									<td>
										<a href="editer_poo.php?id=<?php echo $val->getId(); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> Editer</a>
										<a href="supprimer_poo.php?id=<?php echo $val->getId(); ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Supprimer</a>
									</td>
								</tr>
								<?php

							}
							?>
					</tbody>
				</table>
	<?php
			}
			?>
		</div>
	</body>
</html>