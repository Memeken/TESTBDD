<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
</head>
<body>
	<div align="center">
		<h2>Connexion</h2>
		<br><br><br>
		
		<form method="POST" action="">
			<input type="mail" name="mailconnect" placeholder="Mail">
			<input type="password" name="mdpconnect" placeholder="Mot de passe">
			<input type="submit" name="formconnexion" value="Se connecter">

		</form>
		<?php  
			if (isset($erreur)) {
				echo '<font color="red">' . $erreur . '</font>';
				# code...
			}
		?>
		
	</div>

	
</body>
</html>