<?php
require_once("connexionbd.php");

    @$Id = "";
    @$num = "";
    @$lib = "";
    @$app = "";
    $update1 = false;


//génération de l'identifiant
    $req = $bdd->query('SELECT * FROM competences ORDER BY Idcompetence DESC LIMIT 1');
    $req->execute(array());
    $row = $req->fetch();
    @$last_id = $row['Idcompetence'];
        

    if ($last_id == "")
    {
        $Id = "CEEPT01";
    }
    else
    {
        $Id = substr(@$last_id, 6);
        $Id = intval($Id);
        $Id = "CEEPT0" . ($Id + 1);
    }

	//enregistrement
if(isset($_POST['btnregister1'])){

	//récupération des inputs
    $nomagent = htmlspecialchars(trim($_POST['nomagent']));
    $idcomp = $_POST['idcomp'];
    $libcomp = htmlspecialchars(trim($_POST['libcomp']));
    $appreciation = htmlspecialchars(trim($_POST['appreciation']));


    $reponse = $bdd->prepare('SELECT agentcompetence.Matricule, agentcompetence.Idcompetence, competences.Libcompetence FROM (agentcompetence  INNER JOIN competences ON  agentcompetence.Idcompetence = competences.Idcompetence) WHERE agentcompetence.Matricule=? AND competences.Libcompetence=?' );
    $reponse->execute(array($nomagent,$libcomp));
    $donnees = $reponse->rowCount();

    if($donnees==1){
      $_SESSION['message'] = "Informations déjà utilisées!!!";
      $_SESSION['msg_type'] = "danger";
    }
    else{

	//insertion dans la bdd
      $req = $bdd->prepare('INSERT INTO competences(Idcompetence, Libcompetence) VALUES(:id, :lib)');
      $req->execute(array(
      'id' => $idcomp,
      'lib' => $libcomp));

       $req = $bdd->prepare('INSERT INTO agentcompetence(Idcompetence, Matricule, Appreciation) VALUES(:id, :lib, :app)');
      $req->execute(array(
      'id' => $idcomp,
      'lib' => $nomagent,
      'app' => $appreciation));
      $_SESSION['message'] = "Enregistrement effectuée!!!";
      $_SESSION['msg_type'] = "success";
    }
}

	//suppression
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $reponse = $bdd->prepare('DELETE FROM agentcompetence WHERE Idcompetence=?');
    $reponse->execute(array($id));
    $reponse = $bdd->prepare('DELETE FROM competences WHERE Idcompetence=?');
    $reponse->execute(array($id));
    $_SESSION['message'] = "Suppression effectuée!!!";
    $_SESSION['msg_type'] = "danger";
    header("Location: ../agents.php");
}

	//modification
if (isset($_GET['edit1'])) {
    $id = $_GET['edit1'];

    $reponse = $bdd->prepare('SELECT agentcompetence.Idcompetence, competences.Libcompetence FROM (agentcompetence
    INNER JOIN competences ON agentcompetence.Idcompetence = competences.Idcompetence) WHERE agentcompetence.Idcompetence=?');
    $reponse->execute(array($id));
    $row = $reponse->fetch();

    @$Id = $row['Idcompetence'];
    @$num = $row['Matricule'];
    @$lib = $row['Libcompetence'];
    @$app = $row['Appreciation'];
    $update1 = true;
}
    
if (isset($_POST['btnedit1'])) {
    $nomagent = htmlspecialchars(trim($_POST['nomagent']));
    $idcomp = htmlspecialchars(trim($_POST['idcomp']));
    $libcomp = htmlspecialchars(trim($_POST['libcomp']));
    $appreciation = htmlspecialchars(trim($_POST['appreciation']));

    $reponse = $bdd->prepare('SELECT agentcompetence.Matricule, agentcompetence.Idcompetence, competences.Libcompetence FROM (agentcompetence  INNER JOIN competences ON  agentcompetence.Idcompetence = competences.Idcompetence) WHERE agentcompetence.Matricule=? AND competences.Libcompetence=? AND agentcompetence.Appreciation=?' );
    $reponse->execute(array($nomagent,$libcomp,$appreciation));
    $donnees = $reponse->rowCount();

    if($donnees==1){
      $_SESSION['message'] = "Informations déjà utilisées!!!";
      $_SESSION['msg_type'] = "danger";
    }
    else{


    $reponse = $bdd->prepare('UPDATE agentcompetence SET  Matricule=?, Idcompetence=?, Appreciation=? WHERE Idcompetence=?');
    $reponse->execute(array($nomagent,$idcomp,$appreciation,$id));

    $reponse = $bdd->prepare('UPDATE competences SET Idcompetence=?, Libcompetence=? WHERE Idcompetence=?');
    $reponse->execute(array($idcomp,$libcomp,$id));

    $_SESSION['message'] = "Mise à jour effectuée!!!";
    $_SESSION['msg_type'] = "success";  
  }

}

?>