<!DOCTYPE html>

<html lang="nl">
	<head>
		<title>
			<?php 
			// get the filename minus the exstention
			$path = $_SERVER['PHP_SELF'];
			$txt = chop($path, ".php");
			echo substr($txt, strrpos($txt, '/') + 1);
			
			?>
		</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="POstyle.css">
	<script src="./script.js"></script> 
</head>
<header>
			<img src="logo2.png" id="logo" alt="logo">
		<nav>
		<a class="button" href="http://ugurlu.mwci.nl/codiad/workspace/canmeesthijmensite/PO/home.php">Home</a>
		<a class="button" href="http://ugurlu.mwci.nl/codiad/workspace/canmeesthijmensite/PO/login.php">Log in</a>
		
		<select id="countries" onchange="ganaarland()">
		<option selected = "selected"> Kies Land </option>
<?php
// load https://restcountries.eu/rest/v1/ and create a dropdown with all country's in it
// edit: stored data localy for performance reasons
$file = file_get_contents('./countries.json');
$json = json_decode($file, true);

foreach ($json as $country)
{
    echo '<option value ="'. $country[name] . '">'.$country[name] .'</option>';
} 
?>
		</select>
	
	</nav>
</header>