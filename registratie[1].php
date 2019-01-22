<!DOCTYPE html>
<link rel="textsheet" href="inlogsite.php" />
<head>
	<title>
	Registreren
	</title><link rel="stylesheet" type="text/css" href="inlogsiteopmaak.css">
</head>
<body>

<h2 id="lol">Hey, your new...</h2>

	<form action="registratie.php" method="post" class="container">
		<table>
			<tr><td>Username:</td> <td><input type="text" name="inlognaam"></td></tr>
			<tr><td>Password:</td> <td><input type="password" name="wachtwoord"></td></tr>
			<tr><td>Repeat password:</td><td><input type="password" name="herhalingww"></td></tr>
			<tr><td></td><td><input type="submit" name="aanmaken2" value="create" id="aanmaken">
				<input type="submit" name="annuleren" value="cancel" id="annuleren"> </td></tr>
		</table>
	</form>
<!--onclick="window.Location("inlogsite.php")">-->

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
	if (isset($_POST['annuleren'])) {
		/*header ("Location: inlogsite.php");*/
		/*header('Location: inlogsite.php');*/
		$mededeling =  "registratie is geannuleerd";
		$_SESSION['mededeling'] = $mededeling;
		$_SESSION['uitlog'] = 1;
		header("Location: inlogsite.php");
	}

?>
</body>