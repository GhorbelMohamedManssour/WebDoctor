<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/
session_start();

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
	$id=$_GET['id'];
	$reponse=$bdd->query("SELECT * FROM patients WHERE id_patients = '$id'");
	while ($donnees=$reponse->fetch())
	{
		echo'<br><br>
		<table border width="100%">';
	echo"
<tr>
	<th >Nom</th>
	<th>prenom</th>
	<th>date de naissance</th>
	<th>numero de telephone</th>
</tr>

<tr>";

echo '<td align="center">' .$donnees['nom']. '</td>';
$_SESSION['nom'] = $donnees['nom'] ;
$_SESSION['prenom'] = $donnees['prenom'] ;
echo '<td align="center">' .$donnees['prenom']. '</td>';
echo '<td align="center">' .$donnees['dob']. '</td>';
echo '<td align="center">' .$donnees['mobile_number']. '</td>';
echo '</tr>
		
</table><br>
';
		}
		
	?>
	<div>
	<h3> Une nouvelle visite</h3><br>
	<form action="ajouter_operation.php" method="POST">

		<div class='form-row'>
                <div class='form-label col-md-3'>
                    <label for='Name' >
                       Nom:
                    </label>
                </div>
                <div class='form-input col-md-5'>
                    <input type='text' name='nom' value="<?php echo $_SESSION['nom'] ?>">
                </div>
            </div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                 <label>Prenom :</label>
                </div>				
   <div class='form-input col-md-5'>
                    <input type='text' name='prenom' value="<?php echo $_SESSION['prenom'] ?>" />
                </div>
				</div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                <label>Date de la visite :</label>
                </div>				
   <div class='form-input col-md-5'>
                  <input type='date' name='date' value='12-07-2014' required='required'/>
                </div>
				</div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                 <label>Prix :</label>
                </div>				
   <div class='form-input col-md-5'>
                   <input type='text' name='prix' required='required' />
                </div>
				</div>

<div class='form-row'>
                <div class='form-label col-md-3'>
                <label>Action (consultation / opération) :</label>
                </div>				
   <div class='form-input col-md-5'>
                <input type='text' name='action'  />
                </div>
				</div>					
		<button type='submit' class='btn primary-bg large'>
		
            <span class='button-content'>Envoyez à la bdd</span>
        </button>
</div>

	</form></div>

	<input type="button" value="Retour" onclick="self.location.href='search_doctor.php'" name='btn_supp' class='btn primary-bg large'> 
 <?php
echo"

</div><!-- #page-content -->
</div><!-- #page-main -->
</div><!-- #page-wrapper -->
</body>


</html>";
