<?php
// require "Modeles/register.php";
require "users.php";
if(isset($_POST['registerProfil'])){
  //  var_dump($_POST['mdp']);
  $req = $user->setProfil($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp'], $_SESSION['id_u']);
  }
require "Views/profil.php";
?>
