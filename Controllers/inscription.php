<?php
require "reservations.php";
require "places.php";
require "files.php";
require "users.php";
// require "Modeles/fonctions.php";
// require "Modeles/admin.php";

if(isset($_POST['rechercheInsc'])){
  //var_dump($_POST['recherche']);
  $rechercheInsc = $user->getListInscritRecherche($_POST['recherche_insc']);
}

if(isset($_POST['rechercheUser'])){
  //var_dump($_POST['recherche']);
  $rechercheUser = $user->getListUserRecherche($_POST['recherche_user']);
}

if(isset($_POST['rechercheResv'])){
  //var_dump($_POST['recherche']);
  $rechercheResv = $reservation->getListResvRecherche($_POST['recherche_resv']);
}

if(isset($_POST['recherchePlace'])){
  //var_dump($_POST['recherche']);
  $recherchePlace = $place->getListPlaceRecherche($_POST['recherche_place']);
}

if(isset($_POST['encours'])){
  //var_dump($_POST['encours']);
  $currentResv = $reservation->getCurrentReserv();
}

if(isset($_POST['terminee'])){
  //var_dump($_POST['recherche']);
  $endResv = $reservation->getEndReserv();
}

if(isset($_POST['ecourter'])){
  var_dump($_POST['id_r']);
  $ecourter = $reservation->ecourterReserv($_POST['id_r']);
}


if(isset($_POST['addUser'])){
  //var_dump($_POST);
  $addUser = $user->addUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp']);
}

if(isset($_POST['reset'])){
  // var_dump($_POST['email']);
  $req = $user->setPassword($_POST['email']);
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

if(isset($_POST['attribuer'])){
  // var_dump($_POST['id_p']);
  // var_dump($_POST['id_u']);
  $req = $reservation->attribiuteReserv($_POST['id_p'], $_POST['id_u']);
}

if(isset($_POST['annuler'])){
//var_dump($_POST['id_u']);
//var_dump($_POST['id_r']);
  $req = $reservation->annuleReserv($_POST['id_u'], $_POST['id_r'], $_POST['date_d'] );
}

if(isset($_POST['setDateFin'])) {
  // var_dump($_POST['date_f']);
  // var_dump($_POST['new_date_f']);
  $setDateFin = $reservation->setDateFin($_POST['date_f'], $_POST['new_date_f'], $_POST['id_u'], $_POST['id_p']);
  // var_dump($setDateFin);

  }

if(isset($_POST['supprimer'])){
//var_dump($_POST['id_u']);
  $req = $place->deletePlace($_POST['id_p'], $reservation);
}

if(isset($_POST['ajouter'])){
  //var_dump($_POST['id_u']);
  $req = $place->addPlace($_POST['nom']);
}

if(isset($_POST['deplacer'])){
  //var_dump($_POST['rang']);
  $req = $file->deplacer($_POST['rang']);
}

require "Views/inscription.php";
?>
