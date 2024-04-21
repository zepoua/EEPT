<?php
require_once("connexionbd.php");
session_start();
$photo = "";

    //récupération des inputs 
    $nomagent = "";
  $prenomagent = "";
    $datenais = ""; $lieunais = "";
    $email = ""; $numero = "";
   $langue = ""; $typag = "";
    $sexe = ""; $situation = "";
   $sanguin = "";
    
    $religion = ""; $datebapt = "";
   $lieubapt = ""; $nompastb = "";
   $dateconfirm = "";
    $lieuconfirm = "";    $nompastc = ""; $parramaine = "";
    $nation = ""; $ville = "";
    $quartier = "";  $ethnie = "";
   $prefecture = "";  $village = "";

   $datedecision = "";
    
    $datembauche = "";
    $dateretraite = "" ;$cnss = "";
    $allocation = ""; $bp = "";
        $update = false;


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $reponse = $bdd->prepare('DELETE FROM agent WHERE Matricule=?' );
    $reponse->execute(array($id));

    header("Location: ../listeagent.php");
    $_SESSION['message'] = "Suppression effectuée!!!";
    $_SESSION['msg_type'] = "danger";
}

if (isset($_GET['details'])) {
    $id = $_GET['details'];
    $reponse = $bdd->prepare('SELECT * FROM agent WHERE Matricule=?');
    $reponse->execute(array($id));
    $donnees=$reponse->fetch();

}






?> 