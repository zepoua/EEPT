<?php

include("Php/structure.php");
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


	<title>Structures</title>
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
                     <h1 align="center">GESTION DES ETATS DES AGENTS</h1>
                </div>

                <div class="container-fluid">
                    <div class="row">
                     
                    	<div class="col-7 cont">
                    		<div class="row">
                    			<img src="Média/structure.png" height="450px" width="350px">
                    		</div>

                       <br/><br/>
                        <div class="row"><h2 align="center">Liste des Structures</h2></div>
                         <br/><br/>
                        <div>
                           <?php if (isset($_SESSION['message'])) { ?>
                           <div class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible text-center">
                             <button type="button" class="close" data-dismiss="alert">&times;</button>
                             <b><?= $_SESSION['message']; ?></b>
                           </div>
                        <?php } unset($_SESSION['message']); ?>
                        </div>

                    		<div class="row">
                    			<table class="table table-striped table-hover table-bordered table-responsive-sm">
                            <thead class="table-success">
                              <tr>
                                <th class="text-center">Id Structure</th>
                                <th class="text-center">Libellé</th>
                                <th class="text-center">Id structure M</th>
                                <th class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php    
                                 $reponse = $bdd->query('SELECT * FROM structures'); 
                                 while ($donnees = $reponse->fetch()){ ?>
                              <tr>
                                <td><?= $donnees['Idstructure'] ?></td>
                                <td><?= $donnees['Libstructure'] ?></td>
                                <td><?= $donnees['Strid'] ?></td>
                                <td>
                                   <a href="structure.php?edit=<?= $donnees['Idstructure']; ?>" class="badge badge-success p-2">Modifier</a> | 
                                   <a href="Php/structure.php?delete=<?= $donnees['Idstructure']; ?>" class="badge badge-danger p-2" onclick="return confirm('Etes-vous sûr(e)???');">Supprimer</a>
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
                    				
                              <h2 align="center">Structures</h2>
                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Identifiant</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="identifiant" name="identifiant" minlength="4" readonly required="true"
                                             <?php if ($str==NULL) { ?>
                                                value="<?= $id; ?>"
                                             <?php } ?>
                                             >
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
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="libellés de la structure" required="true" name="libstructure"
                                             <?php if ($str==NULL) { ?>
                                                value="<?= $lib; ?>"
                                             <?php } ?>
                                             >
                                       </div>

                                      <div class="row rows">
                                          <div class="col-1"></div>
                                          <div class="col-5">
                                          <?php if ($update==true AND $str==NULL) { ?>
                                             <button type="submit" class="btn btn-info" name="btnedit">Modifier</button>
                                          <?php } else{ ?>
                                             <button type="submit" class="btn btn-success" name="btnregister">Enregistrer</button>
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

                        <div class="row rows">
                           <form method="POST">
                              <h2 align="center">Sous-Structures</h2>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Libellé</label>
                                          <div class="col-sm-8">
                                             <select name="idmere" required="true">
                                                <option value="" class="text-center">Structure Mère</option>
                                                <?php 
                                                require_once("Php/connexionbd.php");
                                                $reponse = $bdd->query('SELECT * FROM structures');
                                                while ($donnees = $reponse->fetch()):
                                                if ($donnees['Strid'] ==  NULL) {
                                                 ?>
                                                   <option class="text-center" value="<?php echo $donnees['Idstructure']; ?>">
                                                      <?php echo $donnees['Libstructure']; ?>
                                                   </option>
                                                <?php } endwhile; ?>
                                             </select>
                                          </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Identifiant</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="identifiant de la sous-structure" name="idsous" minlength="4" maxlength="8" title="Entrez un identifiant non utilisé" required="true"
                                               <?php if ($str!=NULL) { ?>
                                                value="<?= $id; ?>"
                                             <?php } ?>
                                              >
                                       </div>
                                    </div>

                                    <div class="error">
                                       <?php
                                          if(isset($_POST['btnregister1']) AND !empty($error)){
                                             echo $error;
                                          }
                                       ?>
                                    </div>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Libellé</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="nom de la sous-structure" required="true" name="libsous"
                                             <?php if ($str!=NULL) { ?>
                                                value="<?= $lib; ?>"
                                             <?php } ?>
                                             >
                                       </div>

                                      <div class="row rows">
                                          <div class="col-1"></div>
                                          <div class="col-5">
                                          <?php if ($update==true AND $str!=NULL) { ?>
                                             <button type="submit" class="btn btn-primary" name="btnedit">Modifier</button>
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