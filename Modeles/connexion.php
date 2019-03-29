<?php

try
        {
            require ("config.php");
            $bdd = new PDO("mysql:host=localhost;dbname=mkossikana;charset=utf8",$bdduser,$bddmdp);
        }
        catch(Exception $e)
        {
    die("Erreur bdd non trouvée");
        }

?>
