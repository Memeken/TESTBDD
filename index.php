<?php 
include 'inscription.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TUTO PHP</title>
</head>
<body>
	<div align="center">
		<h2>Inscription</h2>
		<br><br><br>
		
		<form method="POST" action="">
			<table>
				<tr>
					<td align="right">
						<label for="pseudo">Pseudo: </label><!--le for reprend l'id de l'input que lorsqu'on clique dessus on selectionne automatiquement l'encart-->
					</td>
					<td>
						<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}?>">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="mail">Mail: </label>
					</td>
					<td>
						<input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)){echo $mail;}?>">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="mail2">Confirmation mail: </label>
					</td>
					<td>
						<input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)){echo $mail2;}?>">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="mdp">Mot de passe: </label>
					</td>
					<td>
						<input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="mdp2">Confirmation mot de passe: </label>
					</td>
					<td>
						<input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2">
					</td>
				</tr>
				<tr><!-- ligne-->
					<td></td><!-- colonne -->
					<td align="center">
						<br>
						<input type="submit" value="Je m'inscris" name="forminscription">
					</td>
				</tr>
			</table>

		</form>
		<?php  
			if (isset($erreur)) {
				echo '<font color="red">' . $erreur . '</font>';
				# code...
			}
		?>
		
	</div>
<a href='indexConnexion.php'>Se connecter</a>
	
</body>
</html>