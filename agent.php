<?php
    require_once("Php/connexionbd.php");

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
        $reponse4 = $bdd->query('SELECT * FROM structures WHERE Libstructure LIKE "%'.$recherche.'%" '); 
    }

      $reponse5 = $bdd->query('SELECT * FROM fonctions'); 
    if (isset($_POST['search']) AND !empty($_POST['search'])) {
        $recherche = htmlspecialchars($_POST['searc']);
        $reponse5 = $bdd->query('SELECT * FROM fonctions WHERE Libfonction LIKE "%'.$recherche.'%" '); 
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
    
    <div class="row">
        <div class="col-md-10 offset-md-1">

            <div class="rows">
                <div class="col-md-4 offset-sm-4">
                    <div class="text-center">
                        <p><img src="Média/log.jpg" class="rounded mx-auto d-block" alt="logo"></p>
                        <p>EEPT</p>
                        <p>Eglise Evangélique Presbitérien du Togo</p>
                        <p>BP : 4581</p>
                        <p>Email : eept@gmail.com</p>
                        <p>Tél : +22896098749</p>
                    </div>
                </div>
            </div>

        <div class="rows text-center"><h1>AFFICHAGES DES ETATS</h1></div>

        <div class="accordion" id="accordionPanelsStayOpenExample">
              
            <div class="accordion-item text-center">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Liste Des Agents
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="col-md-12 charle" style="overflow-x:auto">
                        <div>
                            <form method="POST">
                                <input type="Search" name="s" placeholder="Recherche par nom" class="inp">
                                <input type="submit" name="envoyer" class="bouton">
                            </form>
                        </div>
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
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php    
                                             if ($reponse->rowCount()>0) {
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
                                           
                                        </tr>
                                        <?php } } else{ ?>
                                        <tr><td colspan="13" class="text-center table-danger">Utilisateur non trouvé</td></tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Liste des Affectations
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="col-md-12 charle" style="overflow-x:auto">
                        <div>
                            <form method="POST">
                                <input type="Search" name="se" placeholder="Recherche par nom" class="inp">
                                <input type="submit" name="envoyer" class="bouton">
                            </form>
                        </div>
                            <div class="rows" style="overflow-x:auto">
                                <table class="table table-striped table-hover table-bordered table-responsive-sm">
                                    <thead class="table-success">
                                      <tr>
                                        <th class="text-center" >Matricule</th>
                                        <th class="text-center" >Agent</th>
                                        <th class="text-center" >Id Fonction</th>
                                        <th class="text-center" >Fonction</th>
                                        <th class="text-center" >N° Décision</th>
                                        <th class="text-center">Date Affectation</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php    
                                          if ($reponse1->rowCount()>0) {
                                         while ($donnees = $reponse1->fetch()){ ?>
                                      <tr>
                                        <td class="text-center"><?= $donnees['Matricule'] ?></td>
                                        <td class="text-center"><?= $donnees['Nomagent'] ?></td>
                                        <td class="text-center"><?= $donnees['Idfonction'] ?></td>
                                        <td class="text-center"><?= $donnees['Libfonction'] ?></td>
                                        <td class="text-center"><?= $donnees['Numdecision'] ?></td>
                                        <td class="text-center"><?= $donnees['Dateaffectation'] ?></td>
                                        
                                      </tr>
                                      <?php } } else{ ?>
                                        <tr><td colspan="7" class="text-center table-danger">Utilisateur non trouvé</td></tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    Liste Des Mutations
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <div class="col-md-12 charle" style="overflow-x:auto">
                            <div class="col-md-12 charle" style="overflow-x:auto">
                        <div>
                            <form method="POST">
                                <input type="Search" name="sea" placeholder="Recherche par nom" class="inp">
                                <input type="submit" name="envoyer" class="bouton">
                            </form>
                        </div>
                            <div class="rows" style="overflow-x:auto">
                                <table class="table table-striped table-hover table-bordered table-responsive-sm">
                                    <thead class="table-success">
                                      <tr>
                                        <th class="text-center" >Matricule</th>
                                        <th class="text-center" >Agent</th>
                                        <th class="text-center" >Id Structure</th>
                                        <th class="text-center" >Structure</th>
                                        <th class="text-center" >N° Décision</th>
                                        <th class="text-center">Date Mutation</th>
                                        <th class="text-center">Date Début Service</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php    
                                         if ($reponse2->rowCount()>0) {
                                         while ($donnees = $reponse2->fetch()){ ?>
                                      <tr>
                                        <td class="text-center"><?= $donnees['Matricule'] ?></td>
                                        <td class="text-center"><?= $donnees['Nomagent'] ?></td>
                                        <td class="text-center"><?= $donnees['Idstructure'] ?></td>
                                        <td class="text-center"><?= $donnees['Libstructure'] ?></td>
                                        <td class="text-center"><?= $donnees['Numdecision'] ?></td>
                                        <td class="text-center"><?= $donnees['Datemutation'] ?></td>
                                        <td class="text-center"><?= $donnees['Dateservice'] ?></td>
                                        
                                      </tr>
                                     <?php } } else{ ?>
                                        <tr><td colspan="8" class="text-center table-danger">Utilisateur non trouvé</td></tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                    Liste Des Etats Des Agents
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <div class="col-md-12 charle" style="overflow-x:auto">
                            <div>
                            <form method="POST">
                                <input type="Search" name="sear" placeholder="Recherche par nom" class="inp">
                                <input type="submit" name="envoyer" class="bouton">
                            </form>
                        </div>
                            <div class="rows" style="overflow-x:auto">
                                <table class="table table-striped table-hover table-bordered table-responsive-sm">
                                    <thead class="table-success">
                                      <tr>
                                        <th class="text-center">Matricule</th>
                                        <th class="text-center">Agent</th>
                                        <th class="text-center">Id Etat</th>
                                        <th class="text-center">Libellé</th>
                                        <th class="text-center"> Date </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php    
                                         if ($reponse3->rowCount()>0) {
                                          while ($donnees = $reponse3->fetch()){ ?>
                                      <tr>
                                        <td class="text-center"><?= $donnees['Matricule'] ?></td>
                                        <td class="text-center"><?= $donnees['Nomagent'] ?></td>
                                        <td class="text-center"><?= $donnees['Idetat'] ?></td>
                                        <td class="text-center"><?= $donnees['Libetat'] ?></td>
                                        <td class="text-center"><?= $donnees['Datetat'] ?></td>
                                        
                                      </tr>
                                      <?php } } else{ ?>
                                        <tr><td colspan="6" class="text-center table-danger">Utilisateur non trouvé</td></tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                    Liste Des Structures Et Sous-Structures
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                    <div class="accordion-body">
                        <div class="col-md-12 charle" style="overflow-x:auto">
                        <div>
                            <form method="POST">
                                <input type="Search" name="searc" placeholder="Recherche par Libellé" class="inp">
                                <input type="submit" name="envoyer" class="bouton">
                            </form>
                        </div>
                            <div class="rows" style="overflow-x:auto">
                                <table class="table table-striped table-hover table-bordered table-responsive-sm">
                                    <thead class="table-success">
                                      <tr>
                                        <th class="text-center">Id Structure</th>
                                        <th class="text-center">Libellé</th>
                                        <th class="text-center">Id structure M</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php    
                                        if ($reponse4->rowCount()>0) {
                                         while ($donnees = $reponse4->fetch()){ ?>
                                      <tr>
                                        <td class="text-center"><?= $donnees['Idstructure'] ?></td>
                                        <td class="text-center"><?= $donnees['Libstructure'] ?></td>
                                        <td class="text-center"><?= $donnees['Strid'] ?></td>
                                        
                                      </tr>
                                      <?php } } else{ ?>
                                        <tr><td colspan="4" class="text-center table-danger">structure non trouvée</td></tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix   ">
                    Liste Des Fonctions
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                    <div class="accordion-body">
                        <div class="col-md-12 charle" style="overflow-x:auto">
                            <div>
                            <form method="POST">
                                <input type="Search" name="searc" placeholder="Recherche par Libellé" class="inp">
                                <input type="submit" name="envoyer" class="bouton">
                            </form>
                        </div>
                            <div class="rows" style="overflow-x:auto">
                                <table class="table table-striped table-hover table-bordered table-responsive-sm">
                                    <thead class="table-success">
                                      <tr>
                                        <th class="text-center" width="30%">Identifiant</th>
                                        <th class="text-center" width="30%">Libellé</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php    
                                            if ($reponse5->rowCount()>0) {
                                         while ($donnees = $reponse5->fetch()){ ?>
                                      <tr>
                                        <td class="text-center"><?= $donnees['Idfonction'] ?></td>
                                        <td class="text-center"><?= $donnees['Libfonction'] ?></td>
                                        
                                      </tr>
                                      <?php } } else{ ?>
                                        <tr><td colspan="3" class="text-center table-danger">Fonction non trouvée</td></tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<script src="Javascript/bootstrap.js"></script>
</body>
</html>