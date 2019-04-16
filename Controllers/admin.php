<?php
require "reservations.php";
require "places.php";
require "files.php";
require "users.php";
// require "Modeles/fonctions.php";
// require "Modeles/admin.php";

if(isset($_POST['rechercheInsc'])){
  //var_dump($_POST['recherche']);
  $rechercheInsc = $user->getListInscritRecherche($_POST['recherche']);
}

if(isset($_POST['valider'])){
//var_dump($_POST['id_u']);
  $req = $user->valideInsc($_POST['id_u']);
}

if(isset($_POST['bannir'])){
//var_dump($_POST['id_u']);
  $req = $user->annuleInsc($_POST['id_u']);
}

if(isset($_POST['retirer'])){
//var_dump($_POST['id_u']);
  $req = $user->dropUser($_POST['id_u']);
}

if(isset($_POST['annuler'])){
//var_dump($_POST['id_u']);
//var_dump($_POST['id_r']);
  $req = $reservation->annuleReserv($_POST['id_u'], $_POST['id_r'], $_POST['date_d'] );
}

if(isset($_POST['setDateFin'])) {
  // var_dump($_POST['date_f']);
  // var_dump($_POST['new_date_f']);
  // var_dump($_POST['id_u']);
  $setDateFin = $reservation->setDateFin($_POST['date_f'], $_POST['new_date_f'], $_POST['id_u'], $_POST['id_p']);
  // var_dump($setDateFin);

  }

if(isset($_POST['supprimer'])){
//var_dump($_POST['id_u']);
  $req = $place->deletePlace($_POST['id_p']);
}

if(isset($_POST['ajouter'])){
  //var_dump($_POST['id_u']);
  $req = $place->addPlace($_POST['nom']);
}

require"Views/admin.php";

?>
