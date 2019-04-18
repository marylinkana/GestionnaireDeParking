<?php
// require "Modeles/register.php";
require "users.php";
if(isset($_POST['reset'])){
  //  var_dump($_POST['mdp']);
  $req = $user->resetPassword($_POST['email'], $_POST['mdp']);
  }
require "Views/reset.php";
?>
