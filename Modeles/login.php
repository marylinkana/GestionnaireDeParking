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
    //$requete->execute();
    if($requete->execute())
    {
        $_SESSION['connecte'] = true;
        $_SESSION['id_u'] = $reponse['id_u'];
        $_SESSION['niveau'] = $reponse['niveau'];
        if(isset($_POST['remember']))
        {
            setcookie('auth',$reponse['id_u']."-----".sha1($reponse['email'].$reponse['mdp'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true); //le dernier argument evite que le cookie soit editable en javascript
        }

    if($SESSION['niveau'] = 0){
        header('Location:accueil');
    }
    if($SESSION['niveau'] = 1){
        header('Location:admin');
    }
    }
    else
    {
        echo "<p style='color:red'><b>Identifiants incorrectes</b></p>";
    }
}

function get_user_cookie($id)
{
    global $bdd;

    $user = $bdd->prepare("SELECT * FROM users WHERE id_u=:id");
    $user->bindValue(':id',$id,PDO::PARAM_INT);
    $user->execute();
    return $user->fetch();
}

function get_user($param)
{
    global $bdd;

    $user = $bdd->prepare("SELECT * FROM users WHERE email=:email AND mdp=:mdp");
    $user->bindValue(':email', $params['email'],PDO::PARAM_STR);
    $user->bindValue(':mdp', sha1($params['mdp']),PDO::PARAM_STR); // mdp a cryter dans la bdd
    $user->execute();
    return $user->fetch();
}

function get_user_mail($param)
{
    global $bdd;

    $user = $bdd->prepare("SELECT * FROM users WHERE email=:email");
    $user->bindValue(':email', $params['email'],PDO::PARAM_STR);
    $user->execute();
    return $user->fetch();
}
