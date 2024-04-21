<?php
session_start();
include('Php/phpagent.php');
include('Php/competence.php');
include("includ.php");
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

	<title>RECRUTEMENT</title>
</head>
<body>

<style type="text/css">
.charle{
box-shadow: 10px 5px 5px blueviolet;
background:#FFFFE0;
}

thead{
   font-size: 18px;
   font-family: Times new roman;
}
tbody{
   font-size: 16px;
   font-style: italic;
}

b{
   color: white;
}
</style>

 <!-- Start app main Content -->

      <div class="main-content">
            <section class="section">

                  <div class="container content">
                     <h1 align="center">RECRUTEMENT DES AGENTS</h1>
                  </div>

                  <div class="container-fluid">
                     <div class="rows">
                        <form method="POST" enctype="multipart/form-data">

                           <div class="container">
                              <h2 align="center">Informations d'Etat Civil et tiers</h2>
                              </br> 

                           </div>
                           <div class="row charle">
                              <div class="col-6">

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">N° Matricule</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="numéro matricule" name="matricule" minlength="2"  title="Entrez un numéro non utilisé" value="<?= $matricule; ?>" readonly>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Photo</label>
                                       <div class="col-sm-8">
                                             <input type="hidden" name="oldimage" value="<?= "Média/pictures".$photo; ?>">
                                             <input type="file" class="form-control" id="colFormLabel" placeholder="photo de l'agent" required="true" name="img" accept=".jpg, .jpeg, .png">
                                             <img src="<?= "Média/pictures".$photo; ?>" class="img-thumbnail" width="150">
                                       </div>
                                 </div>                                 

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Nom</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" required="true" name="nomagent" placeholder="nom de l'agent" minlength="3" value="<?= $nomagent; ?>">
                                       </div>
                                    </div>

                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Prénom</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="prénom de l'agent" required="true" name="prenomagent" maxlength="20" value="<?= $prenomagent; ?>">
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Date de Naissance</label>
                                       <div class="col-sm-8">
                                             <input type="date" class="form-control" id="colFormLabel" placeholder="date de naissance" required="true" name="datenais" value="<?= $datenais; ?>">
                                       </div>
                                    </div>

                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Lieu de Naissance</label>
                                       <div class="col-sm-8">
                                          <input type="text" class="form-control" id="colFormLabel" placeholder="lieu de naissance" required="true" name="lieunais" maxlength="20" value="<?= $lieunais; ?>">
                                       </div>
                                   </div>   
                                    
                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Adresse Mail</label>
                                       <div class="col-sm-8">
                                             <input type="email" class="form-control" id="colFormLabel" placeholder="adresse électronique" required="true" size="30" name="email" value="<?= $email; ?>">
                                       </div>
                                    </div>

                                    <div class="error">
                                       <?php
                                          if(isset($_POST['btnregister']) AND !empty($error)){
                                             echo $error;
                                          }
                                       ?>
                                    </div>

                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">N° Téléphone</label>
                                       <div class="col-sm-8">
                                             <input type="tel" class="form-control" id="colFormLabel" placeholder="numéro de téléphone" required="true" name="numero" value="<?= $numero; ?>">
                                       </div>
                                    </div> 

                                    <div class="error">
                                       <?php
                                          if(isset($_POST['btnregister']) AND !empty($error)){
                                             echo $error;
                                          }
                                       ?>
                                    </div>

                                </div>


                              <div class="col-6">
                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Langues</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="langue(s) parlée(s)" required="true" name="langue" >
                                       </div>
                                    </div>

                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Type d'Agent</label>
                                       <div class="col-sm-8">
                                             <select name="typag" required="true">
                                                <option value="" class="text-center">Faites un Choix</option>
                                                <?php 
                                                require_once("Php/connexionbd.php");
                                                $reponse = $bdd->query('SELECT * FROM typeagent');
                                                while ($donnees = $reponse->fetch()):
                                                ?>
                                                   <option class="text-center" value="<?php echo $donnees['Idtypeagent']; ?>">
                                                      <?php echo $donnees['Libtypeagent']; ?>
                                                   </option>
                                                <?php endwhile; ?>
                                             </select>
                                       </div>
                                    </div>

                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Sexe</label>
                                       <div class="col-sm-8 col-content">
                                             <div class="form-check form-check-inline checked">
                                    <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="masculin">
                                    <label class="form-check-label" for="inlineRadio1">Masculin</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="feminin">
                                    <label class="form-check-label" for="inlineRadio2">Féminin</label>
                                 </div>
                                       </div>
                                    </div> 
                                 
                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label"> Matrimonine</label>
                                       <div class="col-sm-8 col-content">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation" id="inlineRadio1" value="Marié(e)">
                                    <label class="form-check-label" for="inlineRadio1">Marié(e)</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation" id="inlineRadio2" value="Divorcé(e)">
                                    <label class="form-check-label" for="inlineRadio2">Divorcé(e)</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation" id="inlineRadio2" value="Célibataire">
                                    <label class="form-check-label" for="inlineRadio2">Célibataire</label>
                                 </div>
                                       </div>
                                 </div>       

                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label"><span>Loisirs</span></label>
                                       <div class="col-sm-8 col-content">
                                             <div class="form-check form-check-inline form-switch">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Music" name="loisir[]">
                                    <label class="form-check-label" for="inlineCheckbox1">Music</label>
                                 </div>
                                 <div class="form-check form-check-inline form-switch">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Cinema" name="loisir[]">
                                    <label class="form-check-label" for="inlineCheckbox2">Cinéma</label>
                                 </div>
                                 <div class="form-check form-check-inline form-switch">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Sport" name="loisir[]">
                                    <label class="form-check-label" for="inlineCheckbox2">Sport</label>
                                 </div>
                                 <div class="form-check form-check-inline form-switch">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Bricolage" name="loisir[]">
                                    <label class="form-check-label" for="inlineCheckbox2">Bricolage</label>
                                 </div>
                                 <div class="form-check form-check-inline form-switch">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Autres" name="loisir[]">
                                    <label class="form-check-label" for="inlineCheckbox2">Autres</label>
                                 </div>
                                 </div> 
                              </div>

                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Groupe Sanguin</label>
                                       <div class="col-sm-8 col-content check">
                                             <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sanguin" id="inlineRadio1" value="A+">
                                    <label class="form-check-label" for="inlineRadio1">A+</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sanguin" id="inlineRadio2" value="A-">
                                    <label class="form-check-label" for="inlineRadio2">A-</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sanguin" id="inlineRadio2" value="B+">
                                    <label class="form-check-label" for="inlineRadio2">B+</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sanguin" id="inlineRadio1" value="B-">
                                    <label class="form-check-label" for="inlineRadio1">B-</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sanguin" id="inlineRadio2" value="AB+">
                                    <label class="form-check-label" for="inlineRadio2">AB+</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sanguin" id="inlineRadio2" value="AB-">
                                    <label class="form-check-label" for="inlineRadio2">AB-</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sanguin" id="inlineRadio2" value="O+">
                                    <label class="form-check-label" for="inlineRadio2">O+</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sanguin" id="inlineRadio2" value="O-">
                                    <label class="form-check-label" for="inlineRadio2">O-</label>
                                 </div>
                                       </div>
                                    </div>
                                </div>
                           </div>


                           </br> 

                        <div class="container">
                              <h2 align="center">Informations Réligion</h2>
                           </br> 
                           </div>
                           <div class="row charle">
                              <div class="col-6">
                                 
                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Réligion</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="réligion de l'agent" required="true" name="religion" maxlength="25" value="<?= $religion; ?>">
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Date de Baptême</label>
                                       <div class="col-sm-8">
                                             <input type="date" class="form-control" id="colFormLabel" placeholder="date de baptême" required="true" name="datebapt" value="<?= $datebapt; ?>">
                                       </div> 
                                 </div>       

                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Lieu de Baptême</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="lieu de baptême" required="true" name="lieubapt" maxlength="30" value="<?= $lieubapt; ?>">
                                       </div>
                                   </div>      

                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Pasteur</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="nom du pasteur" required="true" name="nompastb" maxlength="50" value="<?= $nompastb; ?>">
                                       </div>
                                   </div>    

                              </div>


                              <div class="col-6">

                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Date Confirmation</label>
                                       <div class="col-sm-8">
                                             <input type="date" class="form-control" id="colFormLabel" placeholder="date de confirmation" required="true" name="dateconfirm" value="<?= $dateconfirm; ?>">
                                       </div>  
                                   </div>  
                                 
                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Lieu de Confirmation</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="lieu de confirmation" required="true" name="lieuconfirm" maxlength="30" value="<?= $lieuconfirm; ?>">
                                       </div>
                                   </div>  

                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Pasteur</label>
                                       <div class="col-sm-8">
                                          <input type="text" class="form-control" id="colFormLabel" placeholder="nom du pasteur" required="true" name="nompastc" maxlength="30" value="<?= $nompastc; ?>">
                                       </div>
                                   </div>

                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Nom</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="nom de la marraine ou du parrain" required="true" name="parramaine" maxlength="50" value="<?= $parramaine; ?>">
                                       </div>  
                                   </div>
                              </div>
                           </div>
                       
                              </br> 

                        <div class="container">
                              <h2 align="center">Informations localité</h2>
                           </br> 
                           </div>
                           <div class="row charle">
                              
                              <div class="col-6">

                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Nationalité</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="nationalité de l'agent" required="true" name="nation" maxlength="25" value="<?= $nation; ?>">
                                      </div>
                                   </div>

                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Ville Habitée</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="ville habitée" required="true" name="ville" maxlength="20" value="<?= $ville; ?>">
                                       </div>
                                   </div>        


                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Quartier Habitée</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="nom du quartier" required="true" name="quartier" maxlength="25" value="<?= $quartier; ?>">
                                       </div>
                                   </div>
                               </div>


                               <div class="col-6">
                                 
                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Ethnie</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="ethnie de l'agent" required="true" name="ethnie" maxlength="20" value="<?= $ethnie; ?>">
                                      </div>
                                   </div> 

                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Préfecture</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="Préfecturede d'origine" required="true" name="prefecture" maxlength="25" value="<?= $prefecture; ?>">
                                       </div>
                                   </div>

                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Village</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="village d'origine" required="true" name="village" maxlength="20" value="<?= $village; ?>">
                                       </div>
                                   </div> 
                               </div>
                           </div>
                           </br> 

                        <div class="container">
                              <h2 align="center">Informations Embauche et autres</h2>
                              </br> 

                           </div>
                           <div class="row charle">
                              
                              <div class="col-6">
                                 
                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">N° Décision</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="numéro de décision" required="true" name="numdecision" maxlength="8" value="<?= $Ids; ?>" readonly >
                                      </div>
                                   </div>   

                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Prise de Décision</label>
                                       <div class="col-sm-8">
                                             <input type="date" class="form-control" id="colFormLabel" placeholder="date de la prise de décision" required="true" name="datedecision" value="<?= $datedecision; ?>">
                                      </div>
                                   </div>

                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Date d'Embauche</label>
                                       <div class="col-sm-8">
                                             <input type="date" class="form-control" id="colFormLabel" placeholder="date d'embauche" required="true" name="datembauche" value="<?= $datembauche; ?>">
                                      </div>
                                   </div>

                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Date de Retraite</label>
                                       <div class="col-sm-8">
                                             <input type="date" class="form-control" id="colFormLabel" placeholder="date de retraite" name="dateretraite" value="<?= $dateretraite; ?>">
                                       </div>   
                                   </div> 
                              </div>


                              <div class="col-6">
                                 
                                 <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">N° CNSS</label>
                                       <div class="col-sm-8">
                                             <input type="number" class="form-control" id="colFormLabel" placeholder="numéro de cnss" required="true" name="cnss" value="<?= $cnss; ?>">
                                      </div>
                                   </div>

                                   <div class="error">
                                       <?php
                                          if(isset($_POST['btnregister']) AND !empty($error)){
                                             echo $error;
                                          }
                                       ?>
                                    </div>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">N° Allocation</label>
                                       <div class="col-sm-8">
                                             <input type="number" class="form-control" id="colFormLabel" placeholder="numéro d'allocation" required="true" name="allocation" value="<?= $allocation; ?>">
                                      </div>
                                   </div> 

                                   <div class="error">
                                       <?php
                                          if(isset($_POST['btnregister']) AND !empty($error)){
                                             echo $error;
                                          }
                                       ?>
                                    </div>

                                   <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">B. Postal</label>
                                       <div class="col-sm-8">
                                             <input type="number" class="form-control" id="colFormLabel" placeholder="boite postal" required="true" name="bp" value="<?= $bp; ?>">
                                       </div>  
                                   </div>  

                                   <div class="error">
                                       <?php
                                          if(isset($_POST['btnregister']) AND !empty($error)){
                                             echo $error;
                                          }
                                       ?>
                                    </div>

                              </div>

                                     <div class="row rows">
                                          <div class="col-3"></div>
                                          <div class="col-3">
                                              <?php if ($update==true) { ?>
                                             <button type="submit" class="btn btn-info" name="btnedit">Modifier</button>
                                          <?php } else{ ?>
                                             <button type="submit" class="btn btn-success" name="btnregister">Enregistrer</button>
                                          <?php } ?>      
                                          </div>
                                          <div class="col-3">
                                             <button type="reset" class="btn btn-danger">Annuler</button>
                                          </div>
                                          <div class="col-3"></div>
                                       </div>

                           </div>

                        </form>
                    </div>
                </div>
            </section>
      </div>  

</br> 

      <div class="main-content">
            <section class="section">

                  <div class="container">
                     <h1 align="center">  </h1>
                  </div>

                  <div class="container-fluid">
                     <div class="rows">
                        <form method="POST">

                           <div class="container">
                              <h2 align="left">APTITUDES ET COMPETENCES</h2>
                              </br> 

                           </div>
                           <div class="row">
                              <div class="col-4 charle">
                           
                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Agent</label>
                                       <div class="col-sm-8">
                                             <select name="nomagent" required="true">
                                                <option value="" class="text-center">Faites un Choix</option>
                                                <?php 
                                                require_once("Php/connexionbd.php");
                                                $reponse = $bdd->query('SELECT * FROM agent');
                                                while ($donnees = $reponse->fetch()):
                                                ?>
                                                   <option class="text-center" value="<?php echo $donnees['Matricule']; ?>">
                                                      <?php echo $donnees['Nomagent']; ?>
                                                   </option>
                                                <?php endwhile; ?>
                                             </select>
                                       </div>
                                    </div>
                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Identifiant</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="identifiant de la Compétence" name="idcomp" required="true" title="Entrez un numéro non utilisé" value="<?=$Id; ?>" readonly>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label" >Libellé</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="libellé de la compétence" name="libcomp" required="true" value="<?=$lib; ?>">
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Appréciation</label>
                                       <div class="col-sm-8">
                                             <select name="appreciation" required="true">
                                                <option class="text-center">Faites un choix</option>
                                                <option class="text-center" value="Très-Bien">Très-Bien</option>
                                                <option class="text-center" value="Bien">Bien</option>
                                                <option class="text-center" value="Assez-Bien">Assez-Bien</option>
                                                <option class="text-center" value="Passable">Passable</option>
                                                <option class="text-center" value="Médiocre">Médiocre</option>
                                             </select>
                                       </div>
                                    </div>
                          
                                     <div class="row rows">
                                          <div class="col-6">
                                             <?php if ($update1==true) { ?>
                                             <button type="submit" class="btn btn-info" name="btnedit1">Modifier</button>
                                          <?php } else{ ?>
                                             <button type="submit" class="btn btn-success" name="btnregister1">Enregistrer</button>
                                          <?php } ?>      
                                        </div>
                                          <div class="col-6">
                                             <button type="reset" class="btn btn-danger">Annuler</button>
                                          </div>
                                       </div>
                              </div>
                        </form>
                              <div class="col-8">
                                 
                                 <div class="row"><h2 align="center">Liste des Compétences des Agents</h2></div>
                                  <br/>

                                 <div>
                                    <?php if (isset($_SESSION['message'])) { ?>
                                    <div class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible text-center">
                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      <b><?= $_SESSION['message']; ?></b>
                                    </div>
                                    <?php } unset($_SESSION['message']); ?>
                                 </div>

                                 <div class="row" style="overflow-x:auto">
                                    <table class="table table-striped table-hover table-bordered table-responsive-sm">
                                     <thead class="table-success">
                                       <tr>
                                         <th class="text-center" >Matricule</th>
                                         <th class="text-center" >Agent</th>
                                         <th class="text-center" >Id Compétence</th>
                                         <th class="text-center" >Libellé</th>
                                         <th class="text-center">Appréciation</th>
                                         <th class="text-center" colspan="2">Actions</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <?php    
                                          $reponse = $bdd->query('SELECT agent.Nomagent, competences.Libcompetence, agentcompetence.Matricule, agentcompetence.Idcompetence, agentcompetence.Appreciation  FROM ((agentcompetence
                                             INNER JOIN agent ON  agentcompetence.Matricule = agent.Matricule)
                                             INNER JOIN competences ON agentcompetence.Idcompetence = competences.Idcompetence)'); 
                                          while ($donnees = $reponse->fetch()){ ?>
                                       <tr>
                                         <td><?= $donnees['Matricule'] ?></td>
                                         <td><?= $donnees['Nomagent'] ?></td>
                                         <td><?= $donnees['Idcompetence'] ?></td>
                                         <td><?= $donnees['Libcompetence'] ?></td>
                                         <td><?= $donnees['Appreciation'] ?></td>
                                         <td>
                                            <a href="agents.php?edit1=<?= $donnees['Idcompetence']; ?>" class="badge badge-success p-2">Modifier</a> </td>
                                          <td>
                                            <a href="Php/competence.php?delete=<?= $donnees['Idcompetence']; ?>" class="badge badge-danger p-2" onclick="return confirm('Etes-vous sûr(e)???');">Supprimer</a>
                                         </td>
                                       </tr>
                                       <?php } ?>
                                     </tbody>
                                   </table>
                                 </div>
                              </div>
                         </div>
                    </div>
                </div>
            </section>
      </div>                  
<script src="Javascript/bootstrap.js"></script>

</body>
</html>