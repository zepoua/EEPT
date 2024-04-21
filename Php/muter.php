<?php

    session_start();
    require_once("connexionbd.php");

    	@$mat = "";
        @$ids = "";
        @$num = "";
        @$date = "";
        @$dates = "";
        $update = false;


        //génération de l'identifiant
        $req = $bdd->query('SELECT * FROM muter ORDER BY Numdecision DESC LIMIT 1');
        $req->execute(array());
        $row = $req->fetch();
        $last_id = $row['Numdecision'];
            

        if ($last_id == "")
        {
            $num = "MEEPT01";
        }
        else
        {
            $num = substr($last_id, 6);
            $num = intval($num);
            $num = "MEEPT0" . ($num + 1);
        }

    if(isset($_POST['btnregister'])){

        $nomagent = htmlspecialchars(trim($_POST['nomagent']));
        $structure = htmlspecialchars(trim($_POST['structure']));
        $numdecision = htmlspecialchars(trim($_POST['numdecision']));
        $datedecision = htmlspecialchars(trim($_POST['datedecision']));
        $dateservice = htmlspecialchars(trim($_POST['dateservice']));

        $reponse = $bdd->prepare('SELECT * FROM muter WHERE Numdecision=?' );
        $reponse->execute(array($numdecision));
        $donnees = $reponse->rowCount();

          $req = $bdd->prepare('INSERT INTO muter(Matricule, Idstructure, Numdecision, Datemutation, Dateservice) VALUES(:mat, :id, :num, :datedec, :dateserv)');
          $req->execute(array(
          'mat' => $nomagent,
          'id' => $structure,
          'num' => $numdecision,
          'datedec' => $datedecision,
          'dateserv' => $dateservice));

          $reponse = $bdd->prepare('SELECT agent.Nomagent, structures.Libstructure, muter.Numdecision, muter.Datemutation, muter.Dateservice  FROM ((muter
        INNER JOIN agent ON  muter.Matricule = agent.Matricule)
        INNER JOIN structures ON muter.Idstructure = structures.Idstructure) WHERE muter.Numdecision=?'); 
        $reponse->execute(array($numdecision));
        $row = $reponse->fetch();

        $lib = $row['Libstructure'];

        $destinataire =" danielatchade09@gmail.com";
         $sujet = "Mutation dans une structure";
         $message = "Chèr(e) agent de l'EEPT vous venez d'être muter à : ".$lib.". Vous commencez le service le: ".$dateservice;
         $headers = "From: todoalipuigil@gmail.com";
         mail($destinataire,$sujet,$message,$headers);

        $_SESSION['message'] = "Enregistrement effectuée!!!";
        $_SESSION['msg_type'] = "success";
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $reponse = $bdd->prepare('DELETE FROM muter WHERE Numdecision=?' );
        $reponse->execute(array($id));

        $_SESSION['message'] = "Suppression effectuée!!!";
        $_SESSION['msg_type'] = "danger";
        header("location:../muter.php");
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $reponse = $bdd->prepare('SELECT agent.Nomagent, structures.Libstructure, muter.Numdecision, muter.Datemutation, muter.Dateservice  FROM ((muter
        INNER JOIN agent ON  muter.Matricule = agent.Matricule)
        INNER JOIN structures ON muter.Idstructure = structures.Idstructure) WHERE muter.Numdecision=?'); 
        $reponse->execute(array($id));
        $row = $reponse->fetch();

        @$mat = $row['Nomagent'];
        @$ids = $row['Libstructure'];
        @$num = $row['Numdecision'];
        @$date = $row['Datemutation'];
        @$dates = $row['Dateservice'];
        $update = true;
    }
        if (isset($_POST['btnedit'])) {
          $mat = $_POST['nomagent'];
          $ids = $_POST['structure'];
          $num = $_POST['numdecision'];
          $date = $_POST['datedecision'];
          $dates = $_POST['dateservice'];

        $reponse = $bdd->prepare('UPDATE muter SET  Matricule=?, Idstructure=?, Numdecision=?, Datemutation=?, Dateservice=? WHERE Numdecision=?');
        $reponse->execute(array($mat,$ids,$num,$date,$dates,$num));

        $reponse = $bdd->prepare('SELECT agent.Nomagent, structures.Libstructure, muter.Numdecision, muter.Datemutation, muter.Dateservice  FROM ((muter
        INNER JOIN agent ON  muter.Matricule = agent.Matricule)
        INNER JOIN structures ON muter.Idstructure = structures.Idstructure) WHERE muter.Numdecision=?'); 
        $reponse->execute(array($num));
        $row = $reponse->fetch();

        $lib = $row['Libstructure'];

        $destinataire =" danielatchade09@gmail.com";
         $sujet = "Mutation dans une structure";
         $message = "Chèr(e) agent de l'EEPT vous venez d'être rémuter à : ".$lib.". Vous commencez le service le: ".$dates;
         $headers = "From: todoalipuigil@gmail.com";
         mail($destinataire,$sujet,$message,$headers);

        $_SESSION['message'] = "Mise à jour effectuée!!!";
        $_SESSION['msg_type'] = "success";
        
      }

?>

<?php

   
    if(isset($_POST['btnregister1'])){

        $nomagent = htmlspecialchars(trim($_POST['nomagent']));
        $structure = htmlspecialchars(trim($_POST['structure']));
        $numdecision = htmlspecialchars(trim($_POST['numdecision']));
        $datedecision = htmlspecialchars(trim($_POST['datedecision']));
        $dateservice = htmlspecialchars(trim($_POST['dateservice']));

        $reponse = $bdd->prepare('SELECT * FROM muter WHERE Numdecision=?' );
        $reponse->execute(array($numdecision));
        $donnees = $reponse->rowCount();

          $req = $bdd->prepare('INSERT INTO muter(Matricule, Idstructure, Numdecision, Datemutation, Dateservice) VALUES(:mat, :id, :num, :datedec, :dateserv)');
          $req->execute(array(
          'mat' => $nomagent,
          'id' => $structure,
          'num' => $numdecision,
          'datedec' => $datedecision,
          'dateserv' => $dateservice));

          $reponse = $bdd->prepare('SELECT agent.Nomagent, structures.Libstructure, muter.Numdecision, muter.Datemutation, muter.Dateservice  FROM ((muter
        INNER JOIN agent ON  muter.Matricule = agent.Matricule)
        INNER JOIN structures ON muter.Idstructure = structures.Idstructure) WHERE muter.Numdecision=?'); 
        $reponse->execute(array($numdecision));
        $row = $reponse->fetch();

        $lib = $row['Libstructure'];

        $destinataire =" danielatchade09@gmail.com";
         $sujet = "Mutation dans une structure";
         $message = "Chèr(e) agent de l'EEPT vous venez d'être muter à : ".$lib.". Vous commencez le service le: ".$dateservice;
         $headers = "From: todoalipuigil@gmail.com";
         mail($destinataire,$sujet,$message,$headers);

        $_SESSION['message'] = "Enregistrement effectuée!!!";
        $_SESSION['msg_type'] = "success";
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $reponse = $bdd->prepare('DELETE FROM muter WHERE Numdecision=?' );
        $reponse->execute(array($id));

        $_SESSION['message'] = "Suppression effectuée!!!";
        $_SESSION['msg_type'] = "danger";
        header("location:../muterass.php");
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $reponse = $bdd->prepare('SELECT agent.Nomagent, structures.Libstructure, muter.Numdecision, muter.Datemutation, muter.Dateservice  FROM ((muter
        INNER JOIN agent ON  muter.Matricule = agent.Matricule)
        INNER JOIN structures ON muter.Idstructure = structures.Idstructure) WHERE muter.Numdecision=?'); 
        $reponse->execute(array($id));
        $row = $reponse->fetch();

        @$mat = $row['Nomagent'];
        @$ids = $row['Libstructure'];
        @$num = $row['Numdecision'];
        @$date = $row['Datemutation'];
        @$dates = $row['Dateservice'];
        $update = true;
    }
        if (isset($_POST['btnedit1'])) {
          $mat = $_POST['nomagent'];
          $ids = $_POST['structure'];
          $num = $_POST['numdecision'];
          $date = $_POST['datedecision'];
          $dates = $_POST['dateservice'];

        $reponse = $bdd->prepare('UPDATE muter SET  Matricule=?, Idstructure=?, Numdecision=?, Datemutation=?, Dateservice=? WHERE Numdecision=?');
        $reponse->execute(array($mat,$ids,$num,$date,$dates,$num));

        $reponse = $bdd->prepare('SELECT agent.Nomagent, structures.Libstructure, muter.Numdecision, muter.Datemutation, muter.Dateservice  FROM ((muter
        INNER JOIN agent ON  muter.Matricule = agent.Matricule)
        INNER JOIN structures ON muter.Idstructure = structures.Idstructure) WHERE muter.Numdecision=?'); 
        $reponse->execute(array($num));
        $row = $reponse->fetch();

        $lib = $row['Libstructure'];

        $destinataire =" danielatchade09@gmail.com";
         $sujet = "Mutation dans une structure";
         $message = "Chèr(e) agent de l'EEPT vous venez d'être rémuter à : ".$lib.". Vous commencez le service le: ".$dates;
         $headers = "From: todoalipuigil@gmail.com";
         mail($destinataire,$sujet,$message,$headers);

        $_SESSION['message'] = "Mise à jour effectuée!!!";
        $_SESSION['msg_type'] = "success";
        
      }

?>