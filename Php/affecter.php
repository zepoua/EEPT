<?php

    session_start();
    require_once("connexionbd.php");

    $update = false;
    $mat = "";
    $Id = "";
    $num = "";
    $date = "";

    //génération de l'identifiant
        $req = $bdd->query('SELECT * FROM affecter ORDER BY Numdecision DESC LIMIT 1');
        $req->execute(array());
        $row = $req->fetch();
        @$last_id = $row['Numdecision'];
            

        if ($last_id == "")
        {
            $num = "AEEPT01";
        }
        else
        {
            $num = substr($last_id, 6);
            $num = intval($num);
            $num = "AEEPT0" . ($num + 1);
        }

    if(isset($_POST['btnregister'])){

        $nomagent = htmlspecialchars(trim($_POST['nomagent']));
        $fonction = htmlspecialchars(trim($_POST['fonction']));
        $numdecision = htmlspecialchars(trim($_POST['numdecision']));
        $datedecision = htmlspecialchars(trim($_POST['datedecision']));

        $reponse = $bdd->prepare('SELECT * FROM affecter WHERE Numdecision=?' );
        $reponse->execute(array($numdecision));
        $donnees = $reponse->rowCount();

          $req = $bdd->prepare('INSERT INTO affecter(Idfonction, Matricule, Numdecision, Dateaffectation) VALUES(:id, :mat, :num, :datedec)');
          $req->execute(array(
          'id' => $fonction,
          'mat' => $nomagent,
          'num' => $numdecision,
          'datedec' => $datedecision));

          $reponse = $bdd->prepare('SELECT agent.Nomagent, fonctions.Libfonction, affecter.Numdecision, affecter.Dateaffectation, affecter.Idfonction FROM ((affecter
        INNER JOIN agent ON  affecter.Matricule = agent.Matricule)
        INNER JOIN fonctions ON affecter.Idfonction = fonctions.Idfonction) WHERE affecter.Numdecision=?'); 
        $reponse->execute(array($numdecision));
        $row = $reponse->fetch();
        $lib = $row['Libfonction'];

        $destinataire =" danielatchade09@gmail.com";
         $sujet = "Affectation à un poste";
         $message = "Chèr(e) agent de l'EEPT vous venez d'être affecter au Poste de : ".$lib;
         $headers = "From: todoalipuigil@gmail.com";
         mail($destinataire,$sujet,$message,$headers);

        $_SESSION['message'] = "Enregistrement effectuée!!!";
        $_SESSION['msg_type'] = "success";
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $reponse = $bdd->prepare('DELETE FROM affecter WHERE Numdecision=?' );
        $reponse->execute(array($id));

        header("Location: ../affecter.php");
        $_SESSION['message'] = "Suppression effectuée!!!";
        $_SESSION['msg_type'] = "danger";
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $reponse = $bdd->prepare('SELECT agent.Nomagent, fonctions.Libfonction, affecter.Numdecision, affecter.Dateaffectation, affecter.Idfonction FROM ((affecter
        INNER JOIN agent ON  affecter.Matricule = agent.Matricule)
        INNER JOIN fonctions ON affecter.Idfonction = fonctions.Idfonction) WHERE affecter.Numdecision=?'); 
        $reponse->execute(array($id));
        $row = $reponse->fetch();

        @$mat = $row['Nomagent'];
        @$Id = $row['Idfonction'];
        @$num = $row['Numdecision'];
        @$date = $row['Dateaffectation'];
        $update = true;
    }
        if (isset($_POST['btnedit'])) {
          $mat = $_POST['nomagent'];
          $idf = $_POST['fonction'];
          $num = $_POST['numdecision'];
          $date = $_POST['datedecision'];


        $reponse = $bdd->prepare('UPDATE affecter SET Idfonction=?, Matricule=?, Numdecision=?, Dateaffectation=? WHERE Numdecision=?');
        $reponse->execute(array($idf,$mat,$num,$date,$num));


        $reponse = $bdd->prepare('SELECT agent.Nomagent, fonctions.Libfonction, affecter.Numdecision, affecter.Dateaffectation, affecter.Idfonction FROM ((affecter
        INNER JOIN agent ON  affecter.Matricule = agent.Matricule)
        INNER JOIN fonctions ON affecter.Idfonction = fonctions.Idfonction) WHERE affecter.Numdecision=?'); 
        $reponse->execute(array($num));
        $row = $reponse->fetch();
        $lib = $row['Libfonction'];

        $destinataire =" danielatchade09@gmail.com";
         $sujet = "Affectation à un poste";
         $message = "Chèr(e) agent de l'EEPT vous venez d'être réaffecter au Poste de : ".$lib;
         $headers = "From: todoalipuigil@gmail.com";
         mail($destinataire,$sujet,$message,$headers);

        $_SESSION['message'] = "Mise à jour effectuée!!!";
        $_SESSION['msg_type'] = "success";
        
      }

?>

<?php

    require_once("connexionbd.php");

    $update = false;
    $mat = "";
    $Id = "";
    $num = "";
    $date = "";

    //génération de l'identifiant
        $req = $bdd->query('SELECT * FROM affecter ORDER BY Numdecision DESC LIMIT 1');
        $req->execute(array());
        $row = $req->fetch();
        @$last_id = $row['Numdecision'];
            

        if ($last_id == "")
        {
            $num = "AEEPT01";
        }
        else
        {
            $num = substr($last_id, 6);
            $num = intval($num);
            $num = "AEEPT0" . ($num + 1);
        }

    if(isset($_POST['btnregister1'])){

        $nomagent = htmlspecialchars(trim($_POST['nomagent']));
        $fonction = htmlspecialchars(trim($_POST['fonction']));
        $numdecision = htmlspecialchars(trim($_POST['numdecision']));
        $datedecision = htmlspecialchars(trim($_POST['datedecision']));

        $reponse = $bdd->prepare('SELECT * FROM affecter WHERE Numdecision=?' );
        $reponse->execute(array($numdecision));
        $donnees = $reponse->rowCount();

          $req = $bdd->prepare('INSERT INTO affecter(Idfonction, Matricule, Numdecision, Dateaffectation) VALUES(:id, :mat, :num, :datedec)');
          $req->execute(array(
          'id' => $fonction,
          'mat' => $nomagent,
          'num' => $numdecision,
          'datedec' => $datedecision));

          $reponse = $bdd->prepare('SELECT agent.Nomagent, fonctions.Libfonction, affecter.Numdecision, affecter.Dateaffectation, affecter.Idfonction FROM ((affecter
        INNER JOIN agent ON  affecter.Matricule = agent.Matricule)
        INNER JOIN fonctions ON affecter.Idfonction = fonctions.Idfonction) WHERE affecter.Numdecision=?'); 
        $reponse->execute(array($numdecision));
        $row = $reponse->fetch();
        $lib = $row['Libfonction'];

        $destinataire =" danielatchade09@gmail.com";
         $sujet = "Affectation à un poste";
         $message = "Chèr(e) agent de l'EEPT vous venez d'être affecter au Poste de : ".$lib;
         $headers = "From: todoalipuigil@gmail.com";
         mail($destinataire,$sujet,$message,$headers);

        $_SESSION['message'] = "Enregistrement effectuée!!!";
        $_SESSION['msg_type'] = "success";
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $reponse = $bdd->prepare('DELETE FROM affecter WHERE Numdecision=?' );
        $reponse->execute(array($id));

        header("Location: ../affecterass.php");
        $_SESSION['message'] = "Suppression effectuée!!!";
        $_SESSION['msg_type'] = "danger";
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $reponse = $bdd->prepare('SELECT agent.Nomagent, fonctions.Libfonction, affecter.Numdecision, affecter.Dateaffectation, affecter.Idfonction FROM ((affecter
        INNER JOIN agent ON  affecter.Matricule = agent.Matricule)
        INNER JOIN fonctions ON affecter.Idfonction = fonctions.Idfonction) WHERE affecter.Numdecision=?'); 
        $reponse->execute(array($id));
        $row = $reponse->fetch();

        @$mat = $row['Nomagent'];
        @$Id = $row['Idfonction'];
        @$num = $row['Numdecision'];
        @$date = $row['Dateaffectation'];
        $update = true;
    }
        if (isset($_POST['btnedit1'])) {
          $mat = $_POST['nomagent'];
          $idf = $_POST['fonction'];
          $num = $_POST['numdecision'];
          $date = $_POST['datedecision'];


        $reponse = $bdd->prepare('UPDATE affecter SET Idfonction=?, Matricule=?, Numdecision=?, Dateaffectation=? WHERE Numdecision=?');
        $reponse->execute(array($idf,$mat,$num,$date,$num));


        $reponse = $bdd->prepare('SELECT agent.Nomagent, fonctions.Libfonction, affecter.Numdecision, affecter.Dateaffectation, affecter.Idfonction FROM ((affecter
        INNER JOIN agent ON  affecter.Matricule = agent.Matricule)
        INNER JOIN fonctions ON affecter.Idfonction = fonctions.Idfonction) WHERE affecter.Numdecision=?'); 
        $reponse->execute(array($num));
        $row = $reponse->fetch();
        $lib = $row['Libfonction'];

        $destinataire =" danielatchade09@gmail.com";
         $sujet = "Affectation à un poste";
         $message = "Chèr(e) agent de l'EEPT vous venez d'être réaffecter au Poste de : ".$lib;
         $headers = "From: todoalipuigil@gmail.com";
         mail($destinataire,$sujet,$message,$headers);

        $_SESSION['message'] = "Mise à jour effectuée!!!";
        $_SESSION['msg_type'] = "success";
        
      }

?>

