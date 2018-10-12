<?php

class Identite
{
	private $id; 
	private $nom;
	private $prenom;
	private $age;
	private $commentaire;

		

public function getId()
{
	return $this->id;
}

public function getNom()
{
	return $this->nom;
}

public function getPrenom()
{
	return $this->prenom;
}

public function getAge()
{
	return $this->age;
}

public function getCommentaire()
{
	return $this->commentaire;
}

public function setId($id)
{
	$this->id=$id;
}

public function setNom($nom)
{
	$this->nom=$nom;
}

public function setPrenom($prenom)
{
	$this->prenom=$prenom;
}

public function setAge($age)
{
	$this->age=$age;
}

public function setCommentaire($commentaire)
{
	$this->commentaire=$commentaire;
}
}

?> 