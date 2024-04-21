<?php

    require_once("../Php/connexionbd.php");
    $reponse = $bdd->query('SELECT * FROM agent');
    if (isset($_POST['s']) AND !empty($_POST['s'])) {
        $recherche = htmlspecialchars($_POST['s']);
        $reponse = $bdd->query('SELECT * FROM agent WHERE Nomagent LIKE "%'.$recherche.'%" ');
    }


    $reponse1 = $bdd->query('SELECT agent.Nomagent, fonctions.Libfonction, affecter.Numdecision, affecter.Dateaffectation, affecter.Matricule, affecter.Idfonction  FROM ((affecter
        INNER JOIN agent ON  affecter.Matricule = agent.Matricule)
        INNER JOIN fonctions ON affecter.Idfonction = fonctions.Idfonction)'); 
    if (isset($_POST['se']) AND !empty($_POST['se'])) {
        $recherche = htmlspecialchars($_POST['se']);
        $reponse1 = $bdd->query('SELECT agent.Nomagent, fonctions.Libfonction, affecter.Numdecision, affecter.Dateaffectation, affecter.Matricule, affecter.Idfonction  FROM ((affecter
            INNER JOIN agent ON  affecter.Matricule = agent.Matricule)
            INNER JOIN fonctions ON affecter.Idfonction = fonctions.Idfonction) WHERE Nomagent LIKE "%'.$recherche.'%" ');
    }

    $reponse2 = $bdd->query('SELECT agent.Nomagent, structures.Libstructure, muter.Numdecision, muter.Datemutation, muter.Matricule, muter.Idstructure, muter.Dateservice  FROM ((muter
        INNER JOIN agent ON  muter.Matricule = agent.Matricule)
        INNER JOIN structures ON muter.Idstructure = structures.Idstructure)'); 
    if (isset($_POST['sea']) AND !empty($_POST['sea'])) {
        $recherche = htmlspecialchars($_POST['sea']);
        $reponse2 = $bdd->query('SELECT agent.Nomagent, structures.Libstructure, muter.Numdecision, muter.Datemutation, muter.Matricule, muter.Idstructure, muter.Dateservice  FROM ((muter
        INNER JOIN agent ON  muter.Matricule = agent.Matricule)
        INNER JOIN structures ON muter.Idstructure = structures.Idstructure) WHERE Nomagent LIKE "%'.$recherche.'%" ');
    }

    $reponse3 = $bdd->query('SELECT agent.Nomagent, etats.Libetat, agentetat.Matricule, agentetat.Idetat, agentetat.Datetat FROM ((agentetat
        INNER JOIN agent ON  agentetat.Matricule = agent.Matricule)
        INNER JOIN etats ON agentetat.Idetat = etats.Idetat)');
    if (isset($_POST['sear']) AND !empty($_POST['sear'])) {
        $recherche = htmlspecialchars($_POST['sear']);
        $reponse3 = $bdd->query('SELECT agent.Nomagent, etats.Libetat, agentetat.Matricule, agentetat.Idetat, agentetat.Datetat FROM ((agentetat
        INNER JOIN agent ON  agentetat.Matricule = agent.Matricule)
        INNER JOIN etats ON agentetat.Idetat = etats.Idetat) WHERE Nomagent LIKE "%'.$recherche.'%" ');
    }

    $reponse4 = $bdd->query('SELECT * FROM structures'); 
    if (isset($_POST['searc']) AND !empty($_POST['searc'])) {
        $recherche = htmlspecialchars($_POST['searc']);
        $reponse4 = $bdd->query('SELECT * FROM structures'); 
    }

      $reponse5 = $bdd->query('SELECT * FROM fonctions'); 
    if (isset($_POST['search']) AND !empty($_POST['search'])) {
        $recherche = htmlspecialchars($_POST['searc']);
        $reponse5 = $bdd->query('SELECT * FROM fonctions'); 
    }
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
    
    .col-md-10{
        border: solid;
        margin-top: 50px;
        padding: 30px;
        background: whitesmoke;
        height: auto;
    }
    .row{
        background: lightcyan;
        background-image: url("https://st2.depositphotos.com/3759967/5593/i/600/depositphotos_55936567-stock-photo-swirling-frosty-multi-colored-fractal.jpg") ;  
      
    }

    form{
justify-content: center;    
}

    .inp:focus {
  color: black;
font-style: italic;
  border: 2px dotted;
  width: 30%;
}

.inp{
    border-radius: 5px;
    border: 1px solid;
}

.bouton{
    background: green;
    color: white;
}

h1{
    font-family: algerian;
    color: blueviolet;
}

p{
    font-weight: bold;
    font-style: oblique;
}
</style>


    <div class="rows" style="overflow-x:auto">
                                <table id="myTable" class="table table-striped table-hover table-bordered table-responsive-sm">
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
                                            <th class="text-center" colspan="3">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php    
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
                                                <a href="">Impression</a>     
                                            </td> 
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>

<script src="Javascript/bootstrap.js"></script>

</body>
</html>