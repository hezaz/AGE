<!DOCTYPE html>
<?php 

session_start();

$bdd = new PDO('mysql:host=africayhedi.mysql.db;dbname=africayhedi;charset=utf8', 'africayhedi', '2584296Aa');

if(isset($_SESSION['pseudo'] ))
{
	//header("Location: Acceuil.php");
	$pseudo = $_SESSION['pseudo'];
	header("Location: Acceuil.php");
	$pts= $_SESSION['pts'];
	
}

else
{
	$pseudo = "pseudo";
}


if (isset($_POST['connexion'])) {
	$pseudo_co = htmlspecialchars($_POST['pseudo_co']);
	$psw_co = sha1($_POST['psw_co']);
	if (!empty($pseudo_co) AND !empty($psw_co)) 
	{
		$valid_id = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND psw = ?");
		$valid_id->execute(array($pseudo_co, $psw_co));
		$user_info = $valid_id->rowCount();
		if ($user_info == 1 ) 
		{
			$user_info = $valid_id->fetch();
			$_SESSION['id'] = $user_info['id'];
			$_SESSION['pseudo'] = $user_info['pseudo'];
			$_SESSION['mail'] = $user_info['mail'];
			$_SESSION['pts'] = $user_info['pts'];

			header("Location: Acceuil.php");
		
		}
		else
		{
			$erreur = "pseudo ou mot de passe incorect";
		}
	}
	else
	{
		$erreur = "Tous les champs ne sont pas rempli!";
	}
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


	<div>
		<form method="POST" action="connexion.php">
			<img src="images/fond_signup.png" class="fond_co">
			<div style="position: absolute; left: 50%; top: 150px;">
				<h1 class="JOUER">connexion</h1>
			</div>

			<div style="position: absolute; left: 20%; top: 350px;"> 
				
				
				<table>
					<tr>
						<td>
							<label class="mot_form">Pseudo</label> : <input type="text" name="pseudo_co" placeholder="Votre Pseudo" value="<?php if(isset($pseudo_co )) {echo $pseudo_co;}  ?>" /><br><br>
						</td>
					</tr>

					<tr>
						<td>
							<label class="mot_form">MOt de passe</label> : <input type="password" name="psw_co" placeholder="Votre Mot de Passe" class="input_form" width=100% /><br><br>
						</td>
					</tr>
					
					<tr>
						<td>
							<label class="mot_form">En continuant vous affirmer avoir lu et approuver les termes et conditions<br><br><br></label><input type="submit" src="images/connexion.png" name="connexion" alt="Submit" class="bouton" class="input_form"><br><br>
						</td>
					</tr>
					<tr>
						<td>
							<label class="mot_form"><a href="inscription.php" class="mot_form">inscription</a><br><br><br></label>
						</td>
					</tr>

					<tr>
						<td>
							<?php
							if (isset($erreur))
							{
								echo '<font color="red">'.$erreur.'</font>';
							}  
							?>
						</td>
					</tr>
				</table>
			</div>

			
			
		</form>

	</div>





</body>
</html> 