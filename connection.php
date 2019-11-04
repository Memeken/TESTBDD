<?php 
session_start();

if(isset($_POST['formconnexion'])){
	$mailconnect = htmlspecialchars($_POST['mailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);

try{
$bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8", "damery","damery");
	if (!empty($mailconnect) AND !empty($mdpconnect)){
		$requser = $bdd->query("SELECT * FROM membres WHERE mail='$mailconnect' && motdepasse='$mdpconnect'");
		// $requser->execute(array($mailconnect, $mdpconnect));
		$userexist = $requser->rowCount();

		if ($userexist > 0) {
			// $userinfo = $userexist->fetch();
			$_SESSION['session']=true;
			// $_SESSION['id'] = $userinfo['id'];
			// $_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['mail'] = $mailconnect;
			$stmt = $bdd->query("SELECT id FROM membres WHERE mail='$mailconnect'");	
			$id=$stmt->fetchColumn();
			header('Location: profil.php?id='. $id);
			
		}
		else
		{
			$erreur = "Mauvais mail ou mot de passe";
		}
	}
	else
	{
		$erreur = "Tous les champs doivent être complétés";
	}

}catch(PDOException $error){
	echo "erreur" . $error-> getMessages(); // message test pour voir si la bdd est connectee (tu le marques tel quel)
}
}
?>
