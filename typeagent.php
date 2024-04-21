<?php
session_start();

require_once("Php/connexionbd.php");

$update = false;
$Id = "";
$lib = "";

//génération de l'identifiant
    $req = $bdd->query('SELECT * FROM typeagent ORDER BY Idtypeagent DESC LIMIT 1');
    $req->execute(array());
    $row = $req->fetch();
    $last_id = $row['Idtypeagent'];
        

    if ($last_id == "")
    {
        $Id = "TEEPT01";
    }
    else
    {
        $Id = substr($last_id, 6);
        $Id = intval($Id);
        $Id = "TEEPT0" . ($Id + 1);
    }
  
  //enregistrement dans la bdd
if(isset($_POST['btnregister'])){
    $id = htmlspecialchars($_POST['identifiant']);
    $lib = htmlspecialchars(trim($_POST['libtype']));

    //vérification de la duplication des valeurs
    $reponse = $bdd->prepare('SELECT * FROM typeagent WHERE Libtypeagent=?' );
    $reponse->execute(array($lib));
    $donnees = $reponse->rowCount();

    if($donnees==1){
      $error = "Informations déjà utilisées";
    }
    else{

      $req = $bdd->prepare('INSERT INTO typeagent(Idtypeagent, Libtypeagent) VALUES(:id, :lib)');
      $req->execute(array(
      'id' => $id,
      'lib' => $lib));
      $_SESSION['message'] = "Enregistrement effectué!!!";
      $_SESSION['msg_type'] = "success";
   
   }
    
}

  //suppression dans la bdd
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $reponse = $bdd->prepare('DELETE FROM typeagent WHERE Idtypeagent=?' );
    $reponse->execute(array($id));

    $_SESSION['message'] = "Suppression effectuée!!!";
    $_SESSION['msg_type'] = "danger";
    header("Location: type_agent.php");

}

    //modification dans la bdd
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $reponse = $bdd->prepare('SELECT * FROM typeagent WHERE Idtypeagent=?' );
    $reponse->execute(array($id));
    $row = $reponse->fetch();

    @$Id = $row['Idtypeagent'];
    @$lib = $row['Libtypeagent'];
    $update = true;

    if (isset($_POST['btnedit'])) {
      $ids = $_POST['identifiant'];
      $lib = $_POST['libtype'];

        $reponse = $bdd->prepare('UPDATE typeagent SET Idtypeagent=?, Libtypeagent=? WHERE Idtypeagent=?');
        $reponse->execute(array($ids,$lib,@$id));
        header("Location:type_agent.php");
         $_SESSION['message'] = "Modification effectuée!!!";
        $_SESSION['msg_type'] = "info";  
    }
}

?>