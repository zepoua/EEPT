<?php
include("Php/etat.php");
include("includ.php");
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


	<title>Etats Agent</title>
</head>
<body>


<style type="text/css">
	.cont{
border-right: 3mm dotted rgb(170, 50, 220, .6);}
	.conte{
		margin-top: 100px;
		background: lightgoldenrodyellow;
}
	.btn1{
		margin-right: 10px;
	}
b{
   color: white;
}
</style>
 <!-- Start app main Content -->

      	<div class="main-content">
            <section class="section">

                <div class="container content">
                     <h1 align="center">GESTION DES ETATS DES AGENTS</h1>
                </div>

                <div class="container-fluid">
                    <div class="row">
                     
                    	<div class="col-7 cont">
                    		<div class="row">
                    			<img src="Média/valide1.jpg" height="350px" width="350px">
                    		</div>
                        <br/><br/>
                        <div class="row"><h2 align="center">Liste des Etats</h2></div>
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
                           <table  class="table table-striped table-hover table-bordered table-responsive-sm" >
                            <thead class="table-success">
                              <tr>
                                <th class="text-center">Matricule</th>
                                <th class="text-center">Agent</th>
                                <th class="text-center">Id Etat</th>
                                <th class="text-center">Libellé</th>
                                <th> Date_Etat </th>
                                <th class="text-center" colspan="2">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php    
                                 $reponse = $bdd->query('SELECT agent.Nomagent, etats.Libetat, agentetat.Matricule, agentetat.Idetat, agentetat.Datetat FROM ((agentetat
                                    INNER JOIN agent ON  agentetat.Matricule = agent.Matricule)
                                    INNER JOIN etats ON agentetat.Idetat = etats.Idetat)');
                                    while ($donnees = $reponse->fetch()){ ?>
                              <tr>
                                <td><?= $donnees['Matricule'] ?></td>
                                <td><?= $donnees['Nomagent'] ?></td>
                                <td><?= $donnees['Idetat'] ?></td>
                                <td><?= $donnees['Libetat'] ?></td>
                                <td><?= $donnees['Datetat'] ?></td>
                                <td>
                                   <a href="etat.php?edit=<?= $donnees['Idetat']; ?>" class="badge badge-success p-2">Modifier</a></td>
                                   <td>
                                   <a href="Php/etat.php?delete=<?= $donnees['Idetat']; ?>" class="badge badge-danger p-2" onclick="return confirm('Etes-vous sûr(e)???');">Supprimer</a>
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
                    			<form action="Php/etat.php" method="POST">
                              <h2 align="center">Les différents états</h2>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Identifiant</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="identifiant" name="identifiant" minlength="4" maxlength="8" title="Entrez un numéro non utilisé" required="true" value="<?= $Id; ?>">
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
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Libellé</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="libellé de l'état " required="true" name="libetat">
                                       </div>

                                      <div class="row rows">
                                          <div class="col-2"></div>
                                          <div class="col-4">
                                             <button type="submit" class="btn btn-success" name="btnregister">Enregistrer</button>
                                          </div>
                                          <div class="col-4">
                                             <button type="reset" class="btn btn-danger">Annuler</button>
                                          </div>
                                          <div class="col-2"></div>
                                       </div>
                                 </div>                         
                    			</form>
                    		</div>

                        <div class="row rows">
                           <form action="Php/etat.php" method="POST">
                              <h2 align="center">L'état des agents</h2>

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
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Son Etat</label>
                                       <div class="col-sm-8">
                                             <select name="etat" required="true">
                                                <option value="" class="text-center">Faites un Choix</option>
                                                <?php 
                                                require_once("Php/connexionbd.php");
                                                $reponse = $bdd->query('SELECT * FROM etats');
                                                while ($donnees = $reponse->fetch()):
                                                ?>
                                                   <option class="text-center" value="<?php echo $donnees['Idetat']; ?>">
                                                      <?php echo $donnees['Libetat']; ?>
                                                   </option>
                                                <?php endwhile; ?>
                                             </select>
                                       </div>
                                    </div>
                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Date</label>
                                       <div class="col-sm-8">
                                             <input type="date" class="form-control" id="colFormLabel" placeholder="date d'enregistrement" required="true" name="datetat"
                                             value="<?= $date ?>">
                                       </div>

                                      <div class="row rows">
                                          <div class="col-1"></div>
                                         <div class="col-5">
                                             <?php if ($update==true) { ?>
                                             <button type="submit" class="btn btn-info" name="btnedit">Modifier</button>
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