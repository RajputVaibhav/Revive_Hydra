<?php
 require('auth.php');

 if(!authen())
header("Location:login.php");
?>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
<link href="css/donor.css" rel="stylesheet">
  <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
  <input  name="D_name" placeholder="Name" class="form-control"  type="text" required>
    </div>
  </div>
</div>


<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Gender</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="D_Gender" placeholder="Gender" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Date input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">D.O.B.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
  <input name="D_DOB" placeholder="D.O.B" class="form-control"  type="date" required>
    </div>
  </div>
</div>

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Aadhar Number</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-folder-close"></i></span>
  <input name="D_AadharNo" placeholder="Aadhar Number" class="form-control" type="text" required>
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Blood Group</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
  <input name="D_BloodGroup" placeholder="Blood Group" class="form-control" type="text" required>
    </div>
  </div>
</div>

<!-- Dropdown -->
<div class="form-group">
	<label class="col-md-4 control-label">Organ</label>
	 <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
	<select name="D_Organ" required>
		<option value="kidney">Kidney</option>
		<option value="pancreas">Pancreas</option>
		<option value="liver">Liver</option>
		<option value="lung">Lung</option>
	</select>
 </div>
  </div>	
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Phone Number</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="D_PhoneNo" placeholder="Phone Number" class="form-control" type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Address</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="D_Address" placeholder="Address" class="form-control" type="text" required>
    </div>
  </div>
</div>



<!-- File input-->

<div class="form-group">
  <label class="col-md-4 control-label">Upload ID Proof</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-upload"></i></span>
  <input name="D_IDProof" placeholder="IDProof" class="form-control"  type="file" required>
    </div>
</div>
</div>

<!-- File input-->

<div class="form-group">
  <label class="col-md-4 control-label">Upload Medical Record</label>  
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-upload"></i></span>
  <input name="D_MedicalReport" placeholder="Medical Report" class="form-control" type="file" required>
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
	
<script src="js/donor.js"></script>
	
</body>
</html>

<?php

include('cc.php');
$pdo=connect();

$q="SELECT MAX(count) as m FROM donor_details";
$max=runqueryrow($pdo,$q);
$max['m']=$max['m']+1;

$id="D".$max['m'];
$_SESSION['id']=$id;

$name=$_POST['D_Name'];
$gender=$_POST['D_Gender'];
$dob=$_POST['D_DOB'];
$aadharno=$_POST['D_AadharNo'];
$blood=$_POST['D_BloodGroup'];
$organ=$_POST['D_Organ'];
$phone=$_POST['D_PhoneNo'];
$address=$_POST['D_Address'];

if(isset($_FILES['D_IdProof']))
	{
	$IDfilename=$_FILES['D_IdProof']['name'];
	$IDfilesize=$_FILES['D_IdProof']['size'];
	$IDfiletype=$_FILES['D_IdProof']['type'];
	$IDfileext=strtolower(end(explode('.',$_FILES['D_IdProof']['name'])));
	$IDfiletmp=$_FILES['D_IdProof']['tmp_name'];
	
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

if(isset($_FILES['D_MedicalReport']))
	{
	$MRfilename=$_FILES['D_MedicalReport']['name'];
	$MRfilesize=$_FILES['D_MedicalReport']['size'];
	$MRfiletype=$_FILES['D_MedicalReport']['type'];
	$MRfileext=strtolower(end(explode('.',$_FILES['D_MedicalReport']['name'])));
	$MRfiletmp=$_FILES['D_MedicalReport']['tmp_name'];
	
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
	
$query="INSERT INTO donor_details(`D_ID`, `D_Name`, `D_DOB`, `D_Gender`, `D_AadharNo`, `D_BloodGroup`, `D_Organ`, `D_PhoneNo`, `D_Address`, `D_MedicalReport`, `D_IdProof`) VALUES ('".$id."','".$name."','".$dob."','".$gender."','".$aadharno."','".$blood."','".$organ."','".$phone."','".$address."','".$mr."','".$idp."')";
runqueryall($pdo,$query);


header("Location:match.php");
?>