<?php
try
{
	$base = new PDO('mysql:host=localhost; dbname=personne','root','');
    $base->exec('SET CHARACTER SET utf8');

}
catch(Exception $e)
{
	die('Erreur:'.$e->getMessage());
}
?>