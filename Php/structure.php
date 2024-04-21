<?php
session_start();
require_once("connexionbd.php");

	@$id = "";
    @$lib = "";
    @$str = "";
    $update = false;
 

//génération de l'identifiant
    $req = $bdd->query('SELECT * FROM structures ORDER BY Idstructure DESC LIMIT 1');
    $req->execute(array());
    $row = $req->fetch();
    $last_id = $row['Idstructure'];
        
        if ($last_id == "")
        {
            $id = "SEEPT01";
        }
        else
        {
            $id = substr($last_id, 6);
            $id = intval($id);
            $id = "SEEPT0" . ($id + 1);
        }

if(isset($_POST['btnregister'])){
    
    $is = htmlspecialchars(trim($_POST['identifiant']));
    $lis = htmlspecialchars(trim($_POST['libstructure']));

    $reponse = $bdd->prepare('SELECT * FROM structures WHERE Idstructure=? OR Libstructure=?' );
    $reponse->execute(array($is, $lis));
    $donnees = $reponse->rowCount();

    if($donnees==1){
      $error = "Informations déjà utilisées";
    }
    else{

      $req = $bdd->prepare('INSERT INTO structures(Idstructure, Libstructure) VALUES(:id, :lib)');
      $req->execute(array(
      'id' => $is,
      'lib' => $lis));

      $_SESSION['message'] = "Enregistrement effectuée!!!";
      $_SESSION['msg_type'] = "success";
   }
}


if(isset($_POST['btnregister1'])){

    $is = htmlspecialchars(trim($_POST['idmere']));
    $iss = htmlspecialchars(trim($_POST['idsous']));
    $lis = htmlspecialchars(trim($_POST['libsous']));

    $reponse = $bdd->prepare('SELECT * FROM structures WHERE Idstructure=? OR Libstructure=?' );
    $reponse->execute(array($iss, $lis));
    $donnees = $reponse->rowCount();

    if($donnees==1){
      $error = "Informations déjà utilisées";
    }
    else{

      $req = $bdd->prepare('INSERT INTO structures(Idstructure, Strid, Libstructure) VALUES(:ids, :id, :lib)');
      $req->execute(array(
      'ids' => $iss,
      'id' => $is,
      'lib' => $lis));

      $_SESSION['message'] = "Enregistrement effectuée!!!";
      $_SESSION['msg_type'] = "success";
   }
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $reponse = $bdd->prepare('DELETE FROM structures WHERE Idstructure=?' );
    $reponse->execute(array($id));
    $reponse = $bdd->prepare('DELETE FROM structures WHERE Strid=?' );
    $reponse->execute(array($id));

    header("Location: ../structure.php");
    $_SESSION['message'] = "Suppression effectuée!!!";
    $_SESSION['msg_type'] = "danger";
}


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $reponse = $bdd->prepare('SELECT * FROM structures WHERE Idstructure=?' );
    $reponse->execute(array($id));
    $row = $reponse->fetch();

    @$id = $row['Idstructure'];
    @$lib = $row['Libstructure'];
    @$str = $row['Strid'];
    $update = true;

    if (isset($_POST['btnedit'])) {
	    if ($str==NULL) {
		    $ids = $_POST['identifiant'];
		    $lib = $_POST['libstructure'];

		    $reponse = $bdd->prepare('UPDATE structures SET Idstructure=?, Libstructure=? WHERE Idstructure=?');
		    $reponse->execute(array($ids,$lib,@$id));

		    $_SESSION['message'] = "Mise à jour effectuée!!!";
		    $_SESSION['msg_type'] = "success";
		    header("Location:structure.php");
  		}

  		else{
	  		$ids = $_POST['idmere'];
		    $idss = $_POST['idsous'];
		    $lib = $_POST['libsous'];

			    $reponse = $bdd->prepare('UPDATE structures SET Idstructure=?, Libstructure=?, Strid=? WHERE Idstructure=?');
			    $reponse->execute(array($idss,$lib,$ids,@$id));

			    $_SESSION['message'] = "Mise à jour effectuée!!!";
			    $_SESSION['msg_type'] = "success";
			    header("Location:structure.php");
			
  		}
  	}
}

?>