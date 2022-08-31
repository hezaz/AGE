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
$pseudo_adv = "Support";
$pseudo_me = $pseudo;

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
	$repsend = $bdd->prepare("INSERT INTO `support messages`(`dest`, `exp`, `mes`) VALUES (:dest, :exp, :mes)");
	$repsend->execute(array('dest' => $pseudo_adv, 'exp' => $pseudo_me, 'mes' => $message));
	$mail_support="support@africangamingempire.com";
	mail($mail_support, $pseudo_me, $message);
	header("Location: SUPPORT.php");
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


	<h2 class="winner_title"><br><br><br>SUPPORT</h2><br><br><br><br><br><br><br>


	<div class="cadre_chat">
		<br><br>


			<?php
			$pseudo_adv = "Support";
			$pseudo_me = $pseudo;
			$get_message=  $bdd->prepare('SELECT * FROM `support messages` WHERE dest = ? OR exp = ? ');
			$get_message->execute(array($pseudo_me, $pseudo_me));


			while ($mess = $get_message->fetch()) 
			{
				/*echo $mess[2];
				*/

				
				if ($mess[2] == $pseudo_me) 
				{
					?>
					
					<b class="mess_send">&nbsp &nbsp<?php echo $mess[2]; echo ":"; ?> <br> &nbsp &nbsp<?php echo $mess[3]; ?> </b><br><br>


				<?php 


				}

				elseif($mess[2] == $pseudo_adv)
				{
					?>
					<b class="mess_get">&nbsp &nbsp<?php echo $mess[2]; echo ":"; ?> <br>&nbsp &nbsp <?php echo $mess[3]; ?> </b><br><br>
	

				<?php

				}

			}			


			?>
			<br><br>


	</div>
	<div style="margin: auto;" >
		<form method="POST" action="SUPPORT.php" style="width:70%;margin: auto;">
			<table style="width:100%; margin: auto;">
				<tr style="width:100%;margin: auto;">
					<td style="width:100%;margin: auto;">
						<textarea style="width:99%; height: 50px; border: 5px solid rgb(244, 193, 29);border-radius: 30px; text-align: center;" placeholder="Votre message" name="message" class="textareaf"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						 <input type="submit" name="envoyer_message">
					</td>
				</tr>
			</table>
		</form>


	</div >

		


	<div >
		


</body>
</html>