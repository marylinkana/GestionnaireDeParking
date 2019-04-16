<?php
// require "Modeles/register.php";
require "users.php";
if(isset($_POST['register'])){
  //var_dump($_POST['id_u']);
  $req = $user->register($_POST);
  }
require "Views/register.php";
?>
