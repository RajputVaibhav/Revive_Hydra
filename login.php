
<?php

$loginid=" ";
$password=" ";

if($_POST["username"]&&$_POST["password"])
{
	require('cc.php');
	$pdo=connect();
	$loginid=$_POST["username"];
	$password=$_POST["password"];
	
	$sql="SELECT * FROM login_details WHERE username='".$loginid."'";
	$user=runqueryrow($pdo,$sql);
	
	if(!$user)
	{
		echo "<p>Login failed</p>";
	}
	
	else
	{
		if($teacher["Password"]==$password)
		{
			$_SESSION["auth"]="YES";
			$_SESSION["id"]=$user["ID"];
			
			if(!$user["ID]")
				header("Location:home.php");
			else if($user["ID"][0]=="R")
				header("Location:match.php");
			else
			{	
				echo '<script language="javascript"> alert("Already Registered"); </script>'
			};
		}
		
		else
		{
			echo "<p>Login failed</p>";
		}
	}
}

?>