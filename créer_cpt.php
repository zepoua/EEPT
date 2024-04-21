<?php

if(isset($_POST['btnregister'])){
    require_once("Php/connexionbd.php");

    $login = htmlspecialchars(trim($_POST['login']));
    $pass = sha1(htmlspecialchars(trim($_POST['password'])));
    $cpt = htmlspecialchars(trim($_POST['typecpt']));

    $reponse = $bdd->prepare('SELECT * FROM utilisateurs WHERE Login=?');
    $reponse->execute(array($login));
    $donnees = $reponse->rowCount();

    if($donnees==1){
    	$error = "Username déjà utilisé";
    }
    else{

		$req = $bdd->prepare('INSERT INTO utilisateurs(Login, Password,
		Typecpt) VALUES(:nom, :pass, :cpt)');
		$req->execute(array(
		'nom' => $login,
		'pass' => $pass,
		'cpt' => $cpt));
		header("Location:login.php");
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" a href="Css/style.css">
	<link rel="stylesheet" a href="Css/fontawesome.min.css">
	<link rel="stylesheet" a href="Css/vendors/all.min.css">
   <link rel="icon" type="image/x-icon" href="star/assets/favicon.ico"/>
	
	<title>Créer un Compte</title>
</head>
<body>
	<div class="container">
	<img src="Média/login.png"/>
		<form method='POST' action='#'>
			<div class="form-input">
				<input type="text" name="login" placeholder="Username" required="true" />	
			</div>
			<div class="error">
			<?php

				if(isset($_POST['btnregister']) AND !empty($error)){
					echo $error;
				}
			?>
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="Password" required="true" />
			</div>
			<div>
			<table>
				<tr>
					<th>
						<select required="true" name="typecpt">
						    <option value="">Please choose an option</option>
						    <option value="Assistant">Assistant</option>
						    <option value="Administrateur">Administrateur</option>
						</select>
					</th>
				</tr>
			</table>
		</div>
			<input type="submit" name="btnregister" value="REGISTER" class="btn-login"/>
		</form>
	</div>

</body>
</html>
