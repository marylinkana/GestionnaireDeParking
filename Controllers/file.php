<?php
require "reservations.php";
require "places.php";
require "files.php";
require "users.php";
// require "Modeles/fonctions.php";
// require "Modeles/admin.php";

if(isset($_POST['deFile'])){
  //var_dump($_POST['rang']);
  $req = $user->resetRang($_POST['id_u']);
}

if(isset($_POST['deplacer'])){
  //var_dump($_POST['rang']);
  $req = $file->deplacer($_POST['rang']);
}


require "Views/file.php";
?>
