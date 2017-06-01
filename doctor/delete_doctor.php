<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/
error_reporting(0);
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
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
<h3>Delete Doctor Details
    <small>
        Delete Doctor
    </small>
</h3>
</div>
<div id='page-content'>";
if(!empty($_POST))
{
$con=connection();
$Id=$_POST['Id'];
$query="DELETE FROM doctor WHERE Id='$Id'";
$a=mysqli_query($con,$query) ? true : false ;
if($a)
echo "
<div class='row'>
<div class='col-md-4'>

                <div class='infobox success-bg'>
                    <p>1 Doctor has been Deleted.</p>
                </div>
            </div>
			</div>
			";
else echo "
<div class='row'>
<div class='col-md-6'>

                <div class='infobox error-bg mrg0A'>
                    <p>Error Occured</p>
                </div>
            </div>
        </div>
		";
}
if(!empty($_GET))
{
$Id=$_GET['Id'];
$con1=connection();
$query="SELECT * FROM doctor WHERE Id = '$Id'";
$result1=mysqli_query($con1,$query);
$row1=mysqli_fetch_row($result1);
echo "
<div id='regbox'>
<form class='form-bordered' action='".$_SERVER['PHP_SELF']."' method='post'>
<input type='hidden' name='Id' value='$Id'>
            <div class='form-row'>
                <div class='form-label col-md-2'>
                    <label for='Name'>
                       Name:
                    </label>
                </div>
                <div class='form-input col-md-6'>
                    <input type='text' name='doctor_name' id='doctor_name' value='$row1[1]'>
                </div>
            </div>
			 <div class='form-row'>
                <div class='form-label col-md-2'>
                    <label for='Specialisation'>
                        Specialisation:
                    </label>
                </div>
                <div class='form-input col-md-6'>";
                $specialisation=explode(',',$row1[6]);
				for($i=0;$i<sizeof($specialisation);$i++)
				{
				echo "
                <input type='text' name='specialisation[]' id='specialisation' value='$specialisation[$i]'>
				";
				}
				 if($row1[7]==1) $a="less than 10";
						   else if($row1[7]==2) $a="10 - 30";
						   else if($row1[7]==3) $a="30 - 50";
						   else if($row1[7]==4) $a="greater than 50";					
                echo "
				</div>
            </div>
			 <div class='form-row'>
                <div class='form-label col-md-4'>
                    <label for='Patients'>
                       Average no. of Patient seen : $a
					                       </label>
                </div>
                <div class='form-checkbox-radio col-md-4'>
                            <div class='checkbox-radio'>
                                <input type='radio' name='avg_patient_seen' value='1'>
                                <label for=''>less than 10</label>
                            </div>
                            <div class='checkbox-radio'>
                                <input type='radio' name='avg_patient_seen' value='2'>
                                <label for=''>10-30</label>
                            </div>
                              <div class='checkbox-radio'>
                                <input type='radio' name='avg_patient_seen' value='3'>
                                <label for=''>30-50</label>
                            </div>
							  <div class='checkbox-radio'>
                                <input type='radio' name='avg_patient_seen' value='4'>
                                <label for=''>greater than 50</label>
                            </div>
                        </div>
            </div>
<div class='form-row'>
                ";
				$hospital=explode(',',$row1[8]);
				$hospital_timing_from=explode(',',$row1[9]);
				$hospital_timing_to=explode(',',$row1[9]);
				for($i=0;$i<sizeof($hospital);$i++)
				{
				echo "
				<div class='form-label col-md-3'>
                   <label for=''>
                        Hospital:
                    </label>
                </div>
                <div class='form-input col-md-3'>
				 <input type='text' name='hospital_name[]' id='' value='$hospital[$i]'>
                </div>
				 <div class='form-label col-md-1'>
                   <label for=''>
                        From :
                    </label>
                </div>
                <div class='form-input col-md-1'>
                <input type='text' name='hospital_timing_from[]' id='' value='$hospital_timing_from[$i]'> 
                </div>
				 <div class='form-label col-md-1'>
                   <label for=''>
                        To :
                    </label>
                </div>
                <div class='form-input col-md-1'>
                <input type='text' name='hospital_timing_to[]' id='' value='$hospital_timing_to[$i]'> 
                </div>
				";
				}
				echo "
				</div>
<div class='form-row'>
                ";
				$clinic=explode(',',$row1[2]);
				$clinic_timing_from=explode(',',$row1[3]);
				$clinic_timing_to=explode(',',$row1[4]);
				for($i=0;$i<sizeof($clinic);$i++)
				{
				echo "
				<div class='form-label col-md-3'>
                    <label for=''>
                        Clinic :
                    </label>
                </div>
                <div class='form-input col-md-3'>
				<input type='text' name='clinic[]' id='' value='$clinic[$i]'>
                </div>
				<div class='form-label col-md-1'>
                   <label for=''>
                        From :
                    </label>
                </div>
                <div class='form-input col-md-1'>
                <input type='text' name='clinic_timing_from[]' id='' value='$clinic_timing_from[$i]'> 
                </div>
				 <div class='form-label col-md-1'>
                   <label for=''>
                        To :
                    </label>
                </div>
                <div class='form-input col-md-1'>
                <input type='text' name='clinic_timing_to[]' id='' value='$clinic_timing_to[$i]'> 
                </div>";
				}
				echo "
				</div>								
<div class='form-row'>
                ";
				 $clinic=explode(',',$row1[5]);
				for($i=0;$i<sizeof($clinic);$i++)
				{
				echo "
				<div class='form-label col-md-3'>
                 <label for=''>
                        Organisation :
                    </label>
                </div>
                <div class='form-input col-md-5'>
				<input type='text' name='organisation[]' id='' value='$clinic[$i]'> 	 
				";
				}
				echo "
				 </div>
                 </div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                 <label>Qualification :</label>
                </div>				
   <div class='form-input col-md-5'>
                    <input type='text' name='qualification' value='$row1[11]' />
                </div>
				</div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                 <label>Mobile Number :</label>
                </div>				
   <div class='form-input col-md-5'>
                   <input type='text' name='mobile_number' value='$row1[12]'  />
                </div>
				</div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                 <label>Email :</label>
                </div>				
   <div class='form-input col-md-5'>
                   <input type='text' name='email' value='$row1[13]' />
                </div>
				</div>
<div class='form-row'>
                <div class='form-label col-md-3'>
                <label>Birthday : ".date('d-m-Y',strtotime($row1[14]))."</label>
                </div>				
   <div class='form-input col-md-5'>
                  <input type='date' name='dob' required='required' />
                </div>
				</div>";
				$location=explode(',',$row1[15]);
				$location=implode(' ',$location);
				 echo "
<div class='form-row'>
                <div class='form-label col-md-3'>
                <label>Location :</label>
                </div>				
   <div class='form-input col-md-5'>
                <input type='text' name='location[]' value='$location'  />
                </div>
				</div>				
<div class='form-row'>
                <div class='form-label col-md-3'>
                <label>Any Other :</label>
                </div>				
   <div class='form-input col-md-5'>
               <input type='text' name='any_other' value='$row1[16]' />
                </div>
				</div>
		<button class='btn primary-bg medium'>
            <span class='button-content'>Delete</span>
        </button>
</div>
</form>
</div>
";
}
echo "
</div><!-- #page-content -->
</div><!-- #page-main -->
</div><!-- #page-wrapper -->
</body>
</html>";
?>
