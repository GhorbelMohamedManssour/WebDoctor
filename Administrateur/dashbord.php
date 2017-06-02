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

<img src='assets/images/login-bg.jpg' class='login-img' alt=''>
</div>
<div id='page-wrapper' class='demo-example'>";
include('models/topbar.php');
include("models/sidebar.php");
echo "
<div id='g10' class='small-gauge float-left hidden'></div>
<div id='g11' class='small-gauge float-right hidden'></div>
<div id='page-content-wrapper'>";

echo '
<h1>Bienvenue !!! </h1>
<img style="width:1128px; height:700px;" src="assets\images\login-bg.jpg"/>

</div><!-- #page-content -->
</div><!-- #page-main -->
</div><!-- #page-wrapper -->
</body>
</html>';
?>
