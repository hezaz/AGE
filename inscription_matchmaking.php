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
	header("Location: duel.php");
}


















if (isset($_GET['jeux']) AND isset($_GET['plateform'])) 
{
	if ((($_GET['jeux'] = "LOL" )  OR ($_GET['jeux'] = "FIFA2021") OR ($_GET['jeux'] = "FIFA2022") OR ($_GET['jeux'] = "COD") OR ($_GET['jeux'] = "R6") OR ($_GET['jeux'] = "VALORANT") ) AND (($_GET['plateform'] = "PC") OR ($_GET['plateform'] = "PS5") OR ($_GET['plateform'] = "PS4") OR ($_GET['plateform'] = "XBOX_ONE") OR ($_GET['plateform'] = "XBOX_SERIES") ) ) 
	{
		$plateform = htmlspecialchars($_GET['plateform']);
		$jeux = htmlspecialchars($_GET['jeux']);
	}

	else
	{
		header("Location: DUEL.php");
	}

}




$nbr_match = 0;

$check_match = $bdd->prepare('SELECT pseudo FROM matchmaking WHERE pseudo = ?');
$check_match->execute(array($pseudo));


$nbr_match = $check_match->rowCount();

$check_vs = $bdd->prepare('SELECT id FROM vs WHERE (pseudo1 = ? AND vote1="nul") OR (pseudo2 = ? AND vote2="nul")');
$check_vs->execute(array($pseudo, $pseudo));

$nbr_vs = $check_vs->rowCount();

$nbr_partie = $nbr_vs + $nbr_match;

if ($nbr_vs > 0) {
	header("Location: match_finded.php");
}

if ($nbr_match > 0) {
	header("Location: matchmaking.php");
	
}

elseif ($nbr_partie == 0) {

	$req=$bdd->prepare('INSERT INTO matchmaking(pseudo, cons, jeux) VALUES (:pseudo, :cons, :jeux)');
	$req->execute(array( 'pseudo' => $pseudo, 'cons' => $plateform, 'jeux' => $jeux  ));
	header("Location: matchmaking.php");
}

elseif (condition) {
	// code...
}
{
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

		<div>
			<div>
				
				<h2 class="winner_title"><br><br>Match deja en cours<br></h2>

			<br><br><br><br>
				
				<a href="match_finded.php">ALLEZ AU MATCH</a>
			</div>

		</div>

	</body>
	</html>






	<?php
}

?>






