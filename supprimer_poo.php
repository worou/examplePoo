<?php
	include('Identite.class.php');
	include('Driver.class.php');
	include('connect.php');

	if(isset($_GET['id']))
	{
		$driver = new Driver($base);
		$driver->suppAction($_GET['id']);
		echo "Suppression effectuée";
	}
?>

<META http-equiv="refresh" content="0; URL=affichage.php">