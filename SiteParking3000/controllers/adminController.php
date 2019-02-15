<?php
require "/models/adminModele.php"

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    
    login_user($email,$passeword);
    header("location:accueil")

    
}

require "/views/adminView.php";
?>