<!DOCTYPE html>
<?php    
session_start();


$bdd = new PDO('mysql:host=africayhedi.mysql.db;dbname=africayhedi;charset=utf8', 'africayhedi', '2584296Aa');
if (isset($_SESSION['id'])) {
	$pseudo = $_SESSION['pseudo'];
	$id = $_SESSION['id'];
	$jeux = "FIFA";
	$cons = "psn";

}
else
{

	header("Location: connexion.php");
	
}






?>


<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css" />
	<title>Acceuil</title>
</head>
<body>
	<header>
		<div class="entete" >
			<a href="Acceuil.php"><img src="images/LOGO.png" width= 5% height= 10% style="float: left;" class="logo_acceuil"> </a>
			
			<a href="connexion.php"><img src="images/login.png" width= 4% height= 4% style="float: right;" class="logo_id"> </a>
			<div class="titre"> 
				<br>

				
				<span style="float: right;"><a href="connexion.php" class = "menu"><?php echo $pseudo; ?></a></span>
				<span class="menu"><a href="tournoi.php" class = "menu">     &nbsp &nbsp &nbsp  TOURNOIS       </a>       <a href="DUEL.php" class = "menu">   &nbsp &nbsp &nbsp    DUEL       </a>        <a href="magasin.php" class = "menu">   &nbsp &nbsp &nbsp    MAGASIN       </a>      <a href="PARTENAIRES.php"class = "menu">    &nbsp &nbsp &nbsp   PARTENAIRES       </a>      <a href="SUPPORT.php" class = "menu"> &nbsp &nbsp &nbspSUPPORT </a>    </span> 

			</div>
		</div>
	</header>

	<h2 class="winner_title"><br><br><br><br>recherche d'adversaire<br><br><br><br><br><br><br></h2>

</body>

<script src="script_matchmaking.js"></script> 
</html>