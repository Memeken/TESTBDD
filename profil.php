<?php 
session_start();
if(!isset($_SESSION['mail'])){
   header("Location:index.php");
};

try{
$bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8", "damery","damery");
}catch(PDOException $error){
	echo "erreur" . $error-> getMessages(); // message test pour voir si la bdd est connectee (tu le marques tel quel)
}
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM membres WHERE id=?");
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Profil</title>
</head>
<body>
	<div align="center">
		<h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
		<br><br><br>
		Pseudo = <?php echo $userinfo['pseudo']; ?>
		<br>
		Mail = <?php echo $userinfo['mail']; ?>
		<br>
		<br>
		<form method="post" action="logout.php">
            <input type="submit" name="submit" value="logout" action="logout.php" id="logout">
        </form>
		<?php 
		// if($userinfo['id'] == $_SESSION['id'])
		// {
		
		// echo 'ok';
		 
		// }

		?>
			
	</div>
</body>
</html>
<?php 
}
?>