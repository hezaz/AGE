<?php  
session_start();

if (isset($_SESSION['pseudo'])) {
	

}

else
{
	header("Location: connexion.php");
}

$bdd = new PDO('mysql:host=africayhedi.mysql.db;dbname=africayhedi;charset=utf8', 'africayhedi', '2584296Aa');

$i = 0;
$j = 0;
$k = 0;
$l = 0;


$check_pseudo = $bdd->query('SELECT * FROM matchmaking');
while ($tab_check[$i] = $check_pseudo->fetch()) {
	
	//echo $tab_check[$i]['pseudo'];

	$i++;
	
}




$i = 0;
$j = 0;
$k = 0;
$l = 0;



$versus1 = $bdd->query('SELECT * FROM vs');

while ($tab1_versus[$j] = $versus1->fetch()) {

	
	$j++;
	
}




$i = 0;
$j = 0;
$k = 0;
$l = 0;

$versus2 = $bdd->query('SELECT * FROM vs');
while ($tab2_versus[$l] = $versus2->fetch()) {
	
	$l++;
}




$i =0;
$j =0;
$l =0;
$k =0;



while(!empty($tab1_versus[$i]['pseudo2']))

{
	echo $tab1_versus[$i]['pseudo2'];

	while( !empty($tab_check[$k]['pseudo']))
	{

		

		if (($tab1_versus[$i]['pseudo2'] == $tab_check[$k]['pseudo']) OR ($tab1_versus[$i]['pseudo1'] == $tab_check[$k]['pseudo']) ) 
		{
			$delete2=$bdd->prepare('DELETE FROM matchmaking WHERE pseudo= ?');
			$delete2->execute(array($tab_check[$i]['pseudo']));
		}
	
		$k++;
		
	}
	$k =0;
	$i++;


}

$i =0;
$j =0;
$l =0;
$k =0;





$i =0;
$j =0;
$l =0;
$k =0;



while(!empty($tab1_versus[$i]['pseudo1']) )
{
	
	while(!empty($tab1_versus[$k]['pseudo1']))
	{	
		if ($k == $i) 
		{
			$k++;

			
		}
		elseif(($tab1_versus[$i]['pseudo1'] == $tab1_versus[$k]['pseudo1']) AND ($tab1_versus[$i]['vote1'] =="nul") AND ($tab1_versus[$k]['vote1'] =="nul") ) 
		{			

			$delete3=$bdd->prepare('DELETE FROM vs WHERE pseudo1= ?');
			$delete3->execute(array($tab1_versus[$i]['pseudo1']));	
			$k++;	
				
		}

		elseif(($tab1_versus[$i]['pseudo2'] == $tab1_versus[$k]['pseudo1']) AND ($tab1_versus[$i]['vote2'] =="nul") AND ($tab1_versus[$k]['vote1'] =="nul") )
		{
			$delete3=$bdd->prepare('DELETE FROM vs WHERE pseudo1= ?');
			$delete3->execute(array($tab1_versus[$i]['pseudo2']));	
			$k++;
		}

		elseif(($tab1_versus[$i]['pseudo1'] == $tab1_versus[$k]['pseudo2']) AND ($tab1_versus[$i]['vote1'] =="nul") AND ($tab1_versus[$k]['vote2'] =="nul") )
		{
			echo "ok";
			$delete3=$bdd->prepare('DELETE FROM vs WHERE pseudo2= ?');
			$delete3->execute(array($tab1_versus[$i]['pseudo1']));	
			$k++;
		}

		elseif(($tab1_versus[$i]['pseudo2'] == $tab1_versus[$k]['pseudo2'])AND ($tab1_versus[$i]['vote2'] =="nul") AND ($tab1_versus[$k]['vote2'] =="nul") )
		{
			$delete3=$bdd->prepare('DELETE FROM vs WHERE pseudo2= ?');
			$delete3->execute(array($tab1_versus[$i]['pseudo2']));	
			$k++;
		}

		else
		{
			$k++;
			
		}
		
	}
	$k =0;
	
	$i++;
}

$i =0;
$j =0;
$l =0;
$k =0;

while(!empty($tab_check[$i]['pseudo']) )
{
	
	while(!empty($tab_check[$k]['pseudo']))
	{	if ($k == $i) {
			$k++;
			
		}
		elseif(($tab_check[$k]['pseudo'] == $tab_check[$i]['pseudo']) ) 
		{
			
				
			
			$delete3=$bdd->prepare('DELETE FROM matchmaking WHERE pseudo= ?');
			$delete3->execute(array($tab_check[$k]['pseudo']));	
			$k++;	
				
		}
		else
		{
			$k++;
			
		}
		
	}
	$k =0;
	
	$i++;
}


$i =0;
$j =0;
$l =0;
$k =0;

$find = $bdd->query('SELECT * FROM matchmaking');
while ($tab_find[$l] = $find->fetch()) {
	
	//echo $tab_check[$i]['pseudo'];
	$l++;
}


$i =0;
$j =0;
$l =0;
$k =0;

/*

	while(!empty($tab_find[$i]['pseudo']))
	{


			$k = $i+1;
			if (!empty($tab_find[$k]['pseudo'])) {


				
			
				$temp_pseudo1 = $tab_find[$i]['pseudo'];
				$temp_pseudo2 = $tab_find[$k]['pseudo'];
				$insert1 = $bdd->prepare('INSERT INTO `vs`(`pseudo1`, `pseudo2`) VALUES (:pseudo1, :pseudo2)');
				$insert1->execute(array('pseudo1' => $temp_pseudo1, 'pseudo2' => $temp_pseudo2));
			}
			$i= $i+2;
	}



*/


while(!empty($tab_find[$i]['pseudo']))
{
	

	$k = 0;
	while (!empty($tab_find[$k]['pseudo']))
	{

		
		if ($k == $i) 
		{
			$k++;
		}
		

		if (($tab_find[$i]['cons']==$tab_find[$k]['cons']) AND ($tab_find[$i]['jeux']==$tab_find[$k]['jeux']) AND ($tab_find[$i]['pseudo']!=$tab_find[$k]['pseudo'])  ) 
		{
			$temp_pseudo1 = $tab_find[$i]['pseudo'];
			$temp_pseudo2 = $tab_find[$k]['pseudo'];
			$insert1 = $bdd->prepare('INSERT INTO `vs`(`pseudo1`, `pseudo2`) VALUES (:pseudo1, :pseudo2)');
			$insert1->execute(array('pseudo1' => $temp_pseudo1, 'pseudo2' => $temp_pseudo2));
			$delete4= $bdd->prepare('DELETE FROM matchmaking WHERE pseudo= ?');
			$delete4->execute(array($temp_pseudo1));
			$delete5=$bdd->prepare('DELETE FROM matchmaking WHERE pseudo= ?');
			$delete4->execute(array($temp_pseudo2));

			header("Location: attente.php");

			$k++;
			$i++;

		}
		$k++;
	}
	
	
	$i++;

}

header("Location: attente.php");


/*header("Location: match_finded.php");  
*/


$i =0;
$j =0;
$l =0;
$k =0;






/*while(!empty($tab2_versus[$i]['pseudo2']))
{
	while( !empty($tab_check[$k]['pseudo']))
	{

		

		if (($tab2_versus[$i]['pseudo2'] == $tab_check[$k]['pseudo'])) 
		{
			$delete2=$bdd->prepare('DELETE FROM matchmaking WHERE pseudo= ?');
			$delete2->execute(array($tab_check[$i]['pseudo']));
		}
	
		$k++;
		
	}
	$k =0;
	$i++;


}
*/

?>