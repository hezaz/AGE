<!DOCTYPE html>
<?php    
session_start();


$bdd = new PDO('mysql:host=africayhedi.mysql.db;dbname=africayhedi;charset=utf8', 'africayhedi', '2584296Aa');



if (isset($_SESSION['id'])) {
	$pseudo = $_SESSION['pseudo'];
	header("Location: tournoi_ouvertur.php");

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

				
				<span style="float: right;"><a href="connexion.php" class = "menu"><?php echo $pts; ?></a></span>
				<span class="menu"><a href="tournoi.php" class = "menu">     &nbsp &nbsp &nbsp  TOURNOIS       </a>       <a href="DUEL.php" class = "menu">   &nbsp &nbsp &nbsp    DUEL       </a>        <a href="magasin.php" class = "menu">   &nbsp &nbsp &nbsp    MAGASIN       </a>      <a href="PARTENAIRES.php"class = "menu">    &nbsp &nbsp &nbsp   PARTENAIRES       </a>      <a href="SUPPORT.php" class = "menu"> &nbsp &nbsp &nbspSUPPORT </a>    </span> 

			</div>
		</div>
	</header>

	<section>
			<div class="sous-page-2">
			
				<div class="winner_title">


					<h2 class="winner_title"><br><br><br>TOURNOIS ACTUELS</h2><br><br><br><br><br>
				</div>



				<br><br><br><br><br><br><br>

				<div classe="classement">
	

	
				<div class="coupe_tournoi">
					<br><br><br><br><img src="images/coupe.png" class="coupe_tournoi">
				</div>
				<br><br><br><br>
				<div classe="classement">
					<table class="tab_tournoi">
						<tr>
							<td class="bord_tournoi"><img src="/images/LOL.png" class="image_tournoi" ></td>
							<td><div class="div_image_tournoi"><img src="/images/VALORANT_TOURNOI.png" class="image_tournoi" ></div></td>
							<td><div class="div_image_tournoi"><img src="/images/FIFA_TOURNOI.png" class="image_tournoi" ></div></td>

						</tr>
						<tr>
							<td><div class="div_image_tournoi"><img src="/images/PUBG_TOURNOI.png" class="image_tournoi" ></div></td>
							<td><div class="div_image_tournoi"><img src="/images/CODMOBILE_TOURNOI.png" class="image_tournoi" ></div></td>
							<td><div class="div_image_tournoi"><img src="/images/FREEFIRE_TOURNOI.png" class="image_tournoi" ></div></td>
						</tr>
						<tr>
							<td><div class="div_image_tournoi"><img src="/images/FORTNITE_TOURNOI.png" class="image_tournoi" ></div></td>
							<td><div class="div_image_tournoi"><img src="/images/WARZONE_TOURNOI.png" class="image_tournoi" ></div></td>
							<td><div class="div_image_tournoi"><img src="/images/R6_TOURNOI.png" class="image_tournoi" ></div></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</section>
</body>
</html>


	