<?php
session_start();
require_once("connexionbd.php");

$update = false;
$Id = "";
$lib = "";


//génération de l'identifiant
    $req = $bdd->query('SELECT * FROM fonctions ORDER BY Idfonction DESC LIMIT 1');
    $req->execute(array());
    $row = $req->fetch();
    $last_id = $row['Idfonction'];
        

    if ($last_id == "")
    {
        $Id = "FEEPT01";
    }
    else
    {
        $Id = substr($last_id, 6);
        $Id = intval($Id);
        $Id = "FEEPT0" . ($Id + 1);
    }

if(isset($_POST['btnregister'])){

    $id = htmlspecialchars($_POST['identifiant']);
    $lib = htmlspecialchars(trim($_POST['libfonction']));

    $reponse = $bdd->prepare('SELECT * FROM fonctions WHERE Idfonction=? AND Libfonction=?' );
    $reponse->execute(array($id, $lib));
    $donnees = $reponse->rowCount();

    if($donnees==1){
    header("Location: ../fonction.php");
    $_SESSION['message'] = "Suppression effectuée!!!";
    $_SESSION['msg_type'] = "danger";    }
    else{

      $req = $bdd->prepare('INSERT INTO fonctions(Idfonction, Libfonction) VALUES(:id, :lib)');
      $req->execute(array(
      'id' => $id,
      'lib' => $lib));
   	  
   	  $_SESSION['message'] = "Enregistrement effectué!!!";
      $_SESSION['msg_type'] = "success";
          header("Location: ../fonction.php");

   }
}

 if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $reponse = $bdd->prepare('DELETE FROM fonctions WHERE Idfonction=?' );
    $reponse->execute(array($id));

    header("Location: ../fonction.php");
    $_SESSION['message'] = "Suppression effectuée!!!";
    $_SESSION['msg_type'] = "danger";
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $reponse = $bdd->prepare('SELECT * FROM fonctions WHERE Idfonction=?' );
    $reponse->execute(array($id));
    $row = $reponse->fetch();

    @$Id = $row['Idfonction'];
    @$lib = $row['Libfonction'];
    $update = true;
}
    if (isset($_POST['btnedit'])) {
      $ids = $_POST['identifiant'];
      $lib = $_POST['libfonction'];

    $reponse = $bdd->prepare('UPDATE fonctions SET Idfonction=?, Libfonction=? WHERE Idfonction=?');
    $reponse->execute(array($ids,$lib,$ids));

    $_SESSION['message'] = "Mise à jour effectuée!!!";
    $_SESSION['msg_type'] = "success";
    header("Location: ../fonction.php");
    
  
}

?>