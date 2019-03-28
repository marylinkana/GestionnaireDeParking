<?php
    if(isset($_POST['reserver'])){
    //var_dump($_POST['id_u']);
      $req = reserver($_POST['id_p'], $_SESSION['id_u']);
    }

    if(isset($_POST['annule'])){
    //var_dump($_POST['id_u']);
      $req = annuleInsc($_POST['id_u']);
    }

    if(isset($_POST['attendre'])){
    //var_dump($_POST['id_u']);
    $req = insertIntoWettingList($_SESSION['id_u']);
    }
?>
