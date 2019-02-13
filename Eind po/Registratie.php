<!DOCTYPE html>
<link rel="textsheet" href="inlogsite.php" />
<head>
	<link rel="stylesheet" type="text/css" href="Registratie.css">
	<title>
	Registreren
	</title><link rel="stylesheet" type="text/css" href="inlogsiteopmaak.css">
</head>
<body>

<h2 id="lol">Registreer je hier</h2>

	<form action="registratie.php" method="post" class="container">
		<table>
			<tr><td>E-mail adres:</td> <td><input type="text" name="email"></td></tr>
			<tr><td>Naam:</td><td><input type="text" name="naam"></td>	
			</tr>
			<tr><td>Wachtwoord:</td> <td><input type="password" name="wachtwoord"></td></tr>
			<tr><td>Herhaal wachtwoord:</td><td><input type="password" name="herhalingww"></td></tr>
			<tr><td colspan="2" id="knoppen"><input type="submit" name="aanmaken2" value="registreren" id="aanmaken">
				<input type="submit" name="annuleren" value="annuleren" id="annuleren">
				<input type="submit" name="privacy" value="Privacy voorwaarden"> </td></tr>
		</table>
	</form>
<!--onclick="window.Location("inlogsite.php")">-->

<?php
	session_start();

	include "db_registratie.php";
	
if(isset($_POST['aanmaken2'])){
	
		$Email = $_POST['email'];
		$Naam = $_POST['naam'];
		$Wachtwoord = $_POST['wachtwoord'];
		$wwherhaling = $_POST['herhalingww'];
		if($Email=="" || $Wachtwoord=="") {
			print "Velden zijn leeg";
		} elseif ($Wachtwoord == $wwherhaling){
	
			$mysql = mysqli_connect ($host, $db_user, $db_wachtwoord, $db_db) or die ("contact met de server niet mogelijk");
	
			$query ="INSERT INTO eindpo(Email, Wachtwoord, Naam) VALUES ('$Email', '$Wachtwoord', '$Naam')";
			
			$uitvoer = mysqli_query($mysql, $query) or die("het gaat hier fout");
			
			mysqli_close ($mysql);
			
			//de locatie van de pagina na succesvol registreren
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

	if (isset($_POST['privacy'])) {
		header("location: Privacy.php");
	}
?>
</body>