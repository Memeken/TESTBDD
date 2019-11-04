<?php 
try{
$bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8", "damery","damery");
}catch(PDOException $error){
	echo "erreur" . $error-> getMessages(); // message test pour voir si la bdd est connectee (tu le marques tel quel)
}

if (isset($_POST['forminscription'])) 
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$mail2 = htmlspecialchars($_POST['mail2']);
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdp2']);

	if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) 
	{
		$pseudolength = strlen($pseudo);
		if ($pseudolength <= 255) 
		{
			if($mail == $mail2)
			{
				if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
				{	
					$reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail=?");
					$reqmail->execute(array($mail));
					$mailexiste = $reqmail->rowcount();
					if($mailexiste == 0)
					{
						if ($mdp == $mdp2) 
						{
							$insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES (?, ?, ?)");
							$insertmbr->execute(array($pseudo,$mail,$mdp));
							// $erreur = "Votre compte a bien été créé!";
							header('Location:indexConnexion.php');
						}
						else
						{
							$erreur = "Vos mots de passe ne correspondent pas";
						}
					}
					else
					{
						$erreur ="Adresse mail déjà utilisée";
					}
				}
				else
				{
					$erreur = "Votre adresse mail n'est pas valide!";
				}
			}
			else
			{

				$erreur = "Vos adresses mail ne correspondent pas";
			}
		}
		else
		{
			$erreur = "votre pseudo ne doit pas dépasser 255 caractères";
		}
	}
	else
	{
		$erreur = "Tous les champs doivent être complétés";
	}
	# code...
}
 ?>