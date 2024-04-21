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
	<link rel="stylesheet" type="text/css" href="Css/agents.css">	
   <link rel="icon" type="image/x-icon" href="star/assets/favicon.ico" />

    <title>Liste des Agents</title>
</head>
<body>

<style type="text/css">

.charle{
box-shadow: 10px 5px 5px blueviolet;
background:#FFFFE0;
}

thead{
   font-size: 19px;
   font-family: Times new roman;
}

tbody{
   font-size: 17px;
   font-style: italic;
}
.charle{
          margin-top: 10px;
         margin-left: 50px;
     }

}
    .table{
        padding-left: auto;
        padding-right: auto;
    }

    .rows{
        width: 92%;
    }
    h1{
font-family: Ravie, serif;
color: whitesmoke;
text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;
}

.role{
    margin-top: 50px;
}
</style>


<div class="row ">                        
        <div class="row role"><h1 align="center">Liste des Agents</h1></div>

                        <div>
                           <?php if (isset($_SESSION['message'])) { ?>
                           <div class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible text-center">
                             <button type="button" class="close" data-dismiss="alert">&times;</button>
                             <b><?= $_SESSION['message']; ?></b>
                           </div>
                        <?php } unset($_SESSION['message']); ?>
                        </div>

            <div class="col-md-12 charle" style="overflow-x:auto">
                <div class="rows" style="overflow-x:auto">
                    <table class="table table-striped table-hover table-bordered table-responsive-sm">
                      <thead class="table-success">
                        <tr>
                            <th class="text-center" >Photo_Agent</th>
                            <th class="text-center" >Matricule</th>
                            <th class="text-center" > Nom_Agent</th>
                            <th class="text-center" >Prénom_Agent</th>
                            <th class="text-center" >Sexe</th>
                             <th class="text-center" >Date_Naissance</th>
                              <th class="text-center" >Lieu_Naissance</th>
                            <th class="text-center" >Matrimone</th>
                            <th class="text-center" >E-mail</th>
                            <th class="text-center" >N°_Téléphone</th>
                            <th class="text-center">Nationalité</th>
                            <th class="text-center">Ville</th>
                            <th class="text-center">Date_Recutement </th>
                            <th class="text-center" >Réligion</th>
                            <th class="text-center" colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php    
                        require_once("Php/connexionbd.php");
                                 $reponse = $bdd->query('SELECT * FROM agent'); 
                                 while ($donnees = $reponse->fetch()){ ?>
                        <tr>
                            <td class="text-center"><img src="<?= "Média/pictures".$donnees['Photoagent']; ?>" width="50"></td>
                            <td class="text-center"><?= $donnees['Matricule'] ?></td>                       
                            <td class="text-center"><?= $donnees['Nomagent'] ?></td>
                            <td class="text-center"><?= $donnees['Prenomagent'] ?></td> 
                            <td class="text-center"><?= $donnees['Sexeagent'] ?></td>
                            <td class="text-center"><?= $donnees['Datenaissagent'] ?></td>  
                            <td class="text-center"><?= $donnees['Lieunaissagent'] ?></td>
                            <td class="text-center"><?= $donnees['Sitmatagent'] ?></td>  
                            <td class="text-center"><?= $donnees['Email'] ?></td>
                            <td class="text-center"><?= $donnees['Telephone'] ?></td>  
                            <td class="text-center"><?= $donnees['Nationagent'] ?></td>
                            <td class="text-center"><?= $donnees['Ville'] ?></td>   
                            <td class="text-center"><?= $donnees['Datembauche'] ?></td>   
                            <td class="text-center"><?= $donnees['Religionagent'] ?></td> 
                            <td>
                                 <a href="details.php?details=<?= $donnees['Matricule']; ?>" class="badge badge-primary p-2">Details</a> </td> 
                            <td>    
                                 <a href="agents.php?edit=<?= $donnees['Matricule']; ?>" class="badge badge-success p-2">Modifier</a> </td> 
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    </div>
    <br/>
    <div class="text-center">
    <a href="affecterass.php" class="badge badge-success p-2">Affectations et Mutations</a> </td> 
</div>
</div>


<script src="Javascript/bootstrap.js"></script>
</body>
</html>