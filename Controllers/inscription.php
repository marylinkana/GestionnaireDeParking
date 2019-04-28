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

if(isset($_POST['addUser'])){
  //var_dump($_POST);
  $addUser = $user->addUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp']);
}

if(isset($_POST['valider'])){
//var_dump($_POST['id_u']);
  $req = $user->valideInsc($_POST['id_u']);
}

if(isset($_POST['retirer'])){
//var_dump($_POST['id_u']);
  $req = $user->dropUser($_POST['id_u']);
}

if(isset($_POST['avalider'])){
//var_dump($_POST['id_u']);
  $aValider = $user->getInscAValiser();
}

if(isset($_POST['bannis'])){
//var_dump($_POST['id_u']);
  $bannis = $user->getUserbannis();
}

require "Views/inscription.php";
?>
