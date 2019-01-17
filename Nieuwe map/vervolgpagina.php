<!DOCTYPE html>
<link rel="textsheet" href="inlogsite.php" />
<head>

</head>
<body>
<h2>Welkom!</h2>
<?php
session_start();




$mededeling = $_SESSION['mededeling'];
$usernaam = $_SESSION['user'];
print "Hallo $usernaam, $mededeling";

?> 
<form action="vervolgpagina.php" method="POST">
	<input type="submit" name="uitloggen" value="loguit">
</form>
<?php

if (isset($_POST['uitloggen'])) {
	session_destroy();
	session_start();
	$mededeling =  "u bent succesvol uitgelogd";
	$_SESSION['mededeling'] = $mededeling;

	/*
	$_SESSION['user']=" ";
	$_SESSION['mededeling']="$mededeling";
	print($_POST["uitloggen"])	/*("$_POST["uitloggen"]");*/
	header('Location: inlogsite.php');
	exit();
}	

?>

</body>