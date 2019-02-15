
<?php include "headerView.php"; ?>

<hgroup>
    <h1>Parking 3000</h1>
    <h3>Acces a votre compte</h3>
</hgroup>
<link rel="stylesheet" href="../publics/css/styleLogin.css">
<?php
require ("./connexion.php");

try {
    $bdd = new PDO("mysql:host=localhost;dbname=parking3000;charset=utf8","root","");

} catch (PDO Exception $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>
<?php
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $mdp = sha1($_POST['mdp']);

    $requete = $bdd->query("INSERT INTO user(email,password,lvl) VALUES('".$email."','".$password."',1)");
    $_SESSION['connecte'] = true;
    $_SESSION['id'] = $bdd->lastInsertId();
    $_SESSION['lvl'] = 1;
    mail($email,"Inscription","Bienvenue");
    header("Location:accueilView.php");
}
?>
<form action="#" method="post" class="centrale">
    Nom<input type="Nom" name="Nom"/><\br>
    Prenom<input type="Prenom" name="Prenom"/><\br>
    Email<input type="email" name="email"/><\br>
    mdp<input type="password" name="password"/><\br>
    <input type="submit" name="submit"/><\br>
    </form>


<?php include "footerView.php"; ?>