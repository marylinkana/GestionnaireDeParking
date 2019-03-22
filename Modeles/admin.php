<?php
    if(isset($_POST['valider'])){
    //var_dump($_POST['id_u']);
      $req = valideInsc($_POST['id_u']);

    }

    if(isset($_POST['annuler'])){
    //var_dump($_POST['id_u']);
      $req = annuleInsc($_POST['id_u']);

    }

    if(isset($_POST['ajouter'])){
    //var_dump($_POST['id_u']);
    global $bdd;

    $requete = $bdd->prepare("INSERT INTO places (nom) VALUES (:nom)");
    $requete->bindValue(":nom", $_POST['nom'],PDO::PARAM_STR);
    $requete->execute();

    }



?>
