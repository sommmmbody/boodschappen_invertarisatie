<!DOCTYPE html>
<link rel="textsheet" href="inlogsite.php" />
<head>
	<title>
	welkom
	</title>
</head>
<body>
<h2>Hey, your new...</h2>

	<form action="registratie.php" method="post">
		<table>
			<tr><td>Inlognaam:</td> <td><input type="text" name="inlognaam"></td></tr>
			<tr><td>Wachtwoord:</td> <td><input type="password" name="wachtwoord"></td></tr>
			<tr><td>Herhaling wachtwoord:</td><td><input type="password" name="herhalingww"></td></tr>
			<tr><td></td><td><input type="submit" name="aanmaken2" value="aanmaken"></td></tr>
		</table>
	</form>


<?php
	session_start();

	include "db_inloggegevens.php";
	
if(isset($_POST['aanmaken2'])){
	
		$inlognaam = $_POST['inlognaam'];
		$wachtwoord = $_POST['wachtwoord'];
		$wwherhaling = $_POST['herhalingww'];
		if($inlognaam=="" || $wachtwoord=="") {
			print "Velden zijn leeg";
		} elseif ($wachtwoord == $wwherhaling){
	
			$mysql = mysqli_connect ($host, $db_user2, $db_wachtwoord, $db_db) or die ("contact met de server niet mogelijk");
	
			$query ="INSERT INTO inloggegevens VALUES ('$inlognaam', '$wachtwoord')";
			
			$uitvoer = mysqli_query($mysql, $query) or die("het gaat hier fout");
			
			mysqli_close ($mysql);
			
			header ("Location: inlogsite.php");
			
		} else {
			print "wachtwoorden komen niet overeen...";
		}
		
}
?>
</body>