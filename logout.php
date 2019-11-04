<?php
	session_start();
	session_destroy();
	echo "disconnected" . "<a href='index.php'></a>";
?>
	<br>
	<a href="index.php">Retour</a>
