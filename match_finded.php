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
$nbr_usr3=$nbr_usr1 +$nbr_usr2;
if ($nbr_usr3 != 2) {
	echo $nbr_usr1;
}

if (isset($_POST['envoyer_message']) AND $nbr_usr3==2) 
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
        <META HTTP-EQUIV="Refresh" CONTENT="7; URL=http://www.africangamingempire.com/match_finded.php"> 

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

		<div class="cadre_chat">

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
					
					<br><b class="mess_send"><?php echo $mess[2]; echo ":"; ?> <br> <?php echo $mess[3]; ?> </b><br><br>


				<?php 



				}

				elseif($mess[2] == $pseudo_adv)
				{
					?>
					<br><b class="mess_get"><?php echo $mess[2]; echo ":"; ?> <br> <?php echo $mess[3]; ?> </b><br><br>
	

				<?php

				}

			}			


			?>




		</div>

		<br><br>


		<div style="margin: auto;" >


			

			
			<form method="POST" action="match_finded.php"  name="formu" style="width:70%;margin: auto;">
				<table style="width:100%; margin: auto;">
					<tr style="width:100%;margin: auto;">
						<td style="width:100%;margin: auto;">
							<textarea style="width:99%; height: 50px; border: 5px solid rgb(244, 193, 29);border-radius: 30px; text-align: center;" placeholder="Votre message" name="message" class="textareaf"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<button type="image" name="envoyer_message" src="images/CONFIRMER.png" formaction="match_finded.php"></button>
						</td>
					</tr>
				</table>
			</form>
			
			




		</div >

		<br><br><br><br><br>

		<div>


			<h3 class="winner_title">vote</h3><br><br><br><br>
			<a href="endgame.php?vote=win">J'ai Gagne!</a> &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp <a href="endgame.php?vote=loose">J'ai perdu!</a>

		</div>



	</div>



<script type="text/javascript">
	
	var p = document.getElementById("onclick");
	console.log(p);
	  // NOTE: showAlert(); ou showAlert(param); NE fonctionne PAS ici.
	  // Il faut fournir une valeur de type function (nom de fonction déclaré ailleurs ou declaration en ligne de fonction).
	p.onclick = showAlert;
	

	function showAlert()
	{
		console.log("0");
	  	//document.formu.submit();
	}
</script>

</body>
</html>




	