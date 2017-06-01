<?php
session_start();
include_once 'dbconnect.php';

if(isset($_POST['btn-login']) && !empty($_POST['email']) && !empty($_POST['password']) )
{
 $email = ($_POST['email']);
 $upass = ($_POST['password']);
 $salt         = "@|-°+==00001ddQ";
 $upass1 =  md5( $upass . $salt . $email .  $salt . $email . $email  );
 $res=mysql_query("SELECT * FROM medecins WHERE email='$email'");
 $row=mysql_fetch_array($res);
 if($row['password']==($upass1))
 {
  $_SESSION['matricule'] = $row['matricule'];
  $_SESSION['email'] = $row['email'];
  header("Location: dashbord.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
        <title>Doctor's Database Admin</title>
        <meta name='description' content=''>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>

        <!-- Favicons -->

        <link rel='apple-touch-icon-precomposed' sizes='144x144' href='assets/images/icons/apple-touch-icon-144-precomposed.png'>
        <link rel='apple-touch-icon-precomposed' sizes='114x114' href='assets/images/icons/apple-touch-icon-114-precomposed.png'>
        <link rel='apple-touch-icon-precomposed' sizes='72x72' href='assets/images/icons/apple-touch-icon-72-precomposed.png'>
        <link rel='apple-touch-icon-precomposed' href='assets/images/icons/apple-touch-icon-57-precomposed.png'>
        <link rel='shortcut icon' href='assets/images/icons/favicon.png'>

        <!--[if lt IE 9]>
          <script src='assets/js/minified/core/html5shiv.min.js'></script>
          <script src='assets/js/minified/core/respond.min.js'></script>
        <![endif]-->

        <!-- Lyonzone Admin CSS Core -->

        <link rel='stylesheet' type='text/css' href='assets/css/minified/aui-production.min.css'>

        <!-- Theme UI -->

        <link id='layout-theme' rel='stylesheet' type='text/css' href='assets/themes/minified/fides/color-schemes/dark-blue.min.css'>

        <!-- Lyonzone Admin Responsive -->

        <link rel='stylesheet' type='text/css' href='assets/themes/minified/fides/common.min.css'>
        <!-- <link rel='stylesheet' type='text/css' href='../_assets/themes/fides/common.css'> -->

        <link id='theme-animations' rel='stylesheet' type='text/css' href='assets/themes/minified/fides/animations.min.css'>

        <link rel='stylesheet' type='text/css' href='assets/themes/minified/fides/responsive.min.css'>

        <!-- Lyonzone Admin JS -->

        <script type='text/javascript' src='assets/js/minified/aui-production.min.js'></script>

        <script type='text/javascript' src='assets/js/minified/core/raphael.min.js'></script>
        <script type='text/javascript' src='assets/js/minified/widgets/charts-justgage.min.js'></script>
        <script type='text/javascript' src='models/vendor_funcs.js'></script>
    <script type='text/javascript' src='models/funcs.js'></script>
    <script src='models/dropzone.js'></script>
        </script>
  <script src='js-webshim/minified/extras/modernizr-custom.js'></script>
  <script src='js-webshim/minified/polyfiller.js'></script>
   <script>
    $.webshims.polyfill();
    </script>
    </head>  
    <body>
<img src='assets/images/login-bg.jpg' class='login-img' alt=''>
<div class='ui-widget-overlay bg-black opacity-60'></div>
<div id='g10' class='small-gauge float-left hidden'></div>
<div id='g11' class='small-gauge float-right hidden'></div>
<div id='login-page'>
    <form action='' role="form" method='post'>

        <div class='ui-dialog col-md-4 center-margin form-vertical modal-dialog' id='login-form'>
            <div class='ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix'>
                <span class='ui-dialog-title'>Login page</span>
            </div>
            <div class='pad20A pad0B ui-dialog-content ui-widget-content'>
               
                <div class='form-row'>
                    <div class='form-label col-md-2'>
                        <label for=''>
                            Username :
                        </label>
                    </div>
                    <div class='form-input col-md-10'>
                        <div class='form-input-icon'>
                            <i class='glyph-icon icon-envelope-o ui-state-default'></i>
                            <input placeholder='Email address' type='text' name='email' id=''>
                        </div>
                    </div>
                </div>

                <div class='form-row'>
                    <div class='form-label col-md-2'>
                        <label for=''>
                            Password:
                        </label>
                    </div>
                    <div class='form-input col-md-10'>
                        <div class='form-input-icon'>
                            <i class='glyph-icon icon-unlock-alt ui-state-default'></i>
                            <input placeholder='Password' type='password' name='password' id=''>
                        </div>
                    </div>
                </div>
                    
                </div>
           
            <div class='ui-dialog-buttonpane text-center'>
                <button type='submit' name="btn-login" class='btn large primary-bg text-transform-upr font-bold font-size-11 radius-all-4' id='demo-form-valid' title='Validate!'>
                    <span class='button-content'>
                        Login
                    </span>
                </button>
           </div>
        

        
    </form>

</div>
</body>
</html>