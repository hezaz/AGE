<!DOCTYPE html>
<?php    
session_start();

$bdd = new PDO('mysql:host=africayhedi.mysql.db;dbname=africayhedi;charset=utf8', 'africayhedi', '2584296Aa');

if(isset($_SESSION['pseudo'] ))
{
	$pseudo = $_SESSION['pseudo'];
	$pts= $_SESSION['pts'];

        
}
else
{
	$pseudo = "connexion";
	
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

	<div class="sous-page-1">

		<div classe="fond1"> 
			<img src="images/image1.png" width=100%>

		</div>
		<span class="JOUER"><a href="tournoi.php" class="JOUER">JOUER</a></span> 

	</div>
	<section>
		<div class="sous-page-2">
		
			<div class="winner_title">


				<h2 class="winner_title"><br><br><br>NOS GAGNANTS HEBDOMADAIRES</h2><br><br><br><br><br>
			</div>

			<div id="conteneur_logo_gagnant">

				<div class="GAGNANT1"><img src="images/BANIERE_GAGNANTS_AGE.png"><br><br> <span class="pseudo_winner">&nbsp &nbsp &nbspPseudo</span></div>
				<div class="GAGNANT2"><img src="images/BANIERE_GAGNANTS_AGE.png"><br><br> <span class="pseudo_winner">&nbsp &nbsp &nbspPseudo</span></div>
				<div class="GAGNANT3"><img src="images/BANIERE_GAGNANTS_AGE.png"><br><br> <span class="pseudo_winner">&nbsp &nbsp &nbspPseudo</span></div>
			

			</div>
			


			<br><br><br><br><br><br><br>

			<div classe="classement">



				<h2 class="winner_title"><br><br><br>CLASSEMENT DES CHAMPIONS</h2><br><br><br><br><br>


				
				<table classe="tab_classement">
					<tr>


						<td><div><img src="images/1ERE_PLACE.png" style="float: right;"></div></td>

						<td class="border_td"><h1>&nbsp &nbsp &nbsp pseudo &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp jeux &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1> &nbsp &nbsp &nbsp pts &nbsp &nbsp &nbsp </h1>  </td>
					</tr>
					<tr>
						
						
						
						<td><div><img src="images/2EME_PLACE.png" style="float: right;"></div></td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp pseudo &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp jeux &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1> &nbsp &nbsp &nbsp pts &nbsp &nbsp &nbsp </h1>  </td>

					</tr>
					<tr>
						
						
						
						<td><div><img src="images/3EME_PLACE.png" style="float: right;"></div></td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp pseudo &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp jeux &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1> &nbsp &nbsp &nbsp pts &nbsp &nbsp &nbsp </h1>  </td>

					</tr>
					<tr>
						
						
						
						<td><div><img src="images/4EME_PLACE.png" style="float: right;"></div></td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp pseudo &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp jeux &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1> &nbsp &nbsp &nbsp pts &nbsp &nbsp &nbsp </h1>  </td>

					</tr>
					<tr>
						
						
						
						<td><div><img src="images/5EME_PLACE.png" style="float: right;"></div></td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp pseudo &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp jeux &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1> &nbsp &nbsp &nbsp pts &nbsp &nbsp &nbsp </h1>  </td>

					</tr>
					<tr>
						
						
						
						<td><div><img src="images/6EME_PLACE.png" style="float: right;"></div></td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp pseudo &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp jeux &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1> &nbsp &nbsp &nbsp pts &nbsp &nbsp &nbsp </h1>  </td>

					</tr>
					<tr>
						
						
						
						<td><div><img src="images/7EME_PLACE.png" style="float: right;"></div></td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp pseudo &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp jeux &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1> &nbsp &nbsp &nbsp pts &nbsp &nbsp &nbsp </h1>  </td>

					</tr>
					<tr>
						
						
						
						<td><div><img src="images/8EME_PLACE.png" style="float: right;"></div></td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp pseudo &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp jeux &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1> &nbsp &nbsp &nbsp pts &nbsp &nbsp &nbsp </h1>  </td>

					</tr>
					<tr>
						
						
						
						<td><div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="images/9EME_PLACE.png" style="float: right;"></div></td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp pseudo &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp jeux &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1> &nbsp &nbsp &nbsp pts &nbsp &nbsp &nbsp </h1>  </td>

					</tr>
					<tr>
						
						
						
						<td><div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="images/10EME_PLACE.png" style="float: right;"></div></td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp pseudo &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1>&nbsp &nbsp &nbsp jeux &nbsp &nbsp &nbsp</h1>  </td>
						<td class="border_td"><h1> &nbsp &nbsp &nbsp pts &nbsp &nbsp &nbsp </h1>  </td>

					</tr>
				</table>
				

			</div>

		</div>
		

	</section>





	




	
</body>
</html>