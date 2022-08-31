<!DOCTYPE html>
<?php    
session_start();

$bdd = new PDO('mysql:host=africayhedi.mysql.db;dbname=africayhedi;charset=utf8', 'africayhedi', '2584296Aa');

if (isset($_SESSION['id'])) {
	$pseudo = $_SESSION['pseudo'];
	$pts = $_SESSION['pts']; 

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


					<h2 class="winner_title"><br><br><br>CHOISISSEZ VOTRE JEU</h2><br><br><br><br><br>
				</div>



				<br><br><br><br><br>


				<div id="conteneur_logo_jeux">
					<h3 style="text-align: center; color: rgb(244, 193, 29); font-size: 2em;">PC</h3><br><br><br>
					<div><a href="inscription_matchmaking.php?jeux=LOL&plateform=PC"><img src="images/LOL.png" class="logo_jeux" ></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=COD&plateform=PC"><img src="images/COD.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=FIFA2021&plateform=PC"><img src="images/FIFA2021.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=FIFA2022&plateform=PC"><img src="images/FIFA2022.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=R6&plateform=PC"><img src="images/R6.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=VALORANT&plateform=PC"><img src="images/VALORANT.png"  class="logo_jeux"></a></div><br>


					<br><br><br><h3 style="text-align: center; color: rgb(244, 193, 29); font-size: 2em;">PS5</h3><br><br><br>
					<div><a href="inscription_matchmaking.php?jeux=LOL&plateform=PS5"><img src="images/LOL.png" class="logo_jeux" ></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=COD&plateform=PS5"><img src="images/COD.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=FIFA2021&plateform=PS5"><img src="images/FIFA2021.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=FIFA2022&plateform=PS5"><img src="images/FIFA2022.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=R6&plateform=PS5"><img src="images/R6.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=VALORANT&plateform=PS5"><img src="images/VALORANT.png"  class="logo_jeux"></a></div><br>

					<br><br><br><h3 style="text-align: center; color: rgb(244, 193, 29); font-size: 2em;">PS4</h3><br><br><br>
					<div><a href="inscription_matchmaking.php?jeux=LOL&plateform=PS4"><img src="images/LOL.png" class="logo_jeux" ></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=COD&plateform=PS4"><img src="images/COD.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=FIFA2021&plateform=PS4"><img src="images/FIFA2021.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=FIFA2022&plateform=PS4"><img src="images/FIFA2022.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=R6&plateform=PS4"><img src="images/R6.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=VALORANT&plateform=PS4"><img src="images/VALORANT.png"  class="logo_jeux"></a></div><br>

					<br><br><br><h3 style="text-align: center; color: rgb(244, 193, 29); font-size: 2em;">XBOX ONE</h3><br><br><br>
					<div><a href="inscription_matchmaking.php?jeux=LOL&plateform=XBOX_ONE"><img src="images/LOL.png" class="logo_jeux" ></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=COD&plateform=XBOX_ONE"><img src="images/COD.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=FIFA2021&plateform=XBOX_ONE"><img src="images/FIFA2021.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=FIFA2022&plateform=XBOX_ONE"><img src="images/FIFA2022.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=R6&plateform=XBOX_ONE"><img src="images/R6.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=VALORANT&plateform=XBOX_ONE"><img src="images/VALORANT.png"  class="logo_jeux"></a></div><br>

					<br><br><br><h3 style="text-align: center; color: rgb(244, 193, 29); font-size: 2em;">XBOX SERIES</h3><br><br><br>
					<div><a href="inscription_matchmaking.php?jeux=LOL&plateform=XBOX_SERIES"><img src="images/LOL.png" class="logo_jeux" ></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=COD&plateform=XBOX_SERIES"><img src="images/COD.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=FIFA2021&plateform=XBOX_SERIES"><img src="images/FIFA2021.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=FIFA2022&plateform=XBOX_SERIES"><img src="images/FIFA2022.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=R6&plateform=XBOX_SERIES"><img src="images/R6.png"  class="logo_jeux"></a></div><br>
					<div><a href="inscription_matchmaking.php?jeux=VALORANT&plateform=XBOX_SERIES"><img src="images/VALORANT.png"  class="logo_jeux"></a></div><br>


				</div>



				
				
			</div>
		</div>
	</section>





				
		

	</table>
</body>
</html>