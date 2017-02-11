<!DOCTYPE html>
<?php session_start();?>
<html>

<head>
</head>

<body>

<?php 
function authen()
{
    if($_SESSION["auth"]!="YES")
		{echo "Please login to access this content";
		 return 0;
		}
	  else return 1;
}
?>

</body>
</html>