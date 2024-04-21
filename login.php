<?php 

if(isset($_POST['btnlogin'])){
    require_once("ConnectDB.php");


    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['password']));
 
    $reponse = $bdd->query('SELECT * FROM Admin'); 
		while ($donnees = $reponse->fetch()){
			
			if($login == $donnees['Login'] AND $pass == $donnees['Password']){
				
					header("Location:admin.php");				

			}
			else{
				$error = "Informations incorrectes";
			}
		
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
   <link rel="icon" type="image/x-icon" href="star/assets/favicon.ico" />
	
	<title>Login page</title>
</head>
<body>
	<div class="container">
	<img src="Média/login.png"/>
		<form method='POST' action="login.php">
			<div class="form-input">
				<input type="text" name="login" placeholder="Username"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="Password"/>
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
		<div class="error">
			<?php

				if(isset($_POST['btnlogin']) AND !empty($error)){
					echo $error;
				}
			?>
		</div>
			<input type="submit" name="btnlogin" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>

