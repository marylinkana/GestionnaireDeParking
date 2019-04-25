<?php
require "Modeles/reservations.php";

if(isset($_POST['setTimeReserv'])){
  // var_dump($_POST['time']);
  if(!isset($reservation)){
      $reservation = new Reservation();
    }
  $reservation->setTimeReserv($_POST['time']) ;
}

if(!isset($reservation)){
    $reservation = new Reservation(60);
  }

?>
