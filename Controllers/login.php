<?php
//require "Modeles/login.php";
require "users.php";

if(isset($_POST['login'])){
  //var_dump($_POST['id_u']);
  $req = $user->login($_POST);
  }
require"Views/login.php";

?>
