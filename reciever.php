<?php
 require('auth.php');

 if(!authen())
header("Location:login.php");
?>
<html>
<head>
<link href="css/reciever.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <form class="well form-horizontal" action="<?php $_PHP_SELF ?>" method="post"  id="contact_form" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Contact Us Today!</legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="R_name" placeholder="First Name" class="form-control"  type="text" required>
    </div>
  </div>
</div>


<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Gender</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="R_Gender" placeholder="Gender" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Date input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">D.O.B.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="R_DOB" placeholder="D.O.B" class="form-control"  type="date" required>
    </div>
  </div>
</div>

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Aadhar Number</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="R_AadharNo" placeholder="Aadhar Number" class="form-control" type="text" required>
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Blood Group</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="R_BloodGroup" placeholder="Blood Group" class="form-control" type="text" required>
    </div>
  </div>
</div>

<!-- Dropdown -->
<div class="form-group">
	<label class="col-md-4 control-label">Organ</label>
	<select name="R_Organ" required>
		<option value="kidney">Kidney</option>
		<option value="pancreas">Pancreas</option>
		<option value="liver">Liver</option>
		<option value="lung">Lung</option>
	</select>	
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Phone Number</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="R_PhoneNo" placeholder="Phone Number" class="form-control" type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Address</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="R_Address" placeholder="Address" class="form-control" type="text" required>
    </div>
  </div>
</div>



<!-- File input-->

<div class="form-group">
  <label class="col-md-4 control-label">Upload ID Proof</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="R_IDProof" placeholder="IDProof" class="form-control"  type="file" required>
    </div>
</div>
</div>

<!-- File input-->

<div class="form-group">
  <label class="col-md-4 control-label">Upload Medical Record</label>  
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
  <input name="R_MedicalReport" placeholder="Medical Report" class="form-control" type="text" required>
    </div>
  </div>
</div>


<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" name="submit" value="Submit">Submit <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div>
	
<script src="js/reciever.js"></script>
	
</body>
</html>
<?php

include('cc.php');
$pdo=connect();

$q="SELECT MAX(count) as m FROM recipient_details";
$max=runqueryrow($pdo,$q);
$max['m']=$max['m']+1;

$id="R".$max['m'];
$_SESSION['id']=$id;

$name=$_POST['R_Name'];
$gender=$_POST['R_Gender'];
$dob=$_POST['R_DOB'];
$aadharno=$_POST['R_AadharNo'];
$blood=$_POST['R_BloodGroup'];
$organ=$_POST['R_Organ'];
$phone=$_POST['R_PhoneNo'];
$address=$_POST['R_Address'];

if(isset($_FILES['R_IdProof']))
	{
	$IDfilename=$_FILES['R_IdProof']['name'];
	$IDfilesize=$_FILES['R_IdProof']['size'];
	$IDfiletype=$_FILES['R_IdProof']['type'];
	$IDfileext=strtolower(end(explode('.',$_FILES['R_IdProof']['name'])));
	$IDfiletmp=$_FILES['R_IdProof']['tmp_name'];
	
	$ext="pdf";
	$err=array();
	
	if($IDfileext!=$ext)
		{
			$err[]="Extention should be .pdf";
		}
	if($IDfilesize>2097152)
		{
			$err[]="File size exceeds 2mb";
		}
	if(empty($err)==true)
		{
			move_uploaded_file($IDfiletmp,"..\Newfolder\idproof\idproof".$id.".pdf");
		}
	else
		print_r($err);
	}

if(isset($_FILES['R_MedicalReport']))
	{
	$MRfilename=$_FILES['R_MedicalReport']['name'];
	$MRfilesize=$_FILES['R_MedicalReport']['size'];
	$MRfiletype=$_FILES['R_MedicalReport']['type'];
	$MRfileext=strtolower(end(explode('.',$_FILES['R_MedicalReport']['name'])));
	$MRfiletmp=$_FILES['R_MedicalReport']['tmp_name'];
	
	$ext="pdf";
	$err=array();
	
	if($MRfileext!=$ext)
		{
			$err[]="Extention should be .pdf";
		}
	if($MRfilesize>2097152)
		{
			$err[]="File size exceeds 2mb";
		}
	if(empty($err)==true)
		{
			move_uploaded_file($MRfiletmp,"..\Newfolder\medicalreport\medicalreport".$id.".pdf");
		}
	else
		print_r($err);
	}
	
$mr="..\Newfolder\medicalreport\medicalreport".$id.".pdf";
$idp="..\Newfolder\idproof\idproof".$id.".pdf";
	
$query="INSERT INTO recipient_details(`R_ID`, `R_Name`, `R_DOB`, `R_Gender`, `R_AadharNo`, `R_BloodGroup`, `R_Organ`, `R_PhoneNo`, `R_Address`, `R_MedicalReport`, `R_IdProof`) VALUES ('".$id."','".$name."','".$dob."','".$gender."','".$aadharno."','".$blood."','".$organ."','".$phone."','".$address."','".$mr."','".$idp."')";
runqueryall($pdo,$query);
?>