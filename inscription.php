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
	$pseudo_h = "connexion";
	//header("Location: Acceuil.php");
	
}

if (isset($_POST['valider'])) 
{
	
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$mail = htmlspecialchars($_POST['mail']);
	$mail2 = htmlspecialchars($_POST['conf_mail']);
	$psw = sha1($_POST['psw']);
	$psw2 = sha1($_POST['conf_psw']);
	$age = htmlspecialchars($_POST['age']);
	$tel = htmlspecialchars($_POST['tel']);


	if (!empty($_POST['pseudo']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['psw']) AND !empty($_POST['age']) AND !empty($_POST['tel']) ) {

		
		if (strlen($nom) > 254) 
		{
			$erreur = "Votre nom est trop long";
		}


		if (strlen($prenom) > 254) 
		{
			$erreur = "Votre prenom est trop long";
		}

		$date_du_jour = date('m/d/Y');
		$t_date1 = strtotime($date_du_jour);
		$t_date2 = strtotime($age);

		if ($t_date2> $t_date1) {
			$erreur = "date de naissances incorrect";
		}

		if (strlen($pseudo) > 254) 
		{
			$erreur = "Votre Pseudo est trop long";
		}

		if ($mail == $mail2) {
				if(filter_var($mail, FILTER_VALIDATE_EMAIL))
				{
				}
				else
				{
					$erreur = "Votre mail n'est pas valide";
				}
		}
		else
		{
			$erreur = "Les deux adresses mails sont differentes";
		}	

		$exist_mail = $bdd->prepare('SELECT * FROM membres WHERE mail = ?');
		$exist_mail->execute(array($mail));
		$mail_conter = $exist_mail->rowCount();
		if ($mail_conter > 0) {
			$erreur = "Adresse mail utilisée!";
		}
		$exist_tel = $bdd->prepare('SELECT * FROM membres WHERE tel = ?');
		$exist_tel->execute(array($tel));
		$tel_conter = $exist_tel->rowCount();
		if ($tel_conter > 0) {
			$erreur = "Numero de telephone utilisée!";
		}

		$exist_pseudo = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
		$exist_pseudo->execute(array($pseudo));
		$pseudo_conter = $exist_pseudo->rowCount();
		if ($pseudo_conter > 0) {
			$erreur = "Pseudo Existant!";
		}


		if ($psw != $psw2) 
		{

			$erreur = "Les deux mots de passes sont differentes";
		}	
		if (!isset($erreur)) 
		{
			$requete = $bdd->prepare('INSERT INTO membres(pseudo, `nom`, `prénom`, `mail`, `psw`, `age`, `tel`) VALUES (:pseudo,:nom,:prenom,:mail,:psw,:age,:tel)');
			$requete->execute(array( 
				'pseudo' => $pseudo, 
				'nom' => $nom, 
				'prenom' => $prenom, 
				'mail' => $mail, 
				'psw' => $psw, 
				'age' => $age, 
				'tel' => $tel));
			header("Location: connexion.php");


		}
		


		


		

	}
		
		




	else
	{
		$erreur = "Veuillex remplire tous les champs";
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

				
				<span style="float: right;"><a href="connexion.php" class = "menu"></a></span>
				<span class="menu"><a href="tournoi.php" class = "menu">     &nbsp &nbsp &nbsp  TOURNOIS       </a>       <a href="DUEL.php" class = "menu">   &nbsp &nbsp &nbsp    DUEL       </a>        <a href="magasin.php" class = "menu">   &nbsp &nbsp &nbsp    MAGASIN       </a>      <a href="PARTENAIRES.php"class = "menu">    &nbsp &nbsp &nbsp   PARTENAIRES       </a>      <a href="SUPPORT.php" class = "menu"> &nbsp &nbsp &nbspSUPPORT </a>    </span> 

			</div>
		</div>
	</header>

	<div>
		<form method="POST" action="inscription.php">
			<img src="images/fond_signup.png" class="fond_co">
			<div style="position: absolute; left: 50%; top: 150px;">
				<h1 class="JOUER">INSCRiption</h1>
			</div>

			<div style="position: absolute; left: 20%; top: 350px;"> 
				
				
				<table>
					<tr>
						<td>
							<label class="mot_form">Pseudo</label> : <input type="text" name="pseudo" placeholder="Votre Pseudo" value="<?php if(isset($pseudo )) {echo $pseudo;}  ?>" /><br><br>
						</td>
				
					</tr>

					<tr>
						<td>
							<label class="mot_form">Nom</label> : <input type="text" name="nom" placeholder="Votre Nom" value="<?php if(isset($nom)) {echo $nom;}  ?>" /><br><br>
						</td>
					</tr>

					<tr>
						<td>
							<label class="mot_form">Prenom</label> : <input type="text" name="prenom" placeholder="Votre Prenom" value="<?php if(isset($prenom)) {echo $prenom;}  ?>" /><br><br>
						</td>
					</tr>

					<tr>
						<td>
							<label class="mot_form">Adresse Mail</label> : <input type="email" name="mail" placeholder="Votre Mail" value="<?php if(isset($mai)) {echo $mail;}  ?>" /><br><br>
						</td>
					</tr>

					<tr>
						<td>
							<label class="mot_form">Confirmer votre adresse mail</label> : <input type="email" name="conf_mail" placeholder="Confirmez votre adresse Mail" /><br><br>
						</td>
					</tr>

					<tr>
						<td>
							<label class="mot_form">MOt de passe</label> : <input type="password" name="psw" placeholder="Votre Mot de Passe" /><br><br>
						</td>
					</tr>

					<tr>
						<td>
							<label class="mot_form">Confirmer MOt de passe</label> : <input type="password" name="conf_psw" placeholder="Confirmez votre Mot de passe" /><br><br>
						</td>
					</tr>

					<tr>
						<td>
							<label class="mot_form">Date de naissance</label> : <input type="date" name="age" /><br><br>
						</td>
					</tr>

					<tr>
						<td>
							<label class="mot_form">Numero de telephone</label> : <input type="tel" name="tel" placeholder="Votre telephone" value="<?php if(isset($tel)) {echo $tel;}  ?>" /><br><br>
						</td>
					</tr>



					<tr>
						<td>
							<label class="mot_form">Je voudrais faire partie de la newsletter pour etre informer des offres et promotions</label> : <input type="checkbox" name="news" checked /><br><br>
						</td>
					</tr>

					<tr>
						<td>
							<label class="mot_form">En continuant vous affirmer avoir lu et approuver les termes et conditions</label><input type="submit" name="valider">
						</td>
					</tr>

					<tr>
						<td>
							<<?php
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



