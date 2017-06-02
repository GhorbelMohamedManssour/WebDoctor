<?php

if(isset($_POST['btn_ajout']) )
{
    $nom=($_POST['doctorNom']);
    $prenom=($_POST['doctorPrenom']);
    $matricule=($_POST['matricule']);
    $email=($_POST['email']);
    $dob=($_POST['dob']);
    $location=($_POST['location']);
    $password=($_POST['password']);

    try
    {
    $bdd=new PDO('mysql:host=localhost;dbname=dbdoctors;charset=utf8','root','');
    }
    catch(Exception $e)
    {
        die('Erreur:' .$e->getMessage());
    }
    $salt         = "@|-°+==00001ddQ";
     $password1 =  md5( $password . $salt . $email .  $salt . $email . $email  );
$req=$bdd->prepare('INSERT INTO medecins(nom,prenom,matricule,email,dob,location,password) VALUES(:nom,:prenom,:matricule,:email,:dob,:location,:password)');
$req->execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'matricule' => $matricule,
    'email' => $email,
    'dob' => $dob,
    'location' => $location,
    'password' => $password1,) );
    echo "<script>alert('medecin à été ajouté');</script>";

 
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
<h3>Ajouter un medecin
    <small>
        Ajouter un nouveau medecin
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
                    <input type='text' name='doctorNom' required='required'/>
                </div>
            </div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                 <label>Prenom :</label>
                </div>              
   <div class='form-input col-md-5'>
                    <input type='text' name='doctorPrenom' required='required' />
                </div>
                </div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                 <label>Matricule :</label>
                </div>              
   <div class='form-input col-md-5'>
                   <input type='text' name='matricule' required='required' />
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
                  <input type='date' name='dob' value='12-07-2014' />
                </div>
                </div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                <label>Adresse de la cabine :</label>
                </div>              
   <div class='form-input col-md-5'>
                <input type='text' name='location' required='required' />
                </div>
                </div>                  
<div class='form-row'>
                <div class='form-label col-md-3'>
                <label>Mot de passe :</label>
                </div>              
   <div class='form-input col-md-5'>
               <input type='password' name='password' required='required' />
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
