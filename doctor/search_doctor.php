<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/
session_start();



//require_once("models/config.php");
//if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
include('library.php');

echo "
<body> 
<div id='loading' class='ui-front loader ui-widget-overlay bg-white opacity-100'>
<img src='assets/images/loader-dark.gif' alt=''>
</div>
<div id='page-wrapper' class='demo-example'>";
include('models/topbar.php');
include("models/sidebar.php");
echo "
<div id='g10' class='small-gauge float-left hidden'></div>
<div id='g11' class='small-gauge float-right hidden'></div>
<div id='page-content-wrapper'>
<div id='page-title'>
<h3>Search Doctor
    <small>
        chercher un patient avec son nom ou Prenom
    </small>
</h3>
</div>
<div id='g10' class='small-gauge float-left hidden'></div>
<div id='g11' class='small-gauge float-right hidden'></div>
<div id='page-content'>";
try {
	$bdd=new PDO('mysql:host=localhost;dbname=dbdoctors;charset=utf8','root','');
} catch (Exception $e) {
	die('Erreur: ' .$e->getMessage());
}
	$matricule=$_SESSION['matricule'];
	$reponse=$bdd->query("SELECT * FROM patients WHERE mat_medecin = '$matricule'");
	?><table class='table' id='example1'>
	<tr>
			<th>Nom</th>
			<th>Prenom</th>
		</tr><?php
	while ($donnees=$reponse->fetch())
	{?> 
	<tr> 
		<h4><td><a href="patient-details.php?id=<?php echo $donnees['id_patients'];?>">
		<?php echo htmlspecialchars($donnees['nom']). '</a></td><td> ' .htmlspecialchars($donnees['prenom']). '<td/></h4><br></tr>' ;

	}?></table><?php

echo "
</div><!-- #page-content -->
</div><!-- #page-main -->
</div><!-- #page-wrapper -->
</body>
</html>";
?>

