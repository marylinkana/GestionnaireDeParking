<?php
global $bdd;

if(isset($_POST['submit']))
{
    $email =  htmlspecialchars($_POST['email']);
    //var_dump($email);
    $mdp =  sha1(htmlspecialchars($_POST['mdp']));
    //var_dump($mdp);
    $requete = $bdd->prepare("SELECT * FROM users WHERE email = :email AND mdp = :mdp ");
    //var_dump($requete);
    $requete->bindValue(':email',$email,PDO::PARAM_STR);
    $requete->bindValue(':mdp',$mdp,PDO::PARAM_STR);
    $requete->execute();
    if($reponse = $requete->fetch())
    {
      $_SESSION['niveau'] = $reponse['niveau'];
      $_SESSION['email'] = $reponse['email'];
      $_SESSION['mdp'] = $reponse['mdp'];
      $_SESSION['nom'] = $reponse['nom_u'];
      $_SESSION['id_u'] = $reponse['id_u'];

        if(isset($_POST['remember']))
        {
            setcookie('auth',$reponse['id_u']."-----".sha1($reponse['email'].$reponse['mdp'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true); //le dernier argument evite que le cookie soit editable en javascript
        }

        if($_SESSION['niveau'] == 0){
          echo "<p class='btn btn-warning'><b>Votre demande d'inscription est encore en cours de traitement
                                                nous vous remercions de bien vouloir rééseyer sous 24h svp.</b></p>
                                                ";

        }

        if($_SESSION['niveau'] == 1){
            $_SESSION['connecte'] = true;
            header('Location:accueil');
        }

        if($_SESSION['niveau'] == 2){
            $_SESSION['connecte'] = true;
            header('Location:accueil');
        }
    }
    else
    {
        echo "<p class='btn btn-danger'><b>Identifiants incorrectes</b></p>";
    }
}
