<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/
session_start();
include_once 'dbconnect.php';
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

echo '<div>
	<form action="ajouter_operation.php" method="POST">
	<label>Nom du patient</label>
	<input type="text" name="nom" required="true"><br/>
	<label>Prénom du patient</label>
	<input type="text" name="prenom" required="true"><br/>
	<label>Date de la visite</label>
	<input type="text" name="date" required="true"><br/>
	<label>Prix</label>
	<input type="text" name="prix" required="true"><br/>

	<input type="submit" value="Envoyez à la bdd"/>
	</form></div>


</div><!-- #page-content -->
</div><!-- #page-main -->
</div><!-- #page-wrapper -->
</body>
</html>';
?>
