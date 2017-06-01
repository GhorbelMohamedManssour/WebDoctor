<?php
session_start();


if(isset($_POST['btn_ajout']) )
{
    $matricule=$_SESSION['matricule'];
    $nom=($_POST['patientNom']);
    $prenom=($_POST['patientPrenom']);
    $mobile_number=($_POST['mobile_number']);
    $email=($_POST['email']);
    $dob=($_POST['dob']);
    $location=($_POST['location']);
    $notes=($_POST['notes']);

    try
    {
    $bdd=new PDO('mysql:host=localhost;dbname=dbdoctors;charset=utf8','root','');
    }
    catch(Exception $e)
    {
        die('Erreur:' .$e->getMessage());
    }

$req=$bdd->prepare('INSERT INTO patients(mat_medecin,nom,prenom,mobile_number,email,dob,location,notes) VALUES(:matricule,:nom,:prenom,:mobile_number,:email,:dob,:location,:notes)');
$req->execute(array(

    'matricule' => $matricule,
    'nom' => $nom,
    'prenom' => $prenom,
    'mobile_number' => $mobile_number,
    'email' => $email,
    'dob' => $dob,
    'location' => $location,
    'notes' => $notes,) );
    echo"<script>alert('patient à été ajouté');</script>";

 
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
<h3>Ajouter un patient
    <small>
        Ajouter un nouveau patient
    </small>
</h3>
</div>
<div id='page-content'>";

echo "
<div id='regbox'>
<form action='' method='post' >
     
	        <div class='form-row'>
                <div class='form-label col-md-3'>
                    <label for='Name'>
                       Nom:
                    </label>
                </div>
                <div class='form-input col-md-5'>
                    <input type='text' name='patientNom' required='required'>
                </div>
            </div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                 <label>Prenom :</label>
                </div>				
   <div class='form-input col-md-5'>
                    <input type='text' name='patientPrenom' required='required' />
                </div>
				</div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                 <label>Numero de telephone :</label>
                </div>				
   <div class='form-input col-md-5'>
                   <input type='text' name='mobile_number'required='required'  />
                </div>
				</div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                 <label>Email :</label>
                </div>				
   <div class='form-input col-md-5'>
                   <input type='text' name='email' required='required' />
                </div>
				</div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                <label>Date de naissance :</label>
                </div>				
   <div class='form-input col-md-5'>
                  <input type='date' name='dob' value='12-07-2014' required='required'/>
                </div>
				</div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                <label>Location :</label>
                </div>				
   <div class='form-input col-md-5'>
                <input type='text' name='location'  />
                </div>
				</div>					
<div class='form-row'>
                <div class='form-label col-md-3'>
                <label>Notes :</label>
                </div>				
   <div class='form-input col-md-5'>
               <input type='text' name='notes' required='required' />
                </div>
				</div>
		<button type='submit' name='btn_ajout' class='btn primary-bg medium'>
		
            <span class='button-content'>Ajouter</span>
        </button>
</div>
</form>

</div><!-- #page-content -->
</div><!-- #page-main -->
</div><!-- #page-wrapper -->
</body>
</html>";
?>
