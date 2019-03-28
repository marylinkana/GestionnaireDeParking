<?php
    if(isset($_POST['valider'])){
    //var_dump($_POST['id_u']);
      $req = valideInsc($_POST['id_u']);
    }

    if(isset($_POST['annuler'])){
    //var_dump($_POST['id_u']);
      $req = annuleInsc($_POST['id_u']);
    }

    if(isset($_POST['supprimer'])){
    //var_dump($_POST['id_u']);
      $req = deletePlace($_POST['id_p']);
    }

    if(isset($_POST['ajouter'])){
      //var_dump($_POST['id_u']);
      $req = addPlace($_POST['nom']);
    }




?>
