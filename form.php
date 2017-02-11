<html>
<body>
<form role="form" action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label>Name : </label> 
	<input class="form-control" type="text" name="D_Name" required>
</div>
<div class="form-group">
	<label>Gender : </label> 
	<input class="form-control" type="text" name="D_Gender" required>
</div>
<div class="form-group">
	<label>Date of birth : </label> 
	<input class="form-control" type="date" name="D_DOB" required>
</div>
<div class="form-group">
	<label>Aadhar Number : </label> 
	<input class="form-control" type="text" name="D_AadharNo" required>
</div>
<div class="form-group">
	<label>Blood Group : </label> 
	<input class="form-control" type="text" name="D_BloodGroup" required>
</div>
<div class="form-group">
	<label>Organ : </label> 
	<select name="D_Organ" required>
		<option value="kidney">Kidney</option>
		<option value="pancreas">Pancreas</option>
		<option value="liver">Liver</option>
		<option value="lung">Lung</option>
	</select>	
</div>
<div class="form-group">
	<label>Phone Number : </label> 
	<input class="form-control" type="text" name="D_PhoneNo" required>
</div>
<div class="form-group">
	<label>Address : </label> 
	<input class="form-control" type="text" name="D_Address" required>
</div>
<div class="form-group">
	<label>Upload ID Proof: </label> 
	<input class="form-control" type="file" name="D_IdProof" required>
</div>
<div class="form-group">
	<label>Upload Medical Records : </label> 
	<input class="form-control" type="file" name="D_MedicalReport" required>
</div>
<button type="submit" name="submit" value="Submit" class="btn btn-warning">
	Submit
</button>

</body>
</html>
<?php

include('cc.php');
$pdo=connect();

$q="SELECT MAX(count) as m FROM donor_details";
$max=runqueryrow($pdo,$q);
$max['m']=$max['m']+1;

$id="D".$max['m'];

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
?>