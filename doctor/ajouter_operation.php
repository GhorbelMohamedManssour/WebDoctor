<?php 
session_start();

	$matricule=$_SESSION['matricule'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$prix=$_POST['prix'];
	$action=$_POST['action'];
	$datee=$_POST['date'];
try
	{
	$bdd=new PDO('mysql:host=localhost;dbname=dbdoctors;charset=utf8','root','');
	}
	catch(Exception $e)
	{
		die('Erreur:' .$e->getMessage());
	}
	
$req=$bdd->prepare('INSERT INTO operation(nom,prenom,matricule,prix,action,datee) VALUES(:nom,:prenom,:matricule,:prix,:action,:datee)');
$req->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'matricule' => $matricule,
	'prix' => $prix,
	'action' => $action,
	'datee' => $datee,)	);
	echo '<h2>Matricule du medecin: </h2>' .$matricule. '<br/>';
	echo '<h2>Nom et prenom: </h2>' .$nom.' '.$prenom. '<br/>';
	echo '<h2>date: </h2>' .$datee. '<br/>';
	echo '<h2>prix: </h2>' .$prix. '<br/>';
	echo '<h2>action: </h2>' .$action. '<br/>';
	?>
	<form>
	<input type="button" value="Imprimer" onClick="window.print()">
	</form>
	

