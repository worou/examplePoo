<?php

class Driver
{
	private $base;
	public function __construct($base)
	{
		$this->base=$base;
	}	

	public function listeAction()
	{
		$donnees=array();
		$nb=0;
		$req=$this->base->query
		(
			"SELECT * FROM identite"
		);

		while($ligne = $req->fetch())
		{
			$identite = new Identite();
			$identite->setId($ligne['id']);
			$identite->setNom($ligne['nom']);
			$identite->setPrenom($ligne['prenom']);
			$identite->setAge($ligne['age']);
			$identite->setCommentaire($ligne['commentaire']);

			$donnees[$nb++]=$identite;
		}
		return $donnees;
	}

	public function addAction(Identite $identite)
	{
		$sql="	INSERT INTO 
					identite(nom, prenom, age, commentaire) 
				VALUES
					('".$identite->getNom()."', '".$identite->getPrenom()."', '".$identite->getAge()."', '".$identite->getCommentaire()."')";
		$this->base->exec($sql);
		$ident=$this->base->lastInsertId();
		return $ident;
	}

	public function editAction(Identite $identite, $id)
	{
		$sql="	UPDATE identite 
					SET nom = '".$identite->getNom()."', 
					prenom = '".$identite->getPrenom()."', 
					age = '".$identite->getAge()."', 
					commentaire = '".$identite->getCommentaire()."'
				WHERE id='".$id."'";
		$this->base->exec($sql);

	}

	public function suppAction($id)
	{
		$sql ="DELETE FROM identite WHERE id='".$id."'";
		$this->base->exec($sql);
	}

	public function listePersonneAction($id)
	{
		$donnees=array();
		$nb=0;
		$req=$this->base->query
		(
			"SELECT * FROM identite WHERE id='".$id."'"
		);

		if($ligne=$req->fetch())
		{
			$identite = new Identite();
			$identite->setNom($ligne['nom']);
			$identite->setPrenom($ligne['prenom']);
			$identite->setAge($ligne['age']);
			$identite->setCommentaire($ligne['commentaire']);

			$donnees[$nb]=$identite;
		}
		return $donnees;
	}
}

?>