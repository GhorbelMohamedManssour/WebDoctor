<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/
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
<div id='page-content-wrapper'>";


try {
	$bdd=new PDO('mysql:host=localhost;dbname=dbdoctors;charset=utf8','root','');
} catch (Exception $e) {
	die('Erreur: ' .$e->getMessage());
}
	$matricule=$_GET['mat'];
	$reponse=$bdd->query("SELECT * FROM operation WHERE matricule = '$matricule'");
	echo'<br><br>
		<table border width="100%">';
	echo"
<tr>
	<th >Date</th>
	<th>Type operation</th>
	<th>prix</th>
</tr>";
	while ($donnees=$reponse->fetch())
	{
		echo "

<tr>";
echo '<td align="center">' .$donnees['datee']. '</td>';
echo '<td align="center">' .$donnees['action']. '</td>';
echo '<td align="center">' .$donnees['prix']. '</td>';
echo '</tr>';
		

		}echo '</table><br>';
		
	?>
	<input type="button" value="Retour" onclick="self.location.href='search_doctor.php'" name='btn_supp' class='btn primary-bg large'> 
 <?php
echo"

</div><!-- #page-content -->
</div><!-- #page-main -->
</div><!-- #page-wrapper -->
</body>


</html>";
?>