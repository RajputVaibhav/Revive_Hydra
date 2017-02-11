<?php
// PDO connect *********
function connect() {
	$host = 'localhost';
	$db_name = 'donor_recipient';
	$db_user = 'donor';
	$db_password = '@123';
	
    return new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

function runqueryall($pdo,$sql)
{$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
return $list;
}
function runqueryrow($pdo,$sql)
{
$query = $pdo->prepare($sql);
$query->execute();
$row = $query->fetch(PDO::FETCH_BOTH);
return $row;
}
?>