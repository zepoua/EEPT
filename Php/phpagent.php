<?php
require_once("connexionbd.php");


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





      $req = $bdd->query('SELECT * FROM agent');
      $req->execute(array());
      $row = $req->fetch();
      $lastid = $row['Numdecision'];
      $last_id = $row['Matricule'];
        
    //génération des Matricules
    if ($last_id == "")
    {
        $matricule = date("dmY")."EEPT01";
    }
    else
    {
        $matricule = substr($last_id, 11);
        $matricule = intval($matricule);
        $matricule = date("dmY")."EEPT0" . ($matricule + 1);
    }

    if ($lastid == "")
    {
        $Ids = "EEPT01";
    }
    else
    {
        $Ids = substr($lastid, 13);
        $Ids = intval($Ids);
        $Ids = "EEPT0" . ($Ids + 1);
    }


    //enregistrment dans la bdd
if(isset($_POST['btnregister'])){

    //récupération d'un checkbox 
   @$loisir = $_POST['loisir'];
   $lois = @implode("-", $loisir);

    //récupération de la photo 
   $photo = "";
   $img = "";
   $photo = $_FILES['img']['name'];
   $upload = "Média/pictures".$photo;
   move_uploaded_file($_FILES['img']['tmp_name'] ,$upload);

    //récupération des inputs 
    $matricule = $_POST['matricule'];  $nomagent = htmlspecialchars(trim($_POST['nomagent']));
    $prenomagent = htmlspecialchars(trim($_POST['prenomagent']));
    $datenais = htmlspecialchars(trim($_POST['datenais'])); $lieunais = htmlspecialchars(trim($_POST['lieunais']));
    $email = htmlspecialchars(trim($_POST['email'])); $numero = htmlspecialchars(trim($_POST['numero']));
    $langue = htmlspecialchars(trim($_POST['langue'])); $typag = htmlspecialchars(trim($_POST['typag']));
    $sexe = htmlspecialchars(trim($_POST['sexe'])); $situation = htmlspecialchars(trim($_POST['situation']));
    $sanguin = htmlspecialchars(trim($_POST['sanguin']));
    
    $religion = htmlspecialchars(trim($_POST['religion'])); $datebapt = htmlspecialchars(trim($_POST['datebapt']));
    $lieubapt = htmlspecialchars(trim($_POST['lieubapt'])); $nompastb = htmlspecialchars(trim($_POST['nompastb']));
    $dateconfirm = htmlspecialchars(trim($_POST['dateconfirm'])); 
    $lieuconfirm = htmlspecialchars(trim($_POST['lieuconfirm']));
    $nompastc = htmlspecialchars(trim($_POST['nompastc'])); $parramaine = htmlspecialchars(trim($_POST['parramaine']));
    
    $nation = htmlspecialchars(trim($_POST['nation'])); $ville = htmlspecialchars(trim($_POST['ville']));
    $quartier = htmlspecialchars(trim($_POST['quartier']));  $ethnie = htmlspecialchars(trim($_POST['ethnie']));
    $prefecture = htmlspecialchars(trim($_POST['prefecture']));  $village = htmlspecialchars(trim($_POST['village']));
    $numdecision = htmlspecialchars(trim($_POST['numdecision']));
    $datedecision = htmlspecialchars(trim($_POST['datedecision']));
    
    $datembauche = htmlspecialchars(trim($_POST['datembauche']));
    $dateretraite = htmlspecialchars(trim($_POST['dateretraite'])); $cnss = $_POST['cnss'];
    $allocation = $_POST['allocation']; $bp = $_POST['bp'];

    //vérification des duplications des valeurs
    $reponse = $bdd->prepare('SELECT * FROM agent WHERE Email=? OR Telephone=? OR NumCNSS=? OR Numallocation=? OR Bp=?' );
    $reponse->execute(array($email, $numero, $cnss, $allocation, $bp));
    $donnees = $reponse->rowCount();

    if($donnees>0){
      $error = "Informations déjà utilisées";
   }
	else{
		$req = $bdd->prepare('INSERT INTO agent( Matricule, Idtypeagent, Nomagent, Prenomagent, Sexeagent, Datenaissagent, Lieunaissagent, Sitmatagent, Nationagent, Ethnieagent, Villageagent, Prefectagent, Religionagent, Grpesanagent, Datembauche, Numdecision, Datedecision, NumCNSS, Numallocation, Langues, Loisirs, Dateretraite, Datebapteme,Pasteurbapteme, Lieubapteme, Dateconfirm, Pasteurconfirm, Lieuconfirm, Nomparrainage, Photoagent, Quartier, Bp, Ville, Telephone, Email)

	   VALUES(:matricule, :typag, :nomagent, :prenomagent, :sexe, :datenais, :lieunais,  :situation, :nation, :ethnie, :village, :prefecture, :religion, :sanguin, :datembauche, :numdecision, :datedecision, :cnss, :allocation, :langue, :loisir, :dateretraite, :datebapt, :nompastb, :lieubapt, :dateconfirm, :nompastc, :lieuconfirm, :parramaine, :photo, :quartier, :bp, :ville, :numero, :email)');
      
      $req->execute(array(
		'matricule' => $matricule,  'typag' => $typag, 'nomagent' => $nomagent, 'prenomagent' => $prenomagent,
		'sexe' => $sexe,  'datenais' => $datenais, 'lieunais' => $lieunais, 'situation' => $situation, 
        'nation' => $nation, 'ethnie' => $ethnie, 'village' => $village, 'prefecture' => $prefecture, 
        'religion' =>  $religion, 'sanguin' => $sanguin,'datembauche' => $datembauche, 'numdecision' => $numdecision,
		'datedecision' =>  $datedecision, 'cnss' => $cnss, 'allocation' => $allocation, 'langue' => $langue, 
        'loisir' => $lois, 'dateretraite' => $dateretraite, 'datebapt' => $datebapt, 'nompastb' => $nompastb, 
        'lieubapt' => $lieubapt, 'dateconfirm' => $dateconfirm, 'nompastc' => $nompastc, 'lieuconfirm' => $lieuconfirm,
        'parramaine' => $parramaine, 'photo' => $photo, 'quartier' => $quartier, 'bp' => $bp, 'ville' => $ville,
        'numero' => $numero, 'email' => $email));
			 

     $sujet = "Recrutement à EEPT";
     $message = "Bienvenu à l'EEPT. Votre numéro matricule est : ".$matricule;
     $headers = "From: todoalipuigil@gmail.com";
     mail($email,$sujet,$message,$headers);

        $_SESSION['message'] = "Enregistrement effectuée!!!";
        $_SESSION['msg_type'] = "success";
        header("Location: listeagent.php");
   	}
}

if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

    $reponse = $bdd->prepare('SELECT * FROM agent WHERE Matricule=?');
    $reponse->execute(array($id));
    $donnees=$reponse->fetch();

    $photo = $donnees['Photoagent'];

    //récupération des inputs 
    $matricule = $donnees['Matricule'];
    $nomagent = $donnees['Nomagent'];
    $prenomagent = $donnees['Prenomagent'];
    $datenais = $donnees['Datenaissagent']; $lieunais = $donnees['Lieunaissagent'];
    $email = $donnees['Email']; $numero = $donnees['Telephone'];
    $langue = $donnees['Langues']; $typag = $donnees['Idtypeagent'];
    $sexe = $donnees['Sexeagent']; $situation = $donnees['Sitmatagent'];
    $sanguin = $donnees['Grpesanagent'];
    
    $religion = $donnees['Religionagent']; $datebapt = $donnees['Datebapteme'];
    $lieubapt = $donnees['Lieubapteme']; $nompastb = $donnees['Pasteurbapteme'];
    $dateconfirm = $donnees['Dateconfirm']; 
    $lieuconfirm = $donnees['Lieuconfirm'];
    $nompastc = $donnees['Pasteurconfirm']; $parramaine = $donnees['Nomparrainage'];
    
    $nation = $donnees['Nationagent']; $ville = $donnees['Ville'];
    $quartier = $donnees['Quartier'];  $ethnie = $donnees['Ethnieagent'];
    $prefecture = $donnees['Prefectagent'];  $village = $donnees['Villageagent'];
    $Ids = $donnees['Numdecision'];
    $datedecision = $donnees['Datedecision'];
    
    $datembauche = $donnees['Datembauche'];
    $dateretraite = $donnees['Dateretraite']; $cnss = $donnees['NumCNSS'];
    $allocation = $donnees['Numallocation']; $bp = $donnees['Bp'];
        $update = true;
    }

   /* if (isset($_GET['btnedit'])) {
@$loisir = $_POST['loisir'];
   $lois = @implode("-", $loisir);

$matricule = $_POST['matricule'];  $nomagent = htmlspecialchars(trim($_POST['nomagent']));
    $prenomagent = htmlspecialchars(trim($_POST['prenomagent']));
    $datenais = htmlspecialchars(trim($_POST['datenais'])); $lieunais = htmlspecialchars(trim($_POST['lieunais']));
    $email = htmlspecialchars(trim($_POST['email'])); $numero = htmlspecialchars(trim($_POST['numero']));
    $langue = htmlspecialchars(trim($_POST['langue'])); $typag = htmlspecialchars(trim($_POST['typag']));
    $sexe = htmlspecialchars(trim($_POST['sexe'])); $situation = htmlspecialchars(trim($_POST['situation']));
    $sanguin = htmlspecialchars(trim($_POST['sanguin']));
    
    $religion = htmlspecialchars(trim($_POST['religion'])); $datebapt = htmlspecialchars(trim($_POST['datebapt']));
    $lieubapt = htmlspecialchars(trim($_POST['lieubapt'])); $nompastb = htmlspecialchars(trim($_POST['nompastb']));
    $dateconfirm = htmlspecialchars(trim($_POST['dateconfirm'])); 
    $lieuconfirm = htmlspecialchars(trim($_POST['lieuconfirm']));
    $nompastc = htmlspecialchars(trim($_POST['nompastc'])); $parramaine = htmlspecialchars(trim($_POST['parramaine']));
    
    $nation = htmlspecialchars(trim($_POST['nation'])); $ville = htmlspecialchars(trim($_POST['ville']));
    $quartier = htmlspecialchars(trim($_POST['quartier']));  $ethnie = htmlspecialchars(trim($_POST['ethnie']));
    $prefecture = htmlspecialchars(trim($_POST['prefecture']));  $village = htmlspecialchars(trim($_POST['village']));
    $numdecision = htmlspecialchars(trim($_POST['numdecision']));
    $datedecision = htmlspecialchars(trim($_POST['datedecision']));
    
    $datembauche = htmlspecialchars(trim($_POST['datembauche']));
    $dateretraite = htmlspecialchars(trim($_POST['dateretraite'])); $cnss = $_POST['cnss'];
    $allocation = $_POST['allocation']; $bp = $_POST['bp'];


  $oldimage=$_POST['oldimage'];


        if(isset($_FILES['im']['name'])&&($_FILES['img']['name']!="")){
            $newimage="upload/".$_FILES['image']['name'];
            unlink($oldimage);
            move_uploaded_file($_FILES['img']['tmp_name'], $newimage);
        }
        else{
            $newimage=$oldimage;
        }
    
$req = $bdd->prepare('UPDATE agent SET Matricule=?, Idtypeagent=?, Nomagent=?, Prenomagent=?, Sexeagent=?, Datenaissagent=?, Lieunaissagent=?, Sitmatagent=?, Nationagent=?, Ethnieagent=?, Villageagent=?, Prefectagent=?, Religionagent=?, Grpesanagent=?, Datembauche=?, Numdecision=?, Datedecision=?, NumCNSS=?, Numallocation=?, Langues=?, Loisirs=?, Dateretraite=?, Datebapteme=?,Pasteurbapteme=?, Lieubapteme=?, Dateconfirm=?, Pasteurconfirm=?, Lieuconfirm=?, Nomparrainage=?, Photoagent=?, Quartier=?, Bp=?, Ville=?, Telephone=?, Email=? WHERE Matricule=?');
      
      $req->execute(array(
      $matricule,$typag,$nomagent, $prenomagent,
       $sexe,  $datenais, $lieunais, $situation, 
        $nation, $ethnie, $village,$prefecture, 
        $religion, $sanguin,$datembauche,  $numdecision,
        $datedecision, $cnss,$allocation,  $langue, 
       $lois, $dateretraite, $datebapt, $nompastb, 
       $lieubapt, $dateconfirm, $nompastc, $lieuconfirm,
         $parramaine,  $photo,$quartier, $bp, $ville,
        $numero, $email,$matricule));


                $_SESSION['message'] = "Mise à jour effectuée!!!";
                $_SESSION['msg_type'] = "success";
                header("Location: listeagent.php");
            


    }*/





?>