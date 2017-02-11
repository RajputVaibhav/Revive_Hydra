<?php
include('cc.php');
$pdo=connect();

if($_POST['username']&&$_post['password'])
{
	$q="INSERT INTO `login_details`(`username`, `password`, `email_id`) VALUES ('".$_POST['username']."','".$_POST[password]."','".$_POST[email]."')";
	runqueryall($pdo,$q);
	
	header("Location:home.php");
}



?>