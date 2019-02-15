<?php include "headerView.php"; ?>



    <hgroup>
        <h1>Parking 3000</h1>
        <h3>Acces a votre compte</h3>
    </hgroup>
    <link rel="stylesheet" href="../publics/css/styleLogin.css">
<?php
try
{
    $bdd = new
    PDO("mysql:host=localhost;dbname=parking3000;charset=utf8","root","");
}
catch (Exception $e)
{
    die("erreur de connection");
}


if(isset($_POST['submit']))
{$_SESSION['connecte'] = true;
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $requete = $bdd->query("SELECT * FROM user 
								WHERE email = '".$email."' 
								AND password = '".$password."'");

    if($reponse = $requete->fetch())
    {

        $_SESSION['id'] = $reponse['id_u'];
        header("Location:accueilView.php");
    }
    else
    {
        echo "mauvais identifiant";
    }
}
?>

    <form class="identification" action="#" method="post">
        <input placeholder="Email" type="email" name="email">
        <input placeholder="Mot de passe" type="password" name="password">
        <input class="submit" name="submit" type="submit" value="Valider">
    </form>




<?php include "footerView.php"; ?>