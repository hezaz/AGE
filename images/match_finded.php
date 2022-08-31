<?php  



session_start();

$bdd = new PDO('mysql:host=africayhedi.mysql.db;dbname=africayhedi;charset=utf8', 'africayhedi', '2584296Aa');

if (isset($_SESSION['id'])) {
	$pseudo = $_SESSION['pseudo'];

}
else
{
	header("Location: connexion.php");
	
}



$i =0;
$j =0;
$k =0;
$m =0;
$l =0;
$test_1 =0;



$test_pseudo1 = $bdd->prepare('SELECT pseudo1 FROM vs WHERE pseudo1 = ? ');
$test_pseudo1->execute(array($pseudo));

$test_1 = $test_pseudo1->rowCount();
if ($test_1==1) 
{
	

	$is_1= $test_pseudo1->fetch();
	
	if ($is_1[0]==$pseudo) 
	{
		$test_pseudo2= $bdd->prepare('SELECT pseudo2 FROM vs WHERE pseudo1 = ? ');
		$test_pseudo2->execute(array($pseudo));
		$is_2= $test_pseudo2->fetch();	
		$pseudo_adv= $is_2[0];
		$pseudo_me = $is_1[0];
	}

	else
	{
		$test_pseudo2= $bdd->prepare('SELECT pseudo2 FROM vs WHERE pseudo1 = ? ');
		$test_pseudo2->execute(array($pseudo));
		$is_2= $test_pseudo2->fetch();
		$pseudo_me = $is_2[0];
		$pseudo_adv= $is_1[0];
	}
}

elseif ($test_1>1) 
{
	$delete1=$bdd->prepare('DELETE FROM vs WHERE pseudo1= ?');
	$delete1->execute(array($pseudo));
	header("Location: Acceuil.php");
}









$versus = $bdd->prepare('SELECT pseudo2 FROM vs WHERE pseudo2 = ?');
$versus->execute(array($pseudo));
$test_2 = $versus->rowCount();
if ($test_2==1 AND $test_1==0) 
{
	$is_3 = $versus->fetch();
	if ($is_3[0]==$pseudo) 
	{
		$versus2= $bdd->prepare('SELECT pseudo1 FROM vs WHERE pseudo2 = ? ');
		$versus2->execute(array($pseudo));
		$is_4= $versus2->fetch();

	
		$pseudo_me = $is_3[0];
		$pseudo_adv= $is_4[0];
	}

	else
	{
		$versus2= $bdd->prepare('SELECT pseudo1 FROM vs WHERE pseudo2 = ? ');
		$versus2->execute(array($pseudo));
		$is_4= $versus2->fetch();
		echo $pseudo;
		echo $is_3[0];
		echo $is_4[0];
		$pseudo_adv= $is_3[0];
		$pseudo_me = $is_4[0];	
		
	}	
}

elseif($test_2>1)
{
	$delete2=$bdd->prepare('DELETE FROM vs WHERE pseudo2= ?');
	$delete1->execute(array($pseudo));
	header("Location: Acceuil.php");
}

$test2_usr = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ? ');
$test2_usr->execute(array($pseudo_adv));
$nbr_usr2= $test2_usr->rowCount();

$test1_usr = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ? ');
$test1_usr->execute(array($pseudo_me));
$nbr_usr1= $test1_usr->rowCount();

if ($nbr_usr1 +$nbr_usr2 != 2) {
	echo $nbr_usr1;
}

if (isset($_POST['envoyer_message']) AND $nbr_usr==1) 
{
	$message = htmlspecialchars($_POST['message']);
	$repsend = $bdd->prepare("INSERT INTO `messagesjoueur`(`dest`, `exp`, `mes`) VALUES (:dest, :exp, :mes)");
	$repsend->execute(array('dest' => $pseudo_adv, 'exp' => $pseudo_me, 'mes' => $message));
	header("Location: match_finded.php");
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
		<div class="entete">
			<div class="titre"> 
				<a href="Acceuil.php"><img src="images/LOGO.png" width= 130px height= 90px style="float: left;" class="logo_acceuil"> </a>
			
				<a href="connexion.php"><img src="images/login.png" width= 90px height= 90px style="float: right;" class="logo_id"> </a>
				<span></span>
				<span style="float: right;"><a href="connexion.php" class = "menu"><?php echo $pseudo; ?></a></span>
				<span class="menu"><a href="tournoi.php" class = "menu">     &nbsp &nbsp &nbsp  TOURNOIS       </a>       <a href="DUEL.php" class = "menu">   &nbsp &nbsp &nbsp    DUEL       </a>        <a href="magasin.php" class = "menu">   &nbsp &nbsp &nbsp    MAGASIN       </a>      <a href="PARTENAIRES.php"class = "menu">    &nbsp &nbsp &nbsp   PARTENAIRES       </a>      <a href="SUPPORT.php" class = "menu"> &nbsp &nbsp &nbspSUPPORT </a>    </span> 

			</div>
		</div>
	</header>


	<div>
		<div>
			
			<h2 class="winner_title"><br><br>MATCH TROUVE<br><br><br></h2>
			
		</div>



		<div>
			
			<h2 class="winner_title"><br><br><?php echo $pseudo_me; echo "&nbsp &nbsp &nbspvs&nbsp &nbsp &nbsp"; echo $pseudo_adv; ?> <br><br><br></h2>

		</div>


		<div class="center1">
			
			<h3 class="winner_title">chat</h3>
			<h8 class="petit_msg">  Actualser pour rafraichir le chat </h8><br><br><br><br>


		</div>

		<div>

			<?php
			$get_message=  $bdd->prepare('SELECT * FROM messagesjoueur WHERE dest = ? OR exp = ? ');
			$get_message->execute(array($pseudo_me, $pseudo_me));

			while ($mess = $get_message->fetch()) 
			{
				/*echo $mess[2];
				*/

				
				if ($mess[2] == $pseudo_me) 
				{
					?>
					
					<b class="mess_send"><?php echo $mess[2]; echo ":"; ?> <br> <?php echo $mess[3]; ?> </b><br><br>


				<?php 



				}

				elseif($mess[2] == $pseudo_adv)
				{
					?>
					<b class="mess_get"><?php echo $mess[2]; echo ":"; ?> <br> <?php echo $mess[3]; ?> </b><br><br>
	

				<?php

				}

			}			


			?>




		</div>

		<br><br><br><br><br><br>


		<div>
			
			<form method="POST" action="match_finded.php">
				<table>
					<tr>
						<td>
							<textarea placeholder="Votre message" name="message"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<label class="mot_form">envoyer</label> <input type="submit" name="envoyer_message">
						</td>
					</tr>
				</table>

			</form>

			

		</div>

		<br><br><br><br><br>

		<div>


			<h3 class="winner_title">vote</h3><br><br><br><br>
			<a href="endgame.php?vote=win">J'ai Gagne!</a> &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp <a href="endgame.php?vote=loose">J'ai perdu!</a>

		</div>



	</div>





</body>
</html>




