	<?php 
		include'header.php';
	?>
<article>
	<?php
		// kijk of er een get variable is
		if (isset($_GET["country"]))
		{
			// doe iets met het land in $_get
			$country = $_GET["country"];
			echo "<h2>".$country."</h2>";
			// get country flag
			$json = file_get_contents("https://restcountries.eu/rest/v1/name/" . $country);
			$countrydata = json_decode($json);
			$countrycode = $countrydata[0]->alpha2Code;
			$countrycode = strtolower($countrycode);
			echo "<img id='flag' src= 'http://www.geonames.org/flags/x/".$countrycode.".gif' alt='$country'/>";
			
			// laad tekst van de bacon ipsum functie
			// documentatie: zie baconipsum.php 
			include 'baconipsum.php';
			echo "<br>" . baconipsum();
		}
		else{
			// redirect to home by javascript because text is already outputted and die
			// header(location: http:sample.com) wil result in error
			echo "<script>window.location.replace('./home.php');</script>";
			die();
		}
	?>
</article>
	
	<?php 
		include'footer.php';
	?>