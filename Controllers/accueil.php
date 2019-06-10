<?php
require "reservations.php";
require "places.php";
require "files.php";
require "users.php";

// var_dump($place->getListPlacesDispo()->fetch());
 if($newFreePlace = $place->getListPlacesDispo()->fetch()){
    $fileHead = $file->getFileHead()->fetch();
//    var_dump($fileHead);
//    $reservation->createReserv($newFreePlace['id_p'], $fileHead['id_u']);
    $user->resetRang($fileHead['id_u']);
    $user->changeRang();
 }

if(isset($_POST['reserver'])){
//var_dump($_POST['id_u']);
  $req = $reservation->createReserv($_POST['id_p'], $_SESSION['id_u']);
}

if(isset($_POST['ecourter'])){
  var_dump($_POST['id_r']);
  $ecourter = $reservation->ecourterMyReserv($_POST['id_r']);
}

if(isset($_POST['attendre'])){
//var_dump($_POST['id_u']);
$req = $file->insertIntoFile($_SESSION['id_u']);
}

require"Views/accueil.php";

?>
