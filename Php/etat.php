<?php
session_start();
require_once("connexionbd.php");

	@$mat = "";
    @$ids = "";
    @$date = "";
    $update = false;


    //génération de l'identifiant
    $req = $bdd->query('SELECT * FROM etats');
    $req->execute(array());
    $row = $req->fetch();
    $last_id = $row['Idetat'];
        

    if ($last_id == "")
    {
        $Id = "EAEEPT01";
    }
    else
    {
        $Id = substr($last_id, 7);
        $Id = intval($Id);
        $Id = "EAEEPT0" . ($Id + 1);
    }

if(isset($_POST['btnregister'])){
    
    $id = htmlspecialchars($_POST['identifiant']);
    $lib = htmlspecialchars(trim($_POST['libetat']));

    $reponse = $bdd->prepare('SELECT * FROM etats WHERE Idetat=? OR Libetat=?' );
    $reponse->execute(array($id, $lib));
    $donnees = $reponse->rowCount();

    if($donnees==1){
      $error = "Informations déjà utilisées";
    }
    else{

      $req = $bdd->prepare('INSERT INTO etats(Idetat, Libetat) VALUES(:id, :lib)');
      $req->execute(array(
      'id' => $id,
      'lib' => $lib));

      $_SESSION['message'] = "Enregistrement effectuée!!!";
    $_SESSION['msg_type'] = "success";
    header("Location: ../etat.php");
   }
}


if(isset($_POST['btnregister1'])){

    $nomagent = htmlspecialchars(trim($_POST['nomagent']));
    $etat = htmlspecialchars(trim($_POST['etat']));
    $datetat = htmlspecialchars(trim($_POST['datetat']));

      $req = $bdd->prepare('INSERT INTO agentetat(Idetat, Matricule, Datetat) VALUES(:id, :mat, :datetat)');
      $req->execute(array(
      'id' => $etat,
      'mat' => $nomagent,
      'datetat' => $datetat));

      $_SESSION['message'] = "Enregistrement effectuée!!!";
    $_SESSION['msg_type'] = "success";
    header("Location: ../etat.php");    
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $reponse = $bdd->prepare('DELETE FROM agentetat WHERE Idetat=?' );
    $reponse->execute(array($id));

    header("Location: ../etat.php");
    $_SESSION['message'] = "Suppression effectuée!!!";
    $_SESSION['msg_type'] = "danger";
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $reponse = $bdd->prepare('SELECT * FROM agentetat WHERE Idetat=?' );
    $reponse->execute(array($id));
    $row = $reponse->fetch();

    @$mat = $row['Matricule'];
    @$ids = $row['Idetat'];
    @$date = $row['Datetat'];
    $update = true;
}
    if (isset($_POST['btnedit'])) {
      $mat = $_POST['nomagent'];
      $ids = $_POST['etat'];
      $date = $_POST['datetat'];
      
    $reponse = $bdd->prepare('UPDATE agentetat SET  Matricule=?, Idetat=?, Datetat=? WHERE Idetat=?');
    $reponse->execute(array($mat,$ids,$date,$ids));
    header("Location: ../etat.php");
    $_SESSION['message'] = "Mise à jour effectuée!!!";
    $_SESSION['msg_type'] = "success";

    
  }

  if (isset($_POST['btnedit1'])) {
      $mat = $_POST['nomagent'];
      $ids = $_POST['etat'];
      $date = $_POST['datetat'];
      
    $reponse = $bdd->prepare('UPDATE agentetat SET  Matricule=?, Idetat=?, Datetat=? WHERE Idetat=?');
    $reponse->execute(array($mat,$ids,$date,$ids));
    header("Location: ../etatass.php");
    $_SESSION['message'] = "Mise à jour effectuée!!!";
    $_SESSION['msg_type'] = "success";

    
  }
?>