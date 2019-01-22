<!DOCTYPE html>
<html>
	<!--<link rel="stylesheet" type="text/css" href="inlogsiteopmaak.css">-->
	<link rel="stylesheet" type="text/css" href="inlogsiteopmaak.css">
	

	<meta name="author" content="Eline, Manisha en Ronald">
<head>
<title>
	giebeltjes
</title>
</head>

<body>
<?php
session_start();
if ($_SESSION['uitlog']== 2) {
	$mededeling=" ";
	$_SESSION['mededeling'] = " ";
}elseif ($_SESSION['uitlog'] == 1) {	
	$_SESSION['uitlog'] = $_SESSION['uitlog']+1;
}else{
	$mededeling = $_SESSION['mededeling'];
}

$mededeling="";
	include "db_inloggegevens.php";
	

if(isset($_POST['login'])){
	
	$gebruikersnaam = $_POST['inlognaam'];
	$wachtwoord = $_POST['wachtwoord'];
	
	$mysql = mysqli_connect($host, $db_user, $db_wachtwoord, $db_db) or die ("contact met de server niet mogelijk");
	
	$query = "SELECT wachtwoord FROM inloggegevens WHERE inlognaam = '$gebruikersnaam'";
	
	$uitvoer = mysqli_query($mysql, $query) or die("het gaat hier fout");
	
	while ($rij = mysqli_fetch_assoc($uitvoer)) {
		$goede_wachtwoord = $rij['wachtwoord'];
		
		if($wachtwoord == $goede_wachtwoord) {
			$mededeling = "U bent succesvol ingelogd!";
			$_SESSION['mededeling']= $mededeling;
			$_SESSION['user']=$gebruikersnaam;
			header('Location: vervolgpagina.php');
		} else {
			$mededeling = "Uw wachtwoord is onjuist, probeer het opnieuw.";
		}
	}
}

if (isset($_POST['aanmaken'])) {
	
	header('Location: registratie.php');
}

if (isset($_SESSION['mededeling'])) {
	$mededeling = $_SESSION['mededeling'];
}
	//$mededeling = "Uw usernaam is onbekend";
	

?>
	<form action="inlogsite.php" method="post" class="container">
		<table id="nav">
			<tr id="naam"><td>Inlognaam:</td> <td><input type="text" name="inlognaam"></td></tr>
			<tr id="naam"><td>Wachtwoord:</td> <td><input type="password" name="wachtwoord"></td></tr>
			<tr><td><img src="Icon-slotje_2.png" id="slot">
			</td><td><input type="submit" name="login" value="login">
			<input type="submit" name="aanmaken" value="nieuw account aanmaken"></td></tr>
			<tr><td></td><td><?php print "$mededeling";?></td></tr>
		</table>
	</form>

</body>
</html>
