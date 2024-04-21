<?php
include("Php/muter.php");
include("includass.php");
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

<title>Mutations</title>
</head>
<body>

<style type="text/css">
	.cont{
border-right: 3mm dotted rgb(170, 50, 220, .6);}
	.conte{
		margin-top: 150px;
		background: lightgoldenrodyellow;
}
	.btn1{
		margin-right: 10px;
	}

.error{
   font-style: italic;
   color: red;
   margin-bottom: 15px;
   margin-left: 95px;
   font-weight: 300;
   text-align: center;
}

</style>
 <!-- Start app main Content -->

      	<div class="main-content">
            <section class="section">

                <div class="container content">
                     <h1 align="center">GESTION DES MUTATIONS</h1>
                </div>

                <div class="container-fluid">
                    <div class="row">
                     
                    	<div class="col-7 cont">
                    		<div class="row">
                    			<img src="Média/fonction.jpg" height="450px" width="350px">
                    		</div>

                       <br/><br/>
                        <div class="row"><h2 align="center">Liste des Mutations</h2></div>
                         <br/><br/>

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
                                <th class="text-center" >Id Structure</th>
                                <th class="text-center" >Structure</th>
                                <th class="text-center" >N° Décision</th>
                                <th class="text-center">Date Mutation</th>
                                <th class="text-center">Date Début Service</th>
                                <th class="text-center" colspan="2">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php    
                                 $reponse = $bdd->query('SELECT agent.Nomagent, structures.Libstructure, muter.Numdecision, muter.Datemutation, muter.Matricule, muter.Idstructure, muter.Dateservice  FROM ((muter
                                    INNER JOIN agent ON  muter.Matricule = agent.Matricule)
                                    INNER JOIN structures ON muter.Idstructure = structures.Idstructure)'); 
                                 while ($donnees = $reponse->fetch()){ ?>
                              <tr>
                                <td><?= $donnees['Matricule'] ?></td>
                                <td><?= $donnees['Nomagent'] ?></td>
                                <td><?= $donnees['Idstructure'] ?></td>
                                <td><?= $donnees['Libstructure'] ?></td>
                                <td><?= $donnees['Numdecision'] ?></td>
                                <td><?= $donnees['Datemutation'] ?></td>
                                <td><?= $donnees['Dateservice'] ?></td>
                                <td>
                                   <a href="muterass.php?edit=<?= $donnees['Numdecision']; ?>" class="badge badge-success p-2">Modifier</a> </td>
                                 <td>
                                   <a href="Php/muter.php?delete=<?= $donnees['Numdecision']; ?>" class="badge badge-danger p-2" onclick="return confirm('Etes-vous sûr(e)???');">Supprimer</a>
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                    	</div>

                    	<div class="col-5 conte">
                    		<div class="row">
                    			<img src="Média/logo.jpg" width="350px" height="400px">
                    		</div>

                    		<div class="row rows">
                    			<form method="POST">
                    				
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
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Structure</label>
                                       <div class="col-sm-8">
                                             <select name="structure" required="true">
                                                <option value="" class="text-center">Faites un Choix</option>
                                                <?php 
                                                require_once("Php/connexionbd.php");
                                                $reponse = $bdd->query('SELECT * FROM structures');
                                                while ($donnees = $reponse->fetch()):
                                                ?>
                                                   <option class="text-center" value="<?php echo $donnees['Idstructure']; ?>">
                                                      <?php echo $donnees['Libstructure']; ?>
                                                   </option>
                                                <?php endwhile; ?>
                                             </select>
                                       </div>
                                    </div>


                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">N° Décision</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="identifiant de la décision" name="numdecision" required="true" 
                                             value="<?=$num; ?>" readonly>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Décision</label>
                                       <div class="col-sm-8">
                                             <input type="date" class="form-control" id="colFormLabel" placeholder="date de la prise de décision" required="true" name="datedecision" value="<?=$date; ?>">
                                       </div>
                                    </div>

                                       <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Service</label>
                                       <div class="col-sm-8">
                                             <input type="date" class="form-control" id="colFormLabel" placeholder="date de début de service" required="true" name="dateservice" value="<?=$dates; ?>">
                                       </div>
                                    </div>

                                      <div class="row rows">
                                          <div class="col-1"></div>
                                          <div class="col-5">
                                             <?php if ($update==true) { ?>
                                             <button type="submit" class="btn btn-info" name="btnedit1">Modifier</button>
                                          <?php } else{ ?>
                                             <button type="submit" class="btn btn-success" name="btnregister1">Enregistrer</button>
                                          <?php } ?>      
                                        </div>
                                          <div class="col-5">
                                             <button type="reset" class="btn btn-danger">Annuler</button>
                                          </div>
                                          <div class="col-1"></div>
                                       </div>
                                 </div>                         
                    			</form>
                    		</div>
                    	</div>

                    </div>
                </div>
            </section>
        </div>    
               
<script src="Javascript/bootstrap.js"></script>

</body>
</html>