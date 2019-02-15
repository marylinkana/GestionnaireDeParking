<?php
require "/models/loginModele.php";
   if (isset($_POST['sumit']))
    // On appelle la fonction login_user qui permet de connecter un utilisateur à son compte.
    login_user();

    // On redirige sur la page account;php
    header('Location:Accueil');

require "/views/loginView.php";
?>