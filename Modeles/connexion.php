<?php

try
        {
            require ("config0.php");
            $bdd = new PDO("mysql:host=localhost;dbname=parking;charset=utf8",$bdduser,$bddmdp);
        }
        catch(Exception $e)
        {
    die("Erreur bdd non trouvée");
        }

?>
