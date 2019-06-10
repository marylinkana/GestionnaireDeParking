<?php
require "Modeles/cout.php";
require "places.php";
require "reservations.php";

if(isset($_POST['attribuer'])){
  //var_dump($_POST);
  $reservation->addPlaceToCategories($_POST['id_p'], $_POST['id_c']);
}

require "Views/cout.php"

?>
