<?php
 		$controleuname = "Username";
 		$controleww = "Password";
 		$controleuname2 = "Gebruikersnaam";
 		$controleww2 = "Wachtwoord";
 		$username = $_POST["uname"];
 		$password = $_POST["psw"];
 		
 		if ($controleuname == $username && $controleww == $password) {
 			session_start();
 			$_SESSION['username']=$username;
 			header('Location: coderen.php');
 		}
 		else if ($username == $controleuname2 && $password == $controleww2) {
 			session_start();
 			$_SESSION['username']=$username;
 			header('Location: coderen.php');
 		}
 		else if (!isset($username))
 			$error = 1;
 	?>
 	

<?php include'header.php';?>

	
	<article id="loginarticle">
	

	
<p id="logintekst"><b>Log in met de juiste inlog gegevens!</b></p>

<div id="id01">
  
  <form action = "login.php" method="post">
   	<br>
      <label><b>Username</b></label><br><br>
      <input id="username" type="text" placeholder="Enter Username" name="uname">
     
    <br>
	<br>
      <label><b>Password</b></label><br>
      <input id="password" type="password" placeholder="Enter Password" name="psw">
    <br>
    <?php
  		if($_GET['error']==1){
  			echo '<p id="error">login not valid</p>';
		}
	?>
      
      <br>
      <button type="submit">Login</button>
      <br>
  </form>
</div>
 

	</article>