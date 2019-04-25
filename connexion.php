<?php
try
    {
        require ("config0.php");
        $bdd = new PDO("mysql:host=".$url.";dbname=".$bddname.";charset=utf8",$bdduser,$bddmdp);
    }
    catch(Exception $e)
    {
        die("Erreur: bdd non trouvée");
    }

?>
