<?php  

session_start();

$bdd = new PDO('mysql:host=africayhedi.mysql.db;dbname=africayhedi;charset=utf8', 'africayhedi', '2584296Aa');
$pseudo = $_SESSION['pseudo'];
$match_info = 0;
$checkmatch = $bdd->prepare('SELECT id FROM vs WHERE pseudo1=? OR pseudo2=?');
$checkmatch->execute(array($pseudo, $pseudo));
$match_info = $checkmatch->rowCount();


if ($match_info<1) 
{


	echo json_encode($match_info);
	

}

if ($match_info>0) {
	echo json_encode($match_info);

}

?>






