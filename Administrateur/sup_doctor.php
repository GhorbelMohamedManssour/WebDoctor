<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/
session_start();

if(isset($_POST['btn_supp']) && !empty($_POST['matricule']) )
{
    $matricule=($_POST['matricule']);

    try
    {
    $bdd=new PDO('mysql:host=localhost;dbname=dbdoctors;charset=utf8','root','');
    }
    catch(Exception $e)
    {
        die('Erreur:' .$e->getMessage());
    }
    $matricule=$_SESSION['matricule'];
    $reponse=$bdd->query("SELECT nom FROM medecins WHERE matricule = '$matricule'");
	$donnees=$reponse->fetch();
	$nom=$donnees['nom'];
	if($nom)
	{
	$reponse1=$bdd->query("DELETE FROM medecins WHERE matricule = '$matricule'");
    echo "<script>alert('le medecin  a été supprimé avec succés');</script>";}
    $reponse->closeCursor();

 
}

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
<h3>Supprimer un medecin

</h3>
</div>";

echo "
<form method='POST' action=''><br><br>
<div class='form-input col-md-5'>
<input placeholder='Taper la matricule du medecin a supprimer '' type='text' name='matricule'></div>
<button name='btn_supp' class='btn primary-bg large'> <span class='button-content'>supprimer</span></button>
</form>


</div><!-- #page-content -->
</div><!-- #page-main -->
</div><!-- #page-wrapper -->
</body>
</html>";
?>
