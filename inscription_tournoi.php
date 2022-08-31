<?php
$plateform = "PS";
$jeux = "FIFA2022";

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




$nbr_match = 0;

$check_match = $bdd->prepare('SELECT pseudo FROM matchmaking_tournoi WHERE pseudo = ?');
$check_match->execute(array($pseudo));


$nbr_match = $check_match->rowCount();

$check_vs = $bdd->prepare('SELECT pseudo1 FROM vs_tournoi WHERE (pseudo1 = ?  OR pseudo2 = ? )');
$check_vs->execute(array($pseudo, $pseudo));

$nbr_vs = $check_vs->rowCount();

$nbr_partie = $nbr_vs + $nbr_match;

$check_max = $bdd->query('SELECT * FROM vs_tournoi');


$nbr_match = $check_match->rowCount();

if ($nbr_match > 16) {
	header("Location: inscrit_max.php");
}

if ($nbr_vs > 0) {
	header("Location: match_finded_tournoi.php");
}

if ($nbr_match > 0) {
	header("Location: inscrit.php.php");
	
}

elseif ($nbr_partie == 0) {

	$req= $bdd->prepare('INSERT INTO matchmaking_tournoi(pseudo, cons, jeux) VALUES (:pseudo, :cons, :jeux)');
	$req->execute(array( 'pseudo' => $pseudo, 'cons' => $plateform, 'jeux' => $jeux  ));
	header("Location: inscrit.php");
}

?>