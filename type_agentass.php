<?php
include("Php/typeagent.php");
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


	<title>Types Agent</title>
</head>
<body>


<style type="text/css">
	.cont{
border-right: 3mm dotted rgb(170, 50, 220, .6);}
	.conte{
		margin-top: 200px;
		background: lightgoldenrodyellow;
}
	.btn{
      width: 100%;
	}

    b{
        color: white;
    }

</style>
 <!-- Start app main Content -->

      	<div class="main-content">
            <section class="section">

                <div class="container content">
                     <h1 align="center">GESTION DES TYPES D'AGENT</h1>
                </div>

                <div class="container-fluid">
                    <div class="row">
                     
                    	<div class="col-7 cont">
                    		<div class="row rock">
                    			<img src="Média/logo1.jpeg">
                    		</div>

                        <br/><br/>
                        <div class="row"><h2 align="center">Liste des Types d'Agent</h2></div>
                         <br/><br/>
                        <div>
                           <?php if (isset($_SESSION['message'])) { ?>
                           <div class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible text-center">
                             <button type="button" class="close" data-dismiss="alert">&times;</button>
                             <b><?= $_SESSION['message']; ?></b>
                           </div>
                        <?php 
                        } unset($_SESSION['message']); 
                        ?>
                        </div>

                    		<div class="row">
                    			<table class="table table-striped table-hover table-bordered table-responsive-sm">
                            <thead class="table-success">
                              <tr>
                                <th class="text-center" width="30%">Identifiant</th>
                                <th class="text-center" width="30%">Libellé</th>
                                <th class="text-center" width="40%">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php    
                                 $reponse = $bdd->query('SELECT * FROM typeagent'); 
                                 while ($donnees = $reponse->fetch()){ ?>
                              <tr>
                                <td><?= $donnees['Idtypeagent'] ?></td>
                                <td><?= $donnees['Libtypeagent'] ?></td>
                                <td>
                                   <a href="type_agentass.php?edit=<?= $donnees['Idtypeagent']; ?>" class="badge badge-success p-2">Modifier</a></td>
                                 
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                    		</div>
                    	</div>

                    	<div class="col-5 conte">
                    		<div class="row">
                    			<img src="Média/logo.jpg" width="300px" height="350px">
                    		</div>

                    		<div class="row rows">
                    			<form action="Php/typeagent.php" method="POST">
                    				
                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Identifiant</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="identifiant" name="identifiant" minlength="4" maxlength="8" title="Entrez un numéro non utilisé" required="true"  value="<?= $Id; ?>" readonly>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label for="colFormLabel" class="col-sm-4 col-form-label">Libellé</label>
                                       <div class="col-sm-8">
                                             <input type="text" class="form-control" id="colFormLabel" placeholder="nom du type d'agent" required="true" name="libtype" value="<?= $lib; ?>">
                                       </div>

                                      <div class="row rows">
                                          <div class="col-1"></div>
                                          <div class="col-5">
                                             <button type="submit" class="btn btn-info" name="btnedit1">Modifier</button>
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