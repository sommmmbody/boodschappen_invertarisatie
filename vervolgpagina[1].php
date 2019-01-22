<!DOCTYPE html>

<head>
	<title>welkom</title>
<!--<link rel="stylesheet" type="text/css" href="inlogsiteopmaak.css">-->
<link rel="stylesheet" type="text/css" href="vervolgpaginaopmaak.css">
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
//ervoor zorgen dat je niet zonder inloggen op de vervolgpagina kan komen
if (!isset($_SESSION['user'])) {
	$_SESSION['mededeling'] = "log eerst in alstublieft";
	header('Location: inlogsite.php');
}
//zorgen dat de session wordt geleegd en opnieuw gevuld bij uitloggen voor bericht op inlogscherm
if (isset($_POST['uitloggen'])) {
	session_destroy();
	session_start();
	$mededeling =  "u bent succesvol uitgelogd";
	$_SESSION['mededeling'] = $mededeling;
	$_SESSION['uitlog'] = 1;
	header('Location: inlogsite.php');
	exit();
}

?>

</body>