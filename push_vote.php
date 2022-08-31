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
echo ok;
if (isset($_GET['vote'])) {
	
	$vote =htmlspecialchars($_GET['vote']);
	if ($vote == "win") {
		$vote_user = $bdd->prepare("INSERT INTO `vs`(`vote1`) VALUES (:vote)");
		$vote_user->execute(array('vote' => $vote);
			header("Location: Acceuil.php");
	}
	elseif ($vote == "loose") {
		$vote_user = $bdd->prepare("INSERT INTO `vs`(`vote1`) VALUES (:vote)");
		$vote_user->execute(array('vote' => $vote);
			header("Location: Acceuil.php");
	}
	elseif ($vote == "same") 
	{
		$vote_user = $bdd->prepare("INSERT INTO `vs`(`vote1`) VALUES (:vote)");
		$vote_user->execute(array('vote' => $vote);
		header("Location: Acceuil.php");
	}
	else
	{
		header("Location: match_finded.php");
	}



}