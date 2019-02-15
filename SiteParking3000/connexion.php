<?php
session_start();

    try
        {
require ("./connexion.php");
            $bdd = new PDO ("mysql:host=localhost;dbname=parking3000",$bdduser,$bddmdp);   
        }
        catch(Exeption $e)
            {
                die("bdd non trouvée");
            }
    
    catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}


include "index.php";