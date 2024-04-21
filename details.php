<?php
include('Php/phpagent1.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="Css/vendors/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="Css/vendors/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="Css/vendors/fontawesome.css">
   <link rel="stylesheet" a href="Css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="Css/agents.css">
    <link rel="icon" type="image/x-icon" href="star/assets/favicon.ico" />

    <title>LES ETATS</title>
</head>
<body>

<style type="text/css">
	h2{
		text-shadow: none;
	}

	.libelle{
		font-weight: bolder;
	}

	.donnees{
		color: darkblue;
		font-style: italic;
	}

	h5{
		font-family: cursive;
		font-weight: bold;
	}
</style>



	<div>

		<div class="row justify-content-center" >
			<div class="col-md-9 mt-5 bg-info p-2 rounded">
				<h2 class="bg-light p-2 rounded text-center text-dark">Matricule : <?= $donnees['Matricule']; ?></h2>
				<div class="text-center">
					<img src="<?= "Média/pictures".$donnees['Photoagent']; ?>" width="150" class="img-thumbnail rounded">
				</div>
				<div class="row p-3 bg-light m-3 rounded">
					<div class="col-6">
						<div class="row">
							<div class="col-6 libelle">
								<h5>Nom de l'agent :</h5>
								<h5>Prénom de l'agent : </h5>
								<h5>Sexe de l'agent : </h5>
								<h5>Date de Naissance : </h5>
								<h5>Lieu de Naissance: </h5>
								<h5>Matrimoine : </h5>
								<h5>Adresse Mail : </h5>
								<h5>N° Téléphone : </h5>
								<h5>Grpe Sanguin : </h5>
								<h5>Loisirs : </h5>
								<h5>Langue(s) Parlée(s) : </h5>
								<h5>Réligion :</h5>
								<h5>Date de Baptême : </h5>
								<h5>Lieu de Baptême : </h5>
								<h5>Pasteur de Baptême : </h5>
								
							</div>
							<div class="col-6 donnees">
								<h5><?= $donnees['Nomagent']; ?></h5>
								<h5><?= $donnees['Prenomagent']; ?></h5>
								<h5><?= $donnees['Sexeagent']; ?></h5>
								<h5><?= $donnees['Datenaissagent']; ?></h5>
								<h5><?= $donnees['Lieunaissagent']; ?></h5>
								<h5><?= $donnees['Sitmatagent']; ?></h5>
								<h5><?= $donnees['Email']; ?></h5>
								<h5><?= $donnees['Telephone']; ?></h5>
								<h5><?= $donnees['Grpesanagent']; ?></h5>
								<h5><?= $donnees['Loisirs']; ?></h5>
								<h5><?= $donnees['Langues']; ?></h5>
								<h5><?= $donnees['Religionagent']; ?></h5>
								<h5><?= $donnees['Datebapteme']; ?></h5>
								<h5><?= $donnees['Lieubapteme']; ?></h5>
								<h5><?= $donnees['Pasteurbapteme']; ?></h5>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="row">
							<div class="col-6 libelle">
								<h5>Date de Confirmation : </h5>
								<h5>Lieu de Confirmation : </h5>
								<h5>Pasteur de Confirmation : </h5>
								<h5>Parrain/Marraine : </h5>
								<h5>Nationalité : </h5>
								<h5>Ville Habitée : </h5>
								<h5>Quartier Habité : </h5>
								<h5>Ethnie : </h5>
								<h5>Préfecture : </h5>
								<h5>Village : </h5>
								<h5>N° Décision : </h5>
								<h5>Date de Décision : </h5>
								<h5>Date Recutement : </h5>
								<h5>N° CNSS : </h5>
								<h5>N° Allocation : </h5>
								<h5>Boîte Postale: </h5>
							</div>
							<div class="col-6 donnees">
								<h5><?= $donnees['Dateconfirm']; ?></h5>
								<h5><?= $donnees['Lieuconfirm']; ?></h5>
								<h5><?= $donnees['Pasteurconfirm']; ?></h5>
								<h5><?= $donnees['Nomparrainage']; ?></h5>
								<h5><?= $donnees['Nationagent']; ?></h5>
								<h5><?= $donnees['Ville']; ?></h5>
								<h5><?= $donnees['Quartier']; ?></h5>
								<h5><?= $donnees['Ethnieagent']; ?></h5>
								<h5><?= $donnees['Prefectagent']; ?></h5>
								<h5><?= $donnees['Villageagent']; ?></h5>
								<h5><?= $donnees['Numdecision']; ?></h5>
								<h5><?= $donnees['Datedecision']; ?></h5>
								<h5><?= $donnees['Datembauche']; ?></h5>
								<h5><?= $donnees['NumCNSS']; ?></h5>
								<h5><?= $donnees['Numallocation']; ?></h5>
								<h5><?= $donnees['Bp']; ?></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="text-center">
<a href="details1.php?details=<?= $donnees['Matricule']; ?>" class="badge badge-primary p-2">Details et Impression</a> </td> </div>
 

<script src="Javascript/bootstrap.js"></script>
</body>
</html>