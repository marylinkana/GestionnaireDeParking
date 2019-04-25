<?php

if(isset($_POST['download'])){
//var_dump($_POST['id_u']);
require "Modeles/exportcsv.php";
}

require"Views/exportcsv.php";
?>
