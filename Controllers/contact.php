<?php
require "Modeles/contact.php";
require "users.php";

if(isset($_POST['send'])){
  //var_dump($_POST);
  sendEmail($_POST['expediteur'], $_POST['destinatair'], $_POST['objet'], $_POST['corp'] );
}

require "Views/contact.php"

?>
